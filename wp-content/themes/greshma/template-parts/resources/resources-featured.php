<?php
/**
 * Resources Page — Featured Resources.
 *
 * PNG placeholders:
 * assets/images/resources/resource-feature-01.png
 * assets/images/resources/resource-feature-02.png
 * assets/images/resources/resource-feature-03.png
 * assets/images/resources/resource-feature-04.png
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$featured_resources = [

    [
        'type'        => 'Guide',
        'title'       => 'Youth Peacebuilding Guide',
        'description' => 'A practical guide to help young people build dialogue, understanding, and peaceful communities.',
        'format'      => 'PDF',
        'size'        => '2.4 MB',
        'image'       => 'resource-feature-01.png',
    ],

    [
        'type'        => 'Toolkit',
        'title'       => 'Climate Action Toolkit',
        'description' => 'Activities and tools designed to support meaningful climate conversations and local action.',
        'format'      => 'PDF',
        'size'        => '3.1 MB',
        'image'       => 'resource-feature-02.png',
    ],

    [
        'type'        => 'Activity Pack',
        'title'       => 'Interfaith Dialogue Activities',
        'description' => 'Simple activities for creating respectful conversations across faiths, cultures, and communities.',
        'format'      => 'PDF',
        'size'        => '1.8 MB',
        'image'       => 'resource-feature-03.png',
    ],

    [
        'type'        => 'Report',
        'title'       => 'Youth & Climate Report',
        'description' => 'Insights and reflections on youth participation, climate leadership, and community engagement.',
        'format'      => 'PDF',
        'size'        => '4.2 MB',
        'image'       => 'resource-feature-04.png',
    ],

];
?>

<section class="resources-featured">

    <div class="container">

        <!-- SECTION HEADING -->

        <div class="resources-featured__heading">

            <div class="resources-featured__title-wrap">

                <span
                    class="resources-featured__leaf"
                    aria-hidden="true"
                >
                    ❧
                </span>

                <h2>
                    Featured Resources
                </h2>

            </div>

            <a
                href="#resources-browse"
                class="resources-featured__view-all"
            >
                View All Featured
                <span aria-hidden="true">→</span>
            </a>

        </div>


        <!-- RESOURCE CARDS -->

        <div class="resources-featured__grid">

            <?php foreach ( $featured_resources as $resource ) : ?>

                <article class="resources-feature-card">


                    <!-- IMAGE -->

                    <div class="resources-feature-card__image">

                        <div class="resources-feature-card__placeholder">

                            <span>
                                <?php echo esc_html( $resource['image'] ); ?>
                            </span>

                        </div>


                        <span class="resources-feature-card__badge">

                            <?php echo esc_html( $resource['type'] ); ?>

                        </span>

                    </div>


                    <!-- CONTENT -->

                    <div class="resources-feature-card__content">

                        <h3>
                            <?php echo esc_html( $resource['title'] ); ?>
                        </h3>


                        <p>
                            <?php echo esc_html( $resource['description'] ); ?>
                        </p>


                        <div class="resources-feature-card__footer">

                            <div class="resources-feature-card__meta">

                                <span>
                                    <?php echo esc_html( $resource['format'] ); ?>
                                </span>

                                <span
                                    class="resources-feature-card__dot"
                                    aria-hidden="true"
                                ></span>

                                <span>
                                    <?php echo esc_html( $resource['size'] ); ?>
                                </span>

                            </div>


                            <a
                                href="#"
                                class="resources-feature-card__download"
                                aria-label="Download <?php echo esc_attr( $resource['title'] ); ?>"
                            >

                                <svg
                                    viewBox="0 0 24 24"
                                    aria-hidden="true"
                                >
                                    <path d="M12 3v12"/>
                                    <path d="m7 10 5 5 5-5"/>
                                    <path d="M5 20h14"/>
                                </svg>

                            </a>

                        </div>

                    </div>

                </article>

            <?php endforeach; ?>

        </div>

    </div>

</section>