<?php
/**
 * My Paths Page — Education Section.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$education = [

    [
        'year'        => '2020',
        'title'       => 'Master’s in International Peace Studies',
        'institution' => 'University for Peace, Costa Rica',
        'description' => 'Focused on peacebuilding, conflict transformation, human rights and international cooperation.',
        'icon'        => '✦',
    ],

    [
        'year'        => '2019',
        'title'       => 'International Learning & Global Exposure',
        'institution' => 'Peacebuilding & Intercultural Programs',
        'description' => 'Expanded my understanding of dialogue, sustainability and community-led transformation through international experiences.',
        'icon'        => '◎',
    ],

    [
        'year'        => '2016',
        'title'       => 'Bachelor’s Degree in English',
        'institution' => 'India',
        'description' => 'Built a strong foundation in communication, literature, critical thinking and storytelling.',
        'icon'        => '◆',
    ],

];
?>

<section class="my-paths-education">

    <div class="container">

        <div class="my-paths-education__layout">


            <!-- ==========================================
                 LEFT INTRO
            =========================================== -->

            <div class="my-paths-education__intro">

                <div class="my-paths-education__eyebrow">

                    <span>My Education</span>

                    <span
                        class="my-paths-education__leaf"
                        aria-hidden="true"
                    >
                        ❧
                    </span>

                </div>

                <h2>
                    Learning that shaped
                    how I see the world.
                </h2>

                <p>
                    Education gave me the language,
                    perspective and tools to turn curiosity
                    into meaningful action.
                </p>

            </div>


            <!-- ==========================================
                 EDUCATION TIMELINE
            =========================================== -->

            <div class="my-paths-education__timeline">

                <div
                    class="my-paths-education__line"
                    aria-hidden="true"
                ></div>

                <?php foreach ( $education as $item ) : ?>

                    <article class="my-paths-education__item">

                        <div class="my-paths-education__year">

                            <?php
                            echo esc_html(
                                $item['year']
                            );
                            ?>

                        </div>


                        <div class="my-paths-education__marker">

                            <span>
                                <?php
                                echo esc_html(
                                    $item['icon']
                                );
                                ?>
                            </span>

                        </div>


                        <div class="my-paths-education__content">

                            <h3>
                                <?php
                                echo esc_html(
                                    $item['title']
                                );
                                ?>
                            </h3>

                            <h4>
                                <?php
                                echo esc_html(
                                    $item['institution']
                                );
                                ?>
                            </h4>

                            <p>
                                <?php
                                echo esc_html(
                                    $item['description']
                                );
                                ?>
                            </p>

                        </div>

                    </article>

                <?php endforeach; ?>

            </div>

        </div>

    </div>

</section>