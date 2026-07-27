<?php
/**
 * Workshop custom fields.
 *
 * @package GreshmaCore
 */

defined( 'ABSPATH' ) || exit;

class Greshma_Core_Workshop_Meta {

	const POST_TYPE    = 'greshma_workshop';
	const NONCE_ACTION = 'greshma_save_workshop_details';
	const NONCE_NAME   = 'greshma_workshop_details_nonce';

	/**
	 * Register hooks.
	 */
	public static function init(): void {
		add_action( 'add_meta_boxes', array( __CLASS__, 'add_meta_boxes' ) );
		add_action( 'save_post_' . self::POST_TYPE, array( __CLASS__, 'save' ) );
	}

	/**
	 * Register meta boxes.
	 */
	public static function add_meta_boxes(): void {

		add_meta_box(
			'greshma_workshop_details',
			__( 'Workshop Details', 'greshma-core' ),
			array( __CLASS__, 'render_details' ),
			self::POST_TYPE,
			'normal',
			'high'
		);

		add_meta_box(
			'greshma_workshop_display',
			__( 'Display Settings', 'greshma-core' ),
			array( __CLASS__, 'render_display_settings' ),
			self::POST_TYPE,
			'side',
			'default'
		);
	}

	/**
	 * Render Workshop Details.
	 *
	 * @param WP_Post $post Current post.
	 */
	public static function render_details( WP_Post $post ): void {

		wp_nonce_field(
			self::NONCE_ACTION,
			self::NONCE_NAME
		);

		$audience = get_post_meta(
			$post->ID,
			'_greshma_workshop_audience',
			true
		);

		$duration = get_post_meta(
			$post->ID,
			'_greshma_workshop_duration',
			true
		);

		$display_order = get_post_meta(
			$post->ID,
			'_greshma_workshop_display_order',
			true
		);

		$format = get_post_meta(
			$post->ID,
			'_greshma_workshop_format',
			true
		);

		$availability = get_post_meta(
			$post->ID,
			'_greshma_workshop_availability',
			true
		);

		$booking_url = get_post_meta(
			$post->ID,
			'_greshma_workshop_booking_url',
			true
		);

		if ( empty( $format ) ) {
			$format = 'in-person';
		}
		?>

		<table class="form-table">

			<tr>
				<th>
					<label for="greshma_workshop_audience">
						<?php esc_html_e( 'Audience', 'greshma-core' ); ?>
					</label>
				</th>

				<td>
					<input
						type="text"
						id="greshma_workshop_audience"
						name="greshma_workshop_audience"
						value="<?php echo esc_attr( $audience ); ?>"
						class="regular-text"
						placeholder="Youth, educators, organizations"
					>

					<p class="description">
						<?php esc_html_e(
							'Who this workshop is designed for.',
							'greshma-core'
						); ?>
					</p>
				</td>
			</tr>

			<tr>
				<th>
					<label for="greshma_workshop_duration">
						<?php esc_html_e( 'Duration', 'greshma-core' ); ?>
					</label>
				</th>

				<td>
					<input
						type="text"
						id="greshma_workshop_duration"
						name="greshma_workshop_duration"
						value="<?php echo esc_attr( $duration ); ?>"
						class="regular-text"
						placeholder="2 hours / Half day / 2 days"
					>
				</td>
			</tr>

			<tr>
				<th>
					<label for="greshma_workshop_display_order">
						<?php esc_html_e( 'Display Order', 'greshma-core' ); ?>
					</label>
				</th>

				<td>
					<input
						type="number"
						min="0"
						step="1"
						id="greshma_workshop_display_order"
						name="greshma_workshop_display_order"
						value="<?php echo esc_attr( $display_order ); ?>"
						class="small-text"
						placeholder="1"
					>

					<p class="description">
						<?php esc_html_e(
							'Lower numbers appear first. Example: 1, 2, 3.',
							'greshma-core'
						); ?>
					</p>
				</td>
			</tr>

			<tr>
				<th>
					<label for="greshma_workshop_format">
						<?php esc_html_e( 'Format', 'greshma-core' ); ?>
					</label>
				</th>

				<td>
					<select
						id="greshma_workshop_format"
						name="greshma_workshop_format"
					>
						<option
							value="in-person"
							<?php selected( $format, 'in-person' ); ?>
						>
							<?php esc_html_e( 'In Person', 'greshma-core' ); ?>
						</option>

						<option
							value="online"
							<?php selected( $format, 'online' ); ?>
						>
							<?php esc_html_e( 'Online', 'greshma-core' ); ?>
						</option>

						<option
							value="hybrid"
							<?php selected( $format, 'hybrid' ); ?>
						>
							<?php esc_html_e( 'Hybrid', 'greshma-core' ); ?>
						</option>
					</select>
				</td>
			</tr>

			<tr>
				<th>
					<label for="greshma_workshop_availability">
						<?php esc_html_e(
							'Location / Availability',
							'greshma-core'
						); ?>
					</label>
				</th>

				<td>
					<input
						type="text"
						id="greshma_workshop_availability"
						name="greshma_workshop_availability"
						value="<?php echo esc_attr( $availability ); ?>"
						class="regular-text"
						placeholder="Available internationally / Bangalore / Online"
					>

					<p class="description">
						<?php esc_html_e(
							'Where or how this workshop can be delivered.',
							'greshma-core'
						); ?>
					</p>
				</td>
			</tr>

			<tr>
				<th>
					<label for="greshma_workshop_booking_url">
						<?php esc_html_e( 'Booking URL', 'greshma-core' ); ?>
					</label>
				</th>

				<td>
					<input
						type="url"
						id="greshma_workshop_booking_url"
						name="greshma_workshop_booking_url"
						value="<?php echo esc_attr( $booking_url ); ?>"
						class="regular-text"
						placeholder="https://example.com/contact"
					>

					<p class="description">
						<?php esc_html_e(
							'Optional enquiry or booking link.',
							'greshma-core'
						); ?>
					</p>
				</td>
			</tr>

		</table>

		<?php
	}

