<?php
/**
 * Journal Page.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="journal-page">

    <?php

    /* Hero */
    get_template_part(
        'template-parts/journal/journal-hero'
    );

    /* Filters */
    get_template_part(
        'template-parts/journal/journal-filters'
    );

    /*
     * Main Journal area.
     *
     * This contains:
     * - Featured
     * - Latest Reflections
     * - Future Stories in Print
     * - Future LinkedIn / Media
     * - Sidebar
     */
    get_template_part(
        'template-parts/journal/journal-content'
    );

    get_template_part(
    'template-parts/journal/journal-newsletter'
);

    ?>

</main>

<?php
get_footer();