<?php
/**
 * Greshma Portfolio theme functions.
 *
 * @package GreshmaPortfolio
 */

if (! defined('ABSPATH')) {
    exit;
}

define('GRESHMA_THEME_VERSION', '1.0.0');
define('GRESHMA_THEME_DIR', get_template_directory());
define('GRESHMA_THEME_URI', get_template_directory_uri());

function greshma_theme_setup(): void
{
    load_theme_textdomain(
        'greshma-portfolio',
        GRESHMA_THEME_DIR . '/languages'
    );

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
   add_theme_support('custom-logo', [
        'height'      => 120,
        'width'       => 320,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
    add_theme_support('editor-styles');
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ]);

    register_nav_menus([
        'primary' => __('Primary Menu', 'greshma-portfolio'),
        'footer'  => __('Footer Menu', 'greshma-portfolio'),
        'social'  => __('Social Links', 'greshma-portfolio'),
    ]);
}
add_action('after_setup_theme', 'greshma_theme_setup');

function greshma_enqueue_assets() {

$theme = wp_get_theme()->get('Version');

wp_enqueue_style(
'variables',
get_template_directory_uri().'/assets/css/variables.css',
[],
$theme
);

wp_enqueue_style(
'style',
get_template_directory_uri().'/assets/css/style.css',
['variables'],
$theme
);

wp_enqueue_style(
'header',
get_template_directory_uri().'/assets/css/header.css',
['style'],
$theme
);

wp_enqueue_style(
'footer',
get_template_directory_uri().'/assets/css/footer.css',
['style'],
$theme
);

wp_enqueue_style(
'components',
get_template_directory_uri().'/assets/css/components.css',
['style'],
$theme
);

wp_enqueue_style(
'home',
get_template_directory_uri().'/assets/css/home.css',
['style'],
$theme
);

wp_enqueue_style(
'pages',
get_template_directory_uri().'/assets/css/pages.css',
['style'],
$theme
);
wp_enqueue_style(
    'greshma-about',
    get_template_directory_uri() . '/assets/css/about.css',
    array( 'style' ),
    filemtime(
        get_template_directory() . '/assets/css/about.css'
    )
);
wp_enqueue_style(
    'greshma-my-paths',
    get_template_directory_uri() . '/assets/css/my-paths.css',
    array( 'style' ),
    filemtime(
        get_template_directory() . '/assets/css/my-paths.css'
    )
);
wp_enqueue_style(
    'greshma-projects',
    get_template_directory_uri() . '/assets/css/projects.css',
    array( 'style' ),
    filemtime(
        get_template_directory() . '/assets/css/projects.css'
    )
);

if ( is_page( 'projects' ) ) {

	wp_enqueue_script(
		'greshma-projects',
		GRESHMA_THEME_URI . '/assets/js/projects.js',
		array(),
		GRESHMA_THEME_VERSION,
		true
	);
}
if ( is_singular( 'greshma_project' ) ) {

	$single_project_css =
		GRESHMA_THEME_DIR . '/assets/css/single-project.css';

	if ( file_exists( $single_project_css ) ) {

		wp_enqueue_style(
			'greshma-single-project',
			GRESHMA_THEME_URI . '/assets/css/single-project.css',
			array( 'style' ),
			filemtime( $single_project_css )
		);
	}
}
wp_enqueue_style(
    'greshma-impacts',
    get_template_directory_uri() . '/assets/css/impacts.css',
    array( 'style' ),
    filemtime(
        get_template_directory() . '/assets/css/impacts.css'
    )
);
wp_enqueue_script(
    'greshma-services-testimonials',
    get_template_directory_uri()
        . '/assets/js/services-testimonials.js',
    array(),
    filemtime(
        get_template_directory()
            . '/assets/js/services-testimonials.js'
    ),
    true
);
wp_enqueue_style(
    'greshma-services',
    get_template_directory_uri() . '/assets/css/services.css',
    array( 'style' ),
    filemtime(
        get_template_directory() . '/assets/css/services.css'
    )
);
wp_enqueue_style(
    'greshma-contact',
    get_template_directory_uri() . '/assets/css/contact.css',
    array( 'style' ),
    filemtime(
        get_template_directory() . '/assets/css/contact.css'
    )
);

wp_enqueue_style(
    'greshma-gallery',
    get_template_directory_uri() . '/assets/css/gallery.css',
    array( 'style' ),
    filemtime(
        get_template_directory() . '/assets/css/gallery.css'
    )
);
wp_enqueue_script(
    'greshma-gallery',
    get_template_directory_uri() . '/assets/js/gallery.js',
    array(),
    filemtime(
        get_template_directory() . '/assets/js/gallery.js'
    ),
    true
);
wp_enqueue_style(
    'greshma-speaking',
    get_template_directory_uri() . '/assets/css/speaking.css',
    array( 'style' ),
    filemtime(
        get_template_directory() . '/assets/css/speaking.css'
    )
);
wp_enqueue_script(
    'greshma-speaking',
    get_template_directory_uri()
        . '/assets/js/speaking.js',
    array(),
    filemtime(
        get_template_directory()
            . '/assets/js/speaking.js'
    ),
    true
);

wp_enqueue_style(
    'greshma-journal',
    get_template_directory_uri() . '/assets/css/journal.css',
    array( 'style' ),
    filemtime(
        get_template_directory() . '/assets/css/journal.css'
    )
);

/* ==========================================================
   RESOURCES — PAGE + ARCHIVE + SINGLE
========================================================== */

if (
	is_page( 'resources' ) ||
	is_post_type_archive( 'greshma_resource' ) ||
	is_singular( 'greshma_resource' )
) {

	/* CSS */

	$resources_css =
		get_template_directory()
		. '/assets/css/resources.css';

	if ( file_exists( $resources_css ) ) {

		wp_enqueue_style(
			'greshma-resources',
			get_template_directory_uri()
			. '/assets/css/resources.css',
			array( 'style' ),
			filemtime( $resources_css )
		);
	}


	/* JavaScript */

	$resources_js =
		get_template_directory()
		. '/assets/js/resources.js';

	if ( file_exists( $resources_js ) ) {

		wp_enqueue_script(
			'greshma-resources',
			get_template_directory_uri()
			. '/assets/js/resources.js',
			array(),
			filemtime( $resources_js ),
			true
		);
	}
}

/* ==========================================================
   EVENTS — PAGE + ARCHIVE + SINGLE
========================================================== */

if (
	is_page( 'events' ) ||
	is_post_type_archive( 'greshma_event' ) ||
	is_singular( 'greshma_event' )
) {

	/* CSS */

	$events_css =
		get_template_directory()
		. '/assets/css/events.css';

	if ( file_exists( $events_css ) ) {

		wp_enqueue_style(
			'greshma-events',
			get_template_directory_uri()
			. '/assets/css/events.css',
			array( 'style' ),
			filemtime( $events_css )
		);
	}


	/* JavaScript */

	$events_js =
		get_template_directory()
		. '/assets/js/events.js';

	if ( file_exists( $events_js ) ) {

		wp_enqueue_script(
			'greshma-events',
			get_template_directory_uri()
			. '/assets/js/events.js',
			array(),
			filemtime( $events_js ),
			true
		);
	}
}


if ( is_page( 'workshops' ) ) {

    $workshops_css =
        get_template_directory()
        . '/assets/css/workshops.css';

    if ( file_exists( $workshops_css ) ) {

        wp_enqueue_style(
            'greshma-workshops',
            get_template_directory_uri()
            . '/assets/css/workshops.css',
            array(),
            filemtime( $workshops_css )
        );

    }


    $workshops_js =
        get_template_directory()
        . '/assets/js/workshops.js';

    if ( file_exists( $workshops_js ) ) {

        wp_enqueue_script(
            'greshma-workshops',
            get_template_directory_uri()
            . '/assets/js/workshops.js',
            array(),
            filemtime( $workshops_js ),
            true
        );

    }

} 

if (
	is_post_type_archive( 'greshma_editorial' ) ||
	is_singular( 'greshma_editorial' )
) {
	$editorial_css =
		get_template_directory()
		. '/assets/css/editorial.css';

	if ( file_exists( $editorial_css ) ) {
		wp_enqueue_style(
			'greshma-editorial',
			get_template_directory_uri()
				. '/assets/css/editorial.css',
			array( 'style' ),
			filemtime( $editorial_css )
		);
	}
}
wp_enqueue_style(
'responsive',
get_template_directory_uri().'/assets/css/responsive.css',
['style'],
$theme
);

wp_enqueue_script(
'main',
get_template_directory_uri().'/assets/js/main.js',
[],
$theme,
true
);

wp_enqueue_script(
'menu',
get_template_directory_uri().'/assets/js/menu.js',
[],
$theme,
true
);
wp_enqueue_style(
    'greshma-hero',
    get_template_directory_uri() . '/assets/css/hero.css',
    array( 'style', 'header' ),
    $theme
);
}
add_action('wp_enqueue_scripts','greshma_enqueue_assets');





