<?php
/**
 * Organizations module.
 *
 * @package GreshmaCore
 */

defined( 'ABSPATH' ) || exit;

class Greshma_Core_Organizations {

	const POST_TYPE = 'greshma_organization';

	public static function init(): void {
		add_action( 'init', array( __CLASS__, 'register_post_type' ) );
	}

	public static function register_post_type(): void {

		$labels = array(
			'name'               => __( 'Organizations', 'greshma-core' ),
			'singular_name'      => __( 'Organization', 'greshma-core' ),
			'menu_name'          => __( 'Organizations', 'greshma-core' ),
			'add_new'            => __( 'Add New', 'greshma-core' ),
			'add_new_item'       => __( 'Add New Organization', 'greshma-core' ),
			'edit_item'          => __( 'Edit Organization', 'greshma-core' ),
			'new_item'           => __( 'New Organization', 'greshma-core' ),
			'all_items'          => __( 'All Organizations', 'greshma-core' ),
			'search_items'       => __( 'Search Organizations', 'greshma-core' ),
			'not_found'          => __( 'No organizations found.', 'greshma-core' ),
			'not_found_in_trash' => __( 'No organizations found in Trash.', 'greshma-core' ),
			'featured_image'     => __( 'Organization Image', 'greshma-core' ),
			'set_featured_image' => __( 'Set organization image', 'greshma-core' ),
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
				'has_archive'        => false,
				'rewrite'            => false,

				'menu_icon'     => 'dashicons-building',
				'menu_position' => 26,

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

Greshma_Core_Organizations::init();