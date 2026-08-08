<?php
/**
 * Journey custom post type.
 *
 * @package GreshmaCore
 */

defined( 'ABSPATH' ) || exit;

class Greshma_Core_Journey {

	const POST_TYPE = 'greshma_journey';

	public static function init(): void {
		add_action( 'init', array( __CLASS__, 'register_post_type' ) );
	}

	public static function register_post_type(): void {

		$labels = array(
			'name'                  => __( 'Journey', 'greshma-core' ),
			'singular_name'         => __( 'Journey Moment', 'greshma-core' ),
			'menu_name'             => __( 'Journey', 'greshma-core' ),
			'name_admin_bar'        => __( 'Journey Moment', 'greshma-core' ),
			'add_new'               => __( 'Add New', 'greshma-core' ),
			'add_new_item'          => __( 'Add New Journey Moment', 'greshma-core' ),
			'edit_item'             => __( 'Edit Journey Moment', 'greshma-core' ),
			'new_item'              => __( 'New Journey Moment', 'greshma-core' ),
			'view_item'             => __( 'View Journey Moment', 'greshma-core' ),
			'all_items'             => __( 'All Journey Moments', 'greshma-core' ),
			'search_items'          => __( 'Search Journey Moments', 'greshma-core' ),
			'not_found'             => __( 'No journey moments found.', 'greshma-core' ),
			'not_found_in_trash'    => __( 'No journey moments found in Trash.', 'greshma-core' ),
			'featured_image'        => __( 'Journey Image', 'greshma-core' ),
			'set_featured_image'    => __( 'Set journey image', 'greshma-core' ),
			'remove_featured_image' => __( 'Remove journey image', 'greshma-core' ),
			'use_featured_image'    => __( 'Use as journey image', 'greshma-core' ),
		);

		register_post_type(
			self::POST_TYPE,
			array(
				'labels'             => $labels,
				'public'             => false,
				'show_ui'            => true,
				'show_in_menu'       => false,
				'show_in_admin_bar'  => true,
				'show_in_rest'       => true,
				'publicly_queryable' => false,
				'exclude_from_search'=> true,
				'has_archive'        => false,
				'rewrite'            => false,

				'menu_icon'     => 'dashicons-backup',
				'menu_position' => 27,

				'supports' => array(
					'title',
					'editor',
					'thumbnail',
					'page-attributes',
					'revisions',
				),
			)
		);
	}
}

Greshma_Core_Journey::init();