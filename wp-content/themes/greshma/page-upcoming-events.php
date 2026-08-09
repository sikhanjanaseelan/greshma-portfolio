<?php
/**
 * Template Name: Upcoming Events
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main
	id="primary"
	class="site-main events-page events-listing-page events-upcoming-page"
>

	<!-- ======================================================
	     HERO
	====================================================== -->

	<section class="events-archive-hero">

		<div class="container">

			<div class="events-archive-hero__content">

				<a
					href="<?php echo esc_url(
						home_url( '/events/' )
					); ?>"
					class="events-listing-page__back"
				>
					<span aria-hidden="true">
						←
					</span>

					<?php
					esc_html_e(
						'Back to Events',
						'greshma'
					);
					?>
				</a>


				<span class="events-archive-hero__eyebrow">

					<?php
					esc_html_e(
						'Events & Gatherings',
						'greshma'
					);
					?>

				</span>


				<h1>
					<?php
					esc_html_e(
						'Upcoming Events',
						'greshma'
					);
					?>
				</h1>


				<p>
					<?php
					esc_html_e(
						'Discover upcoming workshops, conversations, conferences and community gatherings.',
						'greshma'
					);
					?>
				</p>

			</div>

		</div>

	</section>


	<!-- ======================================================
	     FILTERS
	====================================================== -->

	<?php
	get_template_part(
		'template-parts/events/events-filters'
	);
	?>


	<!-- ======================================================
	     UPCOMING EVENTS
	====================================================== -->

	<?php
	get_template_part(
		'template-parts/events/events-upcoming'
	);
	?>


</main>

<?php
get_footer();