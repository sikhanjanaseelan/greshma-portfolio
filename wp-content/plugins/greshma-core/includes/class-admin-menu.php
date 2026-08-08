<?php
/**
 * Central Greshma admin navigation.
 *
 * Provides a grouped accordion-style administration workspace
 * for all Greshma Core content modules.
 *
 * WordPress natively supports only two admin-menu levels.
 * This controller keeps all Greshma modules under one parent
 * and visually creates a clean module -> child hierarchy.
 *
 * @package GreshmaCore
 */

defined( 'ABSPATH' ) || exit;

class Greshma_Core_Admin_Menu {

	/**
	 * Main Greshma admin menu slug.
	 */
	const MENU_SLUG = 'greshma-admin';


	/**
	 * Initialise hooks.
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

		add_filter(
			'parent_file',
			array( __CLASS__, 'set_active_parent_menu' )
		);

		add_filter(
			'submenu_file',
			array( __CLASS__, 'set_active_submenu' )
		);

		add_action(
			'admin_head',
			array( __CLASS__, 'print_admin_styles' )
		);

		add_action(
			'admin_footer',
			array( __CLASS__, 'print_admin_script' )
		);
	}


	/* ==========================================================
	   MODULE CONFIGURATION
	========================================================== */

	/**
	 * Return all Greshma admin modules.
	 *
	 * @return array
	 */
	private static function modules(): array {

		return array(

			/* ==================================================
			   MEDIA & PRESS
			================================================== */

			'media' => array(

				'title'       => __( 'Media & Press', 'greshma-core' ),
				'menu_title'  => __( 'MEDIA & PRESS', 'greshma-core' ),
				'group_slug'  => 'greshma-media-section',
				'color'       => '#e4bd65',
				'capability'  => 'edit_posts',
				'primary_cpt' => 'greshma_media',

				'description' => __(
					'Manage interviews, podcasts, videos, articles and press coverage featuring Greshma.',
					'greshma-core'
				),

				'post_types' => array(
					'greshma_media',
				),

				'taxonomies' => array(
					'greshma_media_category',
				),

				'children' => array(

					array(
						'title' => __( 'All Media & Press', 'greshma-core' ),
						'slug'  => 'edit.php?post_type=greshma_media',
						'cap'   => 'edit_posts',
					),

					array(
						'title' => __( 'Add New Media & Press', 'greshma-core' ),
						'slug'  => 'post-new.php?post_type=greshma_media',
						'cap'   => 'edit_posts',
					),

					array(
						'title' => __( 'Media Categories', 'greshma-core' ),
						'slug'  => 'edit-tags.php?taxonomy=greshma_media_category&post_type=greshma_media',
						'cap'   => 'manage_categories',
					),
				),
			),


			/* ==================================================
			   EDITORIAL
			================================================== */

			'editorial' => array(

				'title'       => __( 'Editorial', 'greshma-core' ),
				'menu_title'  => __( 'EDITORIAL', 'greshma-core' ),
				'group_slug'  => 'greshma-editorial-section',
				'color'       => '#91c09b',
				'capability'  => 'edit_posts',
				'primary_cpt' => 'greshma_editorial',

				'description' => __(
					'Manage reflections, stories, articles, research, publications and thought leadership.',
					'greshma-core'
				),

				'post_types' => array(
					'greshma_editorial',
				),

				'taxonomies' => array(
					'greshma_editorial_type',
					'greshma_editorial_topic',
				),

				'pages' => array(
					'greshma-editorial-studio',
				),

				'children' => array(

					array(
						'title'    => __( 'Content Studio', 'greshma-core' ),
						'slug'     => 'greshma-editorial-studio',
						'cap'      => 'edit_posts',
						'callback' => array(
							'Greshma_Core_Editorial_Admin',
							'render_content_studio',
						),
					),

					array(
						'title' => __( 'All Editorial', 'greshma-core' ),
						'slug'  => 'edit.php?post_type=greshma_editorial',
						'cap'   => 'edit_posts',
					),

					array(
						'title' => __( 'Add New Editorial', 'greshma-core' ),
						'slug'  => 'post-new.php?post_type=greshma_editorial',
						'cap'   => 'edit_posts',
					),

					array(
						'title' => __( 'Editorial Types', 'greshma-core' ),
						'slug'  => 'edit-tags.php?taxonomy=greshma_editorial_type&post_type=greshma_editorial',
						'cap'   => 'manage_categories',
					),

					array(
						'title' => __( 'Editorial Topics', 'greshma-core' ),
						'slug'  => 'edit-tags.php?taxonomy=greshma_editorial_topic&post_type=greshma_editorial',
						'cap'   => 'manage_categories',
					),
				),
			),


			/* ==================================================
			   PROJECTS
			================================================== */

			'projects' => array(

				'title'       => __( 'Projects', 'greshma-core' ),
				'menu_title'  => __( 'PROJECTS', 'greshma-core' ),
				'group_slug'  => 'greshma-projects-section',
				'color'       => '#8eb7c5',
				'capability'  => 'edit_posts',
				'primary_cpt' => 'greshma_project',

				'description' => __(
					'Manage initiatives, projects and organisations presented throughout the portfolio.',
					'greshma-core'
				),

				'post_types' => array(
					'greshma_project',
					'greshma_organization',
				),

				'taxonomies' => array(
					'greshma_project_category',
				),

				'children' => array(

					array(
						'title' => __( 'All Projects', 'greshma-core' ),
						'slug'  => 'edit.php?post_type=greshma_project',
						'cap'   => 'edit_posts',
					),

					array(
						'title' => __( 'Add New Project', 'greshma-core' ),
						'slug'  => 'post-new.php?post_type=greshma_project',
						'cap'   => 'edit_posts',
					),

					array(
						'title' => __( 'Project Categories', 'greshma-core' ),
						'slug'  => 'edit-tags.php?taxonomy=greshma_project_category&post_type=greshma_project',
						'cap'   => 'manage_categories',
					),

					array(
						'title' => __( 'Organizations', 'greshma-core' ),
						'slug'  => 'edit.php?post_type=greshma_organization',
						'cap'   => 'edit_posts',
					),

					array(
						'title' => __( 'Add Organization', 'greshma-core' ),
						'slug'  => 'post-new.php?post_type=greshma_organization',
						'cap'   => 'edit_posts',
					),
				),
			),


			/* ==================================================
			   EVENTS
			================================================== */

			'events' => array(

				'title'       => __( 'Events', 'greshma-core' ),
				'menu_title'  => __( 'EVENTS', 'greshma-core' ),
				'group_slug'  => 'greshma-events-section',
				'color'       => '#d8a078',
				'capability'  => 'edit_posts',
				'primary_cpt' => 'greshma_event',

				'description' => __(
					'Manage upcoming and past events, engagements and appearances.',
					'greshma-core'
				),

				'post_types' => array(
					'greshma_event',
				),

				'taxonomies' => array(
					'greshma_event_category',
				),

				'children' => array(

					array(
						'title' => __( 'All Events', 'greshma-core' ),
						'slug'  => 'edit.php?post_type=greshma_event',
						'cap'   => 'edit_posts',
					),

					array(
						'title' => __( 'Add New Event', 'greshma-core' ),
						'slug'  => 'post-new.php?post_type=greshma_event',
						'cap'   => 'edit_posts',
					),

					array(
						'title' => __( 'Event Categories', 'greshma-core' ),
						'slug'  => 'edit-tags.php?taxonomy=greshma_event_category&post_type=greshma_event',
						'cap'   => 'manage_categories',
					),
				),
			),


			/* ==================================================
			   GALLERY
			================================================== */

			'gallery' => array(

				'title'       => __( 'Gallery', 'greshma-core' ),
				'menu_title'  => __( 'GALLERY', 'greshma-core' ),
				'group_slug'  => 'greshma-gallery-section',
				'color'       => '#b8a2cf',
				'capability'  => 'edit_posts',
				'primary_cpt' => 'greshma_gallery',

				'description' => __(
					'Manage visual stories and image collections shown in the portfolio gallery.',
					'greshma-core'
				),

				'post_types' => array(
					'greshma_gallery',
				),

				'taxonomies' => array(
					'greshma_gallery_category',
				),

				'children' => array(

					array(
						'title' => __( 'All Gallery Items', 'greshma-core' ),
						'slug'  => 'edit.php?post_type=greshma_gallery',
						'cap'   => 'edit_posts',
					),

					array(
						'title' => __( 'Add Gallery Item', 'greshma-core' ),
						'slug'  => 'post-new.php?post_type=greshma_gallery',
						'cap'   => 'edit_posts',
					),

					array(
						'title' => __( 'Gallery Categories', 'greshma-core' ),
						'slug'  => 'edit-tags.php?taxonomy=greshma_gallery_category&post_type=greshma_gallery',
						'cap'   => 'manage_categories',
					),
				),
			),


			/* ==================================================
			   WORKSHOPS
			================================================== */

			'workshops' => array(

				'title'       => __( 'Workshops', 'greshma-core' ),
				'menu_title'  => __( 'WORKSHOPS', 'greshma-core' ),
				'group_slug'  => 'greshma-workshops-section',
				'color'       => '#d0ad72',
				'capability'  => 'edit_posts',
				'primary_cpt' => 'greshma_workshop',

				'description' => __(
					'Manage workshops, programmes, sessions and learning engagements.',
					'greshma-core'
				),

				'post_types' => array(
					'greshma_workshop',
				),

				'taxonomies' => array(
					'greshma_workshop_category',
				),

				'children' => array(

					array(
						'title' => __( 'All Workshops', 'greshma-core' ),
						'slug'  => 'edit.php?post_type=greshma_workshop',
						'cap'   => 'edit_posts',
					),

					array(
						'title' => __( 'Add New Workshop', 'greshma-core' ),
						'slug'  => 'post-new.php?post_type=greshma_workshop',
						'cap'   => 'edit_posts',
					),

					array(
						'title' => __( 'Workshop Categories', 'greshma-core' ),
						'slug'  => 'edit-tags.php?taxonomy=greshma_workshop_category&post_type=greshma_workshop',
						'cap'   => 'manage_categories',
					),
				),
			),


			/* ==================================================
			   RESOURCES
			================================================== */

			'resources' => array(

				'title'       => __( 'Resources', 'greshma-core' ),
				'menu_title'  => __( 'RESOURCES', 'greshma-core' ),
				'group_slug'  => 'greshma-resources-section',
				'color'       => '#7fb8ae',
				'capability'  => 'edit_posts',
				'primary_cpt' => 'greshma_resource',

				'description' => __(
					'Manage publications, downloads, guides and resources shared through the website.',
					'greshma-core'
				),

				'post_types' => array(
					'greshma_resource',
				),

				'taxonomies' => array(
					'greshma_resource_category',
				),

				'children' => array(

					array(
						'title' => __( 'All Resources', 'greshma-core' ),
						'slug'  => 'edit.php?post_type=greshma_resource',
						'cap'   => 'edit_posts',
					),

					array(
						'title' => __( 'Add New Resource', 'greshma-core' ),
						'slug'  => 'post-new.php?post_type=greshma_resource',
						'cap'   => 'edit_posts',
					),

					array(
						'title' => __( 'Resource Categories', 'greshma-core' ),
						'slug'  => 'edit-tags.php?taxonomy=greshma_resource_category&post_type=greshma_resource',
						'cap'   => 'manage_categories',
					),
				),
			),


			/* ==================================================
			   MY PATHS
			================================================== */

			'paths' => array(

				'title'       => __( 'My Paths', 'greshma-core' ),
				'menu_title'  => __( 'MY PATHS', 'greshma-core' ),
				'group_slug'  => 'greshma-paths-section',
				'color'       => '#9eb77d',
				'capability'  => 'edit_posts',
				'primary_cpt' => 'greshma_journey',

				'description' => __(
					'Manage journey milestones, key moments and education history used on the My Paths page.',
					'greshma-core'
				),

				'post_types' => array(
					'greshma_journey',
					'greshma_education',
				),

				'taxonomies' => array(),

				'children' => array(

					array(
						'title' => __( 'Key Moments', 'greshma-core' ),
						'slug'  => 'edit.php?post_type=greshma_journey',
						'cap'   => 'edit_posts',
					),

					array(
						'title' => __( 'Add Key Moment', 'greshma-core' ),
						'slug'  => 'post-new.php?post_type=greshma_journey',
						'cap'   => 'edit_posts',
					),

					array(
						'title' => __( 'Education', 'greshma-core' ),
						'slug'  => 'edit.php?post_type=greshma_education',
						'cap'   => 'edit_posts',
					),

					array(
						'title' => __( 'Add Education', 'greshma-core' ),
						'slug'  => 'post-new.php?post_type=greshma_education',
						'cap'   => 'edit_posts',
					),
				),
			),


			/* ==================================================
			   TESTIMONIALS
			================================================== */

			'testimonials' => array(

				'title'       => __( 'Testimonials', 'greshma-core' ),
				'menu_title'  => __( 'TESTIMONIALS', 'greshma-core' ),
				'group_slug'  => 'greshma-testimonials-section',
				'color'       => '#c79a9a',
				'capability'  => 'edit_posts',
				'primary_cpt' => 'greshma_testimonial',

				'description' => __(
					'Manage testimonials, recommendations and voices shown throughout the portfolio.',
					'greshma-core'
				),

				'post_types' => array(
					'greshma_testimonial',
				),

				'taxonomies' => array(
					'greshma_testimonial_group',
				),

				'children' => array(

					array(
						'title' => __( 'All Testimonials', 'greshma-core' ),
						'slug'  => 'edit.php?post_type=greshma_testimonial',
						'cap'   => 'edit_posts',
					),

					array(
						'title' => __( 'Add New Testimonial', 'greshma-core' ),
						'slug'  => 'post-new.php?post_type=greshma_testimonial',
						'cap'   => 'edit_posts',
					),

					array(
						'title' => __( 'Testimonial Groups', 'greshma-core' ),
						'slug'  => 'edit-tags.php?taxonomy=greshma_testimonial_group&post_type=greshma_testimonial',
						'cap'   => 'manage_categories',
					),
				),
			),


			/* ==================================================
			   SITE SETTINGS
			================================================== */

			'settings' => array(

				'title'       => __( 'Site Settings', 'greshma-core' ),
				'menu_title'  => __( 'SITE SETTINGS', 'greshma-core' ),
				'group_slug'  => 'greshma-settings-section',
				'color'       => '#aebcb2',
				'capability'  => 'manage_options',
				'primary_cpt' => '',

				'description' => __(
					'Manage contact details, social links, newsletter information and global website settings.',
					'greshma-core'
				),

				'post_types' => array(),

				'taxonomies' => array(),

				'pages' => array(
					'greshma-settings',
				),

				'children' => array(

					array(
						'title'    => __( 'Site Settings', 'greshma-core' ),
						'slug'     => 'greshma-settings',
						'cap'      => 'manage_options',
						'callback' => array(
							'Greshma_Core_Settings',
							'render_page',
						),
					),
				),
			),
		);
	}


