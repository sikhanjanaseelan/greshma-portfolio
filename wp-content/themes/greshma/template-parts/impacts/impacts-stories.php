<?php
/**
 * Impacts Page — Stories of Transformation.
 *
 * Dynamic source:
 * Editorial CPT → Editorial Type → Impact Story
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;


/* ==========================================================
   IMPACT STORIES QUERY
========================================================== */

$impact_stories = new WP_Query(
	array(
		'post_type'      => 'greshma_editorial',
		'post_status'    => 'publish',
		'posts_per_page' => 3,

		'tax_query'      => array(
			array(
				'taxonomy' => 'greshma_editorial_type',
				'field'    => 'slug',
				'terms'    => 'impact-story',
			),
		),

		'orderby'        => 'date',
		'order'          => 'DESC',
	)
);


/* ==========================================================
   EDITORIAL ARCHIVE / STORIES LINK
========================================================== */

$stories_link = get_post_type_archive_link(
	'greshma_editorial'
);

if ( ! $stories_link ) {
	$stories_link = '#';
}
?>

<section class="impacts-stories">

	<div class="container">

		<div class="impacts-stories__layout">


			<!-- ==========================================
			     LEFT INTRO
			=========================================== -->

			<div class="impacts-stories__intro">

				<div class="impacts-stories__eyebrow">

					<span>
						<?php
						esc_html_e(
							'Stories of Transformation',
							'greshma'
						);
						?>
					</span>

					<span
						aria-hidden="true"
						class="impacts-stories__leaf"
					>
						❧
					</span>

				</div>


				<h2>
					<?php
					esc_html_e(
						'Change becomes real through people.',
						'greshma'
					);
					?>
				</h2>


				<p>
					<?php
					esc_html_e(
						'Behind every number is a story — a young person finding their voice, a community choosing collaboration, or an idea becoming meaningful action.',
						'greshma'
					);
					?>
				</p>


				<a
					href="<?php echo esc_url( $stories_link ); ?>"
					class="impacts-stories__button"
				>
					<?php
					esc_html_e(
						'Explore More Stories',
						'greshma'
					);
					?>

					<span aria-hidden="true">
						→
					</span>

				</a>

			</div>


			<!-- ==========================================
			     STORY CARDS
			=========================================== -->

			<div class="impacts-stories__grid">

				<?php if ( $impact_stories->have_posts() ) : ?>

					<?php
					while ( $impact_stories->have_posts() ) :
						$impact_stories->the_post();
						?>

						<article class="impacts-story-card">


							<!-- ==================================
							     FEATURED IMAGE
							=================================== -->

							<div class="impacts-story-card__image">

								<?php if ( has_post_thumbnail() ) : ?>

									<a
										href="<?php the_permalink(); ?>"
										aria-label="<?php echo esc_attr(
											sprintf(
												/* translators: %s: story title */
												__(
													'Read %s',
													'greshma'
												),
												get_the_title()
											)
										); ?>"
									>

										<?php
										the_post_thumbnail(
											'large',
											array(
												'loading' => 'lazy',
											)
										);
										?>

									</a>

								<?php else : ?>

									<div
										class="impacts-story-card__image-placeholder"
										aria-hidden="true"
									>
										<span>
											❧
										</span>
									</div>

								<?php endif; ?>

							</div>


							<!-- ==================================
							     CONTENT
							=================================== -->

							<div class="impacts-story-card__content">

								<h3>

									<a href="<?php the_permalink(); ?>">

										<?php
										the_title();
										?>

									</a>

								</h3>


								<p>
									<?php
									echo esc_html(
										wp_trim_words(
											get_the_excerpt(),
											24,
											'…'
										)
									);
									?>
								</p>


								<a href="<?php the_permalink(); ?>">

									<?php
									esc_html_e(
										'Read Story',
										'greshma'
									);
									?>

									<span aria-hidden="true">
										→
									</span>

								</a>

							</div>

						</article>

					<?php endwhile; ?>


					<?php wp_reset_postdata(); ?>


				<?php else : ?>

					<!--
						Keep the section structurally valid when
						no Impact Stories have been published yet.
					-->

					<div class="impacts-stories__empty">

						<p>
							<?php
							esc_html_e(
								'Transformation stories will appear here soon.',
								'greshma'
							);
							?>
						</p>

					</div>

				<?php endif; ?>

			</div>

		</div>

	</div>

</section>