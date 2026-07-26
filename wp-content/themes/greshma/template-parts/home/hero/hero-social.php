<?php
/**
 * Hero Social Links
 *
 * @package Greshma_Portfolio
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="hero-social">

    <span class="hero-social__label">
        Connect
    </span>

    <div class="hero-social__links">

        <a
            href="https://www.linkedin.com/"
            class="hero-social__link"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="LinkedIn"
        >
            <?php get_template_part( 'template-parts/icons/linkedin' ); ?>
        </a>

        <a
            href="https://www.instagram.com/"
            class="hero-social__link"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="Instagram"
        >
            <?php get_template_part( 'template-parts/icons/instagram' ); ?>
        </a>

        <a
            href="https://www.youtube.com/"
            class="hero-social__link"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="YouTube"
        >
            <?php get_template_part( 'template-parts/icons/youtube' ); ?>
        </a>

        <a
            href="mailto:hello@greshma.me"
            class="hero-social__link"
            aria-label="Email"
        >
            <?php get_template_part( 'template-parts/icons/email' ); ?>
        </a>

    </div>

</div>