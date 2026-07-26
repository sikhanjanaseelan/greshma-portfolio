<?php
/**
 * Workshops Page — Final CTA.
 *
 * Placeholder:
 * assets/images/workshops/workshops-cta.png
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;
?>

<section
    class="workshops-cta"
    id="workshops-contact"
>
    <div class="container">

        <div class="workshops-cta__box">

            <div
                class="workshops-cta__decor"
                aria-hidden="true"
            >
                ❧
            </div>


            <div class="workshops-cta__content">

                <h2>
                    Let’s Create a Workshop
                    That Makes a Difference
                </h2>

                <p>
                    Have a topic in mind or need something custom?
                    Let’s design a meaningful learning experience together.
                </p>


                <div class="workshops-cta__actions">

                    <a
                        href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"
                        class="workshops-cta__button workshops-cta__button--gold"
                    >
                        Request a Workshop

                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <rect x="4" y="5" width="16" height="15" rx="2"/>
                            <path d="M8 3v4"/>
                            <path d="M16 3v4"/>
                            <path d="M4 9h16"/>
                        </svg>
                    </a>


                    <a
                        href="#"
                        class="workshops-cta__button workshops-cta__button--outline"
                    >
                        Download Brochure

                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M12 3v12"/>
                            <path d="m7 10 5 5 5-5"/>
                            <path d="M5 20h14"/>
                        </svg>
                    </a>

                </div>

            </div>


            <!-- PNG PLACEHOLDER -->

            <div class="workshops-cta__visual">

                <div class="workshops-cta__placeholder">
                    <span>
                        workshops-cta.png
                    </span>
                </div>

            </div>

        </div>

    </div>
</section>