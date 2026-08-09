<?php
/**
 * Template Name: Past Events
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main
	id="primary"
	class="site-main events-page events-listing-page"
>

	<section class="events-archive-hero">

		<div class="container">

			<div class="events-archive-hero__content">

				<span class="events-archive-hero__eyebrow">
					<?php esc_html_e(
						'Looking Back',
						'greshma'
					); ?>
				</span>

				<h1>
					<?php esc_html_e(
						'Past Events',
						'greshma'
					); ?>
				</h1>

				<p>
					<?php esc_html_e(
						'Explore previous workshops, dialogues, conferences and gatherings from across the journey.',
						'greshma'
					); ?>
				</p>

			</div>

		</div>

	</section>


	<?php
	get_template_part(
		'template-parts/events/events-past'
	);
	?>

</main>

<?php
get_footer();