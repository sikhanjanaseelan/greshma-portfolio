<?php
/**
 * Projects Page — Bottom CTA.
 *
 * IMAGE ASSETS REQUIRED LATER:
 *
 * assets/images/projects/projects-cta-bg.png
 * assets/images/projects/projects-cta-person.png
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="projects-cta">

    <!-- ==========================================
         BACKGROUND IMAGE

         FINAL IMAGE:
         assets/images/projects/projects-cta-bg.png

         Wide mountain / green landscape.
    =========================================== -->

    <div class="projects-cta__background">

        <div class="projects-cta__background-placeholder">

            <span>
                projects-cta-bg.png
            </span>

        </div>

    </div>


    <div
        class="projects-cta__overlay"
        aria-hidden="true"
    ></div>


    <div class="container">

        <div class="projects-cta__layout">


            <!-- ======================================
                 LEFT CONTENT
            ======================================= -->

            <div class="projects-cta__content">

                <h2>
                    Let’s create ripples of change
                    together for a
                    <em>kinder, fairer</em>
                    and
                    <span>greener</span>
                    world.
                </h2>


                <a
                    href="<?php
                    echo esc_url(
                        home_url( '/contact/' )
                    );
                    ?>"
                    class="projects-cta__button"
                >
                    <span>
                        Let’s Connect
                    </span>

                    <span
                        aria-hidden="true"
                        class="projects-cta__button-icon"
                    >
                        ↗
                    </span>
                </a>

            </div>


            <!-- ======================================
                 RIGHT PORTRAIT

                 FINAL IMAGE:
                 assets/images/projects/
                 projects-cta-person.png

                 Transparent PNG preferred.
            ======================================= -->

            <div class="projects-cta__visual">

                <div class="projects-cta__person-placeholder">

                    <span>
                        projects-cta-person.png
                    </span>

                </div>

            </div>

        </div>

    </div>

</section>