	/* ==========================================================
	   PARENT MENU
	========================================================== */

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


	/* ==========================================================
	   SUBMENUS
	========================================================== */

	public static function register_submenus(): void {

		add_submenu_page(
			self::MENU_SLUG,
			__( 'Greshma Dashboard', 'greshma-core' ),
			__( 'Dashboard', 'greshma-core' ),
			'edit_posts',
			self::MENU_SLUG,
			array( __CLASS__, 'render_dashboard' )
		);

		foreach ( self::modules() as $module ) {

			/**
			 * Module heading / landing page.
			 */
			add_submenu_page(
				self::MENU_SLUG,
				$module['title'],
				$module['menu_title'],
				$module['capability'],
				$module['group_slug'],
				array( __CLASS__, 'render_module_landing' )
			);


			/**
			 * Module children.
			 */
			foreach ( $module['children'] as $child ) {

				$callback = isset( $child['callback'] )
					? $child['callback']
					: null;

				add_submenu_page(
					self::MENU_SLUG,
					$child['title'],
					$child['title'],
					$child['cap'],
					$child['slug'],
					$callback
				);
			}
		}
	}


	/* ==========================================================
	   CURRENT MODULE
	========================================================== */

	private static function current_module(): string {

		global $typenow;

		$taxonomy = isset( $_GET['taxonomy'] )
			? sanitize_key( wp_unslash( $_GET['taxonomy'] ) )
			: '';

		$page = isset( $_GET['page'] )
			? sanitize_key( wp_unslash( $_GET['page'] ) )
			: '';


		foreach ( self::modules() as $key => $module ) {

			if (
				$page &&
				$page === $module['group_slug']
			) {
				return $key;
			}


			if (
				! empty( $module['pages'] ) &&
				in_array(
					$page,
					$module['pages'],
					true
				)
			) {
				return $key;
			}


			if (
				$typenow &&
				in_array(
					$typenow,
					$module['post_types'],
					true
				)
			) {
				return $key;
			}


			if (
				$taxonomy &&
				in_array(
					$taxonomy,
					$module['taxonomies'],
					true
				)
			) {
				return $key;
			}
		}


		return '';
	}


