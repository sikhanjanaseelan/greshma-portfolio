<?php
/**
 * Project custom fields.
 *
 * @package GreshmaCore
 */

defined( 'ABSPATH' ) || exit;

class Greshma_Core_Project_Meta {

	const POST_TYPE = 'greshma_project';

	const NONCE_ACTION = 'greshma_save_project_details';
	const NONCE_NAME   = 'greshma_project_details_nonce';

	public static function init(): void {
		add_action( 'add_meta_boxes', array( __CLASS__, 'add_meta_boxes' ) );
		add_action( 'save_post_' . self::POST_TYPE, array( __CLASS__, 'save' ) );
	}

	public static function add_meta_boxes(): void {

		add_meta_box(
			'greshma_project_details',
			__( 'Project Details', 'greshma-core' ),
			array( __CLASS__, 'render_details' ),
			self::POST_TYPE,
			'normal',
			'high'
		);

		add_meta_box(
			'greshma_project_display',
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

		$subtitle     = get_post_meta( $post->ID, '_greshma_project_subtitle', true );
		$year         = get_post_meta( $post->ID, '_greshma_project_year', true );
		$location     = get_post_meta( $post->ID, '_greshma_project_location', true );
		$role         = get_post_meta( $post->ID, '_greshma_project_role', true );
		$organization = get_post_meta( $post->ID, '_greshma_project_organization', true );
		$url          = get_post_meta( $post->ID, '_greshma_project_url', true );
		?>

		<table class="form-table">

			<tr>
				<th>
					<label for="greshma_project_subtitle">
						<?php esc_html_e( 'Subtitle', 'greshma-core' ); ?>
					</label>
				</th>
				<td>
					<input
						type="text"
						id="greshma_project_subtitle"
						name="greshma_project_subtitle"
						value="<?php echo esc_attr( $subtitle ); ?>"
						class="regular-text"
						placeholder="Youth-led climate initiative"
					>
				</td>
			</tr>

			<tr>
				<th>
					<label for="greshma_project_year">
						<?php esc_html_e( 'Year', 'greshma-core' ); ?>
					</label>
				</th>
				<td>
					<input
						type="text"
						id="greshma_project_year"
						name="greshma_project_year"
						value="<?php echo esc_attr( $year ); ?>"
						class="regular-text"
						placeholder="2025"
					>
				</td>
			</tr>

			<tr>
				<th>
					<label for="greshma_project_location">
						<?php esc_html_e( 'Location', 'greshma-core' ); ?>
					</label>
				</th>
				<td>
					<input
						type="text"
						id="greshma_project_location"
						name="greshma_project_location"
						value="<?php echo esc_attr( $location ); ?>"
						class="regular-text"
						placeholder="Bangalore, India"
					>
				</td>
			</tr>

			<tr>
				<th>
					<label for="greshma_project_role">
						<?php esc_html_e( 'Role', 'greshma-core' ); ?>
					</label>
				</th>
				<td>
					<input
						type="text"
						id="greshma_project_role"
						name="greshma_project_role"
						value="<?php echo esc_attr( $role ); ?>"
						class="regular-text"
						placeholder="Founder / Facilitator"
					>
				</td>
			</tr>

			<tr>
				<th>
					<label for="greshma_project_organization">
						<?php esc_html_e( 'Organization / Partner', 'greshma-core' ); ?>
					</label>
				</th>
				<td>
					<input
						type="text"
						id="greshma_project_organization"
						name="greshma_project_organization"
						value="<?php echo esc_attr( $organization ); ?>"
						class="regular-text"
						placeholder="Partner or organization name"
					>
				</td>
			</tr>

			<tr>
				<th>
					<label for="greshma_project_url">
						<?php esc_html_e( 'Project URL', 'greshma-core' ); ?>
					</label>
				</th>
				<td>
					<input
						type="url"
						id="greshma_project_url"
						name="greshma_project_url"
						value="<?php echo esc_attr( $url ); ?>"
						class="regular-text"
						placeholder="https://example.com"
					>
				</td>
			</tr>

		</table>

		<?php
	}

	public static function render_display_settings( WP_Post $post ): void {

		$featured = get_post_meta(
			$post->ID,
			'_greshma_project_featured',
			true
		);
		?>

		<label>
			<input
				type="checkbox"
				name="greshma_project_featured"
				value="1"
				<?php checked( $featured, '1' ); ?>
			>

			<?php esc_html_e( 'Featured Project', 'greshma-core' ); ?>
		</label>

		<p class="description">
			<?php esc_html_e(
				'Use this project in featured project sections.',
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

		$text_fields = array(
			'greshma_project_subtitle'     => '_greshma_project_subtitle',
			'greshma_project_year'         => '_greshma_project_year',
			'greshma_project_location'     => '_greshma_project_location',
			'greshma_project_role'         => '_greshma_project_role',
			'greshma_project_organization' => '_greshma_project_organization',
		);

		foreach ( $text_fields as $field => $meta_key ) {

			$value = isset( $_POST[ $field ] )
				? sanitize_text_field(
					wp_unslash( $_POST[ $field ] )
				)
				: '';

			update_post_meta(
				$post_id,
				$meta_key,
				$value
			);
		}

		$url = isset( $_POST['greshma_project_url'] )
			? esc_url_raw(
				wp_unslash( $_POST['greshma_project_url'] )
			)
			: '';

		update_post_meta(
			$post_id,
			'_greshma_project_url',
			$url
		);

		update_post_meta(
			$post_id,
			'_greshma_project_featured',
			isset( $_POST['greshma_project_featured'] )
				? '1'
				: '0'
		);
	}
}

Greshma_Core_Project_Meta::init();