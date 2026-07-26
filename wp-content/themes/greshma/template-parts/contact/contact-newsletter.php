<?php
/**
 * Contact Page — Stay Connected Newsletter.
 *
 * IMAGE ASSET REQUIRED LATER:
 *
 * assets/images/contact/contact-newsletter-community.png
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="contact-newsletter">

    <div class="container">

        <div class="contact-newsletter__panel">


            <!-- ==========================================
                 LEFT CONTENT
            =========================================== -->

            <div class="contact-newsletter__content">

                <div class="contact-newsletter__heading">

                    <h2>
                        Stay Connected
                    </h2>

                    <span aria-hidden="true">
                        ❧
                    </span>

                </div>


                <p class="contact-newsletter__text">
                    Join my newsletter for reflections,
                    stories, resources and updates from
                    the journey.
                </p>


                <!-- ======================================
                     NEWSLETTER FORM

                     UI only for now.
                     Later connect to Mailchimp /
                     Brevo / WordPress newsletter service.
                ======================================= -->

                <form
                    class="contact-newsletter__form"
                    action=""
                    method="post"
                >

                    <label
                        for="contact-newsletter-email"
                        class="screen-reader-text"
                    >
                        Your email address
                    </label>


                    <input
                        type="email"
                        id="contact-newsletter-email"
                        name="newsletter_email"
                        placeholder="Enter your email address"
                        required
                    >


                    <button
                        type="submit"
                        class="contact-newsletter__button"
                    >
                        Subscribe

                        <span aria-hidden="true">
                            →
                        </span>
                    </button>

                </form>


                <p class="contact-newsletter__note">
                    No spam. Just meaningful updates.
                </p>

            </div>


            <!-- ==========================================
                 RIGHT COMMUNITY IMAGE

                 FINAL IMAGE:
                 assets/images/contact/
                 contact-newsletter-community.png
            =========================================== -->

            <div class="contact-newsletter__visual">

                <div class="contact-newsletter__image-placeholder">

                    <span>
                        contact-newsletter-community.png
                    </span>

                </div>

            </div>


            <!-- Decorative leaf -->

            <span
                class="contact-newsletter__decor"
                aria-hidden="true"
            >
                ❧
            </span>

        </div>

    </div>

</section>