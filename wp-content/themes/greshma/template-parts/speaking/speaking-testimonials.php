<?php
/**
 * Speaking Page — What Organizers Say Slider.
 *
 * IMAGE ASSETS REQUIRED LATER:
 *
 * assets/images/speaking/speaking-testimonial-01.png
 * assets/images/speaking/speaking-testimonial-02.png
 * assets/images/speaking/speaking-testimonial-03.png
 * assets/images/speaking/speaking-testimonial-04.png
 * assets/images/speaking/speaking-testimonial-05.png
 * assets/images/speaking/speaking-testimonial-06.png
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;


$testimonials = [

    [
        'quote' => 'Greshma’s session was inspiring, practical, and deeply moving. She has a rare ability to connect hearts and minds.',
        'name'  => 'Dr. Maria Fernandes',
        'role'  => 'Earth Charter International',
        'image' => 'speaking-testimonial-01.png',
    ],

    [
        'quote' => 'Her clarity, compassion, and commitment to action left a lasting impact on our participants. Highly recommended!',
        'name'  => 'Rev. Dr. Samuel Koshy',
        'role'  => 'Interfaith Harmony Network',
        'image' => 'speaking-testimonial-02.png',
    ],

    [
        'quote' => 'A powerful voice for youth and the planet. Her words motivate young people to believe and act.',
        'name'  => 'Anjali Sharma',
        'role'  => 'Youth Climate Leaders India',
        'image' => 'speaking-testimonial-03.png',
    ],

    [
        'quote' => 'Greshma brings extraordinary warmth to difficult conversations and helps people discover common ground with dignity.',
        'name'  => 'Community Partner',
        'role'  => 'Peacebuilding Network',
        'image' => 'speaking-testimonial-04.png',
    ],

    [
        'quote' => 'Her facilitation encouraged our young participants to speak confidently, listen deeply, and transform ideas into action.',
        'name'  => 'Program Director',
        'role'  => 'Youth Leadership Initiative',
        'image' => 'speaking-testimonial-05.png',
    ],

    [
        'quote' => 'She connects global issues with everyday experiences in a way that makes people feel both hopeful and ready to act.',
        'name'  => 'Conference Organizer',
        'role'  => 'Climate Education Forum',
        'image' => 'speaking-testimonial-06.png',
    ],

];
?>

<section class="speaking-testimonials">

    <div class="container">


        <!-- ==========================================
             HEADING
        =========================================== -->

        <div class="speaking-testimonials__heading">

            <h2>
                What Organizers Say
            </h2>

            <span aria-hidden="true">
                ❧
            </span>

        </div>


        <div class="speaking-testimonials__layout">


            <!-- ==========================================
                 TESTIMONIAL SLIDER
            =========================================== -->

            <div
                class="speaking-testimonials__slider"
                data-speaking-slider
            >


                <!-- PREVIOUS -->

                <button
                    type="button"
                    class="
                        speaking-testimonials__arrow
                        speaking-testimonials__arrow--prev
                    "
                    data-speaking-prev
                    aria-label="Previous testimonials"
                >
                    ←
                </button>


                <!-- ======================================
                     SLIDER VIEWPORT
                ======================================= -->

                <div class="speaking-testimonials__viewport">

                    <div
                        class="speaking-testimonials__track"
                        data-speaking-track
                    >

                        <?php foreach ( $testimonials as $index => $testimonial ) : ?>

                            <article
                                class="speaking-testimonial-card"
                                data-speaking-slide
                            >


                                <!-- QUOTE + STARS -->

                                <div class="speaking-testimonial-card__top">

                                    <span
                                        class="speaking-testimonial-card__quote"
                                        aria-hidden="true"
                                    >
                                        “
                                    </span>


                                    <div
                                        class="speaking-testimonial-card__stars"
                                        aria-label="Five star testimonial"
                                    >
                                        ★ ★ ★ ★ ★
                                    </div>

                                </div>


                                <!-- QUOTE -->

                                <p class="speaking-testimonial-card__text">

                                    <?php
                                    echo esc_html(
                                        $testimonial['quote']
                                    );
                                    ?>

                                </p>


                                <!-- AUTHOR -->

                                <div class="speaking-testimonial-card__author">


                                    <!--
                                    FINAL IMAGE:
                                    assets/images/speaking/<?php
                                    echo esc_html(
                                        $testimonial['image']
                                    );
                                    ?>
                                    -->

                                    <div class="speaking-testimonial-card__avatar">

                                        <span>
                                            <?php
                                            echo esc_html(
                                                $testimonial['image']
                                            );
                                            ?>
                                        </span>

                                    </div>


                                    <div>

                                        <strong>
                                            <?php
                                            echo esc_html(
                                                $testimonial['name']
                                            );
                                            ?>
                                        </strong>

                                        <span>
                                            <?php
                                            echo esc_html(
                                                $testimonial['role']
                                            );
                                            ?>
                                        </span>

                                    </div>

                                </div>

                            </article>

                        <?php endforeach; ?>

                    </div>

                </div>


                <!-- NEXT -->

                <button
                    type="button"
                    class="
                        speaking-testimonials__arrow
                        speaking-testimonials__arrow--next
                    "
                    data-speaking-next
                    aria-label="Next testimonials"
                >
                    →
                </button>


                <!-- ======================================
                     DOTS
                ======================================= -->

                <div
                    class="speaking-testimonials__dots"
                    data-speaking-dots
                ></div>

            </div>


            <!-- ==========================================
                 RIGHT — TAILORED TOPICS
            =========================================== -->

            <aside class="speaking-tailored">

                <h3>
                    Topics can be tailored for:
                </h3>


                <ul>

                    <!-- KEYNOTES -->

                    <li>

                        <span class="speaking-tailored__icon">

                            <svg viewBox="0 0 32 32">

                                <path d="M7 12h18v12H7z"/>
                                <path d="M11 8h10v4H11z"/>
                                <path d="M12 24v4M20 24v4"/>

                            </svg>

                        </span>

                        <span>
                            Keynotes &amp; Plenaries
                        </span>

                    </li>


                    <!-- PANELS -->

                    <li>

                        <span class="speaking-tailored__icon">

                            <svg viewBox="0 0 32 32">

                                <circle cx="10" cy="11" r="4"/>
                                <circle cx="22" cy="11" r="4"/>

                                <path d="M4 26v-5c0-4 3-7 6-7"/>
                                <path d="M28 26v-5c0-4-3-7-6-7"/>

                                <path d="M13 20h6"/>

                            </svg>

                        </span>

                        <span>
                            Panels &amp; Discussions
                        </span>

                    </li>


                    <!-- WORKSHOPS -->

                    <li>

                        <span class="speaking-tailored__icon">

                            <svg viewBox="0 0 32 32">

                                <rect
                                    x="5"
                                    y="6"
                                    width="22"
                                    height="17"
                                    rx="2"
                                />

                                <path d="M10 27h12"/>
                                <path d="M16 23v4"/>

                                <path d="M11 12h10"/>
                                <path d="M11 16h7"/>

                            </svg>

                        </span>

                        <span>
                            Workshops &amp; Trainings
                        </span>

                    </li>


                    <!-- RETREATS -->

                    <li>

                        <span class="speaking-tailored__icon">

                            <svg viewBox="0 0 32 32">

                                <path d="M7 8h18v16H7z"/>

                                <path d="M11 5v6"/>
                                <path d="M21 5v6"/>

                                <path d="M11 15h10"/>
                                <path d="M11 19h7"/>

                            </svg>

                        </span>

                        <span>
                            Retreats &amp; Conclaves
                        </span>

                    </li>


                    <!-- WEBINARS -->

                    <li>

                        <span class="speaking-tailored__icon">

                            <svg viewBox="0 0 32 32">

                                <rect
                                    x="4"
                                    y="7"
                                    width="24"
                                    height="16"
                                    rx="2"
                                />

                                <path d="M12 27h8"/>
                                <path d="M16 23v4"/>

                                <circle
                                    cx="16"
                                    cy="15"
                                    r="4"
                                />

                            </svg>

                        </span>

                        <span>
                            Webinars &amp; Virtual Talks
                        </span>

                    </li>

                </ul>


                <span
                    class="speaking-tailored__leaf"
                    aria-hidden="true"
                >
                    ❧
                </span>

            </aside>

        </div>

    </div>

</section>