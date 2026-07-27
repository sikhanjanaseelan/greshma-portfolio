<?php
/**
 * Gallery custom fields.
 *
 * @package GreshmaCore
 */

defined( 'ABSPATH' ) || exit;

class Greshma_Core_Gallery_Meta {

	const POST_TYPE    = 'greshma_gallery';
	const NONCE_ACTION = 'greshma_save_gallery_details';
	const NONCE_NAME   = 'greshma_gallery_details_nonce';

	public static function init(): void {
		add_action( 'add_meta_boxes', array( __CLASS__, 'add_meta_boxes' ) );
		add_action( 'save_post_' . self::POST_TYPE, array( __CLASS__, 'save' ) );
	}

	public static function add_meta_boxes(): void {

		add_meta_box(
			'greshma_gallery_details',
			__( 'Gallery Details', 'greshma-core' ),
			array( __CLASS__, 'render_details' ),
			self::POST_TYPE,
			'normal',
			'high'
		);

		add_meta_box(
			'greshma_gallery_display',
			__( 'Display Settings', 'greshma-core' ),
			array( __CLASS__, 'render_display_settings' ),
			self::POST_TYPE,
			'side',
			'default'
		);
	}

	public static function render_details( WP_Post $post ): void {

		wp_nonce_field(
			self::NONCE_ACTION,
			self::NONCE_NAME
		);

		$caption  = get_post_meta( $post->ID, '_greshma_gallery_caption', true );
		$location = get_post_meta( $post->ID, '_greshma_gallery_location', true );
		$year     = get_post_meta( $post->ID, '_greshma_gallery_year', true );
		?>

		<table class="form-table">

			<tr>
				<th>
					<label for="greshma_gallery_caption">
						<?php esc_html_e( 'Caption', 'greshma-core' ); ?>
					</label>
				</th>

				<td>
					<textarea
						id="greshma_gallery_caption"
						name="greshma_gallery_caption"
						rows="4"
						class="large-text"
						placeholder="A short description of this moment or photograph."
					><?php echo esc_textarea( $caption ); ?></textarea>

					<p class="description">
						<?php esc_html_e(
							'Short text that can appear with the image in the gallery.',
							'greshma-core'
						); ?>
					</p>
				</td>
			</tr>

			<tr>
				<th>
					<label for="greshma_gallery_location">
						<?php esc_html_e( 'Location', 'greshma-core' ); ?>
					</label>
				</th>

				<td>
					<input
						type="text"
						id="greshma_gallery_location"
						name="greshma_gallery_location"
						value="<?php echo esc_attr( $location ); ?>"
						class="regular-text"
						placeholder="Bangalore, India"
					>
				</td>
			</tr>

			<tr>
				<th>
					<label for="greshma_gallery_year">
						<?php esc_html_e( 'Year', 'greshma-core' ); ?>
					</label>
				</th>

				<td>
					<input
						type="text"
						id="greshma_gallery_year"
						name="greshma_gallery_year"
						value="<?php echo esc_attr( $year ); ?>"
						class="small-text"
						placeholder="2026"
					>
				</td>
			</tr>

		</table>

		<?php
	}

	public static function render_display_settings( WP_Post $post ): void {

		$featured = get_post_meta(
			$post->ID,
			'_greshma_gallery_featured',
			true
		);
		?>

		<label>
			<input
				type="checkbox"
				name="greshma_gallery_featured"
				value="1"
				<?php checked( $featured, '1' ); ?>
			>

			<?php esc_html_e( 'Featured Gallery Image', 'greshma-core' ); ?>
		</label>

		<p class="description">
			<?php esc_html_e(
				'Use this image in featured gallery areas.',
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
					wp_unslash( $_POST[ self::NONCE_NAME ] )
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

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		$caption = isset( $_POST['greshma_gallery_caption'] )
			? sanitize_textarea_field(
				wp_unslash( $_POST['greshma_gallery_caption'] )
			)
			: '';

		$location = isset( $_POST['greshma_gallery_location'] )
			? sanitize_text_field(
				wp_unslash( $_POST['greshma_gallery_location'] )
			)
			: '';

		$year = isset( $_POST['greshma_gallery_year'] )
			? sanitize_text_field(
				wp_unslash( $_POST['greshma_gallery_year'] )
			)
			: '';

		update_post_meta(
			$post_id,
			'_greshma_gallery_caption',
			$caption
		);

		update_post_meta(
			$post_id,
			'_greshma_gallery_location',
			$location
		);

		update_post_meta(
			$post_id,
			'_greshma_gallery_year',
			$year
		);

		update_post_meta(
			$post_id,
			'_greshma_gallery_featured',
			isset( $_POST['greshma_gallery_featured'] )
				? '1'
				: '0'
		);
	}
}

Greshma_Core_Gallery_Meta::init();