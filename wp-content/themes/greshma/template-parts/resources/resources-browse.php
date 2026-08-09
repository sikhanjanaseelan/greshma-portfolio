<?php
/**
 * Resources Page — Browse All Resources.
 *
 * Dynamic source:
 * Greshma Core → Resources.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;


/* ==========================================================
   RESOURCE TYPES
========================================================== */

$resource_types = array(

	'guide' => array(
		'label'        => __( 'Guide', 'greshma' ),
		'filter_label' => __( 'Guides', 'greshma' ),
	),

	'toolkit' => array(
		'label'        => __( 'Toolkit', 'greshma' ),
		'filter_label' => __( 'Toolkits', 'greshma' ),
	),

	'publication' => array(
		'label'        => __( 'Publication', 'greshma' ),
		'filter_label' => __( 'Publications', 'greshma' ),
	),

	'report' => array(
		'label'        => __( 'Report', 'greshma' ),
		'filter_label' => __( 'Reports', 'greshma' ),
	),

	'research' => array(
		'label'        => __( 'Research', 'greshma' ),
		'filter_label' => __( 'Research', 'greshma' ),
	),

	'download' => array(
		'label'        => __( 'Download', 'greshma' ),
		'filter_label' => __( 'Downloads', 'greshma' ),
	),

	'other' => array(
		'label'        => __( 'Other', 'greshma' ),
		'filter_label' => __( 'Other', 'greshma' ),
	),
);


/* ==========================================================
   RESOURCE QUERY
========================================================== */

$resources_query = new WP_Query(
	array(
		'post_type'      => 'greshma_resource',
		'post_status'    => 'publish',

		/*
		 * Load all resources here because the existing
		 * frontend JavaScript performs filtering,
		 * searching, sorting and Load More.
		 */
		'posts_per_page' => -1,

		'meta_key' => '_greshma_resource_display_order',

		'orderby' => array(
			'meta_value_num' => 'ASC',
			'date'           => 'DESC',
		),
	)
);


/* ==========================================================
   AVAILABLE TYPES
========================================================== */

/*
 * Only show type filters that are actually used by
 * published resources.
 */

$available_types = array();

if ( $resources_query->have_posts() ) {

	foreach ( $resources_query->posts as $resource_post ) {

		$resource_type = get_post_meta(
			$resource_post->ID,
			'_greshma_resource_type',
			true
		);

		if (
			$resource_type &&
			isset( $resource_types[ $resource_type ] )
		) {
			$available_types[ $resource_type ] = true;
		}
	}
}


/* ==========================================================
   AVAILABLE FORMATS
========================================================== */

$available_formats = array();

if ( $resources_query->have_posts() ) {

	foreach ( $resources_query->posts as $resource_post ) {

		$file_id = absint(
			get_post_meta(
				$resource_post->ID,
				'_greshma_resource_file_id',
				true
			)
		);

		if ( ! $file_id ) {
			continue;
		}

		$file_path = get_attached_file( $file_id );

		if ( ! $file_path ) {
			continue;
		}

		$extension = strtolower(
			pathinfo(
				$file_path,
				PATHINFO_EXTENSION
			)
		);

		if ( $extension ) {
			$available_formats[ $extension ] = true;
		}
	}
}

?>

<section
	class="resources-browse"
	id="resources-browse"
