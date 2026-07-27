<?php
/**
 * Resources module.
 *
 * @package GreshmaCore
 */

defined( 'ABSPATH' ) || exit;

class Greshma_Core_Resources {

	const POST_TYPE = 'greshma_resource';
	const TAXONOMY  = 'greshma_resource_category';

	public static function init(): void {
		add_action( 'init', array( __CLASS__, 'register_post_type' ) );
		add_action( 'init', array( __CLASS__, 'register_taxonomy' ) );
	}

	/**
	 * Register Resources custom post type.
	 */
	public static function register_post_type(): void {

		$labels = array(
			'name'               => __( 'Resources', 'greshma-core' ),
			'singular_name'      => __( 'Resource', 'greshma-core' ),
			'menu_name'          => __( 'Resources', 'greshma-core' ),
			'name_admin_bar'     => __( 'Resource', 'greshma-core' ),
			'add_new'            => __( 'Add New', 'greshma-core' ),
			'add_new_item'       => __( 'Add New Resource', 'greshma-core' ),
			'new_item'           => __( 'New Resource', 'greshma-core' ),
			'edit_item'          => __( 'Edit Resource', 'greshma-core' ),
			'view_item'          => __( 'View Resource', 'greshma-core' ),
			'all_items'          => __( 'All Resources', 'greshma-core' ),
			'search_items'       => __( 'Search Resources', 'greshma-core' ),
			'not_found'          => __( 'No resources found.', 'greshma-core' ),
			'not_found_in_trash' => __( 'No resources found in Trash.', 'greshma-core' ),
			'featured_image'     => __( 'Resource Image', 'greshma-core' ),
			'set_featured_image' => __( 'Set resource image', 'greshma-core' ),
		);

		register_post_type(
			self::POST_TYPE,
			array(
				'labels'             => $labels,
				'public'             => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'show_in_rest'       => true,
				'publicly_queryable' => true,
				'has_archive'        => false,

				'rewrite' => array(
					'slug'       => 'resource',
					'with_front' => false,
				),

				'menu_icon'     => 'dashicons-media-document',
				'menu_position' => 24,

				'supports' => array(
					'title',
					'editor',
					'excerpt',
					'thumbnail',
					'revisions',
				),
			)
		);
	}

	/**
	 * Register Resource Categories.
	 */
	public static function register_taxonomy(): void {

		$labels = array(
			'name'          => __( 'Resource Categories', 'greshma-core' ),
			'singular_name' => __( 'Resource Category', 'greshma-core' ),
			'search_items'  => __( 'Search Resource Categories', 'greshma-core' ),
			'all_items'     => __( 'All Resource Categories', 'greshma-core' ),
			'edit_item'     => __( 'Edit Resource Category', 'greshma-core' ),
			'update_item'   => __( 'Update Resource Category', 'greshma-core' ),
			'add_new_item'  => __( 'Add New Resource Category', 'greshma-core' ),
			'new_item_name' => __( 'New Resource Category Name', 'greshma-core' ),
			'menu_name'     => __( 'Categories', 'greshma-core' ),
		);

		register_taxonomy(
			self::TAXONOMY,
			array( self::POST_TYPE ),
			array(
				'labels'            => $labels,
				'public'            => true,
				'hierarchical'      => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_rest'      => true,
				'rewrite'           => false,
			)
		);
	}
}

Greshma_Core_Resources::init();