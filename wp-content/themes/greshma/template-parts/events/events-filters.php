<?php
/**
 * Events Page — Search & Filters.
 *
 * Dynamic source:
 * Upcoming Greshma Events.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;


/* ==========================================================
   CURRENT DATE
========================================================== */

$today = current_time( 'Y-m-d' );


/* ==========================================================
   UPCOMING EVENT IDS
========================================================== */

$filter_events = get_posts(
	array(
		'post_type'      => 'greshma_event',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'fields'         => 'ids',

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
   FILTER DATA
========================================================== */

$event_types     = array();
$event_locations = array();
$event_months    = array();


foreach ( $filter_events as $event_id ) {


	/* ======================================================
	   EVENT TYPES
	====================================================== */

	$categories = get_the_terms(
		$event_id,
		'greshma_event_category'
	);

	if (
		$categories &&
		! is_wp_error( $categories )
	) {

		foreach ( $categories as $category ) {

			$event_types[ $category->slug ] =
				$category->name;
		}
	}


	/* ======================================================
	   LOCATION
	====================================================== */

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

	$location_label = $location ?: $venue;

	if ( $location_label ) {

		$location_key = sanitize_title(
			$location_label
		);

		$event_locations[ $location_key ] =
			$location_label;
	}


	/* ======================================================
	   MONTH
	====================================================== */

	$start_date = get_post_meta(
		$event_id,
		'_greshma_event_start_date',
		true
	);

	if ( $start_date ) {

		$timestamp = strtotime(
			$start_date
		);

		if ( $timestamp ) {

			/*
			 * Must match the data-event-month value
			 * used in events-upcoming.php.
			 */
			$month_label = date_i18n(
				'F',
				$timestamp
			);

			$month_key = strtolower(
				$month_label
			);

			/*
			 * Timestamp is stored as the array value
			 * temporarily so months can be ordered
			 * chronologically.
			 */
			if (
				! isset(
					$event_months[ $month_key ]
				)
			) {

				$event_months[ $month_key ] = array(
					'label'     => $month_label,
					'timestamp' => $timestamp,
				);
			}
		}
	}
}


/* ==========================================================
   SORT FILTER VALUES
========================================================== */

if ( $event_types ) {

	natcasesort(
		$event_types
	);
}


if ( $event_locations ) {

	natcasesort(
		$event_locations
	);
}


if ( $event_months ) {

	uasort(
		$event_months,
		static function ( $a, $b ) {

			return $a['timestamp']
				<=> $b['timestamp'];
		}
	);
}
?>

<section class="events-filters">

	<div class="container">

		<form
			class="events-filters__panel"
			id="events-filter-form"
			action="#"
			method="get"
		>


			<!-- ==================================================
			     SEARCH
			================================================== -->

			<label class="events-filter events-filter--search">

				<span class="screen-reader-text">

					<?php
					esc_html_e(
						'Search Events',
						'greshma'
					);
					?>

				</span>


				<span
					class="events-filter__icon"
					aria-hidden="true"
				>

					<svg viewBox="0 0 24 24">

						<circle
							cx="10.5"
							cy="10.5"
							r="6.5"
						/>

						<path d="M16 16l5 5"/>

					</svg>

				</span>


				<input
					type="search"
					name="event_search"
					placeholder="<?php
					esc_attr_e(
						'Search events...',
						'greshma'
					);
					?>"
					data-event-search
				>

			</label>


			<!-- ==================================================
			     EVENT TYPE
			================================================== -->

			<label class="events-filter events-filter--select">

				<span class="screen-reader-text">

					<?php
					esc_html_e(
						'Event Type',
						'greshma'
					);
					?>

				</span>


				<select
					name="event_type"
					data-event-type
				>

					<option value="all">

						<?php
						esc_html_e(
							'All Event Types',
							'greshma'
						);
						?>

					</option>


					<?php foreach (
						$event_types
						as $type_slug => $type_name
					) : ?>

						<option
							value="<?php
							echo esc_attr(
								$type_slug
							);
							?>"
						>

							<?php
							echo esc_html(
								$type_name
							);
							?>

						</option>

					<?php endforeach; ?>

				</select>


				<span
					class="events-filter__chevron"
					aria-hidden="true"
				>

					<svg viewBox="0 0 24 24">

						<path d="m7 9 5 5 5-5"/>

					</svg>

				</span>

			</label>


			<!-- ==================================================
			     LOCATION
			================================================== -->

			<label class="events-filter events-filter--select">

				<span class="screen-reader-text">

					<?php
					esc_html_e(
						'Event Location',
						'greshma'
					);
					?>

				</span>


				<select
					name="event_location"
					data-event-location
				>

					<option value="all">

						<?php
						esc_html_e(
							'All Locations',
							'greshma'
						);
						?>

					</option>


					<?php foreach (
						$event_locations
						as $location_slug => $location_name
					) : ?>

						<option
							value="<?php
							echo esc_attr(
								$location_slug
							);
							?>"
						>

							<?php
							echo esc_html(
								$location_name
							);
							?>

						</option>

					<?php endforeach; ?>

				</select>


				<span
					class="events-filter__chevron"
					aria-hidden="true"
				>

					<svg viewBox="0 0 24 24">

						<path d="m7 9 5 5 5-5"/>

					</svg>

				</span>

			</label>


			<!-- ==================================================
			     DATE / MONTH
			================================================== -->

			<label class="events-filter events-filter--select">

				<span class="screen-reader-text">

					<?php
					esc_html_e(
						'Event Date',
						'greshma'
					);
					?>

				</span>


				<select
					name="event_date"
					data-event-date
				>

					<option value="all">

						<?php
						esc_html_e(
							'All Dates',
							'greshma'
						);
						?>

					</option>


					<?php foreach (
						$event_months
						as $month_slug => $month_data
					) : ?>

						<option
							value="<?php
							echo esc_attr(
								$month_slug
							);
							?>"
						>

							<?php
							echo esc_html(
								$month_data['label']
							);
							?>

						</option>

					<?php endforeach; ?>

				</select>


				<span
					class="events-filter__chevron"
					aria-hidden="true"
				>

					<svg viewBox="0 0 24 24">

						<path d="m7 9 5 5 5-5"/>

					</svg>

				</span>

			</label>


			<!-- ==================================================
			     FIND EVENTS
			================================================== -->

			<button
				type="submit"
				class="events-filters__submit"
			>

				<span>

					<?php
					esc_html_e(
						'Find Events',
						'greshma'
					);
					?>

				</span>


				<svg
					viewBox="0 0 24 24"
					aria-hidden="true"
				>

					<path d="M4 5h16l-6 7v5l-4 2v-7Z"/>

				</svg>

			</button>

		</form>

	</div>

</section>