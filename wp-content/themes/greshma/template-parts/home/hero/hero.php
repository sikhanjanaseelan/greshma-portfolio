<?php
/**
 * Hero Section
 *
 * @package Greshma_Portfolio
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="hero" id="hero">

    <div class="hero__background">

        <img
            src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero/hero-bg.png' ); ?>"
            alt=""
            class="hero__background-image"
            loading="eager"
            decoding="async"
        >

        <div class="hero__overlay"></div>

    </div>

    <div class="site-container">

        <div class="hero__wrapper">

            <div class="hero__left">

                <?php
                get_template_part(
                    'template-parts/home/hero/hero-content'
                );
                ?>

                <?php
                get_template_part(
                    'template-parts/home/hero/hero-buttons'
                );
                ?>

            </div>

            <div class="hero__right">

                <div class="hero__image-wrapper">

                    <img
                        src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero/hero-person.png' ); ?>"
                        alt="Greshma Pious Raju"
                        class="hero__person"
                        loading="eager"
                        decoding="async"
                    >

                    <?php
                    get_template_part(
                        'template-parts/home/hero/hero-quote'
                    );
                    ?>

                </div>

            </div>

        </div>

    </div>

    <?php
    get_template_part(
        'template-parts/home/hero/hero-social'
    );
    ?>

</section>