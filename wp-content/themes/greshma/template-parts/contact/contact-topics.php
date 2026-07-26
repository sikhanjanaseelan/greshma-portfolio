<?php
/**
 * Contact Page — Topics / Reasons to Connect.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$topics = [

    [
        'title'       => 'Collaborations',
        'description' => 'Partnerships for programs, research, or community initiatives.',
        'icon'        => '♧',
    ],

    [
        'title'       => 'Speaking',
        'description' => 'Conference invitations, panel discussions, and keynote talks.',
        'icon'        => '◉',
    ],

    [
        'title'       => 'Consulting',
        'description' => 'Advisory support on peace, dialogue, youth leadership, and sustainability.',
        'icon'        => '◇',
    ],

    [
        'title'       => 'Volunteering',
        'description' => 'Join initiatives or contribute your skills for impact.',
        'icon'        => '♧',
    ],

    [
        'title'       => 'General Inquiries',
        'description' => 'Questions, ideas, or just a friendly hello!',
        'icon'        => '✦',
    ],

];
?>

<section class="contact-topics">

    <div class="container">

        <!-- ==========================================
             HEADING
        =========================================== -->

        <div class="contact-topics__heading">

            <span
                class="contact-topics__line"
                aria-hidden="true"
            ></span>

            <h2>
                I’d love to hear from you about
            </h2>

            <span
                class="contact-topics__leaf"
                aria-hidden="true"
            >
                ❧
            </span>

        </div>


        <!-- ==========================================
             TOPIC CARDS
        =========================================== -->

        <div class="contact-topics__grid">

            <?php foreach ( $topics as $topic ) : ?>

                <article class="contact-topics__card">

                    <div class="contact-topics__icon">

                        <?php
                        echo esc_html(
                            $topic['icon']
                        );
                        ?>

                    </div>


                    <h3>
                        <?php
                        echo esc_html(
                            $topic['title']
                        );
                        ?>
                    </h3>


                    <p>
                        <?php
                        echo esc_html(
                            $topic['description']
                        );
                        ?>
                    </p>


                    <span
                        class="contact-topics__card-line"
                        aria-hidden="true"
                    ></span>

                </article>

            <?php endforeach; ?>

        </div>

    </div>

</section>