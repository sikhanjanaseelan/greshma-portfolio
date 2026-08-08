<?php
/**
 * Journal Page — Latest Reflections.
 *
 * Pulls recent Reflection editorial items dynamically
 * from the Greshma Core Editorial module.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

/**
 * Get the currently featured Editorial so we can exclude it
 * from Latest Reflections and avoid duplicate content.
 */
$featured_editorial_ids = get_posts(
	array(
		'post_type'      => 'greshma_editorial',
		'post_status'    => 'publish',
		'posts_per_page' => 1,
		'fields'         => 'ids',
		'meta_query'     => array(
			array(
				'key'     => '_greshma_editorial_is_featured',
				'value'   => '1',
				'compare' => '=',
			),
		),
		'orderby'        => 'date',
		'order'          => 'DESC',
	)
);

$excluded_ids = ! empty( $featured_editorial_ids )
	? $featured_editorial_ids
	: array();

/**
 * Query latest Reflection editorials.
 */
$latest_reflections = new WP_Query(
	array(
		'post_type'           => 'greshma_editorial',
		'post_status'         => 'publish',
		'posts_per_page'      => 3,
		'post__not_in'        => $excluded_ids,
		'ignore_sticky_posts' => true,
		'orderby'             => 'date',
		'order'               => 'DESC',
		'tax_query'           => array(
			array(
				'taxonomy' => 'greshma_editorial_type',
				'field'    => 'slug',
				'terms'    => array(
					'reflection',
				),
			),
		),
	)
);

if ( ! $latest_reflections->have_posts() ) {
	return;
}

$editorial_archive_url = get_post_type_archive_link(
	'greshma_editorial'
);

$reflection_archive_url = add_query_arg(
	'editorial_type',
	'reflection',
	$editorial_archive_url
);
?>

<section class="journal-latest">

	<!-- ==========================================
	     SECTION HEADER
	=========================================== -->

	<div class="journal-section-heading">

		<h2>
			<?php esc_html_e( 'Latest Reflections', 'greshma' ); ?>
		</h2>

		<a href="<?php echo esc_url( $reflection_archive_url ); ?>">

			<?php esc_html_e( 'View All', 'greshma' ); ?>

			<span aria-hidden="true">
				→
			</span>

		</a>

	</div>


	<!-- ==========================================
	     POSTS
	=========================================== -->

	<div class="journal-latest__grid">

		<?php
		while ( $latest_reflections->have_posts() ) :
			$latest_reflections->the_post();

			$editorial_id = get_the_ID();

			$summary = get_post_meta(
				$editorial_id,
				'_greshma_editorial_summary',
				true
			);

			if ( empty( $summary ) ) {
				$summary = wp_trim_words(
					get_the_excerpt(),
					20,
					'…'
				);
			}

			$manual_reading_time = (int) get_post_meta(
				$editorial_id,
				'_greshma_editorial_reading_time_override',
				true
			);

			$automatic_reading_time = (int) get_post_meta(
				$editorial_id,
				'_greshma_editorial_reading_time',
				true
			);

			$reading_time = $manual_reading_time > 0
				? $manual_reading_time
				: $automatic_reading_time;

			$editorial_types = get_the_terms(
				$editorial_id,
				'greshma_editorial_type'
			);

			$editorial_type_name = '';

			if (
				! empty( $editorial_types ) &&
				! is_wp_error( $editorial_types )
			) {
				$editorial_type_name = $editorial_types[0]->name;
			}
			?>

			<article class="journal-latest-card">

				<!-- IMAGE -->

				<a
					class="journal-latest-card__image-link"
					href="<?php the_permalink(); ?>"
					aria-label="<?php echo esc_attr( get_the_title() ); ?>"
				>

					<div class="journal-latest-card__image">

						<?php if ( has_post_thumbnail() ) : ?>

							<?php
							the_post_thumbnail(
								'medium_large',
								array(
									'class'    => 'journal-latest-card__image-file',
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

							<div class="journal-latest-card__image-placeholder">

								<span aria-hidden="true">
									❧
								</span>

							</div>

						<?php endif; ?>

					</div>

				</a>


				<!-- CONTENT -->

				<div class="journal-latest-card__content">

					<?php if ( $editorial_type_name ) : ?>

						<span class="journal-latest-card__category">

							<?php
							echo esc_html(
								$editorial_type_name
							);
							?>

						</span>

					<?php endif; ?>


					<h3>

						<a href="<?php the_permalink(); ?>">

							<?php the_title(); ?>

						</a>

					</h3>


					<?php if ( $summary ) : ?>

						<p>

							<?php
							echo esc_html(
								wp_trim_words(
									$summary,
									20,
									'…'
								)
							);
							?>

						</p>

					<?php endif; ?>


					<div class="journal-latest-card__meta">

						<span>
							<?php echo esc_html( get_the_date() ); ?>
						</span>


						<?php if ( $reading_time > 0 ) : ?>

							<span
								class="journal-latest-card__dot"
								aria-hidden="true"
							></span>


							<span>

								<?php
								printf(
									/* translators: %d: Reading time in minutes. */
									esc_html(
										_n(
											'%d min read',
											'%d min read',
											$reading_time,
											'greshma'
										)
									),
									$reading_time
								);
								?>

							</span>

						<?php endif; ?>

					</div>

				</div>

			</article>

		<?php endwhile; ?>

	</div>

</section>

<?php
wp_reset_postdata();