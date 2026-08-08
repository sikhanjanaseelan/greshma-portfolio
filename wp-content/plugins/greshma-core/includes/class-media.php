<?php
/**
 * Media & Press module.
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
	 * Register Media & Press custom post type.
	 */
	public static function register_post_type(): void {

		$labels = array(
			'name'               => __( 'Media & Press', 'greshma-core' ),
			'singular_name'      => __( 'Media & Press Item', 'greshma-core' ),
			'menu_name'          => __( 'Media & Press', 'greshma-core' ),
			'name_admin_bar'     => __( 'Media & Press Item', 'greshma-core' ),
			'add_new'            => __( 'Add New', 'greshma-core' ),
			'add_new_item'       => __( 'Add New Media & Press Item', 'greshma-core' ),
			'new_item'           => __( 'New Media & Press Item', 'greshma-core' ),
			'edit_item'          => __( 'Edit Media & Press Item', 'greshma-core' ),
			'view_item'          => __( 'View Media & Press Item', 'greshma-core' ),
		'all_items'     => __( 'All Media & Press', 'greshma-core' ),
			'search_items'       => __( 'Search Media & Press', 'greshma-core' ),
			'not_found'          => __( 'No Media & Press items found.', 'greshma-core' ),
			'not_found_in_trash' => __( 'No Media & Press items found in Trash.', 'greshma-core' ),
			'featured_image'     => __( 'Media Image', 'greshma-core' ),
			'set_featured_image' => __( 'Set media image', 'greshma-core' ),
		);

		register_post_type(
			self::POST_TYPE,
			array(
				'labels'             => $labels,
				'public'             => true,
				'show_ui'            => true,
				'show_in_menu'       => false,
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
	 * Register Media & Press categories.
	 */
	public static function register_taxonomy(): void {

		$labels = array(
			'name'          => __( 'Media & Press Categories', 'greshma-core' ),
			'singular_name' => __( 'Media & Press Category', 'greshma-core' ),
			'search_items'  => __( 'Search Media & Press Categories', 'greshma-core' ),
			'all_items'     => __( 'All Media & Press Categories', 'greshma-core' ),
			'edit_item'     => __( 'Edit Media & Press Category', 'greshma-core' ),
			'update_item'   => __( 'Update Media & Press Category', 'greshma-core' ),
			'add_new_item'  => __( 'Add New Media & Press Category', 'greshma-core' ),
			'new_item_name' => __( 'New Media & Press Category Name', 'greshma-core' ),
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