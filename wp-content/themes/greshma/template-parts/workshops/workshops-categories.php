<?php
/**
 * Workshops Page — Categories.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$workshop_categories = [

    [
        'key'   => 'peacebuilding',
        'label' => 'Peacebuilding',
        'icon'  => 'peace',
    ],

    [
        'key'   => 'climate-action',
        'label' => 'Climate Action',
        'icon'  => 'climate',
    ],

    [
        'key'   => 'interfaith-dialogue',
        'label' => 'Interfaith Dialogue',
        'icon'  => 'interfaith',
    ],

    [
        'key'   => 'youth-leadership',
        'label' => 'Youth Leadership',
        'icon'  => 'youth',
    ],

    [
        'key'   => 'education-values',
        'label' => 'Education & Values',
        'icon'  => 'education',
    ],

    [
        'key'   => 'community-building',
        'label' => 'Community Building',
        'icon'  => 'community',
    ],

    [
        'key'   => 'facilitation-skills',
        'label' => 'Facilitation Skills',
        'icon'  => 'facilitation',
    ],

    [
        'key'   => 'custom-workshops',
        'label' => 'Custom Workshops',
        'icon'  => 'custom',
    ],

];
?>

<section class="workshops-categories">

    <div class="container">


        <!-- HEADING -->

        <div class="workshops-categories__heading">

            <div class="workshops-categories__title-wrap">

                <h2>
                    Workshop Categories
                </h2>

                <span aria-hidden="true">
                    ❧
                </span>

            </div>


            <a
                href="#featured-workshops"
                class="workshops-categories__view-all"
            >
                View All Workshops

                <span aria-hidden="true">
                    →
                </span>
            </a>

        </div>


        <!-- CATEGORIES -->

        <div class="workshops-categories__grid">

            <?php foreach ( $workshop_categories as $category ) : ?>

                <a
                    href="#featured-workshops"
                    class="workshop-category-card"
                    data-workshop-category="<?php
                    echo esc_attr(
                        $category['key']
                    );
                    ?>"
                >

                    <span
                        class="workshop-category-card__icon"
                        aria-hidden="true"
                    >

                        <?php if ( 'peace' === $category['icon'] ) : ?>

                            <svg viewBox="0 0 48 48">

                                <path d="M8 28c8-1 13-5 16-12 3 6 7 9 13 10 4 1 7 0 10-2-3 7-9 11-17 11-7 0-13-2-17-6l-6 3Z"/>

                                <path d="M24 16c0-5 2-9 6-12 0 7 2 11 7 14"/>

                            </svg>


                        <?php elseif ( 'climate' === $category['icon'] ) : ?>

                            <svg viewBox="0 0 48 48">

                                <path d="M24 41V19"/>

                                <path d="M24 29C15 28 10 23 9 14c9 1 14 6 15 15Z"/>

                                <path d="M24 23C26 15 31 10 39 8c0 9-5 14-15 16Z"/>

                                <path d="M16 41h16"/>

                            </svg>


                        <?php elseif ( 'interfaith' === $category['icon'] ) : ?>

                            <svg viewBox="0 0 48 48">

                                <circle cx="24" cy="12" r="4"/>
                                <circle cx="12" cy="20" r="4"/>
                                <circle cx="36" cy="20" r="4"/>

                                <path d="M17 40v-8c0-6 3-10 7-10s7 4 7 10v8"/>

                                <path d="M6 40v-6c0-5 2-9 6-9"/>

                                <path d="M42 40v-6c0-5-2-9-6-9"/>

                            </svg>


                        <?php elseif ( 'youth' === $category['icon'] ) : ?>

                            <svg viewBox="0 0 48 48">

                                <circle cx="24" cy="11" r="5"/>

                                <path d="M16 39v-9c0-6 3-10 8-10s8 4 8 10v9"/>

                                <path d="M12 24l-5 7"/>
                                <path d="M36 24l5 7"/>

                                <path d="M16 40h16"/>

                            </svg>


                        <?php elseif ( 'education' === $category['icon'] ) : ?>

                            <svg viewBox="0 0 48 48">

                                <path d="M6 9h14c4 0 6 2 6 6v27c0-4-2-6-6-6H6Z"/>

                                <path d="M42 9H28c-4 0-6 2-6 6v27c0-4 2-6 6-6h14Z"/>

                            </svg>


                        <?php elseif ( 'community' === $category['icon'] ) : ?>

                            <svg viewBox="0 0 48 48">

                                <circle cx="24" cy="13" r="5"/>
                                <circle cx="11" cy="20" r="4"/>
                                <circle cx="37" cy="20" r="4"/>

                                <path d="M17 40v-8c0-6 3-11 7-11s7 5 7 11v8"/>

                                <path d="M5 40v-6c0-5 2-9 6-9"/>
                                <path d="M43 40v-6c0-5-2-9-6-9"/>

                            </svg>


                        <?php elseif ( 'facilitation' === $category['icon'] ) : ?>

                            <svg viewBox="0 0 48 48">

                                <rect
                                    x="8"
                                    y="8"
                                    width="32"
                                    height="23"
                                    rx="2"
                                />

                                <path d="M14 37h20"/>
                                <path d="M24 31v6"/>

                                <circle cx="19" cy="18" r="3"/>

                                <path d="M14 26c1-4 3-6 5-6s4 2 5 6"/>

                                <path d="M29 15h7"/>
                                <path d="M29 20h7"/>
                                <path d="M29 25h5"/>

                            </svg>


                        <?php elseif ( 'custom' === $category['icon'] ) : ?>

                            <svg viewBox="0 0 48 48">

                                <path d="M19 7h10v8c2-1 3-2 5-2 5 0 8 4 8 8s-3 8-8 8c-2 0-3-1-5-2v14H17v-9c-1 2-3 3-6 3-5 0-8-4-8-8s3-8 8-8c3 0 5 1 6 3V7Z"/>

                            </svg>

                        <?php endif; ?>

                    </span>


                    <span class="workshop-category-card__label">

                        <?php
                        echo esc_html(
                            $category['label']
                        );
                        ?>

                    </span>

                </a>

            <?php endforeach; ?>

        </div>

    </div>

</section>