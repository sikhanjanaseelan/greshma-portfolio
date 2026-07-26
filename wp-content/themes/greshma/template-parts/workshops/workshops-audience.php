<?php
/**
 * Workshops Page — Workshops by Audience.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$audiences = [

    [
        'title'       => 'Youth & Students',
        'description' => 'Interactive learning experiences that build confidence, empathy, leadership, and social responsibility.',
        'icon'        => 'youth',
    ],

    [
        'title'       => 'Educators',
        'description' => 'Workshops that support values-based education, dialogue, reflection, and inclusive learning spaces.',
        'icon'        => 'educators',
    ],

    [
        'title'       => 'NGOs & Organizations',
        'description' => 'Customized programmes that strengthen teams, facilitation skills, collaboration, and community engagement.',
        'icon'        => 'organizations',
    ],

    [
        'title'       => 'Faith Communities',
        'description' => 'Spaces for interfaith understanding, shared values, dialogue, peacebuilding, and community action.',
        'icon'        => 'faith',
    ],

    [
        'title'       => 'Communities',
        'description' => 'Participatory workshops that create connection, strengthen relationships, and inspire local action.',
        'icon'        => 'communities',
    ],

];
?>

<section class="workshops-audience">

    <div class="container">

        <div class="workshops-audience__heading">

            <div>

                <span class="workshops-audience__eyebrow">
                    Designed for Different Spaces
                </span>

                <h2>
                    Workshops by Audience
                </h2>

            </div>

            <p>
                Every group is different. Workshops are adapted
                to the needs, context, age, and experience of participants.
            </p>

        </div>


        <div class="workshops-audience__grid">

            <?php foreach ( $audiences as $audience ) : ?>

                <article class="workshops-audience-card">

                    <span
                        class="workshops-audience-card__icon"
                        aria-hidden="true"
                    >

                        <?php if ( 'youth' === $audience['icon'] ) : ?>

                            <svg viewBox="0 0 48 48">
                                <circle cx="24" cy="12" r="5"/>
                                <circle cx="11" cy="20" r="4"/>
                                <circle cx="37" cy="20" r="4"/>
                                <path d="M17 40v-8c0-6 3-11 7-11s7 5 7 11v8"/>
                                <path d="M5 40v-6c0-5 2-9 6-9"/>
                                <path d="M43 40v-6c0-5-2-9-6-9"/>
                            </svg>

                        <?php elseif ( 'educators' === $audience['icon'] ) : ?>

                            <svg viewBox="0 0 48 48">
                                <path d="M7 9h14c4 0 6 2 6 6v27c0-4-2-6-6-6H7Z"/>
                                <path d="M41 9H27c-4 0-6 2-6 6v27c0-4 2-6 6-6h14Z"/>
                            </svg>

                        <?php elseif ( 'organizations' === $audience['icon'] ) : ?>

                            <svg viewBox="0 0 48 48">
                                <path d="M8 40V15h32v25"/>
                                <path d="M16 15V8h16v7"/>
                                <path d="M15 22h5"/>
                                <path d="M28 22h5"/>
                                <path d="M15 29h5"/>
                                <path d="M28 29h5"/>
                                <path d="M21 40v-7h6v7"/>
                            </svg>

                        <?php elseif ( 'faith' === $audience['icon'] ) : ?>

                            <svg viewBox="0 0 48 48">
                                <path d="M24 5v14"/>
                                <path d="M18 11h12"/>
                                <path d="M15 40c0-11 3-18 9-18s9 7 9 18"/>
                                <path d="M9 40c0-6 2-10 6-13"/>
                                <path d="M39 40c0-6-2-10-6-13"/>
                            </svg>

                        <?php elseif ( 'communities' === $audience['icon'] ) : ?>

                            <svg viewBox="0 0 48 48">
                                <circle cx="24" cy="14" r="5"/>
                                <circle cx="12" cy="21" r="4"/>
                                <circle cx="36" cy="21" r="4"/>
                                <path d="M17 41v-8c0-6 3-11 7-11s7 5 7 11v8"/>
                                <path d="M6 41v-6c0-5 2-9 6-9"/>
                                <path d="M42 41v-6c0-5-2-9-6-9"/>
                            </svg>

                        <?php endif; ?>

                    </span>


                    <h3>
                        <?php echo esc_html( $audience['title'] ); ?>
                    </h3>


                    <p>
                        <?php echo esc_html( $audience['description'] ); ?>
                    </p>


                    <a href="#workshops-contact">
                        Explore Workshops

                        <span aria-hidden="true">
                            →
                        </span>
                    </a>

                </article>

            <?php endforeach; ?>

        </div>

    </div>

</section>