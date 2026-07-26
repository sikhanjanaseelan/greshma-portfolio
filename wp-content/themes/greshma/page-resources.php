<?php
/**
 * Resources Page.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="resources-page">

    <?php

    get_template_part(
        'template-parts/resources/resources-hero'
    );

    get_template_part(
        'template-parts/resources/resources-categories'
    );

    get_template_part(
    'template-parts/resources/resources-featured'
);

get_template_part(
    'template-parts/resources/resources-browse'
);
get_template_part(
    'template-parts/resources/resources-values'
);

get_template_part(
    'template-parts/resources/resources-newsletter'
);

    ?>

</main>

<?php
get_footer();