	/* ==========================================================
	   KEEP GRESHMA PARENT ACTIVE
	========================================================== */

	public static function set_active_parent_menu( $parent_file ) {

		if ( self::current_module() ) {
			return self::MENU_SLUG;
		}

		return $parent_file;
	}


	/* ==========================================================
	   ACTIVE CHILD MENU
	========================================================== */

	public static function set_active_submenu( $submenu_file ) {

		global $typenow, $pagenow;

		$taxonomy = isset( $_GET['taxonomy'] )
			? sanitize_key( wp_unslash( $_GET['taxonomy'] ) )
			: '';

		$page = isset( $_GET['page'] )
			? sanitize_key( wp_unslash( $_GET['page'] ) )
			: '';


		/**
		 * Custom admin pages.
		 */
		if ( $page ) {

			foreach ( self::modules() as $module ) {

				foreach ( $module['children'] as $child ) {

					if ( $page === $child['slug'] ) {
						return $child['slug'];
					}
				}

				if ( $page === $module['group_slug'] ) {
					return $module['group_slug'];
				}
			}
		}


		/**
		 * Taxonomies.
		 */
		if (
			'edit-tags.php' === $pagenow &&
			$taxonomy
		) {

			foreach ( self::modules() as $module ) {

				foreach ( $module['children'] as $child ) {

					if (
						false !== strpos(
							$child['slug'],
							'taxonomy=' . $taxonomy
						)
					) {
						return $child['slug'];
					}
				}
			}
		}


		/**
		 * Add New CPT.
		 */
		if (
			'post-new.php' === $pagenow &&
			$typenow
		) {

			return 'post-new.php?post_type=' . $typenow;
		}


		/**
		 * Edit existing CPT.
		 *
		 * Highlight "All" while editing an item.
		 */
		if (
			'post.php' === $pagenow &&
			$typenow
		) {

			return 'edit.php?post_type=' . $typenow;
		}


		/**
		 * CPT list.
		 */
		if (
			'edit.php' === $pagenow &&
			$typenow
		) {

			return 'edit.php?post_type=' . $typenow;
		}


		return $submenu_file;
	}


