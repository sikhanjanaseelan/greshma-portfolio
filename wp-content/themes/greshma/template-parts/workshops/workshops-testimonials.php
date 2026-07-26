<?php
/**
 * Workshops Page — Testimonials.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$testimonials = [

    [
        'quote' => 'Greshma’s workshop opened our eyes to the power of dialogue and collective action. It was practical, inspiring and heartfelt.',
        'name'  => 'Ayesha Khan',
        'role'  => 'Youth Leader, India',
        'image' => 'testimonial-01.png',
    ],

    [
        'quote' => 'The session was engaging and thought-provoking. Our students left with new perspectives and a sense of responsibility.',
        'name'  => 'Daniel Fernandes',
        'role'  => 'Teacher, Portugal',
        'image' => 'testimonial-02.png',
    ],

    [
        'quote' => 'A beautiful blend of learning, reflection and action. Highly recommended for any organization working for change.',
        'name'  => 'Maria Lopez',
        'role'  => 'Program Coordinator, Spain',
        'image' => 'testimonial-03.png',
    ],

];
?>

<section class="workshops-testimonials">

    <div class="container">

        <div class="workshops-testimonials__heading">

            <div class="workshops-testimonials__title-wrap">

                <h2>
                    What Participants Say
                </h2>

                <span aria-hidden="true">
                    ❧
                </span>

            </div>


            <div class="workshops-testimonials__controls">

                <button
                    type="button"
                    class="workshops-testimonials__arrow"
                    data-workshop-testimonial-prev
                    aria-label="Previous testimonial"
                >
                    ←
                </button>


                <button
                    type="button"
                    class="workshops-testimonials__arrow"
                    data-workshop-testimonial-next
                    aria-label="Next testimonial"
                >
                    →
                </button>

            </div>

        </div>


        <div
            class="workshops-testimonials__viewport"
            data-workshop-testimonial-viewport
        >

            <div
                class="workshops-testimonials__track"
                data-workshop-testimonial-track
            >

                <?php foreach ( $testimonials as $testimonial ) : ?>

                    <article class="workshop-testimonial-card">

                        <div
                            class="workshop-testimonial-card__quote"
                            aria-hidden="true"
                        >
                            “
                        </div>


                        <p class="workshop-testimonial-card__text">

                            <?php
                            echo esc_html(
                                $testimonial['quote']
                            );
                            ?>

                        </p>


                        <div class="workshop-testimonial-card__author">

                            <div class="workshop-testimonial-card__avatar">

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

    </div>

</section>