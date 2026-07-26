<?php
/**
 * Impacts Page.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="impacts-page">

    <?php
    get_template_part(
        'template-parts/impacts/impacts-hero'
    );

    get_template_part(
    'template-parts/impacts/impacts-recognition'
);

get_template_part(
    'template-parts/impacts/impacts-stats'
);

get_template_part(
    'template-parts/impacts/impacts-stories'
);

get_template_part(
    'template-parts/impacts/impacts-map'
);
get_template_part(
    'template-parts/impacts/impacts-partners'
);

get_template_part(
    'template-parts/impacts/impacts-voices'
);

get_template_part(
    'template-parts/impacts/impacts-cta'
);
    ?>

</main>

<?php
get_footer();