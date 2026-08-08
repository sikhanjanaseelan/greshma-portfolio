<?php
/**
 * Journey custom post type.
 *
 * @package GreshmaCore
 */

defined( 'ABSPATH' ) || exit;

class Greshma_Core_Journey {

	const POST_TYPE = 'greshma_journey';

	const YEAR_META = '_greshma_journey_year';


	/**
	 * Initialise Journey module.
	 *
	 * @return void
	 */
	public static function init(): void {

		add_action(
			'init',
			array( __CLASS__, 'register_post_type' )
		);

		add_action(
			'add_meta_boxes',
			array( __CLASS__, 'register_meta_boxes' )
		);

		add_action(
			'save_post_' . self::POST_TYPE,
			array( __CLASS__, 'save_meta' )
		);
	}


	/**
	 * Register Journey CPT.
	 *
	 * @return void
	 */
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

				'labels' => $labels,

				'public'              => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_admin_bar'   => true,
				'show_in_rest'        => true,

				'publicly_queryable'  => false,
				'exclude_from_search' => true,

				'has_archive' => false,
				'rewrite'     => false,

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


	/**
	 * Register Journey details meta box.
	 *
	 * @return void
	 */
	public static function register_meta_boxes(): void {

		add_meta_box(
			'greshma-journey-details',
			__( 'Journey Details', 'greshma-core' ),
			array( __CLASS__, 'render_details_meta_box' ),
			self::POST_TYPE,
			'side',
			'high'
		);
	}


	/**
	 * Render Journey details.
	 *
	 * @param WP_Post $post Current post.
	 *
	 * @return void
	 */
	public static function render_details_meta_box( $post ): void {

		$year = get_post_meta(
			$post->ID,
			self::YEAR_META,
			true
		);

		wp_nonce_field(
			'greshma_save_journey_details',
			'greshma_journey_nonce'
		);
		?>

		<p>

			<label for="greshma_journey_year">

				<strong>
					<?php
					esc_html_e(
						'Year / Period',
						'greshma-core'
					);
					?>
				</strong>

			</label>

		</p>


		<p>

			<input
				type="text"
				id="greshma_journey_year"
				name="greshma_journey_year"
				value="<?php echo esc_attr( $year ); ?>"
				class="widefat"
				placeholder="<?php esc_attr_e(
					'e.g. 2016 or Today',
					'greshma-core'
				); ?>"
			>

		</p>


		<p class="description">

			<?php
			esc_html_e(
				'Displayed on timelines such as Journey of Impact.',
				'greshma-core'
			);
			?>

		</p>

		<?php
	}


	/**
	 * Save Journey metadata.
	 *
	 * @param int $post_id Journey post ID.
	 *
	 * @return void
	 */
	public static function save_meta( $post_id ): void {

		if (
			! isset( $_POST['greshma_journey_nonce'] ) ||
			! wp_verify_nonce(
				sanitize_text_field(
					wp_unslash(
						$_POST['greshma_journey_nonce']
					)
				),
				'greshma_save_journey_details'
			)
		) {
			return;
		}


		if (
			defined( 'DOING_AUTOSAVE' ) &&
			DOING_AUTOSAVE
		) {
			return;
		}


		if (
			! current_user_can(
				'edit_post',
				$post_id
			)
		) {
			return;
		}


		if ( isset( $_POST['greshma_journey_year'] ) ) {

			$year = sanitize_text_field(
				wp_unslash(
					$_POST['greshma_journey_year']
				)
			);

			if ( '' !== $year ) {

				update_post_meta(
					$post_id,
					self::YEAR_META,
					$year
				);

			} else {

				delete_post_meta(
					$post_id,
					self::YEAR_META
				);
			}
		}
	}
}


Greshma_Core_Journey::init();