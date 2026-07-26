<?php
/**
 * Projects Page — Media Recognition.
 *
 * LOGO ASSETS REQUIRED LATER:
 *
 * assets/images/projects/projects-media-uri.png
 * assets/images/projects/projects-media-okc.png
 * assets/images/projects/projects-media-unep.png
 * assets/images/projects/projects-media-upeace.png
 * assets/images/projects/projects-media-lingnan.png
 * assets/images/projects/projects-media-faith-earth.png
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$recognitions = [

    [
        'name' => 'United Religions Initiative',
        'logo' => 'projects-media-uri.png',
    ],

    [
        'name' => 'Our Kids’ Climate',
        'logo' => 'projects-media-okc.png',
    ],

    [
        'name' => 'UN Environment Programme',
        'logo' => 'projects-media-unep.png',
    ],

    [
        'name' => 'University for Peace',
        'logo' => 'projects-media-upeace.png',
    ],

    [
        'name' => 'Lingnan University',
        'logo' => 'projects-media-lingnan.png',
    ],

    [
        'name' => 'Faith for Earth',
        'logo' => 'projects-media-faith-earth.png',
    ],

];
?>

<div class="projects-media">

    <!-- ==========================================
         SECTION LABEL
    =========================================== -->

    <div class="projects-subsection-label">
        5. Media Recognition
    </div>


    <!-- ==========================================
         INTRO
    =========================================== -->

    <div class="projects-media__intro">

        <p>
            Honoured to be featured and recognized by
            amazing organisations and platforms.
        </p>

    </div>


    <!-- ==========================================
         LOGO GRID
    =========================================== -->

    <div class="projects-media__grid">

        <?php foreach ( $recognitions as $recognition ) : ?>

            <article class="projects-media__item">

                <!--
                FINAL LOGO:

                assets/images/projects/<?php
                echo esc_html(
                    $recognition['logo']
                );
                ?>
                -->

                <div class="projects-media__logo-placeholder">

                    <span>
                        <?php
                        echo esc_html(
                            $recognition['name']
                        );
                        ?>
                    </span>

                </div>

            </article>

        <?php endforeach; ?>

    </div>

</div>