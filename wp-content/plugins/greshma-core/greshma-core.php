<?php
/**
 * Plugin Name: Greshma Core
 * Description: Core content and functionality for the Greshma portfolio website.
 * Version: 1.0.0
 * Author: Sikha Njanaseelan
 * Text Domain: greshma-core
 */

defined( 'ABSPATH' ) || exit;

define( 'GRESHMA_CORE_VERSION', '1.0.0' );
define( 'GRESHMA_CORE_FILE', __FILE__ );
define( 'GRESHMA_CORE_DIR', plugin_dir_path( __FILE__ ) );
define( 'GRESHMA_CORE_URL', plugin_dir_url( __FILE__ ) );

//projects section
require_once GRESHMA_CORE_DIR . 'includes/class-projects.php';
require_once GRESHMA_CORE_DIR . 'includes/class-project-meta.php';

//custom gallery section

require_once GRESHMA_CORE_DIR . 'includes/class-gallery.php';
require_once GRESHMA_CORE_DIR . 'includes/class-gallery-meta.php';

//custom event creation section

require_once GRESHMA_CORE_DIR . 'includes/class-events.php';
require_once GRESHMA_CORE_DIR . 'includes/class-event-meta.php';

//worksdhops section

require_once GRESHMA_CORE_DIR . 'includes/class-workshops.php';
require_once GRESHMA_CORE_DIR . 'includes/class-workshop-meta.php';

//resources section

require_once GRESHMA_CORE_DIR . 'includes/class-resources.php';
require_once GRESHMA_CORE_DIR . 'includes/class-resource-meta.php';

//testimonial adding section

require_once GRESHMA_CORE_DIR . 'includes/class-testimonials.php';
require_once GRESHMA_CORE_DIR . 'includes/class-testimonial-meta.php';

//media and press deatils adding section
require_once GRESHMA_CORE_DIR . 'includes/class-media.php';
require_once GRESHMA_CORE_DIR . 'includes/class-media-meta.php';

// custom settings for adding datas like linkdin , insta fb social media copyright section etc

require_once GRESHMA_CORE_DIR . 'includes/class-settings.php';

// adding organizations greshma had worked dynamically
require_once GRESHMA_CORE_DIR . 'includes/class-organizations.php';
require_once GRESHMA_CORE_DIR . 'includes/class-organization-meta.php';

//dynamic journey section in my-path page.
require_once GRESHMA_CORE_DIR . 'includes/class-journey.php';
require_once GRESHMA_CORE_DIR . 'includes/class-journey-meta.php';

// dynamic education details adding section
require_once GRESHMA_CORE_DIR . 'includes/class-education.php';
require_once GRESHMA_CORE_DIR . 'includes/class-education-meta.php';

// Editorial publishing section.
require_once GRESHMA_CORE_DIR . 'includes/class-editorial.php';
require_once GRESHMA_CORE_DIR . 'includes/class-editorial-taxonomy.php';
require_once GRESHMA_CORE_DIR . 'includes/class-editorial-admin.php';
require_once GRESHMA_CORE_DIR . 'includes/class-editorial-editor.php';


require_once GRESHMA_CORE_DIR . 'includes/class-admin-menu.php';