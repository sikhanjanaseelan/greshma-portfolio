<?php
/**
 * My Paths Page — Bottom CTA.
 *
 * IMAGE ASSET REQUIRED LATER:
 *
 * assets/images/my-paths/my-paths-cta-bg.png
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="my-paths-cta">

    <!-- ==========================================
         BACKGROUND IMAGE PLACEHOLDER

         FINAL IMAGE:
         assets/images/my-paths/my-paths-cta-bg.png

         Wide mountain / valley landscape.
    =========================================== -->

    <div class="my-paths-cta__background">

        <div class="my-paths-cta__background-placeholder">
            <span>
                my-paths-cta-bg.png
            </span>
        </div>

    </div>


    <div
        class="my-paths-cta__overlay"
        aria-hidden="true"
    ></div>


    <div class="container">

        <div class="my-paths-cta__layout">


            <!-- ======================================
                 LEFT MESSAGE
            ======================================= -->

            <div class="my-paths-cta__content">

                <h2>
                    This is not just my journey.<br>
                    It’s a journey we walk together.
                </h2>

                <p>
                    Let’s continue creating ripples
                    of change that last.
                </p>


                <a
                    href="<?php echo esc_url(
                        home_url( '/contact/' )
                    ); ?>"
                    class="my-paths-cta__button"
                >
                    <span>
                        Let’s Connect
                    </span>

                    <span
                        class="my-paths-cta__button-icon"
                        aria-hidden="true"
                    >
                        ↗
                    </span>
                </a>

            </div>


            <!-- ======================================
                 SOCIAL LINKS
            ======================================= -->

            <div class="my-paths-cta__socials">

                <a
                    href="#"
                    aria-label="Instagram"
                >
                    <?php
                    get_template_part(
                        'template-parts/icons/instagram'
                    );
                    ?>
                </a>


                <a
                    href="#"
                    aria-label="LinkedIn"
                >
                    <?php
                    get_template_part(
                        'template-parts/icons/linkedin'
                    );
                    ?>
                </a>


                <a
                    href="#"
                    aria-label="YouTube"
                >
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

        </div>

    </div>

</section>