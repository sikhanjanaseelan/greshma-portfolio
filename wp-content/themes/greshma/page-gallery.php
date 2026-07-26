<?php
/**
 * Gallery Page.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="gallery-page">

    <?php
    get_template_part(
        'template-parts/gallery/gallery-hero'
    );

    get_template_part(
    'template-parts/gallery/gallery-filters'
);
get_template_part(
    'template-parts/gallery/gallery-grid'
);

get_template_part(
        'template-parts/gallery/gallery-quote'
    );
    ?>


</main>

<?php
get_footer();