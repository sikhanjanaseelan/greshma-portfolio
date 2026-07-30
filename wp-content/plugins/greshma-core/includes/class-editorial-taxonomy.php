<?php
/**
 * Editorial taxonomies.
 *
 * Registers Editorial Types and Topics for the Editorial post type.
 *
 * @package GreshmaCore
 */

defined( 'ABSPATH' ) || exit;

/**
 * Handles Editorial taxonomies.
 */
class Greshma_Core_Editorial_Taxonomy {

	/**
	 * Editorial Type taxonomy name.
	 */
	const TYPE_TAXONOMY = 'greshma_editorial_type';

	/**
	 * Editorial Topic taxonomy name.
	 */
	const TOPIC_TAXONOMY = 'greshma_editorial_topic';

	/**
	 * Register WordPress hooks.
	 */
	public static function init(): void {
		add_action( 'init', array( __CLASS__, 'register_taxonomies' ) );
		add_action( 'init', array( __CLASS__, 'insert_default_editorial_types' ), 20 );
	}

	/**
	 * Register Editorial Types and Topics.
	 */
	public static function register_taxonomies(): void {

		self::register_editorial_type_taxonomy();
		self::register_editorial_topic_taxonomy();
	}

	/**
	 * Register the Editorial Type taxonomy.
	 */
	private static function register_editorial_type_taxonomy(): void {

		$labels = array(
			'name'                       => __( 'Editorial Types', 'greshma-core' ),
			'singular_name'              => __( 'Editorial Type', 'greshma-core' ),
			'search_items'               => __( 'Search Editorial Types', 'greshma-core' ),
			'popular_items'              => __( 'Popular Editorial Types', 'greshma-core' ),
			'all_items'                  => __( 'All Editorial Types', 'greshma-core' ),
			'parent_item'                => __( 'Parent Editorial Type', 'greshma-core' ),
			'parent_item_colon'          => __( 'Parent Editorial Type:', 'greshma-core' ),
			'edit_item'                  => __( 'Edit Editorial Type', 'greshma-core' ),
			'view_item'                  => __( 'View Editorial Type', 'greshma-core' ),
			'update_item'                => __( 'Update Editorial Type', 'greshma-core' ),
			'add_new_item'               => __( 'Add New Editorial Type', 'greshma-core' ),
			'new_item_name'              => __( 'New Editorial Type Name', 'greshma-core' ),
			'separate_items_with_commas' => __( 'Separate editorial types with commas', 'greshma-core' ),
			'add_or_remove_items'        => __( 'Add or remove editorial types', 'greshma-core' ),
			'choose_from_most_used'      => __( 'Choose from the most used editorial types', 'greshma-core' ),
			'not_found'                  => __( 'No editorial types found.', 'greshma-core' ),
			'no_terms'                   => __( 'No editorial types', 'greshma-core' ),
			'items_list_navigation'      => __( 'Editorial Types list navigation', 'greshma-core' ),
			'items_list'                 => __( 'Editorial Types list', 'greshma-core' ),
			'back_to_items'              => __( 'Back to Editorial Types', 'greshma-core' ),
			'menu_name'                  => __( 'Editorial Types', 'greshma-core' ),
		);

		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'publicly_queryable'=> true,
			'hierarchical'      => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => false,
			'show_in_rest'      => true,
			'query_var'         => true,
			'rewrite'           => array(
				'slug'         => 'editorial-type',
				'with_front'   => false,
				'hierarchical' => true,
			),
		);

		register_taxonomy(
			self::TYPE_TAXONOMY,
			array( Greshma_Core_Editorial::POST_TYPE ),
			$args
		);
	}

	/**
	 * Register the Editorial Topic taxonomy.
	 */
	private static function register_editorial_topic_taxonomy(): void {

		$labels = array(
			'name'                       => __( 'Topics', 'greshma-core' ),
			'singular_name'              => __( 'Topic', 'greshma-core' ),
			'search_items'               => __( 'Search Topics', 'greshma-core' ),
			'popular_items'              => __( 'Popular Topics', 'greshma-core' ),
			'all_items'                  => __( 'All Topics', 'greshma-core' ),
			'edit_item'                  => __( 'Edit Topic', 'greshma-core' ),
			'view_item'                  => __( 'View Topic', 'greshma-core' ),
			'update_item'                => __( 'Update Topic', 'greshma-core' ),
			'add_new_item'               => __( 'Add New Topic', 'greshma-core' ),
			'new_item_name'              => __( 'New Topic Name', 'greshma-core' ),
			'separate_items_with_commas' => __( 'Separate topics with commas', 'greshma-core' ),
			'add_or_remove_items'        => __( 'Add or remove topics', 'greshma-core' ),
			'choose_from_most_used'      => __( 'Choose from the most used topics', 'greshma-core' ),
			'not_found'                  => __( 'No topics found.', 'greshma-core' ),
			'no_terms'                   => __( 'No topics', 'greshma-core' ),
			'items_list_navigation'      => __( 'Topics list navigation', 'greshma-core' ),
			'items_list'                 => __( 'Topics list', 'greshma-core' ),
			'back_to_items'              => __( 'Back to Topics', 'greshma-core' ),
			'menu_name'                  => __( 'Topics', 'greshma-core' ),
		);

		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'publicly_queryable'=> true,
			'hierarchical'      => false,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'show_in_rest'      => true,
			'query_var'         => true,
			'rewrite'           => array(
				'slug'       => 'editorial-topic',
				'with_front' => false,
			),
		);

		register_taxonomy(
			self::TOPIC_TAXONOMY,
			array( Greshma_Core_Editorial::POST_TYPE ),
			$args
		);
	}

	/**
	 * Insert the default Editorial Type terms.
	 *
	 * Terms are inserted only when they do not already exist.
	 */
	public static function insert_default_editorial_types(): void {

		$default_types = array(
			'Reflection'       => 'reflection',
			'Field Story'      => 'field-story',
			'Impact Story'     => 'impact-story',
			'Story in Print'   => 'story-in-print',
			'LinkedIn Insight' => 'linkedin-insight',
			'Article'          => 'article',
			'Research'         => 'research',
			'Publication'      => 'publication',
			'Opinion'          => 'opinion',
		);

		foreach ( $default_types as $name => $slug ) {

			if ( term_exists( $slug, self::TYPE_TAXONOMY ) ) {
				continue;
			}

			wp_insert_term(
				$name,
				self::TYPE_TAXONOMY,
				array(
					'slug' => $slug,
				)
			);
		}
	}
}

Greshma_Core_Editorial_Taxonomy::init();