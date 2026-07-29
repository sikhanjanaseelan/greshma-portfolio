<?php
/**
 * Gallery Page — Grid + Sidebar.
 *
 * IMAGE ASSETS REQUIRED LATER:
 *
 * assets/images/gallery/gallery-01.png
 * assets/images/gallery/gallery-02.png
 * assets/images/gallery/gallery-03.png
 * assets/images/gallery/gallery-04.png
 * assets/images/gallery/gallery-05.png
 * assets/images/gallery/gallery-06.png
 * assets/images/gallery/gallery-07.png
 * assets/images/gallery/gallery-08.png
 * assets/images/gallery/gallery-09.png
 * assets/images/gallery/gallery-10.png
 * assets/images/gallery/gallery-11.png
 * assets/images/gallery/gallery-12.png
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;


$gallery_query = new WP_Query(
	array(
		'post_type'      => 'greshma_gallery',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'orderby'        => array(
			'menu_order' => 'ASC',
			'date'       => 'DESC',
		),
	)
);

?>

<section class="gallery-content">

    <div class="container">

        <div class="gallery-content__layout">


            <!-- ==========================================
                 LEFT — GALLERY ITEMS
            =========================================== -->

            <div
                class="gallery-grid"
                data-gallery-grid
            >

           <?php if ( $gallery_query->have_posts() ) : ?>

	<?php while ( $gallery_query->have_posts() ) : ?>

		<?php
		$gallery_query->the_post();

		$caption = get_post_meta(
			get_the_ID(),
			'_greshma_gallery_caption',
			true
		);

		$location = get_post_meta(
			get_the_ID(),
			'_greshma_gallery_location',
			true
		);

		$year = get_post_meta(
			get_the_ID(),
			'_greshma_gallery_year',
			true
		);

		$categories = get_the_terms(
			get_the_ID(),
			'greshma_gallery_category'
		);

		$category_slugs = array();

		if (
			! empty( $categories ) &&
			! is_wp_error( $categories )
		) {
			$category_slugs = wp_list_pluck(
				$categories,
				'slug'
			);
		}

		$category_value = ! empty( $category_slugs )
			? implode( ' ', $category_slugs )
			: 'uncategorized';
		?>

		<article
			class="gallery-card"
			data-gallery-item
			data-category="<?php echo esc_attr( $category_value ); ?>"
		>

			<div class="gallery-card__image">

				<?php if ( has_post_thumbnail() ) : ?>

					<?php
					the_post_thumbnail(
						'large',
						array(
							'loading' => 'lazy',
							'alt'     => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
					?>

				<?php else : ?>

					<span>
						<?php esc_html_e( 'Gallery image', 'greshma' ); ?>
					</span>

				<?php endif; ?>

			</div>

			<div class="gallery-card__content">

				<h3>
					<?php the_title(); ?>
				</h3>

				<?php if ( $caption ) : ?>

					<p class="gallery-card__caption">
						<?php echo esc_html( $caption ); ?>
					</p>

				<?php endif; ?>

				<?php if ( $location || $year ) : ?>

					<p>

						<span aria-hidden="true">
							⌖
						</span>

						<?php
						echo esc_html(
							trim(
								$location .
								( $location && $year ? ' · ' : '' ) .
								$year
							)
						);
						?>

					</p>

				<?php endif; ?>

			</div>

		</article>

	<?php endwhile; ?>

	<?php wp_reset_postdata(); ?>

<?php else : ?>

	<div class="gallery-grid__empty">

		<p>
			<?php esc_html_e(
				'Gallery items will be added soon.',
				'greshma'
			); ?>
		</p>

	</div>

<?php endif; ?>

            </div>


            <!-- ==========================================
                 RIGHT SIDEBAR
            =========================================== -->

            <aside class="gallery-sidebar">


                <!-- ======================================
                     JOURNEY IN NUMBERS
                ======================================= -->

                <div class="gallery-sidebar__stats">

                    <div class="gallery-sidebar__heading">

                        <h2>
                            Our Journey in Numbers
                        </h2>

                        <span aria-hidden="true">
                            ❧
                        </span>

                    </div>


                    <div class="gallery-sidebar__stats-list">


                        <div class="gallery-sidebar__stat">

                            <div class="gallery-sidebar__stat-icon">
                                ♧
                            </div>

                            <div>

                                <strong>
                                    500+
                                </strong>

                                <span>
                                    Young People Engaged
                                </span>

                            </div>

                        </div>


                        <div class="gallery-sidebar__stat">

                            <div class="gallery-sidebar__stat-icon">
                                ◎
                            </div>

                            <div>

                                <strong>
                                    25+
                                </strong>

                                <span>
                                    Countries Reached
                                </span>

                            </div>

                        </div>


                        <div class="gallery-sidebar__stat">

                            <div class="gallery-sidebar__stat-icon">
                                ◇
                            </div>

                            <div>

                                <strong>
                                    100+
                                </strong>

                                <span>
                                    Programs &amp; Workshops
                                </span>

                            </div>

                        </div>


                        <div class="gallery-sidebar__stat">

                            <div class="gallery-sidebar__stat-icon">
                                ✦
                            </div>

                            <div>

                                <strong>
                                    50+
                                </strong>

                                <span>
                                    Dialogue Circles
                                </span>

                            </div>

                        </div>


                        <div class="gallery-sidebar__stat">

                            <div class="gallery-sidebar__stat-icon">
                                ♧
                            </div>

                            <div>

                                <strong>
                                    12+
                                </strong>

                                <span>
                                    Global Volunteers
                                </span>

                            </div>

                        </div>


                        <div class="gallery-sidebar__stat">

                            <div class="gallery-sidebar__stat-icon">
                                ◫
                            </div>

                            <div>

                                <strong>
                                    10+
                                </strong>

                                <span>
                                    Years of Peacebuilding
                                </span>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- ======================================
                     SIDEBAR CTA
                ======================================= -->

                <div class="gallery-sidebar__cta">

                    <h2>
                        Every moment
                        tells a story of hope.
                    </h2>

                    <p>
                        Let’s create many
                        more together.
                    </p>


                    <a
                        href="<?php
                        echo esc_url(
                            home_url( '/contact/' )
                        );
                        ?>"
                    >
                        Let’s Connect

                        <span aria-hidden="true">
                            →
                        </span>
                    </a>


                    <span
                        class="gallery-sidebar__cta-leaf"
                        aria-hidden="true"
                    >
                        ❧
                    </span>

                </div>

            </aside>

        </div>

    </div>

</section>