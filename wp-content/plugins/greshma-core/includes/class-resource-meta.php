<?php
/**
 * Resource custom fields.
 *
 * @package GreshmaCore
 */

defined( 'ABSPATH' ) || exit;

class Greshma_Core_Resource_Meta {

	const POST_TYPE    = 'greshma_resource';
	const NONCE_ACTION = 'greshma_save_resource_details';
	const NONCE_NAME   = 'greshma_resource_details_nonce';

	/**
	 * Initialize hooks.
	 */
	public static function init(): void {

		add_action(
			'add_meta_boxes',
			array( __CLASS__, 'add_meta_boxes' )
		);

		add_action(
			'save_post_' . self::POST_TYPE,
			array( __CLASS__, 'save' )
		);

		add_action(
			'admin_enqueue_scripts',
			array( __CLASS__, 'enqueue_admin_assets' )
		);
	}

	/**
	 * Register meta boxes.
	 */
	public static function add_meta_boxes(): void {

		add_meta_box(
			'greshma_resource_details',
			__( 'Resource Details', 'greshma-core' ),
			array( __CLASS__, 'render_details' ),
			self::POST_TYPE,
			'normal',
			'high'
		);

		add_meta_box(
			'greshma_resource_display',
			__( 'Display Settings', 'greshma-core' ),
			array( __CLASS__, 'render_display_settings' ),
			self::POST_TYPE,
			'side',
			'default'
		);
	}

	/**
	 * Load Media Library only on Resource edit screens.
	 *
	 * @param string $hook_suffix Current admin page.
	 */
	public static function enqueue_admin_assets(
		string $hook_suffix
	): void {

		if (
			'post.php' !== $hook_suffix &&
			'post-new.php' !== $hook_suffix
		) {
			return;
		}

		$screen = get_current_screen();

		if (
			! $screen ||
			self::POST_TYPE !== $screen->post_type
		) {
			return;
		}

		wp_enqueue_media();
		wp_enqueue_script( 'jquery' );

		$script = <<<'JS'
jQuery(function ($) {

	let resourceFrame;

	$(document).on(
		'click',
		'#greshma_resource_select_file',
		function (event) {

			event.preventDefault();

			if (resourceFrame) {
				resourceFrame.open();
				return;
			}

			resourceFrame = wp.media({
				title: 'Select Resource File',
				button: {
					text: 'Use this file'
				},
				multiple: false
			});

			resourceFrame.on('select', function () {

				const attachment = resourceFrame
					.state()
					.get('selection')
					.first()
					.toJSON();

				$('#greshma_resource_file_id')
					.val(attachment.id);

				$('#greshma_resource_file_url')
					.val(attachment.url);

				$('#greshma_resource_remove_file')
					.show();
			});

			resourceFrame.open();
		}
	);

	$(document).on(
		'click',
		'#greshma_resource_remove_file',
		function (event) {

			event.preventDefault();

			$('#greshma_resource_file_id').val('');
			$('#greshma_resource_file_url').val('');

			$(this).hide();
		}
	);
});
JS;

		wp_add_inline_script(
			'jquery',
			$script
		);
	}

