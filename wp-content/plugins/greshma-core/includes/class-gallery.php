<?php
/**
 * Gallery module.
 *
 * @package GreshmaCore
 */

defined( 'ABSPATH' ) || exit;

class Greshma_Core_Gallery {

	const POST_TYPE = 'greshma_gallery';
	const TAXONOMY  = 'greshma_gallery_category';

	public static function init(): void {
		add_action( 'init', array( __CLASS__, 'register_post_type' ) );
		add_action( 'init', array( __CLASS__, 'register_taxonomy' ) );
	}

	public static function register_post_type(): void {

		$labels = array(
			'name'               => __( 'Gallery', 'greshma-core' ),
			'singular_name'      => __( 'Gallery Item', 'greshma-core' ),
			'menu_name'          => __( 'Gallery', 'greshma-core' ),
			'add_new'            => __( 'Add New', 'greshma-core' ),
			'add_new_item'       => __( 'Add New Gallery Item', 'greshma-core' ),
			'edit_item'          => __( 'Edit Gallery Item', 'greshma-core' ),
			'new_item'           => __( 'New Gallery Item', 'greshma-core' ),
			'view_item'          => __( 'View Gallery Item', 'greshma-core' ),
			'all_items'          => __( 'All Gallery Items', 'greshma-core' ),
			'search_items'       => __( 'Search Gallery', 'greshma-core' ),
			'not_found'          => __( 'No gallery items found.', 'greshma-core' ),
			'not_found_in_trash' => __( 'No gallery items found in Trash.', 'greshma-core' ),
			'featured_image'     => __( 'Gallery Image', 'greshma-core' ),
			'set_featured_image' => __( 'Set gallery image', 'greshma-core' ),
		);

		register_post_type(
			self::POST_TYPE,
			array(
				'labels'             => $labels,
				'public'             => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'show_in_rest'       => true,
				'publicly_queryable' => false,
				'has_archive'        => false,
				'menu_icon'          => 'dashicons-format-gallery',
				'menu_position'      => 21,

				'supports' => array(
					'title',
					'thumbnail',
					'page-attributes',
				),
			)
		);
	}

	public static function register_taxonomy(): void {

		$labels = array(
			'name'          => __( 'Gallery Categories', 'greshma-core' ),
			'singular_name' => __( 'Gallery Category', 'greshma-core' ),
			'search_items'  => __( 'Search Gallery Categories', 'greshma-core' ),
			'all_items'     => __( 'All Gallery Categories', 'greshma-core' ),
			'edit_item'     => __( 'Edit Gallery Category', 'greshma-core' ),
			'update_item'   => __( 'Update Gallery Category', 'greshma-core' ),
			'add_new_item'  => __( 'Add New Gallery Category', 'greshma-core' ),
			'new_item_name' => __( 'New Gallery Category Name', 'greshma-core' ),
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

Greshma_Core_Gallery::init();