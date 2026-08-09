<?php
/**
 * Events Page — Past Events.
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
   PAST EVENTS QUERY
========================================================== */

$past_events = new WP_Query(
	array(
		'post_type'      => 'greshma_event',
		'post_status'    => 'publish',
		'posts_per_page' => -1,

		'meta_query' => array(
			array(
				'key'     => '_greshma_event_start_date',
				'value'   => $today,
				'compare' => '<',
				'type'    => 'DATE',
			),
		),

		'meta_key' => '_greshma_event_start_date',

		'orderby' => array(
			'meta_value' => 'DESC',
			'date'       => 'DESC',
		),
	)
);
?>

<section class="events-past">

	<div class="container">


		<!-- ==========================================
		     SECTION HEADING
		=========================================== -->

		<div class="events-past__heading">

			<div>

				<span class="events-past__eyebrow">
					<?php esc_html_e(
						'Looking Back',
						'greshma'
					); ?>
				</span>

				<h2>
					<?php esc_html_e(
						'Past Events',
						'greshma'
					); ?>
				</h2>

			</div>


			<?php if ( $past_events->found_posts > 1 ) : ?>

				<div class="events-past__controls">

					<button
						type="button"
						class="events-past__arrow"
						data-events-past-prev
						aria-label="<?php esc_attr_e(
							'Previous past event',
							'greshma'
						); ?>"
					>
						←
					</button>


					<button
						type="button"
						class="events-past__arrow"
						data-events-past-next
						aria-label="<?php esc_attr_e(
							'Next past event',
							'greshma'
						); ?>"
					>
						→
					</button>

				</div>

			<?php endif; ?>

		</div>


		<!-- ==========================================
		     SLIDER
		=========================================== -->

		<div
			class="events-past__viewport"
			data-events-past-viewport
		>

			<div
				class="events-past__track"
				data-events-past-track
			>

				<?php if ( $past_events->have_posts() ) : ?>

					<?php
					while ( $past_events->have_posts() ) :
						$past_events->the_post();

						$event_id = get_the_ID();


						/* ==============================
						   DATE
						============================== */

						$start_date = get_post_meta(
							$event_id,
							'_greshma_event_start_date',
							true
						);

						$formatted_date = '';

						if ( $start_date ) {

							$timestamp = strtotime(
								$start_date
							);

							if ( $timestamp ) {

								$formatted_date = date_i18n(
									'F j, Y',
									$timestamp
								);
							}
						}


						/* ==============================
						   LOCATION
						============================== */

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


						/* ==============================
						   CATEGORY / TYPE
						============================== */

						$categories = get_the_terms(
							$event_id,
							'greshma_event_category'
						);

						$type_label = __(
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

								$type_label =
									$primary_category->name;
							}
						}
						?>

						<article class="events-past-card">


							<!-- IMAGE -->

							<div class="events-past-card__image">

								<a
									href="<?php the_permalink(); ?>"
									aria-label="<?php echo esc_attr(
										get_the_title()
									); ?>"
								>

									<?php if ( has_post_thumbnail() ) : ?>

										<?php
										the_post_thumbnail(
											'medium_large',
											array(
												'class'    => 'events-past-card__image-file',
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

										<div class="events-past-card__placeholder">

											<span>
												<?php
												echo esc_html(
													$type_label
												);
												?>
											</span>

										</div>

									<?php endif; ?>

								</a>


								<span class="events-past-card__type">

									<?php
									echo esc_html(
										$type_label
									);
									?>

								</span>

							</div>


							<!-- CONTENT -->

							<div class="events-past-card__content">

								<h3>

									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>

								</h3>


								<div class="events-past-card__meta">


									<?php if ( $formatted_date ) : ?>

										<span>
											<?php
											echo esc_html(
												$formatted_date
											);
											?>
										</span>

									<?php endif; ?>


									<?php if (
										$formatted_date &&
										$location_label
									) : ?>

										<span
											class="events-past-card__dot"
											aria-hidden="true"
										></span>

									<?php endif; ?>


									<?php if ( $location_label ) : ?>

										<span>
											<?php
											echo esc_html(
												$location_label
											);
											?>
										</span>

									<?php endif; ?>


								</div>

							</div>

						</article>

					<?php endwhile; ?>


					<?php wp_reset_postdata(); ?>


				<?php else : ?>

					<div class="events-past__empty">

						<p>
							<?php esc_html_e(
								'Past events will appear here after they have taken place.',
								'greshma'
							); ?>
						</p>

					</div>

				<?php endif; ?>

			</div>

		</div>

	</div>

</section>