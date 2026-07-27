<?php
/**
 * Workshops module.
 *
 * @package GreshmaCore
 */

defined( 'ABSPATH' ) || exit;

class Greshma_Core_Workshops {

	const POST_TYPE = 'greshma_workshop';
	const TAXONOMY  = 'greshma_workshop_category';

	public static function init(): void {
		add_action( 'init', array( __CLASS__, 'register_post_type' ) );
		add_action( 'init', array( __CLASS__, 'register_taxonomy' ) );
	}

	public static function register_post_type(): void {

		$labels = array(
			'name'               => __( 'Workshops', 'greshma-core' ),
			'singular_name'      => __( 'Workshop', 'greshma-core' ),
			'menu_name'          => __( 'Workshops', 'greshma-core' ),
			'name_admin_bar'     => __( 'Workshop', 'greshma-core' ),
			'add_new'            => __( 'Add New', 'greshma-core' ),
			'add_new_item'       => __( 'Add New Workshop', 'greshma-core' ),
			'new_item'           => __( 'New Workshop', 'greshma-core' ),
			'edit_item'          => __( 'Edit Workshop', 'greshma-core' ),
			'view_item'          => __( 'View Workshop', 'greshma-core' ),
			'all_items'          => __( 'All Workshops', 'greshma-core' ),
			'search_items'       => __( 'Search Workshops', 'greshma-core' ),
			'not_found'          => __( 'No workshops found.', 'greshma-core' ),
			'not_found_in_trash' => __( 'No workshops found in Trash.', 'greshma-core' ),
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
					'slug'       => 'workshop',
					'with_front' => false,
				),

				'menu_icon'     => 'dashicons-welcome-learn-more',
				'menu_position' => 23,

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

	public static function register_taxonomy(): void {

		$labels = array(
			'name'          => __( 'Workshop Categories', 'greshma-core' ),
			'singular_name' => __( 'Workshop Category', 'greshma-core' ),
			'search_items'  => __( 'Search Workshop Categories', 'greshma-core' ),
			'all_items'     => __( 'All Workshop Categories', 'greshma-core' ),
			'edit_item'     => __( 'Edit Workshop Category', 'greshma-core' ),
			'update_item'   => __( 'Update Workshop Category', 'greshma-core' ),
			'add_new_item'  => __( 'Add New Workshop Category', 'greshma-core' ),
			'new_item_name' => __( 'New Workshop Category Name', 'greshma-core' ),
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

Greshma_Core_Workshops::init();