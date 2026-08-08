<?php
/**
 * Editorial module.
 *
 * Registers the Editorial custom post type used for reflections,
 * field stories, impact stories, articles, research and publications.
 *
 * @package GreshmaCore
 */

defined( 'ABSPATH' ) || exit;

/**
 * Handles the Editorial custom post type.
 */
class Greshma_Core_Editorial {

	/**
	 * Editorial post type name.
	 */
	const POST_TYPE = 'greshma_editorial';

	/**
	 * Register WordPress hooks.
	 */
	public static function init(): void {
		add_action( 'init', array( __CLASS__, 'register_post_type' ) );
	}

	/**
	 * Register the Editorial custom post type.
	 */
	public static function register_post_type(): void {

		$labels = array(
			'name'                  => __( 'Editorial', 'greshma-core' ),
			'singular_name'         => __( 'Editorial Item', 'greshma-core' ),
			'menu_name'             => __( 'Editorial', 'greshma-core' ),
			'name_admin_bar'        => __( 'Editorial Item', 'greshma-core' ),
			'add_new'               => __( 'Add New', 'greshma-core' ),
			'add_new_item'          => __( 'Add New Editorial Item', 'greshma-core' ),
			'new_item'              => __( 'New Editorial Item', 'greshma-core' ),
			'edit_item'             => __( 'Edit Editorial Item', 'greshma-core' ),
			'view_item'             => __( 'View Editorial Item', 'greshma-core' ),
			'all_items'             => __( 'All Editorial', 'greshma-core' ),
			'search_items'          => __( 'Search Editorial', 'greshma-core' ),
			'parent_item_colon'     => __( 'Parent Editorial Item:', 'greshma-core' ),
			'not_found'             => __( 'No editorial items found.', 'greshma-core' ),
			'not_found_in_trash'    => __( 'No editorial items found in Trash.', 'greshma-core' ),
			'featured_image'        => __( 'Editorial Featured Image', 'greshma-core' ),
			'set_featured_image'    => __( 'Set editorial featured image', 'greshma-core' ),
			'remove_featured_image' => __( 'Remove editorial featured image', 'greshma-core' ),
			'use_featured_image'    => __( 'Use as editorial featured image', 'greshma-core' ),
			'archives'              => __( 'Editorial Archives', 'greshma-core' ),
			'insert_into_item'      => __( 'Insert into editorial item', 'greshma-core' ),
			'uploaded_to_this_item' => __( 'Uploaded to this editorial item', 'greshma-core' ),
			'filter_items_list'     => __( 'Filter editorial list', 'greshma-core' ),
			'items_list_navigation' => __( 'Editorial list navigation', 'greshma-core' ),
			'items_list'            => __( 'Editorial list', 'greshma-core' ),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'show_ui'            => true,
			'show_in_menu'       => false,
			'show_in_admin_bar'  => true,
			'show_in_nav_menus'  => true,
			'show_in_rest'       => true,
			'publicly_queryable' => true,
			'exclude_from_search'=> false,
			'query_var'          => true,
			'has_archive'        => true,
			'rewrite'            => array(
				'slug'       => 'editorial',
				'with_front' => false,
			),
			'menu_icon'          => 'dashicons-edit-page',
			'menu_position'      => 27,
			'supports'           => array(
				'title',
				'editor',
				'excerpt',
				'thumbnail',
				'revisions',
				'page-attributes',
			),
		);

		register_post_type( self::POST_TYPE, $args );
	}
}

Greshma_Core_Editorial::init();