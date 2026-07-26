<?php
/**
 * Workshops & Trainings Page
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="site-main workshops-page">

    <?php
    get_template_part(
        'template-parts/workshops/workshops-hero'
    );

    get_template_part(
        'template-parts/workshops/workshops-categories'
    );

    get_template_part(
        'template-parts/workshops/workshops-featured'
    );

    get_template_part(
        'template-parts/workshops/workshops-audience'
    );

    get_template_part(
        'template-parts/workshops/workshops-process'
    );

    get_template_part(
        'template-parts/workshops/workshops-testimonials'
    );

    get_template_part(
        'template-parts/workshops/workshops-cta'
    );
    ?>

</main>

<?php
get_footer();