	/* ==========================================================
	   DASHBOARD
	========================================================== */

	public static function render_dashboard(): void {

		$modules = self::modules();
		?>

		<div class="wrap greshma-admin-dashboard">

			<header class="greshma-admin-dashboard__hero">

				<span class="greshma-admin-dashboard__eyebrow">
					<?php esc_html_e( 'Portfolio Management', 'greshma-core' ); ?>
				</span>

				<h1>
					<?php esc_html_e( 'Greshma Dashboard', 'greshma-core' ); ?>
				</h1>

				<p>
					<?php
					esc_html_e(
						'Manage portfolio content, stories, projects, events, media and website information from one organised workspace.',
						'greshma-core'
					);
					?>
				</p>

			</header>


			<div class="greshma-admin-dashboard__grid">

				<?php foreach ( $modules as $module ) : ?>

					<?php
					if (
						! current_user_can(
							$module['capability']
						)
					) {
						continue;
					}

					$count = 0;

					if ( $module['primary_cpt'] ) {

						$post_count = wp_count_posts(
							$module['primary_cpt']
						);

						$count = isset( $post_count->publish )
							? (int) $post_count->publish
							: 0;
					}

					$module_url = admin_url(
						'admin.php?page=' .
						$module['group_slug']
					);
					?>

					<a
						class="greshma-admin-card"
						href="<?php echo esc_url( $module_url ); ?>"
						style="--greshma-module-color: <?php echo esc_attr( $module['color'] ); ?>;"
					>

						<span class="greshma-admin-card__accent"></span>

						<div>

							<h2>
								<?php echo esc_html( $module['title'] ); ?>
							</h2>

							<p>
								<?php echo esc_html( $module['description'] ); ?>
							</p>

							<?php if ( $module['primary_cpt'] ) : ?>

								<span class="greshma-admin-card__count">
									<?php echo esc_html( $count ); ?>
									<?php esc_html_e( 'published', 'greshma-core' ); ?>
								</span>

							<?php endif; ?>

						</div>

					</a>

				<?php endforeach; ?>

			</div>

		</div>

		<?php
	}


