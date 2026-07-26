<?php
/**
 * Projects Page — Projects & Collaborations.
 *
 * IMAGE ASSETS REQUIRED LATER:
 *
 * assets/images/projects/projects-collab-01.png
 * assets/images/projects/projects-collab-02.png
 * assets/images/projects/projects-collab-03.png
 * assets/images/projects/projects-collab-04.png
 * assets/images/projects/projects-collab-05.png
 * assets/images/projects/projects-collab-06.png
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$projects = [

    [
        'title'    => 'Youth Climate Dialogue',
        'location' => 'India',
        'year'     => '2024',
        'image'    => 'projects-collab-01.png',
        'category' => 'Climate Action',
    ],

    [
        'title'    => 'Interfaith Leadership Workshop',
        'location' => 'Kenya',
        'year'     => '2024',
        'image'    => 'projects-collab-02.png',
        'category' => 'Peacebuilding',
    ],

    [
        'title'    => 'Peace Education Program',
        'location' => 'Costa Rica',
        'year'     => '2023',
        'image'    => 'projects-collab-03.png',
        'category' => 'Dialogue',
    ],

    [
        'title'    => 'Climate Action Summit',
        'location' => 'Thailand',
        'year'     => '2023',
        'image'    => 'projects-collab-04.png',
        'category' => 'Climate Action',
    ],

    [
        'title'    => 'Youth Peace Forum',
        'location' => 'Portugal',
        'year'     => '2022',
        'image'    => 'projects-collab-05.png',
        'category' => 'Youth',
    ],

    [
        'title'    => 'Community Dialogue Series',
        'location' => 'Multiple Countries',
        'year'     => 'Ongoing',
        'image'    => 'projects-collab-06.png',
        'category' => 'Dialogue',
    ],

];
?>

<div class="projects-collaborations">

    <!-- ==========================================
         SECTION LABEL
    =========================================== -->

    <div class="projects-subsection-label">
        3. Projects &amp; Collaborations
    </div>


    <!-- ==========================================
         FILTER PILLS
    =========================================== -->

    <div class="projects-collaborations__filters">

        <button
            type="button"
            class="projects-filter is-active"
        >
            All
        </button>

        <button
            type="button"
            class="projects-filter"
        >
            Climate Action
        </button>

        <button
            type="button"
            class="projects-filter"
        >
            Peacebuilding
        </button>

        <button
            type="button"
            class="projects-filter"
        >
            Dialogue
        </button>

        <button
            type="button"
            class="projects-filter"
        >
            Youth
        </button>

        <button
            type="button"
            class="projects-filter"
        >
            Training
        </button>

    </div>


    <!-- ==========================================
         PROJECT GRID
    =========================================== -->

    <div class="projects-collaborations__grid">

        <?php foreach ( $projects as $project ) : ?>

            <article class="projects-collaboration-card">

                <!--
                FINAL IMAGE:
                assets/images/projects/<?php
                echo esc_html( $project['image'] );
                ?>
                -->

                <div class="projects-collaboration-card__image">

                    <span>
                        <?php
                        echo esc_html(
                            $project['image']
                        );
                        ?>
                    </span>

                </div>


                <div class="projects-collaboration-card__content">

                    <h3>
                        <?php
                        echo esc_html(
                            $project['title']
                        );
                        ?>
                    </h3>


                    <div class="projects-collaboration-card__meta">

                        <span>
                            <?php
                            echo esc_html(
                                $project['location']
                            );
                            ?>
                        </span>

                        <span>
                            <?php
                            echo esc_html(
                                $project['year']
                            );
                            ?>
                        </span>

                    </div>


                    <a href="#">
                        View Project
                        <span aria-hidden="true">→</span>
                    </a>

                </div>

            </article>

        <?php endforeach; ?>

    </div>

</div>