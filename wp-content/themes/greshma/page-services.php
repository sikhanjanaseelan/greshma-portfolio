<?php
/**
 * Services Page.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="services-page">

    <?php
    get_template_part(
        'template-parts/services/services-hero'
    );
    get_template_part(
    'template-parts/services/services-offer'
);

get_template_part(
    'template-parts/services/services-approach'
);
get_template_part(
    'template-parts/services/services-cta'
);

get_template_part(
    'template-parts/services/services-work-with'
);

get_template_part(
    'template-parts/services/services-kind-words'
);
    ?>

</main>

<?php
get_footer();