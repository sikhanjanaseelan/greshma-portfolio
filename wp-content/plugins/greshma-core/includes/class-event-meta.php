<?php
/**
 * Event custom fields.
 *
 * @package GreshmaCore
 */

defined( 'ABSPATH' ) || exit;

class Greshma_Core_Event_Meta {

	const POST_TYPE    = 'greshma_event';
	const NONCE_ACTION = 'greshma_save_event_details';
	const NONCE_NAME   = 'greshma_event_details_nonce';

	public static function init(): void {
		add_action( 'add_meta_boxes', array( __CLASS__, 'add_meta_boxes' ) );
		add_action( 'save_post_' . self::POST_TYPE, array( __CLASS__, 'save' ) );
	}

	public static function add_meta_boxes(): void {

		add_meta_box(
			'greshma_event_details',
			__( 'Event Details', 'greshma-core' ),
			array( __CLASS__, 'render_details' ),
			self::POST_TYPE,
			'normal',
			'high'
		);

		add_meta_box(
			'greshma_event_display',
			__( 'Display Settings', 'greshma-core' ),
			array( __CLASS__, 'render_display_settings' ),
			self::POST_TYPE,
			'side',
			'default'
		);
	}

	public static function render_details( WP_Post $post ): void {

		wp_nonce_field( self::NONCE_ACTION, self::NONCE_NAME );

		$start_date       = get_post_meta( $post->ID, '_greshma_event_start_date', true );
		$end_date         = get_post_meta( $post->ID, '_greshma_event_end_date', true );
		$start_time       = get_post_meta( $post->ID, '_greshma_event_start_time', true );
		$end_time         = get_post_meta( $post->ID, '_greshma_event_end_time', true );
		$venue            = get_post_meta( $post->ID, '_greshma_event_venue', true );
		$location         = get_post_meta( $post->ID, '_greshma_event_location', true );
		$format           = get_post_meta( $post->ID, '_greshma_event_format', true );
		$registration_url = get_post_meta( $post->ID, '_greshma_event_registration_url', true );

		if ( empty( $format ) ) {
			$format = 'in-person';
		}
		?>

		<table class="form-table">

			<tr>
				<th><label for="greshma_event_start_date">Start Date</label></th>
				<td>
					<input
						type="date"
						id="greshma_event_start_date"
						name="greshma_event_start_date"
						value="<?php echo esc_attr( $start_date ); ?>"
					>
				</td>
			</tr>

			<tr>
				<th><label for="greshma_event_end_date">End Date</label></th>
				<td>
					<input
						type="date"
						id="greshma_event_end_date"
						name="greshma_event_end_date"
						value="<?php echo esc_attr( $end_date ); ?>"
					>
					<p class="description">
						Leave empty for a one-day event.
					</p>
				</td>
			</tr>

			<tr>
				<th><label for="greshma_event_start_time">Start Time</label></th>
				<td>
					<input
						type="time"
						id="greshma_event_start_time"
						name="greshma_event_start_time"
						value="<?php echo esc_attr( $start_time ); ?>"
					>
				</td>
			</tr>

			<tr>
				<th><label for="greshma_event_end_time">End Time</label></th>
				<td>
					<input
						type="time"
						id="greshma_event_end_time"
						name="greshma_event_end_time"
						value="<?php echo esc_attr( $end_time ); ?>"
					>
				</td>
			</tr>

			<tr>
				<th><label for="greshma_event_venue">Venue</label></th>
				<td>
					<input
						type="text"
						id="greshma_event_venue"
						name="greshma_event_venue"
						value="<?php echo esc_attr( $venue ); ?>"
						class="regular-text"
						placeholder="Conference Hall / University / Online"
					>
				</td>
			</tr>

			<tr>
				<th><label for="greshma_event_location">Location</label></th>
				<td>
					<input
						type="text"
						id="greshma_event_location"
						name="greshma_event_location"
						value="<?php echo esc_attr( $location ); ?>"
						class="regular-text"
						placeholder="Warsaw, Poland"
					>
				</td>
			</tr>

			<tr>
				<th><label for="greshma_event_format">Event Format</label></th>
				<td>
					<select
						id="greshma_event_format"
						name="greshma_event_format"
					>
						<option value="in-person" <?php selected( $format, 'in-person' ); ?>>
							In Person
						</option>

						<option value="online" <?php selected( $format, 'online' ); ?>>
							Online
						</option>

						<option value="hybrid" <?php selected( $format, 'hybrid' ); ?>>
							Hybrid
						</option>
					</select>
				</td>
			</tr>

			<tr>
				<th><label for="greshma_event_registration_url">Registration URL</label></th>
				<td>
					<input
						type="url"
						id="greshma_event_registration_url"
						name="greshma_event_registration_url"
						value="<?php echo esc_attr( $registration_url ); ?>"
						class="regular-text"
						placeholder="https://example.com/register"
					>
				</td>
			</tr>

		</table>

		<?php
	}

	public static function render_display_settings( WP_Post $post ): void {

		$featured = get_post_meta(
			$post->ID,
			'_greshma_event_featured',
			true
		);

		$status = Greshma_Core_Events::get_status( $post->ID );
		?>

		<p>
			<strong><?php esc_html_e( 'Event Status:', 'greshma-core' ); ?></strong><br>
			<?php echo esc_html( $status['label'] ); ?>
		</p>

		<hr>

		<label>
			<input
				type="checkbox"
				name="greshma_event_featured"
				value="1"
				<?php checked( $featured, '1' ); ?>
			>
			<?php esc_html_e( 'Featured Event', 'greshma-core' ); ?>
		</label>

		<p class="description">
			<?php esc_html_e(
				'Use this event in featured or next-event areas.',
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

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		$text_fields = array(
			'greshma_event_start_date' => '_greshma_event_start_date',
			'greshma_event_end_date'   => '_greshma_event_end_date',
			'greshma_event_start_time' => '_greshma_event_start_time',
			'greshma_event_end_time'   => '_greshma_event_end_time',
			'greshma_event_venue'      => '_greshma_event_venue',
			'greshma_event_location'   => '_greshma_event_location',
		);

		foreach ( $text_fields as $field => $meta_key ) {

			$value = isset( $_POST[ $field ] )
				? sanitize_text_field( wp_unslash( $_POST[ $field ] ) )
				: '';

			update_post_meta( $post_id, $meta_key, $value );
		}

		$allowed_formats = array(
			'in-person',
			'online',
			'hybrid',
		);

		$format = isset( $_POST['greshma_event_format'] )
			? sanitize_key( wp_unslash( $_POST['greshma_event_format'] ) )
			: 'in-person';

		if ( ! in_array( $format, $allowed_formats, true ) ) {
			$format = 'in-person';
		}

		update_post_meta(
			$post_id,
			'_greshma_event_format',
			$format
		);

		$registration_url = isset( $_POST['greshma_event_registration_url'] )
			? esc_url_raw( wp_unslash( $_POST['greshma_event_registration_url'] ) )
			: '';

		update_post_meta(
			$post_id,
			'_greshma_event_registration_url',
			$registration_url
		);

		update_post_meta(
			$post_id,
			'_greshma_event_featured',
			isset( $_POST['greshma_event_featured'] )
				? '1'
				: '0'
		);
	}
}

Greshma_Core_Event_Meta::init();