	/* ==========================================================
	   GENERIC MODULE LANDING PAGE
	========================================================== */

	public static function render_module_landing(): void {

		$page = isset( $_GET['page'] )
			? sanitize_key( wp_unslash( $_GET['page'] ) )
			: '';

		$selected = null;

		foreach ( self::modules() as $module ) {

			if ( $page === $module['group_slug'] ) {
				$selected = $module;
				break;
			}
		}

		if ( ! $selected ) {
			return;
		}


		$published = 0;
		$drafts    = 0;

		if ( $selected['primary_cpt'] ) {

			$count = wp_count_posts(
				$selected['primary_cpt']
			);

			$published = isset( $count->publish )
				? (int) $count->publish
				: 0;

			$drafts = isset( $count->draft )
				? (int) $count->draft
				: 0;
		}
		?>

		<div
			class="wrap greshma-module-page"
			style="--greshma-module-color: <?php echo esc_attr( $selected['color'] ); ?>;"
		>

			<header class="greshma-module-page__header">

				<span class="greshma-module-page__eyebrow">
					<?php esc_html_e( 'Greshma Content', 'greshma-core' ); ?>
				</span>

				<h1>
					<?php echo esc_html( $selected['title'] ); ?>
				</h1>

				<p>
					<?php echo esc_html( $selected['description'] ); ?>
				</p>

			</header>


			<?php if ( $selected['primary_cpt'] ) : ?>

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

			<?php endif; ?>


			<div class="greshma-module-actions">

				<?php foreach ( $selected['children'] as $index => $child ) : ?>

					<?php
					if ( ! current_user_can( $child['cap'] ) ) {
						continue;
					}

					$url = self::admin_child_url(
						$child['slug']
					);
					?>

					<a
						class="button <?php echo 0 === $index ? 'button-primary' : ''; ?>"
						href="<?php echo esc_url( $url ); ?>"
					>
						<?php echo esc_html( $child['title'] ); ?>
					</a>

				<?php endforeach; ?>

			</div>

		</div>

		<?php
	}


