<?php
/**
 * About Page — Journey Timeline.
 *
 * Dynamic source:
 * Greshma Journey CPT.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;


/* ==========================================================
   JOURNEY QUERY
========================================================== */

$journey_query = new WP_Query(
	array(
		'post_type'           => 'greshma_journey',
		'post_status'         => 'publish',
		'posts_per_page'      => 6,
		'ignore_sticky_posts' => true,

		'meta_key' => '_greshma_journey_order',

		'orderby' => array(
			'meta_value_num' => 'ASC',
			'menu_order'     => 'ASC',
			'date'           => 'ASC',
		),

		'order' => 'ASC',
	)
);


/*
 * Do not render an empty section.
 */
if ( ! $journey_query->have_posts() ) {
	return;
}
?>

<section class="about-journey">

	<div class="container">


		<!-- ==========================================
		     SECTION HEADING
		=========================================== -->

		<div class="about-journey__heading">

			<span>
				<?php esc_html_e(
					'My Journey So Far',
					'greshma'
				); ?>
			</span>


			<span
				class="about-journey__heading-leaf"
				aria-hidden="true"
			>
				❧
			</span>


			<span
				class="about-journey__heading-line"
				aria-hidden="true"
			></span>

		</div>


		<!-- ==========================================
		     TIMELINE
		=========================================== -->

		<div class="about-journey__timeline">


			<div
				class="about-journey__line"
				aria-hidden="true"
			></div>


			<div class="about-journey__items">


				<?php
				while ( $journey_query->have_posts() ) :

					$journey_query->the_post();

					$journey_id = get_the_ID();


					/* ==========================================
					   PERIOD / YEAR
					========================================== */

					$period = get_post_meta(
						$journey_id,
						'_greshma_journey_period',
						true
					);


					/*
					 * Older Journey field fallback.
					 */
					if ( ! $period ) {

						$period = get_post_meta(
							$journey_id,
							'_greshma_journey_year',
							true
						);
					}


					/* ==========================================
					   ICON
					========================================== */

					$icon = get_post_meta(
						$journey_id,
						'_greshma_journey_icon',
						true
					);


					if ( ! $icon ) {
						$icon = '◆';
					}


					/* ==========================================
					   DESCRIPTION
					========================================== */

					$description = get_the_excerpt();


					if ( ! $description ) {

						$description = wp_trim_words(
							wp_strip_all_tags(
								get_the_content()
							),
							24,
							'…'
						);
					}
					?>


					<article class="about-journey__item">


						<!-- MARKER -->

						<div class="about-journey__marker">

							<div class="about-journey__icon">

								<span aria-hidden="true">
									<?php echo esc_html(
										$icon
									); ?>
								</span>

							</div>

						</div>


						<!-- YEAR / PERIOD -->

						<?php if ( $period ) : ?>

							<p class="about-journey__year">

								<?php echo esc_html(
									$period
								); ?>

							</p>

						<?php endif; ?>


						<!-- DESCRIPTION -->

						<?php if ( $description ) : ?>

							<p class="about-journey__text">

								<?php echo esc_html(
									wp_trim_words(
										$description,
										20,
										'…'
									)
								); ?>

							</p>

						<?php endif; ?>


					</article>


				<?php endwhile; ?>


				<?php wp_reset_postdata(); ?>


			</div>

		</div>


		<!-- ==========================================
		     EXPLORE JOURNEY
		=========================================== -->

		<div class="about-journey__footer">

			<a
				href="<?php echo esc_url(
					home_url( '/my-paths/' )
				); ?>"
				class="about-journey__link"
			>

				<span>
					<?php esc_html_e(
						'Explore My Journey',
						'greshma'
					); ?>
				</span>

				<span aria-hidden="true">
					→
				</span>

			</a>

		</div>


	</div>

</section>