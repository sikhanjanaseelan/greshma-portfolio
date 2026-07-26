<?php
/**
 * About Page.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main class="about-page">

    <?php
    get_template_part( 'template-parts/about/about-hero' );

    get_template_part( 'template-parts/about/about-story' );

    get_template_part( 'template-parts/about/about-values' );

    get_template_part( 'template-parts/about/about-journey' );

    get_template_part( 'template-parts/about/about-impact' );

    get_template_part( 'template-parts/about/about-leadership' );

    get_template_part( 'template-parts/about/about-purpose' );
    ?>

</main>

<?php get_footer(); ?>