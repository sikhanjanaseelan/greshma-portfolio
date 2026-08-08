<?php
/**
 * Journal Page — LinkedIn Insights + Media & Interviews.
 *
 * LinkedIn Insights:
 * Dynamic data from Greshma Core Editorial CPT.
 *
 * Media & Interviews:
 * Static placeholder data for now.
 * This will be connected to the Media module next.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;


/* ==========================================================
   LINKEDIN INSIGHT QUERY
========================================================== */

$linkedin_query = new WP_Query(
	array(
		'post_type'           => 'greshma_editorial',
		'post_status'         => 'publish',
		'posts_per_page'      => 1,
		'ignore_sticky_posts' => true,
		'orderby'             => 'date',
		'order'               => 'DESC',
		'tax_query'           => array(
			array(
				'taxonomy' => 'greshma_editorial_type',
				'field'    => 'slug',
				'terms'    => array(
					'linkedin-insight',
				),
			),
		),
	)
);


/* ==========================================================
   LINKEDIN ARCHIVE URL
========================================================== */

$editorial_archive_url = get_post_type_archive_link(
	'greshma_editorial'
);

$linkedin_archive_url = add_query_arg(
	'editorial_type',
	'linkedin-insight',
	$editorial_archive_url
);


/* ==========================================================
   MEDIA — TEMPORARY STATIC DATA
   We will connect this to Media CPT next.
========================================================== */

$media_items = array(

	array(
		'title' => 'Interview: Building Peace Through Youth Initiatives',
		'meta'  => 'The Earth Charter Initiative',
		'date'  => 'April 22, 2025',
		'image' => 'journal-media-01.png',
	),

	array(
		'title' => 'Podcast: Voices for the Planet',
		'meta'  => 'Our Kids Climate Podcast',
		'date'  => 'March 10, 2025',
		'image' => 'journal-media-02.png',
	),

	array(
		'title' => 'Featured in: The New Indian Express',
		'meta'  => 'Young Catholic woman leading climate conversations',
		'date'  => 'Feb 10, 2025',
		'image' => 'journal-media-03.png',
	),

);
?>

