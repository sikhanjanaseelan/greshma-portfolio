<?php
/**
 * Organization custom fields.
 *
 * @package GreshmaCore
 */

defined( 'ABSPATH' ) || exit;

class Greshma_Core_Organization_Meta {

	const POST_TYPE    = 'greshma_organization';
	const NONCE_ACTION = 'greshma_save_organization_details';
	const NONCE_NAME   = 'greshma_organization_details_nonce';

	public static function init(): void {
		add_action( 'add_meta_boxes', array( __CLASS__, 'add_meta_boxes' ) );
		add_action( 'save_post_' . self::POST_TYPE, array( __CLASS__, 'save' ) );
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'enqueue_media' ) );
	}

	public static function add_meta_boxes(): void {

		add_meta_box(
			'greshma_organization_details',
			__( 'Organization Details', 'greshma-core' ),
			array( __CLASS__, 'render' ),
			self::POST_TYPE,
			'normal',
			'high'
		);
	}

	public static function enqueue_media( string $hook ): void {

		if ( 'post.php' !== $hook && 'post-new.php' !== $hook ) {
			return;
		}

		$screen = get_current_screen();

		if ( ! $screen || self::POST_TYPE !== $screen->post_type ) {
			return;
		}

		wp_enqueue_media();
	}

	public static function render( WP_Post $post ): void {

		wp_nonce_field(
			self::NONCE_ACTION,
			self::NONCE_NAME
		);

		$role = get_post_meta(
			$post->ID,
			'_greshma_organization_role',
			true
		);

		$url = get_post_meta(
			$post->ID,
			'_greshma_organization_url',
			true
		);

		$logo_id = absint(
			get_post_meta(
				$post->ID,
				'_greshma_organization_logo_id',
				true
			)
		);

		$logo_url = $logo_id
			? wp_get_attachment_image_url( $logo_id, 'medium' )
			: '';
		?>

		<table class="form-table">

			<tr>
				<th>
					<label for="greshma_organization_role">
						<?php esc_html_e( 'Role / Position', 'greshma-core' ); ?>
					</label>
				</th>

				<td>
					<input
						type="text"
						id="greshma_organization_role"
						name="greshma_organization_role"
						value="<?php echo esc_attr( $role ); ?>"
						class="regular-text"
						placeholder="Community & Fellowship Manager"
					>
				</td>
			</tr>

			<tr>
				<th>
					<label for="greshma_organization_url">
						<?php esc_html_e( 'Organization URL', 'greshma-core' ); ?>
					</label>
				</th>

				<td>
					<input
						type="url"
						id="greshma_organization_url"
						name="greshma_organization_url"
						value="<?php echo esc_attr( $url ); ?>"
						class="regular-text"
						placeholder="https://example.org"
					>
				</td>
			</tr>

			<tr>
				<th>
					<?php esc_html_e( 'Organization Logo', 'greshma-core' ); ?>
				</th>

				<td>

					<div
						id="greshma-organization-logo-preview"
						style="margin-bottom:12px;"
					>
						<?php if ( $logo_url ) : ?>

							<img
								src="<?php echo esc_url( $logo_url ); ?>"
								alt=""
								style="max-width:180px;max-height:100px;width:auto;height:auto;"
							>

						<?php endif; ?>
					</div>

					<input
						type="hidden"
						id="greshma_organization_logo_id"
						name="greshma_organization_logo_id"
						value="<?php echo esc_attr( $logo_id ); ?>"
					>

					<button
						type="button"
						class="button"
						id="greshma-select-organization-logo"
					>
						<?php esc_html_e( 'Select Logo', 'greshma-core' ); ?>
					</button>

					<button
						type="button"
						class="button"
						id="greshma-remove-organization-logo"
						<?php echo $logo_id ? '' : 'style="display:none;"'; ?>
					>
						<?php esc_html_e( 'Remove Logo', 'greshma-core' ); ?>
					</button>

					<p class="description">
						<?php esc_html_e(
							'Select the organization logo from the WordPress Media Library.',
							'greshma-core'
						); ?>
					</p>

				</td>
			</tr>

		</table>

		<script>
		document.addEventListener('DOMContentLoaded', function () {

			const selectButton =
				document.getElementById('greshma-select-organization-logo');

			const removeButton =
				document.getElementById('greshma-remove-organization-logo');

			const logoInput =
				document.getElementById('greshma_organization_logo_id');

			const preview =
				document.getElementById('greshma-organization-logo-preview');

			if (!selectButton || !logoInput || !preview) {
				return;
			}

			let mediaFrame;

			selectButton.addEventListener('click', function (event) {

				event.preventDefault();

				if (mediaFrame) {
					mediaFrame.open();
					return;
				}

				mediaFrame = wp.media({
					title: 'Select Organization Logo',
					button: {
						text: 'Use this logo'
					},
					multiple: false,
					library: {
						type: 'image'
					}
				});

				mediaFrame.on('select', function () {

					const attachment =
						mediaFrame
							.state()
							.get('selection')
							.first()
							.toJSON();

					logoInput.value = attachment.id;

					let imageUrl = attachment.url;

					if (
						attachment.sizes &&
						attachment.sizes.medium
					) {
						imageUrl = attachment.sizes.medium.url;
					}

					preview.innerHTML =
						'<img src="' +
						imageUrl +
						'" alt="" style="max-width:180px;max-height:100px;width:auto;height:auto;">';

					if (removeButton) {
						removeButton.style.display = '';
					}
				});

				mediaFrame.open();
			});

			if (removeButton) {

				removeButton.addEventListener('click', function (event) {

					event.preventDefault();

					logoInput.value = '';
					preview.innerHTML = '';
					removeButton.style.display = 'none';
				});
			}
		});
		</script>

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

		$role = isset( $_POST['greshma_organization_role'] )
			? sanitize_text_field(
				wp_unslash(
					$_POST['greshma_organization_role']
				)
			)
			: '';

		update_post_meta(
			$post_id,
			'_greshma_organization_role',
			$role
		);

		$url = isset( $_POST['greshma_organization_url'] )
			? esc_url_raw(
				wp_unslash(
					$_POST['greshma_organization_url']
				)
			)
			: '';

		update_post_meta(
			$post_id,
			'_greshma_organization_url',
			$url
		);

		$logo_id = isset( $_POST['greshma_organization_logo_id'] )
			? absint( $_POST['greshma_organization_logo_id'] )
			: 0;

		update_post_meta(
			$post_id,
			'_greshma_organization_logo_id',
			$logo_id
		);
	}
}

Greshma_Core_Organization_Meta::init();