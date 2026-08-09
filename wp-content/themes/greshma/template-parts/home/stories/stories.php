<?php
/**
 * Homepage — Stories From The Field.
 *
 * Dynamic source:
 * Editorial → Field Story
 * + Show on Homepage.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;


/* ==========================================================
   FIELD STORIES
========================================================== */

$field_stories = new WP_Query(
	array(
		'post_type'           => 'greshma_editorial',
		'post_status'         => 'publish',
		'posts_per_page'      => 5,
		'ignore_sticky_posts' => true,

		'meta_query' => array(
			array(
				'key'     => '_greshma_editorial_show_on_homepage',
				'value'   => '1',
				'compare' => '=',
			),
		),

		'tax_query' => array(
			array(
				'taxonomy' => 'greshma_editorial_type',
				'field'    => 'slug',
				'terms'    => array(
					'field-story',
				),
			),
		),

		'orderby' => 'date',
		'order'   => 'DESC',
	)
);


if ( ! $field_stories->have_posts() ) {
	return;
}
?>

<section
	class="field-stories"
	aria-labelledby="field-stories-title"
>

	<div class="site-container">

		<div class="field-stories__heading">

			<span
				class="field-stories__line"
				aria-hidden="true"
			></span>

			<h2
				id="field-stories-title"
				class="field-stories__title"
			>
				<?php esc_html_e(
					'Stories From The Field',
					'greshma'
				); ?>
			</h2>

			<span
				class="field-stories__leaf"
				aria-hidden="true"
			>
				⌁
			</span>

			<span
				class="field-stories__line"
				aria-hidden="true"
			></span>

		</div>


		<div class="field-stories__slider">

			<button
				class="field-stories__arrow field-stories__arrow--previous"
				type="button"
				aria-label="<?php esc_attr_e(
					'Previous stories',
					'greshma'
				); ?>"
			>
				←
			</button>


			<div class="field-stories__track">

				<?php
				while ( $field_stories->have_posts() ) :
					$field_stories->the_post();

					$story_id = get_the_ID();


					/* ==========================================
					   TOPIC
					========================================== */

					$topics = get_the_terms(
						$story_id,
						'greshma_editorial_topic'
					);

					$topic_label = __(
						'Field Story',
						'greshma'
					);

					if (
						$topics &&
						! is_wp_error( $topics )
					) {

						$primary_topic = reset(
							$topics
						);

						if ( $primary_topic ) {
							$topic_label =
								$primary_topic->name;
						}
					}
					?>


					<article class="field-story-card">

						<a
							class="field-story-card__media"
							href="<?php the_permalink(); ?>"
							aria-label="<?php echo esc_attr(
								get_the_title()
							); ?>"
						>

							<?php if ( has_post_thumbnail() ) : ?>

								<?php
								the_post_thumbnail(
									'medium_large',
									array(
										'class' =>
											'field-story-card__image',

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
									class="field-story-card__placeholder"
									aria-hidden="true"
								>
									<span>
										<?php esc_html_e(
											'Field Story',
											'greshma'
										); ?>
									</span>
								</div>

							<?php endif; ?>


							<span class="field-story-card__category">
								<?php echo esc_html(
									$topic_label
								); ?>
							</span>

						</a>


						<div class="field-story-card__content">

							<h3 class="field-story-card__title">

								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>

							</h3>


							<a
								href="<?php the_permalink(); ?>"
								class="field-story-card__read"
							>
								<?php esc_html_e(
									'Read Story',
									'greshma'
								); ?>

								<span aria-hidden="true">
									→
								</span>
							</a>

						</div>

					</article>

				<?php endwhile; ?>


				<?php wp_reset_postdata(); ?>

			</div>


			<button
				class="field-stories__arrow field-stories__arrow--next"
				type="button"
				aria-label="<?php esc_attr_e(
					'Next stories',
					'greshma'
				); ?>"
			>
				→
			</button>

		</div>

	</div>

</section>