<?php
/**
 * Hero Buttons
 *
 * @package Greshma_Portfolio
 */

defined( 'ABSPATH' ) || exit;

$theme_uri = get_template_directory_uri();
?>

<div class="hero__buttons">

    <!-- Primary Button -->
<a
    href="<?php echo esc_url( home_url( '/my-paths/' ) ); ?>"
    class="hero-btn hero-btn--primary"
>

    <span class="hero-btn__text">

        <?php esc_html_e( 'Explore My Journey', 'greshma' ); ?>

    </span>

    <span class="hero-btn__icon">

        <img
            src="<?php echo esc_url(
                $theme_uri . '/assets/images/hero/button-leaf.png'
            ); ?>"
            alt=""
            loading="lazy"
            decoding="async"
        >

    </span>

</a>


    <!-- Secondary Button -->

    <a
        href="#about"
        class="hero-btn hero-btn--secondary"
        aria-label="Discover My Paths"
    >

        <span class="hero-btn__text">

            Discover My Paths

        </span>

        <span class="hero-btn__circle">

            →

        </span>

    </a>

</div>


<!-- Scroll Indicator -->

<a
    href="#paths"
    class="hero-scroll"
    aria-label="Scroll to next section"
>

    <img
        src="<?php echo esc_url( $theme_uri . '/assets/images/hero/scroll-indicator.png' ); ?>"
        alt=""
        loading="lazy"
        decoding="async"
    >

    <span>

        Scroll to explore

    </span>

</a>