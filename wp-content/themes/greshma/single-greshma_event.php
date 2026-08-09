<?php
/**
 * Single Event Template.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

get_header();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();

		$event_id = get_the_ID();


		/* ======================================================
		   EVENT META
		====================================================== */

		$start_date = get_post_meta(
			$event_id,
			'_greshma_event_start_date',
			true
		);

		$end_date = get_post_meta(
			$event_id,
			'_greshma_event_end_date',
			true
		);

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

		$venue = get_post_meta(
			$event_id,
			'_greshma_event_venue',
			true
		);

		$location = get_post_meta(
			$event_id,
			'_greshma_event_location',
			true
		);

		$format = get_post_meta(
			$event_id,
			'_greshma_event_format',
			true
		);

		$registration_url = get_post_meta(
			$event_id,
			'_greshma_event_registration_url',
			true
		);


		/* ======================================================
		   STATUS
		====================================================== */

		$status = class_exists( 'Greshma_Core_Events' )
			? Greshma_Core_Events::get_status( $event_id )
			: array(
				'label' => '',
				'class' => '',
			);


		/* ======================================================
		   CATEGORY
		====================================================== */

		$categories = get_the_terms(
			$event_id,
			'greshma_event_category'
		);


		/* ======================================================
		   DATE LABEL
		====================================================== */

		$date_label = '';

		if ( $start_date ) {

			$start_timestamp = strtotime(
				$start_date
			);

			if ( $start_timestamp ) {

				$date_label = date_i18n(
					'F j, Y',
					$start_timestamp
				);
			}
		}


		if (
			$end_date &&
			$end_date !== $start_date
		) {

			$end_timestamp = strtotime(
				$end_date
			);

			if ( $end_timestamp ) {

				$date_label .=
					' – ' .
					date_i18n(
						'F j, Y',
						$end_timestamp
					);
			}
		}


		/* ======================================================
		   TIME LABEL
		====================================================== */

		$time_label = '';

		if ( $start_time ) {

			$start_time_object =
				DateTime::createFromFormat(
					'H:i',
					$start_time
				);

			if ( $start_time_object ) {

				$time_label =
					$start_time_object->format(
						'g:i A'
					);
			}
		}


		if ( $end_time ) {

			$end_time_object =
				DateTime::createFromFormat(
					'H:i',
					$end_time
				);

			if ( $end_time_object ) {

				$formatted_end =
					$end_time_object->format(
						'g:i A'
					);

				$time_label = $time_label
					? $time_label . ' – ' . $formatted_end
					: $formatted_end;
			}
		}


		/* ======================================================
		   FORMAT LABEL
		====================================================== */

		$format_labels = array(
			'in-person' => __( 'In Person', 'greshma' ),
			'online'    => __( 'Online', 'greshma' ),
			'hybrid'    => __( 'Hybrid', 'greshma' ),
		);

		$format_label = isset(
			$format_labels[ $format ]
		)
			? $format_labels[ $format ]
			: __( 'Event', 'greshma' );
		?>

		<main
			id="primary"
			class="single-event"
		>


			<!-- =================================================
			     HERO
			================================================= -->

			<section class="single-event__hero">

				<div class="container">

					<a
						href="<?php echo esc_url(
							get_post_type_archive_link(
								'greshma_event'
							)
						); ?>"
						class="single-event__back"
					>
						<span aria-hidden="true">
							←
						</span>

						<?php esc_html_e(
							'Back to All Events',
							'greshma'
						); ?>
					</a>


					<div class="single-event__hero-layout">


						<!-- CONTENT -->

						<div class="single-event__hero-content">


							<div class="single-event__badges">

								<?php if ( $status['label'] ) : ?>

									<span
										class="single-event__status single-event__status--<?php echo esc_attr(
											$status['class']
										); ?>"
									>
										<?php echo esc_html(
											$status['label']
										); ?>
									</span>

								<?php endif; ?>


								<?php if (
									$categories &&
									! is_wp_error( $categories )
								) : ?>

									<?php
									$primary_category =
										reset( $categories );
									?>

									<?php if ( $primary_category ) : ?>

										<span class="single-event__category">
											<?php echo esc_html(
												$primary_category->name
											); ?>
										</span>

									<?php endif; ?>

								<?php endif; ?>

							</div>


							<h1>
								<?php the_title(); ?>
							</h1>


							<?php if ( has_excerpt() ) : ?>

								<p class="single-event__intro">
									<?php echo esc_html(
										get_the_excerpt()
									); ?>
								</p>

							<?php endif; ?>


							<div class="single-event__meta">


								<?php if ( $date_label ) : ?>

									<div>

										<span>
											<?php esc_html_e(
												'Date',
												'greshma'
											); ?>
										</span>

										<strong>
											<?php echo esc_html(
												$date_label
											); ?>
										</strong>

									</div>

								<?php endif; ?>


								<?php if ( $time_label ) : ?>

									<div>

										<span>
											<?php esc_html_e(
												'Time',
												'greshma'
											); ?>
										</span>

										<strong>
											<?php echo esc_html(
												$time_label
											); ?>
										</strong>

									</div>

								<?php endif; ?>


								<?php if ( $location ) : ?>

									<div>

										<span>
											<?php esc_html_e(
												'Location',
												'greshma'
											); ?>
										</span>

										<strong>
											<?php echo esc_html(
												$location
											); ?>
										</strong>

									</div>

								<?php endif; ?>


								<?php if ( $venue ) : ?>

									<div>

										<span>
											<?php esc_html_e(
												'Venue',
												'greshma'
											); ?>
										</span>

										<strong>
											<?php echo esc_html(
												$venue
											); ?>
										</strong>

									</div>

								<?php endif; ?>


								<div>

									<span>
										<?php esc_html_e(
											'Format',
											'greshma'
										); ?>
									</span>

									<strong>
										<?php echo esc_html(
											$format_label
										); ?>
									</strong>

								</div>

							</div>


						<?php
