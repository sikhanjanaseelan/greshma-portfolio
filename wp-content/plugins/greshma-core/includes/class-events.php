<?php
/**
 * Events module.
 *
 * @package GreshmaCore
 */

defined( 'ABSPATH' ) || exit;

class Greshma_Core_Events {

	const POST_TYPE = 'greshma_event';
	const TAXONOMY  = 'greshma_event_category';

	public static function init(): void {
		add_action( 'init', array( __CLASS__, 'register_post_type' ) );
		add_action( 'init', array( __CLASS__, 'register_taxonomy' ) );
	}

	public static function register_post_type(): void {

		$labels = array(
			'name'               => __( 'Events', 'greshma-core' ),
			'singular_name'      => __( 'Event', 'greshma-core' ),
			'menu_name'          => __( 'Events', 'greshma-core' ),
			'name_admin_bar'     => __( 'Event', 'greshma-core' ),
			'add_new'            => __( 'Add New', 'greshma-core' ),
			'add_new_item'       => __( 'Add New Event', 'greshma-core' ),
			'new_item'           => __( 'New Event', 'greshma-core' ),
			'edit_item'          => __( 'Edit Event', 'greshma-core' ),
			'view_item'          => __( 'View Event', 'greshma-core' ),
			'all_items'          => __( 'All Events', 'greshma-core' ),
			'search_items'       => __( 'Search Events', 'greshma-core' ),
			'not_found'          => __( 'No events found.', 'greshma-core' ),
			'not_found_in_trash' => __( 'No events found in Trash.', 'greshma-core' ),
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
				'rewrite'            => array(
					'slug'       => 'event',
					'with_front' => false,
				),
				'menu_icon'          => 'dashicons-calendar-alt',
				'menu_position'      => 22,
				'supports'           => array(
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
			'name'          => __( 'Event Categories', 'greshma-core' ),
			'singular_name' => __( 'Event Category', 'greshma-core' ),
			'search_items'  => __( 'Search Event Categories', 'greshma-core' ),
			'all_items'     => __( 'All Event Categories', 'greshma-core' ),
			'edit_item'     => __( 'Edit Event Category', 'greshma-core' ),
			'update_item'   => __( 'Update Event Category', 'greshma-core' ),
			'add_new_item'  => __( 'Add New Event Category', 'greshma-core' ),
			'new_item_name' => __( 'New Event Category Name', 'greshma-core' ),
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

	/**
	 * Get event status from saved dates.
	 */
	public static function get_status( int $post_id ): array {

		$start_date = get_post_meta(
			$post_id,
			'_greshma_event_start_date',
			true
		);

		$end_date = get_post_meta(
			$post_id,
			'_greshma_event_end_date',
			true
		);

		if ( empty( $start_date ) ) {
			return array(
				'label' => __( 'Date not set', 'greshma-core' ),
				'class' => 'unknown',
			);
		}

		$today = current_time( 'Y-m-d' );

		$effective_end_date = ! empty( $end_date )
			? $end_date
			: $start_date;

		if ( $today < $start_date ) {
			return array(
				'label' => __( 'Upcoming', 'greshma-core' ),
				'class' => 'upcoming',
			);
		}

		if (
			$today >= $start_date &&
			$today <= $effective_end_date
		) {
			return array(
				'label' => __( 'Ongoing', 'greshma-core' ),
				'class' => 'ongoing',
			);
		}

		return array(
			'label' => __( 'Past', 'greshma-core' ),
			'class' => 'past',
		);
	}
}

Greshma_Core_Events::init();