	/* ==========================================================
	   ADMIN CHILD URL
	========================================================== */

	private static function admin_child_url( string $slug ): string {

		/**
		 * Real WordPress admin screens.
		 */
		if (
			0 === strpos( $slug, 'edit.php' ) ||
			0 === strpos( $slug, 'post-new.php' ) ||
			0 === strpos( $slug, 'edit-tags.php' )
		) {
			return admin_url( $slug );
		}


		/**
		 * Custom admin page.
		 */
		return admin_url(
			'admin.php?page=' . $slug
		);
	}


	/* ==========================================================
	   ADMIN MENU SCRIPT
	========================================================== */

	public static function print_admin_script(): void {

		$modules = self::modules();

		$groups = array();

		foreach ( $modules as $key => $module ) {

			$groups[ $key ] = $module['group_slug'];
		}

		$current_module = self::current_module();
		?>

		<script>
		document.addEventListener('DOMContentLoaded', function () {

			const menu = document.querySelector(
				'#adminmenu .toplevel_page_greshma-admin'
			);

			if (!menu) {
				return;
			}

			const submenu = menu.querySelector('.wp-submenu');

			if (!submenu) {
				return;
			}

			const groups = <?php echo wp_json_encode( $groups ); ?>;

			const currentModule =
				<?php echo wp_json_encode( $current_module ); ?>;


			/* ==================================================
			   IDENTIFY GROUP HEADINGS
			================================================== */

			const headings = {};

			Object.keys(groups).forEach(function (key) {

				const slug = groups[key];

				const link = submenu.querySelector(
					'a[href*="page=' + slug + '"]'
				);

				if (!link) {
					return;
				}

				const li = link.closest('li');

				if (!li) {
					return;
				}

				li.classList.add(
					'greshma-module-heading',
					'greshma-module-heading--' + key
				);

				headings[key] = li;
			});


			/* ==================================================
			   CLASSIFY CHILD ITEMS BY POSITION
			================================================== */

			Object.keys(headings).forEach(function (key) {

				const heading = headings[key];

				let next = heading.nextElementSibling;

				while (next) {

					if (
						next.classList.contains(
							'greshma-module-heading'
						)
					) {
						break;
					}

					next.classList.add(
						'greshma-module-child',
						'greshma-module-child--' + key
					);

					next = next.nextElementSibling;
				}
			});


			/* ==================================================
			   OPEN ACTIVE MODULE ONLY
			================================================== */

			function applyState(moduleKey) {

				Object.keys(headings).forEach(function (key) {

					const open = key === moduleKey;

					headings[key].classList.toggle(
						'is-greshma-module-open',
						open
					);

					submenu.querySelectorAll(
						'.greshma-module-child--' + key
					).forEach(function (item) {

						item.classList.toggle(
							'is-greshma-child-visible',
							open
						);

					});
				});
			}


			applyState(currentModule);


			/* ==================================================
			   CLICK FEEDBACK
			================================================== */

			Object.keys(headings).forEach(function (key) {

				const link = headings[key].querySelector('a');

				if (!link) {
					return;
				}

				link.addEventListener('click', function () {

					applyState(key);

				});
			});

		});
		</script>

		<?php
	}


