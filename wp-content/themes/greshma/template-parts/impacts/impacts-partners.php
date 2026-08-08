<?php
/**
 * Impacts Page — Featured In & Partners + SDGs.
 *
 * PARTNER LOGOS REQUIRED LATER:
 *
 * assets/images/impacts/impacts-partner-uri.png
 * assets/images/impacts/impacts-partner-okc.png
 * assets/images/impacts/impacts-partner-earth-charter.png
 * assets/images/impacts/impacts-partner-unep.png
 * assets/images/impacts/impacts-partner-upeace.png
 *
 * SDG IMAGES REQUIRED LATER:
 *
 * assets/images/impacts/impacts-sdg-04.png
 * assets/images/impacts/impacts-sdg-05.png
 * assets/images/impacts/impacts-sdg-13.png
 * assets/images/impacts/impacts-sdg-16.png
 * assets/images/impacts/impacts-sdg-17.png
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;
/* ==========================================================
   FEATURED ORGANIZATIONS / PARTNERS
========================================================== */

$impact_partners = new WP_Query(
	array(
		'post_type'      => 'greshma_organization',
		'post_status'    => 'publish',
		'posts_per_page' => 5,

		'orderby' => array(
			'menu_order' => 'ASC',
			'date'       => 'ASC',
		),
	)
);
?>

<section class="impacts-partners">

    <div class="container">

        <div class="impacts-partners__panel">


            <!-- ==========================================
                 LEFT — FEATURED IN & PARTNERS
            =========================================== -->

            <div class="impacts-partners__featured">

                <div class="impacts-partners__heading">

                    <h2>
                        Featured In &amp; Partners
                    </h2>

                    <span aria-hidden="true">
                        ❧
                    </span>

                </div>


                <span
                    class="impacts-partners__heading-line"
                    aria-hidden="true"
                ></span>


                <div class="impacts-partners__logos">

	<?php if ( $impact_partners->have_posts() ) : ?>

		<?php
		while ( $impact_partners->have_posts() ) :
			$impact_partners->the_post();
			?>

			<div class="impacts-partners__logo">

				<?php if ( has_post_thumbnail() ) : ?>

					<div class="impacts-partners__logo-image">

						<?php
						the_post_thumbnail(
							'medium',
							array(
								'loading'  => 'lazy',
								'decoding' => 'async',
								'alt'      => get_the_title(),
							)
						);
						?>

					</div>

				<?php else : ?>

					<div class="impacts-partners__logo-placeholder">

						<?php
						/*
						 * Generate a short fallback label
						 * from the organization title.
						 */
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


				<span>
					<?php the_title(); ?>
				</span>

			</div>

		<?php endwhile; ?>


		<?php wp_reset_postdata(); ?>


	<?php else : ?>

		<div class="impacts-partners__empty">

			<p>
				<?php
				esc_html_e(
					'Partner organizations will appear here soon.',
					'greshma'
				);
				?>
			</p>

		</div>

	<?php endif; ?>

</div>


                <p class="impacts-partners__note">
                    ... and many more amazing collaborators around the world.
                </p>

            </div>


            <!-- ==========================================
                 RIGHT — SDGs
            =========================================== -->

            <div class="impacts-partners__sdgs">

                <div class="impacts-partners__heading">

                    <h2>
                        Aligned with SDGs
                    </h2>

                    <span aria-hidden="true">
                        ❧
                    </span>

                </div>


                <span
                    class="impacts-partners__heading-line"
                    aria-hidden="true"
                ></span>


                <div class="impacts-partners__sdg-grid">


                    <!-- SDG 4 -->

                    <div class="impacts-partners__sdg">

                        <!--
                        FINAL IMAGE:
                        assets/images/impacts/impacts-sdg-04.png
                        -->

                        <div class="
                            impacts-partners__sdg-placeholder
                            impacts-partners__sdg-placeholder--4
                        ">
                            SDG 4
                        </div>

                    </div>


                    <!-- SDG 5 -->

                    <div class="impacts-partners__sdg">

                        <!--
                        FINAL IMAGE:
                        assets/images/impacts/impacts-sdg-05.png
                        -->

                        <div class="
                            impacts-partners__sdg-placeholder
                            impacts-partners__sdg-placeholder--5
                        ">
                            SDG 5
                        </div>

                    </div>


                    <!-- SDG 13 -->

                    <div class="impacts-partners__sdg">

                        <!--
                        FINAL IMAGE:
                        assets/images/impacts/impacts-sdg-13.png
                        -->

                        <div class="
                            impacts-partners__sdg-placeholder
                            impacts-partners__sdg-placeholder--13
                        ">
                            SDG 13
                        </div>

                    </div>


                    <!-- SDG 16 -->

                    <div class="impacts-partners__sdg">

                        <!--
                        FINAL IMAGE:
                        assets/images/impacts/impacts-sdg-16.png
                        -->

                        <div class="
                            impacts-partners__sdg-placeholder
                            impacts-partners__sdg-placeholder--16
                        ">
                            SDG 16
                        </div>

                    </div>


                    <!-- SDG 17 -->

                    <div class="impacts-partners__sdg">

                        <!--
                        FINAL IMAGE:
                        assets/images/impacts/impacts-sdg-17.png
                        -->

                        <div class="
                            impacts-partners__sdg-placeholder
                            impacts-partners__sdg-placeholder--17
                        ">
                            SDG 17
                        </div>

                    </div>


                </div>


                <p class="impacts-partners__sdg-note">
                    Working together towards the Sustainable Development Goals.
                </p>

            </div>

        </div>

    </div>

</section>