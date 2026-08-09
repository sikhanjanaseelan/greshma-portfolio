<?php
/**
 * Resource Library Archive.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="resources-page resources-archive-page">

	<section class="resources-archive-hero">

		<div class="container">

			<div class="resources-archive-hero__content">

				<span class="resources-archive-hero__eyebrow">
					<?php esc_html_e(
						'Resource Library',
						'greshma'
					); ?>
				</span>

				<h1>
					<?php esc_html_e(
						'Explore All Resources',
						'greshma'
					); ?>
				</h1>

				<p>
					<?php esc_html_e(
						'Browse guides, toolkits, publications, reports, research and downloadable resources for learning, dialogue and community action.',
						'greshma'
					); ?>
				</p>

			</div>

		</div>

	</section>


	<?php
	/**
	 * Reuse the exact same dynamic category navigation.
	 */
	get_template_part(
		'template-parts/resources/resources-categories'
	);


	/**
	 * Reuse the full dynamic resource browser.
	 */
	get_template_part(
		'template-parts/resources/resources-browse'
	);
	?>

</main>

<?php
get_footer();