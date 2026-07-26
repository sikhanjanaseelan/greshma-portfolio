<?php
/**
 * Contact Page — Send a Message + Let's Connect.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="contact-main">

    <div class="container">

        <div class="contact-main__layout">


            <!-- ==========================================
                 LEFT — SEND A MESSAGE
            =========================================== -->

            <div class="contact-form-card">

                <div class="contact-main__heading">

                    <h2>
                        Send a Message
                    </h2>

                    <span aria-hidden="true">
                        ❧
                    </span>

                </div>


                <form
                    class="contact-form"
                    action=""
                    method="post"
                >

                    <div class="contact-form__row">

                        <div class="contact-form__field">

                            <label
                                for="contact-name"
                                class="screen-reader-text"
                            >
                                Your Name
                            </label>

                            <input
                                type="text"
                                id="contact-name"
                                name="contact_name"
                                placeholder="Your Name"
                                required
                            >

                        </div>


                        <div class="contact-form__field">

                            <label
                                for="contact-email"
                                class="screen-reader-text"
                            >
                                Email Address
                            </label>

                            <input
                                type="email"
                                id="contact-email"
                                name="contact_email"
                                placeholder="Email Address"
                                required
                            >

                        </div>

                    </div>


                    <div class="contact-form__field">

                        <label
                            for="contact-subject"
                            class="screen-reader-text"
                        >
                            Subject
                        </label>

                        <input
                            type="text"
                            id="contact-subject"
                            name="contact_subject"
                            placeholder="Subject"
                        >

                    </div>


                    <div class="contact-form__field">

                        <label
                            for="contact-message"
                            class="screen-reader-text"
                        >
                            How can I help you?
                        </label>

                        <textarea
                            id="contact-message"
                            name="contact_message"
                            rows="6"
                            placeholder="How can I help you?"
                            required
                        ></textarea>

                    </div>


                    <button
                        type="submit"
                        class="contact-form__button"
                    >
                        <span>
                            Send Message
                        </span>

                        <span aria-hidden="true">
                            ↗
                        </span>
                    </button>

                </form>

            </div>


            <!-- ==========================================
                 RIGHT — LET'S CONNECT
            =========================================== -->

            <div class="contact-connect">

                <div class="contact-main__heading">

                    <h2>
                        Let’s Connect
                    </h2>

                    <span aria-hidden="true">
                        ❧
                    </span>

                </div>


                <div class="contact-connect__list">


                    <!-- EMAIL -->

                    <div class="contact-connect__item">

                        <div class="contact-connect__icon">
                            ✉
                        </div>

                        <div>

                            <h3>
                                Email
                            </h3>

                            <a href="mailto:connect@greshma.me">
                                connect@greshma.me
                            </a>

                            <p>
                                I usually reply within 24–48 hours.
                            </p>

                        </div>

                    </div>


                    <!-- LOCATION -->

                    <div class="contact-connect__item">

                        <div class="contact-connect__icon">
                            ⌖
                        </div>

                        <div>

                            <h3>
                                Location
                            </h3>

                            <p>
                                Based in India
                            </p>

                            <span>
                                Working across the world.
                            </span>

                        </div>

                    </div>


                    <!-- WEBSITE -->

                    <div class="contact-connect__item">

                        <div class="contact-connect__icon">
                            ◎
                        </div>

                        <div>

                            <h3>
                                Website
                            </h3>

                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                www.greshma.me
                            </a>

                        </div>

                    </div>


                    <!-- BOOK -->

                    <div class="contact-connect__item">

                        <div class="contact-connect__icon">
                            ◫
                        </div>

                        <div>

                            <h3>
                                Book a Conversation
                            </h3>

                            <p>
                                Schedule a 30-min discovery call
                            </p>

                            <a
                                href="#"
                                class="contact-connect__book-link"
                            >
                                Book Now
                                <span aria-hidden="true">→</span>
                            </a>

                        </div>

                    </div>


                </div>

            </div>

        </div>

    </div>

</section>