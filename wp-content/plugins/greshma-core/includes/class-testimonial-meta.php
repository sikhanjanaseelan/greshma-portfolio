<?php
/**
 * Testimonial custom fields.
 *
 * @package GreshmaCore
 */

defined( 'ABSPATH' ) || exit;

class Greshma_Core_Testimonial_Meta {

	const POST_TYPE    = 'greshma_testimonial';
	const NONCE_ACTION = 'greshma_save_testimonial_details';
	const NONCE_NAME   = 'greshma_testimonial_details_nonce';

	public static function init(): void {
		add_action( 'add_meta_boxes', array( __CLASS__, 'add_meta_boxes' ) );
		add_action( 'save_post_' . self::POST_TYPE, array( __CLASS__, 'save' ) );
	}

	public static function add_meta_boxes(): void {

		add_meta_box(
			'greshma_testimonial_details',
			__( 'Testimonial Details', 'greshma-core' ),
			array( __CLASS__, 'render_details' ),
			self::POST_TYPE,
			'normal',
			'high'
		);

		add_meta_box(
			'greshma_testimonial_display',
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

		$role = get_post_meta(
			$post->ID,
			'_greshma_testimonial_role',
			true
		);

		$organization = get_post_meta(
			$post->ID,
			'_greshma_testimonial_organization',
			true
		);

		$display_order = get_post_meta(
			$post->ID,
			'_greshma_testimonial_display_order',
			true
		);
		?>

		<table class="form-table">

			<tr>
				<th>
					<label for="greshma_testimonial_role">
						<?php esc_html_e( 'Role / Position', 'greshma-core' ); ?>
					</label>
				</th>

				<td>
					<input
						type="text"
						id="greshma_testimonial_role"
						name="greshma_testimonial_role"
						value="<?php echo esc_attr( $role ); ?>"
						class="regular-text"
						placeholder="Director / Educator / Partner"
					>
				</td>
			</tr>

			<tr>
				<th>
					<label for="greshma_testimonial_organization">
						<?php esc_html_e( 'Organization', 'greshma-core' ); ?>
					</label>
				</th>

				<td>
					<input
						type="text"
						id="greshma_testimonial_organization"
						name="greshma_testimonial_organization"
						value="<?php echo esc_attr( $organization ); ?>"
						class="regular-text"
						placeholder="Organization name"
					>
				</td>
			</tr>

			<tr>
				<th>
					<label for="greshma_testimonial_display_order">
						<?php esc_html_e( 'Display Order', 'greshma-core' ); ?>
					</label>
				</th>

				<td>
					<input
						type="number"
						min="0"
						step="1"
						id="greshma_testimonial_display_order"
						name="greshma_testimonial_display_order"
						value="<?php echo esc_attr( $display_order ); ?>"
						class="small-text"
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

		<?php
	}

	public static function render_display_settings( WP_Post $post ): void {

		$featured = get_post_meta(
			$post->ID,
			'_greshma_testimonial_featured',
			true
		);
		?>

		<label>
			<input
				type="checkbox"
				name="greshma_testimonial_featured"
				value="1"
				<?php checked( $featured, '1' ); ?>
			>

			<?php esc_html_e(
				'Featured Testimonial',
				'greshma-core'
			); ?>
		</label>

		<p class="description">
			<?php esc_html_e(
				'Use this testimonial in featured testimonial sections.',
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

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		$role = isset(
			$_POST['greshma_testimonial_role']
		)
			? sanitize_text_field(
				wp_unslash(
					$_POST['greshma_testimonial_role']
				)
			)
			: '';

		update_post_meta(
			$post_id,
			'_greshma_testimonial_role',
			$role
		);

		$organization = isset(
			$_POST['greshma_testimonial_organization']
		)
			? sanitize_text_field(
				wp_unslash(
					$_POST['greshma_testimonial_organization']
				)
			)
			: '';

		update_post_meta(
			$post_id,
			'_greshma_testimonial_organization',
			$organization
		);

		$display_order = isset(
			$_POST['greshma_testimonial_display_order']
		)
			? absint(
				$_POST['greshma_testimonial_display_order']
			)
			: 0;

		update_post_meta(
			$post_id,
			'_greshma_testimonial_display_order',
			$display_order
		);

		update_post_meta(
			$post_id,
			'_greshma_testimonial_featured',
			isset(
				$_POST['greshma_testimonial_featured']
			)
				? '1'
				: '0'
		);
	}
}

Greshma_Core_Testimonial_Meta::init();