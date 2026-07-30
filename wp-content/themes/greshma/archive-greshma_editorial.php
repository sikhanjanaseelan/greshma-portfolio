<?php
/**
 * Editorial archive template.
 *
 * Displays published Editorial content.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>


<main id="primary" class="site-main editorial-archive">

	<section class="editorial-archive__hero">

		<div class="container">

			<p class="editorial-archive__eyebrow">
				<?php esc_html_e( 'Ideas, experiences and perspectives', 'greshma' ); ?>
			</p>

			<h1 class="editorial-archive__title">
				<?php esc_html_e( 'Editorial', 'greshma' ); ?>
			</h1>

			<p class="editorial-archive__intro">
				<?php
				esc_html_e(
					'Explore reflections, field stories, research, publications and insights shaped by lived experience and meaningful work.',
					'greshma'
				);
				?>
			</p>

		</div>

	</section>

	<section class="editorial-archive__content">

		<div class="container">

			<?php if ( have_posts() ) : ?>

				<div class="editorial-archive__grid<?php echo 1 === $wp_query->post_count ? ' editorial-archive__grid--single' : ''; ?>">

					<?php
					while ( have_posts() ) :
						the_post();
						?>

						<article
							id="post-<?php the_ID(); ?>"
							<?php post_class( 'editorial-card' ); ?>
						>

							<?php if ( has_post_thumbnail() ) : ?>

								<a
									class="editorial-card__image-link"
									href="<?php the_permalink(); ?>"
									aria-label="<?php echo esc_attr( get_the_title() ); ?>"
								>

									<div class="editorial-card__image">

										<?php
										the_post_thumbnail(
											'large',
											array(
												'loading' => 'lazy',
											)
										);
										?>

									</div>

								</a>

							<?php endif; ?>

							<div class="editorial-card__content">

								<?php
								$editorial_types = get_the_terms(
									get_the_ID(),
									'greshma_editorial_type'
								);

								if (
									! empty( $editorial_types ) &&
									! is_wp_error( $editorial_types )
								) :
									?>

									<p class="editorial-card__type">
										<?php
										echo esc_html(
											$editorial_types[0]->name
										);
										?>
									</p>

								<?php endif; ?>

								<h2 class="editorial-card__title">

									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>

								</h2>

								<?php
								$summary = get_post_meta(
									get_the_ID(),
									'_greshma_editorial_summary',
									true
								);

								if ( $summary ) :
									?>

									<p class="editorial-card__summary">
										<?php echo esc_html( $summary ); ?>
									</p>

								<?php else : ?>

									<div class="editorial-card__summary">
										<?php echo esc_html( wp_trim_words( get_the_excerpt(), 16, '…' ) ); ?>
									</div>

								<?php endif; ?>

								<div class="editorial-card__meta">

									<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
										<?php echo esc_html( get_the_date() ); ?>
									</time>

									<?php
									$manual_reading_time = (int) get_post_meta(
										get_the_ID(),
										'_greshma_editorial_reading_time_override',
										true
									);

									$automatic_reading_time = (int) get_post_meta(
										get_the_ID(),
										'_greshma_editorial_reading_time',
										true
									);

									$reading_time = $manual_reading_time > 0
										? $manual_reading_time
										: $automatic_reading_time;

									if ( $reading_time > 0 ) :
										?>

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

								<a
									class="editorial-card__link"
									href="<?php the_permalink(); ?>"
								>
									<?php esc_html_e( 'Read more', 'greshma' ); ?>
									<span aria-hidden="true">→</span>
								</a>

							</div>

						</article>

					<?php endwhile; ?>

				</div>

				<nav
					class="editorial-archive__pagination"
					aria-label="<?php esc_attr_e( 'Editorial pagination', 'greshma' ); ?>"
				>
					<?php
					the_posts_pagination(
						array(
							'mid_size'  => 2,
							'prev_text' => esc_html__( 'Previous', 'greshma' ),
							'next_text' => esc_html__( 'Next', 'greshma' ),
						)
					);
					?>
				</nav>

			<?php else : ?>

				<div class="editorial-archive__empty">

					<h2>
						<?php esc_html_e( 'No Editorial content found', 'greshma' ); ?>
					</h2>

					<p>
						<?php
						esc_html_e(
							'New reflections and stories will appear here soon.',
							'greshma'
						);
						?>
					</p>

				</div>

			<?php endif; ?>

		</div>

	</section>

</main>

<?php
get_footer();