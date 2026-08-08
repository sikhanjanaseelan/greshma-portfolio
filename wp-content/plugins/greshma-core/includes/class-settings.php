<?php
/**
 * Global site settings.
 *
 * @package GreshmaCore
 */

defined( 'ABSPATH' ) || exit;

class Greshma_Core_Settings {

	const OPTION_NAME = 'greshma_core_settings';
	const PAGE_SLUG   = 'greshma-settings';

	/**
	 * Register hooks.
	 */
public static function init(): void {

	add_action(
		'admin_init',
		array(
			__CLASS__,
			'register_settings',
		)
	);
}

	/**
	 * Add settings page.
	 */
	public static function add_settings_page(): void {

		add_menu_page(
			__( 'Greshma Settings', 'greshma-core' ),
			__( 'Greshma Settings', 'greshma-core' ),
			'manage_options',
			self::PAGE_SLUG,
			array( __CLASS__, 'render_page' ),
			'dashicons-admin-settings',
			27
		);
	}

	/**
	 * Register settings.
	 */
	public static function register_settings(): void {

		register_setting(
			'greshma_core_settings_group',
			self::OPTION_NAME,
			array(
				'type'              => 'array',
				'sanitize_callback' => array( __CLASS__, 'sanitize' ),
				'default'           => array(),
			)
		);
	}

	/**
	 * Sanitize settings.
	 *
	 * @param array $input Submitted values.
	 * @return array
	 */
	public static function sanitize( $input ): array {

		$input = is_array( $input ) ? $input : array();

		return array(
			'email' => isset( $input['email'] )
				? sanitize_email( $input['email'] )
				: '',

			'location' => isset( $input['location'] )
				? sanitize_text_field( $input['location'] )
				: '',

			'linkedin_url' => isset( $input['linkedin_url'] )
				? esc_url_raw( $input['linkedin_url'] )
				: '',

			'instagram_url' => isset( $input['instagram_url'] )
				? esc_url_raw( $input['instagram_url'] )
				: '',

			'youtube_url' => isset( $input['youtube_url'] )
				? esc_url_raw( $input['youtube_url'] )
				: '',

			'newsletter_heading' => isset( $input['newsletter_heading'] )
				? sanitize_text_field( $input['newsletter_heading'] )
				: '',

			'newsletter_text' => isset( $input['newsletter_text'] )
				? sanitize_textarea_field( $input['newsletter_text'] )
				: '',

			'newsletter_url' => isset( $input['newsletter_url'] )
				? esc_url_raw( $input['newsletter_url'] )
				: '',

			'copyright_text' => isset( $input['copyright_text'] )
				? sanitize_text_field( $input['copyright_text'] )
				: '',


				'impact_countries' => isset( $input['impact_countries'] )
	? absint( $input['impact_countries'] )
	: 0,

'impact_countries_suffix' => isset( $input['impact_countries_suffix'] )
	? sanitize_text_field( $input['impact_countries_suffix'] )
	: '',

'impact_young_people' => isset( $input['impact_young_people'] )
	? absint( $input['impact_young_people'] )
	: 0,

'impact_young_people_suffix' => isset( $input['impact_young_people_suffix'] )
	? sanitize_text_field( $input['impact_young_people_suffix'] )
	: '',

'impact_workshops' => isset( $input['impact_workshops'] )
	? absint( $input['impact_workshops'] )
	: 0,

'impact_workshops_suffix' => isset( $input['impact_workshops_suffix'] )
	? sanitize_text_field( $input['impact_workshops_suffix'] )
	: '',

'impact_collaborations' => isset( $input['impact_collaborations'] )
	? absint( $input['impact_collaborations'] )
	: 0,

'impact_collaborations_suffix' => isset( $input['impact_collaborations_suffix'] )
	? sanitize_text_field( $input['impact_collaborations_suffix'] )
	: '',

'impact_years' => isset( $input['impact_years'] )
	? absint( $input['impact_years'] )
	: 0,

'impact_years_suffix' => isset( $input['impact_years_suffix'] )
	? sanitize_text_field( $input['impact_years_suffix'] )
	: '',

'impact_continents' => isset( $input['impact_continents'] )
	? absint( $input['impact_continents'] )
	: 0,

'impact_continents_suffix' => isset( $input['impact_continents_suffix'] )
	? sanitize_text_field( $input['impact_continents_suffix'] )
	: '',

'impact_networks' => isset( $input['impact_networks'] )
	? absint( $input['impact_networks'] )
	: 0,

'impact_networks_suffix' => isset( $input['impact_networks_suffix'] )
	? sanitize_text_field( $input['impact_networks_suffix'] )
	: '',

'impact_stats_background' => isset( $input['impact_stats_background'] )
	? esc_url_raw( $input['impact_stats_background'] )
	: '',
		);
	}