<section class="journal-bottom-grid">


	<!-- =====================================================
	     LINKEDIN INSIGHTS
	===================================================== -->

	<article class="journal-linkedin">

		<div class="journal-bottom-grid__heading">

			<h2>
				<?php esc_html_e(
					'LinkedIn Insights',
					'greshma'
				); ?>
			</h2>

			<a href="<?php echo esc_url( $linkedin_archive_url ); ?>">

				<?php esc_html_e(
					'View All',
					'greshma'
				); ?>

				<span aria-hidden="true">
					→
				</span>

			</a>

		</div>


		<?php if ( $linkedin_query->have_posts() ) : ?>

			<?php
			while ( $linkedin_query->have_posts() ) :
				$linkedin_query->the_post();

				$linkedin_id = get_the_ID();


				/* ==================================================
				   SUMMARY
				================================================== */

				$linkedin_summary = get_post_meta(
					$linkedin_id,
					'_greshma_editorial_summary',
					true
				);

				if ( empty( $linkedin_summary ) ) {

					$linkedin_summary = wp_trim_words(
						get_the_excerpt(),
						28,
						'…'
					);

				}


				/* ==================================================
				   EXTERNAL LINKEDIN URL
				================================================== */

				$linkedin_external_url = get_post_meta(
					$linkedin_id,
					'_greshma_editorial_external_url',
					true
				);


				/* ==================================================
				   DESTINATION
				================================================== */

				$linkedin_destination = ! empty( $linkedin_external_url )
					? $linkedin_external_url
					: get_permalink();


				/* ==================================================
				   LINK TYPE LABEL
				================================================== */

				$linkedin_type_label = ! empty( $linkedin_external_url )
					? __( 'LinkedIn Post', 'greshma' )
					: __( 'LinkedIn Insight', 'greshma' );
				?>


				<div class="journal-linkedin__content">


					<!-- ==========================================
					     LEFT COPY
					=========================================== -->

					<div class="journal-linkedin__copy">


						<div class="journal-linkedin__meta">

							<span class="journal-linkedin__logo">
								in
							</span>

							<span>
								<?php echo esc_html( get_the_date() ); ?>
							</span>

							<span aria-hidden="true">
								•
							</span>

							<span>
								<?php
								echo esc_html(
									$linkedin_type_label
								);
								?>
							</span>

						</div>


						<h3>

							<a
								href="<?php echo esc_url( $linkedin_destination ); ?>"
								<?php if ( $linkedin_external_url ) : ?>
									target="_blank"
									rel="noopener noreferrer"
								<?php endif; ?>
							>

								<?php the_title(); ?>

							</a>

						</h3>


						<?php if ( $linkedin_summary ) : ?>

							<p>

								<?php
								echo esc_html(
									wp_trim_words(
										$linkedin_summary,
										28,
										'…'
									)
								);
								?>

							</p>

						<?php endif; ?>


						<!--
						Engagement statistics are intentionally
						not displayed yet.

						We do not currently have proper Editorial
						admin fields for likes, comments or shares.
						Once those fields exist we can restore the
						stats row dynamically.
						-->


						<a
							href="<?php echo esc_url( $linkedin_destination ); ?>"
							class="journal-linkedin__button"
							<?php if ( $linkedin_external_url ) : ?>
								target="_blank"
								rel="noopener noreferrer"
							<?php endif; ?>
						>

							<?php
							echo esc_html(
								$linkedin_external_url
									? __( 'Read on LinkedIn', 'greshma' )
									: __( 'Read Insight', 'greshma' )
							);
							?>

							<span aria-hidden="true">
								<?php echo $linkedin_external_url ? '↗' : '→'; ?>
							</span>

						</a>

					</div>


					<!-- ==========================================
					     RIGHT IMAGE
					=========================================== -->

					<div class="journal-linkedin__visual">

						<?php if ( has_post_thumbnail() ) : ?>

							<a
								href="<?php echo esc_url( $linkedin_destination ); ?>"
								class="journal-linkedin__visual-link"
								<?php if ( $linkedin_external_url ) : ?>
									target="_blank"
									rel="noopener noreferrer"
								<?php endif; ?>
								aria-label="<?php echo esc_attr( get_the_title() ); ?>"
							>

								<?php
								the_post_thumbnail(
									'medium_large',
									array(
										'class'    => 'journal-linkedin__image',
										'loading'  => 'lazy',
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

							<span>
								<?php esc_html_e(
									'LinkedIn Insight',
									'greshma'
								); ?>
							</span>

						<?php endif; ?>

					</div>

				</div>

			<?php endwhile; ?>


		<?php else : ?>


			<div class="journal-linkedin__empty">

				<p>
					<?php esc_html_e(
						'LinkedIn insights will appear here soon.',
						'greshma'
					); ?>
				</p>

			</div>


		<?php endif; ?>

		<?php wp_reset_postdata(); ?>

	</article>



	<!-- =====================================================
	     MEDIA & INTERVIEWS
	     Static for now — dynamic integration comes next.
	===================================================== -->

	<article class="journal-media">

		<div class="journal-bottom-grid__heading">

			<h2>
				<?php esc_html_e(
					'Media & Interviews',
					'greshma'
				); ?>
			</h2>

			<a href="#">

				<?php esc_html_e(
					'View All',
					'greshma'
				); ?>

				<span aria-hidden="true">
					→
				</span>

			</a>

		</div>


		<div class="journal-media__list">

			<?php foreach ( $media_items as $item ) : ?>

				<article class="journal-media__item">


					<div class="journal-media__image">

						<span>

							<?php
							echo esc_html(
								$item['image']
							);
							?>

						</span>

					</div>


					<div class="journal-media__content">

						<h3>

							<?php
							echo esc_html(
								$item['title']
							);
							?>

						</h3>


						<p>

							<?php
							echo esc_html(
								$item['meta']
							);
							?>

						</p>


						<span>

							<?php
							echo esc_html(
								$item['date']
							);
							?>

						</span>

					</div>

				</article>

			<?php endforeach; ?>

		</div>

	</article>

</section>