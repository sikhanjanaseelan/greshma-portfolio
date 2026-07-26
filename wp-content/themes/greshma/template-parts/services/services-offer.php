<?php
/**
 * Services Page — What I Offer.
 *
 * IMAGE ASSETS REQUIRED LATER:
 *
 * assets/images/services/services-offer-01.png
 * assets/images/services/services-offer-02.png
 * assets/images/services/services-offer-03.png
 * assets/images/services/services-offer-04.png
 * assets/images/services/services-offer-05.png
 * assets/images/services/services-offer-06.png
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$services = [

    [
        'title' => 'Facilitation & Dialogue Design',
        'description' => 'Creating safe, inclusive spaces for meaningful conversations that heal divides and build trust.',
        'items' => [
            'Dialogue Circles',
            'Community Conversations',
            'Interfaith & Intercultural Dialogue',
            'Restorative Dialogue Processes',
            'Custom Facilitation Programs',
        ],
        'image' => 'services-offer-01.png',
        'icon'  => '◎',
    ],

    [
        'title' => 'Youth Leadership & Mentorship',
        'description' => 'Empowering young people to discover their voice, lead with empathy and drive change.',
        'items' => [
            'Leadership Programs',
            'Mentorship & Guidance',
            'Youth Facilitation Training',
            'Peer Leadership Circles',
            'Confidence & Communication Skills',
        ],
        'image' => 'services-offer-02.png',
        'icon'  => '◇',
    ],

    [
        'title' => 'Climate Education & Sustainability',
        'description' => 'Building awareness, responsibility and action for a more just and sustainable world.',
        'items' => [
            'Climate Education Programs',
            'Youth Climate Action Projects',
            'Sustainability Workshops',
            'Eco-Literacy & Awareness Sessions',
            'Green Skills & Behaviour Change',
        ],
        'image' => 'services-offer-03.png',
        'icon'  => '◉',
    ],

    [
        'title' => 'Peacebuilding & Conflict Transformation',
        'description' => 'Supporting communities to transform conflict, build peace and strengthen social cohesion.',
        'items' => [
            'Peace Circles',
            'Conflict Resolution Workshops',
            'Community Peace Initiatives',
            'Trauma-Informed Approaches',
            'Peace Education for Youth',
        ],
        'image' => 'services-offer-04.png',
        'icon'  => '❧',
    ],

    [
        'title' => 'Community Engagement & Capacity Building',
        'description' => 'Strengthening communities through participation, collaboration and shared leadership.',
        'items' => [
            'Community Mobilisation',
            'Stakeholder Engagement',
            'Capacity Building Workshops',
            'Volunteer Management',
            'Participatory Planning',
        ],
        'image' => 'services-offer-05.png',
        'icon'  => '♧',
    ],

    [
        'title' => 'Consulting & Program Development',
        'description' => 'Designing and strengthening impactful programs aligned with your goals and values.',
        'items' => [
            'Program Design & Strategy',
            'Impact Planning & Evaluation',
            'Curriculum Development',
            'Policy & Advocacy Support',
            'Training & Capacity Development',
        ],
        'image' => 'services-offer-06.png',
        'icon'  => '✎',
    ],

];
?>

<section class="services-offer">

    <div class="container">

        <!-- ==========================================
             HEADING
        =========================================== -->

        <div class="services-offer__heading">

            <h2>
                What I Offer
            </h2>

            <div
                class="services-offer__heading-decoration"
                aria-hidden="true"
            >
                <span></span>
                <span>❧</span>
                <span></span>
            </div>

        </div>


        <!-- ==========================================
             SERVICE GRID
        =========================================== -->

        <div class="services-offer__grid">

            <?php foreach ( $services as $service ) : ?>

                <article class="services-offer-card">


                    <!-- Background image placeholder -->

                    <!--
                    FINAL IMAGE:
                    assets/images/services/<?php
                    echo esc_html( $service['image'] );
                    ?>
                    -->

                    <div class="services-offer-card__background">

                        <span>
                            <?php
                            echo esc_html(
                                $service['image']
                            );
                            ?>
                        </span>

                    </div>


                    <div
                        class="services-offer-card__overlay"
                        aria-hidden="true"
                    ></div>


                    <div class="services-offer-card__inner">


                        <!-- HEADER -->

                        <div class="services-offer-card__header">

                            <div class="services-offer-card__icon">

                                <?php
                                echo esc_html(
                                    $service['icon']
                                );
                                ?>

                            </div>


                            <h3>
                                <?php
                                echo esc_html(
                                    $service['title']
                                );
                                ?>
                            </h3>

                        </div>


                        <!-- DESCRIPTION -->

                        <p class="services-offer-card__description">

                            <?php
                            echo esc_html(
                                $service['description']
                            );
                            ?>

                        </p>


                        <!-- LIST -->

                        <ul class="services-offer-card__list">

                            <?php foreach ( $service['items'] as $item ) : ?>

                                <li>

                                    <span
                                        aria-hidden="true"
                                        class="services-offer-card__list-icon"
                                    >
                                        ❧
                                    </span>

                                    <span>
                                        <?php
                                        echo esc_html(
                                            $item
                                        );
                                        ?>
                                    </span>

                                </li>

                            <?php endforeach; ?>

                        </ul>


                        <!-- LINK -->

                        <a
                            href="#"
                            class="services-offer-card__link"
                        >
                            Learn More

                            <span aria-hidden="true">
                                →
                            </span>
                        </a>

                    </div>

                </article>

            <?php endforeach; ?>

        </div>

    </div>

</section>