	/**
	 * Render resource fields.
	 *
	 * @param WP_Post $post Current post.
	 */
	public static function render_details(
		WP_Post $post
	): void {

		wp_nonce_field(
			self::NONCE_ACTION,
			self::NONCE_NAME
		);

		$type = get_post_meta(
			$post->ID,
			'_greshma_resource_type',
			true
		);

		$author = get_post_meta(
			$post->ID,
			'_greshma_resource_author',
			true
		);

		$year = get_post_meta(
			$post->ID,
			'_greshma_resource_year',
			true
		);

		$external_url = get_post_meta(
			$post->ID,
			'_greshma_resource_external_url',
			true
		);

		$file_id = absint(
			get_post_meta(
				$post->ID,
				'_greshma_resource_file_id',
				true
			)
		);

		$display_order = get_post_meta(
			$post->ID,
			'_greshma_resource_display_order',
			true
		);

		$file_url = $file_id
			? wp_get_attachment_url( $file_id )
			: '';

		if ( empty( $type ) ) {
			$type = 'guide';
		}
		?>

		<table class="form-table">

			<tr>
				<th>
					<label for="greshma_resource_type">
						<?php esc_html_e(
							'Resource Type',
							'greshma-core'
						); ?>
					</label>
				</th>

				<td>
					<select
						id="greshma_resource_type"
						name="greshma_resource_type"
					>

						<option
							value="guide"
							<?php selected( $type, 'guide' ); ?>
						>
							Guide
						</option>

						<option
							value="toolkit"
							<?php selected( $type, 'toolkit' ); ?>
						>
							Toolkit
						</option>

						<option
							value="publication"
							<?php selected( $type, 'publication' ); ?>
						>
							Publication
						</option>

						<option
							value="report"
							<?php selected( $type, 'report' ); ?>
						>
							Report
						</option>

						<option
							value="research"
							<?php selected( $type, 'research' ); ?>
						>
							Research
						</option>

						<option
							value="download"
							<?php selected( $type, 'download' ); ?>
						>
							Download
						</option>

						<option
							value="other"
							<?php selected( $type, 'other' ); ?>
						>
							Other
						</option>

					</select>
				</td>
			</tr>

			<tr>
				<th>
					<label for="greshma_resource_author">
						<?php esc_html_e(
							'Author / Organization',
							'greshma-core'
						); ?>
					</label>
				</th>

				<td>
					<input
						type="text"
						id="greshma_resource_author"
						name="greshma_resource_author"
						value="<?php echo esc_attr( $author ); ?>"
						class="regular-text"
						placeholder="Author or organization name"
					>
				</td>
			</tr>

			<tr>
				<th>
					<label for="greshma_resource_year">
						<?php esc_html_e(
							'Publication Year',
							'greshma-core'
						); ?>
					</label>
				</th>

				<td>
					<input
						type="number"
						min="1900"
						max="2100"
						id="greshma_resource_year"
						name="greshma_resource_year"
						value="<?php echo esc_attr( $year ); ?>"
						class="small-text"
						placeholder="2026"
					>
				</td>
			</tr>

			<tr>
				<th>
					<label for="greshma_resource_external_url">
						<?php esc_html_e(
							'External URL',
							'greshma-core'
						); ?>
					</label>
				</th>

				<td>
					<input
						type="url"
						id="greshma_resource_external_url"
						name="greshma_resource_external_url"
						value="<?php echo esc_attr( $external_url ); ?>"
						class="regular-text"
						placeholder="https://example.com/resource"
					>

					<p class="description">
						Use this when the resource is hosted
						on another website.
					</p>
				</td>
			</tr>

			<tr>
				<th>
					<?php esc_html_e(
						'Downloadable File',
						'greshma-core'
					); ?>
				</th>

				<td>

					<input
						type="hidden"
						id="greshma_resource_file_id"
						name="greshma_resource_file_id"
						value="<?php echo esc_attr( $file_id ); ?>"
					>

					<input
						type="text"
						id="greshma_resource_file_url"
						value="<?php echo esc_attr( $file_url ); ?>"
						class="large-text"
						readonly
						placeholder="No file selected"
					>

					<p>

						<button
							type="button"
							class="button button-secondary"
							id="greshma_resource_select_file"
						>
							<?php esc_html_e(
								'Select File',
								'greshma-core'
							); ?>
						</button>

						<button
							type="button"
							class="button"
							id="greshma_resource_remove_file"
							<?php
							if ( ! $file_id ) {
								echo 'style="display:none;"';
							}
							?>
						>
							<?php esc_html_e(
								'Remove File',
								'greshma-core'
							); ?>
						</button>

					</p>

					<p class="description">
						Upload or select a PDF/document
						from the WordPress Media Library.
					</p>

				</td>
			</tr>

			<tr>
				<th>
					<label for="greshma_resource_display_order">
						<?php esc_html_e(
							'Display Order',
							'greshma-core'
						); ?>
					</label>
				</th>

				<td>
					<input
						type="number"
						min="0"
						step="1"
						id="greshma_resource_display_order"
						name="greshma_resource_display_order"
						value="<?php echo esc_attr( $display_order ); ?>"
						class="small-text"
						placeholder="1"
					>

					<p class="description">
						Lower numbers appear first.
					</p>
				</td>
			</tr>

		</table>

		<?php
	}

