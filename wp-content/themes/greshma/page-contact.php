<?php
/**
 * Contact Page.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="contact-page">

    <?php
    get_template_part(
        'template-parts/contact/contact-hero'
    );

    get_template_part(
    'template-parts/contact/contact-form'
);

get_template_part(
    'template-parts/contact/contact-topics'
);

get_template_part(
    'template-parts/contact/contact-newsletter'
);
    ?>

</main>

<?php
get_footer();