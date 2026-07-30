<?php
/**
 * Editorial editor controller.
 *
 * Adds custom fields and editor enhancements to the Editorial post type.
 *
 * @package GreshmaCore
 */

defined( 'ABSPATH' ) || exit;

/**
 * Controls the Editorial editing experience.
 */
class Greshma_Core_Editorial_Editor {

	/**
	 * Nonce action.
	 */
	const NONCE_ACTION = 'greshma_save_editorial_details';

	/**
	 * Nonce field name.
	 */
	const NONCE_NAME = 'greshma_editorial_details_nonce';

	/**
	 * Register WordPress hooks.
	 */
	public static function init(): void {

		add_action(
			'add_meta_boxes',
			array( __CLASS__, 'register_meta_boxes' )
		);

		add_action(
			'save_post_' . Greshma_Core_Editorial::POST_TYPE,
			array( __CLASS__, 'save_editorial_details' ),
			10,
			2
		);

		add_filter(
			'enter_title_here',
			array( __CLASS__, 'change_title_placeholder' ),
			10,
			2
		);

 add_action(
	'wp_after_insert_post',
	array( __CLASS__, 'assign_editorial_type_to_new_post' ),
	10,
	4
);
	}

	/**
	 * Register Editorial meta boxes.
	 */
	public static function register_meta_boxes(): void {

    add_meta_box(
	'greshma-editorial-reading-details',
	__( 'Reading Details', 'greshma-core' ),
	array( __CLASS__, 'render_reading_details' ),
	Greshma_Core_Editorial::POST_TYPE,
	'side',
	'default'
);

		add_meta_box(
			'greshma-editorial-details',
			__( 'Editorial Details', 'greshma-core' ),
			array( __CLASS__, 'render_editorial_details' ),
			Greshma_Core_Editorial::POST_TYPE,
			'normal',
			'high'
		);
	}

