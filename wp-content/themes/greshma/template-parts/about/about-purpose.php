<?php
/**
 * About Page — Purpose Section.
 *
 * Testimonials dynamically loaded from
 * Greshma Testimonials CPT.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;


/* ==========================================================
   TESTIMONIALS
========================================================== */

$purpose_testimonials = new WP_Query(
	array(
		'post_type'           => 'greshma_testimonial',
		'post_status'         => 'publish',
		'posts_per_page'      => 2,
		'ignore_sticky_posts' => true,
		'orderby'             => 'date',
		'order'               => 'DESC',
	)
);
?>

<section class="about-purpose">

	<div class="container">


		<!-- ==========================================
		     SECTION HEADING
		=========================================== -->

		<div class="about-purpose__heading">

			<span>
				<?php esc_html_e(
					'What Drives Me Every Day',
					'greshma'
				); ?>
			</span>

			<span
				class="about-purpose__leaf"
				aria-hidden="true"
			>
				❧
			</span>

			<span
				class="about-purpose__line"
				aria-hidden="true"
			></span>

		</div>


		<!-- ==========================================
		     MAIN LAYOUT
		=========================================== -->

		<div class="about-purpose__layout">


			<!-- ======================================
			     LEFT MAIN IMAGE
			======================================= -->

			<div class="about-purpose__main-image">

				<span>
					about-purpose-main.png
				</span>

			</div>


			<!-- ======================================
			     PURPOSE MESSAGE
			======================================= -->

			<div class="about-purpose__message">

				<h2>
					People. Planet.<br>
					Dialogue. Hope.
				</h2>

				<p>
					I wake up each day with the belief that
					we can build a world where peace is
					possible, where nature is respected
					and where every young person has the
					space to dream and lead.
				</p>

				<div class="about-purpose__signature">
					Greshma Pious Raju
				</div>

			</div>


			<!-- ======================================
			     DYNAMIC TESTIMONIALS
			======================================= -->

			<?php if ( $purpose_testimonials->have_posts() ) : ?>

				<div class="about-purpose__testimonials">


					<?php
					while ( $purpose_testimonials->have_posts() ) :

						$purpose_testimonials->the_post();

						$testimonial_id = get_the_ID();

						$name = get_the_title();


						/* ------------------------------
						   TESTIMONIAL TEXT
						------------------------------ */

						$quote = wp_strip_all_tags(
							get_the_content()
						);

						$quote = wp_trim_words(
							$quote,
							35,
							'…'
						);


						/* ------------------------------
						   GROUP / ROLE
						------------------------------ */

						$role = '';

						$groups = get_the_terms(
							$testimonial_id,
							'greshma_testimonial_group'
						);

						if (
							$groups &&
							! is_wp_error( $groups )
						) {

							$primary_group = reset(
								$groups
							);

							if ( $primary_group ) {
								$role = $primary_group->name;
							}
						}


						/* ------------------------------
						   INITIALS
						------------------------------ */

						$initials = '';

						if ( $name ) {

							$name_parts = preg_split(
								'/\s+/',
								trim( $name )
							);

							if ( ! empty( $name_parts[0] ) ) {

								$initials .= function_exists( 'mb_substr' )
									? mb_substr(
										$name_parts[0],
										0,
										1
									)
									: substr(
										$name_parts[0],
										0,
										1
									);
							}

							if ( count( $name_parts ) > 1 ) {

								$last_name = end(
									$name_parts
								);

								$initials .= function_exists( 'mb_substr' )
									? mb_substr(
										$last_name,
										0,
										1
									)
									: substr(
										$last_name,
										0,
										1
									);
							}

							$initials = strtoupper(
								$initials
							);
						}
						?>


						<article class="about-purpose__testimonial">


							<span
								class="about-purpose__quote-mark"
								aria-hidden="true"
							>
								“
							</span>


							<p>
								<?php echo esc_html(
									$quote
								); ?>
							</p>


							<div class="about-purpose__person">


								<!-- AVATAR -->

								<div class="about-purpose__avatar">


									<?php if ( has_post_thumbnail() ) : ?>

										<?php
										the_post_thumbnail(
											'thumbnail',
											array(
												'loading'  => 'lazy',
												'decoding' => 'async',
												'alt'      => esc_attr(
													$name
												),
											)
										);
										?>

									<?php else : ?>

										<span aria-hidden="true">

											<?php echo esc_html(
												$initials
											); ?>

										</span>

									<?php endif; ?>


								</div>


								<!-- PERSON -->

								<div>

									<h3>
										<?php echo esc_html(
											$name
										); ?>
									</h3>


									<?php if ( $role ) : ?>

										<span>

											<?php echo esc_html(
												$role
											); ?>

										</span>

									<?php endif; ?>

								</div>


							</div>

						</article>


					<?php endwhile; ?>


					<?php wp_reset_postdata(); ?>


				</div>

			<?php endif; ?>


			<!-- ======================================
			     RIGHT IMAGE STACK
			======================================= -->

			<div class="about-purpose__gallery">


				<div class="about-purpose__gallery-image">

					<span>
						about-purpose-01.png
					</span>

				</div>


				<div class="about-purpose__gallery-image">

					<span>
						about-purpose-02.png
					</span>

				</div>


				<div class="about-purpose__gallery-image">

					<span>
						about-purpose-03.png
					</span>

				</div>


			</div>


		</div>

	</div>

</section>