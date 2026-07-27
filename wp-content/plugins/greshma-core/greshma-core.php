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

require_once GRESHMA_CORE_DIR . 'includes/class-projects.php';
require_once GRESHMA_CORE_DIR . 'includes/class-project-meta.php';

require_once GRESHMA_CORE_DIR . 'includes/class-gallery.php';
require_once GRESHMA_CORE_DIR . 'includes/class-gallery-meta.php';

require_once GRESHMA_CORE_DIR . 'includes/class-events.php';
require_once GRESHMA_CORE_DIR . 'includes/class-event-meta.php';

require_once GRESHMA_CORE_DIR . 'includes/class-workshops.php';
require_once GRESHMA_CORE_DIR . 'includes/class-workshop-meta.php';


require_once GRESHMA_CORE_DIR . 'includes/class-resources.php';
require_once GRESHMA_CORE_DIR . 'includes/class-resource-meta.php';