	/**
	 * Render sidebar display settings.
	 *
	 * @param WP_Post $post Current post.
	 */
	public static function render_display_settings( WP_Post $post ): void {

		$featured = get_post_meta(
			$post->ID,
			'_greshma_workshop_featured',
			true
		);
		?>

		<label>
			<input
				type="checkbox"
				name="greshma_workshop_featured"
				value="1"
				<?php checked( $featured, '1' ); ?>
			>

			<?php esc_html_e(
				'Featured Workshop',
				'greshma-core'
			); ?>
		</label>

		<p class="description">
			<?php esc_html_e(
				'Show this workshop in featured workshop areas.',
				'greshma-core'
			); ?>
		</p>

		<?php
	}

	/**
	 * Save custom fields.
	 *
	 * @param int $post_id Post ID.
	 */
	public static function save( int $post_id ): void {

		/*
		 * Verify nonce.
		 */
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

		/*
		 * Stop during autosave.
		 */
		if (
			defined( 'DOING_AUTOSAVE' ) &&
			DOING_AUTOSAVE
		) {
			return;
		}

		/*
		 * Verify permissions.
		 */
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		/*
		 * Text fields.
		 */
		$text_fields = array(
			'greshma_workshop_audience' =>
				'_greshma_workshop_audience',

			'greshma_workshop_duration' =>
				'_greshma_workshop_duration',

			'greshma_workshop_availability' =>
				'_greshma_workshop_availability',
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

		/*
		 * Display order.
		 */
		$display_order = isset(
			$_POST['greshma_workshop_display_order']
		)
			? absint(
				$_POST['greshma_workshop_display_order']
			)
			: 0;

		update_post_meta(
			$post_id,
			'_greshma_workshop_display_order',
			$display_order
		);

		/*
		 * Workshop format.
		 */
		$allowed_formats = array(
			'in-person',
			'online',
			'hybrid',
		);

		$format = isset(
			$_POST['greshma_workshop_format']
		)
			? sanitize_key(
				wp_unslash(
					$_POST['greshma_workshop_format']
				)
			)
			: 'in-person';

		if (
			! in_array(
				$format,
				$allowed_formats,
				true
			)
		) {
			$format = 'in-person';
		}

		update_post_meta(
			$post_id,
			'_greshma_workshop_format',
			$format
		);

		/*
		 * Booking URL.
		 */
		$booking_url = isset(
			$_POST['greshma_workshop_booking_url']
		)
			? esc_url_raw(
				wp_unslash(
					$_POST['greshma_workshop_booking_url']
				)
			)
			: '';

		update_post_meta(
			$post_id,
			'_greshma_workshop_booking_url',
			$booking_url
		);

		/*
		 * Featured status.
		 */
		update_post_meta(
			$post_id,
			'_greshma_workshop_featured',
			isset( $_POST['greshma_workshop_featured'] )
				? '1'
				: '0'
		);
	}
}

Greshma_Core_Workshop_Meta::init();