<?php
/**
 * Journal Page — Stories in Print.
 *
 * Displays Editorial posts assigned to the
 * "Story in Print" Editorial Type while preserving
 * the existing Journal print-card design.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;


/* ==========================================================
   QUERY — STORIES IN PRINT
========================================================== */

$print_query = new WP_Query(
	array(
		'post_type'           => 'greshma_editorial',
		'post_status'         => 'publish',
		'posts_per_page'      => 4,
		'ignore_sticky_posts' => true,
		'orderby'             => 'date',
		'order'               => 'DESC',
		'tax_query'           => array(
			array(
				'taxonomy' => 'greshma_editorial_type',
				'field'    => 'slug',
				'terms'    => array(
					'story-in-print',
				),
			),
		),
	)
);


/* ==========================================================
   VIEW ALL URL
========================================================== */

$editorial_archive_url = get_post_type_archive_link(
	'greshma_editorial'
);

$print_archive_url = add_query_arg(
	'editorial_type',
	'story-in-print',
	$editorial_archive_url
);
?>


<section class="journal-print">

	<!-- =====================================================
	     HEADING
	===================================================== -->

	<div class="journal-section-heading">

		<h2>
			<?php esc_html_e( 'Stories in Print', 'greshma' ); ?>
		</h2>

		<a href="<?php echo esc_url( $print_archive_url ); ?>">

			<?php esc_html_e( 'View All', 'greshma' ); ?>

			<span aria-hidden="true">
				→
			</span>

		</a>

	</div>


	<?php if ( $print_query->have_posts() ) : ?>

		<div class="journal-print__grid">

			<?php
			while ( $print_query->have_posts() ) :
				$print_query->the_post();

				$editorial_id = get_the_ID();


				/* ==============================================
				   ORIGINAL / EXTERNAL URL
				============================================== */

				$external_url = get_post_meta(
					$editorial_id,
					'_greshma_editorial_external_url',
					true
				);


				/* ==============================================
				   PUBLICATION NAME
				============================================== */

				$publication_name = get_post_meta(
					$editorial_id,
					'_greshma_editorial_publication_name',
					true
				);


				/* ==============================================
				   DESTINATION
				============================================== */

				$destination = ! empty( $external_url )
					? $external_url
					: get_permalink();


				/* ==============================================
				   DISPLAY LABEL
				============================================== */

				$display_label = ! empty( $publication_name )
					? $publication_name
					: get_the_title();
				?>


				<article class="journal-print-card">


					<!-- ==========================================
					     COVER
					=========================================== -->

					<a
						href="<?php echo esc_url( $destination ); ?>"
						class="journal-print-card__cover"
						<?php if ( $external_url ) : ?>
							target="_blank"
							rel="noopener noreferrer"
						<?php endif; ?>
						aria-label="<?php echo esc_attr( get_the_title() ); ?>"
					>

						<?php if ( has_post_thumbnail() ) : ?>

							<?php
							the_post_thumbnail(
								'medium_large',
								array(
									'class'    => 'journal-print-card__cover-image',
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

						<?php else : ?>

							<span>
								<?php echo esc_html( $display_label ); ?>
							</span>

						<?php endif; ?>

					</a>


					<!-- ==========================================
					     FOOTER
					=========================================== -->

					<div class="journal-print-card__footer">


						<div>

							<h3>

								<a
									href="<?php echo esc_url( $destination ); ?>"
									<?php if ( $external_url ) : ?>
										target="_blank"
										rel="noopener noreferrer"
									<?php endif; ?>
								>

									<?php the_title(); ?>

								</a>

							</h3>


							<span>
								<?php echo esc_html( get_the_date( 'Y' ) ); ?>
							</span>

						</div>


						<a
							href="<?php echo esc_url( $destination ); ?>"
							class="journal-print-card__icon"
							<?php if ( $external_url ) : ?>
								target="_blank"
								rel="noopener noreferrer"
							<?php endif; ?>
							aria-label="<?php echo esc_attr( get_the_title() ); ?>"
						>

							<svg
								viewBox="0 0 24 24"
								aria-hidden="true"
							>
								<path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H11v16H6.5A2.5 2.5 0 0 0 4 21.5z"></path>
								<path d="M20 5.5A2.5 2.5 0 0 0 17.5 3H13v16h4.5a2.5 2.5 0 0 1 2.5 2.5z"></path>
							</svg>

						</a>

					</div>

				</article>

			<?php endwhile; ?>

		</div>


	<?php else : ?>

		<div class="journal-print__empty">

			<p>
				<?php
				esc_html_e(
					'Stories in print will appear here soon.',
					'greshma'
				);
				?>
			</p>

		</div>

	<?php endif; ?>

</section>


<?php
wp_reset_postdata();