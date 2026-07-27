<?php
/**
 * Media module.
 *
 * @package GreshmaCore
 */

defined( 'ABSPATH' ) || exit;

class Greshma_Core_Media {

	const POST_TYPE = 'greshma_media';
	const TAXONOMY  = 'greshma_media_category';

	public static function init(): void {
		add_action( 'init', array( __CLASS__, 'register_post_type' ) );
		add_action( 'init', array( __CLASS__, 'register_taxonomy' ) );
	}

	/**
	 * Register Media custom post type.
	 */
	public static function register_post_type(): void {

		$labels = array(
			'name'               => __( 'Media Features', 'greshma-core' ),
			'singular_name'      => __( 'Media Item', 'greshma-core' ),
			'menu_name'          => __( 'Media Features', 'greshma-core' ),
			'name_admin_bar'     => __( 'Media Item', 'greshma-core' ),
			'add_new'            => __( 'Add New', 'greshma-core' ),
			'add_new_item'       => __( 'Add New Media Item', 'greshma-core' ),
			'new_item'           => __( 'New Media Item', 'greshma-core' ),
			'edit_item'          => __( 'Edit Media Item', 'greshma-core' ),
			'view_item'          => __( 'View Media Item', 'greshma-core' ),
			'all_items'          => __( 'All Media Features', 'greshma-core' ),
			'search_items'       => __( 'Search Media', 'greshma-core' ),
			'not_found'          => __( 'No media items found.', 'greshma-core' ),
			'not_found_in_trash' => __( 'No media items found in Trash.', 'greshma-core' ),
			'featured_image'     => __( 'Media Image', 'greshma-core' ),
			'set_featured_image' => __( 'Set media image', 'greshma-core' ),
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
				'rewrite'            => false,

				'menu_icon'     => 'dashicons-megaphone',
				'menu_position' => 26,

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
	 * Register Media Categories.
	 */
	public static function register_taxonomy(): void {

		$labels = array(
			'name'          => __( 'Media Categories', 'greshma-core' ),
			'singular_name' => __( 'Media Category', 'greshma-core' ),
			'search_items'  => __( 'Search Media Categories', 'greshma-core' ),
			'all_items'     => __( 'All Media Categories', 'greshma-core' ),
			'edit_item'     => __( 'Edit Media Category', 'greshma-core' ),
			'update_item'   => __( 'Update Media Category', 'greshma-core' ),
			'add_new_item'  => __( 'Add New Media Category', 'greshma-core' ),
			'new_item_name' => __( 'New Media Category Name', 'greshma-core' ),
			'menu_name'     => __( 'Categories', 'greshma-core' ),
		);

		register_taxonomy(
			self::TAXONOMY,
			array( self::POST_TYPE ),
			array(
				'labels'            => $labels,
				'public'            => false,
				'hierarchical'      => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_rest'      => true,
				'rewrite'           => false,
			)
		);
	}
}

Greshma_Core_Media::init();