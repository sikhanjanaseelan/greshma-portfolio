<?php
/**
 * Recognition & Honors module.
 *
 * @package GreshmaCore
 */

defined( 'ABSPATH' ) || exit;

class Greshma_Core_Recognition {

	const POST_TYPE = 'greshma_recognition';

	const LABEL_META = '_greshma_recognition_label';
	const YEAR_META  = '_greshma_recognition_year';
	const URL_META   = '_greshma_recognition_url';


	/**
	 * Initialize module.
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
	 * Register Recognition CPT.
	 */
	public static function register_post_type(): void {

		$labels = array(
			'name'                  => __( 'Recognitions', 'greshma-core' ),
			'singular_name'         => __( 'Recognition', 'greshma-core' ),
			'menu_name'             => __( 'Recognitions', 'greshma-core' ),
			'name_admin_bar'        => __( 'Recognition', 'greshma-core' ),

			'add_new'               => __( 'Add New', 'greshma-core' ),
			'add_new_item'          => __( 'Add New Recognition', 'greshma-core' ),
			'edit_item'             => __( 'Edit Recognition', 'greshma-core' ),
			'new_item'              => __( 'New Recognition', 'greshma-core' ),
			'all_items'             => __( 'All Recognitions', 'greshma-core' ),
			'search_items'          => __( 'Search Recognitions', 'greshma-core' ),

			'not_found'             => __( 'No recognitions found.', 'greshma-core' ),
			'not_found_in_trash'    => __( 'No recognitions found in Trash.', 'greshma-core' ),

			'featured_image'        => __( 'Recognition Logo / Image', 'greshma-core' ),
			'set_featured_image'    => __( 'Set recognition logo / image', 'greshma-core' ),
			'remove_featured_image' => __( 'Remove recognition logo / image', 'greshma-core' ),
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

				'menu_icon' => 'dashicons-awards',

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
	 * Register meta boxes.
	 */
	public static function register_meta_boxes(): void {

		add_meta_box(
			'greshma-recognition-details',
			__( 'Recognition Details', 'greshma-core' ),
			array( __CLASS__, 'render_meta_box' ),
			self::POST_TYPE,
			'normal',
			'high'
		);
	}


	/**
	 * Render recognition fields.
	 *
	 * @param WP_Post $post Current post.
	 */
	public static function render_meta_box( $post ): void {

		$label = get_post_meta(
			$post->ID,
			self::LABEL_META,
			true
		);

		$year = get_post_meta(
			$post->ID,
			self::YEAR_META,
			true
		);

		$url = get_post_meta(
			$post->ID,
			self::URL_META,
			true
		);


		wp_nonce_field(
			'greshma_save_recognition',
			'greshma_recognition_nonce'
		);
		?>

		<table class="form-table">

			<tr>

				<th>
					<label for="greshma_recognition_label">
						<?php esc_html_e(
							'Recognition Label',
							'greshma-core'
						); ?>
					</label>
				</th>

				<td>

					<input
						type="text"
						id="greshma_recognition_label"
						name="greshma_recognition_label"
						value="<?php echo esc_attr( $label ); ?>"
						class="regular-text"
						placeholder="Leadership Recognition"
					>

					<p class="description">
						Examples: Leadership Recognition,
						Sustainability Recognition,
						Global Recognition.
					</p>

				</td>

			</tr>


			<tr>

				<th>
					<label for="greshma_recognition_year">
						<?php esc_html_e(
							'Year',
							'greshma-core'
						); ?>
					</label>
				</th>

				<td>

					<input
						type="text"
						id="greshma_recognition_year"
						name="greshma_recognition_year"
						value="<?php echo esc_attr( $year ); ?>"
						class="small-text"
						placeholder="2024"
					>

					<p class="description">
						Optional.
					</p>

				</td>

			</tr>


			<tr>

				<th>
					<label for="greshma_recognition_url">
						<?php esc_html_e(
							'External URL',
							'greshma-core'
						); ?>
					</label>
				</th>

				<td>

					<input
						type="url"
						id="greshma_recognition_url"
						name="greshma_recognition_url"
						value="<?php echo esc_attr( $url ); ?>"
						class="regular-text"
						placeholder="https://..."
					>

					<p class="description">
						Optional link to the organization,
						award or recognition page.
					</p>

				</td>

			</tr>

		</table>

		<?php
	}


	/**
	 * Save recognition metadata.
	 *
	 * @param int $post_id Post ID.
	 */
	public static function save_meta( $post_id ): void {

		if (
			! isset( $_POST['greshma_recognition_nonce'] ) ||
			! wp_verify_nonce(
				sanitize_text_field(
					wp_unslash(
						$_POST['greshma_recognition_nonce']
					)
				),
				'greshma_save_recognition'
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


		$fields = array(

			self::LABEL_META => array(
				'input'    => 'greshma_recognition_label',
				'sanitize' => 'sanitize_text_field',
			),

			self::YEAR_META => array(
				'input'    => 'greshma_recognition_year',
				'sanitize' => 'sanitize_text_field',
			),

			self::URL_META => array(
				'input'    => 'greshma_recognition_url',
				'sanitize' => 'esc_url_raw',
			),
		);


		foreach ( $fields as $meta_key => $field ) {

			if ( ! isset( $_POST[ $field['input'] ] ) ) {
				continue;
			}


			$value = call_user_func(
				$field['sanitize'],
				wp_unslash(
					$_POST[ $field['input'] ]
				)
			);


			if ( '' !== $value ) {

				update_post_meta(
					$post_id,
					$meta_key,
					$value
				);

			} else {

				delete_post_meta(
					$post_id,
					$meta_key
				);
			}
		}
	}
}


Greshma_Core_Recognition::init();