	/**
	 * Render the Editorial Details meta box.
	 *
	 * @param WP_Post $post Current post object.
	 */
	public static function render_editorial_details( $post ): void {

		wp_nonce_field(
			self::NONCE_ACTION,
			self::NONCE_NAME
		);

		$summary = get_post_meta(
			$post->ID,
			'_greshma_editorial_summary',
			true
		);

		$source_name = get_post_meta(
			$post->ID,
			'_greshma_editorial_source_name',
			true
		);

		$external_url = get_post_meta(
			$post->ID,
			'_greshma_editorial_external_url',
			true
		);

		$publication_date = get_post_meta(
			$post->ID,
			'_greshma_editorial_publication_date',
			true
		);
		?>

		<div class="greshma-editorial-fields">

			<p>
				<label for="greshma-editorial-summary">
					<strong>
						<?php
						esc_html_e(
							'Short Summary',
							'greshma-core'
						);
						?>
					</strong>
				</label>
			</p>

			<p>
				<textarea
					id="greshma-editorial-summary"
					name="greshma_editorial_summary"
					rows="4"
					class="widefat"
					placeholder="<?php
					echo esc_attr__(
						'Write a short introduction or summary for archive cards and featured sections.',
						'greshma-core'
					);
					?>"
				><?php echo esc_textarea( $summary ); ?></textarea>
			</p>

			<p class="description">
				<?php
				esc_html_e(
					'Keep this concise. A maximum of two or three sentences is recommended.',
					'greshma-core'
				);
				?>
			</p>

			<hr>

			<div class="greshma-editorial-fields__row">

				<div class="greshma-editorial-fields__field">

					<p>
						<label for="greshma-editorial-source-name">
							<strong>
								<?php
								esc_html_e(
									'Source or Publication',
									'greshma-core'
								);
								?>
							</strong>
						</label>
					</p>

					<p>
						<input
							type="text"
							id="greshma-editorial-source-name"
							name="greshma_editorial_source_name"
							value="<?php echo esc_attr( $source_name ); ?>"
							class="widefat"
							placeholder="<?php
							echo esc_attr__(
								'Example: LinkedIn, Newspaper or Magazine',
								'greshma-core'
							);
							?>"
						>
					</p>

				</div>

				<div class="greshma-editorial-fields__field">

					<p>
						<label for="greshma-editorial-publication-date">
							<strong>
								<?php
								esc_html_e(
									'Original Publication Date',
									'greshma-core'
								);
								?>
							</strong>
						</label>
					</p>

					<p>
						<input
							type="date"
							id="greshma-editorial-publication-date"
							name="greshma_editorial_publication_date"
							value="<?php echo esc_attr( $publication_date ); ?>"
							class="widefat"
						>
					</p>

				</div>

			</div>

			<p>
				<label for="greshma-editorial-external-url">
					<strong>
						<?php
						esc_html_e(
							'External Content URL',
							'greshma-core'
						);
						?>
					</strong>
				</label>
			</p>

			<p>
				<input
					type="url"
					id="greshma-editorial-external-url"
					name="greshma_editorial_external_url"
					value="<?php echo esc_url( $external_url ); ?>"
					class="widefat"
					placeholder="https://example.com/article"
				>
			</p>

			<p class="description">
				<?php
				esc_html_e(
					'Use this when the original story, article or insight is published on another website.',
					'greshma-core'
				);
				?>
			</p>

		</div>

		<?php
	}
/**
 * Render the Editorial Reading Details meta box.
 *
 * @param WP_Post $post Current Editorial post.
 */
public static function render_reading_details( $post ): void {

	$calculated_time = (int) get_post_meta(
		$post->ID,
		'_greshma_editorial_reading_time',
		true
	);

	$manual_time = (int) get_post_meta(
		$post->ID,
		'_greshma_editorial_reading_time_override',
		true
	);

	if ( $calculated_time < 1 ) {
		$calculated_time = self::calculate_reading_time(
			$post->post_content
		);
	}

	$effective_time = $manual_time > 0
		? $manual_time
		: $calculated_time;
	?>

	<div class="greshma-editorial-reading-details">

		<p>
			<strong>
				<?php esc_html_e( 'Current reading time', 'greshma-core' ); ?>
			</strong>
		</p>

		<p>
			<span
				style="
					display:inline-block;
					padding:7px 11px;
					background:#f0f6f4;
					border-radius:20px;
					font-weight:600;
				"
			>
				<?php
				printf(
					/* translators: %d is the reading time in minutes. */
					esc_html(
						_n(
							'%d minute read',
							'%d minutes read',
							$effective_time,
							'greshma-core'
						)
					),
					$effective_time
				);
				?>
			</span>
		</p>

		<hr>

		<p>
			<label for="greshma-editorial-reading-time-override">
				<strong>
					<?php
					esc_html_e(
						'Manual override',
						'greshma-core'
					);
					?>
				</strong>
			</label>
		</p>

		<p>
			<input
				type="number"
				id="greshma-editorial-reading-time-override"
				name="greshma_editorial_reading_time_override"
				value="<?php echo esc_attr( $manual_time ?: '' ); ?>"
				min="1"
				step="1"
				class="small-text"
			>

			<?php esc_html_e( 'minutes', 'greshma-core' ); ?>
		</p>

		<p class="description">
			<?php
			esc_html_e(
				'Leave empty to calculate the reading time automatically from the main content.',
				'greshma-core'
			);
			?>
		</p>

		<p class="description">
			<?php
			printf(
				/* translators: %d is the automatic reading time. */
				esc_html__(
					'Automatic estimate: %d minutes.',
					'greshma-core'
				),
				$calculated_time
			);
			?>
		</p>

	</div>

	<?php
}
	/**
	 * Save Editorial custom fields.
	 *
	 * @param int     $post_id Current post ID.
	 * @param WP_Post $post    Current post object.
	 */
	public static function save_editorial_details(
		int $post_id,
		$post
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

		if ( wp_is_post_revision( $post_id ) ) {
			return;
		}

		if (
			Greshma_Core_Editorial::POST_TYPE !==
			$post->post_type
		) {
			return;
		}

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		self::save_textarea_field(
			$post_id,
			'greshma_editorial_summary',
			'_greshma_editorial_summary'
		);

		self::save_text_field(
			$post_id,
			'greshma_editorial_source_name',
			'_greshma_editorial_source_name'
		);

		self::save_url_field(
			$post_id,
			'greshma_editorial_external_url',
			'_greshma_editorial_external_url'
		);

		self::save_text_field(
			$post_id,
			'greshma_editorial_publication_date',
			'_greshma_editorial_publication_date'
		);
        self::save_positive_integer_field(
	$post_id,
	'greshma_editorial_reading_time_override',
	'_greshma_editorial_reading_time_override'
);

$calculated_reading_time = self::calculate_reading_time(
	$post->post_content
);

update_post_meta(
	$post_id,
	'_greshma_editorial_reading_time',
	$calculated_reading_time
);
	}

