<?php
/**
 * Impacts Page — Stories of Transformation.
 *
 * IMAGE ASSETS REQUIRED LATER:
 *
 * assets/images/impacts/impacts-story-01.png
 * assets/images/impacts/impacts-story-02.png
 * assets/images/impacts/impacts-story-03.png
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$stories = [

    [
        'title'       => 'Finding Her Voice',
        'description' => 'A young participant discovered the confidence to speak, lead and inspire others through climate and peace dialogues.',
        'image'       => 'impacts-story-01.png',
        'link'        => '#',
    ],

    [
        'title'       => 'From Learning to Action',
        'description' => 'A youth group transformed workshop learning into a community-led environmental initiative with lasting local impact.',
        'image'       => 'impacts-story-02.png',
        'link'        => '#',
    ],

    [
        'title'       => 'Building Bridges',
        'description' => 'Young people from different backgrounds came together through dialogue and discovered the power of listening and collaboration.',
        'image'       => 'impacts-story-03.png',
        'link'        => '#',
    ],

];
?>

<section class="impacts-stories">

    <div class="container">

        <div class="impacts-stories__layout">


            <!-- ==========================================
                 LEFT INTRO
            =========================================== -->

            <div class="impacts-stories__intro">

                <div class="impacts-stories__eyebrow">

                    <span>
                        Stories of Transformation
                    </span>

                    <span
                        aria-hidden="true"
                        class="impacts-stories__leaf"
                    >
                        ❧
                    </span>

                </div>


                <h2>
                    Change becomes real
                    through people.
                </h2>


                <p>
                    Behind every number is a story —
                    a young person finding their voice,
                    a community choosing collaboration,
                    or an idea becoming meaningful action.
                </p>


                <a
                    href="#"
                    class="impacts-stories__button"
                >
                    Explore More Stories

                    <span aria-hidden="true">
                        →
                    </span>
                </a>

            </div>


            <!-- ==========================================
                 STORY CARDS
            =========================================== -->

            <div class="impacts-stories__grid">

                <?php foreach ( $stories as $story ) : ?>

                    <article class="impacts-story-card">


                        <!--
                        FINAL IMAGE:
                        assets/images/impacts/<?php
                        echo esc_html( $story['image'] );
                        ?>
                        -->

                        <div class="impacts-story-card__image">

                            <span>
                                <?php
                                echo esc_html(
                                    $story['image']
                                );
                                ?>
                            </span>

                        </div>


                        <div class="impacts-story-card__content">

                            <h3>
                                <?php
                                echo esc_html(
                                    $story['title']
                                );
                                ?>
                            </h3>


                            <p>
                                <?php
                                echo esc_html(
                                    $story['description']
                                );
                                ?>
                            </p>


                            <a
                                href="<?php
                                echo esc_url(
                                    $story['link']
                                );
                                ?>"
                            >
                                Read Story

                                <span aria-hidden="true">
                                    →
                                </span>
                            </a>

                        </div>

                    </article>

                <?php endforeach; ?>

            </div>

        </div>

    </div>

</section>