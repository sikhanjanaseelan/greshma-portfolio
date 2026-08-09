<?php
/**
 * Resources Page — Featured Resources.
 *
 * Dynamic source:
 * Greshma Core → Resources marked as Featured.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;


/* ==========================================================
   FEATURED RESOURCES QUERY
========================================================== */

$featured_resources = new WP_Query(
	array(
		'post_type'      => 'greshma_resource',
		'post_status'    => 'publish',
		'posts_per_page' => 4,

		'meta_query' => array(
			array(
				'key'     => '_greshma_resource_featured',
				'value'   => '1',
				'compare' => '=',
			),
		),

		'meta_key' => '_greshma_resource_display_order',

		'orderby' => array(
			'meta_value_num' => 'ASC',
			'date'           => 'DESC',
		),
	)
);


/* ==========================================================
   RESOURCE TYPE LABELS
========================================================== */

$type_labels = array(
	'guide'       => __( 'Guide', 'greshma' ),
	'toolkit'     => __( 'Toolkit', 'greshma' ),
	'publication' => __( 'Publication', 'greshma' ),
	'report'      => __( 'Report', 'greshma' ),
	'research'    => __( 'Research', 'greshma' ),
	'download'    => __( 'Download', 'greshma' ),
	'other'       => __( 'Other', 'greshma' ),
);
?>

<section class="resources-featured">

	<div class="container">


		<!-- ==================================================
		     SECTION HEADING
		================================================== -->

		<div class="resources-featured__heading">

			<div class="resources-featured__title-wrap">

				<span
					class="resources-featured__leaf"
					aria-hidden="true"
				>
					❧
				</span>

				<h2>
					<?php esc_html_e(
						'Featured Resources',
						'greshma'
					); ?>
				</h2>

			</div>


			<a
				href="#resources-browse"
				class="resources-featured__view-all"
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


		<!-- ==================================================
		     RESOURCE CARDS
		================================================== -->

		<div class="resources-featured__grid">

			<?php if ( $featured_resources->have_posts() ) : ?>

				<?php
				while ( $featured_resources->have_posts() ) :
					$featured_resources->the_post();

					$resource_id = get_the_ID();


					/* ==========================================
					   TYPE
					========================================== */

					$type = get_post_meta(
						$resource_id,
						'_greshma_resource_type',
						true
					);

					$type_label = isset( $type_labels[ $type ] )
						? $type_labels[ $type ]
						: __( 'Resource', 'greshma' );


					/* ==========================================
					   DOWNLOAD FILE
					========================================== */

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


					/* ==========================================
					   EXTERNAL URL
					========================================== */

					$external_url = get_post_meta(
						$resource_id,
						'_greshma_resource_external_url',
						true
					);


					/* ==========================================
					   DESTINATION
					========================================== */

					if ( $file_url ) {

						$destination = $file_url;

					} elseif ( $external_url ) {

						$destination = $external_url;

					} else {

						$destination = get_permalink();
					}


					/* ==========================================
					   FILE FORMAT + SIZE
					========================================== */

					$file_format = '';
					$file_size   = '';

					if ( $file_id ) {

						$file_path = get_attached_file(
							$file_id
						);

						$file_type = get_post_mime_type(
							$file_id
						);

						if ( $file_type ) {

							$mime_parts = explode(
								'/',
								$file_type
							);

							$file_format = isset( $mime_parts[1] )
								? strtoupper(
									$mime_parts[1]
								)
								: '';
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


					/* ==========================================
					   DESCRIPTION
					========================================== */

					$description = get_the_excerpt();

					if ( empty( $description ) ) {

						$description = wp_trim_words(
							wp_strip_all_tags(
								get_the_content()
							),
							22,
							'…'
						);
					}
					?>

					<article class="resources-feature-card">


						<!-- ======================================
						     IMAGE
						====================================== -->

						<div class="resources-feature-card__image">

							<?php if ( has_post_thumbnail() ) : ?>

								<?php
								the_post_thumbnail(
									'medium_large',
									array(
										'class'    => 'resources-feature-card__image-file',
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

								<div class="resources-feature-card__placeholder">

									<span>
										<?php
										echo esc_html(
											$type_label
										);
										?>
									</span>

								</div>

							<?php endif; ?>


							<span class="resources-feature-card__badge">

								<?php
								echo esc_html(
									$type_label
								);
								?>

							</span>

						</div>


						<!-- ======================================
						     CONTENT
						====================================== -->

						<div class="resources-feature-card__content">

							<h3>
								<?php the_title(); ?>
							</h3>


							<?php if ( $description ) : ?>

								<p>
									<?php
									echo esc_html(
										wp_trim_words(
											$description,
											22,
											'…'
										)
									);
									?>
								</p>

							<?php endif; ?>


							<div class="resources-feature-card__footer">

								<div class="resources-feature-card__meta">

									<?php if ( $file_format ) : ?>

										<span>
											<?php
											echo esc_html(
												$file_format
											);
											?>
										</span>

									<?php endif; ?>


									<?php if ( $file_format && $file_size ) : ?>

										<span
											class="resources-feature-card__dot"
											aria-hidden="true"
										></span>

									<?php endif; ?>


									<?php if ( $file_size ) : ?>

										<span>
											<?php
											echo esc_html(
												$file_size
											);
											?>
										</span>

									<?php endif; ?>

								</div>


								<a
									href="<?php echo esc_url( $destination ); ?>"
									class="resources-feature-card__download"
									aria-label="<?php echo esc_attr(
										sprintf(
											__(
												'Open %s',
												'greshma'
											),
											get_the_title()
										)
									); ?>"
									<?php if ( $file_url || $external_url ) : ?>
										target="_blank"
										rel="noopener noreferrer"
									<?php endif; ?>
								>

									<svg
										viewBox="0 0 24 24"
										aria-hidden="true"
									>
										<path d="M12 3v12"/>
										<path d="m7 10 5 5 5-5"/>
										<path d="M5 20h14"/>
									</svg>

								</a>

							</div>

						</div>

					</article>

				<?php endwhile; ?>


				<?php wp_reset_postdata(); ?>


			<?php else : ?>

				<div class="resources-featured__empty">

					<p>
						<?php
						esc_html_e(
							'Featured resources will appear here soon.',
							'greshma'
						);
						?>
					</p>

				</div>

			<?php endif; ?>

		</div>

	</div>

</section>