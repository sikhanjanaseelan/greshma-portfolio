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

    <!-- ==================================================
         BACKGROUND IMAGE PLACEHOLDER

         FINAL IMAGE:
         assets/images/about/about-hero-bg.png

         Replace this placeholder when the final
         mountain / nature image is available.
    =================================================== -->
    <div class="about-hero__background">

        <div class="about-hero__image-placeholder">
            <span>about-hero-bg.png</span>
        </div>

    </div>

    <div
        class="about-hero__fade"
        aria-hidden="true"
    ></div>


    <!-- ==================================================
         SOCIAL LINKS
    =================================================== -->
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


            <!-- ==================================================
                 LEFT CONTENT
            =================================================== -->
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
                    I am a peacebuilder, connector and nature lover
                    with a passion for building bridges between people
                    and the planet. I believe in the power of dialogue,
                    learning and collective action to create lasting
                    change.
                </p>


                <!-- ==============================================
                     SIGNATURE PLACEHOLDER

                     FINAL IMAGE:
                     assets/images/about/about-signature.png
                =============================================== -->
                <div class="about-hero__signature-placeholder">
                    Greshma Pious Raju
                </div>

            </div>


            <!-- ==================================================
                 RIGHT VISUAL
            =================================================== -->
            <div class="about-hero__visual">


                <!-- ==============================================
                     PERSON IMAGE PLACEHOLDER

                     FINAL IMAGE:
                     assets/images/about/about-hero-person.png

                     Transparent PNG preferred.
                =============================================== -->
                <div class="about-hero__person-placeholder">

                    <span>
                        about-hero-person.png
                    </span>

                </div>


                <!-- ==============================================
                     QUOTE CARD
                =============================================== -->
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