<?php
/**
 * Speaking Page — Hero.
 *
 * IMAGE ASSETS REQUIRED LATER:
 *
 * assets/images/speaking/speaking-hero-main.png
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="speaking-hero">

    <div class="container">

        <div class="speaking-hero__layout">


            <!-- ==========================================
                 LEFT CONTENT
            =========================================== -->

            <div class="speaking-hero__content">

                <div class="speaking-hero__eyebrow">

                    <span>
                        Speaking
                    </span>

                    <span
                        class="speaking-hero__leaf"
                        aria-hidden="true"
                    >
                        ❧
                    </span>

                </div>


                <h1 class="speaking-hero__title">

                    <span>
                        Speaking to
                    </span>

                    <em>
                        Inspire Collective
                    </em>

                    <span>
                        Action
                    </span>

                </h1>


                <span
                    class="speaking-hero__divider"
                    aria-hidden="true"
                ></span>


                <p class="speaking-hero__text">
                    I speak and facilitate conversations that move
                    hearts, shift mindsets, and spark purposeful action
                    towards peace, justice, and a sustainable world.
                </p>


                <!-- ======================================
                     BUTTONS
                ======================================= -->

                <div class="speaking-hero__actions">

                    <a
                        href="<?php
                        echo esc_url(
                            home_url( '/contact/' )
                        );
                        ?>"
                        class="
                            speaking-hero__button
                            speaking-hero__button--primary
                        "
                    >
                        <span aria-hidden="true">
                            ◫
                        </span>

                        <span>
                            Invite Me to Speak
                        </span>
                    </a>


                    <a
                        href="#"
                        class="
                            speaking-hero__button
                            speaking-hero__button--secondary
                        "
                    >
                        <span aria-hidden="true">
                            ♙
                        </span>

                        <span>
                            Download Media Kit
                        </span>

                        <span aria-hidden="true">
                            ↓
                        </span>
                    </a>

                </div>

            </div>


            <!-- ==========================================
                 RIGHT VISUAL
            =========================================== -->

            <div class="speaking-hero__visual">


                <!--
                FINAL IMAGE:
                assets/images/speaking/speaking-hero-main.png

                Greshma speaking at podium.
                Prefer PNG / WebP with brush-style edge
                already included in the image.
                -->

                <div class="speaking-hero__image-placeholder">

                    <span>
                        speaking-hero-main.png
                    </span>

                </div>


                <!-- ======================================
                     QUOTE CARD
                ======================================= -->

                <blockquote class="speaking-hero__quote">

                    <span
                        class="speaking-hero__quote-mark"
                        aria-hidden="true"
                    >
                        “
                    </span>

                    <p>
                        Conversations
                        have the power
                        to change
                        communities
                        and the world.
                    </p>

                    <span
                        class="speaking-hero__quote-leaf"
                        aria-hidden="true"
                    >
                        ❧
                    </span>

                </blockquote>

            </div>

        </div>

    </div>

</section>