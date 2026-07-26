<?php
/**
 * Speaking Page.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="speaking-page">

    <?php
    get_template_part(
        'template-parts/speaking/speaking-hero'
    );

    get_template_part(
    'template-parts/speaking/speaking-values'
);
get_template_part(
    'template-parts/speaking/speaking-topics'
);

get_template_part(
    'template-parts/speaking/speaking-events'
);
get_template_part(
    'template-parts/speaking/speaking-testimonials'
);
get_template_part(
    'template-parts/speaking/speaking-media-kit'
);
get_template_part(
    'template-parts/speaking/speaking-cta'
);
    ?>

</main>

<?php
get_footer();