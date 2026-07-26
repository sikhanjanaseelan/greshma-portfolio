<?php
/**
 * Events Page — Bottom CTA.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="events-cta">

    <div class="container">

        <div class="events-cta__panel">

            <div class="events-cta__content">

                <span class="events-cta__eyebrow">
                    Come Be Part of It
                </span>

                <h2>
                    Let’s create meaningful
                    moments together.
                </h2>

                <p>
                    Join an upcoming gathering, workshop, dialogue,
                    or community experience and be part of the conversation.
                </p>

            </div>


            <div class="events-cta__actions">

                <a
                    href="#events-filter-form"
                    class="events-cta__button events-cta__button--primary"
                >
                    Explore Events

                    <span aria-hidden="true">
                        →
                    </span>
                </a>


                <a
                    href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"
                    class="events-cta__button events-cta__button--secondary"
                >
                    Invite Me
                </a>

            </div>


            <span
                class="events-cta__leaf events-cta__leaf--left"
                aria-hidden="true"
            >
                ❧
            </span>

            <span
                class="events-cta__leaf events-cta__leaf--right"
                aria-hidden="true"
            >
                ❧
            </span>

        </div>

    </div>

</section>