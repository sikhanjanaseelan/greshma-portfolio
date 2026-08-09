<?php
/**
 * Events Page — Sidebar.
 *
 * Dynamic:
 * - Next Event
 * - Event Categories
 *
 * Newsletter remains presentational for now.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;


/* ==========================================================
   CURRENT DATE
========================================================== */

$today = current_time( 'Y-m-d' );


/* ==========================================================
   NEXT EVENT
========================================================== */

$next_event_query = new WP_Query(
	array(
		'post_type'      => 'greshma_event',
		'post_status'    => 'publish',
		'posts_per_page' => 1,

		'meta_query' => array(
			array(
				'key'     => '_greshma_event_start_date',
				'value'   => $today,
				'compare' => '>=',
				'type'    => 'DATE',
			),
		),

		'meta_key' => '_greshma_event_start_date',

		'orderby' => array(
			'meta_value' => 'ASC',
			'date'       => 'ASC',
		),
	)
);


/* ==========================================================
   EVENT CATEGORIES
========================================================== */

$event_categories = get_terms(
	array(
		'taxonomy'   => 'greshma_event_category',
		'hide_empty' => true,
		'orderby'    => 'name',
		'order'      => 'ASC',
	)
);
?>

<div class="events-sidebar">


	<!-- ======================================================
	     NEXT EVENT
	====================================================== -->

	<?php if ( $next_event_query->have_posts() ) : ?>

		<?php
		while ( $next_event_query->have_posts() ) :
			$next_event_query->the_post();

			$event_id = get_the_ID();


			/* ==================================================
			   DATE
			================================================== */

			$start_date = get_post_meta(
				$event_id,
				'_greshma_event_start_date',
				true
			);

			$date_timestamp = $start_date
				? strtotime( $start_date )
				: false;

			$date_day = $date_timestamp
				? date_i18n(
					'd',
					$date_timestamp
				)
				: '';

			$date_month = $date_timestamp
				? strtoupper(
					date_i18n(
						'M',
						$date_timestamp
					)
				)
				: '';


			/* ==================================================
			   TIME
			================================================== */

			$start_time = get_post_meta(
				$event_id,
				'_greshma_event_start_time',
				true
			);

			$end_time = get_post_meta(
				$event_id,
				'_greshma_event_end_time',
				true
			);

			$time_label = '';

			if ( $start_time ) {

				$start_time_object =
					DateTime::createFromFormat(
						'H:i',
						$start_time
					);

				if ( $start_time_object ) {

					$time_label =
						$start_time_object->format(
							'g:i A'
						);
				}
			}


			if ( $end_time ) {

				$end_time_object =
					DateTime::createFromFormat(
						'H:i',
						$end_time
					);

				if ( $end_time_object ) {

					$formatted_end =
						$end_time_object->format(
							'g:i A'
						);

					if ( $time_label ) {

						$time_label .=
							' – ' .
							$formatted_end;

					} else {

						$time_label =
							$formatted_end;
					}
				}
			}


			/* ==================================================
			   LOCATION
			================================================== */

			$location = get_post_meta(
				$event_id,
				'_greshma_event_location',
				true
			);

			$venue = get_post_meta(
				$event_id,
				'_greshma_event_venue',
				true
			);

			$location_label = $location
				?: $venue;


			/* ==================================================
			   REGISTRATION
			================================================== */

			$registration_url = get_post_meta(
				$event_id,
				'_greshma_event_registration_url',
				true
			);
			?>


			<section class="events-sidebar__widget events-sidebar__next">

				<span class="events-sidebar__eyebrow">
					<?php
					esc_html_e(
						'Next Event',
						'greshma'
					);
					?>
				</span>


				<?php if ( $date_day && $date_month ) : ?>

					<div class="events-sidebar__next-date">

						<strong>
							<?php
							echo esc_html(
								$date_day
							);
							?>
						</strong>

						<span>
							<?php
							echo esc_html(
								$date_month
							);
							?>
						</span>

					</div>

				<?php endif; ?>


				<h3>
					<?php the_title(); ?>
				</h3>


				<?php if (
					$location_label ||
					$time_label
				) : ?>

					<p>

						<?php if ( $location_label ) : ?>

							<?php
							echo esc_html(
								$location_label
							);
							?>

						<?php endif; ?>


						<?php if (
							$location_label &&
							$time_label
						) : ?>

							<br>

						<?php endif; ?>


						<?php if ( $time_label ) : ?>

							<?php
							echo esc_html(
								$time_label
							);
							?>

						<?php endif; ?>

					</p>

				<?php endif; ?>


				<a href="<?php the_permalink(); ?>">

					<?php
					esc_html_e(
						'View Event',
						'greshma'
					);
					?>

					<span aria-hidden="true">
						→
					</span>

				</a>


				<?php if ( $registration_url ) : ?>

					<a
						href="<?php echo esc_url(
							$registration_url
						); ?>"
						class="events-sidebar__register"
						target="_blank"
						rel="noopener noreferrer"
					>

						<?php
						esc_html_e(
							'Register',
							'greshma'
						);
						?>

					</a>

				<?php endif; ?>

			</section>


		<?php endwhile; ?>


		<?php wp_reset_postdata(); ?>


	<?php else : ?>


		<section class="events-sidebar__widget events-sidebar__next">

			<span class="events-sidebar__eyebrow">
				<?php
				esc_html_e(
					'Next Event',
					'greshma'
				);
				?>
			</span>

			<h3>
				<?php
				esc_html_e(
					'New events coming soon',
					'greshma'
				);
				?>
			</h3>

			<p>
				<?php
				esc_html_e(
					'Check back for upcoming gatherings, workshops and conversations.',
					'greshma'
				);
				?>
			</p>

		</section>


	<?php endif; ?>


	<!-- ======================================================
	     CATEGORIES
	====================================================== -->

	<?php if (
		! empty( $event_categories ) &&
		! is_wp_error( $event_categories )
	) : ?>

		<section class="events-sidebar__widget">

			<div class="events-sidebar__heading">

				<h3>
					<?php
					esc_html_e(
						'Categories',
						'greshma'
					);
					?>
				</h3>

				<span aria-hidden="true">
					❧
				</span>

			</div>


			<ul class="events-sidebar__categories">

				<?php foreach (
					$event_categories
					as $category
				) : ?>

					<li>

						<a
							href="#events-filter-form"
							data-events-sidebar-category="<?php
							echo esc_attr(
								$category->slug
							);
							?>"
						>

							<span>

								<?php
								echo esc_html(
									$category->name
								);
								?>

							</span>


							<span>

								<?php
								echo esc_html(
									str_pad(
										(string) $category->count,
										2,
										'0',
										STR_PAD_LEFT
									)
								);
								?>

							</span>

						</a>

					</li>

				<?php endforeach; ?>

			</ul>

		</section>

	<?php endif; ?>


	<!-- ======================================================
	     NEWSLETTER
	====================================================== -->

	<section class="events-sidebar__widget events-sidebar__newsletter">

		<span
			class="events-sidebar__newsletter-icon"
			aria-hidden="true"
		>
			✉
		</span>


		<h3>
			<?php
			esc_html_e(
				'Stay Updated',
				'greshma'
			);
			?>
		</h3>


		<p>
			<?php
			esc_html_e(
				'Get notified about upcoming events and gatherings.',
				'greshma'
			);
			?>
		</p>


		<form action="#" method="post">

			<label
				class="screen-reader-text"
				for="events-sidebar-email"
			>
				<?php
				esc_html_e(
					'Email Address',
					'greshma'
				);
				?>
			</label>


			<input
				id="events-sidebar-email"
				type="email"
				placeholder="<?php
				esc_attr_e(
					'Your email address',
					'greshma'
				);
				?>"
				required
			>


			<button type="submit">

				<?php
				esc_html_e(
					'Subscribe',
					'greshma'
				);
				?>

			</button>

		</form>

	</section>

</div>


<!-- ==========================================================
     SIDEBAR CATEGORY → MAIN FILTER
========================================================== -->

<script>
document.addEventListener(
	'DOMContentLoaded',
	function () {

		const sidebarLinks =
			document.querySelectorAll(
				'[data-events-sidebar-category]'
			);

		const typeSelect =
			document.querySelector(
				'[data-event-type]'
			);

		const filterForm =
			document.querySelector(
				'#events-filter-form'
			);


		if (
			! sidebarLinks.length ||
			! typeSelect ||
			! filterForm
		) {
			return;
		}


		sidebarLinks.forEach(
			function (link) {

				link.addEventListener(
					'click',
					function () {

						const category =
							link.getAttribute(
								'data-events-sidebar-category'
							);

						if ( ! category ) {
							return;
						}


						typeSelect.value =
							category;


						/*
						 * Trigger the same change event used
						 * by the existing Events filtering JS.
						 */
						typeSelect.dispatchEvent(
							new Event(
								'change',
								{
									bubbles: true
								}
							)
						);

					}
				);

			}
		);

	}
);
</script>