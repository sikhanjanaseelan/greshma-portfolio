<?php
/**
 * Events Archive.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="site-main events-page events-archive-page">

	<section class="events-archive-hero">

		<div class="container">

			<div class="events-archive-hero__content">

				<span class="events-archive-hero__eyebrow">
					<?php esc_html_e(
						'Events & Gatherings',
						'greshma'
					); ?>
				</span>

				<h1>
					<?php esc_html_e(
						'Explore All Events',
						'greshma'
					); ?>
				</h1>

				<p>
					<?php esc_html_e(
						'Browse upcoming and past workshops, conversations, conferences, webinars and community gatherings.',
						'greshma'
					); ?>
				</p>

			</div>

		</div>

	</section>


	<?php
	get_template_part(
		'template-parts/events/events-filters'
	);

	get_template_part(
		'template-parts/events/events-upcoming'
	);

	get_template_part(
		'template-parts/events/events-past'
	);
	?>

</main>

<?php
get_footer();