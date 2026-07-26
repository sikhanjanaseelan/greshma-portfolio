<?php
/**
 * Projects Page.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="projects-page">

    <?php
    get_template_part(
        'template-parts/projects/projects-hero'
    );

    get_template_part(
    'template-parts/projects/projects-initiative'
);
?>
    <section class="projects-work-grid">

        <div class="container">

            <div class="projects-work-grid__layout">

                <?php
                get_template_part(
                    'template-parts/projects/projects-organizations'
                );

                get_template_part(
                    'template-parts/projects/projects-collaborations'
                );
                ?>

            </div>

        </div>

    </section>
   
    <section class="projects-bottom-grid">

    <div class="container">

        <div class="projects-bottom-grid__layout">

            <?php
            get_template_part(
                'template-parts/projects/projects-case-study'
            );

            get_template_part(
                'template-parts/projects/projects-media'
            );
            ?>

        </div>

    </div>

</section>

<?php
get_template_part(
    'template-parts/projects/projects-cta'
);
?>

</main>

<?php
get_footer();