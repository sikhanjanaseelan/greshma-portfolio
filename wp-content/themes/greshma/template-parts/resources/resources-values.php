<?php
/**
 * Resources Page — Values Strip.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="resources-values">

    <div class="container">

        <div class="resources-values__grid">


            <!-- ==========================================
                 FREE & OPEN ACCESS
            =========================================== -->

            <article class="resources-value-card">

                <div
                    class="resources-value-card__icon"
                    aria-hidden="true"
                >

                    <svg viewBox="0 0 48 48">

                        <path d="M16 22v-6c0-7 4-11 8-11s8 4 8 11v6"/>

                        <rect
                            x="11"
                            y="21"
                            width="26"
                            height="20"
                            rx="4"
                        />

                        <circle
                            cx="24"
                            cy="30"
                            r="3"
                        />

                        <path d="M24 33v4"/>

                    </svg>

                </div>


                <div class="resources-value-card__content">

                    <h3>
                        Free &amp; Open Access
                    </h3>

                    <p>
                        These resources are created to support
                        learning, dialogue, and meaningful action
                        without unnecessary barriers.
                    </p>

                </div>

            </article>


            <!-- ==========================================
                 USE & SHARE
            =========================================== -->

            <article class="resources-value-card">

                <div
                    class="resources-value-card__icon"
                    aria-hidden="true"
                >

                    <svg viewBox="0 0 48 48">

                        <circle cx="13" cy="24" r="5"/>
                        <circle cx="35" cy="12" r="5"/>
                        <circle cx="35" cy="36" r="5"/>

                        <path d="M18 22l12-7"/>
                        <path d="M18 26l12 7"/>

                    </svg>

                </div>


                <div class="resources-value-card__content">

                    <h3>
                        Use &amp; Share
                    </h3>

                    <p>
                        Use these materials in your programs,
                        classrooms, workshops, and communities,
                        and share them with others.
                    </p>

                </div>

            </article>


            <!-- ==========================================
                 HAVE A RESOURCE?
            =========================================== -->

            <article
                class="
                    resources-value-card
                    resources-value-card--highlight
                "
                id="suggest-resource"
            >

                <div
                    class="resources-value-card__icon"
                    aria-hidden="true"
                >

                    <svg viewBox="0 0 48 48">

                        <path d="M24 6v25"/>

                        <path d="M15 16l9-10 9 10"/>

                        <path d="M10 28v12h28V28"/>

                    </svg>

                </div>


                <div class="resources-value-card__content">

                    <h3>
                        Have a Resource to Share?
                    </h3>

                    <p>
                        Know of a useful resource that belongs
                        in this library? I’d love to hear about it.
                    </p>


                    <a
                        href="<?php
                        echo esc_url(
                            home_url( '/contact/' )
                        );
                        ?>"
                    >
                        Suggest a Resource

                        <span aria-hidden="true">
                            →
                        </span>
                    </a>

                </div>


                <span
                    class="resources-value-card__leaf"
                    aria-hidden="true"
                >
                    ❧
                </span>

            </article>

        </div>

    </div>

</section>