	/**
	 * Get all saved settings.
	 *
	 * @return array
	 */
	public static function get_settings(): array {

		$settings = get_option(
			self::OPTION_NAME,
			array()
		);

		return is_array( $settings )
			? $settings
			: array();
	}

	/**
	 * Get one setting.
	 *
	 * @param string $key     Setting key.
	 * @param string $default Default value.
	 * @return string
	 */
	public static function get( string $key, string $default = '' ): string {

		$settings = self::get_settings();

		return isset( $settings[ $key ] )
			? (string) $settings[ $key ]
			: $default;
	}

	/**
	 * Render settings page.
	 */
	public static function render_page(): void {

		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$settings = self::get_settings();

		$email = $settings['email'] ?? '';
		$location = $settings['location'] ?? '';

		$linkedin = $settings['linkedin_url'] ?? '';
		$instagram = $settings['instagram_url'] ?? '';
		$youtube = $settings['youtube_url'] ?? '';

		$newsletter_heading =
			$settings['newsletter_heading'] ?? '';

		$newsletter_text =
			$settings['newsletter_text'] ?? '';

		$newsletter_url =
			$settings['newsletter_url'] ?? '';

		$copyright =
			$settings['copyright_text'] ?? '';

			$impact_countries =
	$settings['impact_countries'] ?? '25';

$impact_countries_suffix =
	$settings['impact_countries_suffix'] ?? '+';

$impact_young_people =
	$settings['impact_young_people'] ?? '500';

$impact_young_people_suffix =
	$settings['impact_young_people_suffix'] ?? '+';

$impact_workshops =
	$settings['impact_workshops'] ?? '100';

$impact_workshops_suffix =
	$settings['impact_workshops_suffix'] ?? '+';

$impact_collaborations =
	$settings['impact_collaborations'] ?? '50';

$impact_collaborations_suffix =
	$settings['impact_collaborations_suffix'] ?? '+';

$impact_years =
	$settings['impact_years'] ?? '12';

$impact_years_suffix =
	$settings['impact_years_suffix'] ?? '+';

$impact_continents =
	$settings['impact_continents'] ?? '4';

$impact_continents_suffix =
	$settings['impact_continents_suffix'] ?? '';

$impact_networks =
	$settings['impact_networks'] ?? '10';

$impact_networks_suffix =
	$settings['impact_networks_suffix'] ?? '+';

$impact_stats_background =
	$settings['impact_stats_background'] ?? '';
		?>

		<div class="wrap">

			<h1>
				<?php esc_html_e(
					'Greshma Settings',
					'greshma-core'
				); ?>
			</h1>

			<p>
				<?php esc_html_e(
					'Manage information used across the Greshma website.',
					'greshma-core'
				); ?>
			</p>

			<form method="post" action="options.php">

				<?php
				settings_fields(
					'greshma_core_settings_group'
				);
				?>

				<h2>
					<?php esc_html_e(
						'Contact',
						'greshma-core'
					); ?>
				</h2>

				<table class="form-table">

					<tr>
						<th>
							<label for="greshma_email">
								Email
							</label>
						</th>

						<td>
							<input
								type="email"
								id="greshma_email"
								name="<?php echo esc_attr( self::OPTION_NAME ); ?>[email]"
								value="<?php echo esc_attr( $email ); ?>"
								class="regular-text"
								placeholder="hello@example.com"
							>
						</td>
					</tr>

					<tr>
						<th>
							<label for="greshma_location">
								Location
							</label>
						</th>

						<td>
							<input
								type="text"
								id="greshma_location"
								name="<?php echo esc_attr( self::OPTION_NAME ); ?>[location]"
								value="<?php echo esc_attr( $location ); ?>"
								class="regular-text"
								placeholder="India / International"
							>
						</td>
					</tr>

				</table>

				<hr>

				<h2>
					<?php esc_html_e(
						'Social Links',
						'greshma-core'
					); ?>
				</h2>

				<table class="form-table">

					<tr>
						<th>LinkedIn</th>

						<td>
							<input
								type="url"
								name="<?php echo esc_attr( self::OPTION_NAME ); ?>[linkedin_url]"
								value="<?php echo esc_attr( $linkedin ); ?>"
								class="regular-text"
								placeholder="https://linkedin.com/in/..."
							>
						</td>
					</tr>

					<tr>
						<th>Instagram</th>

						<td>
							<input
								type="url"
								name="<?php echo esc_attr( self::OPTION_NAME ); ?>[instagram_url]"
								value="<?php echo esc_attr( $instagram ); ?>"
								class="regular-text"
								placeholder="https://instagram.com/..."
							>
						</td>
					</tr>

					<tr>
						<th>YouTube</th>

						<td>
							<input
								type="url"
								name="<?php echo esc_attr( self::OPTION_NAME ); ?>[youtube_url]"
								value="<?php echo esc_attr( $youtube ); ?>"
								class="regular-text"
								placeholder="https://youtube.com/..."
							>
						</td>
					</tr>

				</table>

				<hr>

				<h2>
					<?php esc_html_e(
						'Newsletter',
						'greshma-core'
					); ?>
				</h2>

				<table class="form-table">

					<tr>
						<th>Heading</th>

						<td>
							<input
								type="text"
								name="<?php echo esc_attr( self::OPTION_NAME ); ?>[newsletter_heading]"
								value="<?php echo esc_attr( $newsletter_heading ); ?>"
								class="regular-text"
								placeholder="Stay connected"
							>
						</td>
					</tr>

					<tr>
						<th>Short Text</th>

						<td>
							<textarea
								name="<?php echo esc_attr( self::OPTION_NAME ); ?>[newsletter_text]"
								rows="4"
								class="large-text"
								placeholder="Receive occasional updates..."
							><?php echo esc_textarea( $newsletter_text ); ?></textarea>
						</td>
					</tr>

					<tr>
						<th>Signup URL</th>

						<td>
							<input
								type="url"
								name="<?php echo esc_attr( self::OPTION_NAME ); ?>[newsletter_url]"
								value="<?php echo esc_attr( $newsletter_url ); ?>"
								class="regular-text"
								placeholder="https://..."
							>
						</td>
					</tr>

				</table>
				<hr>

<h2>
	<?php esc_html_e(
		'Impact Statistics',
		'greshma-core'
	); ?>
</h2>

<p>
	<?php esc_html_e(
		'Manage the numbers displayed in the Impact at a Glance section.',
		'greshma-core'
	); ?>
</p>

<table class="form-table">

	<tr>
		<th>Countries</th>

		<td>
			<input
				type="number"
				min="0"
				name="<?php echo esc_attr( self::OPTION_NAME ); ?>[impact_countries]"
				value="<?php echo esc_attr( $impact_countries ); ?>"
				class="small-text"
			>

			<input
				type="text"
				name="<?php echo esc_attr( self::OPTION_NAME ); ?>[impact_countries_suffix]"
				value="<?php echo esc_attr( $impact_countries_suffix ); ?>"
				class="small-text"
				placeholder="+"
			>
		</td>
	</tr>


	<tr>
		<th>Young People Reached</th>

		<td>
			<input
				type="number"
				min="0"
				name="<?php echo esc_attr( self::OPTION_NAME ); ?>[impact_young_people]"
				value="<?php echo esc_attr( $impact_young_people ); ?>"
				class="small-text"
			>

			<input
				type="text"
				name="<?php echo esc_attr( self::OPTION_NAME ); ?>[impact_young_people_suffix]"
				value="<?php echo esc_attr( $impact_young_people_suffix ); ?>"
				class="small-text"
				placeholder="+"
			>
		</td>
	</tr>


	<tr>
		<th>Workshops &amp; Sessions</th>

		<td>
			<input
				type="number"
				min="0"
				name="<?php echo esc_attr( self::OPTION_NAME ); ?>[impact_workshops]"
				value="<?php echo esc_attr( $impact_workshops ); ?>"
				class="small-text"
			>

			<input
				type="text"
				name="<?php echo esc_attr( self::OPTION_NAME ); ?>[impact_workshops_suffix]"
				value="<?php echo esc_attr( $impact_workshops_suffix ); ?>"
				class="small-text"
				placeholder="+"
			>
		</td>
	</tr>


	<tr>
		<th>Collaborations</th>

		<td>
			<input
				type="number"
				min="0"
				name="<?php echo esc_attr( self::OPTION_NAME ); ?>[impact_collaborations]"
				value="<?php echo esc_attr( $impact_collaborations ); ?>"
				class="small-text"
			>

			<input
				type="text"
				name="<?php echo esc_attr( self::OPTION_NAME ); ?>[impact_collaborations_suffix]"
				value="<?php echo esc_attr( $impact_collaborations_suffix ); ?>"
				class="small-text"
				placeholder="+"
			>
		</td>
	</tr>


	<tr>
		<th>Years of Engagement</th>

		<td>
			<input
				type="number"
				min="0"
				name="<?php echo esc_attr( self::OPTION_NAME ); ?>[impact_years]"
				value="<?php echo esc_attr( $impact_years ); ?>"
				class="small-text"
			>

			<input
				type="text"
				name="<?php echo esc_attr( self::OPTION_NAME ); ?>[impact_years_suffix]"
				value="<?php echo esc_attr( $impact_years_suffix ); ?>"
				class="small-text"
				placeholder="+"
			>
		</td>
	</tr>


	<tr>
		<th>Continents</th>

		<td>
			<input
				type="number"
				min="0"
				name="<?php echo esc_attr( self::OPTION_NAME ); ?>[impact_continents]"
				value="<?php echo esc_attr( $impact_continents ); ?>"
				class="small-text"
			>

			<input
				type="text"
				name="<?php echo esc_attr( self::OPTION_NAME ); ?>[impact_continents_suffix]"
				value="<?php echo esc_attr( $impact_continents_suffix ); ?>"
				class="small-text"
				placeholder=""
			>
		</td>
	</tr>


	<tr>
		<th>Global Networks</th>

		<td>
			<input
				type="number"
				min="0"
				name="<?php echo esc_attr( self::OPTION_NAME ); ?>[impact_networks]"
				value="<?php echo esc_attr( $impact_networks ); ?>"
				class="small-text"
			>

			<input
				type="text"
				name="<?php echo esc_attr( self::OPTION_NAME ); ?>[impact_networks_suffix]"
				value="<?php echo esc_attr( $impact_networks_suffix ); ?>"
				class="small-text"
				placeholder="+"
			>
		</td>
	</tr>


	<tr>
		<th>Background Image URL</th>

		<td>
			<input
				type="url"
				name="<?php echo esc_attr( self::OPTION_NAME ); ?>[impact_stats_background]"
				value="<?php echo esc_attr( $impact_stats_background ); ?>"
				class="regular-text"
				placeholder="https://..."
			>

			<p class="description">
				Optional background image for Impact at a Glance.
			</p>
		</td>
	</tr>

</table>

				<hr>

				<h2>
					<?php esc_html_e(
						'Footer',
						'greshma-core'
					); ?>
				</h2>

				<table class="form-table">

					<tr>
						<th>Copyright Text</th>

						<td>
							<input
								type="text"
								name="<?php echo esc_attr( self::OPTION_NAME ); ?>[copyright_text]"
								value="<?php echo esc_attr( $copyright ); ?>"
								class="regular-text"
								placeholder="Greshma. All rights reserved."
							>

							<p class="description">
								The year can be generated automatically
								by the theme later.
							</p>
						</td>
					</tr>

				</table>

				<?php submit_button(); ?>

			</form>

		</div>

		<?php
	}
}

Greshma_Core_Settings::init();