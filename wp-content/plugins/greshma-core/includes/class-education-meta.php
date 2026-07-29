<?php
/**
 * Education custom fields.
 *
 * @package GreshmaCore
 */

defined( 'ABSPATH' ) || exit;

class Greshma_Core_Education_Meta {

	const POST_TYPE    = 'greshma_education';
	const NONCE_ACTION = 'greshma_save_education_details';
	const NONCE_NAME   = 'greshma_education_details_nonce';

	public static function init(): void {
		add_action( 'add_meta_boxes', array( __CLASS__, 'add_meta_boxes' ) );
		add_action( 'save_post_' . self::POST_TYPE, array( __CLASS__, 'save' ) );
	}

	public static function add_meta_boxes(): void {

		add_meta_box(
			'greshma_education_details',
			__( 'Education Details', 'greshma-core' ),
			array( __CLASS__, 'render' ),
			self::POST_TYPE,
			'normal',
			'high'
		);
	}

	public static function render( WP_Post $post ): void {

		wp_nonce_field(
			self::NONCE_ACTION,
			self::NONCE_NAME
		);

		$year = get_post_meta(
			$post->ID,
			'_greshma_education_year',
			true
		);

		$institution = get_post_meta(
			$post->ID,
			'_greshma_education_institution',
			true
		);

		$location = get_post_meta(
			$post->ID,
			'_greshma_education_location',
			true
		);

		$order = get_post_meta(
			$post->ID,
			'_greshma_education_order',
			true
		);
		?>

		<table class="form-table">

			<tr>
				<th scope="row">
					<label for="greshma_education_year">
						<?php esc_html_e( 'Year', 'greshma-core' ); ?>
					</label>
				</th>

				<td>
					<input
						type="text"
						id="greshma_education_year"
						name="greshma_education_year"
						value="<?php echo esc_attr( $year ); ?>"
						class="small-text"
						placeholder="2020"
					>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label for="greshma_education_institution">
						<?php esc_html_e( 'Institution', 'greshma-core' ); ?>
					</label>
				</th>

				<td>
					<input
						type="text"
						id="greshma_education_institution"
						name="greshma_education_institution"
						value="<?php echo esc_attr( $institution ); ?>"
						class="regular-text"
						placeholder="University for Peace"
					>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label for="greshma_education_location">
						<?php esc_html_e( 'Location / Country', 'greshma-core' ); ?>
					</label>
				</th>

				<td>
					<input
						type="text"
						id="greshma_education_location"
						name="greshma_education_location"
						value="<?php echo esc_attr( $location ); ?>"
						class="regular-text"
						placeholder="Costa Rica"
					>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label for="greshma_education_order">
						<?php esc_html_e( 'Display Order', 'greshma-core' ); ?>
					</label>
				</th>

				<td>
					<input
						type="number"
						id="greshma_education_order"
						name="greshma_education_order"
						value="<?php echo esc_attr( $order ); ?>"
						class="small-text"
						min="0"
						step="1"
						placeholder="1"
					>

					<p class="description">
						<?php esc_html_e(
							'Lower numbers appear first.',
							'greshma-core'
						); ?>
					</p>
				</td>
			</tr>

		</table>

		<p class="description">
			<?php esc_html_e(
				'Use the title for the degree or program name. Use the editor for optional additional details.',
				'greshma-core'
			); ?>
		</p>

		<?php
	}

	public static function save( int $post_id ): void {

		if (
			! isset( $_POST[ self::NONCE_NAME ] ) ||
			! wp_verify_nonce(
				sanitize_text_field(
					wp_unslash(
						$_POST[ self::NONCE_NAME ]
					)
				),
				self::NONCE_ACTION
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

		if ( wp_is_post_revision( $post_id ) ) {
			return;
		}

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		$year = isset( $_POST['greshma_education_year'] )
			? sanitize_text_field(
				wp_unslash(
					$_POST['greshma_education_year']
				)
			)
			: '';

		update_post_meta(
			$post_id,
			'_greshma_education_year',
			$year
		);

		$institution = isset( $_POST['greshma_education_institution'] )
			? sanitize_text_field(
				wp_unslash(
					$_POST['greshma_education_institution']
				)
			)
			: '';

		update_post_meta(
			$post_id,
			'_greshma_education_institution',
			$institution
		);

		$location = isset( $_POST['greshma_education_location'] )
			? sanitize_text_field(
				wp_unslash(
					$_POST['greshma_education_location']
				)
			)
			: '';

		update_post_meta(
			$post_id,
			'_greshma_education_location',
			$location
		);

		$order = isset( $_POST['greshma_education_order'] )
			? absint( $_POST['greshma_education_order'] )
			: 0;

		update_post_meta(
			$post_id,
			'_greshma_education_order',
			$order
		);
	}
}

Greshma_Core_Education_Meta::init();