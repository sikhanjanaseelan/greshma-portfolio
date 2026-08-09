<?php
/**
 * Impacts Page — Recognition & Honors.
 *
 * Dynamic sources:
 * Recognition CPT + Greshma Site Settings.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;


/* ==========================================================
   RECOGNITION QUERY
========================================================== */

$recognitions = new WP_Query(
	array(
		'post_type'      => 'greshma_recognition',
		'post_status'    => 'publish',
		'posts_per_page' => 2,

		'orderby' => array(
			'menu_order' => 'ASC',
			'date'       => 'DESC',
		),
	)
);


/* ==========================================================
   SITE SETTINGS
========================================================== */

$recognition_main_image = class_exists( 'Greshma_Core_Settings' )
	? Greshma_Core_Settings::get(
		'recognition_main_image',
		''
	)
	: '';

$recognition_quote = class_exists( 'Greshma_Core_Settings' )
	? Greshma_Core_Settings::get(
		'recognition_quote',
		'Recognition is meaningful not because of the title, but because it reflects the people, partnerships and purpose behind the work.'
	)
	: 'Recognition is meaningful not because of the title, but because it reflects the people, partnerships and purpose behind the work.';

$recognition_quote_author = class_exists( 'Greshma_Core_Settings' )
	? Greshma_Core_Settings::get(
		'recognition_quote_author',
		'Greshma Pious Raju'
	)
	: 'Greshma Pious Raju';
?>

<section class="impacts-recognition">

	<div class="container">


		<!-- ==========================================
		     SECTION HEADING
		=========================================== -->

		<div class="impacts-recognition__heading">

			<span
				class="impacts-recognition__line"
				aria-hidden="true"
			></span>

			<h2>
				<?php esc_html_e(
					'Recognition & Honors',
					'greshma'
				); ?>
			</h2>

			<span
				class="impacts-recognition__leaf"
				aria-hidden="true"
			>
				❧
			</span>

		</div>


		<!-- ==========================================
		     MAIN GRID
		=========================================== -->

		<div class="impacts-recognition__grid">


			<!-- ======================================
			     RECOGNITION CARDS
			======================================= -->

			<?php if ( $recognitions->have_posts() ) : ?>

				<?php
				while ( $recognitions->have_posts() ) :
					$recognitions->the_post();

					$recognition_id = get_the_ID();

					$recognition_label = get_post_meta(
						$recognition_id,
						'_greshma_recognition_label',
						true
					);

					$recognition_year = get_post_meta(
						$recognition_id,
						'_greshma_recognition_year',
						true
					);

					$recognition_url = get_post_meta(
						$recognition_id,
						'_greshma_recognition_url',
						true
					);
					?>

					<article class="impacts-recognition__card">


						<!-- LOGO -->

						<?php if ( has_post_thumbnail() ) : ?>

							<div class="impacts-recognition__logo">

								<?php
								the_post_thumbnail(
									'medium',
									array(
										'class'    => 'impacts-recognition__logo-image',
										'loading'  => 'lazy',
										'decoding' => 'async',
									)
								);
								?>

							</div>

						<?php else : ?>

							<div class="impacts-recognition__logo-placeholder">

								<?php
								$title = get_the_title();

								$words = preg_split(
									'/\s+/',
									trim( $title )
								);

								$initials = '';

								if ( $words ) {

									foreach (
										array_slice( $words, 0, 4 )
										as $word
									) {

										if ( '' !== $word ) {

											$initials .=
												function_exists( 'mb_substr' )
													? mb_substr( $word, 0, 1 )
													: substr( $word, 0, 1 );
										}
									}
								}

								echo esc_html(
									strtoupper( $initials )
								);
								?>

							</div>

						<?php endif; ?>


						<div class="impacts-recognition__card-content">


							<?php if ( $recognition_label ) : ?>

								<span class="impacts-recognition__eyebrow">

									<?php
									echo esc_html(
										$recognition_label
									);
									?>

								</span>

							<?php endif; ?>


							<h3>

								<?php if ( $recognition_url ) : ?>

									<a
										href="<?php echo esc_url( $recognition_url ); ?>"
										target="_blank"
										rel="noopener noreferrer"
									>
										<?php the_title(); ?>
									</a>

								<?php else : ?>

									<?php the_title(); ?>

								<?php endif; ?>

							</h3>


							<?php
							$description = get_the_content();

							if ( $description ) :
								?>

								<p>
									<?php
									echo esc_html(
										wp_trim_words(
											wp_strip_all_tags( $description ),
											28,
											'…'
										)
									);
									?>
								</p>

							<?php endif; ?>


							<?php if ( $recognition_year ) : ?>

								<span class="impacts-recognition__year">
									<?php echo esc_html( $recognition_year ); ?>
								</span>

							<?php endif; ?>


						</div>

					</article>

				<?php endwhile; ?>


				<?php wp_reset_postdata(); ?>


			<?php else : ?>

				<div class="impacts-recognition__empty">

					<p>
						<?php
						esc_html_e(
							'Recognitions will appear here soon.',
							'greshma'
						);
						?>
					</p>

				</div>

			<?php endif; ?>


			<!-- ======================================
			     MAIN RECOGNITION IMAGE
			======================================= -->

			<div class="impacts-recognition__image">

				<?php if ( $recognition_main_image ) : ?>

					<img
						src="<?php echo esc_url( $recognition_main_image ); ?>"
						alt="<?php esc_attr_e(
							'Recognition and honors',
							'greshma'
						); ?>"
						class="impacts-recognition__main-image"
						loading="lazy"
					>

				<?php else : ?>

					<span aria-hidden="true">
						❧
					</span>

				<?php endif; ?>

			</div>


			<!-- ======================================
			     QUOTE CARD
			======================================= -->

			<blockquote class="impacts-recognition__quote">

				<span
					class="impacts-recognition__quote-mark"
					aria-hidden="true"
				>
					“
				</span>


				<p>
					<?php
					echo esc_html(
						$recognition_quote
					);
					?>
				</p>


				<?php if ( $recognition_quote_author ) : ?>

					<cite>

						— <?php
						echo esc_html(
							$recognition_quote_author
						);
						?>

					</cite>

				<?php endif; ?>


				<span
					class="impacts-recognition__quote-leaf"
					aria-hidden="true"
				>
					❧
				</span>

			</blockquote>


		</div>

	</div>

</section>