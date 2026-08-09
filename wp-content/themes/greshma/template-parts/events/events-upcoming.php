<?php
/**
 * Events Page — Upcoming Events.
 *
 * /events/
 *     Shows 3 upcoming events with sidebar.
 *
 * /upcoming-events/
 *     Shows all upcoming events.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;


/* ==========================================================
   PAGE CONTEXT
========================================================== */

$is_upcoming_page =
	is_page( 'upcoming-events' ) ||
	is_page_template( 'page-upcoming-events.php' );

$is_event_archive =
	is_post_type_archive( 'greshma_event' );


$upcoming_limit =
	$is_upcoming_page || $is_event_archive
		? -1
		: 3;


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
		'posts_per_page' => $upcoming_limit,

		'meta_key' => '_greshma_event_start_date',

		'meta_query' => array(
			array(
				'key'     => '_greshma_event_start_date',
				'value'   => $today,
				'compare' => '>=',
			),
		),

		'orderby' => 'meta_value',
		'order'   => 'ASC',
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


/* ==========================================================
   UPCOMING PAGE URL
========================================================== */

$upcoming_page = get_page_by_path(
	'upcoming-events'
);

$upcoming_url = $upcoming_page
	? get_permalink( $upcoming_page )
	: home_url( '/upcoming-events/' );
?>


<section
	class="events-upcoming<?php echo $is_upcoming_page ? ' events-upcoming--listing' : ''; ?>"
>

	<div class="container">

		<div
			class="events-upcoming__layout<?php echo $is_upcoming_page ? ' events-upcoming__layout--full' : ''; ?>"
		>


			<!-- ==================================================
			     MAIN
			================================================== -->

			<div class="events-upcoming__main">

				<div class="events-upcoming__heading">

					<div>

						<span class="events-upcoming__eyebrow">
							<?php
							esc_html_e(
								'What’s Coming Up',
								'greshma'
							);
							?>
						</span>


						<h2>
							<?php
							echo $is_upcoming_page
								? esc_html__(
									'All Upcoming Events',
									'greshma'
								)
								: esc_html__(
									'Upcoming Events',
									'greshma'
								);
							?>
						</h2>

					</div>


					<span class="events-upcoming__count">

						<?php
						$count = (int) $upcoming_events->found_posts;

						echo esc_html( $count );

						echo ' ';

						echo 1 === $count
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


							$date_timestamp =
								$start_date
									? strtotime( $start_date )
									: false;


							$date_day =
								$date_timestamp
									? date_i18n(
										'd',
										$date_timestamp
									)
									: '';


							$date_month =
								$date_timestamp
									? strtoupper(
										date_i18n(
											'M',
											$date_timestamp
										)
									)
									: '';


							$month_filter =
								$date_timestamp
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

								$start_object =
									DateTime::createFromFormat(
										'H:i',
										$start_time
									);

								if ( $start_object ) {

									$time_label =
										$start_object->format(
											'g:i A'
										);
								}
							}


							if ( $end_time ) {

								$end_object =
									DateTime::createFromFormat(
										'H:i',
										$end_time
									);

								if ( $end_object ) {

									$end_label =
										$end_object->format(
											'g:i A'
										);

									$time_label =
										$time_label
											? $time_label . ' – ' . $end_label
											: $end_label;
								}
							}


							/* ==================================
							   LOCATION
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


							$location_label =
								$location ?: $venue;


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
							   CATEGORY
							================================== */

							$categories = get_the_terms(
								$event_id,
								'greshma_event_category'
							);


							$category_slug  = '';
							$category_label = __(
								'Event',
								'greshma'
							);


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

							$description =
								get_the_excerpt();


							if ( ! $description ) {

								$description =
									wp_trim_words(
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
												'class' =>
													'event-card__image-file',

												'loading' =>
													'lazy',

												'decoding' =>
													'async',
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


									<?php if (
										$date_day &&
										$date_month
									) : ?>

										<div class="event-card__date">

											<strong>
												<?php
												echo esc_html(
													$date_day
												);
												?>
											</strong>

											<span>
												<?php
												echo esc_html(
													$date_month
												);
												?>
											</span>

										</div>

									<?php endif; ?>


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
													<circle
														cx="12"
														cy="12"
														r="8"
													/>
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


									<!-- ACTIONS -->

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

												<?php
												esc_html_e(
													'Register',
													'greshma'
												);
												?>

												<span aria-hidden="true">
													→
												</span>

											</a>

										<?php endif; ?>


										<a
											href="<?php the_permalink(); ?>"
											class="event-card__button event-card__button--secondary"
										>

											<?php
											esc_html_e(
												'Event Details',
												'greshma'
											);
											?>

										</a>


									</div>

								</div>

							</article>


						<?php endwhile; ?>


						<?php wp_reset_postdata(); ?>


					<?php else : ?>


						<div class="events-upcoming__empty">

							<p>
								<?php
								esc_html_e(
									'No upcoming events are currently scheduled.',
									'greshma'
								);
								?>
							</p>

						</div>


					<?php endif; ?>


				</div>


				<!-- ==================================================
				     VIEW ALL — LANDING ONLY
				================================================== -->

				<?php if (
					! $is_upcoming_page &&
					! $is_event_archive
				) : ?>

					<div class="events-upcoming__explore">

						<a
							href="<?php echo esc_url(
								$upcoming_url
							); ?>"
							class="events-upcoming__explore-button"
						>

							<?php
							esc_html_e(
								'View All Upcoming Events',
								'greshma'
							);
							?>

							<span aria-hidden="true">
								→
							</span>

						</a>

					</div>

				<?php endif; ?>


			</div>


			<!-- ==================================================
			     SIDEBAR — LANDING ONLY
			================================================== -->

			<?php if ( ! $is_upcoming_page ) : ?>

				<aside class="events-upcoming__sidebar">

					<?php
					get_template_part(
						'template-parts/events/events-sidebar'
					);
					?>

				</aside>

			<?php endif; ?>


		</div>

	</div>

</section>