/* ==========================================================
   EVENT ACTION
   Registration is available only for upcoming/ongoing events.
========================================================== */

$is_active_event = in_array(
	$status['class'],
	array(
		'upcoming',
		'ongoing',
	),
	true
);
?>

<?php if (
	$is_active_event &&
	$registration_url
) : ?>

	<a
		href="<?php echo esc_url(
			$registration_url
		); ?>"
		class="single-event__register"
		target="_blank"
		rel="noopener noreferrer"
	>
		<?php esc_html_e(
			'Register for Event',
			'greshma'
		); ?>

		<span aria-hidden="true">
			→
		</span>

	</a>

<?php endif; ?>


						</div>


						<!-- IMAGE -->

						<div class="single-event__visual">

							<?php if ( has_post_thumbnail() ) : ?>

								<?php
								the_post_thumbnail(
									'large',
									array(
										'class'    => 'single-event__image',
										'loading'  => 'eager',
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

								<div class="single-event__placeholder">

									<span>
										<?php echo esc_html(
											$format_label
										); ?>
									</span>

								</div>

							<?php endif; ?>

						</div>


					</div>

				</div>

			</section>


			<!-- =================================================
			     BODY
			================================================= -->

			<section class="single-event__body">

				<div class="container">

					<div class="single-event__body-layout">


						<article class="single-event__content">

							<?php the_content(); ?>

						</article>


						<aside class="single-event__sidebar">


							<div class="single-event__details-card">

								<h2>
									<?php esc_html_e(
										'Event Details',
										'greshma'
									); ?>
								</h2>


								<?php if ( $date_label ) : ?>

									<p>
										<span>Date</span>
										<strong><?php echo esc_html( $date_label ); ?></strong>
									</p>

								<?php endif; ?>


								<?php if ( $time_label ) : ?>

									<p>
										<span>Time</span>
										<strong><?php echo esc_html( $time_label ); ?></strong>
									</p>

								<?php endif; ?>


								<?php if ( $location ) : ?>

									<p>
										<span>Location</span>
										<strong><?php echo esc_html( $location ); ?></strong>
									</p>

								<?php endif; ?>


								<?php if ( $venue ) : ?>

									<p>
										<span>Venue</span>
										<strong><?php echo esc_html( $venue ); ?></strong>
									</p>

								<?php endif; ?>


								<p>
									<span>Format</span>
									<strong><?php echo esc_html( $format_label ); ?></strong>
								</p>

							</div>


					<?php if (
	$is_active_event &&
	$registration_url
) : ?>

								<div class="single-event__registration-card">

									<span>
										<?php esc_html_e(
											'Join the Event',
											'greshma'
										); ?>
									</span>

									<h2>
										<?php esc_html_e(
											'Interested in participating?',
											'greshma'
										); ?>
									</h2>

									<a
										href="<?php echo esc_url(
											$registration_url
										); ?>"
										target="_blank"
										rel="noopener noreferrer"
									>
										<?php esc_html_e(
											'Register Now',
											'greshma'
										); ?>

										<span aria-hidden="true">
											→
										</span>
									</a>

								</div>

							<?php endif; ?>


						</aside>

					</div>

				</div>

			</section>


			<!-- =================================================
			     RELATED EVENTS
			================================================= -->

			<?php
			$related_args = array(
				'post_type'      => 'greshma_event',
				'post_status'    => 'publish',
				'posts_per_page' => 3,
				'post__not_in'   => array( $event_id ),
				'meta_key'       => '_greshma_event_start_date',
				'orderby'        => 'meta_value',
				'order'          => 'ASC',
			);


			if (
				$categories &&
				! is_wp_error( $categories )
			) {

				$related_args['tax_query'] = array(
					array(
						'taxonomy' => 'greshma_event_category',
						'field'    => 'term_id',
						'terms'    => wp_list_pluck(
							$categories,
							'term_id'
						),
					),
				);
			}


			$related_events = new WP_Query(
				$related_args
			);
			?>


			<?php if ( $related_events->have_posts() ) : ?>

				<section class="single-event__related">

					<div class="container">

						<div class="single-event__related-heading">

							<h2>
								<?php esc_html_e(
									'Related Events',
									'greshma'
								); ?>
							</h2>

							<a
								href="<?php echo esc_url(
									get_post_type_archive_link(
										'greshma_event'
									)
								); ?>"
							>
								<?php esc_html_e(
									'View All Events',
									'greshma'
								); ?>

								<span aria-hidden="true">
									→
								</span>
							</a>

						</div>


						<div class="single-event__related-grid">

							<?php
							while ( $related_events->have_posts() ) :
								$related_events->the_post();
								?>

								<article class="single-event-related-card">

									<a
										href="<?php the_permalink(); ?>"
										class="single-event-related-card__image"
									>

										<?php if ( has_post_thumbnail() ) : ?>

											<?php
											the_post_thumbnail(
												'medium_large',
												array(
													'loading' => 'lazy',
												)
											);
											?>

										<?php else : ?>

											<span>
												<?php esc_html_e(
													'Event',
													'greshma'
												); ?>
											</span>

										<?php endif; ?>

									</a>


									<div class="single-event-related-card__content">

										<h3>

											<a href="<?php the_permalink(); ?>">
												<?php the_title(); ?>
											</a>

										</h3>

									</div>

								</article>

							<?php endwhile; ?>

						</div>

					</div>

				</section>

				<?php wp_reset_postdata(); ?>

			<?php endif; ?>


		</main>

	<?php
	endwhile;
endif;

get_footer();