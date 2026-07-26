<?php
get_header();
?>

<main>

    <?php get_template_part( 'template-parts/home/hero/hero' ); ?>

    <?php get_template_part( 'template-parts/home/paths/paths' ); ?>
  <?php  get_template_part( 'template-parts/home/about/about' ); ?>
  <?php get_template_part( 'template-parts/home/impact/impact' ); ?>
 <?php
get_template_part( 'template-parts/home/initiatives/initiatives' );
?>
<?php
get_template_part( 'template-parts/home/stories/stories' ); 

get_template_part( 'template-parts/home/journey/journey' );

get_template_part( 'template-parts/home/testimonials/testimonials' );
get_template_part( 'template-parts/home/speaking/speaking' );
get_template_part(
    'template-parts/home/journal/journal'
);
get_template_part(
    'template-parts/home/cta/cta'
);
?>
</main>

<?php
get_footer();
