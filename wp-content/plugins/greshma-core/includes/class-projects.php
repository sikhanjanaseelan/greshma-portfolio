<?php
/**
 * Projects module.
 *
 * @package GreshmaCore
 */

defined( 'ABSPATH' ) || exit;

/**
 * Handles the Projects custom post type and taxonomies.
 */
class Greshma_Core_Projects {

	/**
	 * Register hooks.
	 */
	public static function init(): void {
		add_action( 'init', array( __CLASS__, 'register_post_type' ) );
		add_action( 'init', array( __CLASS__, 'register_taxonomies' ) );
	}

	/**
	 * Register Project post type.
	 */
	public static function register_post_type(): void {

		$labels = array(
			'name'               => __( 'Projects', 'greshma-core' ),
			'singular_name'      => __( 'Project', 'greshma-core' ),
			'menu_name'          => __( 'Projects', 'greshma-core' ),
			'name_admin_bar'     => __( 'Project', 'greshma-core' ),
			'add_new'            => __( 'Add New', 'greshma-core' ),
			'add_new_item'       => __( 'Add New Project', 'greshma-core' ),
			'new_item'           => __( 'New Project', 'greshma-core' ),
			'edit_item'          => __( 'Edit Project', 'greshma-core' ),
			'view_item'          => __( 'View Project', 'greshma-core' ),
			'all_items'          => __( 'All Projects', 'greshma-core' ),
			'search_items'       => __( 'Search Projects', 'greshma-core' ),
			'not_found'          => __( 'No projects found.', 'greshma-core' ),
			'not_found_in_trash' => __( 'No projects found in Trash.', 'greshma-core' ),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'has_archive'        => true,
			'rewrite'            => array(
				'slug'       => 'projects',
				'with_front' => false,
			),
			'menu_icon'          => 'dashicons-portfolio',
			'menu_position'      => 20,
			'supports' => array(
    'title',
    'editor',
    'thumbnail',
    'excerpt',
    'revisions',
    'page-attributes',
),
			'publicly_queryable' => true,
			'query_var'          => true,
		);

		register_post_type( 'greshma_project', $args );
	}

	/**
	 * Register Project Category taxonomy.
	 */
	public static function register_taxonomies(): void {

		$labels = array(
			'name'          => __( 'Project Categories', 'greshma-core' ),
			'singular_name' => __( 'Project Category', 'greshma-core' ),
			'search_items'  => __( 'Search Project Categories', 'greshma-core' ),
			'all_items'     => __( 'All Project Categories', 'greshma-core' ),
			'edit_item'     => __( 'Edit Project Category', 'greshma-core' ),
			'update_item'   => __( 'Update Project Category', 'greshma-core' ),
			'add_new_item'  => __( 'Add New Project Category', 'greshma-core' ),
			'new_item_name' => __( 'New Project Category Name', 'greshma-core' ),
			'menu_name'     => __( 'Categories', 'greshma-core' ),
		);

		register_taxonomy(
			'greshma_project_category',
			array( 'greshma_project' ),
			array(
				'labels'            => $labels,
				'public'            => true,
				'hierarchical'      => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_rest'      => true,
				'rewrite'           => array(
					'slug'       => 'project-category',
					'with_front' => false,
				),
			)
		);
	}
}

Greshma_Core_Projects::init();