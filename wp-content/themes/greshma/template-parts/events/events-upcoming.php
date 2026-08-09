<?php
/**
 * Events Page — Upcoming Events.
 *
 * Dynamic source:
 * Greshma Events CPT.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;


/* ==========================================================
   CURRENT DATE
========================================================== */

$today = current_time( 'Y-m-d' );


/* ==========================================================
   UPCOMING EVENTS QUERY
========================================================== */

$upcoming_events = new WP_Query(
	array(
		'post_type'      => 'greshma_event',
		'post_status'    => 'publish',
		'posts_per_page' => -1,

		'meta_query' => array(
			array(
				'key'     => '_greshma_event_start_date',
				'value'   => $today,
				'compare' => '>=',
				'type'    => 'DATE',
			),
		),

		'meta_key' => '_greshma_event_start_date',

		'orderby' => array(
			'meta_value' => 'ASC',
			'date'       => 'ASC',
		),
	)
);


/* ==========================================================
   FORMAT LABELS
========================================================== */

$format_labels = array(
	'in-person' => __( 'In Person', 'greshma' ),
	'online'    => __( 'Online', 'greshma' ),
	'hybrid'    => __( 'Hybrid', 'greshma' ),
);
?>

<section class="events-upcoming">

	<div class="container">

		<div class="events-upcoming__layout">


			<!-- ==========================================
			     LEFT — EVENTS
			=========================================== -->

			<div class="events-upcoming__main">

				<div class="events-upcoming__heading">

					<div>

						<span class="events-upcoming__eyebrow">
							<?php esc_html_e(
								'What’s Coming Up',
								'greshma'
							); ?>
						</span>

						<h2>
							<?php esc_html_e(
								'Upcoming Events',
								'greshma'
							); ?>
						</h2>

					</div>


					<span class="events-upcoming__count">

						<?php
						echo esc_html(
							$upcoming_events->found_posts
						);
						?>

						<?php
						echo 1 === (int) $upcoming_events->found_posts
							? esc_html__( 'Event', 'greshma' )
							: esc_html__( 'Events', 'greshma' );
						?>

					</span>

				</div>


				<div
					class="events-upcoming__list"
					data-events-list
				>

					<?php if ( $upcoming_events->have_posts() ) : ?>

						<?php
						while ( $upcoming_events->have_posts() ) :
							$upcoming_events->the_post();

							$event_id = get_the_ID();


							/* ==================================
							   DATE
							================================== */

							$start_date = get_post_meta(
								$event_id,
								'_greshma_event_start_date',
								true
							);

							$date_timestamp = $start_date
								? strtotime( $start_date )
								: false;

							$date_day = $date_timestamp
								? date_i18n( 'd', $date_timestamp )
								: '';

							$date_month = $date_timestamp
								? strtoupper(
									date_i18n(
										'M',
										$date_timestamp
									)
								)
								: '';

							$month_filter = $date_timestamp
								? strtolower(
									date_i18n(
										'F',
										$date_timestamp
									)
								)
								: '';


							/* ==================================
							   TIME
							================================== */

							$start_time = get_post_meta(
								$event_id,
								'_greshma_event_start_time',
								true
							);

							$end_time = get_post_meta(
								$event_id,
								'_greshma_event_end_time',
								true
							);

							$time_label = '';

							if ( $start_time ) {

								$start_time_obj =
									DateTime::createFromFormat(
										'H:i',
										$start_time
									);

								if ( $start_time_obj ) {
									$time_label =
										$start_time_obj->format(
											'g:i A'
										);
								}
							}

							if ( $end_time ) {

								$end_time_obj =
									DateTime::createFromFormat(
										'H:i',
										$end_time
									);

								if ( $end_time_obj ) {

									$formatted_end =
										$end_time_obj->format(
											'g:i A'
										);

									if ( $time_label ) {

										$time_label .=
											' – ' .
											$formatted_end;

									} else {

										$time_label =
											$formatted_end;
									}
								}
							}


							/* ==================================
							   LOCATION / VENUE
							================================== */

							$location = get_post_meta(
								$event_id,
								'_greshma_event_location',
								true
							);

							$venue = get_post_meta(
								$event_id,
								'_greshma_event_venue',
								true
							);

							$location_label = $location
								?: $venue;

							$location_filter =
								sanitize_title(
									$location_label
								);


							/* ==================================
							   FORMAT
							================================== */

							$format = get_post_meta(
								$event_id,
								'_greshma_event_format',
								true
							);

							$format_label =
								isset(
									$format_labels[ $format ]
								)
									? $format_labels[ $format ]
									: __( 'Event', 'greshma' );


							/* ==================================
							   REGISTRATION
							================================== */

							$registration_url =
								get_post_meta(
									$event_id,
									'_greshma_event_registration_url',
									true
								);


							/* ==================================
							   EVENT CATEGORY
							================================== */

							$categories = get_the_terms(
								$event_id,
								'greshma_event_category'
							);

							$category_slug  = '';
							$category_label = __( 'Event', 'greshma' );

							if (
								$categories &&
								! is_wp_error( $categories )
							) {

								$primary_category =
									reset( $categories );

								if ( $primary_category ) {

									$category_slug =
										$primary_category->slug;

									$category_label =
										$primary_category->name;
								}
							}


							/* ==================================
							   DESCRIPTION
							================================== */

							$description = get_the_excerpt();

							if ( ! $description ) {

								$description = wp_trim_words(
									wp_strip_all_tags(
										get_the_content()
									),
									28,
									'…'
								);
							}
							?>

							<article
								class="event-card"
								data-event-item
								data-event-type="<?php echo esc_attr(
									$category_slug
								); ?>"
								data-event-location="<?php echo esc_attr(
									$location_filter
								); ?>"
								data-event-month="<?php echo esc_attr(
									$month_filter
								); ?>"
							>


								<!-- IMAGE -->

								<div class="event-card__image">

									<?php if ( has_post_thumbnail() ) : ?>

										<?php
										the_post_thumbnail(
											'medium_large',
											array(
												'class'    => 'event-card__image-file',
												'loading'  => 'lazy',
												'decoding' => 'async',
												'alt'      => the_title_attribute(
													array(
														'echo' => false,
													)
												),
											)
										);
										?>

									<?php else : ?>

										<div class="event-card__image-placeholder">

											<span>
												<?php
												echo esc_html(
													$category_label
												);
												?>
											</span>

										</div>

									<?php endif; ?>


									<div class="event-card__date">

										<strong>
											<?php echo esc_html(
												$date_day
											); ?>
										</strong>

										<span>
											<?php echo esc_html(
												$date_month
											); ?>
										</span>

									</div>

								</div>


								<!-- CONTENT -->

								<div class="event-card__content">

									<span class="event-card__type">

										<?php
										echo esc_html(
											$category_label
										);
										?>

									</span>


									<h3>
										<?php the_title(); ?>
									</h3>


									<?php if ( $description ) : ?>

										<p>
											<?php
											echo esc_html(
												wp_trim_words(
													$description,
													28,
													'…'
												)
											);
											?>
										</p>

									<?php endif; ?>


									<div class="event-card__details">


										<?php if ( $location_label ) : ?>

											<span>

												<svg
													viewBox="0 0 24 24"
													aria-hidden="true"
												>
													<path d="M12 21s6-5.2 6-11a6 6 0 1 0-12 0c0 5.8 6 11 6 11Z"/>
													<circle cx="12" cy="10" r="2"/>
												</svg>

												<?php
												echo esc_html(
													$location_label
												);
												?>

											</span>

										<?php endif; ?>


										<?php if ( $time_label ) : ?>

											<span>

												<svg
													viewBox="0 0 24 24"
													aria-hidden="true"
												>
													<circle cx="12" cy="12" r="8"/>
													<path d="M12 7v5l3 2"/>
												</svg>

												<?php
												echo esc_html(
													$time_label
												);
												?>

											</span>

										<?php endif; ?>


										<span>

											<svg
												viewBox="0 0 24 24"
												aria-hidden="true"
											>
												<path d="M4 6h16v12H4Z"/>
												<path d="M8 3v6"/>
												<path d="M16 3v6"/>
											</svg>

											<?php
											echo esc_html(
												$format_label
											);
											?>

										</span>


									</div>


									<div class="event-card__actions">


										<?php if ( $registration_url ) : ?>

											<a
												href="<?php echo esc_url(
													$registration_url
												); ?>"
												class="event-card__button event-card__button--primary"
												target="_blank"
												rel="noopener noreferrer"
											>

												<?php esc_html_e(
													'Register',
													'greshma'
												); ?>

												<span aria-hidden="true">
													→
												</span>

											</a>


										<?php else : ?>


											<a
												href="<?php the_permalink(); ?>"
												class="event-card__button event-card__button--primary"
											>

												<?php esc_html_e(
													'View Event',
													'greshma'
												); ?>

												<span aria-hidden="true">
													→
												</span>

											</a>


										<?php endif; ?>


										<a
											href="<?php the_permalink(); ?>"
											class="event-card__button event-card__button--secondary"
										>
											<?php esc_html_e(
												'Event Details',
												'greshma'
											); ?>
										</a>


									</div>

								</div>

							</article>

						<?php endwhile; ?>


						<?php wp_reset_postdata(); ?>


					<?php else : ?>


						<div class="events-upcoming__empty">

							<p>
								<?php esc_html_e(
									'No upcoming events are currently scheduled.',
									'greshma'
								); ?>
							</p>

						</div>


					<?php endif; ?>

				</div>

			</div>


			<!-- ==========================================
			     RIGHT — SIDEBAR
			=========================================== -->

			<aside class="events-upcoming__sidebar">

				<?php
				get_template_part(
					'template-parts/events/events-sidebar'
				);
				?>

			</aside>

		</div>

	</div>

</section>