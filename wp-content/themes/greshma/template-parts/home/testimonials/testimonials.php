<?php
/**
 * Homepage — Voices of Impact.
 *
 * Dynamic source:
 * Greshma Testimonials.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;


/* ==========================================================
   TESTIMONIAL QUERY
========================================================== */

$testimonials = new WP_Query(
	array(
		'post_type'           => 'greshma_testimonial',
		'post_status'         => 'publish',
		'posts_per_page'      => 6,
		'ignore_sticky_posts' => true,
		'orderby'             => 'date',
		'order'               => 'DESC',
	)
);


if ( ! $testimonials->have_posts() ) {
	return;
}
?>

<section
	class="home-testimonials"
	aria-labelledby="home-testimonials-title"
>

	<div class="site-container">


		<!-- ==================================================
		     HEADING
		================================================== -->

		<header class="home-testimonials__heading">

			<span
				class="home-testimonials__line"
				aria-hidden="true"
			></span>


			<h2
				id="home-testimonials-title"
				class="home-testimonials__title"
			>
				<?php
				esc_html_e(
					'Voices of Impact',
					'greshma'
				);
				?>
			</h2>


			<span
				class="home-testimonials__leaf"
				aria-hidden="true"
			>
				⌁
			</span>


			<span
				class="home-testimonials__line"
				aria-hidden="true"
			></span>

		</header>


		<!-- ==================================================
		     TESTIMONIALS
		================================================== -->

		<div class="home-testimonials__grid">


			<?php
			while ( $testimonials->have_posts() ) :

				$testimonials->the_post();

				$testimonial_id = get_the_ID();


				/* ==========================================
				   QUOTE
				========================================== */

				$quote = wp_strip_all_tags(
					get_the_content()
				);


				/* ==========================================
				   PERSON
				========================================== */

				$name = get_the_title();


				/* ==========================================
				   GROUP / ROLE
				========================================== */

				$groups = get_the_terms(
					$testimonial_id,
					'greshma_testimonial_group'
				);


				$role = '';


				if (
					$groups &&
					! is_wp_error( $groups )
				) {

					$primary_group = reset(
						$groups
					);


					if ( $primary_group ) {

						$role =
							$primary_group->name;
					}
				}


				/* ==========================================
				   INITIAL
				========================================== */

				$initial = '';

				if ( $name ) {

					$initial = function_exists(
						'mb_substr'
					)
						? mb_substr(
							$name,
							0,
							1
						)
						: substr(
							$name,
							0,
							1
						);

					$initial = strtoupper(
						$initial
					);
				}
				?>


				<article class="testimonial-card">


					<span
						class="testimonial-card__quote-mark"
						aria-hidden="true"
					>
						“
					</span>


					<blockquote class="testimonial-card__quote">

						<p>
							<?php
							echo esc_html(
								$quote
							);
							?>
						</p>

					</blockquote>


					<div class="testimonial-card__person">


						<!-- PHOTO -->

						<div class="testimonial-card__avatar">


							<?php if ( has_post_thumbnail() ) : ?>


								<?php
								the_post_thumbnail(
									'thumbnail',
									array(
										'loading' =>
											'lazy',

										'decoding' =>
											'async',

										'alt' =>
											esc_attr(
												$name
											),
									)
								);
								?>


							<?php else : ?>


								<span aria-hidden="true">

									<?php
									echo esc_html(
										$initial
									);
									?>

								</span>


							<?php endif; ?>


						</div>


						<!-- DETAILS -->

						<div class="testimonial-card__details">


							<h3 class="testimonial-card__name">

								<?php
								echo esc_html(
									$name
								);
								?>

							</h3>


							<?php if ( $role ) : ?>

								<p class="testimonial-card__role">

									<?php
									echo esc_html(
										$role
									);
									?>

								</p>

							<?php endif; ?>


						</div>


					</div>


				</article>


			<?php endwhile; ?>


			<?php wp_reset_postdata(); ?>


		</div>


		<!-- ==================================================
		     NAVIGATION
		================================================== -->

		<?php if ( $testimonials->found_posts > 3 ) : ?>

			<div class="home-testimonials__navigation">


				<button
					class="home-testimonials__arrow"
					type="button"
					aria-label="<?php esc_attr_e(
						'Previous testimonials',
						'greshma'
					); ?>"
				>
					←
				</button>


				<div
					class="home-testimonials__dots"
					aria-hidden="true"
				>

					<span class="is-active"></span>
					<span></span>
					<span></span>

				</div>


				<button
					class="home-testimonials__arrow"
					type="button"
					aria-label="<?php esc_attr_e(
						'Next testimonials',
						'greshma'
					); ?>"
				>
					→
				</button>


			</div>

		<?php endif; ?>


	</div>

</section>