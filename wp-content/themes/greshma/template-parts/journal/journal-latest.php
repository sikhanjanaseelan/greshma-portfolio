<?php
/**
 * Journal Page — Latest Reflections.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$latest_posts = [

    [
        'title'    => 'On Choosing Peace, Every Single Day',
        'excerpt'  => 'Peace is not a one-time achievement but a daily commitment. It begins in our hearts, in our homes, and in our communities.',
        'category' => 'Thoughts & Reflections',
        'date'     => 'May 28, 2025',
        'read'     => '5 min read',
        'image'    => 'journal-latest-01.png',
    ],

    [
        'title'    => 'Reflections from the URI Global Conference',
        'excerpt'  => 'Grateful to be part of a global family working towards a world where diversity is celebrated and harmony is strengthened.',
        'category' => 'Events & Talks',
        'date'     => 'May 20, 2025',
        'read'     => '6 min read',
        'image'    => 'journal-latest-02.png',
    ],

    [
        'title'    => 'Youth Climate Action: Hope in Action',
        'excerpt'  => 'Young people are not just the leaders of tomorrow. They are the changemakers of today.',
        'category' => 'Thoughts & Reflections',
        'date'     => 'May 15, 2025',
        'read'     => '4 min read',
        'image'    => 'journal-latest-03.png',
    ],

];
?>

<section class="journal-latest">


    <!-- ==========================================
         SECTION HEADER
    =========================================== -->

    <div class="journal-section-heading">

        <h2>
            Latest Reflections
        </h2>


        <a href="#">
            View All

            <span aria-hidden="true">
                →
            </span>
        </a>

    </div>


    <!-- ==========================================
         POSTS
    =========================================== -->

    <div class="journal-latest__grid">

        <?php foreach ( $latest_posts as $post ) : ?>

            <article class="journal-latest-card">


                <!-- IMAGE -->

                <div class="journal-latest-card__image">

                    <span>
                        <?php
                        echo esc_html(
                            $post['image']
                        );
                        ?>
                    </span>

                </div>


                <!-- CONTENT -->

                <div class="journal-latest-card__content">


                    <span class="journal-latest-card__category">

                        <?php
                        echo esc_html(
                            $post['category']
                        );
                        ?>

                    </span>


                    <h3>

                        <?php
                        echo esc_html(
                            $post['title']
                        );
                        ?>

                    </h3>


                    <p>

                        <?php
                        echo esc_html(
                            $post['excerpt']
                        );
                        ?>

                    </p>


                    <div class="journal-latest-card__meta">

                        <span>
                            <?php
                            echo esc_html(
                                $post['date']
                            );
                            ?>
                        </span>


                        <span
                            class="journal-latest-card__dot"
                            aria-hidden="true"
                        ></span>


                        <span>
                            <?php
                            echo esc_html(
                                $post['read']
                            );
                            ?>
                        </span>

                    </div>

                </div>

            </article>

        <?php endforeach; ?>

    </div>

</section>