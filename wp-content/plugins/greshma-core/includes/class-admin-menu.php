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


add_action(
	'admin_footer',
	array( __CLASS__, 'print_admin_menu_script' )
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



        /* ==========================================================
   EDITORIAL — GROUP TITLE
========================================================== */

add_submenu_page(
	self::MENU_SLUG,
	__( 'Editorial', 'greshma-core' ),
	__( 'EDITORIAL', 'greshma-core' ),
	'edit_posts',
	'greshma-editorial-section',
	array(
		'Greshma_Core_Editorial_Admin',
		'render_content_studio',
	)
);


/* ==========================================================
   EDITORIAL — CONTENT STUDIO
========================================================== */

add_submenu_page(
	self::MENU_SLUG,
	__( 'Content Studio', 'greshma-core' ),
	__( 'Content Studio', 'greshma-core' ),
	'edit_posts',
	Greshma_Core_Editorial_Admin::STUDIO_SLUG,
	array(
		'Greshma_Core_Editorial_Admin',
		'render_content_studio',
	)
);


/* ==========================================================
   EDITORIAL — ALL EDITORIAL
========================================================== */

add_submenu_page(
	self::MENU_SLUG,
	__( 'All Editorial', 'greshma-core' ),
	__( 'All Editorial', 'greshma-core' ),
	'edit_posts',
	'edit.php?post_type=greshma_editorial',
	null
);


/* ==========================================================
   EDITORIAL — ADD NEW
========================================================== */

add_submenu_page(
	self::MENU_SLUG,
	__( 'Add New Editorial', 'greshma-core' ),
	__( 'Add New Editorial', 'greshma-core' ),
	'edit_posts',
	'post-new.php?post_type=greshma_editorial',
	null
);


/* ==========================================================
   EDITORIAL — TYPES
========================================================== */

add_submenu_page(
	self::MENU_SLUG,
	__( 'Editorial Types', 'greshma-core' ),
	__( 'Editorial Types', 'greshma-core' ),
	'manage_categories',
	'edit-tags.php?taxonomy=greshma_editorial_type&post_type=greshma_editorial',
	null
);


/* ==========================================================
   EDITORIAL — TOPICS
========================================================== */

add_submenu_page(
	self::MENU_SLUG,
	__( 'Editorial Topics', 'greshma-core' ),
	__( 'Editorial Topics', 'greshma-core' ),
	'manage_categories',
	'edit-tags.php?taxonomy=greshma_editorial_topic&post_type=greshma_editorial',
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

$page = isset( $_GET['page'] )
	? sanitize_key( wp_unslash( $_GET['page'] ) )
	: '';

if (
	Greshma_Core_Editorial_Admin::STUDIO_SLUG === $page ||
	'greshma-editorial-section' === $page
) {
	return self::MENU_SLUG;
}

	if (
	'greshma_media' === $typenow ||
	'greshma_media_category' === $taxonomy ||
	'greshma_editorial' === $typenow ||
	'greshma_editorial_type' === $taxonomy ||
	'greshma_editorial_topic' === $taxonomy
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

/* Editorial Content Studio */

if (
	'admin.php' === $pagenow &&
	isset( $_GET['page'] ) &&
	Greshma_Core_Editorial_Admin::STUDIO_SLUG ===
		sanitize_key( wp_unslash( $_GET['page'] ) )
) {
	return Greshma_Core_Editorial_Admin::STUDIO_SLUG;
}


/* Editorial Types */

if (
	'edit-tags.php' === $pagenow &&
	'greshma_editorial_type' === $taxonomy
) {
	return 'edit-tags.php?taxonomy=greshma_editorial_type&post_type=greshma_editorial';
}


/* Editorial Topics */

if (
	'edit-tags.php' === $pagenow &&
	'greshma_editorial_topic' === $taxonomy
) {
	return 'edit-tags.php?taxonomy=greshma_editorial_topic&post_type=greshma_editorial';
}


/* Add New Editorial */

if (
	'post-new.php' === $pagenow &&
	'greshma_editorial' === $typenow
) {
	return 'post-new.php?post_type=greshma_editorial';
}


/* Edit Editorial */

if (
	'post.php' === $pagenow &&
	'greshma_editorial' === $typenow
) {
	return 'edit.php?post_type=greshma_editorial';
}


/* All Editorial */

if (
	'edit.php' === $pagenow &&
	'greshma_editorial' === $typenow
) {
	return 'edit.php?post_type=greshma_editorial';
}
	return $submenu_file;
}


/**
 * Add accordion behaviour to the Greshma admin menu.
 *
 * WordPress supports only two native menu levels.
 * This script visually groups our submenu links into modules
 * and expands only the module currently being used.
 *
 * @return void
 */
public static function print_admin_menu_script(): void {
	?>

	<script>
		document.addEventListener('DOMContentLoaded', function () {

			const greshmaMenu = document.querySelector(
				'#adminmenu .toplevel_page_greshma-admin'
			);

			if (!greshmaMenu) {
				return;
			}

			const submenu = greshmaMenu.querySelector('.wp-submenu');

			if (!submenu) {
				return;
			}


			/* =====================================================
			   MODULE DEFINITIONS
			===================================================== */

			const modules = {

				media: {
					parentMatch: 'greshma-media-section',

					children: [
						'edit.php?post_type=greshma_media',
						'post-new.php?post_type=greshma_media',
						'taxonomy=greshma_media_category'
					]
				},

				editorial: {
					parentMatch: 'greshma-editorial-section',

					children: [
						'greshma-editorial-studio',
						'edit.php?post_type=greshma_editorial',
						'post-new.php?post_type=greshma_editorial',
						'taxonomy=greshma_editorial_type',
						'taxonomy=greshma_editorial_topic'
					]
				}

			};


			/* =====================================================
			   FIND MENU ITEMS
			===================================================== */

			Object.keys(modules).forEach(function (moduleName) {

				const module = modules[moduleName];

				module.parent = null;
				module.items  = [];

				submenu.querySelectorAll('li').forEach(function (li) {

					const link = li.querySelector('a');

					if (!link) {
						return;
					}

					const href = link.getAttribute('href') || '';


					/* Module heading */

					if (href.includes(module.parentMatch)) {

						module.parent = li;

						li.classList.add(
							'greshma-module-heading',
							'greshma-module-heading--' + moduleName
						);
					}


					/* Module children */

					module.children.forEach(function (match) {

						if (href.includes(match)) {

							/*
							 * Avoid treating the group heading itself
							 * as one of its children.
							 */
							if (!href.includes(module.parentMatch)) {

								li.classList.add(
									'greshma-module-child',
									'greshma-module-child--' + moduleName
								);

								if (!module.items.includes(li)) {
									module.items.push(li);
								}

							}

						}

					});

				});

			});


			/* =====================================================
			   DETERMINE CURRENT MODULE
			===================================================== */

			function detectCurrentModule() {

				const currentUrl = window.location.href;

				/*
				 * MEDIA & PRESS
				 */
				if (
					currentUrl.includes('post_type=greshma_media') ||
					currentUrl.includes('taxonomy=greshma_media_category') ||
					currentUrl.includes('page=greshma-media-section')
				) {
					return 'media';
				}


				/*
				 * EDITORIAL
				 */
				if (
					currentUrl.includes('post_type=greshma_editorial') ||
					currentUrl.includes('taxonomy=greshma_editorial_type') ||
					currentUrl.includes('taxonomy=greshma_editorial_topic') ||
					currentUrl.includes('page=greshma-editorial-studio') ||
					currentUrl.includes('page=greshma-editorial-section')
				) {
					return 'editorial';
				}


				return null;
			}


			/* =====================================================
			   COLLAPSE / EXPAND
			===================================================== */

			function openModule(moduleName) {

				Object.keys(modules).forEach(function (name) {

					const module = modules[name];

					const isOpen = name === moduleName;


					/* Module heading state */

					if (module.parent) {

						module.parent.classList.toggle(
							'is-greshma-module-open',
							isOpen
						);

						const parentLink =
							module.parent.querySelector('a');

						if (parentLink) {

							parentLink.setAttribute(
								'aria-expanded',
								isOpen ? 'true' : 'false'
							);

						}

					}


					/* Child visibility */

					module.items.forEach(function (item) {

						item.classList.toggle(
							'is-greshma-child-visible',
							isOpen
						);

					});

				});

			}


			/* =====================================================
			   INITIAL STATE
			===================================================== */

			const currentModule = detectCurrentModule();

			openModule(currentModule);


			/* =====================================================
			   HEADING CLICK
			===================================================== */

			Object.keys(modules).forEach(function (moduleName) {

				const module = modules[moduleName];

				if (!module.parent) {
					return;
				}

				const link = module.parent.querySelector('a');

				if (!link) {
					return;
				}

				link.addEventListener('click', function (event) {

					/*
					 * Allow the module landing page to load normally.
					 *
					 * Before navigation, visually open the clicked
					 * module so interaction feels immediate.
					 */
					openModule(moduleName);

				});

			});

		});
	</script>

	<?php
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

/* =========================================================
   EDITORIAL GROUP TITLE
========================================================= */

#adminmenu
.toplevel_page_greshma-admin
.wp-submenu
a[href*="greshma-editorial-section"] {
	margin-top: 9px;

	padding-top: 12px;
	padding-bottom: 6px;

	color: #8fc39b;

	font-size: 11px;
	font-weight: 800;

	letter-spacing: .08em;
	text-transform: uppercase;

	border-top:
		1px solid
		rgba(255, 255, 255, .08);
}

#adminmenu
.toplevel_page_greshma-admin
.wp-submenu
a[href*="greshma-editorial-section"]:hover {
	color: #a9d5b1;
	background: transparent;
}


/* Editorial children */

#adminmenu
.toplevel_page_greshma-admin
.wp-submenu
a[href*="greshma-editorial-studio"],

#adminmenu
.toplevel_page_greshma-admin
.wp-submenu
a[href*="post_type=greshma_editorial"],

#adminmenu
.toplevel_page_greshma-admin
.wp-submenu
a[href*="taxonomy=greshma_editorial_type"],

#adminmenu
.toplevel_page_greshma-admin
.wp-submenu
a[href*="taxonomy=greshma_editorial_topic"] {
	padding-left: 25px;
	color: #bfd1c3;
}

/* =========================================================
   GRESHMA MODULE ACCORDION
========================================================= */

/*
 * Child items are hidden by default.
 */

#adminmenu
.toplevel_page_greshma-admin
.wp-submenu
.greshma-module-child {
	display: none;
}


/*
 * Only children belonging to the currently active
 * module are displayed.
 */

#adminmenu
.toplevel_page_greshma-admin
.wp-submenu
.greshma-module-child.is-greshma-child-visible {
	display: block;
}


/* =========================================================
   MODULE HEADINGS
========================================================= */

#adminmenu
.toplevel_page_greshma-admin
.wp-submenu
.greshma-module-heading > a {
	position: relative;

	margin-top: 7px;

	padding:
		11px
		28px
		8px
		14px;

	font-size: 11px;
	font-weight: 800;

	letter-spacing: .08em;

	text-transform: uppercase;

	cursor: pointer;

	border-top:
		1px solid
		rgba(255, 255, 255, .08);
}


/*
 * Small indicator.
 * Not a down-arrow glyph; just a clean + / − state.
 */

#adminmenu
.toplevel_page_greshma-admin
.wp-submenu
.greshma-module-heading > a::after {
	position: absolute;

	top: 50%;
	right: 12px;

	content: "+";

	font-size: 15px;
	font-weight: 400;

	line-height: 1;

	transform: translateY(-50%);

	opacity: .65;
}


#adminmenu
.toplevel_page_greshma-admin
.wp-submenu
.greshma-module-heading.is-greshma-module-open > a::after {
	content: "−";
}


/* =========================================================
   MEDIA GROUP
========================================================= */

#adminmenu
.toplevel_page_greshma-admin
.wp-submenu
.greshma-module-heading--media > a {
	color: #e4bd65;
}


/* =========================================================
   EDITORIAL GROUP
========================================================= */

#adminmenu
.toplevel_page_greshma-admin
.wp-submenu
.greshma-module-heading--editorial > a {
	color: #91c09b;
}


/* =========================================================
   MODULE CHILD ITEMS
========================================================= */

#adminmenu
.toplevel_page_greshma-admin
.wp-submenu
.greshma-module-child > a {
	position: relative;

	padding:
		7px
		14px
		7px
		27px;

	color: #c4d3c8;

	font-size: 12px;
	font-weight: 400;

	text-transform: none;

	letter-spacing: normal;
}


/*
 * Simple visual guide rather than arrows.
 */

#adminmenu
.toplevel_page_greshma-admin
.wp-submenu
.greshma-module-child > a::before {
	position: absolute;

	top: 50%;
	left: 15px;

	width: 4px;
	height: 4px;

	background: currentColor;

	border-radius: 50%;

	content: "";

	transform: translateY(-50%);

	opacity: .45;
}


#adminmenu
.toplevel_page_greshma-admin
.wp-submenu
.greshma-module-child > a:hover {
	color: #ffffff;

	background:
		rgba(130, 165, 138, .12);
}


/* Current child */

#adminmenu
.toplevel_page_greshma-admin
.wp-submenu
.greshma-module-child.current > a {
	color: #ffffff;

	font-weight: 700;

	background:
		rgba(130, 165, 138, .16);
}
/* Make Content Studio stand out */

#adminmenu
.toplevel_page_greshma-admin
.wp-submenu
a[href*="greshma-editorial-studio"] {
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