>

	<div class="container">


		<!-- ==========================================
		     SECTION HEADING
		=========================================== -->

		<div class="resources-browse__heading">

			<div>

				<span class="resources-browse__eyebrow">
					<?php esc_html_e(
						'Resource Library',
						'greshma'
					); ?>
				</span>

				<h2>
					<?php esc_html_e(
						'Browse All Resources',
						'greshma'
					); ?>
				</h2>

			</div>


			<p>
				<?php esc_html_e(
					'Explore practical resources created for learning, dialogue, facilitation, and community action.',
					'greshma'
				); ?>
			</p>

		</div>


		<!-- ==========================================
		     MAIN LAYOUT
		=========================================== -->

		<div class="resources-browse__layout">


			<!-- ======================================
			     LEFT FILTER SIDEBAR
			======================================= -->

			<aside class="resources-filter">


				<!-- TYPE -->

				<div class="resources-filter__group">

					<h3>
						<?php esc_html_e(
							'Filter by Type',
							'greshma'
						); ?>
					</h3>


					<div class="resources-filter__options">


						<label class="resources-filter__option">

							<input
								type="radio"
								name="resource-type"
								value="all"
								checked
							>

							<span class="resources-filter__radio"></span>

							<span>
								<?php esc_html_e(
									'All',
									'greshma'
								); ?>
							</span>

						</label>


						<?php
						foreach (
							$resource_types
							as $type_key => $type_data
						) :
							?>

							<?php
							if (
								! isset(
									$available_types[ $type_key ]
								)
							) {
								continue;
							}
							?>

							<label class="resources-filter__option">

								<input
									type="radio"
									name="resource-type"
									value="<?php echo esc_attr( $type_key ); ?>"
								>

								<span class="resources-filter__radio"></span>

								<span>
									<?php
									echo esc_html(
										$type_data['filter_label']
									);
									?>
								</span>

							</label>

						<?php endforeach; ?>

					</div>

				</div>


				<!-- FORMAT -->

				<?php if ( ! empty( $available_formats ) ) : ?>

					<div class="resources-filter__group">

						<h3>
							<?php esc_html_e(
								'Format',
								'greshma'
							); ?>
						</h3>


						<div class="resources-filter__formats">

							<?php
							foreach (
								$available_formats
								as $format => $unused
							) :
								?>

								<button
									type="button"
									class="resources-format"
									data-resource-format="<?php echo esc_attr( $format ); ?>"
								>
									<?php
									echo esc_html(
										strtoupper( $format )
									);
									?>
								</button>

							<?php endforeach; ?>

						</div>

					</div>

				<?php endif; ?>


				<!-- RESET -->

				<button
					type="button"
					class="resources-filter__reset"
				>
					<?php esc_html_e(
						'Reset Filters',
						'greshma'
					); ?>
				</button>

			</aside>


			<!-- ======================================
			     RIGHT RESOURCE AREA
			======================================= -->

			<div class="resources-library">


				<!-- SEARCH + SORT -->

				<div class="resources-library__toolbar">


					<!-- SEARCH -->

					<label class="resources-library__search">

						<span class="screen-reader-text">
							<?php esc_html_e(
								'Search Resources',
								'greshma'
							); ?>
						</span>


						<svg
							viewBox="0 0 24 24"
							aria-hidden="true"
						>
							<circle
								cx="10.5"
								cy="10.5"
								r="6.5"
							/>

							<path d="M16 16l5 5"/>
						</svg>


						<input
							type="search"
							placeholder="<?php esc_attr_e(
								'Search resources...',
								'greshma'
							); ?>"
							data-resource-search
						>

					</label>


					<!-- SORT -->

					<label class="resources-library__sort">

						<span>
							<?php esc_html_e(
								'Sort by',
								'greshma'
							); ?>
						</span>


						<select data-resource-sort>

							<option value="recent">
								<?php esc_html_e(
									'Most Recent',
									'greshma'
								); ?>
							</option>

							<option value="az">
								<?php esc_html_e(
									'A–Z',
									'greshma'
								); ?>
							</option>

							<option value="type">
								<?php esc_html_e(
									'Resource Type',
									'greshma'
								); ?>
							</option>

						</select>

					</label>

				</div>


				<!-- ==================================
				     RESOURCE GRID
				=================================== -->

				<div
					class="resources-library__grid"
					data-resource-grid
				>

					<?php if ( $resources_query->have_posts() ) : ?>


						<?php
						while (
							$resources_query->have_posts()
						) :
							$resources_query->the_post();


							/* ==============================
							   RESOURCE ID
							============================== */

							$resource_id = get_the_ID();


							/* ==============================
							   TYPE
							============================== */

							$type = get_post_meta(
								$resource_id,
								'_greshma_resource_type',
								true
							);

							$type = $type ?: 'other';

							$type_label = isset(
								$resource_types[ $type ]
							)
								? $resource_types[ $type ]['label']
								: __( 'Resource', 'greshma' );


							/* ==============================
							   CATEGORY
							============================== */

							$categories = get_the_terms(
								$resource_id,
								'greshma_resource_category'
							);

							$category_slugs = array();

							if (
								$categories &&
								! is_wp_error( $categories )
							) {

								foreach (
									$categories
									as $category
								) {

									$category_slugs[] =
										$category->slug;
								}
							}

							$category_data = implode(
								' ',
								$category_slugs
							);


							/* ==============================
							   FILE
							============================== */

							$file_id = absint(
								get_post_meta(
									$resource_id,
									'_greshma_resource_file_id',
									true
								)
							);

							$file_url = $file_id
								? wp_get_attachment_url(
									$file_id
								)
								: '';


							/* ==============================
							   FORMAT + SIZE
							============================== */

							$file_format = '';
							$file_size   = '';

							if ( $file_id ) {

								$file_path = get_attached_file(
									$file_id
								);

								if ( $file_path ) {

									$file_format = strtolower(
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


							/* ==============================
							   EXTERNAL URL
							============================== */

							$external_url = get_post_meta(
								$resource_id,
								'_greshma_resource_external_url',
								true
							);


							/* ==============================
							   DESTINATION
							============================== */

							if ( $file_url ) {

								$destination = $file_url;

							} elseif ( $external_url ) {

								$destination = $external_url;

							} else {

								$destination = get_permalink(
									$resource_id
								);
							}


							/* ==============================
							   DESCRIPTION
							============================== */

							$description = get_the_excerpt();

							if ( ! $description ) {

								$description = wp_trim_words(
									wp_strip_all_tags(
										get_the_content()
									),
									22,
									'…'
								);
							}


							/* ==============================
							   SORT DATE
							============================== */

							$published_timestamp =
								get_post_time(
									'U',
									true,
									$resource_id
								);
							?>


							<article
								class="resource-library-card"
								data-resource-item
								data-type="<?php echo esc_attr( $type ); ?>"
								data-category="<?php echo esc_attr( $category_data ); ?>"
								data-format="<?php echo esc_attr( $file_format ); ?>"
								data-date="<?php echo esc_attr( $published_timestamp ); ?>"
							>


								<!-- IMAGE -->

								<div class="resource-library-card__image">


									<?php if ( has_post_thumbnail() ) : ?>

										<?php
										the_post_thumbnail(
											'medium_large',
											array(
												'class' =>
													'resource-library-card__image-file',

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

										<div class="resource-library-card__placeholder">

											<span>
												<?php
												echo esc_html(
													$type_label
												);
												?>
											</span>

										</div>

									<?php endif; ?>


									<span class="resource-library-card__badge">

										<?php
										echo esc_html(
											$type_label
										);
										?>

									</span>

								</div>


								<!-- CONTENT -->

								<div class="resource-library-card__content">

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


									<div class="resource-library-card__footer">


										<div class="resource-library-card__meta">


											<?php if ( $file_format ) : ?>

												<span>

													<?php
													echo esc_html(
														strtoupper(
															$file_format
														)
													);
													?>

												</span>

											<?php endif; ?>


											<?php if (
												$file_format &&
												$file_size
											) : ?>

												<span
													class="resource-library-card__dot"
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


											<?php if (
												! $file_format &&
												$external_url
											) : ?>

												<span>
													<?php esc_html_e(
														'Online',
														'greshma'
													); ?>
												</span>

											<?php endif; ?>


										</div>


										<a
											href="<?php echo esc_url( $destination ); ?>"
											class="resource-library-card__download"
											aria-label="<?php echo esc_attr(
												sprintf(
													__(
														'Open %s',
														'greshma'
													),
													get_the_title()
												)
											); ?>"
											<?php
											if (
												$file_url ||
												$external_url
											) :
												?>
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


						<div class="resources-library__empty">

							<p>
								<?php esc_html_e(
									'Resources will appear here soon.',
									'greshma'
								); ?>
							</p>

						</div>


					<?php endif; ?>

				</div>


				<!-- ==================================
				     NO FILTER RESULTS
				=================================== -->

				<div
					class="resources-library__no-results"
					data-resource-no-results
					hidden
				>

					<p>
						<?php esc_html_e(
							'No resources match your current filters.',
							'greshma'
						); ?>
					</p>

				</div>


				<!-- LOAD MORE -->

				<div
					class="resources-library__more"
					data-resource-more-wrap
				>

					<button
						type="button"
						class="resources-library__more-button"
						data-resource-load-more
					>

						<?php esc_html_e(
							'Load More Resources',
							'greshma'
						); ?>

						<span aria-hidden="true">
							↓
						</span>

					</button>

				</div>

			</div>

		</div>

	</div>

</section>