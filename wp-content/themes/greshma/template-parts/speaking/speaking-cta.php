<?php
/**
 * Speaking Page — Final CTA.
 *
 * IMAGE ASSET REQUIRED LATER:
 *
 * assets/images/speaking/speaking-cta-bg.png
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="speaking-cta">

    <!--
    FINAL IMAGE:
    assets/images/speaking/speaking-cta-bg.png

    Notebook / coffee / warm desk photograph.
    -->

    <div class="speaking-cta__background">

        <span>
            speaking-cta-bg.png
        </span>

    </div>


    <div class="speaking-cta__overlay"></div>


    <span
        class="speaking-cta__leaf"
        aria-hidden="true"
    >
        ❧
    </span>


    <div class="container">

        <div class="speaking-cta__content">

            <div class="speaking-cta__heading">

                <h2>
                    Let’s Create Impact Together
                </h2>

                <span aria-hidden="true">
                    ❧
                </span>

            </div>


            <p>
                Looking for a speaker who brings insight,
                empathy, and action to every conversation?
            </p>


            <a
                href="<?php
                echo esc_url(
                    home_url( '/contact/' )
                );
                ?>"
            >
                Invite Greshma to Speak

                <span aria-hidden="true">
                    →
                </span>
            </a>

        </div>

    </div>

</section>