	/* ==========================================================
	   ADMIN STYLES
	========================================================== */

	public static function print_admin_styles(): void {

		$modules = self::modules();
		?>

		<style>

		/* ======================================================
		   GRESHMA TOP LEVEL
		====================================================== */

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


		/* ======================================================
		   SUBMENU
		====================================================== */

		#adminmenu
		.toplevel_page_greshma-admin
		.wp-submenu {
			padding:
				8px
				0
				12px;

			background: #12261e;
		}


		#adminmenu
		.toplevel_page_greshma-admin
		.wp-submenu
		a {
			color: #d3ded7;

			transition:
				color .16s ease,
				background-color .16s ease;
		}


		/* ======================================================
		   DASHBOARD
		====================================================== */

		#adminmenu
		.toplevel_page_greshma-admin
		.wp-submenu
		a[href="admin.php?page=greshma-admin"] {
			margin-bottom: 6px;

			padding:
				10px
				14px
				12px;

			color: #ffffff;

			font-weight: 700;

			border-bottom:
				1px solid
				rgba(255,255,255,.10);
		}


		/* ======================================================
		   ACCORDION CHILDREN
		====================================================== */

		#adminmenu
		.toplevel_page_greshma-admin
		.wp-submenu
		.greshma-module-child {
			display: none;
		}


		#adminmenu
		.toplevel_page_greshma-admin
		.wp-submenu
		.greshma-module-child.is-greshma-child-visible {
			display: block;
		}


		/* ======================================================
		   GROUP HEADINGS
		====================================================== */

		#adminmenu
		.toplevel_page_greshma-admin
		.wp-submenu
		.greshma-module-heading
		> a {
			position: relative;

			margin-top: 5px;

			padding:
				10px
				30px
				8px
				14px;

			font-size: 11px;
			font-weight: 800;

			line-height: 1.25;

			letter-spacing: .075em;

			text-transform: uppercase;

			border-top:
				1px solid
				rgba(255,255,255,.07);
		}


		#adminmenu
		.toplevel_page_greshma-admin
		.wp-submenu
		.greshma-module-heading
		> a::after {
			position: absolute;

			top: 50%;
			right: 13px;

			content: "+";

			font-size: 14px;

			transform:
				translateY(-50%);

			opacity: .65;
		}


		#adminmenu
		.toplevel_page_greshma-admin
		.wp-submenu
		.greshma-module-heading.is-greshma-module-open
		> a::after {
			content: "−";
		}


		#adminmenu
		.toplevel_page_greshma-admin
		.wp-submenu
		.greshma-module-heading.is-greshma-module-open
		> a {
			background:
				rgba(255,255,255,.055);
		}


		/* ======================================================
		   CHILD LINKS
		====================================================== */

		#adminmenu
		.toplevel_page_greshma-admin
		.wp-submenu
		.greshma-module-child
		> a {
			position: relative;

			padding:
				7px
				14px
				7px
				28px;

			color: #c5d3ca;

			font-size: 12px;

			font-weight: 400;
		}


		#adminmenu
		.toplevel_page_greshma-admin
		.wp-submenu
		.greshma-module-child
		> a::before {
			position: absolute;

			top: 50%;
			left: 16px;

			width: 4px;
			height: 4px;

			content: "";

			background: currentColor;

			border-radius: 50%;

			transform:
				translateY(-50%);

			opacity: .40;
		}


		#adminmenu
		.toplevel_page_greshma-admin
		.wp-submenu
		.greshma-module-child
		> a:hover {
			color: #ffffff;

			background:
				rgba(128,165,137,.12);
		}


		#adminmenu
		.toplevel_page_greshma-admin
		.wp-submenu
		.greshma-module-child.current
		> a {
			color: #ffffff;

			font-weight: 700;

			background:
				rgba(128,165,137,.17);
		}


		/* ======================================================
		   MODULE COLORS
		====================================================== */

		<?php foreach ( $modules as $key => $module ) : ?>

		#adminmenu
		.toplevel_page_greshma-admin
		.wp-submenu
		.greshma-module-heading--<?php echo esc_attr( $key ); ?>
		> a {
			color:
				<?php echo esc_html( $module['color'] ); ?>;
		}

		<?php endforeach; ?>


		/* ======================================================
		   DASHBOARD / MODULE PAGES
		====================================================== */

		.greshma-admin-dashboard,
		.greshma-module-page {
			max-width: 1180px;

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

			color: #62806b;

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
				9px;

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


		/* Dashboard cards */

		.greshma-admin-dashboard__grid {
			display: grid;

			grid-template-columns:
				repeat(
					auto-fit,
					minmax(260px,1fr)
				);

			gap: 16px;
		}


		.greshma-admin-card {
			position: relative;

			display: block;

			overflow: hidden;

			min-height: 145px;

			padding: 20px;

			color: inherit;

			background: #ffffff;

			border:
				1px solid #dfe7e1;

			border-radius: 10px;

			box-shadow:
				0 7px 22px
				rgba(36,75,54,.05);

			text-decoration: none;
		}


		.greshma-admin-card:hover {
			border-color:
				var(--greshma-module-color);

			box-shadow:
				0 10px 26px
				rgba(36,75,54,.09);
		}


		.greshma-admin-card__accent {
			position: absolute;

			top: 0;
			left: 0;

			width: 4px;
			height: 100%;

			background:
				var(--greshma-module-color);
		}


		.greshma-admin-card h2 {
			margin:
				0
				0
				7px;

			color: #244638;

			font-size: 17px;
		}


		.greshma-admin-card p {
			margin:
				0
				0
				12px;

			color: #68756e;

			font-size: 13px;

			line-height: 1.55;
		}


		.greshma-admin-card__count {
			color:
				var(--greshma-module-color);

			font-size: 11px;

			font-weight: 700;

			text-transform: uppercase;
		}


		/* Module statistics */

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
				1px solid #dfe7e1;

			border-radius: 8px;
		}


		.greshma-module-stat strong {
			display: block;

			color:
				var(--greshma-module-color);

			font-size: 24px;
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


		.greshma-module-actions
		.button-primary {
			background: #315b47;

			border-color: #315b47;
		}


		.greshma-module-actions
		.button-primary:hover {
			background: #244b39;

			border-color: #244b39;
		}

		</style>

		<?php
	}
}


Greshma_Core_Admin_Menu::init();