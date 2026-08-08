<?php
/**
 * Greshma Core admin menu.
 *
 * Provides a grouped administration workspace for
 * Greshma portfolio content modules.
 *
 * @package GreshmaCore
 */

defined( 'ABSPATH' ) || exit;

class Greshma_Core_Admin_Menu {

	/**
	 * Main admin menu slug.
	 */
	const MENU_SLUG = 'greshma-admin';


	/**
	 * Initialise admin hooks.
	 *
	 * @return void
	 */
	public static function init(): void {

		add_action(
			'admin_menu',
			array( __CLASS__, 'register_parent_menu' ),
			5
		);

		add_action(
			'admin_menu',
			array( __CLASS__, 'register_submenus' ),
			100
		);

		add_action(
			'admin_head',
			array( __CLASS__, 'print_admin_styles' )
		);
        add_filter(
	'parent_file',
	array( __CLASS__, 'set_active_parent_menu' )
);

add_filter(
	'submenu_file',
	array( __CLASS__, 'set_active_submenu' )
);
	}


	/**
	 * Register main Greshma menu.
	 *
	 * @return void
	 */
	public static function register_parent_menu(): void {

		add_menu_page(
			__( 'Greshma', 'greshma-core' ),
			__( 'Greshma', 'greshma-core' ),
			'edit_posts',
			self::MENU_SLUG,
			array( __CLASS__, 'render_dashboard' ),
			'dashicons-leaf',
			3
		);
	}


	/**
	 * Register grouped submenu items.
	 *
	 * @return void
	 */
	public static function register_submenus(): void {

		/* =====================================================
		   DASHBOARD
		===================================================== */

		add_submenu_page(
			self::MENU_SLUG,
			__( 'Greshma Dashboard', 'greshma-core' ),
			__( 'Dashboard', 'greshma-core' ),
			'edit_posts',
			self::MENU_SLUG,
			array( __CLASS__, 'render_dashboard' )
		);


		/* =====================================================
		   MEDIA & PRESS — GROUP TITLE
		===================================================== */

		add_submenu_page(
			self::MENU_SLUG,
			__( 'Media & Press', 'greshma-core' ),
			__( 'MEDIA & PRESS', 'greshma-core' ),
			'edit_posts',
			'greshma-media-section',
			array( __CLASS__, 'render_media_section' )
		);


		/* =====================================================
		   MEDIA & PRESS — CHILD LINKS
		===================================================== */

		add_submenu_page(
			self::MENU_SLUG,
			__( 'All Media & Press', 'greshma-core' ),
			__( 'All Media & Press', 'greshma-core' ),
			'edit_posts',
			'edit.php?post_type=greshma_media',
			null
		);


		add_submenu_page(
			self::MENU_SLUG,
			__( 'Add New Media & Press', 'greshma-core' ),
			__( 'Add New Media & Press', 'greshma-core' ),
			'edit_posts',
			'post-new.php?post_type=greshma_media',
			null
		);


		add_submenu_page(
			self::MENU_SLUG,
			__( 'Media Categories', 'greshma-core' ),
			__( 'Media Categories', 'greshma-core' ),
			'manage_categories',
			'edit-tags.php?taxonomy=greshma_media_category&post_type=greshma_media',
			null
		);
	}


	/**
	 * Render dashboard.
	 *
	 * @return void
	 */
	public static function render_dashboard(): void {

		$media_count = wp_count_posts( 'greshma_media' );

		$published_media = isset( $media_count->publish )
			? (int) $media_count->publish
			: 0;
		?>

		<div class="wrap greshma-admin-dashboard">

			<div class="greshma-admin-dashboard__hero">

				<span class="greshma-admin-dashboard__eyebrow">
					<?php esc_html_e( 'Portfolio Management', 'greshma-core' ); ?>
				</span>

				<h1>
					<?php esc_html_e( 'Greshma Dashboard', 'greshma-core' ); ?>
				</h1>

				<p>
					<?php
					esc_html_e(
						'Manage projects, stories, media, resources, events and portfolio information from one organised workspace.',
						'greshma-core'
					);
					?>
				</p>

			</div>


			<div class="greshma-admin-dashboard__grid">

				<article class="greshma-admin-card">

					<div class="greshma-admin-card__icon">

						<span
							class="dashicons dashicons-megaphone"
							aria-hidden="true"
						></span>

					</div>

					<div>

						<h2>
							<?php esc_html_e( 'Media & Press', 'greshma-core' ); ?>
						</h2>

						<p>
							<strong>
								<?php echo esc_html( $published_media ); ?>
							</strong>

							<?php esc_html_e( 'published items', 'greshma-core' ); ?>
						</p>

					</div>


					<div class="greshma-admin-card__actions">

						<a
							class="button"
							href="<?php echo esc_url(
								admin_url( 'edit.php?post_type=greshma_media' )
							); ?>"
						>
							<?php esc_html_e( 'View All', 'greshma-core' ); ?>
						</a>

