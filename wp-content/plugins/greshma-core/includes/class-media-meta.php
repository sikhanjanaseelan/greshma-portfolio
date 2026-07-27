<?php
/**
 * Media custom fields.
 *
 * @package GreshmaCore
 */

defined( 'ABSPATH' ) || exit;

class Greshma_Core_Media_Meta {

	const POST_TYPE    = 'greshma_media';
	const NONCE_ACTION = 'greshma_save_media_details';
	const NONCE_NAME   = 'greshma_media_details_nonce';

	public static function init(): void {
		add_action( 'add_meta_boxes', array( __CLASS__, 'add_meta_boxes' ) );
		add_action( 'save_post_' . self::POST_TYPE, array( __CLASS__, 'save' ) );
	}

	public static function add_meta_boxes(): void {

		add_meta_box(
			'greshma_media_details',
			__( 'Media Details', 'greshma-core' ),
			array( __CLASS__, 'render_details' ),
			self::POST_TYPE,
			'normal',
			'high'
		);

		add_meta_box(
			'greshma_media_display',
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

		$type = get_post_meta(
			$post->ID,
			'_greshma_media_type',
			true
		);

		$publication = get_post_meta(
			$post->ID,
			'_greshma_media_publication',
			true
		);

		$date = get_post_meta(
			$post->ID,
			'_greshma_media_date',
			true
		);

		$external_url = get_post_meta(
			$post->ID,
			'_greshma_media_external_url',
			true
		);

		$video_url = get_post_meta(
			$post->ID,
			'_greshma_media_video_url',
			true
		);

		$display_order = get_post_meta(
			$post->ID,
			'_greshma_media_display_order',
			true
		);

		if ( empty( $type ) ) {
			$type = 'article';
		}
		?>

		<table class="form-table">

			<tr>
				<th>
					<label for="greshma_media_type">
						<?php esc_html_e( 'Media Type', 'greshma-core' ); ?>
					</label>
				</th>

				<td>
					<select
						id="greshma_media_type"
						name="greshma_media_type"
					>
						<option value="article" <?php selected( $type, 'article' ); ?>>
							Article
						</option>

						<option value="interview" <?php selected( $type, 'interview' ); ?>>
							Interview
						</option>

						<option value="podcast" <?php selected( $type, 'podcast' ); ?>>
							Podcast
						</option>

						<option value="video" <?php selected( $type, 'video' ); ?>>
							Video
						</option>

						<option value="press" <?php selected( $type, 'press' ); ?>>
							Press Feature
						</option>

						<option value="other" <?php selected( $type, 'other' ); ?>>
							Other
						</option>
					</select>
				</td>
			</tr>

			<tr>
				<th>
					<label for="greshma_media_publication">
						<?php esc_html_e(
							'Publication / Platform',
							'greshma-core'
						); ?>
					</label>
				</th>

				<td>
					<input
						type="text"
						id="greshma_media_publication"
						name="greshma_media_publication"
						value="<?php echo esc_attr( $publication ); ?>"
						class="regular-text"
						placeholder="Newspaper, magazine, podcast or platform name"
					>
				</td>
			</tr>

			<tr>
				<th>
					<label for="greshma_media_date">
						<?php esc_html_e(
							'Publication Date',
							'greshma-core'
						); ?>
					</label>
				</th>

				<td>
					<input
						type="date"
						id="greshma_media_date"
						name="greshma_media_date"
						value="<?php echo esc_attr( $date ); ?>"
					>
				</td>
			</tr>

			<tr>
				<th>
					<label for="greshma_media_external_url">
						<?php esc_html_e(
							'External URL',
							'greshma-core'
						); ?>
					</label>
				</th>

				<td>
					<input
						type="url"
						id="greshma_media_external_url"
						name="greshma_media_external_url"
						value="<?php echo esc_attr( $external_url ); ?>"
						class="regular-text"
						placeholder="https://example.com/article"
					>

					<p class="description">
						Link to the original article, interview or feature.
					</p>
				</td>
			</tr>

			<tr>
				<th>
					<label for="greshma_media_video_url">
						<?php esc_html_e(
							'Video / Embed URL',
							'greshma-core'
						); ?>
					</label>
				</th>

				<td>
					<input
						type="url"
						id="greshma_media_video_url"
						name="greshma_media_video_url"
						value="<?php echo esc_attr( $video_url ); ?>"
						class="regular-text"
						placeholder="https://youtube.com/..."
					>

					<p class="description">
						Optional. Use for YouTube, Vimeo or another video URL.
					</p>
				</td>
			</tr>

			<tr>
				<th>
					<label for="greshma_media_display_order">
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
						id="greshma_media_display_order"
						name="greshma_media_display_order"
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

	public static function render_display_settings( WP_Post $post ): void {

		$featured = get_post_meta(
			$post->ID,
			'_greshma_media_featured',
			true
		);
		?>

		<label>
			<input
				type="checkbox"
				name="greshma_media_featured"
				value="1"
				<?php checked( $featured, '1' ); ?>
			>

			<?php esc_html_e(
				'Featured Media',
				'greshma-core'
			); ?>
		</label>

		<p class="description">
			<?php esc_html_e(
				'Show this item in featured media areas.',
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

		/*
		 * Media type.
		 */
		$allowed_types = array(
			'article',
			'interview',
			'podcast',
			'video',
			'press',
			'other',
		);

		$type = isset( $_POST['greshma_media_type'] )
			? sanitize_key(
				wp_unslash( $_POST['greshma_media_type'] )
			)
			: 'article';

		if ( ! in_array( $type, $allowed_types, true ) ) {
			$type = 'article';
		}

		update_post_meta(
			$post_id,
			'_greshma_media_type',
			$type
		);

		/*
		 * Publication / Platform.
		 */
		$publication = isset(
			$_POST['greshma_media_publication']
		)
			? sanitize_text_field(
				wp_unslash(
					$_POST['greshma_media_publication']
				)
			)
			: '';

		update_post_meta(
			$post_id,
			'_greshma_media_publication',
			$publication
		);

		/*
		 * Publication date.
		 */
		$date = isset( $_POST['greshma_media_date'] )
			? sanitize_text_field(
				wp_unslash( $_POST['greshma_media_date'] )
			)
			: '';

		update_post_meta(
			$post_id,
			'_greshma_media_date',
			$date
		);

		/*
		 * External URL.
		 */
		$external_url = isset(
			$_POST['greshma_media_external_url']
		)
			? esc_url_raw(
				wp_unslash(
					$_POST['greshma_media_external_url']
				)
			)
			: '';

		update_post_meta(
			$post_id,
			'_greshma_media_external_url',
			$external_url
		);

		/*
		 * Video URL.
		 */
		$video_url = isset(
			$_POST['greshma_media_video_url']
		)
			? esc_url_raw(
				wp_unslash(
					$_POST['greshma_media_video_url']
				)
			)
			: '';

		update_post_meta(
			$post_id,
			'_greshma_media_video_url',
			$video_url
		);

		/*
		 * Display order.
		 */
		$display_order = isset(
			$_POST['greshma_media_display_order']
		)
			? absint(
				$_POST['greshma_media_display_order']
			)
			: 0;

		update_post_meta(
			$post_id,
			'_greshma_media_display_order',
			$display_order
		);

		/*
		 * Featured.
		 */
		update_post_meta(
			$post_id,
			'_greshma_media_featured',
			isset( $_POST['greshma_media_featured'] )
				? '1'
				: '0'
		);
	}
}

Greshma_Core_Media_Meta::init();