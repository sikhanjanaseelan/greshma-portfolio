<?php
/**
 * Template Name: Events
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="site-main events-page">

    <?php
    get_template_part(
        'template-parts/events/events-hero'
    );

//     get_template_part(
//     'template-parts/events/events-filters'
// );



get_template_part(
    'template-parts/events/events-upcoming'
);

get_template_part(
    'template-parts/events/events-past'
);

get_template_part(
    'template-parts/events/events-cta'
);
    ?>

</main>

<?php
get_footer();