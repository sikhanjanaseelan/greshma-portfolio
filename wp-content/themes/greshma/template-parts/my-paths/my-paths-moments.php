<?php
/**
 * My Paths Page — Key Moments + Education Sidebar.
 *
 * IMAGE ASSETS REQUIRED LATER:
 *
 * assets/images/my-paths/my-paths-moment-01.png
 * assets/images/my-paths/my-paths-moment-02.png
 * assets/images/my-paths/my-paths-moment-03.png
 * assets/images/my-paths/my-paths-moment-04.png
 * assets/images/my-paths/my-paths-moment-05.png
 * assets/images/my-paths/my-paths-moment-06.png
 * assets/images/my-paths/my-paths-moment-07.png
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$moments = [

    [
        'number'      => '01',
        'title'       => 'Early Spark',
        'period'      => 'Around the age of fourteen',
        'description' => 'My journey began when I discovered the power of intercultural, interfaith and environmental work. Curiosity turned into a lifelong commitment to understanding people, nature and our shared world.',
        'icon'        => '♧',
        'image'       => 'my-paths-moment-01.png',
        'side'        => 'left',
    ],

    [
        'number'      => '02',
        'title'       => 'Academic Foundations',
        'period'      => '2016 – 2019',
        'description' => 'Completed my Bachelor’s in English Literature and went on to study International Peace Studies at the University for Peace, Costa Rica — a turning point that broadened my global perspective.',
        'icon'        => '◆',
        'image'       => 'my-paths-moment-02.png',
        'side'        => 'right',
    ],

    [
        'number'      => '03',
        'title'       => 'Starting to Lead',
        'period'      => '2019 – 2020',
        'description' => 'Began facilitating workshops, youth programs and community dialogues on peace, climate action and sustainability, working with people from diverse cultures and communities.',
        'icon'        => '●',
        'image'       => 'my-paths-moment-03.png',
        'side'        => 'left',
    ],

    [
        'number'      => '04',
        'title'       => 'Founding Ecopeace Teen Café',
        'period'      => 'January 2021 – Present',
        'description' => 'Founded a global youth initiative delivering multilingual climate and peace education across Asia, Latin America, Africa and the UK — empowering young people to become compassionate leaders and changemakers.',
        'icon'        => '◎',
        'image'       => 'my-paths-moment-04.png',
        'side'        => 'right',
    ],

    [
        'number'      => '05',
        'title'       => 'Building Global Partnerships',
        'period'      => '2021 – 2023',
        'description' => 'Partnered with international organisations, led global events, mentored youth and created spaces for dialogue, resilience building and climate justice.',
        'icon'        => '∞',
        'image'       => 'my-paths-moment-05.png',
        'side'        => 'left',
    ],

    [
        'number'      => '06',
        'title'       => 'Expanding Leadership',
        'period'      => '2024 – Present',
        'description' => 'Serving as Community & Fellowship Manager at Our Kids’ Climate and as Global Council Trustee at United Religions Initiative, contributing to global governance, strategy and policy for peace.',
        'icon'        => '★',
        'image'       => 'my-paths-moment-06.png',
        'side'        => 'right',
    ],

    [
        'number'      => '07',
        'title'       => 'Continuing the Journey',
        'period'      => 'Today and Beyond',
        'description' => 'I continue to learn, connect and create impact — believing that together, we can build a world where people and the planet thrive in harmony.',
        'icon'        => '♥',
        'image'       => 'my-paths-moment-07.png',
        'side'        => 'left',
    ],

];
?>

<section class="my-paths-moments">

    <div class="container">

        <!-- ==========================================
             SECTION HEADING
        =========================================== -->

        <div class="my-paths-moments__heading">

            <h2>
                Key Moments That Shaped My Journey
            </h2>

            <div
                class="my-paths-moments__heading-decoration"
                aria-hidden="true"
            >
                <span></span>
                <span>❧</span>
                <span></span>
            </div>

        </div>


        <!-- ==========================================
             MAIN LAYOUT
        =========================================== -->

        <div class="my-paths-moments__layout">


            <!-- ======================================
                 LEFT: TIMELINE
            ======================================= -->

            <div class="my-paths-moments__timeline">

                <div
                    class="my-paths-moments__center-line"
                    aria-hidden="true"
                ></div>


                <?php foreach ( $moments as $moment ) : ?>

                    <article
                        class="
                            my-paths-moment
                            my-paths-moment--<?php
                            echo esc_attr( $moment['side'] );
                            ?>
                        "
                    >


                        <!-- LEFT COLUMN -->

                        <div class="my-paths-moment__left">

                            <?php if ( 'left' === $moment['side'] ) : ?>

                                <!--
                                FINAL IMAGE:
                                assets/images/my-paths/<?php
                                echo esc_html( $moment['image'] );
                                ?>
                                -->

                                <div class="my-paths-moment__image">

                                    <span>
                                        <?php
                                        echo esc_html(
                                            $moment['image']
                                        );
                                        ?>
                                    </span>

                                </div>

                            <?php else : ?>

                                <div class="my-paths-moment__content">

                                    <span class="my-paths-moment__number">
                                        <?php
                                        echo esc_html(
                                            $moment['number']
                                        );
                                        ?>
                                    </span>

                                    <h3>
                                        <?php
                                        echo esc_html(
                                            $moment['title']
                                        );
                                        ?>
                                    </h3>

                                    <span class="my-paths-moment__period">
                                        <?php
                                        echo esc_html(
                                            $moment['period']
                                        );
                                        ?>
                                    </span>

                                    <p>
                                        <?php
                                        echo esc_html(
                                            $moment['description']
                                        );
                                        ?>
                                    </p>

                                </div>

                            <?php endif; ?>

                        </div>


                        <!-- CENTER MARKER -->

                        <div class="my-paths-moment__marker">

                            <span>
                                <?php
                                echo esc_html(
                                    $moment['icon']
                                );
                                ?>
                            </span>

                        </div>


                        <!-- RIGHT COLUMN -->

                        <div class="my-paths-moment__right">

                            <?php if ( 'right' === $moment['side'] ) : ?>

                                <!--
                                FINAL IMAGE:
                                assets/images/my-paths/<?php
                                echo esc_html( $moment['image'] );
                                ?>
                                -->

                                <div class="my-paths-moment__image">

                                    <span>
                                        <?php
                                        echo esc_html(
                                            $moment['image']
                                        );
                                        ?>
                                    </span>

                                </div>

                            <?php else : ?>

                                <div class="my-paths-moment__content">

                                    <span class="my-paths-moment__number">
                                        <?php
                                        echo esc_html(
                                            $moment['number']
                                        );
                                        ?>
                                    </span>

                                    <h3>
                                        <?php
                                        echo esc_html(
                                            $moment['title']
                                        );
                                        ?>
                                    </h3>

                                    <span class="my-paths-moment__period">
                                        <?php
                                        echo esc_html(
                                            $moment['period']
                                        );
                                        ?>
                                    </span>

                                    <p>
                                        <?php
                                        echo esc_html(
                                            $moment['description']
                                        );
                                        ?>
                                    </p>

                                </div>

                            <?php endif; ?>

                        </div>

                    </article>

                <?php endforeach; ?>

            </div>


            <!-- ======================================
                 RIGHT SIDEBAR
            ======================================= -->

            <div class="my-paths-moments__sidebar">


                <!-- ==================================
                     QUOTE CARD
                =================================== -->

                <aside class="my-paths-moments__quote">

                    <span
                        class="my-paths-moments__quote-mark"
                        aria-hidden="true"
                    >
                        “
                    </span>

                    <p>
                        Every conversation
                        is a chance to build
                        understanding.
                        Every action is a step
                        towards a better tomorrow.
                    </p>

                    <cite>
                        — Greshma Pious Raju
                    </cite>

                    <span
                        class="my-paths-moments__quote-leaf"
                        aria-hidden="true"
                    >
                        ❧
                    </span>

                </aside>


                <!-- ==================================
                     MY EDUCATION
                =================================== -->

                <aside class="my-paths-education-card">

                    <div class="my-paths-education-card__heading">

                        <span>My Education</span>

                        <span aria-hidden="true">
                            ❧
                        </span>

                    </div>


                    <div class="my-paths-education-card__timeline">


                        <!-- 2020 -->

                        <div class="my-paths-education-card__item">

                            <div class="my-paths-education-card__year">
                                2020
                            </div>

                            <div class="my-paths-education-card__marker">
                                <span></span>
                            </div>

                            <div class="my-paths-education-card__content">

                                <h3>
                                    Master’s in International
                                    Peace Studies
                                </h3>

                                <p>
                                    University for Peace,
                                    Costa Rica
                                </p>

                            </div>

                        </div>


                        <!-- 2019 -->

                        <div class="my-paths-education-card__item">

                            <div class="my-paths-education-card__year">
                                2019
                            </div>

                            <div class="my-paths-education-card__marker">
                                <span></span>
                            </div>

                            <div class="my-paths-education-card__content">

                                <h3>
                                    International Learning
                                    &amp; Global Exposure
                                </h3>

                                <p>
                                    Peacebuilding &amp;
                                    intercultural programs
                                </p>

                            </div>

                        </div>


                        <!-- 2016 -->

                        <div class="my-paths-education-card__item">

                            <div class="my-paths-education-card__year">
                                2016
                            </div>

                            <div class="my-paths-education-card__marker">
                                <span></span>
                            </div>

                            <div class="my-paths-education-card__content">

                                <h3>
                                    Bachelor’s Degree
                                    in English
                                </h3>

                                <p>
                                    India
                                </p>

                            </div>

                        </div>


                    </div>

                </aside>

            </div>

        </div>

    </div>

</section>