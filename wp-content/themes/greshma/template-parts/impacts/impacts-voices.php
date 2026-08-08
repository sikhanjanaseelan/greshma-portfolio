<?php
/**
 * Impacts Page — Voices from the Community + Journey of Impact.
 *
 * Voices:
 * Dynamic source → Testimonials CPT.
 *
 * Journey:
 * Static for now. Will be connected to Journey / Key Moments next.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;


/* ==========================================================
   TESTIMONIAL QUERY
========================================================== */

$impact_testimonials = new WP_Query(
	array(
		'post_type'      => 'greshma_testimonial',
		'post_status'    => 'publish',
		'posts_per_page' => 4,
		'orderby'        => array(
			'menu_order' => 'ASC',
			'date'       => 'DESC',
		),
	)
);


/**
 * Store testimonial IDs so the first one can be
 * rendered as the initial visible testimonial.
 */
$testimonial_ids = array();

if ( $impact_testimonials->have_posts() ) {

	while ( $impact_testimonials->have_posts() ) {

		$impact_testimonials->the_post();

		$testimonial_ids[] = get_the_ID();
	}

	wp_reset_postdata();
}


$primary_testimonial_id = ! empty( $testimonial_ids )
	? $testimonial_ids[0]
	: 0;


/* ==========================================================
   PRIMARY TESTIMONIAL DATA
========================================================== */

$testimonial_quote = '';
$testimonial_name  = '';
$testimonial_image = '';

if ( $primary_testimonial_id ) {

	$testimonial_quote = get_post_field(
		'post_content',
		$primary_testimonial_id
	);

	if ( empty( trim( wp_strip_all_tags( $testimonial_quote ) ) ) ) {

		$testimonial_quote = get_post_field(
			'post_excerpt',
			$primary_testimonial_id
		);
	}


	$testimonial_name = get_the_title(
		$primary_testimonial_id
	);


	$testimonial_image = get_the_post_thumbnail(
		$primary_testimonial_id,
		'medium_large',
		array(
			'class'    => 'impacts-voices__image-file',
			'loading'  => 'lazy',
			'decoding' => 'async',
		)
	);
}

/* ==========================================================
   JOURNEY OF IMPACT
========================================================== */

$impact_journey = new WP_Query(
	array(
		'post_type'      => 'greshma_journey',
		'post_status'    => 'publish',
		'posts_per_page' => 6,

		'orderby' => array(
			'menu_order' => 'ASC',
			'date'       => 'ASC',
		),
	)
);
?>



<section class="impacts-voices">

	<div class="container">

		<div class="impacts-voices__panel">


			<!-- ==================================================
			     LEFT — VOICES FROM THE COMMUNITY
			================================================== -->

			<div class="impacts-voices__community">

				<div class="impacts-voices__heading">

					<h2>
						<?php
						esc_html_e(
							'Voices from the Community',
							'greshma'
						);
						?>
					</h2>

					<span aria-hidden="true">
						❧
					</span>

				</div>


				<?php if ( $primary_testimonial_id ) : ?>


					<div class="impacts-voices__community-layout">


						<!-- ======================================
						     QUOTE
						====================================== -->

						<blockquote class="impacts-voices__quote">

							<span
								class="impacts-voices__quote-mark"
								aria-hidden="true"
							>
								“
							</span>


							<p>
								<?php
								echo esc_html(
									wp_trim_words(
										wp_strip_all_tags(
											$testimonial_quote
										),
										45,
										'…'
									)
								);
								?>
							</p>


							<cite>

								— <?php echo esc_html( $testimonial_name ); ?>

							</cite>

						</blockquote>


						<!-- ======================================
						     IMAGE
						====================================== -->

						<div class="impacts-voices__image">

							<?php if ( $testimonial_image ) : ?>

								<?php
								echo wp_kses_post(
									$testimonial_image
								);
								?>

							<?php else : ?>

								<div
									class="impacts-voices__image-placeholder"
									aria-hidden="true"
								>
									<span>
										❧
									</span>
								</div>

							<?php endif; ?>

						</div>

					</div>


					<!-- ==========================================
					     TESTIMONIAL DOTS
					=========================================== -->

					<?php if ( count( $testimonial_ids ) > 1 ) : ?>

						<div
							class="impacts-voices__dots"
							aria-label="<?php esc_attr_e(
								'Community voices',
								'greshma'
							); ?>"
						>

							<?php
							foreach (
								$testimonial_ids as $index => $testimonial_id
							) :
								?>

								<span
									class="<?php echo 0 === $index ? 'is-active' : ''; ?>"
									aria-hidden="true"
								></span>

							<?php endforeach; ?>

						</div>

					<?php endif; ?>


				<?php else : ?>


					<div class="impacts-voices__empty">

						<p>
							<?php
							esc_html_e(
								'Community voices will appear here soon.',
								'greshma'
							);
							?>
						</p>

					</div>


				<?php endif; ?>

			</div>


			<!-- ==================================================
			     RIGHT — JOURNEY OF IMPACT

			     Static for now.
			     Next we will connect this to Journey / Key Moments.
			================================================== -->

			<div class="impacts-voices__journey">

				<div class="impacts-voices__heading">

					<h2>
						<?php
						esc_html_e(
							'Journey of Impact',
							'greshma'
						);
						?>
					</h2>

					<span aria-hidden="true">
						❧
					</span>

				</div>


				<div class="impacts-voices__timeline">

	<?php if ( $impact_journey->have_posts() ) : ?>

		<div
			class="impacts-voices__timeline-line"
			aria-hidden="true"
		></div>


		<?php
		while ( $impact_journey->have_posts() ) :
			$impact_journey->the_post();

			$journey_year = trim(
	(string) get_post_meta(
		get_the_ID(),
		Greshma_Core_Journey::YEAR_META,
		true
	)
);
			?>

			<div class="impacts-voices__timeline-item">

				<div
					class="impacts-voices__timeline-icon"
					aria-hidden="true"
				>
					❧
				</div>


				<?php if ( '' !== $journey_year ) : ?>

	<strong>
		<?php echo esc_html( $journey_year ); ?>
	</strong>

<?php endif; ?>


				<span>
					<?php the_title(); ?>
				</span>

			</div>

		<?php endwhile; ?>


		<?php wp_reset_postdata(); ?>


	<?php else : ?>

		<div class="impacts-voices__timeline-empty">

			<p>
				<?php
				esc_html_e(
					'Journey moments will appear here soon.',
					'greshma'
				);
				?>
			</p>

		</div>

	<?php endif; ?>

</div>

			</div>

		</div>

	</div>

</section>