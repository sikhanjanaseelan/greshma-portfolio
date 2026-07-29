<?php
/**
 * Education custom post type.
 *
 * @package GreshmaCore
 */

defined( 'ABSPATH' ) || exit;

class Greshma_Core_Education {

	const POST_TYPE = 'greshma_education';

	public static function init(): void {
		add_action( 'init', array( __CLASS__, 'register_post_type' ) );
	}

	public static function register_post_type(): void {

		$labels = array(
			'name'                  => __( 'Education', 'greshma-core' ),
			'singular_name'         => __( 'Education Entry', 'greshma-core' ),
			'menu_name'             => __( 'Education', 'greshma-core' ),
			'name_admin_bar'        => __( 'Education Entry', 'greshma-core' ),
			'add_new'               => __( 'Add New', 'greshma-core' ),
			'add_new_item'          => __( 'Add New Education Entry', 'greshma-core' ),
			'edit_item'             => __( 'Edit Education Entry', 'greshma-core' ),
			'new_item'              => __( 'New Education Entry', 'greshma-core' ),
			'all_items'             => __( 'All Education Entries', 'greshma-core' ),
			'search_items'          => __( 'Search Education', 'greshma-core' ),
			'not_found'             => __( 'No education entries found.', 'greshma-core' ),
			'not_found_in_trash'    => __( 'No education entries found in Trash.', 'greshma-core' ),
			'featured_image'        => __( 'Education Image', 'greshma-core' ),
			'set_featured_image'    => __( 'Set education image', 'greshma-core' ),
			'remove_featured_image' => __( 'Remove education image', 'greshma-core' ),
		);

		register_post_type(
			self::POST_TYPE,
			array(
				'labels'             => $labels,
				'public'             => false,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'show_in_rest'       => true,
				'publicly_queryable' => false,
				'exclude_from_search'=> true,
				'has_archive'        => false,
				'rewrite'            => false,

				'menu_icon'     => 'dashicons-welcome-learn-more',
				'menu_position' => 28,

				'supports' => array(
					'title',
					'editor',
					'thumbnail',
					'revisions',
				),
			)
		);
	}
}

Greshma_Core_Education::init();