	/**
	 * Featured resource sidebar.
	 *
	 * @param WP_Post $post Current post.
	 */
	public static function render_display_settings(
		WP_Post $post
	): void {

		$featured = get_post_meta(
			$post->ID,
			'_greshma_resource_featured',
			true
		);
		?>

		<label>

			<input
				type="checkbox"
				name="greshma_resource_featured"
				value="1"
				<?php checked( $featured, '1' ); ?>
			>

			<?php esc_html_e(
				'Featured Resource',
				'greshma-core'
			); ?>

		</label>

		<p class="description">
			<?php esc_html_e(
				'Show this resource in featured areas.',
				'greshma-core'
			); ?>
		</p>

		<?php
	}

	/**
	 * Save Resource metadata.
	 *
	 * @param int $post_id Resource ID.
	 */
	public static function save(
		int $post_id
	): void {

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

		if (
			! current_user_can(
				'edit_post',
				$post_id
			)
		) {
			return;
		}

		/*
		 * Resource type.
		 */
		$allowed_types = array(
			'guide',
			'toolkit',
			'publication',
			'report',
			'research',
			'download',
			'other',
		);

		$type = isset(
			$_POST['greshma_resource_type']
		)
			? sanitize_key(
				wp_unslash(
					$_POST['greshma_resource_type']
				)
			)
			: 'guide';

		if (
			! in_array(
				$type,
				$allowed_types,
				true
			)
		) {
			$type = 'guide';
		}

		update_post_meta(
			$post_id,
			'_greshma_resource_type',
			$type
		);

		/*
		 * Author / Organization.
		 */
		$author = isset(
			$_POST['greshma_resource_author']
		)
			? sanitize_text_field(
				wp_unslash(
					$_POST['greshma_resource_author']
				)
			)
			: '';

		update_post_meta(
			$post_id,
			'_greshma_resource_author',
			$author
		);

		/*
		 * Publication year.
		 */
		$year = isset(
			$_POST['greshma_resource_year']
		)
			? absint(
				$_POST['greshma_resource_year']
			)
			: 0;

		update_post_meta(
			$post_id,
			'_greshma_resource_year',
			$year
		);

		/*
		 * External URL.
		 */
		$external_url = isset(
			$_POST['greshma_resource_external_url']
		)
			? esc_url_raw(
				wp_unslash(
					$_POST['greshma_resource_external_url']
				)
			)
			: '';

		update_post_meta(
			$post_id,
			'_greshma_resource_external_url',
			$external_url
		);

		/*
		 * Media Library attachment ID.
		 */
		$file_id = isset(
			$_POST['greshma_resource_file_id']
		)
			? absint(
				$_POST['greshma_resource_file_id']
			)
			: 0;

		update_post_meta(
			$post_id,
			'_greshma_resource_file_id',
			$file_id
		);

		/*
		 * Display order.
		 */
		$display_order = isset(
			$_POST['greshma_resource_display_order']
		)
			? absint(
				$_POST['greshma_resource_display_order']
			)
			: 0;

		update_post_meta(
			$post_id,
			'_greshma_resource_display_order',
			$display_order
		);

		/*
		 * Featured Resource.
		 */
		update_post_meta(
			$post_id,
			'_greshma_resource_featured',
			isset(
				$_POST['greshma_resource_featured']
			)
				? '1'
				: '0'
		);
	}
}

Greshma_Core_Resource_Meta::init();