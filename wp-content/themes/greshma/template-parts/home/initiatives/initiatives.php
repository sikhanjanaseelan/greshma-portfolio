<?php
/**
 * Homepage — Featured Initiatives.
 *
 * Dynamic source:
 * Featured Greshma Projects.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;


/* ==========================================================
   FEATURED PROJECTS
========================================================== */

$initiatives_query = new WP_Query(
	array(
		'post_type'           => 'greshma_project',
		'post_status'         => 'publish',
		'posts_per_page'      => 3,
		'ignore_sticky_posts' => true,

		'meta_query' => array(
			array(
				'key'     => '_greshma_project_featured',
				'value'   => '1',
				'compare' => '=',
			),
		),

		'orderby' => array(
			'menu_order' => 'ASC',
			'date'       => 'DESC',
		),
	)
);


if ( ! $initiatives_query->have_posts() ) {
	return;
}
?>

<section
	class="home-initiatives"
	aria-labelledby="home-initiatives-title"
>

	<div class="site-container">


		<!-- ==================================================
		     HEADER
		================================================== -->

		<header class="home-initiatives__header">

			<div class="home-initiatives__heading-group">

				<p class="section-eyebrow">
					<?php esc_html_e(
						'Featured Initiatives',
						'greshma'
					); ?>
				</p>


				<h2
					id="home-initiatives-title"
					class="home-initiatives__title"
				>
					<?php esc_html_e(
						'Ideas brought to life through community and collaboration.',
						'greshma'
					); ?>
				</h2>

			</div>


			<div class="home-initiatives__intro">

				<p>
					<?php esc_html_e(
						'Selected initiatives created and supported across youth leadership, peacebuilding, education and sustainability.',
						'greshma'
					); ?>
				</p>


				<a
					class="text-link home-initiatives__all-link"
					href="<?php echo esc_url(
						home_url( '/projects/' )
					); ?>"
				>

					<span>
						<?php esc_html_e(
							'Explore All Projects',
							'greshma'
						); ?>
					</span>

					<span
						class="text-link__arrow"
						aria-hidden="true"
					>
						→
					</span>

				</a>

			</div>

		</header>


		<!-- ==================================================
		     PROJECTS
		================================================== -->

		<div class="home-initiatives__grid">

			<?php
			$index = 0;

			while ( $initiatives_query->have_posts() ) :

				$initiatives_query->the_post();

				$index++;

				$project_id = get_the_ID();


				/* ==========================================
				   LOCATION
				========================================== */

				$location = get_post_meta(
					$project_id,
					'_greshma_project_location',
					true
				);


				/* ==========================================
				   CATEGORY
				========================================== */

				$categories = get_the_terms(
					$project_id,
					'greshma_project_category'
				);

				$category_label = __(
					'Initiative',
					'greshma'
				);

				if (
					$categories &&
					! is_wp_error( $categories )
				) {

					$primary_category = reset(
						$categories
					);

					if ( $primary_category ) {

						$category_label =
							$primary_category->name;
					}
				}


				/* ==========================================
				   DESCRIPTION
				========================================== */

				$description = get_the_excerpt();

				if ( ! $description ) {

					$description = wp_trim_words(
						wp_strip_all_tags(
							get_the_content()
						),
						24,
						'…'
					);
				}
				?>


				<article
					class="initiative-card initiative-card--<?php echo esc_attr(
						$index
					); ?>"
				>


					<!-- ======================================
					     IMAGE
					====================================== -->

					<a
						class="initiative-card__media"
						href="<?php the_permalink(); ?>"
						aria-label="<?php echo esc_attr(
							sprintf(
								__(
									'View %s',
									'greshma'
								),
								get_the_title()
							)
						); ?>"
					>


						<?php if ( has_post_thumbnail() ) : ?>

							<?php
							the_post_thumbnail(
								'large',
								array(
									'class' =>
										'initiative-card__image',

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
								class="initiative-card__placeholder"
								aria-hidden="true"
							>

								<span>
									<?php esc_html_e(
										'Project Image',
										'greshma'
									); ?>
								</span>

							</div>

						<?php endif; ?>


						<span
							class="initiative-card__number"
							aria-hidden="true"
						>
							<?php
							echo esc_html(
								str_pad(
									(string) $index,
									2,
									'0',
									STR_PAD_LEFT
								)
							);
							?>
						</span>

					</a>


					<!-- ======================================
					     CONTENT
					====================================== -->

					<div class="initiative-card__content">


						<div class="initiative-card__meta">

							<span class="initiative-card__category">

								<?php echo esc_html(
									$category_label
								); ?>

							</span>


							<?php if ( $location ) : ?>

								<span class="initiative-card__location">

									<?php echo esc_html(
										$location
									); ?>

								</span>

							<?php endif; ?>

						</div>


						<h3 class="initiative-card__title">

							<a href="<?php the_permalink(); ?>">

								<?php the_title(); ?>

							</a>

						</h3>


						<?php if ( $description ) : ?>

							<p class="initiative-card__description">

								<?php echo esc_html(
									wp_trim_words(
										$description,
										22,
										'…'
									)
								); ?>

							</p>

						<?php endif; ?>


						<a
							class="initiative-card__link"
							href="<?php the_permalink(); ?>"
						>

							<span>
								<?php esc_html_e(
									'Discover the Initiative',
									'greshma'
								); ?>
							</span>

							<span aria-hidden="true">
								→
							</span>

						</a>


					</div>

				</article>


			<?php endwhile; ?>


			<?php wp_reset_postdata(); ?>

		</div>

	</div>

</section>