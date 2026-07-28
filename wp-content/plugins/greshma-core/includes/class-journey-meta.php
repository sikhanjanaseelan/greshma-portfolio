<?php
/**
 * Journey custom fields.
 *
 * @package GreshmaCore
 */

defined( 'ABSPATH' ) || exit;

class Greshma_Core_Journey_Meta {

	const POST_TYPE    = 'greshma_journey';
	const NONCE_ACTION = 'greshma_save_journey_details';
	const NONCE_NAME   = 'greshma_journey_details_nonce';

	public static function init(): void {
		add_action( 'add_meta_boxes', array( __CLASS__, 'add_meta_boxes' ) );
		add_action( 'save_post_' . self::POST_TYPE, array( __CLASS__, 'save' ) );
	}

	public static function add_meta_boxes(): void {

		add_meta_box(
			'greshma_journey_details',
			__( 'Journey Details', 'greshma-core' ),
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

		$period = get_post_meta(
			$post->ID,
			'_greshma_journey_period',
			true
		);

		$number = get_post_meta(
			$post->ID,
			'_greshma_journey_number',
			true
		);

		$icon = get_post_meta(
			$post->ID,
			'_greshma_journey_icon',
			true
		);

		$side = get_post_meta(
			$post->ID,
			'_greshma_journey_side',
			true
		);
		$order = get_post_meta(
	$post->ID,
	'_greshma_journey_order',
	true
);

		if ( ! in_array( $side, array( 'left', 'right' ), true ) ) {
			$side = 'left';
		}
		?>

		<table class="form-table">

			<tr>
				<th scope="row">
					<label for="greshma_journey_period">
						<?php esc_html_e( 'Period', 'greshma-core' ); ?>
					</label>
				</th>

				<td>
					<input
						type="text"
						id="greshma_journey_period"
						name="greshma_journey_period"
						value="<?php echo esc_attr( $period ); ?>"
						class="regular-text"
						placeholder="2024 – Present"
					>

					<p class="description">
						<?php esc_html_e(
							'Example: 2021 – 2023 or Today and Beyond.',
							'greshma-core'
						); ?>
					</p>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label for="greshma_journey_number">
						<?php esc_html_e( 'Timeline Number', 'greshma-core' ); ?>
					</label>
				</th>

				<td>
					<input
						type="text"
						id="greshma_journey_number"
						name="greshma_journey_number"
						value="<?php echo esc_attr( $number ); ?>"
						class="small-text"
						placeholder="01"
						maxlength="10"
					>

					<p class="description">
						<?php esc_html_e(
							'Example: 01, 02, 03.',
							'greshma-core'
						); ?>
					</p>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<label for="greshma_journey_icon">
						<?php esc_html_e( 'Timeline Icon', 'greshma-core' ); ?>
					</label>
				</th>

				<td>
					<input
						type="text"
						id="greshma_journey_icon"
						name="greshma_journey_icon"
						value="<?php echo esc_attr( $icon ); ?>"
						class="small-text"
						placeholder="◆"
						maxlength="10"
					>

					<p class="description">
						<?php esc_html_e(
							'Use a simple symbol such as ◆, ●, ◎, ★ or ♥.',
							'greshma-core'
						); ?>
					</p>
				</td>
			</tr>

			<tr>
				<th scope="row">
					<?php esc_html_e( 'Timeline Side', 'greshma-core' ); ?>
				</th>

				<td>
					<label>
						<input
							type="radio"
							name="greshma_journey_side"
							value="left"
							<?php checked( $side, 'left' ); ?>
						>
						<?php esc_html_e( 'Image on Left', 'greshma-core' ); ?>
					</label>

					<br>

					<label>
						<input
							type="radio"
							name="greshma_journey_side"
							value="right"
							<?php checked( $side, 'right' ); ?>
						>
						<?php esc_html_e( 'Image on Right', 'greshma-core' ); ?>
					</label>
				</td>
			</tr>
			<tr>
	<th scope="row">
		<label for="greshma_journey_order">
			<?php esc_html_e( 'Display Order', 'greshma-core' ); ?>
		</label>
	</th>

	<td>
		<input
			type="number"
			id="greshma_journey_order"
			name="greshma_journey_order"
			value="<?php echo esc_attr( $order ); ?>"
			class="small-text"
			min="0"
			step="1"
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

		</table>



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

		$period = isset( $_POST['greshma_journey_period'] )
			? sanitize_text_field(
				wp_unslash(
					$_POST['greshma_journey_period']
				)
			)
			: '';

		update_post_meta(
			$post_id,
			'_greshma_journey_period',
			$period
		);

		$number = isset( $_POST['greshma_journey_number'] )
			? sanitize_text_field(
				wp_unslash(
					$_POST['greshma_journey_number']
				)
			)
			: '';

		update_post_meta(
			$post_id,
			'_greshma_journey_number',
			$number
		);

		$icon = isset( $_POST['greshma_journey_icon'] )
			? sanitize_text_field(
				wp_unslash(
					$_POST['greshma_journey_icon']
				)
			)
			: '';

		update_post_meta(
			$post_id,
			'_greshma_journey_icon',
			$icon
		);

		$side = isset( $_POST['greshma_journey_side'] )
			? sanitize_key(
				wp_unslash(
					$_POST['greshma_journey_side']
				)
			)
			: 'left';

		if ( ! in_array( $side, array( 'left', 'right' ), true ) ) {
			$side = 'left';
		}

		update_post_meta(
			$post_id,
			'_greshma_journey_side',
			$side
		);
		$order = isset( $_POST['greshma_journey_order'] )
	? absint( $_POST['greshma_journey_order'] )
	: 0;

update_post_meta(
	$post_id,
	'_greshma_journey_order',
	$order
);
	}
}

Greshma_Core_Journey_Meta::init();