<?php
/**
 * Journal Page — Featured Editorial Story.
 *
 * Pulls the featured story dynamically from
 * the Greshma Core Editorial module.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

/**
 * First try to find an Editorial explicitly marked as featured.
 */
$featured_query = new WP_Query(
	array(
		'post_type'      => 'greshma_editorial',
		'post_status'    => 'publish',
		'posts_per_page' => 1,
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

/**
 * If no Editorial has been marked Featured,
 * fall back to the latest published Editorial.
 */
if ( ! $featured_query->have_posts() ) {

	$featured_query = new WP_Query(
		array(
			'post_type'      => 'greshma_editorial',
			'post_status'    => 'publish',
			'posts_per_page' => 1,
			'orderby'        => 'date',
			'order'          => 'DESC',
		)
	);
}

if ( ! $featured_query->have_posts() ) {
	return;
}

$featured_query->the_post();

$featured_id = get_the_ID();

/**
 * Editorial summary.
 */
$summary = get_post_meta(
	$featured_id,
	'_greshma_editorial_summary',
	true
);

if ( empty( $summary ) ) {
	$summary = wp_trim_words(
		get_the_excerpt(),
		28,
		'…'
	);
}

/**
 * Reading time.
 */
$manual_reading_time = (int) get_post_meta(
	$featured_id,
	'_greshma_editorial_reading_time_override',
	true
);

$automatic_reading_time = (int) get_post_meta(
	$featured_id,
	'_greshma_editorial_reading_time',
	true
);

$reading_time = $manual_reading_time > 0
	? $manual_reading_time
	: $automatic_reading_time;

/**
 * External/original publication URL.
 */
$external_url = get_post_meta(
	$featured_id,
	'_greshma_editorial_external_url',
	true
);

/**
 * Editorial type.
 */
$editorial_types = get_the_terms(
	$featured_id,
	'greshma_editorial_type'
);

$editorial_type_name = '';

if (
	! empty( $editorial_types ) &&
	! is_wp_error( $editorial_types )
) {
	$editorial_type_name = $editorial_types[0]->name;
}

/**
 * Optional quote.
 *
 * For now this uses the excerpt if available.
 * Later we can add a dedicated Featured Quote field
 * to the Editorial admin if we decide it is useful.
 */
$featured_quote = get_the_excerpt();

if ( empty( $featured_quote ) ) {
	$featured_quote = $summary;
}
?>

<section class="journal-featured">

	<div class="journal-featured__card">

		<!-- ==========================================
		     LEFT VISUAL
		=========================================== -->

		<div class="journal-featured__visual">

			<?php if ( has_post_thumbnail() ) : ?>

				<a
					href="<?php the_permalink(); ?>"
					class="journal-featured__image-link"
					aria-label="<?php echo esc_attr( get_the_title() ); ?>"
				>

					<?php
					the_post_thumbnail(
						'large',
						array(
							'class'    => 'journal-featured__image',
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

				</a>

			<?php else : ?>

				<div class="journal-featured__image-placeholder">

					<span>
						<?php esc_html_e(
							'Featured Editorial',
							'greshma'
						); ?>
					</span>

				</div>

			<?php endif; ?>

			<span
				class="journal-featured__decor"
				aria-hidden="true"
			>
				❧
			</span>

		</div>


		<!-- ==========================================
		     RIGHT CONTENT
		=========================================== -->

		<div class="journal-featured__content">

			<div class="journal-featured__eyebrow">

				<span
					class="journal-featured__eyebrow-line"
					aria-hidden="true"
				></span>

				<span>
					<?php esc_html_e(
						'Featured Story',
						'greshma'
					); ?>
				</span>

			</div>


			<?php if ( $editorial_type_name ) : ?>

				<span class="journal-featured__category">
					<?php echo esc_html( $editorial_type_name ); ?>
				</span>

			<?php endif; ?>


			<h2>
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h2>


			<div class="journal-featured__meta">

				<span>
					<?php echo esc_html( get_the_date() ); ?>
				</span>

				<?php if ( $reading_time > 0 ) : ?>

					<span
						class="journal-featured__meta-dot"
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


			<?php if ( $summary ) : ?>

				<p class="journal-featured__excerpt">
					<?php echo esc_html( $summary ); ?>
				</p>

			<?php endif; ?>


			<?php if ( $featured_quote ) : ?>

				<blockquote class="journal-featured__quote">

					<span
						class="journal-featured__quote-mark"
						aria-hidden="true"
					>
						“
					</span>

					<p>
						<?php
						echo esc_html(
							wp_trim_words(
								$featured_quote,
								22,
								'…'
							)
						);
						?>
					</p>

				</blockquote>

			<?php endif; ?>


			<div class="journal-featured__actions">

				<a
					href="<?php the_permalink(); ?>"
					class="
						journal-featured__button
						journal-featured__button--primary
					"
				>
					<?php esc_html_e(
						'Read Story',
						'greshma'
					); ?>

					<span aria-hidden="true">
						→
					</span>
				</a>


				<?php if ( $external_url ) : ?>

					<a
						href="<?php echo esc_url( $external_url ); ?>"
						class="
							journal-featured__button
							journal-featured__button--secondary
						"
						target="_blank"
						rel="noopener noreferrer"
					>

						<?php esc_html_e(
							'View Original',
							'greshma'
						); ?>

						<span aria-hidden="true">
							↗
						</span>

					</a>

				<?php endif; ?>

			</div>

		</div>

	</div>

</section>

<?php
wp_reset_postdata();