						<a
							class="button button-primary"
							href="<?php echo esc_url(
								admin_url( 'post-new.php?post_type=greshma_media' )
							); ?>"
						>
							<?php esc_html_e( 'Add New', 'greshma-core' ); ?>
						</a>

					</div>

				</article>

			</div>

		</div>

		<?php
	}


	/**
	 * Media & Press landing page.
	 *
	 * This gives the Media module itself a proper title/landing
	 * page when the MEDIA & PRESS group heading is clicked.
	 *
	 * @return void
	 */
	public static function render_media_section(): void {

		$media_count = wp_count_posts( 'greshma_media' );

		$published = isset( $media_count->publish )
			? (int) $media_count->publish
			: 0;

		$drafts = isset( $media_count->draft )
			? (int) $media_count->draft
			: 0;
		?>

		<div class="wrap greshma-module-page">

			<div class="greshma-module-page__header">

				<span class="greshma-module-page__eyebrow">
					<?php esc_html_e( 'Greshma Content', 'greshma-core' ); ?>
				</span>

				<h1>
					<?php esc_html_e( 'Media & Press', 'greshma-core' ); ?>
				</h1>

				<p>
					<?php
					esc_html_e(
						'Manage interviews, podcasts, videos, articles and press coverage featuring Greshma.',
						'greshma-core'
					);
					?>
				</p>

			</div>


			<div class="greshma-module-stats">

				<div class="greshma-module-stat">

					<strong>
						<?php echo esc_html( $published ); ?>
					</strong>

					<span>
						<?php esc_html_e( 'Published', 'greshma-core' ); ?>
					</span>

				</div>


				<div class="greshma-module-stat">

					<strong>
						<?php echo esc_html( $drafts ); ?>
					</strong>

					<span>
						<?php esc_html_e( 'Drafts', 'greshma-core' ); ?>
					</span>

				</div>

			</div>


			<div class="greshma-module-actions">

				<a
					class="button button-primary"
					href="<?php echo esc_url(
						admin_url( 'post-new.php?post_type=greshma_media' )
					); ?>"
				>
					<?php esc_html_e( 'Add New Media & Press', 'greshma-core' ); ?>
				</a>


				<a
					class="button"
					href="<?php echo esc_url(
						admin_url( 'edit.php?post_type=greshma_media' )
					); ?>"
				>
					<?php esc_html_e( 'All Media & Press', 'greshma-core' ); ?>
				</a>


				<a
					class="button"
					href="<?php echo esc_url(
						admin_url(
							'edit-tags.php?taxonomy=greshma_media_category&post_type=greshma_media'
						)
					); ?>"
				>
					<?php esc_html_e( 'Media Categories', 'greshma-core' ); ?>
				</a>

			</div>

		</div>

		<?php
	}



    /**
 * Keep the Greshma parent menu expanded
 * while using Greshma module screens.
 *
 * @param string $parent_file Current WordPress parent menu.
 *
 * @return string
 */
public static function set_active_parent_menu( $parent_file ) {

	global $typenow;

	$taxonomy = isset( $_GET['taxonomy'] )
		? sanitize_key( wp_unslash( $_GET['taxonomy'] ) )
		: '';

	if (
		'greshma_media' === $typenow ||
		'greshma_media_category' === $taxonomy
	) {
		return self::MENU_SLUG;
	}

	return $parent_file;
}


