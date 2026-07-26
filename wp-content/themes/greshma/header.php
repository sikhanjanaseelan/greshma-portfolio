<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<header
    class="site-header"
    id="site-header"
>
    <div class="container">

        <div class="header-wrapper">

            <!-- Logo -->
            <div class="site-logo">

                <?php if (has_custom_logo()) : ?>

                    <?php the_custom_logo(); ?>

                <?php else : ?>

                    <a
                        href="<?php echo esc_url(home_url('/')); ?>"
                        class="text-logo"
                    >
                        <?php bloginfo('name'); ?>
                    </a>

                <?php endif; ?>

            </div>

            <!-- Desktop Navigation -->
            <nav
                class="main-navigation"
                aria-label="<?php esc_attr_e(
                    'Primary navigation',
                    'greshma-portfolio'
                ); ?>"
            >
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'main-menu',
                    'fallback_cb'    => false,
                ]);
                ?>
            </nav>

            <!-- Header CTA -->
            <div class="header-action">

                <a
                    href="<?php echo esc_url(
                        home_url('/contact/')
                    ); ?>"
                    class="header-cta"
                >
                    <span>Let's Connect</span>

                    <span
                        class="header-cta-icon"
                        aria-hidden="true"
                    >
                        ↗
                    </span>
                </a>

            </div>

            <!-- Mobile Menu Button -->
            <button
                class="mobile-menu-toggle"
                type="button"
                aria-label="<?php esc_attr_e(
                    'Open navigation menu',
                    'greshma-portfolio'
                ); ?>"
                aria-expanded="false"
                aria-controls="mobile-navigation"
            >
                <span></span>
                <span></span>
                <span></span>
            </button>

        </div>

    </div>
</header>

<!-- Mobile Menu Overlay -->
<div
    class="mobile-menu-overlay"
    aria-hidden="true"
></div>

<!-- Mobile Slide-Out Menu -->
<aside
    class="mobile-navigation"
    id="mobile-navigation"
    aria-hidden="true"
>
    <div class="mobile-navigation-header">

        <div class="mobile-navigation-logo">

            <?php if (has_custom_logo()) : ?>

                <?php the_custom_logo(); ?>

            <?php else : ?>

                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php bloginfo('name'); ?>
                </a>

            <?php endif; ?>

        </div>

        <button
            class="mobile-menu-close"
            type="button"
            aria-label="<?php esc_attr_e(
                'Close navigation menu',
                'greshma-portfolio'
            ); ?>"
        >
            <span></span>
            <span></span>
        </button>

    </div>

    <div class="mobile-navigation-content">

        <?php
        wp_nav_menu([
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => 'mobile-menu',
            'fallback_cb'    => false,
        ]);
        ?>

        <div class="mobile-navigation-action">

            <a
                href="<?php echo esc_url(
                    home_url('/contact/')
                ); ?>"
                class="mobile-cta"
            >
                Let's Connect
                <span aria-hidden="true">↗</span>
            </a>

        </div>

        <div class="mobile-navigation-footer">

            <p>
                Creating spaces for dialogue, dignity and a
                sustainable future.
            </p>

        </div>

    </div>
</aside>