	/**
	 * Save a plain-text field.
	 *
	 * @param int    $post_id  Current post ID.
	 * @param string $form_key Form field name.
	 * @param string $meta_key Database meta key.
	 */
	private static function save_text_field(
		int $post_id,
		string $form_key,
		string $meta_key
	): void {

		if ( ! isset( $_POST[ $form_key ] ) ) {
			delete_post_meta( $post_id, $meta_key );
			return;
		}

		$value = sanitize_text_field(
			wp_unslash( $_POST[ $form_key ] )
		);

		if ( '' === $value ) {
			delete_post_meta( $post_id, $meta_key );
			return;
		}

		update_post_meta( $post_id, $meta_key, $value );
	}

	/**
	 * Save a textarea field.
	 *
	 * @param int    $post_id  Current post ID.
	 * @param string $form_key Form field name.
	 * @param string $meta_key Database meta key.
	 */
	private static function save_textarea_field(
		int $post_id,
		string $form_key,
		string $meta_key
	): void {

		if ( ! isset( $_POST[ $form_key ] ) ) {
			delete_post_meta( $post_id, $meta_key );
			return;
		}

		$value = sanitize_textarea_field(
			wp_unslash( $_POST[ $form_key ] )
		);

		if ( '' === $value ) {
			delete_post_meta( $post_id, $meta_key );
			return;
		}

		update_post_meta( $post_id, $meta_key, $value );
	}

	/**
	 * Save a URL field.
	 *
	 * @param int    $post_id  Current post ID.
	 * @param string $form_key Form field name.
	 * @param string $meta_key Database meta key.
	 */
	private static function save_url_field(
		int $post_id,
		string $form_key,
		string $meta_key
	): void {

		if ( ! isset( $_POST[ $form_key ] ) ) {
			delete_post_meta( $post_id, $meta_key );
			return;
		}

		$value = esc_url_raw(
			wp_unslash( $_POST[ $form_key ] )
		);

		if ( '' === $value ) {
			delete_post_meta( $post_id, $meta_key );
			return;
		}

		update_post_meta( $post_id, $meta_key, $value );
	}

	/**
	 * Change the Editorial title placeholder.
	 *
	 * @param string  $placeholder Existing placeholder.
	 * @param WP_Post $post        Current post object.
	 *
	 * @return string
	 */
	public static function change_title_placeholder(
		string $placeholder,
		$post
	): string {

		if (
			$post &&
			Greshma_Core_Editorial::POST_TYPE ===
			$post->post_type
		) {
			return __(
				'Enter the editorial title',
				'greshma-core'
			);
		}

		return $placeholder;
	}

