<?php
/**
 * Hero Quote Card
 *
 * @package Greshma_Portfolio
 */

defined( 'ABSPATH' ) || exit;

$theme_uri = get_template_directory_uri();
?>

<div class="hero-quote">

    <div class="hero-quote__icon">

        <img
            src="<?php echo esc_url( $theme_uri . '/assets/images/hero/quote-icon.png' ); ?>"
            alt=""
            loading="lazy"
            decoding="async"
        >

    </div>

    <div class="hero-quote__content">

        <p class="hero-quote__text">

            Peace begins with listening, grows through compassion,
            and transforms the world through collective action.

        </p>

        <div class="hero-quote__author">

            <span class="hero-quote__name">
                Greshma Pious Raju
            </span>

            <span class="hero-quote__designation">
                Peacebuilder & Social Innovator
            </span>

        </div>

    </div>

    <div class="hero-quote__leaf">

        <img
            src="<?php echo esc_url( $theme_uri . '/assets/images/hero/quote-leaf.png' ); ?>"
            alt=""
            loading="lazy"
            decoding="async"
        >

    </div>

</div>