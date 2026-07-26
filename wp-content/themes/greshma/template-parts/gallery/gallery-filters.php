<?php
/**
 * Gallery Page — Filters.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$filters = [
    'all'                  => 'All',
    'programs-workshops'   => 'Programs & Workshops',
    'dialogue-circles'     => 'Dialogue Circles',
    'conferences-events'   => 'Conferences & Events',
    'youth-leadership'     => 'Youth Leadership',
    'community-engagement' => 'Community Engagement',
    'travel-field-visits'  => 'Travel & Field Visits',
];
?>

<section class="gallery-filters">

    <div class="container">

        <div
            class="gallery-filters__bar"
            data-gallery-filter-bar
        >

            <!-- ==========================================
                 FILTER PILLS
            =========================================== -->

            <div class="gallery-filters__categories">

                <?php foreach ( $filters as $key => $label ) : ?>

                    <button
                        type="button"
                        class="gallery-filter<?php echo 'all' === $key ? ' is-active' : ''; ?>"
                        data-gallery-filter="<?php echo esc_attr( $key ); ?>"
                    >
                        <?php echo esc_html( $label ); ?>
                    </button>

                <?php endforeach; ?>

            </div>


            <!-- ==========================================
                 VIEW TOGGLE
            =========================================== -->

            <div class="gallery-filters__view">

                <button
                    type="button"
                    class="gallery-view-toggle is-active"
                    data-gallery-view="grid"
                    aria-label="Grid view"
                    title="Grid view"
                >
                    <span aria-hidden="true">
                        ▦
                    </span>
                </button>


                <button
                    type="button"
                    class="gallery-view-toggle"
                    data-gallery-view="list"
                    aria-label="List view"
                    title="List view"
                >
                    <span aria-hidden="true">
                        ☷
                    </span>
                </button>

            </div>

        </div>

    </div>

</section>