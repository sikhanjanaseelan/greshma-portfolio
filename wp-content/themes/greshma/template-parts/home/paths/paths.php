<?php
/**
 * The Paths I Walk
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$paths = [
    [
        'image' => 'path-1.png',
        'icon'  => 'icon-1.svg',
        'title' => 'Peace & Climate Educator',
        'desc'  => 'Nurturing minds and hearts for a just and sustainable future.',
    ],
    [
        'image' => 'path-2.png',
        'icon'  => 'icon-2.svg',
        'title' => 'Storyteller',
        'desc'  => 'Sharing stories that heal, connect and inspire.',
    ],
    [
        'image' => 'path-3.png',
        'icon'  => 'icon-3.svg',
        'title' => 'Connector',
        'desc'  => 'Building bridges between people, ideas and movements.',
    ],
    [
        'image' => 'path-4.png',
        'icon'  => 'icon-4.svg',
        'title' => 'Peacebuilder',
        'desc'  => 'Creating spaces for trust, dialogue and healing.',
    ],
    [
        'image' => 'path-5.png',
        'icon'  => 'icon-5.svg',
        'title' => 'Facilitator',
        'desc'  => 'Guiding conversations and collective action.',
    ],
];

$theme_uri = get_template_directory_uri();
?>

<section class="paths-section">

    <div class="container">

        <div class="paths-layout">

            <!-- Left Intro -->

            <div class="paths-intro reveal">

                <span class="paths-label">
                    THE PATHS I WALK
                </span>

                <h2>
                    Five paths.
                    <br>
                    One purpose.
                </h2>

                <p>
                    Each path reflects a part of my journey and the work I do
                    for a more peaceful and sustainable world.
                </p>

                <a href="<?php echo esc_url( home_url( '/my-paths' ) ); ?>" class="paths-link">
                    Explore All Paths →
                </a>

            </div>

            <!-- Cards -->

            <div class="paths-cards">

                <?php foreach ( $paths as $index => $path ) : ?>

                    <article
                        class="path-card reveal"
                        style="--delay: <?php echo esc_attr( $index * 100 ); ?>ms;">

                        <div class="path-card-image">

                            <img
                                src="<?php echo esc_url( $theme_uri . '/assets/images/paths/' . $path['image'] ); ?>"
                                alt="<?php echo esc_attr( $path['title'] ); ?>">

                        </div>

                        <div class="path-card-content">

                            <div class="path-icon">

                                <img
                                    src="<?php echo esc_url( $theme_uri . '/assets/images/paths/' . $path['icon'] ); ?>"
                                    alt="">

                            </div>

                            <h3>
                                <?php echo esc_html( $path['title'] ); ?>
                            </h3>

                            <p>
                                <?php echo esc_html( $path['desc'] ); ?>
                            </p>

                           <a
    href="<?php echo esc_url( home_url( '/my-paths/' ) ); ?>"
    class="path-arrow"
    aria-label="<?php echo esc_attr( 'Explore ' . $path['title'] ); ?>"
>
    →
</a>

                        </div>

                    </article>

                <?php endforeach; ?>

            </div>

        </div>

    </div>

</section>