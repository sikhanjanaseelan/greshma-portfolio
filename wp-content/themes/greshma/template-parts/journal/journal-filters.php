<?php
/**
 * Journal Page — Filters.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$filters = [
    'all'                    => 'All',
    'thoughts-reflections'   => 'Thoughts & Reflections',
    'stories-print'          => 'Stories in Print',
    'media-interviews'       => 'Media & Interviews',
    'linkedin-insights'      => 'LinkedIn Insights',
    'events-talks'           => 'Events & Talks',
    'research-reports'       => 'Research & Reports',
];
?>

<section class="journal-filters">

    <div class="container">

        <div
            class="journal-filters__bar"
            data-journal-filter-bar
        >

            <?php foreach ( $filters as $key => $label ) : ?>

                <button
                    type="button"
                    class="journal-filter<?php echo 'all' === $key ? ' is-active' : ''; ?>"
                    data-journal-filter="<?php echo esc_attr( $key ); ?>"
                >
                    <?php echo esc_html( $label ); ?>
                </button>

            <?php endforeach; ?>

        </div>

    </div>

</section>