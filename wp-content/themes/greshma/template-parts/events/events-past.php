<?php
/**
 * Events Page — Past Events.
 *
 * PNG placeholders:
 *
 * assets/images/events/past-event-01.png
 * assets/images/events/past-event-02.png
 * assets/images/events/past-event-03.png
 * assets/images/events/past-event-04.png
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$past_events = [

    [
        'title'    => 'Interfaith Youth Dialogue',
        'date'     => 'April 20, 2025',
        'location' => 'Bengaluru',
        'type'     => 'Dialogue',
        'image'    => 'past-event-01.png',
    ],

    [
        'title'    => 'Climate Leadership Workshop',
        'date'     => 'March 16, 2025',
        'location' => 'New Delhi',
        'type'     => 'Workshop',
        'image'    => 'past-event-02.png',
    ],

    [
        'title'    => 'Community Peace Walk',
        'date'     => 'February 09, 2025',
        'location' => 'Nandi Hills',
        'type'     => 'Community Walk',
        'image'    => 'past-event-03.png',
    ],

    [
        'title'    => 'Youth Voices for Sustainable Futures',
        'date'     => 'January 25, 2025',
        'location' => 'Online',
        'type'     => 'Webinar',
        'image'    => 'past-event-04.png',
    ],

];
?>

<section class="events-past">

    <div class="container">

        <!-- ==========================================
             SECTION HEADING
        =========================================== -->

        <div class="events-past__heading">

            <div>

                <span class="events-past__eyebrow">
                    Looking Back
                </span>

                <h2>
                    Past Events
                </h2>

            </div>


            <div class="events-past__controls">

                <button
                    type="button"
                    class="events-past__arrow"
                    data-events-past-prev
                    aria-label="Previous past event"
                >
                    ←
                </button>


                <button
                    type="button"
                    class="events-past__arrow"
                    data-events-past-next
                    aria-label="Next past event"
                >
                    →
                </button>

            </div>

        </div>


        <!-- ==========================================
             SLIDER
        =========================================== -->

        <div
            class="events-past__viewport"
            data-events-past-viewport
        >

            <div
                class="events-past__track"
                data-events-past-track
            >

                <?php foreach ( $past_events as $event ) : ?>

                    <article class="events-past-card">

                        <div class="events-past-card__image">

                            <div class="events-past-card__placeholder">

                                <span>
                                    <?php echo esc_html( $event['image'] ); ?>
                                </span>

                            </div>


                            <span class="events-past-card__type">

                                <?php echo esc_html( $event['type'] ); ?>

                            </span>

                        </div>


                        <div class="events-past-card__content">

                            <h3>
                                <?php echo esc_html( $event['title'] ); ?>
                            </h3>


                            <div class="events-past-card__meta">

                                <span>
                                    <?php echo esc_html( $event['date'] ); ?>
                                </span>

                                <span
                                    class="events-past-card__dot"
                                    aria-hidden="true"
                                ></span>

                                <span>
                                    <?php echo esc_html( $event['location'] ); ?>
                                </span>

                            </div>

                        </div>

                    </article>

                <?php endforeach; ?>

            </div>

        </div>

    </div>

</section>