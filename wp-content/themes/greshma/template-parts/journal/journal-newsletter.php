<?php
/**
 * Journal Page — Newsletter CTA.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="journal-newsletter">

    <div class="container">

        <div class="journal-newsletter__panel">


            <!-- ==========================================
                 LEFT COPY
            =========================================== -->

            <div class="journal-newsletter__content">

                <div class="journal-newsletter__heading">

                    <h2>
                        Stay Connected
                    </h2>

                    <span aria-hidden="true">
                        ❧
                    </span>

                </div>


                <p>
                    Subscribe to receive updates on new articles,
                    publications, events, and reflections.
                </p>

            </div>


            <!-- ==========================================
                 SUBSCRIBE FORM
            =========================================== -->

            <form
                class="journal-newsletter__form"
                action="#"
                method="post"
            >

                <label
                    class="screen-reader-text"
                    for="journal-newsletter-email"
                >
                    Email address
                </label>


                <input
                    type="email"
                    id="journal-newsletter-email"
                    name="email"
                    placeholder="Your email address"
                    required
                >


                <button type="submit">

                    Subscribe

                    <span aria-hidden="true">
                        →
                    </span>

                </button>


                <small>
                    No spam, unsubscribe anytime.
                </small>

            </form>


            <!-- ==========================================
                 DECORATION
            =========================================== -->

            <span
                class="journal-newsletter__leaf"
                aria-hidden="true"
            >
                ❧
            </span>

        </div>

    </div>

</section>