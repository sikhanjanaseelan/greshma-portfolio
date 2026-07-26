<?php
/**
 * Speaking Page — Upcoming Talks & Past Speaking Engagements.
 *
 * IMAGE ASSETS REQUIRED LATER:
 *
 * assets/images/speaking/speaking-events-map.png
 *
 * assets/images/speaking/speaking-engagement-01.png
 * assets/images/speaking/speaking-engagement-02.png
 * assets/images/speaking/speaking-engagement-03.png
 * assets/images/speaking/speaking-engagement-04.png
 * assets/images/speaking/speaking-engagement-05.png
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;


$upcoming_events = [

    [
        'day'         => '15',
        'month'       => 'JUN',
        'year'        => '2025',
        'title'       => 'Youth Climate Leadership Summit',
        'location'    => 'New Delhi, India',
        'description' => 'Speaking on youth-led climate solutions for a sustainable future.',
    ],

    [
        'day'         => '08',
        'month'       => 'JUL',
        'year'        => '2025',
        'title'       => 'Interfaith Dialogue Forum',
        'location'    => 'Lisbon, Portugal',
        'description' => 'Panel discussion on building bridges across faiths and cultures.',
    ],

    [
        'day'         => '21',
        'month'       => 'AUG',
        'year'        => '2025',
        'title'       => 'Global Peace Educators Conference',
        'location'    => 'Nairobi, Kenya',
        'description' => 'Keynote on peace education and community transformation.',
    ],

];


$past_engagements = [

    [
        'title'    => 'URI Global Conference',
        'meta'     => 'Lisbon, Portugal · May 2024',
        'image'    => 'speaking-engagement-01.png',
    ],

    [
        'title'    => 'Earth Charter International Youth Forum',
        'meta'     => 'Costa Rica · Nov 2023',
        'image'    => 'speaking-engagement-02.png',
    ],

    [
        'title'    => 'Our Kids Climate Podcast (Guest Speaker)',
        'meta'     => 'Online · Oct 2023',
        'image'    => 'speaking-engagement-03.png',
    ],

    [
        'title'    => 'National Youth Leaders Meet',
        'meta'     => 'Bengaluru, India · Aug 2023',
        'image'    => 'speaking-engagement-04.png',
    ],

    [
        'title'    => 'Women & Peace Dialogue Roundtable',
        'meta'     => 'Kerala, India · Jul 2023',
        'image'    => 'speaking-engagement-05.png',
    ],

];
?>

<section class="speaking-events">

    <div class="container">

        <div class="speaking-events__layout">


            <!-- ==================================================
                 1. UPCOMING TALKS & EVENTS
            =================================================== -->

            <div class="speaking-upcoming">


                <!-- GREEN HEADER -->

                <div class="speaking-events__panel-header">

                    <h2>
                        Upcoming Talks &amp; Events
                    </h2>

                    <a href="#">
                        View All Events
                        <span aria-hidden="true">→</span>
                    </a>

                </div>


                <!-- EVENT LIST -->

                <div class="speaking-upcoming__list">

                    <?php foreach ( $upcoming_events as $event ) : ?>

                        <article class="speaking-upcoming__event">


                            <!-- DATE -->

                            <div class="speaking-upcoming__date">

                                <span class="speaking-upcoming__month">
                                    <?php echo esc_html( $event['month'] ); ?>
                                </span>

                                <strong>
                                    <?php echo esc_html( $event['day'] ); ?>
                                </strong>

                                <span class="speaking-upcoming__year">
                                    <?php echo esc_html( $event['year'] ); ?>
                                </span>

                            </div>


                            <!-- CONTENT -->

                            <div class="speaking-upcoming__content">

                                <h3>
                                    <?php echo esc_html( $event['title'] ); ?>
                                </h3>

                                <span class="speaking-upcoming__location">
                                    <?php echo esc_html( $event['location'] ); ?>
                                </span>

                                <p>
                                    <?php echo esc_html( $event['description'] ); ?>
                                </p>

                            </div>


                            <!-- CALENDAR SVG -->

                            <div
                                class="speaking-upcoming__calendar"
                                aria-hidden="true"
                            >

                                <svg viewBox="0 0 32 32">

                                    <rect
                                        x="4"
                                        y="7"
                                        width="24"
                                        height="21"
                                        rx="2"
                                    />

                                    <path d="M9 4V10" />
                                    <path d="M23 4V10" />
                                    <path d="M4 13H28" />

                                    <circle cx="10" cy="18" r="1" />
                                    <circle cx="16" cy="18" r="1" />
                                    <circle cx="22" cy="18" r="1" />

                                    <circle cx="10" cy="23" r="1" />
                                    <circle cx="16" cy="23" r="1" />

                                </svg>

                            </div>

                        </article>

                    <?php endforeach; ?>

                </div>


                <!-- BOTTOM LINK -->

                <a
                    href="#"
                    class="speaking-upcoming__footer-link"
                >
                    Explore all upcoming events

                    <span aria-hidden="true">
                        →
                    </span>
                </a>

            </div>


            <!-- ==================================================
                 2. PAST SPEAKING ENGAGEMENTS / MAP
            =================================================== -->

            <div class="speaking-past-map">


                <!-- GREEN HEADER -->

                <div class="speaking-events__panel-header">

                    <h2>
                        Past Speaking Engagements
                    </h2>

                    <a href="#">
                        View All
                        <span aria-hidden="true">→</span>
                    </a>

                </div>


                <!-- MAP -->

                <div class="speaking-past-map__visual">


                    <!--
                    FINAL IMAGE:
                    assets/images/speaking/speaking-events-map.png

                    Pale grey/green world map.
                    Transparent background preferred.
                    -->

                    <div class="speaking-past-map__placeholder">

                        <span>
                            speaking-events-map.png
                        </span>

                    </div>


                    <!-- MAP ROUTE -->

                    <svg
                        class="speaking-past-map__route"
                        viewBox="0 0 600 300"
                        preserveAspectRatio="none"
                        aria-hidden="true"
                    >
                        <path
                            d="
                                M110 170
                                C170 100 235 90 285 115
                                C340 143 375 112 435 140
                                C485 163 500 205 530 230
                            "
                        />
                    </svg>


                    <!-- PINS -->

                    <span class="speaking-past-map__pin speaking-past-map__pin--one"></span>
                    <span class="speaking-past-map__pin speaking-past-map__pin--two"></span>
                    <span class="speaking-past-map__pin speaking-past-map__pin--three"></span>
                    <span class="speaking-past-map__pin speaking-past-map__pin--four"></span>

                </div>


                <!-- STATS -->

                <div class="speaking-past-map__stats">

                    <div class="speaking-past-map__stat">

                        <strong>
                            50+
                        </strong>

                        <span>
                            Speaking<br>
                            Engagements
                        </span>

                    </div>


                    <div class="speaking-past-map__stat">

                        <strong>
                            20+
                        </strong>

                        <span>
                            Countries<br>
                            Reached
                        </span>

                    </div>


                    <div class="speaking-past-map__stat">

                        <strong>
                            15K+
                        </strong>

                        <span>
                            People<br>
                            Inspired
                        </span>

                    </div>


                    <div class="speaking-past-map__stat">

                        <strong>
                            10+
                        </strong>

                        <span>
                            Years of<br>
                            Experience
                        </span>

                    </div>

                </div>

            </div>


            <!-- ==================================================
                 3. PAST ENGAGEMENT LIST
            =================================================== -->

            <aside class="speaking-engagement-list">

                <?php foreach ( $past_engagements as $engagement ) : ?>

                    <article class="speaking-engagement-list__item">


                        <!--
                        FINAL IMAGE:
                        assets/images/speaking/<?php
                        echo esc_html( $engagement['image'] );
                        ?>
                        -->

                        <div class="speaking-engagement-list__image">

                            <span>
                                <?php
                                echo esc_html(
                                    $engagement['image']
                                );
                                ?>
                            </span>

                        </div>


                        <div class="speaking-engagement-list__content">

                            <h3>
                                <?php
                                echo esc_html(
                                    $engagement['title']
                                );
                                ?>
                            </h3>

                            <p>
                                <?php
                                echo esc_html(
                                    $engagement['meta']
                                );
                                ?>
                            </p>

                        </div>

                    </article>

                <?php endforeach; ?>

            </aside>


        </div>

    </div>

</section>