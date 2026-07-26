<?php
/**
 * Resources Page — Browse All Resources.
 *
 * PNG placeholders:
 *
 * assets/images/resources/resource-grid-01.png
 * assets/images/resources/resource-grid-02.png
 * assets/images/resources/resource-grid-03.png
 * assets/images/resources/resource-grid-04.png
 * assets/images/resources/resource-grid-05.png
 * assets/images/resources/resource-grid-06.png
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;


$resources = [

    [
        'type'        => 'Guide',
        'category'    => 'youth-education',
        'title'       => 'Youth Leadership Facilitation Guide',
        'description' => 'Practical tools and activities for supporting young people through meaningful leadership experiences.',
        'format'      => 'PDF',
        'size'        => '2.1 MB',
        'image'       => 'resource-grid-01.png',
    ],

    [
        'type'        => 'Toolkit',
        'category'    => 'peacebuilding',
        'title'       => 'Dialogue Circle Toolkit',
        'description' => 'A simple toolkit for facilitating safe, inclusive, and meaningful dialogue circles.',
        'format'      => 'PDF',
        'size'        => '3.4 MB',
        'image'       => 'resource-grid-02.png',
    ],

    [
        'type'        => 'Activity Pack',
        'category'    => 'climate-action',
        'title'       => 'Climate Conversations Activity Pack',
        'description' => 'Participatory activities that help young people explore climate concerns and community solutions.',
        'format'      => 'PDF',
        'size'        => '1.9 MB',
        'image'       => 'resource-grid-03.png',
    ],

    [
        'type'        => 'Publication',
        'category'    => 'interfaith-dialogue',
        'title'       => 'Interfaith Dialogue for Young Leaders',
        'description' => 'An introductory resource for creating respectful dialogue across faiths and cultures.',
        'format'      => 'PDF',
        'size'        => '2.8 MB',
        'image'       => 'resource-grid-04.png',
    ],

    [
        'type'        => 'Template',
        'category'    => 'facilitation-tools',
        'title'       => 'Workshop Planning Template',
        'description' => 'A reusable planning framework for designing engaging workshops and community conversations.',
        'format'      => 'DOC',
        'size'        => '850 KB',
        'image'       => 'resource-grid-05.png',
    ],

    [
        'type'        => 'Report',
        'category'    => 'research-reports',
        'title'       => 'Youth Participation & Community Impact',
        'description' => 'Insights from youth-led initiatives, dialogue programs, and community engagement experiences.',
        'format'      => 'PDF',
        'size'        => '4.6 MB',
        'image'       => 'resource-grid-06.png',
    ],

];
?>

<section
    class="resources-browse"
    id="resources-browse"
>

    <div class="container">


        <!-- ==========================================
             SECTION HEADING
        =========================================== -->

        <div class="resources-browse__heading">

            <div>

                <span class="resources-browse__eyebrow">
                    Resource Library
                </span>

                <h2>
                    Browse All Resources
                </h2>

            </div>


            <p>
                Explore practical resources created for learning,
                dialogue, facilitation, and community action.
            </p>

        </div>


        <!-- ==========================================
             MAIN LAYOUT
        =========================================== -->

        <div class="resources-browse__layout">


            <!-- ======================================
                 LEFT FILTER SIDEBAR
            ======================================= -->

            <aside class="resources-filter">


                <!-- TYPE -->

                <div class="resources-filter__group">

                    <h3>
                        Filter by Type
                    </h3>


                    <div class="resources-filter__options">

                        <label class="resources-filter__option">

                            <input
                                type="radio"
                                name="resource-type"
                                value="all"
                                checked
                            >

                            <span class="resources-filter__radio"></span>

                            <span>
                                All
                            </span>

                        </label>


                        <label class="resources-filter__option">

                            <input
                                type="radio"
                                name="resource-type"
                                value="guide"
                            >

                            <span class="resources-filter__radio"></span>

                            <span>
                                Guides
                            </span>

                        </label>


                        <label class="resources-filter__option">

                            <input
                                type="radio"
                                name="resource-type"
                                value="toolkit"
                            >

                            <span class="resources-filter__radio"></span>

                            <span>
                                Toolkits
                            </span>

                        </label>


                        <label class="resources-filter__option">

                            <input
                                type="radio"
                                name="resource-type"
                                value="activity-pack"
                            >

                            <span class="resources-filter__radio"></span>

                            <span>
                                Activity Packs
                            </span>

                        </label>


                        <label class="resources-filter__option">

                            <input
                                type="radio"
                                name="resource-type"
                                value="report"
                            >

                            <span class="resources-filter__radio"></span>

                            <span>
                                Reports
                            </span>

                        </label>


                        <label class="resources-filter__option">

                            <input
                                type="radio"
                                name="resource-type"
                                value="publication"
                            >

                            <span class="resources-filter__radio"></span>

                            <span>
                                Publications
                            </span>

                        </label>


                        <label class="resources-filter__option">

                            <input
                                type="radio"
                                name="resource-type"
                                value="template"
                            >

                            <span class="resources-filter__radio"></span>

                            <span>
                                Templates
                            </span>

                        </label>

                    </div>

                </div>


                <!-- FORMAT -->

                <div class="resources-filter__group">

                    <h3>
                        Format
                    </h3>


                    <div class="resources-filter__formats">

                        <button
                            type="button"
                            class="resources-format"
                            data-resource-format="pdf"
                        >
                            PDF
                        </button>


                        <button
                            type="button"
                            class="resources-format"
                            data-resource-format="ppt"
                        >
                            PPT
                        </button>


                        <button
                            type="button"
                            class="resources-format"
                            data-resource-format="video"
                        >
                            Video
                        </button>


                        <button
                            type="button"
                            class="resources-format"
                            data-resource-format="doc"
                        >
                            DOC
                        </button>

                    </div>

                </div>


                <!-- RESET -->

                <button
                    type="button"
                    class="resources-filter__reset"
                >
                    Reset Filters
                </button>

            </aside>


            <!-- ======================================
                 RIGHT RESOURCE AREA
            ======================================= -->

            <div class="resources-library">


                <!-- SEARCH + SORT -->

                <div class="resources-library__toolbar">


                    <!-- SEARCH -->

                    <label class="resources-library__search">

                        <span class="screen-reader-text">
                            Search Resources
                        </span>


                        <svg
                            viewBox="0 0 24 24"
                            aria-hidden="true"
                        >
                            <circle
                                cx="10.5"
                                cy="10.5"
                                r="6.5"
                            />

                            <path d="M16 16l5 5"/>
                        </svg>


                        <input
                            type="search"
                            placeholder="Search resources..."
                            data-resource-search
                        >

                    </label>


                    <!-- SORT -->

                    <label class="resources-library__sort">

                        <span>
                            Sort by
                        </span>


                        <select data-resource-sort>

                            <option value="recent">
                                Most Recent
                            </option>

                            <option value="az">
                                A–Z
                            </option>

                            <option value="type">
                                Resource Type
                            </option>

                        </select>

                    </label>

                </div>


                <!-- ==================================
                     RESOURCE GRID
                =================================== -->

                <div
                    class="resources-library__grid"
                    data-resource-grid
                >

                    <?php foreach ( $resources as $resource ) : ?>

                        <article
                            class="resource-library-card"
                            data-resource-item
                            data-type="<?php
                            echo esc_attr(
                                sanitize_title(
                                    $resource['type']
                                )
                            );
                            ?>"
                            data-category="<?php
                            echo esc_attr(
                                $resource['category']
                            );
                            ?>"
                            data-format="<?php
                            echo esc_attr(
                                strtolower(
                                    $resource['format']
                                )
                            );
                            ?>"
                        >


                            <!-- IMAGE -->

                            <div class="resource-library-card__image">

                                <div class="resource-library-card__placeholder">

                                    <span>
                                        <?php
                                        echo esc_html(
                                            $resource['image']
                                        );
                                        ?>
                                    </span>

                                </div>


                                <span class="resource-library-card__badge">

                                    <?php
                                    echo esc_html(
                                        $resource['type']
                                    );
                                    ?>

                                </span>

                            </div>


                            <!-- CONTENT -->

                            <div class="resource-library-card__content">

                                <h3>

                                    <?php
                                    echo esc_html(
                                        $resource['title']
                                    );
                                    ?>

                                </h3>


                                <p>

                                    <?php
                                    echo esc_html(
                                        $resource['description']
                                    );
                                    ?>

                                </p>


                                <div class="resource-library-card__footer">

                                    <div class="resource-library-card__meta">

                                        <span>

                                            <?php
                                            echo esc_html(
                                                $resource['format']
                                            );
                                            ?>

                                        </span>


                                        <span
                                            class="resource-library-card__dot"
                                            aria-hidden="true"
                                        ></span>


                                        <span>

                                            <?php
                                            echo esc_html(
                                                $resource['size']
                                            );
                                            ?>

                                        </span>

                                    </div>


                                    <a
                                        href="#"
                                        class="resource-library-card__download"
                                        aria-label="<?php
                                        echo esc_attr(
                                            'Download ' .
                                            $resource['title']
                                        );
                                        ?>"
                                    >

                                        <svg
                                            viewBox="0 0 24 24"
                                            aria-hidden="true"
                                        >
                                            <path d="M12 3v12"/>
                                            <path d="m7 10 5 5 5-5"/>
                                            <path d="M5 20h14"/>
                                        </svg>

                                    </a>

                                </div>

                            </div>

                        </article>

                    <?php endforeach; ?>

                </div>


                <!-- LOAD MORE -->

                <div
                    class="resources-library__more"
                    data-resource-more-wrap
                >

                    <button
                        type="button"
                        class="resources-library__more-button"
                        data-resource-load-more
                    >

                        Load More Resources

                        <span aria-hidden="true">
                            ↓
                        </span>

                    </button>

                </div>

            </div>

        </div>

    </div>

</section>