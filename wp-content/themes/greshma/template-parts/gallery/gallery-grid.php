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

$gallery_items = [

    [
        'title'    => 'Dialogue Circle with Youth',
        'location' => 'Kerala, India',
        'image'    => 'gallery-01.png',
        'category' => 'dialogue-circles',
    ],

    [
        'title'    => 'Youth Leadership Workshop',
        'location' => 'Bengaluru, India',
        'image'    => 'gallery-02.png',
        'category' => 'youth-leadership',
    ],

    [
        'title'    => 'URI Global Conference',
        'location' => 'Lisbon, Portugal',
        'image'    => 'gallery-03.png',
        'category' => 'conferences-events',
    ],

    [
        'title'    => 'Community Peace Workshop',
        'location' => 'Thailand',
        'image'    => 'gallery-04.png',
        'category' => 'programs-workshops',
    ],

    [
        'title'    => 'Ecopeace Teen Café Session',
        'location' => 'Online',
        'image'    => 'gallery-05.png',
        'category' => 'community-engagement',
    ],

    [
        'title'    => 'Restorative Dialogue Process',
        'location' => 'Mumbai, India',
        'image'    => 'gallery-06.png',
        'category' => 'dialogue-circles',
    ],

    [
        'title'    => 'Field Visit',
        'location' => 'Western Ghats, India',
        'image'    => 'gallery-07.png',
        'category' => 'travel-field-visits',
    ],

    [
        'title'    => 'Speaking at Interfaith Conference',
        'location' => 'Nairobi, Kenya',
        'image'    => 'gallery-08.png',
        'category' => 'conferences-events',
    ],

    [
        'title'    => 'Youth Climate Action',
        'location' => 'Bali, Indonesia',
        'image'    => 'gallery-09.png',
        'category' => 'youth-leadership',
    ],

    [
        'title'    => 'Peace Education for Youth',
        'location' => 'Kerala, India',
        'image'    => 'gallery-10.png',
        'category' => 'programs-workshops',
    ],

    [
        'title'    => 'Values in Action',
        'location' => 'Dialogue Activity',
        'image'    => 'gallery-11.png',
        'category' => 'community-engagement',
    ],

    [
        'title'    => 'Training of Youth Facilitators',
        'location' => 'Kodaikanal, India',
        'image'    => 'gallery-12.png',
        'category' => 'programs-workshops',
    ],

];
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

                <?php foreach ( $gallery_items as $item ) : ?>

                    <article
                        class="gallery-card"
                        data-gallery-item
                        data-category="<?php echo esc_attr( $item['category'] ); ?>"
                    >

                        <!--
                        FINAL IMAGE:
                        assets/images/gallery/<?php
                        echo esc_html( $item['image'] );
                        ?>
                        -->

                        <div class="gallery-card__image">

                            <span>
                                <?php
                                echo esc_html(
                                    $item['image']
                                );
                                ?>
                            </span>

                        </div>


                        <div class="gallery-card__content">

                            <h3>
                                <?php
                                echo esc_html(
                                    $item['title']
                                );
                                ?>
                            </h3>


                            <p>

                                <span aria-hidden="true">
                                    ⌖
                                </span>

                                <?php
                                echo esc_html(
                                    $item['location']
                                );
                                ?>

                            </p>

                        </div>

                    </article>

                <?php endforeach; ?>

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