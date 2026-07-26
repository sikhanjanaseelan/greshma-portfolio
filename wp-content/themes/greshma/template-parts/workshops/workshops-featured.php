<?php
/**
 * Workshops Page — Featured Workshops.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$featured_workshops = [

    [
        'image'       => 'workshop-01.png',
        'category'    => 'Peacebuilding',
        'title'       => 'Building Bridges: Dialogue for Peace',
        'description' => 'An experiential workshop that helps participants understand conflict, practise meaningful dialogue, and build bridges across differences.',
        'duration'    => '3–4 Hours',
        'format'      => 'In Person / Online',
        'audience'    => 'Youth, Educators & Communities',
    ],

    [
        'image'       => 'workshop-02.png',
        'category'    => 'Climate Action',
        'title'       => 'Climate Action Starts With Us',
        'description' => 'A practical and reflective workshop connecting everyday choices, community responsibility, climate justice, and meaningful action.',
        'duration'    => '2–3 Hours',
        'format'      => 'In Person / Online',
        'audience'    => 'Youth, Schools & Organizations',
    ],

    [
        'image'       => 'workshop-03.png',
        'category'    => 'Interfaith Dialogue',
        'title'       => 'Faith, Values & Our Shared Humanity',
        'description' => 'A facilitated space to explore identity, values, diversity and the role of interfaith understanding in building peaceful communities.',
        'duration'    => '3 Hours',
        'format'      => 'In Person / Hybrid',
        'audience'    => 'Youth & Faith Communities',
    ],

    [
        'image'       => 'workshop-04.png',
        'category'    => 'Youth Leadership',
        'title'       => 'Lead With Purpose',
        'description' => 'An interactive leadership experience helping young people discover their strengths, values and capacity to create positive change.',
        'duration'    => '3–4 Hours',
        'format'      => 'In Person / Online',
        'audience'    => 'Students & Young Leaders',
    ],

];
?>

<section
    class="workshops-featured"
    id="featured-workshops"
>

    <div class="container">

        <!-- ==========================================
             SECTION HEADING
        =========================================== -->

        <div class="workshops-featured__heading">

            <div>

                <span class="workshops-featured__eyebrow">
                    Explore &amp; Engage
                </span>

                <h2>
                    Featured Workshops
                </h2>

            </div>

            <p>
                Designed to inspire reflection, strengthen
                relationships and turn learning into meaningful action.
            </p>

        </div>


        <!-- ==========================================
             MAIN LAYOUT
        =========================================== -->

        <div class="workshops-featured__layout">


            <!-- ======================================
                 LEFT — WORKSHOP CARDS
            ======================================= -->

            <div class="workshops-featured__list">

                <?php foreach ( $featured_workshops as $workshop ) : ?>

                    <article class="featured-workshop-card">


                        <!-- IMAGE -->

                        <div class="featured-workshop-card__image">

                            <div class="featured-workshop-card__placeholder">

                                <span>
                                    <?php
                                    echo esc_html(
                                        $workshop['image']
                                    );
                                    ?>
                                </span>

                            </div>


                            <span class="featured-workshop-card__category">

                                <?php
                                echo esc_html(
                                    $workshop['category']
                                );
                                ?>

                            </span>

                        </div>


                        <!-- CONTENT -->

                        <div class="featured-workshop-card__content">

                            <h3>
                                <?php
                                echo esc_html(
                                    $workshop['title']
                                );
                                ?>
                            </h3>


                            <p>
                                <?php
                                echo esc_html(
                                    $workshop['description']
                                );
                                ?>
                            </p>


                            <!-- META -->

                            <div class="featured-workshop-card__meta">


                                <!-- DURATION -->

                                <span>

                                    <svg
                                        viewBox="0 0 24 24"
                                        aria-hidden="true"
                                    >
                                        <circle
                                            cx="12"
                                            cy="12"
                                            r="8"
                                        />

                                        <path d="M12 7v5l3 2"/>
                                    </svg>

                                    <?php
                                    echo esc_html(
                                        $workshop['duration']
                                    );
                                    ?>

                                </span>


                                <!-- FORMAT -->

                                <span>

                                    <svg
                                        viewBox="0 0 24 24"
                                        aria-hidden="true"
                                    >
                                        <rect
                                            x="4"
                                            y="5"
                                            width="16"
                                            height="13"
                                            rx="2"
                                        />

                                        <path d="M8 21h8"/>
                                        <path d="M12 18v3"/>
                                    </svg>

                                    <?php
                                    echo esc_html(
                                        $workshop['format']
                                    );
                                    ?>

                                </span>

                            </div>


                            <!-- AUDIENCE -->

                            <div class="featured-workshop-card__audience">

                                <svg
                                    viewBox="0 0 24 24"
                                    aria-hidden="true"
                                >
                                    <circle
                                        cx="9"
                                        cy="8"
                                        r="3"
                                    />

                                    <circle
                                        cx="17"
                                        cy="9"
                                        r="2"
                                    />

                                    <path d="M3 20c0-5 2-8 6-8s6 3 6 8"/>

                                    <path d="M14 14c4 0 6 2 6 6"/>
                                </svg>


                                <span>

                                    <?php
                                    echo esc_html(
                                        $workshop['audience']
                                    );
                                    ?>

                                </span>

                            </div>


                            <!-- ACTION -->

                            <a
                                href="#workshops-contact"
                                class="featured-workshop-card__link"
                            >
                                Learn More

                                <span aria-hidden="true">
                                    →
                                </span>
                            </a>

                        </div>

                    </article>

                <?php endforeach; ?>

            </div>


            <!-- ======================================
                 RIGHT SIDEBAR
            ======================================= -->

            <aside class="workshops-featured__sidebar">


                <!-- WHY THESE WORKSHOPS -->

                <div class="workshops-info-card workshops-info-card--why">

                    <span class="workshops-info-card__eyebrow">
                        The Approach
                    </span>


                    <h3>
                        Why These Workshops?
                    </h3>


                    <p>
                        Learning becomes meaningful when people
                        feel heard, included and empowered to act.
                    </p>


                    <ul class="workshops-info-card__list">

                        <li>

                            <span class="workshops-info-card__check">
                                ✓
                            </span>

                            <div>

                                <strong>
                                    Experiential
                                </strong>

                                <span>
                                    Learning through reflection,
                                    dialogue and participation.
                                </span>

                            </div>

                        </li>


                        <li>

                            <span class="workshops-info-card__check">
                                ✓
                            </span>

                            <div>

                                <strong>
                                    Contextual
                                </strong>

                                <span>
                                    Adapted to the realities and
                                    needs of each group.
                                </span>

                            </div>

                        </li>


                        <li>

                            <span class="workshops-info-card__check">
                                ✓
                            </span>

                            <div>

                                <strong>
                                    Inclusive
                                </strong>

                                <span>
                                    Creating safe spaces where
                                    diverse voices can participate.
                                </span>

                            </div>

                        </li>


                        <li>

                            <span class="workshops-info-card__check">
                                ✓
                            </span>

                            <div>

                                <strong>
                                    Action-oriented
                                </strong>

                                <span>
                                    Moving from ideas and awareness
                                    toward practical action.
                                </span>

                            </div>

                        </li>

                    </ul>

                </div>


                <!-- FORMATS -->

                <div class="workshops-info-card workshops-info-card--formats">

                    <div class="workshops-info-card__title-row">

                        <h3>
                            Formats We Offer
                        </h3>

                        <span aria-hidden="true">
                            ❧
                        </span>

                    </div>


                    <div class="workshops-formats">


                        <div class="workshops-format">

                            <span class="workshops-format__icon">

                                <svg
                                    viewBox="0 0 24 24"
                                    aria-hidden="true"
                                >
                                    <rect
                                        x="4"
                                        y="5"
                                        width="16"
                                        height="13"
                                        rx="2"
                                    />

                                    <path d="M8 21h8"/>
                                    <path d="M12 18v3"/>
                                </svg>

                            </span>


                            <div>

                                <strong>
                                    Online
                                </strong>

                                <span>
                                    Interactive virtual sessions
                                </span>

                            </div>

                        </div>


                        <div class="workshops-format">

                            <span class="workshops-format__icon">

                                <svg
                                    viewBox="0 0 24 24"
                                    aria-hidden="true"
                                >
                                    <path d="M4 20V8l8-5 8 5v12"/>

                                    <path d="M9 20v-6h6v6"/>
                                </svg>

                            </span>


                            <div>

                                <strong>
                                    In Person
                                </strong>

                                <span>
                                    On-site immersive workshops
                                </span>

                            </div>

                        </div>


                        <div class="workshops-format">

                            <span class="workshops-format__icon">

                                <svg
                                    viewBox="0 0 24 24"
                                    aria-hidden="true"
                                >
                                    <circle
                                        cx="8"
                                        cy="8"
                                        r="3"
                                    />

                                    <circle
                                        cx="17"
                                        cy="9"
                                        r="2"
                                    />

                                    <path d="M2 20c0-5 2-8 6-8s6 3 6 8"/>

                                    <path d="M14 14c4 0 6 2 6 6"/>
                                </svg>

                            </span>


                            <div>

                                <strong>
                                    Small Groups
                                </strong>

                                <span>
                                    Intimate facilitated learning
                                </span>

                            </div>

                        </div>


                        <div class="workshops-format">

                            <span class="workshops-format__icon">

                                <svg
                                    viewBox="0 0 24 24"
                                    aria-hidden="true"
                                >
                                    <path d="M4 19h16"/>

                                    <path d="M6 16V8h12v8"/>

                                    <path d="M9 8V5h6v3"/>
                                </svg>

                            </span>


                            <div>

                                <strong>
                                    Organizations
                                </strong>

                                <span>
                                    Customized team programmes
                                </span>

                            </div>

                        </div>

                    </div>


                    <a
                        href="#workshops-contact"
                        class="workshops-info-card__button"
                    >
                        Request a Custom Workshop

                        <span aria-hidden="true">
                            →
                        </span>
                    </a>

                </div>

            </aside>

        </div>

    </div>

</section>