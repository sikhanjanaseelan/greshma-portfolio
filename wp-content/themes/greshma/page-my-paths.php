<?php
/**
 * My Paths Page.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="my-paths-page">

    <?php
    get_template_part(
        'template-parts/my-paths/my-paths-hero'
    );
    get_template_part(
    'template-parts/my-paths/my-paths-moments'
);
get_template_part(
    'template-parts/my-paths/my-paths-impact'
);
get_template_part(
    'template-parts/my-paths/my-paths-cta'
);
    ?>

</main>

<?php
get_footer();