require get_template_directory() . '/inc/template-functions.php';

/**
 * Filter the Editorial archive by Editorial Type and Topic.
 *
 * @param WP_Query $query Current WordPress query.
 * @return void
 */
function greshma_filter_editorial_archive( $query ) {

	if (
		is_admin() ||
		! $query->is_main_query() ||
		! $query->is_post_type_archive( 'greshma_editorial' )
	) {
		return;
	}

	$tax_query = array();

	if ( isset( $_GET['editorial_type'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended

		$current_type = sanitize_key(
			wp_unslash( $_GET['editorial_type'] ) // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		);

		if ( ! empty( $current_type ) ) {
			$tax_query[] = array(
				'taxonomy' => 'greshma_editorial_type',
				'field'    => 'slug',
				'terms'    => $current_type,
			);
		}
	}

	if ( isset( $_GET['editorial_topic'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended

		$current_topic = sanitize_key(
			wp_unslash( $_GET['editorial_topic'] ) // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		);

		if ( ! empty( $current_topic ) ) {
			$tax_query[] = array(
				'taxonomy' => 'greshma_editorial_topic',
				'field'    => 'slug',
				'terms'    => $current_topic,
			);
		}
	}

	if ( count( $tax_query ) > 1 ) {
		$tax_query['relation'] = 'AND';
	}

	if ( ! empty( $tax_query ) ) {
		$query->set( 'tax_query', $tax_query );
	}
}

add_action( 'pre_get_posts', 'greshma_filter_editorial_archive' );