/**
 * Highlight the correct Greshma submenu item.
 *
 * @param string $submenu_file Current submenu.
 *
 * @return string
 */
public static function set_active_submenu( $submenu_file ) {

	global $typenow, $pagenow;

	$taxonomy = isset( $_GET['taxonomy'] )
		? sanitize_key( wp_unslash( $_GET['taxonomy'] ) )
		: '';


	/* Media Categories */

	if (
		'edit-tags.php' === $pagenow &&
		'greshma_media_category' === $taxonomy
	) {
		return 'edit-tags.php?taxonomy=greshma_media_category&post_type=greshma_media';
	}


	/* Add New Media & Press */

	if (
		'post-new.php' === $pagenow &&
		'greshma_media' === $typenow
	) {
		return 'post-new.php?post_type=greshma_media';
	}


	/* Edit an individual Media & Press item */

	if (
		'post.php' === $pagenow &&
		'greshma_media' === $typenow
	) {
		return 'edit.php?post_type=greshma_media';
	}


	/* All Media & Press */

	if (
		'edit.php' === $pagenow &&
		'greshma_media' === $typenow
	) {
		return 'edit.php?post_type=greshma_media';
	}


	return $submenu_file;
}

	/**
	 * Admin menu and module styling.
	 *
	 * @return void
	 */
	public static function print_admin_styles(): void {
		?>

		<style>

			/* =================================================
			   GRESHMA TOP-LEVEL MENU
			================================================= */

			#adminmenu
			.toplevel_page_greshma-admin
			> a {
				color: #ffffff;

				background: #23483a;

				border-left:
					4px solid
					#d4ad5d;
			}


			#adminmenu
			.toplevel_page_greshma-admin
			> a:hover,

			#adminmenu
			.toplevel_page_greshma-admin.wp-has-current-submenu
			> a {
				color: #ffffff;

				background: #315b47;
			}


			#adminmenu
			.toplevel_page_greshma-admin
			.wp-menu-image::before {
				color: #d9c47f;
			}


			#adminmenu
			.toplevel_page_greshma-admin
			.wp-menu-name {
				font-weight: 700;
			}


			/* =================================================
			   GRESHMA SUBMENU CONTAINER
			================================================= */

			#adminmenu
			.toplevel_page_greshma-admin
			.wp-submenu {
				padding:
					8px
					0
					12px;

				background:
					#12261e;
			}


			#adminmenu
			.toplevel_page_greshma-admin
			.wp-submenu
			a {
				padding:
					7px
					14px;

				color:
					#d3ded7;

				font-size:
					13px;

				line-height:
					1.35;
			}


			#adminmenu
			.toplevel_page_greshma-admin
			.wp-submenu
			a:hover {
				color: #ffffff;

				background:
					rgba(
						120,
						160,
						128,
						.14
					);
			}


			/* =================================================
			   DASHBOARD LINK
			================================================= */

			#adminmenu
			.toplevel_page_greshma-admin
			.wp-submenu
			a[href="admin.php?page=greshma-admin"] {
				margin-bottom: 7px;

				padding-bottom: 11px;

				color: #ffffff;

				font-weight: 700;

				border-bottom:
					1px solid
					rgba(
						255,
						255,
						255,
						.09
					);
			}


			/* =================================================
			   MODULE GROUP TITLE — MEDIA & PRESS
			================================================= */

			#adminmenu
			.toplevel_page_greshma-admin
			.wp-submenu
			a[href*="greshma-media-section"] {
				margin-top: 5px;

				padding-top: 11px;
				padding-bottom: 6px;

				color: #e4bd65;

				font-size: 11px;

				font-weight: 800;

				letter-spacing: .08em;

				text-transform: uppercase;
			}


			#adminmenu
			.toplevel_page_greshma-admin
			.wp-submenu
			a[href*="greshma-media-section"]:hover {
				color: #f0cf83;

				background: transparent;
			}


			/* =================================================
			   MEDIA CHILD LINKS
			================================================= */

			#adminmenu
			.toplevel_page_greshma-admin
			.wp-submenu
			a[href*="post_type=greshma_media"],

			#adminmenu
			.toplevel_page_greshma-admin
			.wp-submenu
			a[href*="taxonomy=greshma_media_category"] {
				padding-left: 25px;

				color: #bcd0c1;
			}


			#adminmenu
			.toplevel_page_greshma-admin
			.wp-submenu
			a[href*="post_type=greshma_media"]:hover,

			#adminmenu
			.toplevel_page_greshma-admin
			.wp-submenu
			a[href*="taxonomy=greshma_media_category"]:hover {
				color: #ffffff;
			}


			/* =================================================
			   CURRENT SUBMENU
			================================================= */

			#adminmenu
			.toplevel_page_greshma-admin
			.wp-submenu
			.current
			a {
				color: #ffffff;

				font-weight: 700;
			}


			/* =================================================
			   GRESHMA DASHBOARD
			================================================= */

			.greshma-admin-dashboard,
			.greshma-module-page {
				max-width: 1160px;

				margin-top: 25px;
			}


			.greshma-admin-dashboard__hero,
			.greshma-module-page__header {
				max-width: 760px;

				margin-bottom: 28px;
			}


			.greshma-admin-dashboard__eyebrow,
			.greshma-module-page__eyebrow {
				display: inline-block;

				margin-bottom: 7px;

				color: #6b876f;

				font-size: 11px;

				font-weight: 700;

				letter-spacing: .09em;

				text-transform: uppercase;
			}


			.greshma-admin-dashboard__hero h1,
			.greshma-module-page__header h1 {
				margin:
					0
					0
					10px;

				color: #19392d;

				font-size: 30px;
			}


			.greshma-admin-dashboard__hero p,
			.greshma-module-page__header p {
				max-width: 700px;

				margin: 0;

				color: #5e6963;

				font-size: 14px;

				line-height: 1.65;
			}


			/* =================================================
			   DASHBOARD GRID
			================================================= */

			.greshma-admin-dashboard__grid {
				display: grid;

				grid-template-columns:
					repeat(
						auto-fit,
						minmax(
							280px,
							1fr
						)
					);

				gap: 18px;
			}


			/* =================================================
			   DASHBOARD CARD
			================================================= */

			.greshma-admin-card {
				display: grid;

				grid-template-columns:
					50px
					minmax(
						0,
						1fr
					);

				gap: 15px;

				padding: 20px;

				background: #ffffff;

				border:
					1px solid
					#dfe7e1;

				border-radius: 10px;

				box-shadow:
					0
					7px
					22px
					rgba(
						36,
						75,
						54,
						.05
					);
			}


			.greshma-admin-card__icon {
				width: 48px;
				height: 48px;

				display: flex;

				align-items: center;
				justify-content: center;

				color: #315b47;

				background: #edf4ef;

				border-radius: 9px;
			}


			.greshma-admin-card h2 {
				margin:
					2px
					0
					5px;

				color: #244638;

				font-size: 16px;
			}


			.greshma-admin-card p {
				margin: 0;

				color: #69756e;
			}


			.greshma-admin-card__actions {
				grid-column: 1 / -1;

				display: flex;

				flex-wrap: wrap;

				gap: 8px;

				margin-top: 5px;
			}


			.greshma-admin-card__actions
			.button-primary,

			.greshma-module-actions
			.button-primary {
				background: #315b47;

				border-color: #315b47;
			}


			/* =================================================
			   MODULE LANDING
			================================================= */

			.greshma-module-stats {
				display: flex;

				flex-wrap: wrap;

				gap: 12px;

				margin-bottom: 22px;
			}


			.greshma-module-stat {
				min-width: 130px;

				padding:
					16px
					18px;

				background: #ffffff;

				border:
					1px solid
					#dfe7e1;

				border-radius: 8px;
			}


			.greshma-module-stat strong {
				display: block;

				color: #254c3a;

				font-size: 23px;
			}


			.greshma-module-stat span {
				color: #738079;

				font-size: 12px;
			}


			.greshma-module-actions {
				display: flex;

				flex-wrap: wrap;

				gap: 8px;
			}

		</style>

		<?php
	}
}


Greshma_Core_Admin_Menu::init();