<?php
/**
 * Testimonials module.
 *
 * @package GreshmaCore
 */

defined( 'ABSPATH' ) || exit;

class Greshma_Core_Testimonials {

	const POST_TYPE = 'greshma_testimonial';
	const TAXONOMY  = 'greshma_testimonial_group';

	public static function init(): void {
		add_action( 'init', array( __CLASS__, 'register_post_type' ) );
		add_action( 'init', array( __CLASS__, 'register_taxonomy' ) );
	}

	public static function register_post_type(): void {

		$labels = array(
			'name'               => __( 'Testimonials', 'greshma-core' ),
			'singular_name'      => __( 'Testimonial', 'greshma-core' ),
			'menu_name'          => __( 'Testimonials', 'greshma-core' ),
			'add_new'            => __( 'Add New', 'greshma-core' ),
			'add_new_item'       => __( 'Add New Testimonial', 'greshma-core' ),
			'edit_item'          => __( 'Edit Testimonial', 'greshma-core' ),
			'new_item'           => __( 'New Testimonial', 'greshma-core' ),
			'all_items'          => __( 'All Testimonials', 'greshma-core' ),
			'search_items'       => __( 'Search Testimonials', 'greshma-core' ),
			'not_found'          => __( 'No testimonials found.', 'greshma-core' ),
			'not_found_in_trash' => __( 'No testimonials found in Trash.', 'greshma-core' ),
			'featured_image'     => __( 'Person Photo', 'greshma-core' ),
			'set_featured_image' => __( 'Set person photo', 'greshma-core' ),
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
				'menu_icon'          => 'dashicons-format-quote',
				'menu_position'      => 25,

				'supports' => array(
					'title',
					'editor',
					'thumbnail',
					'revisions',
				),
			)
		);
	}

	public static function register_taxonomy(): void {

		$labels = array(
			'name'          => __( 'Testimonial Groups', 'greshma-core' ),
			'singular_name' => __( 'Testimonial Group', 'greshma-core' ),
			'search_items'  => __( 'Search Testimonial Groups', 'greshma-core' ),
			'all_items'     => __( 'All Testimonial Groups', 'greshma-core' ),
			'edit_item'     => __( 'Edit Testimonial Group', 'greshma-core' ),
			'update_item'   => __( 'Update Testimonial Group', 'greshma-core' ),
			'add_new_item'  => __( 'Add New Testimonial Group', 'greshma-core' ),
			'new_item_name' => __( 'New Testimonial Group Name', 'greshma-core' ),
			'menu_name'     => __( 'Groups', 'greshma-core' ),
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

Greshma_Core_Testimonials::init();