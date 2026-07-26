<?php
/**
 * Services Page — Kind Words Slider.
 *
 * IMAGE ASSETS REQUIRED LATER:
 *
 * assets/images/services/services-kind-words-01.png
 * assets/images/services/services-kind-words-02.png
 * assets/images/services/services-kind-words-03.png
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$testimonials = [

    [
        'quote' => 'Greshma creates spaces where people genuinely feel heard, respected and inspired to participate. Her facilitation brings warmth, clarity and purpose to every conversation.',
        'name'  => 'Community Partner',
        'role'  => 'Peacebuilding & Youth Leadership',
        'image' => 'services-kind-words-01.png',
    ],

    [
        'quote' => 'Working with Greshma helped our team move from ideas to meaningful action. She brings empathy, structure and a deep understanding of community engagement.',
        'name'  => 'Program Collaborator',
        'role'  => 'Climate Education & Sustainability',
        'image' => 'services-kind-words-02.png',
    ],

    [
        'quote' => 'Her ability to connect with young people is remarkable. Participants felt confident, supported and encouraged to take ownership of their leadership journey.',
        'name'  => 'Youth Program Partner',
        'role'  => 'Leadership & Mentorship',
        'image' => 'services-kind-words-03.png',
    ],

];
?>

<section class="services-kind-words">

    <div class="container">

        <div
            class="services-kind-words__slider"
            data-services-testimonials
        >

            <div class="services-kind-words__heading">

                <span
                    class="services-kind-words__line"
                    aria-hidden="true"
                ></span>

                <h2>
                    Kind Words
                </h2>

                <span
                    class="services-kind-words__leaf"
                    aria-hidden="true"
                >
                    ❧
                </span>

            </div>


            <div class="services-kind-words__slides">

                <?php foreach ( $testimonials as $index => $testimonial ) : ?>

                    <article
                        class="services-kind-words__slide<?php echo 0 === $index ? ' is-active' : ''; ?>"
                        data-testimonial-slide
                    >

                        <div class="services-kind-words__content">

                            <blockquote class="services-kind-words__quote">

                                <span
                                    class="services-kind-words__quote-mark"
                                    aria-hidden="true"
                                >
                                    “
                                </span>

                                <p>
                                    <?php
                                    echo esc_html(
                                        $testimonial['quote']
                                    );
                                    ?>
                                </p>

                                <footer class="services-kind-words__author">

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

                                </footer>

                            </blockquote>

                        </div>


                        <!--
                        FINAL IMAGE:
                        assets/images/services/<?php
                        echo esc_html(
                            $testimonial['image']
                        );
                        ?>
                        -->

                        <div class="services-kind-words__visual">

                            <div class="services-kind-words__image-placeholder">

                                <span>
                                    <?php
                                    echo esc_html(
                                        $testimonial['image']
                                    );
                                    ?>
                                </span>

                            </div>

                        </div>

                    </article>

                <?php endforeach; ?>

            </div>


            <!-- ==========================================
                 CONTROLS
            =========================================== -->

            <div class="services-kind-words__controls">

                <button
                    type="button"
                    class="services-kind-words__arrow"
                    data-testimonial-prev
                    aria-label="Previous testimonial"
                >
                    ←
                </button>


                <div class="services-kind-words__dots">

                    <?php foreach ( $testimonials as $index => $testimonial ) : ?>

                        <button
                            type="button"
                            class="services-kind-words__dot<?php echo 0 === $index ? ' is-active' : ''; ?>"
                            data-testimonial-dot="<?php echo esc_attr( $index ); ?>"
                            aria-label="<?php echo esc_attr( 'Show testimonial ' . ( $index + 1 ) ); ?>"
                        ></button>

                    <?php endforeach; ?>

                </div>


                <button
                    type="button"
                    class="services-kind-words__arrow"
                    data-testimonial-next
                    aria-label="Next testimonial"
                >
                    →
                </button>

            </div>

        </div>

    </div>

</section>