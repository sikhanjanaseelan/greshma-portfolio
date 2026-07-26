<?php
/**
 * Events Page — Hero.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$hero_image =
    get_template_directory_uri()
    . '/assets/images/events/events-hero.png';
?>

<section class="events-hero">

    <div class="events-hero__layout">

        <!-- LEFT CONTENT -->
        <div class="events-hero__content">

            <div class="events-hero__inner">

                <span class="events-hero__eyebrow">
                    EVENTS
                    <span aria-hidden="true">⌁</span>
                </span>

                <h1 class="events-hero__title">
                    Gather. Learn.<br>
                    Connect.
                    <em>Create Impact.</em>
                </h1>

                <span
                    class="events-hero__line"
                    aria-hidden="true"
                ></span>

                <p class="events-hero__description">
                    Join me in conversations, workshops and
                    gatherings that inspire action, build community
                    and create a more peaceful, just and sustainable
                    world.
                </p>

                <!-- HERO VALUES -->
                <div class="events-hero__values">

                    <div class="events-hero__value">

                        <span class="events-hero__value-icon">
                            <svg viewBox="0 0 48 48" aria-hidden="true">
                                <circle cx="17" cy="17" r="5"/>
                                <circle cx="31" cy="17" r="5"/>
                                <circle cx="24" cy="29" r="5"/>
                                <path d="M8 39c1-7 5-11 9-11"/>
                                <path d="M40 39c-1-7-5-11-9-11"/>
                                <path d="M15 41c1-7 4-10 9-10s8 3 9 10"/>
                            </svg>
                        </span>

                        <span>
                            <strong>Meaningful</strong>
                            Connections
                        </span>

                    </div>


                    <div class="events-hero__value">

                        <span class="events-hero__value-icon">
                            <svg viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M36 7C22 9 13 17 11 31"/>
                                <path d="M36 7c0 14-7 24-20 27"/>
                                <path d="M13 37c6-11 12-18 23-30"/>
                            </svg>
                        </span>

                        <span>
                            <strong>Practical</strong>
                            Learning
                        </span>

                    </div>


                    <div class="events-hero__value">

                        <span class="events-hero__value-icon">
                            <svg viewBox="0 0 48 48" aria-hidden="true">
                                <circle cx="24" cy="24" r="17"/>
                                <path d="M7 24h34"/>
                                <path d="M24 7c6 5 9 11 9 17s-3 12-9 17"/>
                                <path d="M24 7c-6 5-9 11-9 17s3 12 9 17"/>
                            </svg>
                        </span>

                        <span>
                            <strong>Real World</strong>
                            Impact
                        </span>

                    </div>

                </div>

            </div>

        </div>


        <!-- RIGHT IMAGE -->
        <div class="events-hero__visual">

            <img
                src="<?php echo esc_url( $hero_image ); ?>"
                alt="Greshma preparing for a community event"
            >

            <!-- QUOTE -->
            <div class="events-hero__quote">

                <span class="events-hero__quote-mark">
                    “
                </span>

                <blockquote>
                    Events bring<br>
                    people together.<br>
                    Together, we<br>
                    build a better<br>
                    tomorrow.
                </blockquote>

                <span
                    class="events-hero__quote-leaf"
                    aria-hidden="true"
                >
                    ❧
                </span>

            </div>

        </div>

    </div>

</section>