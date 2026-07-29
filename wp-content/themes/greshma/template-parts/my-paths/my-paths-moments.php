<?php
/**
 * My Paths Page — Key Moments + Education Sidebar.
 *
 * IMAGE ASSETS REQUIRED LATER:
 *
 * assets/images/my-paths/my-paths-moment-01.png
 * assets/images/my-paths/my-paths-moment-02.png
 * assets/images/my-paths/my-paths-moment-03.png
 * assets/images/my-paths/my-paths-moment-04.png
 * assets/images/my-paths/my-paths-moment-05.png
 * assets/images/my-paths/my-paths-moment-06.png
 * assets/images/my-paths/my-paths-moment-07.png
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$journey_query = new WP_Query(
	array(
		'post_type'      => 'greshma_journey',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'meta_key'       => '_greshma_journey_order',
		'orderby'        => array(
			'meta_value_num' => 'ASC',
			'title'          => 'ASC',
		),
		'order'          => 'ASC',
	)
);
?>

<section class="my-paths-moments">

    <div class="container">

        <!-- ==========================================
             SECTION HEADING
        =========================================== -->

        <div class="my-paths-moments__heading">

            <h2>
                Key Moments That Shaped My Journey
            </h2>

            <div
                class="my-paths-moments__heading-decoration"
                aria-hidden="true"
            >
                <span></span>
                <span>❧</span>
                <span></span>
            </div>

        </div>


        <!-- ==========================================
             MAIN LAYOUT
        =========================================== -->

        <div class="my-paths-moments__layout">


            <!-- ======================================
                 LEFT: TIMELINE
            ======================================= -->

            <div class="my-paths-moments__timeline">

                <div
                    class="my-paths-moments__center-line"
                    aria-hidden="true"
                ></div>


              <?php if ( $journey_query->have_posts() ) : ?>

	<?php while ( $journey_query->have_posts() ) : ?>

		<?php
		$journey_query->the_post();

		$moment = array(
			'number' => get_post_meta(
				get_the_ID(),
				'_greshma_journey_number',
				true
			),

			'title' => get_the_title(),

			'period' => get_post_meta(
				get_the_ID(),
				'_greshma_journey_period',
				true
			),

			'description' => get_the_content(),

			'icon' => get_post_meta(
				get_the_ID(),
				'_greshma_journey_icon',
				true
			),

			'side' => get_post_meta(
				get_the_ID(),
				'_greshma_journey_side',
				true
			),
		);
		?> 

                    <article
                        class="
                            my-paths-moment
                            my-paths-moment--<?php
                            echo esc_attr( $moment['side'] );
                            ?>
                        "
                    >


                        <!-- LEFT COLUMN -->

                        <div class="my-paths-moment__left">

                            <?php if ( 'left' === $moment['side'] ) : ?>

                                <!--
                                FINAL IMAGE:
                                assets/images/my-paths/<?php
                                echo esc_html( $moment['image'] );
                                ?>
                                -->

                             <div class="my-paths-moment__image">

	<?php if ( has_post_thumbnail() ) : ?>

		<?php
		the_post_thumbnail(
			'large',
			array(
				'alt'     => the_title_attribute(
					array(
						'echo' => false,
					)
				),
				'loading' => 'lazy',
			)
		);
		?>

	<?php else : ?>

		<span>
			<?php esc_html_e( 'Journey image', 'greshma' ); ?>
		</span>

	<?php endif; ?>

</div>

                            <?php else : ?>

                                <div class="my-paths-moment__content">

                                    <span class="my-paths-moment__number">
                                        <?php
                                        echo esc_html(
                                            $moment['number']
                                        );
                                        ?>
                                    </span>

                                    <h3>
                                        <?php
                                        echo esc_html(
                                            $moment['title']
                                        );
                                        ?>
                                    </h3>

                                    <span class="my-paths-moment__period">
                                        <?php
                                        echo esc_html(
                                            $moment['period']
                                        );
                                        ?>
                                    </span>

                                    <p>
                                        <?php
                                        echo esc_html(
                                            $moment['description']
                                        );
                                        ?>
                                    </p>

                                </div>

                            <?php endif; ?>

                        </div>


                        <!-- CENTER MARKER -->

                        <div class="my-paths-moment__marker">

                            <span>
                                <?php
                                echo esc_html(
                                    $moment['icon']
                                );
                                ?>
                            </span>

                        </div>


                        <!-- RIGHT COLUMN -->

                        <div class="my-paths-moment__right">

                            <?php if ( 'right' === $moment['side'] ) : ?>

                                <!--
                                FINAL IMAGE:
                                assets/images/my-paths/<?php
                                echo esc_html( $moment['image'] );
                                ?>
                                -->

<div class="my-paths-moment__image">

	<?php if ( has_post_thumbnail() ) : ?>

		<?php
		the_post_thumbnail(
			'large',
			array(
				'alt'     => the_title_attribute(
					array(
						'echo' => false,
					)
				),
				'loading' => 'lazy',
			)
		);
		?>

	<?php else : ?>

		<span>
			<?php esc_html_e( 'Journey image', 'greshma' ); ?>
		</span>

	<?php endif; ?>

</div>

                            <?php else : ?>

                                <div class="my-paths-moment__content">

                                    <span class="my-paths-moment__number">
                                        <?php
                                        echo esc_html(
                                            $moment['number']
                                        );
                                        ?>
                                    </span>

                                    <h3>
                                        <?php
                                        echo esc_html(
                                            $moment['title']
                                        );
                                        ?>
                                    </h3>

                                    <span class="my-paths-moment__period">
                                        <?php
                                        echo esc_html(
                                            $moment['period']
                                        );
                                        ?>
                                    </span>

                                    <p>
                                        <?php
                                        echo esc_html(
                                            $moment['description']
                                        );
                                        ?>
                                    </p>

                                </div>

                            <?php endif; ?>

                        </div>

                    </article>

                <?php endwhile; ?>

<?php wp_reset_postdata(); ?>

<?php else : ?>

	<p class="my-paths-moments__empty">
		<?php esc_html_e( 'Journey moments will be added soon.', 'greshma' ); ?>
	</p>

<?php endif; ?>

            </div>


            <!-- ======================================
                 RIGHT SIDEBAR
            ======================================= -->

            <div class="my-paths-moments__sidebar">


                <!-- ==================================
                     QUOTE CARD
                =================================== -->

                <aside class="my-paths-moments__quote">

                    <span
                        class="my-paths-moments__quote-mark"
                        aria-hidden="true"
                    >
                        “
                    </span>

                    <p>
                        Every conversation
                        is a chance to build
                        understanding.
                        Every action is a step
                        towards a better tomorrow.
                    </p>

                    <cite>
                        — Greshma Pious Raju
                    </cite>

                    <span
                        class="my-paths-moments__quote-leaf"
                        aria-hidden="true"
                    >
                        ❧
                    </span>

                </aside>

                <?php
$education_query = new WP_Query(
	array(
		'post_type'      => 'greshma_education',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'meta_key'       => '_greshma_education_order',
		'orderby'        => array(
			'meta_value_num' => 'ASC',
			'title'          => 'ASC',
		),
		'order'          => 'ASC',
	)
);
?>


                <!-- ==================================
                     MY EDUCATION
                =================================== -->

                <aside class="my-paths-education-card">

                    <div class="my-paths-education-card__heading">

                        <span>My Education</span>

                        <span aria-hidden="true">
                            ❧
                        </span>

                    </div>


                    <div class="my-paths-education-card__timeline">
<?php if ( $education_query->have_posts() ) : ?>

	<?php while ( $education_query->have_posts() ) : ?>

		<?php
		$education_query->the_post();

		$year = get_post_meta(
			get_the_ID(),
			'_greshma_education_year',
			true
		);

		$institution = get_post_meta(
			get_the_ID(),
			'_greshma_education_institution',
			true
		);

		$location = get_post_meta(
			get_the_ID(),
			'_greshma_education_location',
			true
		);
		?>

		<div class="my-paths-education-card__item">

			<div class="my-paths-education-card__year">
				<?php echo esc_html( $year ); ?>
			</div>

			<div class="my-paths-education-card__marker">
				<span></span>
			</div>

			<div class="my-paths-education-card__content">

				<h3>
					<?php the_title(); ?>
				</h3>

				<p>
					<?php
					echo esc_html(
						trim(
							$institution .
							( $location ? ', ' . $location : '' )
						)
					);
					?>
				</p>

			</div>

		</div>

	<?php endwhile; ?>

	<?php wp_reset_postdata(); ?>

<?php else : ?>

	<p>
		<?php esc_html_e(
			'Education entries will be added soon.',
			'greshma'
		); ?>
	</p>

<?php endif; ?>


                    </div>

                </aside>

            </div>

        </div>

    </div>

</section>