<?php
/**
 * About Page — Hero Section.
 *
 * IMAGE ASSETS REQUIRED LATER:
 *
 * 1. assets/images/about/about-hero-bg.png
 *    Wide mountain / nature landscape.
 *
 * 2. assets/images/about/about-hero-person.png
 *    Greshma standing portrait.
 *    Transparent PNG preferred.
 *
 * 3. assets/images/about/about-signature.png
 *    Greshma signature with transparent background.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="about-hero">

    <!-- FULL HERO BACKGROUND -->
    <div class="about-hero__background">

        <img
            src="<?php echo esc_url(
                get_template_directory_uri() .
                '/assets/images/about/about-hero-person.png'
            ); ?>"
            alt=""
            class="about-hero__background-image"
            loading="eager"
            decoding="async"
        >

    </div>


    <!-- CREAM / IMAGE BLEND -->
    <div
        class="about-hero__fade"
        aria-hidden="true"
    ></div>


    <!-- SOCIAL LINKS -->
    <div class="about-hero__social">

        <a href="#" aria-label="Instagram">
            <?php
            get_template_part(
                'template-parts/icons/instagram'
            );
            ?>
        </a>

        <a href="#" aria-label="LinkedIn">
            <?php
            get_template_part(
                'template-parts/icons/linkedin'
            );
            ?>
        </a>

        <a href="#" aria-label="YouTube">
            <?php
            get_template_part(
                'template-parts/icons/youtube'
            );
            ?>
        </a>

        <a
            href="mailto:hello@greshma.me"
            aria-label="Email"
        >
            <?php
            get_template_part(
                'template-parts/icons/email'
            );
            ?>
        </a>

    </div>


    <div class="container">

        <div class="about-hero__layout">


            <!-- LEFT CONTENT -->

            <div class="about-hero__content">

                <div class="about-hero__eyebrow">

                    <span>About Me</span>

                    <span
                        class="about-hero__eyebrow-icon"
                        aria-hidden="true"
                    >
                        ❧
                    </span>

                </div>


                <h1 class="about-hero__title">

                    Building a

                    <em>kinder, fairer</em>

                    and <span>greener</span> world.

                </h1>


                <div
                    class="about-hero__divider"
                    aria-hidden="true"
                ></div>


                <p class="about-hero__intro">
                    I am Greshma Pious Raju, an international
                    development practitioner working at the
                    intersection of climate action, peacebuilding,
                    youth leadership, and transformative education.
                    I design and lead community-centred initiatives
                    that foster dialogue, ecological leadership,
                    and social change. Through collaborative
                    partnerships and innovative learning experiences,
                    I empower young people and communities to become
                    ethical leaders and active changemakers,
                    advancing peace, sustainability, and resilient
                    futures.
                </p>


                <div class="about-hero__signature-placeholder">
                    Greshma Pious Raju
                </div>

            </div>


            <!-- RIGHT AREA — ONLY QUOTE -->

            <div class="about-hero__visual">

                <blockquote class="about-hero__quote">

                    <span
                        class="about-hero__quote-mark"
                        aria-hidden="true"
                    >
                        “
                    </span>

                    <div class="about-hero__quote-content">

                        <p>
                            Peace begins with people.<br>
                            Hope grows through action.
                        </p>

                        <cite>
                            — Greshma Pious Raju
                        </cite>

                    </div>

                </blockquote>

            </div>


        </div>

    </div>

</section>