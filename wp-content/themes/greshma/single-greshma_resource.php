<?php
/**
 * Single Resource Template.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

get_header();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();

		$resource_id = get_the_ID();


		/* ======================================================
		   RESOURCE META
		====================================================== */

		$type = get_post_meta(
			$resource_id,
			'_greshma_resource_type',
			true
		);

		$author = get_post_meta(
			$resource_id,
			'_greshma_resource_author',
			true
		);

		$year = get_post_meta(
			$resource_id,
			'_greshma_resource_year',
			true
		);

		$external_url = get_post_meta(
			$resource_id,
			'_greshma_resource_external_url',
			true
		);

		$file_id = absint(
			get_post_meta(
				$resource_id,
				'_greshma_resource_file_id',
				true
			)
		);

		$file_url = $file_id
			? wp_get_attachment_url( $file_id )
			: '';


		/* ======================================================
		   TYPE LABEL
		====================================================== */

		$type_labels = array(
			'guide'       => __( 'Guide', 'greshma' ),
			'toolkit'     => __( 'Toolkit', 'greshma' ),
			'publication' => __( 'Publication', 'greshma' ),
			'report'      => __( 'Report', 'greshma' ),
			'research'    => __( 'Research', 'greshma' ),
			'download'    => __( 'Download', 'greshma' ),
			'other'       => __( 'Resource', 'greshma' ),
		);

		$type_label = isset( $type_labels[ $type ] )
			? $type_labels[ $type ]
			: __( 'Resource', 'greshma' );


		/* ======================================================
		   FILE DETAILS
		====================================================== */

		$file_format = '';
		$file_size   = '';

		if ( $file_id ) {

			$file_path = get_attached_file( $file_id );

			if ( $file_path ) {

				$file_format = strtoupper(
					pathinfo(
						$file_path,
						PATHINFO_EXTENSION
					)
				);
			}

			if (
				$file_path &&
				file_exists( $file_path )
			) {

				$file_size = size_format(
					filesize( $file_path ),
					1
				);
			}
		}


		/* ======================================================
		   RESOURCE CATEGORIES
		====================================================== */

		$categories = get_the_terms(
			$resource_id,
			'greshma_resource_category'
		);


		/* ======================================================
		   PRIMARY ACTION
		====================================================== */

		$primary_url = '';

		if ( $file_url ) {

			$primary_url = $file_url;

		} elseif ( $external_url ) {

			$primary_url = $external_url;
		}
		?>

		<main
			id="primary"
			class="single-resource"
		>


			<!-- =================================================
			     HERO
			================================================= -->

			<section class="single-resource__hero">

				<div class="container">

					<a
						href="<?php echo esc_url(
							get_post_type_archive_link(
								'greshma_resource'
							)
						); ?>"
						class="single-resource__back"
					>
						<span aria-hidden="true">
							←
						</span>

						<?php esc_html_e(
							'Back to Resource Library',
							'greshma'
						); ?>
					</a>


					<div class="single-resource__hero-layout">


						<!-- =====================================
						     CONTENT
						===================================== -->

						<div class="single-resource__hero-content">


							<span class="single-resource__type">
								<?php echo esc_html( $type_label ); ?>
							</span>


							<h1>
								<?php the_title(); ?>
							</h1>


							<?php if ( has_excerpt() ) : ?>

								<p class="single-resource__intro">
									<?php echo esc_html(
										get_the_excerpt()
									); ?>
								</p>

							<?php endif; ?>


							<div class="single-resource__meta">


								<?php if ( $author ) : ?>

									<div>

										<span>
											<?php esc_html_e(
												'Author / Organization',
												'greshma'
											); ?>
										</span>

										<strong>
											<?php echo esc_html( $author ); ?>
										</strong>

									</div>

								<?php endif; ?>


								<?php if ( $year ) : ?>

									<div>

										<span>
											<?php esc_html_e(
												'Published',
												'greshma'
											); ?>
										</span>

										<strong>
											<?php echo esc_html( $year ); ?>
										</strong>

									</div>

								<?php endif; ?>


								<?php if ( $file_format ) : ?>

									<div>

										<span>
											<?php esc_html_e(
												'Format',
												'greshma'
											); ?>
										</span>

										<strong>
											<?php echo esc_html( $file_format ); ?>
										</strong>

									</div>

								<?php endif; ?>


								<?php if ( $file_size ) : ?>

									<div>

										<span>
											<?php esc_html_e(
												'File Size',
												'greshma'
											); ?>
										</span>

										<strong>
											<?php echo esc_html( $file_size ); ?>
										</strong>

									</div>

								<?php endif; ?>


							</div>


							<?php if ( $primary_url ) : ?>

								<a
									href="<?php echo esc_url( $primary_url ); ?>"
									class="single-resource__primary-button"
									target="_blank"
									rel="noopener noreferrer"
								>

									<?php
									echo esc_html(
										$file_url
											? __( 'Download Resource', 'greshma' )
											: __( 'Open Resource', 'greshma' )
									);
									?>

									<span aria-hidden="true">
										<?php echo $file_url ? '↓' : '↗'; ?>
									</span>

								</a>

							<?php endif; ?>


						</div>


						<!-- =====================================
						     IMAGE
						===================================== -->

						<div class="single-resource__visual">

							<?php if ( has_post_thumbnail() ) : ?>

								<?php
								the_post_thumbnail(
									'large',
									array(
										'class'    => 'single-resource__image',
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

								<div class="single-resource__placeholder">

									<span>
										<?php echo esc_html( $type_label ); ?>
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

			<section class="single-resource__body">

				<div class="container">

					<div class="single-resource__body-layout">


						<article class="single-resource__content">

							<?php the_content(); ?>

						</article>


						<aside class="single-resource__sidebar">


							<?php if (
								$categories &&
								! is_wp_error( $categories )
							) : ?>

								<div class="single-resource__sidebar-block">

									<h2>
										<?php esc_html_e(
											'Categories',
											'greshma'
										); ?>
									</h2>

									<div class="single-resource__categories">

										<?php foreach ( $categories as $category ) : ?>

											<span>
												<?php echo esc_html(
													$category->name
												); ?>
											</span>

										<?php endforeach; ?>

									</div>

								</div>

							<?php endif; ?>


							<?php if ( $primary_url ) : ?>

								<div class="single-resource__download-card">

									<span class="single-resource__download-eyebrow">
										<?php esc_html_e(
											'Resource Access',
											'greshma'
										); ?>
									</span>

									<h2>
										<?php
										echo esc_html(
											$file_url
												? __( 'Ready to download?', 'greshma' )
												: __( 'Continue to resource', 'greshma' )
										);
										?>
									</h2>


									<a
										href="<?php echo esc_url( $primary_url ); ?>"
										target="_blank"
										rel="noopener noreferrer"
									>

										<?php
										echo esc_html(
											$file_url
												? __( 'Download Resource', 'greshma' )
												: __( 'Open Resource', 'greshma' )
										);
										?>

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
			     RELATED RESOURCES
			================================================= -->

			<?php
			$related_args = array(
				'post_type'      => 'greshma_resource',
				'post_status'    => 'publish',
				'posts_per_page' => 3,
				'post__not_in'   => array( $resource_id ),
			);


			if (
				$categories &&
				! is_wp_error( $categories )
			) {

				$related_args['tax_query'] = array(
					array(
						'taxonomy' => 'greshma_resource_category',
						'field'    => 'term_id',
						'terms'    => wp_list_pluck(
							$categories,
							'term_id'
						),
					),
				);
			}


			$related_resources = new WP_Query(
				$related_args
			);
			?>


			<?php if ( $related_resources->have_posts() ) : ?>

				<section class="single-resource__related">

					<div class="container">

						<div class="single-resource__related-heading">

							<h2>
								<?php esc_html_e(
									'Related Resources',
									'greshma'
								); ?>
							</h2>

							<a
								href="<?php echo esc_url(
									get_post_type_archive_link(
										'greshma_resource'
									)
								); ?>"
							>

								<?php esc_html_e(
									'View All Resources',
									'greshma'
								); ?>

								<span aria-hidden="true">
									→
								</span>

							</a>

						</div>


						<div class="single-resource__related-grid">

							<?php
							while ( $related_resources->have_posts() ) :
								$related_resources->the_post();

								$related_type = get_post_meta(
									get_the_ID(),
									'_greshma_resource_type',
									true
								);

								$related_type_label =
									isset( $type_labels[ $related_type ] )
										? $type_labels[ $related_type ]
										: __( 'Resource', 'greshma' );
								?>

								<article class="single-resource-related-card">

									<a
										href="<?php the_permalink(); ?>"
										class="single-resource-related-card__image"
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
												<?php echo esc_html(
													$related_type_label
												); ?>
											</span>

										<?php endif; ?>

									</a>


									<div class="single-resource-related-card__content">

										<span>
											<?php echo esc_html(
												$related_type_label
											); ?>
										</span>

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