    /**
 * Preselect an Editorial Type when opening the editor
 * from a Content Studio quick-action button.
 */
/**
 * Preselect the Editorial Type when the editor is opened
 * from a Content Studio quick-action button.
 *
 * @param string $hook_suffix Current WordPress admin page hook.
 */
public static function preselect_editorial_type(
	string $hook_suffix
): void {

	if ( 'post-new.php' !== $hook_suffix ) {
		return;
	}

	$post_type = isset( $_GET['post_type'] )
		? sanitize_key( wp_unslash( $_GET['post_type'] ) )
		: '';

	$editorial_type = isset( $_GET['editorial_type'] )
		? sanitize_title( wp_unslash( $_GET['editorial_type'] ) )
		: '';

	if (
		Greshma_Core_Editorial::POST_TYPE !== $post_type ||
		'' === $editorial_type
	) {
		return;
	}

	$taxonomy_name =
		Greshma_Core_Editorial_Taxonomy::TYPE_TAXONOMY;

	$term = get_term_by(
		'slug',
		$editorial_type,
		$taxonomy_name
	);

	if ( ! $term || is_wp_error( $term ) ) {
		return;
	}

	$taxonomy = get_taxonomy( $taxonomy_name );

	if ( ! $taxonomy ) {
		return;
	}

	/*
	 * Gutenberg stores taxonomy values using the taxonomy REST base.
	 */
	$rest_base = ! empty( $taxonomy->rest_base )
		? $taxonomy->rest_base
		: $taxonomy_name;

	$term_id = (int) $term->term_id;

	$script = sprintf(
		"
		wp.domReady(function () {
			if (
				typeof wp === 'undefined' ||
				! wp.data ||
				! wp.data.dispatch('core/editor')
			) {
				return;
			}

			wp.data.dispatch('core/editor').editPost({
				%1\$s: [%2\$d]
			});
		});
		",
		wp_json_encode( $rest_base ),
		$term_id
	);

	wp_add_inline_script(
		'wp-edit-post',
		$script,
		'after'
	);
}

/**
 * Assign an Editorial Type to a new Editorial auto-draft.
 *
 * This runs when an Add button is clicked from Content Studio,
 * for example:
 *
 * post-new.php?post_type=editorial&editorial_type=research
 *
 * @param int          $post_id     Post ID.
 * @param WP_Post      $post        Current post object.
 * @param bool         $update      Whether this is an existing post update.
 * @param WP_Post|null $post_before Previous post object.
 */
public static function assign_editorial_type_to_new_post(
	int $post_id,
	$post,
	bool $update,
	$post_before
): void {

	if (
		Greshma_Core_Editorial::POST_TYPE !== $post->post_type
	) {
		return;
	}

	/*
	 * Only assign the term when WordPress first creates
	 * the new Editorial auto-draft.
	 */
	if ( 'auto-draft' !== $post->post_status ) {
		return;
	}

	if ( ! isset( $_GET['editorial_type'] ) ) {
		return;
	}

	$editorial_type = sanitize_title(
		wp_unslash( $_GET['editorial_type'] )
	);

	if ( '' === $editorial_type ) {
		return;
	}

	$term = get_term_by(
		'slug',
		$editorial_type,
		Greshma_Core_Editorial_Taxonomy::TYPE_TAXONOMY
	);

	if ( ! $term || is_wp_error( $term ) ) {
		return;
	}

	wp_set_object_terms(
		$post_id,
		array( (int) $term->term_id ),
		Greshma_Core_Editorial_Taxonomy::TYPE_TAXONOMY,
		false
	);
}

/**
 * Calculate reading time from Editorial content.
 *
 * The calculation uses an average reading speed of
 * 220 words per minute.
 *
 * @param string $content Editorial post content.
 *
 * @return int Reading time in minutes.
 */
private static function calculate_reading_time(
	string $content
): int {

	$content = strip_shortcodes( $content );
	$content = wp_strip_all_tags( $content );
	$content = trim( $content );

	if ( '' === $content ) {
		return 1;
	}

	$words = preg_split(
		'/\s+/u',
		$content,
		-1,
		PREG_SPLIT_NO_EMPTY
	);

	$word_count = is_array( $words )
		? count( $words )
		: 0;

	$reading_time = (int) ceil( $word_count / 220 );

	return max( 1, $reading_time );
}
/**
 * Save a positive integer field.
 *
 * @param int    $post_id  Current post ID.
 * @param string $form_key Submitted form field name.
 * @param string $meta_key Database meta key.
 */
private static function save_positive_integer_field(
	int $post_id,
	string $form_key,
	string $meta_key
): void {

	if (
		! isset( $_POST[ $form_key ] ) ||
		'' === trim(
			(string) wp_unslash( $_POST[ $form_key ] )
		)
	) {
		delete_post_meta( $post_id, $meta_key );
		return;
	}

	$value = absint(
		wp_unslash( $_POST[ $form_key ] )
	);

	if ( $value < 1 ) {
		delete_post_meta( $post_id, $meta_key );
		return;
	}

	update_post_meta(
		$post_id,
		$meta_key,
		$value
	);
}
}

Greshma_Core_Editorial_Editor::init();