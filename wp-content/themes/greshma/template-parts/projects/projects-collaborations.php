<?php
/**
 * Projects Page — Projects & Collaborations.
 *
 * Dynamic data from Greshma Core Projects CPT.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

/**
 * Get project categories for filter buttons.
 */
$project_categories = get_terms(
	array(
		'taxonomy'   => 'greshma_project_category',
		'hide_empty' => true,
	)
);

/**
 * Get published projects.
 *
 * Order:
 * 1. menu_order
 * 2. title
 */
$projects_query = new WP_Query(
	array(
		'post_type'      => 'greshma_project',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'orderby'        => array(
			'menu_order' => 'ASC',
			'title'      => 'ASC',
		),
		'order'          => 'ASC',
	)
);
?>

<div class="projects-collaborations">

	<!-- ==========================================
	     SECTION LABEL
	=========================================== -->

	<div class="projects-subsection-label">
		3. Projects &amp; Collaborations
	</div>


	<?php if ( ! empty( $project_categories ) && ! is_wp_error( $project_categories ) ) : ?>

		<!-- ==========================================
		     FILTER PILLS
		=========================================== -->

		<div class="projects-collaborations__filters">

			<button
				type="button"
				class="projects-filter is-active"
				data-filter="all"
			>
				All
			</button>

			<?php foreach ( $project_categories as $category ) : ?>

				<button
					type="button"
					class="projects-filter"
					data-filter="<?php echo esc_attr( $category->slug ); ?>"
				>
					<?php echo esc_html( $category->name ); ?>
				</button>

			<?php endforeach; ?>

		</div>

	<?php endif; ?>


	<!-- ==========================================
	     PROJECT GRID
	=========================================== -->

	<div class="projects-collaborations__grid">

		<?php if ( $projects_query->have_posts() ) : ?>

			<?php while ( $projects_query->have_posts() ) : ?>

				<?php
				$projects_query->the_post();

				$project_id = get_the_ID();

				$location = get_post_meta(
					$project_id,
					'_greshma_project_location',
					true
				);

				$year = get_post_meta(
					$project_id,
					'_greshma_project_year',
					true
				);

				$project_url = get_post_meta(
					$project_id,
					'_greshma_project_url',
					true
				);

				$categories = get_the_terms(
					$project_id,
					'greshma_project_category'
				);

				$category_slugs = array();

				if ( $categories && ! is_wp_error( $categories ) ) {
					$category_slugs = wp_list_pluck(
						$categories,
						'slug'
					);
				}

				$filter_classes = implode(
					' ',
					array_map(
						'sanitize_html_class',
						$category_slugs
					)
				);

				$link = get_permalink();
				?>

				<article
					class="projects-collaboration-card"
					data-category="<?php echo esc_attr( $filter_classes ); ?>"
				>

					<!-- ==================================
					     PROJECT IMAGE
					=================================== -->

					<div class="projects-collaboration-card__image">

						<?php if ( has_post_thumbnail() ) : ?>

							<?php
							the_post_thumbnail(
								'large',
								array(
									'alt'     => the_title_attribute(
										array(
											'echo' => false,
										)
									),
									'loading' => 'lazy',
								)
							);
							?>

						<?php else : ?>

							<span>
								<?php esc_html_e(
									'Project image',
									'greshma'
								); ?>
							</span>

						<?php endif; ?>

					</div>


					<!-- ==================================
					     PROJECT CONTENT
					=================================== -->

					<div class="projects-collaboration-card__content">

						<h3>
							<?php the_title(); ?>
						</h3>


						<?php if ( $location || $year ) : ?>

							<div class="projects-collaboration-card__meta">

								<?php if ( $location ) : ?>

									<span>
										<?php echo esc_html( $location ); ?>
									</span>

								<?php endif; ?>


								<?php if ( $year ) : ?>

									<span>
										<?php echo esc_html( $year ); ?>
									</span>

								<?php endif; ?>

							</div>

						<?php endif; ?>


						<a
							href="<?php echo esc_url( $link ); ?>"
							
						>
							View Project
							<span aria-hidden="true">→</span>
						</a>

					</div>

				</article>

			<?php endwhile; ?>

			<?php wp_reset_postdata(); ?>

		<?php else : ?>

			<p class="projects-collaborations__empty">
				<?php esc_html_e(
					'Projects will be added soon.',
					'greshma'
				); ?>
			</p>

		<?php endif; ?>

	</div>

</div>