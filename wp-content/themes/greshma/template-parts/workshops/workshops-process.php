<?php
/**
 * Workshops Page — How It Works.
 *
 * Placeholder:
 * assets/images/workshops/workshops-process.png
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$steps = [

    [
        'number'      => '1',
        'title'       => 'Connect',
        'description' => 'Share your goals, audience, and learning needs.',
        'icon'        => 'connect',
    ],

    [
        'number'      => '2',
        'title'       => 'Co-Create',
        'description' => 'We co-design a workshop that fits your context.',
        'icon'        => 'create',
    ],

    [
        'number'      => '3',
        'title'       => 'Engage',
        'description' => 'We deliver an interactive and impactful session.',
        'icon'        => 'engage',
    ],

    [
        'number'      => '4',
        'title'       => 'Inspire Action',
        'description' => 'Participants leave empowered to take meaningful action.',
        'icon'        => 'action',
    ],

];
?>

<section class="workshops-process">

    <div class="container">

        <div class="workshops-process__panel">


            <!-- ==========================================
                 TITLE
            =========================================== -->

            <div class="workshops-process__heading">

                <h2>
                    How It Works
                </h2>

                <span aria-hidden="true">
                    ❧
                </span>

            </div>


            <!-- ==========================================
                 STEPS
            =========================================== -->

            <div class="workshops-process__steps">

                <?php foreach ( $steps as $index => $step ) : ?>

                    <article class="workshops-process-step">


                        <!-- NUMBER -->

                        <span class="workshops-process-step__number">

                            <?php
                            echo esc_html(
                                $step['number']
                            );
                            ?>

                        </span>


                        <!-- ICON -->

                        <div class="workshops-process-step__icon">

                            <?php if ( 'connect' === $step['icon'] ) : ?>

                                <svg viewBox="0 0 48 48" aria-hidden="true">

                                    <path
                                        d="
                                        M10 10
                                        h21
                                        a8 8 0 0 1 8 8
                                        v7
                                        a8 8 0 0 1-8 8
                                        H21
                                        l-8 7
                                        2-7
                                        h-5
                                        a8 8 0 0 1-8-8
                                        v-7
                                        a8 8 0 0 1 8-8
                                        Z
                                        "
                                    />

                                    <path d="M15 19h13"/>
                                    <path d="M15 24h9"/>

                                </svg>


                            <?php elseif ( 'create' === $step['icon'] ) : ?>

                                <svg viewBox="0 0 48 48" aria-hidden="true">

                                    <rect
                                        x="11"
                                        y="9"
                                        width="26"
                                        height="32"
                                        rx="3"
                                    />

                                    <path d="M19 9V6h10v3"/>

                                    <path d="M17 18h3"/>
                                    <path d="M24 18h8"/>

                                    <path d="M17 25h3"/>
                                    <path d="M24 25h8"/>

                                    <path d="M17 32h3"/>
                                    <path d="M24 32h8"/>

                                </svg>


                            <?php elseif ( 'engage' === $step['icon'] ) : ?>

                                <svg viewBox="0 0 48 48" aria-hidden="true">

                                    <circle cx="24" cy="13" r="4"/>
                                    <circle cx="12" cy="21" r="3.5"/>
                                    <circle cx="36" cy="21" r="3.5"/>

                                    <path d="M17 40v-7c0-6 3-10 7-10s7 4 7 10v7"/>

                                    <path d="M6 40v-6c0-5 2-8 6-8"/>

                                    <path d="M42 40v-6c0-5-2-8-6-8"/>

                                    <path d="M33 8l2-4"/>
                                    <path d="M38 11l4-2"/>

                                </svg>


                            <?php elseif ( 'action' === $step['icon'] ) : ?>

                                <svg viewBox="0 0 48 48" aria-hidden="true">

                                    <path d="M24 42V21"/>

                                    <path
                                        d="
                                        M24 31
                                        C15 30 10 25 9 16
                                        C18 17 23 22 24 31
                                        Z
                                        "
                                    />

                                    <path
                                        d="
                                        M24 24
                                        C26 16 31 11 39 9
                                        C39 18 34 23 24 25
                                        Z
                                        "
                                    />

                                    <path d="M16 42h16"/>

                                </svg>

                            <?php endif; ?>

                        </div>


                        <!-- TEXT -->

                        <h3>
                            <?php echo esc_html( $step['title'] ); ?>
                        </h3>


                        <p>
                            <?php
                            echo esc_html(
                                $step['description']
                            );
                            ?>
                        </p>


                        <!-- ARROW -->

                        <?php if ( $index < count( $steps ) - 1 ) : ?>

                            <span
                                class="workshops-process-step__connector"
                                aria-hidden="true"
                            >
                                <span></span>

                                <svg viewBox="0 0 20 10">
                                    <path d="M2 5h14"/>
                                    <path d="m12 1 4 4-4 4"/>
                                </svg>
                            </span>

                        <?php endif; ?>

                    </article>

                <?php endforeach; ?>

            </div>


            <!-- ==========================================
                 RIGHT IMAGE
            =========================================== -->

            <div class="workshops-process__visual">

                <div class="workshops-process__image-placeholder">

                    <span>
                        workshops-process.png
                    </span>

                </div>

            </div>

        </div>

    </div>

</section>