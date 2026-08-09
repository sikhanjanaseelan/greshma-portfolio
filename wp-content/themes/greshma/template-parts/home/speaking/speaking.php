<?php
/**
 * Homepage Speaking & Engagements section.
 *
 * Dynamic source:
 * Greshma Events CPT.
 *
 * Design remains identical to the original homepage section.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;


/* ==========================================================
   SPEAKING / ENGAGEMENT QUERY
========================================================== */

$speaking_query = new WP_Query(
	array(
		'post_type'      => 'greshma_event',
		'post_status'    => 'publish',
		'posts_per_page' => 5,

		/*
		 * Latest engagement date first.
		 */
		'meta_key' => '_greshma_event_start_date',
		'orderby'  => 'meta_value',
		'order'    => 'DESC',
	)
);


/*
 * If no Events exist, do not render an empty section.
 */
if ( ! $speaking_query->have_posts() ) {
	return;
}
?>

<section
	class="home-speaking"
	aria-labelledby="home-speaking-title"
>

	<div class="site-container">


		<!-- ==================================================
		     HEADER
		================================================== -->

		<header class="home-speaking__header">

			<div class="home-speaking__heading-group">

				<p class="section-eyebrow">

					<?php
					esc_html_e(
						'Speaking & Engagements',
						'greshma'
					);
					?>

				</p>


				<h2
					id="home-speaking-title"
					class="home-speaking__title"
				>

					<?php
					esc_html_e(
						'Conversations that inspire reflection, courage and collective action.',
						'greshma'
					);
					?>

				</h2>

			</div>


			<div class="home-speaking__intro">

				<p>

					<?php
					esc_html_e(
						'Selected keynotes, panels, workshops and conversations across youth leadership, peacebuilding and climate action.',
						'greshma'
					);
					?>

				</p>


				<a
					class="home-speaking__all-link"
					href="<?php echo esc_url(
						home_url( '/speaking/' )
					); ?>"
				>

					<span>
						<?php
						esc_html_e(
							'Explore All Engagements',
							'greshma'
						);
						?>
					</span>

					<span aria-hidden="true">
						→
					</span>

				</a>

			</div>

		</header>


		<!-- ==================================================
		     ENGAGEMENT CARDS
		================================================== -->

		<div class="home-speaking__grid">


			<?php
			$index = 0;

			while ( $speaking_query->have_posts() ) :

				$speaking_query->the_post();

				$index++;

				$event_id = get_the_ID();


				/* ==========================================
				   LOCATION
				========================================== */

				$location = get_post_meta(
					$event_id,
					'_greshma_event_location',
					true
				);


				/*
				 * Venue fallback if Location is empty.
				 */
				if ( ! $location ) {

					$location = get_post_meta(
						$event_id,
						'_greshma_event_venue',
						true
					);
				}


				/* ==========================================
				   ENGAGEMENT TYPE
				========================================== */

				$categories = get_the_terms(
					$event_id,
					'greshma_event_category'
				);


				$type_label = __(
					'Engagement',
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


				<article
					class="speaking-card speaking-card--<?php echo esc_attr(
						$index
					); ?>"
				>


					<!-- ======================================
					     IMAGE
					====================================== -->

					<a
						class="speaking-card__media"
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
									'class' =>
										'speaking-card__image',

									'loading' =>
										'lazy',

									'decoding' =>
										'async',

									'alt' =>
										the_title_attribute(
											array(
												'echo' => false,
											)
										),
								)
							);
							?>


						<?php else : ?>


							<div
								class="
									speaking-card__placeholder
									speaking-card__placeholder--<?php
									echo esc_attr(
										min(
											$index,
											5
										)
									);
									?>
								"
								aria-hidden="true"
							>

								<span>

									<?php
									printf(
										/* translators: %d engagement number. */
										esc_html__(
											'Engagement Image %d',
											'greshma'
										),
										(int) $index
									);
									?>

								</span>

							</div>


						<?php endif; ?>


						<!-- TYPE PILL -->

						<span class="speaking-card__type">

							<?php
							echo esc_html(
								$type_label
							);
							?>

						</span>


					</a>


					<!-- ======================================
					     CONTENT
					====================================== -->

					<div class="speaking-card__content">


						<?php if ( $location ) : ?>

							<p class="speaking-card__location">

								<?php
								echo esc_html(
									$location
								);
								?>

							</p>

						<?php endif; ?>


						<h3 class="speaking-card__title">

							<a href="<?php the_permalink(); ?>">

								<?php the_title(); ?>

							</a>

						</h3>


						<a
							class="speaking-card__link"
							href="<?php the_permalink(); ?>"
							aria-label="<?php echo esc_attr(
								sprintf(
									/* translators: %s engagement title. */
									__(
										'View %s',
										'greshma'
									),
									get_the_title()
								)
							); ?>"
						>

							<span aria-hidden="true">
								↗
							</span>

						</a>


					</div>

				</article>


			<?php endwhile; ?>


			<?php wp_reset_postdata(); ?>


		</div>

	</div>

</section>