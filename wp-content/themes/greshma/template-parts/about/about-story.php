<?php
/**
 * About Page — My Story Section.
 *
 * IMAGE ASSETS REQUIRED LATER:
 *
 * assets/images/about/about-story-speaking.png
 * assets/images/about/about-story-connection.png
 * assets/images/about/about-story-youth.png
 * assets/images/about/about-story-nature.png
 *
 * OPTIONAL DOWNLOAD:
 * assets/files/greshma-full-bio.pdf
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="about-story">

    <div class="container">

        <div class="about-story__layout">

            <!-- ==========================================
                 LEFT: STORY CONTENT
            =========================================== -->
            <div class="about-story__content">

                <div class="about-story__eyebrow">

                    <span>My Story</span>

                    <span
                        class="about-story__eyebrow-line"
                        aria-hidden="true"
                    ></span>

                </div>

                <h2 class="about-story__title">
                    A journey of purpose
                    that keeps unfolding
                </h2>

                <p class="about-story__text">
                    My journey began in Kerala, India, where I
                    discovered the power of empathy, community and
                    service. Over the years, that spark took me across
                    continents — learning from diverse cultures,
                    working with young people and communities, and
                    understanding that our challenges are different,
                    yet our hopes are the same.
                </p>

                <!--
                ==========================================
                FULL BIO DOWNLOAD

                FINAL FILE LATER:
                assets/files/greshma-full-bio.pdf

                For now the link can remain "#".
                ==========================================
                -->

                <a
                    href="#"
                    class="about-story__button"
                >
                    <span>Download Full Bio</span>

                    <span
                        class="about-story__button-icon"
                        aria-hidden="true"
                    >
                        ↓
                    </span>
                </a>

            </div>


            <!-- ==========================================
                 RIGHT: PHOTO COLLAGE + QUOTE
            =========================================== -->
            <div class="about-story__media">


                <!-- ======================================
                     FOUR PHOTO COLLAGE
                ======================================= -->
                <div class="about-story__photos">


                    <!--
                    FINAL IMAGE:
                    assets/images/about/about-story-speaking.png

                    Greshma speaking / holding microphone.
                    -->
                    <div class="
                        about-story__photo
                        about-story__photo--1
                    ">
                        <span>
                            about-story-speaking.png
                        </span>
                    </div>


                    <!--
                    FINAL IMAGE:
                    assets/images/about/about-story-connection.png

                    Warm human connection /
                    community interaction photograph.
                    -->
                    <div class="
                        about-story__photo
                        about-story__photo--2
                    ">
                        <span>
                            about-story-connection.png
                        </span>
                    </div>


                    <!--
                    FINAL IMAGE:
                    assets/images/about/about-story-youth.png

                    Greshma working with children /
                    young people / workshop.
                    -->
                    <div class="
                        about-story__photo
                        about-story__photo--3
                    ">
                        <span>
                            about-story-youth.png
                        </span>
                    </div>


                    <!--
                    FINAL IMAGE:
                    assets/images/about/about-story-nature.png

                    Greshma outdoors / nature photograph.
                    -->
                    <div class="
                        about-story__photo
                        about-story__photo--4
                    ">
                        <span>
                            about-story-nature.png
                        </span>
                    </div>

                </div>


                <!-- ======================================
                     QUOTE PANEL
                ======================================= -->
                <blockquote class="about-story__quote">

                    <span
                        class="about-story__quote-mark"
                        aria-hidden="true"
                    >
                        “
                    </span>

                    <p>
                        Every conversation
                        is a chance to build
                        understanding.
                    </p>

                    <p>
                        Every action is
                        a step towards
                        a better tomorrow.
                    </p>

                    <div
                        class="about-story__quote-decoration"
                        aria-hidden="true"
                    >
                        ❧
                    </div>

                </blockquote>

            </div>

        </div>

    </div>

</section>
