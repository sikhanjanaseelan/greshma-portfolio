<?php
/**
 * Resources Page — Category Navigation.
 *
 * Dynamic source:
 * Resource Categories taxonomy.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;


/* ==========================================================
   RESOURCE COUNTS
========================================================== */

$resource_counts = wp_count_posts(
	'greshma_resource'
);

$published_count = isset(
	$resource_counts->publish
)
	? (int) $resource_counts->publish
	: 0;


/* ==========================================================
   RESOURCE CATEGORIES
========================================================== */

$terms = get_terms(
	array(
		'taxonomy'   => 'greshma_resource_category',
		'hide_empty' => false,
		'orderby'    => 'name',
		'order'      => 'ASC',
	)
);


/* ==========================================================
   ICON MAP
========================================================== */

$icon_map = array(

	'youth-education' => 'youth',

	'climate-action' => 'climate',

	'peacebuilding' => 'peace',

	'interfaith-dialogue' => 'interfaith',

	'community' => 'community',

	'facilitation-tools' => 'tools',

	'research-reports' => 'research',
);


/* ==========================================================
   CATEGORY DATA
========================================================== */

$resource_categories = array(

	array(
		'key'   => 'all',
		'label' => __( 'All Resources', 'greshma' ),
		'icon'  => 'all',
		'count' => $published_count,
	),
);


if (
	! empty( $terms ) &&
	! is_wp_error( $terms )
) {

	foreach ( $terms as $term ) {

		$resource_categories[] = array(

			'key'   => $term->slug,

			'label' => $term->name,

			'icon'  => isset(
				$icon_map[ $term->slug ]
			)
				? $icon_map[ $term->slug ]
				: 'all',

			'count' => (int) $term->count,
		);
	}
}
?>


<section class="resources-categories">

	<div class="container">

		<nav
			class="resources-categories__panel"
			aria-label="<?php esc_attr_e(
				'Resource categories',
				'greshma'
			); ?>"
		>

			<?php foreach ( $resource_categories as $category ) : ?>


				<a
					href="#resources-browse"
					class="resources-category<?php echo 'all' === $category['key'] ? ' is-active' : ''; ?>"
					data-resource-category="<?php echo esc_attr(
						$category['key']
					); ?>"
				>


					<!-- ======================================
					     ICON
					======================================= -->

					<span
						class="resources-category__icon"
						aria-hidden="true"
					>


						<?php if ( 'all' === $category['icon'] ) : ?>


							<!-- ALL / GENERIC -->

							<svg viewBox="0 0 48 48">

								<rect
									x="8"
									y="8"
									width="12"
									height="12"
									rx="2"
								/>

								<rect
									x="28"
									y="8"
									width="12"
									height="12"
									rx="2"
								/>

								<rect
									x="8"
									y="28"
									width="12"
									height="12"
									rx="2"
								/>

								<rect
									x="28"
									y="28"
									width="12"
									height="12"
									rx="2"
								/>

							</svg>



						<?php elseif ( 'youth' === $category['icon'] ) : ?>


							<!-- YOUTH & EDUCATION -->

							<svg viewBox="0 0 48 48">

								<circle
									cx="24"
									cy="12"
									r="5"
								/>

								<circle
									cx="11"
									cy="19"
									r="4"
								/>

								<circle
									cx="37"
									cy="19"
									r="4"
								/>

								<path
									d="M17 39v-8c0-6 3-11 7-11s7 5 7 11v8"
								/>

								<path
									d="M5 39v-7c0-5 2-9 6-9 3 0 5 2 7 5"
								/>

								<path
									d="M43 39v-7c0-5-2-9-6-9-3 0-5 2-7 5"
								/>

							</svg>



						<?php elseif ( 'climate' === $category['icon'] ) : ?>


							<!-- CLIMATE ACTION -->

							<svg viewBox="0 0 48 48">

								<path d="M24 41V19"/>

								<path
									d="
									M24 29
									C15 28 10 23 9 14
									C18 15 23 20 24 29
									Z
									"
								/>

								<path
									d="
									M24 23
									C26 15 31 10 39 8
									C39 17 34 22 24 24
									Z
									"
								/>

								<path d="M16 41h16"/>

							</svg>



						<?php elseif ( 'peace' === $category['icon'] ) : ?>


							<!-- PEACEBUILDING -->

							<svg viewBox="0 0 48 48">

								<path
									d="
									M8 27
									C15 26 20 22 23 16
									C25 22 29 25 34 26
									C38 27 41 26 44 24
									C41 31 35 35 28 35
									C21 36 15 33 11 29
									L6 32
									Z
									"
								/>

								<path
									d="
									M23 16
									C23 11 25 7 29 4
									C29 11 31 15 36 18
									"
								/>

							</svg>



						<?php elseif ( 'interfaith' === $category['icon'] ) : ?>


							<!-- INTERFAITH DIALOGUE -->

							<svg viewBox="0 0 48 48">

								<path d="M24 6v14"/>

								<path d="M18 12h12"/>

								<path
									d="M15 39c0-10 3-17 9-17s9 7 9 17"
								/>

								<path
									d="M9 39c0-6 2-10 6-12"
								/>

								<path
									d="M39 39c0-6-2-10-6-12"
								/>

								<path d="M10 16l4 4"/>

								<path d="M38 16l-4 4"/>

							</svg>



						<?php elseif ( 'community' === $category['icon'] ) : ?>


							<!-- COMMUNITY -->

							<svg viewBox="0 0 48 48">

								<circle
									cx="24"
									cy="13"
									r="5"
								/>

								<circle
									cx="11"
									cy="20"
									r="4"
								/>

								<circle
									cx="37"
									cy="20"
									r="4"
								/>

								<path
									d="M17 40v-8c0-6 3-11 7-11s7 5 7 11v8"
								/>

								<path
									d="M5 40v-6c0-5 2-9 6-9"
								/>

								<path
									d="M43 40v-6c0-5-2-9-6-9"
								/>

							</svg>



						<?php elseif ( 'tools' === $category['icon'] ) : ?>


							<!-- FACILITATION & TOOLS -->

							<svg viewBox="0 0 48 48">

								<path
									d="
									M29 8
									C33 7 37 8 40 11
									L34 17
									L38 21
									L44 15
									C45 20 43 25 39 28
									C36 30 32 30 29 28
									L15 42
									L7 34
									L21 20
									C19 16 20 12 23 9
									"
								/>

								<path d="M11 34l3 3"/>

							</svg>



						<?php elseif ( 'research' === $category['icon'] ) : ?>


							<!-- RESEARCH & REPORTS -->

							<svg viewBox="0 0 48 48">

								<path d="M12 6h17l7 7v29H12Z"/>

								<path d="M29 6v8h7"/>

								<path d="M18 21h12"/>

								<path d="M18 27h12"/>

								<path d="M18 33h8"/>

							</svg>


						<?php endif; ?>


					</span>


					<!-- ======================================
					     LABEL
					======================================= -->

					<span class="resources-category__label">

						<?php
						echo esc_html(
							$category['label']
						);
						?>

					</span>


					<!-- ======================================
					     COUNT
					======================================= -->

					<span class="resources-category__count">

						<?php
						echo esc_html(
							$category['count']
						);
						?>

					</span>


				</a>


			<?php endforeach; ?>

		</nav>

	</div>

</section>