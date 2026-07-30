<?php
/**
 * Single Editorial template.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();

	$post_id = get_the_ID();

	$summary = get_post_meta(
		$post_id,
		'_greshma_editorial_summary',
		true
	);

	$manual_reading_time = (int) get_post_meta(
		$post_id,
		'_greshma_editorial_reading_time_override',
		true
	);

	$automatic_reading_time = (int) get_post_meta(
		$post_id,
		'_greshma_editorial_reading_time',
		true
	);

	$reading_time = $manual_reading_time > 0
		? $manual_reading_time
		: $automatic_reading_time;

	$editorial_types = get_the_terms(
		$post_id,
		'greshma_editorial_type'
	);

	$editorial_topics = get_the_terms(
		$post_id,
		'greshma_editorial_topic'
	);
	?>

	<main id="primary" class="site-main editorial-single">

		<article
			id="post-<?php the_ID(); ?>"
			<?php post_class( 'editorial-single__article' ); ?>
		>

			<header class="editorial-single__header">

				<div class="container">

					<div class="editorial-single__header-inner">

						<?php
						if (
							! empty( $editorial_types ) &&
							! is_wp_error( $editorial_types )
						) :
							?>

							<p class="editorial-single__type">
								<?php echo esc_html( $editorial_types[0]->name ); ?>
							</p>

						<?php endif; ?>

						<h1 class="editorial-single__title">
							<?php the_title(); ?>
						</h1>

						<?php if ( ! empty( $summary ) ) : ?>

							<p class="editorial-single__summary">
								<?php echo esc_html( $summary ); ?>
							</p>

						<?php endif; ?>

						<div class="editorial-single__meta">

							<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
								<?php echo esc_html( get_the_date() ); ?>
							</time>

							<?php if ( $reading_time > 0 ) : ?>

								<span aria-hidden="true">•</span>

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

				</div>

			</header>

			<?php if ( has_post_thumbnail() ) : ?>

				<div class="editorial-single__featured">

					<div class="container">

						<figure class="editorial-single__featured-figure">

							<?php
							the_post_thumbnail(
								'full',
								array(
									'class'    => 'editorial-single__featured-image',
									'loading'  => 'eager',
									'decoding' => 'async',
								)
							);
							?>

							<?php
							$featured_caption = get_the_post_thumbnail_caption();

							if ( ! empty( $featured_caption ) ) :
								?>

								<figcaption class="editorial-single__featured-caption">
									<?php echo wp_kses_post( $featured_caption ); ?>
								</figcaption>

							<?php endif; ?>

						</figure>

					</div>

				</div>

			<?php endif; ?>

			<div class="editorial-single__body">

				<div class="container">

					<div class="editorial-single__content">

						<?php
						the_content();

						wp_link_pages(
							array(
								'before' => '<nav class="editorial-single__page-links">' .
									esc_html__( 'Pages:', 'greshma' ),
								'after'  => '</nav>',
							)
						);
						?>

					</div>

					<?php
					if (
						! empty( $editorial_topics ) &&
						! is_wp_error( $editorial_topics )
					) :
						?>

						<footer class="editorial-single__footer">

							<div class="editorial-single__topics">

								<p class="editorial-single__topics-label">
									<?php esc_html_e( 'Topics', 'greshma' ); ?>
								</p>

								<div class="editorial-single__topics-list">

									<?php foreach ( $editorial_topics as $topic ) : ?>

										<a
											class="editorial-single__topic"
											href="<?php echo esc_url(
												add_query_arg(
													'editorial_topic',
													$topic->slug,
													get_post_type_archive_link( 'greshma_editorial' )
												)
											); ?>"
										>
											<?php echo esc_html( $topic->name ); ?>
										</a>

									<?php endforeach; ?>

								</div>

							</div>

						</footer>

					<?php endif; ?>

		<?php
$previous_post = get_previous_post();
$next_post     = get_next_post();

if ( $previous_post || $next_post ) :
?>

<nav
	class="editorial-single__navigation"
	aria-label="<?php esc_attr_e( 'Editorial navigation', 'greshma' ); ?>"
>

	<div class="editorial-single__navigation-item editorial-single__navigation-item--previous">

		<?php if ( $previous_post ) : ?>

			<span class="editorial-single__navigation-label">
				<?php esc_html_e( 'Previous Editorial', 'greshma' ); ?>
			</span>

			<a href="<?php echo esc_url( get_permalink( $previous_post ) ); ?>">
				<?php echo esc_html( get_the_title( $previous_post ) ); ?>
			</a>

		<?php endif; ?>

	</div>

	<div class="editorial-single__navigation-item editorial-single__navigation-item--next">

		<?php if ( $next_post ) : ?>

			<span class="editorial-single__navigation-label">
				<?php esc_html_e( 'Next Editorial', 'greshma' ); ?>
			</span>

			<a href="<?php echo esc_url( get_permalink( $next_post ) ); ?>">
				<?php echo esc_html( get_the_title( $next_post ) ); ?>
			</a>

		<?php endif; ?>

	</div>

</nav>

<?php endif; ?>

				</div>

			</div>

		</article>

	</main>

	<?php
endwhile;

get_footer();