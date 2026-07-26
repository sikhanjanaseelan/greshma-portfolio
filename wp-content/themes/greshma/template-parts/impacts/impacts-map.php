<?php
/**
 * Impacts Page — Where We Work.
 *
 * SVG ASSET REQUIRED:
 *
 * assets/images/impacts/impacts-world-map.svg
 *
 * The SVG should contain ONLY the watercolor-style world map.
 * Location pins are positioned separately using HTML/CSS.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$map_svg = get_template_directory_uri()
    . '/assets/images/impacts/impacts-world-map.svg';
?>

<section class="impacts-map">

    <div class="container">

        <div class="impacts-map__layout">


            <!-- ==================================================
                 LEFT — WORLD MAP
            =================================================== -->

            <div class="impacts-map__visual">


                <!--
                FINAL SVG:

                assets/images/impacts/impacts-world-map.svg

                Recommended:
                - transparent background
                - soft watercolor green/teal continents
                - no text
                - no pins
                - landscape proportion approx 900 x 450
                -->

                <div class="impacts-map__map">

                    <img
                        src="<?php echo esc_url( $map_svg ); ?>"
                        alt="Map showing the global reach of Greshma's work"
                        class="impacts-map__map-image"
                    >


                    <!-- ==========================================
                         MAP PINS

                         Position can be adjusted later once
                         the final SVG map is available.
                    =========================================== -->


                    <!-- North America -->
                    <span
                        class="
                            impacts-map__pin
                            impacts-map__pin--north-america
                            impacts-map__pin--green
                        "
                        aria-hidden="true"
                    ></span>


                    <!-- Europe -->
                    <span
                        class="
                            impacts-map__pin
                            impacts-map__pin--europe
                            impacts-map__pin--orange
                        "
                        aria-hidden="true"
                    ></span>


                    <!-- Asia -->
                    <span
                        class="
                            impacts-map__pin
                            impacts-map__pin--asia
                            impacts-map__pin--orange
                        "
                        aria-hidden="true"
                    ></span>


                    <!-- India / South Asia -->
                    <span
                        class="
                            impacts-map__pin
                            impacts-map__pin--south-asia
                            impacts-map__pin--orange
                        "
                        aria-hidden="true"
                    ></span>


                    <!-- Africa -->
                    <span
                        class="
                            impacts-map__pin
                            impacts-map__pin--africa
                            impacts-map__pin--orange
                        "
                        aria-hidden="true"
                    ></span>


                    <!-- Latin America -->
                    <span
                        class="
                            impacts-map__pin
                            impacts-map__pin--latin-america
                            impacts-map__pin--gold
                        "
                        aria-hidden="true"
                    ></span>


                    <!-- Australia -->
                    <span
                        class="
                            impacts-map__pin
                            impacts-map__pin--australia
                            impacts-map__pin--green
                        "
                        aria-hidden="true"
                    ></span>


                    <!-- ==========================================
                         DOTTED CONNECTION PATHS
                    =========================================== -->

                    <svg
                        class="impacts-map__routes"
                        viewBox="0 0 1000 500"
                        preserveAspectRatio="none"
                        aria-hidden="true"
                    >

                        <path
                            d="
                                M210 155
                                C360 80,
                                520 80,
                                640 180
                            "
                        />

                        <path
                            d="
                                M215 155
                                C335 230,
                                410 360,
                                515 365
                            "
                        />

                        <path
                            d="
                                M500 125
                                C640 105,
                                720 145,
                                770 225
                            "
                        />

                        <path
                            d="
                                M520 355
                                C640 310,
                                690 270,
                                755 225
                            "
                        />

                    </svg>


                    <!-- ==========================================
                         HANDWRITTEN REGION LABELS
                    =========================================== -->

                    <span class="impacts-map__map-label impacts-map__map-label--north">
                        North America
                    </span>

                    <span class="impacts-map__map-label impacts-map__map-label--latin">
                        Latin America
                    </span>

                    <span class="impacts-map__map-label impacts-map__map-label--europe">
                        Europe
                    </span>

                    <span class="impacts-map__map-label impacts-map__map-label--africa">
                        Africa
                    </span>

                    <span class="impacts-map__map-label impacts-map__map-label--asia">
                        Asia
                    </span>

                    <span class="impacts-map__map-label impacts-map__map-label--australia">
                        Australia
                    </span>

                </div>

            </div>


            <!-- ==================================================
                 RIGHT — WHERE WE WORK
            =================================================== -->

            <div class="impacts-map__content">


                <!-- Heading -->

                <div class="impacts-map__heading">

                    <h2>
                        Where We Work
                    </h2>

                    <span
                        class="impacts-map__heading-leaf"
                        aria-hidden="true"
                    >
                        ❧
                    </span>

                </div>

                <span
                    class="impacts-map__heading-line"
                    aria-hidden="true"
                ></span>


                <!-- ==============================================
                     REGIONS — 3 COLUMNS × 2 ROWS
                =============================================== -->

                <div class="impacts-map__regions">


                    <!-- ASIA -->

                    <article class="impacts-map__region">

                        <span
                            class="
                                impacts-map__region-dot
                                impacts-map__region-dot--green
                            "
                            aria-hidden="true"
                        ></span>

                        <div>

                            <h3>
                                Asia
                            </h3>

                            <p>
                                India, Nepal, Sri Lanka,<br>
                                Thailand, Malaysia
                            </p>

                        </div>

                    </article>


                    <!-- AFRICA -->

                    <article class="impacts-map__region">

                        <span
                            class="
                                impacts-map__region-dot
                                impacts-map__region-dot--gold
                            "
                            aria-hidden="true"
                        ></span>

                        <div>

                            <h3>
                                Africa
                            </h3>

                            <p>
                                Kenya, Uganda<br>
                                Benin
                            </p>

                        </div>

                    </article>


                    <!-- NORTH AMERICA -->

                    <article class="impacts-map__region">

                        <span
                            class="
                                impacts-map__region-dot
                                impacts-map__region-dot--orange
                            "
                            aria-hidden="true"
                        ></span>

                        <div>

                            <h3>
                                North America
                            </h3>

                            <p>
                                USA
                            </p>

                        </div>

                    </article>


                    <!-- EUROPE -->

                    <article class="impacts-map__region">

                        <span
                            class="
                                impacts-map__region-dot
                                impacts-map__region-dot--orange
                            "
                            aria-hidden="true"
                        ></span>

                        <div>

                            <h3>
                                Europe
                            </h3>

                            <p>
                                United Kingdom,<br>
                                Portugal
                            </p>

                        </div>

                    </article>


                    <!-- LATIN AMERICA -->

                    <article class="impacts-map__region">

                        <span
                            class="
                                impacts-map__region-dot
                                impacts-map__region-dot--gold
                            "
                            aria-hidden="true"
                        ></span>

                        <div>

                            <h3>
                                Latin America
                            </h3>

                            <p>
                                Costa Rica
                            </p>

                        </div>

                    </article>


                    <!-- GLOBAL ONLINE -->

                    <article class="impacts-map__region">

                        <span
                            class="
                                impacts-map__region-dot
                                impacts-map__region-dot--orange
                            "
                            aria-hidden="true"
                        ></span>

                        <div>

                            <h3>
                                Global Online
                            </h3>

                            <p>
                                Numerous digital<br>
                                programs
                            </p>

                        </div>

                    </article>


                </div>

            </div>

        </div>

    </div>

</section>