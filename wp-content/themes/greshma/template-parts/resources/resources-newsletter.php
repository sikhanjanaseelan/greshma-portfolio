<?php
/**
 * Resources Page — Newsletter.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="resources-newsletter">

    <div class="container">

        <div class="resources-newsletter__panel">


            <!-- LEFT CONTENT -->

            <div class="resources-newsletter__content">

                <div class="resources-newsletter__heading">

                    <h2>
                        Stay Updated
                    </h2>

                    <span aria-hidden="true">
                        ❧
                    </span>

                </div>


                <p>
                    Get new resources, guides, toolkits,
                    and reflections delivered to your inbox.
                </p>

            </div>


            <!-- FORM -->

            <form
                class="resources-newsletter__form"
                action="#"
                method="post"
            >

                <label
                    class="screen-reader-text"
                    for="resources-newsletter-email"
                >
                    Email address
                </label>


                <input
                    type="email"
                    id="resources-newsletter-email"
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
                    No spam. Unsubscribe anytime.
                </small>

            </form>


            <span
                class="resources-newsletter__leaf"
                aria-hidden="true"
            >
                ❧
            </span>

        </div>

    </div>

</section>