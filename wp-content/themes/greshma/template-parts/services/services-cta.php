<?php
/**
 * Services Page — CTA.
 *
 * IMAGE ASSETS REQUIRED LATER:
 *
 * assets/images/services/services-cta-bg.png
 * assets/images/services/services-cta-community.png
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="services-cta">

    <!-- ==========================================
         BACKGROUND

         FINAL IMAGE:
         assets/images/services/services-cta-bg.png

         Forest / community environment.
    =========================================== -->

    <div class="services-cta__background">

        <div class="services-cta__background-placeholder">

            <span>
                services-cta-bg.png
            </span>

        </div>

    </div>


    <div
        class="services-cta__overlay"
        aria-hidden="true"
    ></div>


    <div class="container">

        <div class="services-cta__layout">


            <!-- ======================================
                 LEFT CONTENT
            ======================================= -->

            <div class="services-cta__content">

                <h2>
                    Let’s create meaningful
                    change together.
                </h2>

                <p>
                    I’d love to hear about your vision
                    and explore how we can work together.
                </p>

                <a
                    href="<?php
                    echo esc_url(
                        home_url( '/contact/' )
                    );
                    ?>"
                    class="services-cta__button"
                >
                    <span>
                        Let’s Connect
                    </span>

                    <span
                        aria-hidden="true"
                        class="services-cta__button-icon"
                    >
                        →
                    </span>
                </a>

            </div>


            <!-- ======================================
                 RIGHT COMMUNITY VISUAL

                 FINAL IMAGE:
                 assets/images/services/
                 services-cta-community.png
            ======================================= -->

            <div class="services-cta__visual">

                <div class="services-cta__community-placeholder">

                    <span>
                        services-cta-community.png
                    </span>

                </div>

            </div>

        </div>

    </div>

</section>