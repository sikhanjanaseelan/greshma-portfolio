<?php
/**
 * Homepage About section.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$about_image = get_template_directory_uri() . '/assets/images/about/about-person.jpg';
?>

<section class="home-about" id="about">

    <div class="container">

        <div class="home-about__layout">

            <!-- Portrait side -->
            <div class="home-about__visual reveal">

                <div class="home-about__decor home-about__decor--top" aria-hidden="true"></div>

                <div class="home-about__portrait-wrap">

                    <div class="home-about__portrait">

                        <img
                            src="<?php echo esc_url( $about_image ); ?>"
                            alt="<?php esc_attr_e( 'Greshma Pious Raju', 'greshma' ); ?>"
                            loading="lazy"
                        >

                    </div>

                </div>

                <div class="home-about__decor home-about__decor--bottom" aria-hidden="true"></div>

            </div>

            <!-- Content side -->
            <div class="home-about__content reveal">

                <span class="home-about__eyebrow">
                    ABOUT GRESHMA
                </span>

                <h2 class="home-about__title">
                    Rooted in empathy.
                    <br>
                    Guided by purpose.
                </h2>

                <p class="home-about__lead">
                    I am Greshma Pious Raju, a peace and climate educator,
                    storyteller, facilitator and community builder working
                    across cultures, generations and movements.
                </p>

                <p class="home-about__description">
                    My work brings together peacebuilding, climate action,
                    education and meaningful human connection. I create spaces
                    where people can listen deeply, learn together and turn
                    shared values into thoughtful action.
                </p>

                <div class="home-about__features">

                    <div class="home-about__feature">

                        <span class="home-about__feature-icon" aria-hidden="true">
                            ✓
                        </span>

                        <div>
                            <h3>Peacebuilding</h3>

                            <p>
                                Creating inclusive spaces for dialogue,
                                trust and understanding.
                            </p>
                        </div>

                    </div>

                    <div class="home-about__feature">

                        <span class="home-about__feature-icon" aria-hidden="true">
                            ✓
                        </span>

                        <div>
                            <h3>Climate Education</h3>

                            <p>
                                Supporting learning that connects people,
                                planet and responsibility.
                            </p>
                        </div>

                    </div>

                    <div class="home-about__feature">

                        <span class="home-about__feature-icon" aria-hidden="true">
                            ✓
                        </span>

                        <div>
                            <h3>Community Leadership</h3>

                            <p>
                                Bringing diverse people and ideas together
                                around shared purpose.
                            </p>
                        </div>

                    </div>

                    <div class="home-about__feature">

                        <span class="home-about__feature-icon" aria-hidden="true">
                            ✓
                        </span>

                        <div>
                            <h3>Global Engagement</h3>

                            <p>
                                Working across cultures, communities and
                                international platforms.
                            </p>
                        </div>

                    </div>

                </div>

                <a
                    href="<?php echo esc_url( home_url( '/about/' ) ); ?>"
                    class="home-about__button"
                >
                    <span>Read My Story</span>

                    <span class="home-about__button-arrow" aria-hidden="true">
                        →
                    </span>
                </a>

            </div>

        </div>

    </div>

</section>