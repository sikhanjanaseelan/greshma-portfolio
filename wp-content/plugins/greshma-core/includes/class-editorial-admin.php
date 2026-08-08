<?php
/**
 * Editorial admin controller.
 *
 * Handles the Editorial dashboard and custom admin menu structure.
 *
 * @package GreshmaCore
 */

defined( 'ABSPATH' ) || exit;

/**
 * Controls the Editorial admin experience.
 */
class Greshma_Core_Editorial_Admin {

	/**
	 * Editorial dashboard page slug.
	 */
	const STUDIO_SLUG = 'greshma-editorial-studio';

	/**
	 * Register WordPress hooks.
	 */
	public static function init(): void {
	add_action(
	'admin_enqueue_scripts',
	array( __CLASS__, 'enqueue_admin_assets' )
);

	}



/**
 * Load the Editorial Content Studio stylesheet.
 *
 * @param string $hook_suffix Current WordPress admin page hook.
 */
public static function enqueue_admin_assets( $hook_suffix ): void {

	$plugin_file = dirname( __DIR__ ) . '/greshma-core.php';
	$css_file    = dirname( __DIR__ ) . '/assets/admin/css/editorial-studio.css';
	$css_url     = plugin_dir_url( $plugin_file ) . 'assets/admin/css/editorial-studio.css';

	wp_enqueue_style(
		'greshma-editorial-studio',
		$css_url,
		array(),
		file_exists( $css_file ) ? filemtime( $css_file ) : '1.0.0'
	);
}
	/**
	 * Render the Editorial dashboard page.
	 */
	/**
 * Render the Editorial Content Studio.
 */
public static function render_content_studio(): void {

	$content_types = array(
		array(
			'title'       => __( 'Reflections', 'greshma-core' ),
			'slug'        => 'reflection',
			'description' => __( 'Personal insights, lessons learned and thoughtful observations.', 'greshma-core' ),
			'icon'        => 'dashicons-format-quote',
			'class'       => 'greshma-editorial-card--reflection',
		),
		array(
			'title'       => __( 'Field Stories', 'greshma-core' ),
			'slug'        => 'field-story',
			'description' => __( 'Real experiences and stories from community work and engagement.', 'greshma-core' ),
			'icon'        => 'dashicons-location-alt',
			'class'       => 'greshma-editorial-card--field-story',
		),
		array(
			'title'       => __( 'Impact Stories', 'greshma-core' ),
			'slug'        => 'impact-story',
			'description' => __( 'Stories that communicate outcomes, transformation and meaningful change.', 'greshma-core' ),
			'icon'        => 'dashicons-chart-line',
			'class'       => 'greshma-editorial-card--impact-story',
		),
		array(
			'title'       => __( 'Stories in Print', 'greshma-core' ),
			'slug'        => 'story-in-print',
			'description' => __( 'Newspaper, magazine and print publication features.', 'greshma-core' ),
			'icon'        => 'dashicons-media-document',
			'class'       => 'greshma-editorial-card--print',
		),
		array(
			'title'       => __( 'LinkedIn Insights', 'greshma-core' ),
			'slug'        => 'linkedin-insight',
			'description' => __( 'LinkedIn posts, professional insights and external thought leadership.', 'greshma-core' ),
			'icon'        => 'dashicons-share',
			'class'       => 'greshma-editorial-card--linkedin',
		),
		array(
			'title'       => __( 'Articles', 'greshma-core' ),
			'slug'        => 'article',
			'description' => __( 'Long-form articles, educational content and structured writing.', 'greshma-core' ),
			'icon'        => 'dashicons-text-page',
			'class'       => 'greshma-editorial-card--article',
		),
		array(
			'title'       => __( 'Research', 'greshma-core' ),
			'slug'        => 'research',
			'description' => __( 'Research notes, findings, methodologies and knowledge resources.', 'greshma-core' ),
			'icon'        => 'dashicons-search',
			'class'       => 'greshma-editorial-card--research',
		),
		array(
			'title'       => __( 'Publications', 'greshma-core' ),
			'slug'        => 'publication',
			'description' => __( 'Reports, guides, formal publications and downloadable documents.', 'greshma-core' ),
			'icon'        => 'dashicons-book-alt',
			'class'       => 'greshma-editorial-card--publication',
		),
		array(
			'title'       => __( 'Opinions', 'greshma-core' ),
			'slug'        => 'opinion',
			'description' => __( 'Opinion pieces, commentary and personal perspectives.', 'greshma-core' ),
			'icon'        => 'dashicons-admin-comments',
			'class'       => 'greshma-editorial-card--opinion',
		),
	);

	$all_editorial_url = admin_url(
		'edit.php?post_type=' . Greshma_Core_Editorial::POST_TYPE
	);

	$add_editorial_url = admin_url(
		'post-new.php?post_type=' . Greshma_Core_Editorial::POST_TYPE
	);
	?>

	<div class="wrap greshma-editorial-studio">

		<section class="greshma-editorial-studio__hero">
			<div>
				<span class="greshma-editorial-studio__eyebrow">
					<?php esc_html_e( 'Editorial Publishing', 'greshma-core' ); ?>
				</span>

				<h1><?php esc_html_e( 'Content Studio', 'greshma-core' ); ?></h1>

				<p>
					<?php
					esc_html_e(
						'Manage stories, reflections, articles, research and publications from one organised publishing workspace.',
						'greshma-core'
					);
					?>
				</p>
			</div>

			<div class="greshma-editorial-studio__hero-actions">
				<a class="button button-primary" href="<?php echo esc_url( $add_editorial_url ); ?>">
					<?php esc_html_e( 'Add New Editorial', 'greshma-core' ); ?>
				</a>

				<a class="button" href="<?php echo esc_url( $all_editorial_url ); ?>">
					<?php esc_html_e( 'View All Editorial', 'greshma-core' ); ?>
				</a>
			</div>
		</section>

		<section class="greshma-editorial-studio__section">
			<div class="greshma-editorial-studio__section-heading">
				<div>
					<h2><?php esc_html_e( 'Content Library', 'greshma-core' ); ?></h2>

					<p>
						<?php
						esc_html_e(
							'Choose a content type to view existing entries or create a new one.',
							'greshma-core'
						);
						?>
					</p>
				</div>
			</div>

			<div class="greshma-editorial-grid">
				<?php foreach ( $content_types as $content_type ) : ?>

					<?php
					$view_url = add_query_arg(
						array(
							'post_type'                       => Greshma_Core_Editorial::POST_TYPE,
							Greshma_Core_Editorial_Taxonomy::TYPE_TAXONOMY => $content_type['slug'],
						),
						admin_url( 'edit.php' )
					);

					$add_url = add_query_arg(
						array(
							'post_type'      => Greshma_Core_Editorial::POST_TYPE,
							'editorial_type' => $content_type['slug'],
						),
						admin_url( 'post-new.php' )
					);
					?>

					<article class="greshma-editorial-card <?php echo esc_attr( $content_type['class'] ); ?>">

						<div class="greshma-editorial-card__icon" aria-hidden="true">
							<span class="dashicons <?php echo esc_attr( $content_type['icon'] ); ?>"></span>
						</div>

						<div class="greshma-editorial-card__content">
							<h3><?php echo esc_html( $content_type['title'] ); ?></h3>

							<p><?php echo esc_html( $content_type['description'] ); ?></p>
						</div>

						<div class="greshma-editorial-card__actions">
							<a class="button" href="<?php echo esc_url( $view_url ); ?>">
								<?php esc_html_e( 'View All', 'greshma-core' ); ?>
							</a>

							<a class="button button-primary" href="<?php echo esc_url( $add_url ); ?>">
								<?php
								printf(
									/* translators: %s is an editorial type title. */
									esc_html__( 'Add %s', 'greshma-core' ),
									esc_html( $content_type['title'] )
								);
								?>
							</a>
						</div>

					</article>

				<?php endforeach; ?>
			</div>
		</section>

	</div>

	<?php
}
}

Greshma_Core_Editorial_Admin::init();