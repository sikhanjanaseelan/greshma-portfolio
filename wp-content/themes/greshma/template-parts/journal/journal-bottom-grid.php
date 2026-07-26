<?php
/**
 * Journal Page — LinkedIn Insights + Media & Interviews.
 *
 * IMAGE ASSETS REQUIRED LATER:
 *
 * assets/images/journal/journal-linkedin-main.png
 *
 * assets/images/journal/journal-media-01.png
 * assets/images/journal/journal-media-02.png
 * assets/images/journal/journal-media-03.png
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$media_items = [

    [
        'title' => 'Interview: Building Peace Through Youth Initiatives',
        'meta'  => 'The Earth Charter Initiative',
        'date'  => 'April 22, 2025',
        'image' => 'journal-media-01.png',
    ],

    [
        'title' => 'Podcast: Voices for the Planet',
        'meta'  => 'Our Kids Climate Podcast',
        'date'  => 'March 10, 2025',
        'image' => 'journal-media-02.png',
    ],

    [
        'title' => 'Featured in: The New Indian Express',
        'meta'  => 'Young Catholic woman leading climate conversations',
        'date'  => 'Feb 10, 2025',
        'image' => 'journal-media-03.png',
    ],

];
?>

<section class="journal-bottom-grid">


    <!-- ==========================================
         LINKEDIN INSIGHTS
    =========================================== -->

    <article class="journal-linkedin">

        <div class="journal-bottom-grid__heading">

            <h2>
                LinkedIn Insights
            </h2>

            <a href="#">
                View All on LinkedIn
                <span aria-hidden="true">→</span>
            </a>

        </div>


        <div class="journal-linkedin__content">


            <!-- LEFT TEXT -->

            <div class="journal-linkedin__copy">

                <div class="journal-linkedin__meta">

                    <span class="journal-linkedin__logo">
                        in
                    </span>

                    <span>
                        May 25, 2025
                    </span>

                    <span>
                        •
                    </span>

                    <span>
                        LinkedIn Article
                    </span>

                </div>


                <h3>
                    Why Interfaith Dialogue
                    Matters More Than Ever
                </h3>


                <p>
                    In a world of polarities, dialogue is not just
                    a choice—it’s the bridge that connects humanity.
                </p>


                <div class="journal-linkedin__stats">

                    <span>♡ 78</span>
                    <span>▢ 12</span>
                    <span>↗ 6</span>

                </div>


                <a
                    href="#"
                    class="journal-linkedin__button"
                >
                    Read on LinkedIn
                    <span aria-hidden="true">↗</span>
                </a>

            </div>


            <!-- RIGHT IMAGE -->

            <div class="journal-linkedin__visual">

                <span>
                    journal-linkedin-main.png
                </span>

            </div>

        </div>

    </article>


    <!-- ==========================================
         MEDIA & INTERVIEWS
    =========================================== -->

    <article class="journal-media">

        <div class="journal-bottom-grid__heading">

            <h2>
                Media &amp; Interviews
            </h2>

            <a href="#">
                View All
                <span aria-hidden="true">→</span>
            </a>

        </div>


        <div class="journal-media__list">

            <?php foreach ( $media_items as $item ) : ?>

                <article class="journal-media__item">


                    <div class="journal-media__image">

                        <span>
                            <?php
                            echo esc_html(
                                $item['image']
                            );
                            ?>
                        </span>

                    </div>


                    <div class="journal-media__content">

                        <h3>
                            <?php
                            echo esc_html(
                                $item['title']
                            );
                            ?>
                        </h3>

                        <p>
                            <?php
                            echo esc_html(
                                $item['meta']
                            );
                            ?>
                        </p>

                        <span>
                            <?php
                            echo esc_html(
                                $item['date']
                            );
                            ?>
                        </span>

                    </div>

                </article>

            <?php endforeach; ?>

        </div>

    </article>

</section>