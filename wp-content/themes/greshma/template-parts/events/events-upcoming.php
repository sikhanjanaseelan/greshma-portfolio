<?php
/**
 * Events Page — Upcoming Events.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$events = [

    [
        'date_day'    => '12',
        'date_month'  => 'JUN',
        'type'        => 'Workshop',
        'title'       => 'Youth Leadership & Peacebuilding Workshop',
        'description' => 'An interactive workshop for young people exploring leadership, dialogue, and practical peacebuilding.',
        'location'    => 'Bengaluru',
        'time'        => '10:00 AM – 1:00 PM',
        'mode'        => 'In Person',
        'image'       => 'event-01.png',
        'category'    => 'workshop',
        'month'       => 'june',
    ],

    [
        'date_day'    => '22',
        'date_month'  => 'JUN',
        'type'        => 'Panel Discussion',
        'title'       => 'Faith, Climate & Community Action',
        'description' => 'A conversation on how faith communities can support climate awareness and meaningful local action.',
        'location'    => 'New Delhi',
        'time'        => '4:00 PM – 6:00 PM',
        'mode'        => 'Hybrid',
        'image'       => 'event-02.png',
        'category'    => 'panel-discussion',
        'month'       => 'june',
    ],

    [
        'date_day'    => '05',
        'date_month'  => 'JUL',
        'type'        => 'Webinar',
        'title'       => 'Young Voices for Climate Justice',
        'description' => 'A virtual gathering featuring young changemakers sharing ideas, experiences, and climate solutions.',
        'location'    => 'Online',
        'time'        => '6:30 PM – 8:00 PM',
        'mode'        => 'Online',
        'image'       => 'event-03.png',
        'category'    => 'webinar',
        'month'       => 'july',
    ],

    [
        'date_day'    => '18',
        'date_month'  => 'JUL',
        'type'        => 'Community Walk',
        'title'       => 'Walk for Peace & Planet',
        'description' => 'A community walk bringing people together around peace, sustainability, and collective responsibility.',
        'location'    => 'Nandi Hills',
        'time'        => '7:00 AM – 10:00 AM',
        'mode'        => 'In Person',
        'image'       => 'event-04.png',
        'category'    => 'community-walk',
        'month'       => 'july',
    ],

    [
        'date_day'    => '03',
        'date_month'  => 'AUG',
        'type'        => 'Conference',
        'title'       => 'Youth, Peace & Sustainable Futures',
        'description' => 'A collaborative gathering exploring youth leadership, interfaith dialogue, and pathways toward sustainable futures.',
        'location'    => 'Bengaluru',
        'time'        => '9:30 AM – 4:30 PM',
        'mode'        => 'In Person',
        'image'       => 'event-05.png',
        'category'    => 'conference',
        'month'       => 'august',
    ],

];
?>

<section class="events-upcoming">

    <div class="container">

        <div class="events-upcoming__layout">


            <!-- ==========================================
                 LEFT — EVENTS
            =========================================== -->

            <div class="events-upcoming__main">

                <div class="events-upcoming__heading">

                    <div>

                        <span class="events-upcoming__eyebrow">
                            What’s Coming Up
                        </span>

                        <h2>
                            Upcoming Events
                        </h2>

                    </div>


                    <span class="events-upcoming__count">
                        <?php echo esc_html( count( $events ) ); ?>
                        Events
                    </span>

                </div>


                <div
                    class="events-upcoming__list"
                    data-events-list
                >

                    <?php foreach ( $events as $event ) : ?>

                        <article
                            class="event-card"
                            data-event-item
                            data-event-type="<?php echo esc_attr( $event['category'] ); ?>"
                            data-event-location="<?php echo esc_attr( sanitize_title( $event['location'] ) ); ?>"
                            data-event-month="<?php echo esc_attr( $event['month'] ); ?>"
                        >

                            <!-- IMAGE -->

                            <div class="event-card__image">

                                <div class="event-card__image-placeholder">

                                    <span>
                                        <?php echo esc_html( $event['image'] ); ?>
                                    </span>

                                </div>


                                <div class="event-card__date">

                                    <strong>
                                        <?php echo esc_html( $event['date_day'] ); ?>
                                    </strong>

                                    <span>
                                        <?php echo esc_html( $event['date_month'] ); ?>
                                    </span>

                                </div>

                            </div>


                            <!-- CONTENT -->

                            <div class="event-card__content">

                                <span class="event-card__type">
                                    <?php echo esc_html( $event['type'] ); ?>
                                </span>


                                <h3>
                                    <?php echo esc_html( $event['title'] ); ?>
                                </h3>


                                <p>
                                    <?php echo esc_html( $event['description'] ); ?>
                                </p>


                                <div class="event-card__details">

                                    <span>
                                        <svg viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="M12 21s6-5.2 6-11a6 6 0 1 0-12 0c0 5.8 6 11 6 11Z"/>
                                            <circle cx="12" cy="10" r="2"/>
                                        </svg>

                                        <?php echo esc_html( $event['location'] ); ?>
                                    </span>


                                    <span>
                                        <svg viewBox="0 0 24 24" aria-hidden="true">
                                            <circle cx="12" cy="12" r="8"/>
                                            <path d="M12 7v5l3 2"/>
                                        </svg>

                                        <?php echo esc_html( $event['time'] ); ?>
                                    </span>


                                    <span>
                                        <svg viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="M4 6h16v12H4Z"/>
                                            <path d="M8 3v6"/>
                                            <path d="M16 3v6"/>
                                        </svg>

                                        <?php echo esc_html( $event['mode'] ); ?>
                                    </span>

                                </div>


                                <div class="event-card__actions">

                                    <a
                                        href="#"
                                        class="event-card__button event-card__button--primary"
                                    >
                                        Register

                                        <span aria-hidden="true">
                                            →
                                        </span>
                                    </a>


                                    <a
                                        href="#"
                                        class="event-card__button event-card__button--secondary"
                                    >
                                        Add to Calendar
                                    </a>

                                </div>

                            </div>

                        </article>

                    <?php endforeach; ?>

                </div>

            </div>


            <!-- ==========================================
                 RIGHT — SIDEBAR
            =========================================== -->

            <aside class="events-upcoming__sidebar">

                <?php
                get_template_part(
                    'template-parts/events/events-sidebar'
                );
                ?>

            </aside>

        </div>

    </div>

</section>