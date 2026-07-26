<?php
/**
 * Impacts Page — Bottom CTA.
 *
 * IMAGE ASSETS REQUIRED LATER:
 *
 * assets/images/impacts/impacts-cta-bg.png
 * assets/images/impacts/impacts-cta-people.png
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="impacts-cta">


    <!-- ==========================================
         BACKGROUND

         FINAL IMAGE:
         assets/images/impacts/impacts-cta-bg.png

         Sunset / mountain landscape.
    =========================================== -->

    <div class="impacts-cta__background">

        <div class="impacts-cta__background-placeholder">

            <span>
                impacts-cta-bg.png
            </span>

        </div>

    </div>


    <div
        class="impacts-cta__overlay"
        aria-hidden="true"
    ></div>


    <!-- Decorative leaves -->

    <div
        class="
            impacts-cta__leaf
            impacts-cta__leaf--left
        "
        aria-hidden="true"
    >
        ❧
    </div>

    <div
        class="
            impacts-cta__leaf
            impacts-cta__leaf--right
        "
        aria-hidden="true"
    >
        ❧
    </div>


    <div class="container">

        <div class="impacts-cta__layout">


            <!-- ======================================
                 LEFT CONTENT
            ======================================= -->

            <div class="impacts-cta__content">

                <h2>
                    Let’s create ripples
                    of change together.
                </h2>

                <p>
                    Collaborate. Contribute. Inspire.
                </p>


                <a
                    href="<?php
                    echo esc_url(
                        home_url( '/contact/' )
                    );
                    ?>"
                    class="impacts-cta__button"
                >
                    <span>
                        Let’s Connect
                    </span>

                    <span
                        class="impacts-cta__button-icon"
                        aria-hidden="true"
                    >
                        ↗
                    </span>
                </a>

            </div>


            <!-- ======================================
                 RIGHT PEOPLE IMAGE

                 FINAL IMAGE:
                 assets/images/impacts/
                 impacts-cta-people.png

                 Transparent PNG preferred.
            ======================================= -->

            <div class="impacts-cta__visual">

                <div class="impacts-cta__people-placeholder">

                    <span>
                        impacts-cta-people.png
                    </span>

                </div>

            </div>

        </div>

    </div>

</section>