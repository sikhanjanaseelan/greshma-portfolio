<?php
/**
 * Global Footprint of Impact section.
 *
 * @package Greshma
 */

$impact_stats = array(
	array(
		'number' => '25+',
		'label'  => 'Countries Reached',
	),
	array(
		'number' => '500+',
		'label'  => 'Young Leaders Empowered',
	),
	array(
		'number' => '100+',
		'label'  => 'Workshops & Programs',
	),
	array(
		'number' => 'Thousands',
		'label'  => 'Lives Touched Positively',
	),
);

$impact_locations = array(
	array(
		'name'  => 'United Kingdom',
		'class' => 'impact-location--uk',
	),
	array(
		'name'  => 'Europe',
		'class' => 'impact-location--europe',
	),
	array(
		'name'  => 'India',
		'class' => 'impact-location--india',
	),
	array(
		'name'  => 'Costa Rica',
		'class' => 'impact-location--costa-rica',
	),
	array(
		'name'  => 'Brazil',
		'class' => 'impact-location--brazil',
	),
);
?>

<section class="impact-section" id="impact">
	<div class="impact-section__inner">

		<div class="impact-section__content">

			<p class="impact-section__eyebrow">
				<?php esc_html_e( 'A Global Footprint of Impact', 'greshma' ); ?>
			</p>

			<h2 class="impact-section__title">
				<?php esc_html_e( 'Working across continents with communities, youth and partners for peace and the planet.', 'greshma' ); ?>
			</h2>

			<a class="impact-section__link" href="<?php echo esc_url( home_url( '/impact/' ) ); ?>">
				<span><?php esc_html_e( 'View Full Impact', 'greshma' ); ?></span>

				<svg
					aria-hidden="true"
					viewBox="0 0 24 24"
					width="20"
					height="20"
					fill="none"
				>
					<path
						d="M5 12H19M13 6L19 12L13 18"
						stroke="currentColor"
						stroke-width="1.8"
						stroke-linecap="round"
						stroke-linejoin="round"
					/>
				</svg>
			</a>

			<div class="impact-stats">
				<?php foreach ( $impact_stats as $stat ) : ?>
					<div class="impact-stat">
						<strong class="impact-stat__number">
							<?php echo esc_html( $stat['number'] ); ?>
						</strong>

						<span class="impact-stat__label">
							<?php echo esc_html( $stat['label'] ); ?>
						</span>
					</div>
				<?php endforeach; ?>
			</div>

		</div>

		<div class="impact-map">

			<div class="impact-map__placeholder" aria-hidden="true">

<div class="impact-map__world">

	<svg
		id="greshma-impact-map"
		class="impact-map__svg"
		viewBox="0 0 1000 520"
		preserveAspectRatio="xMidYMid meet"
		role="img"
		aria-labelledby="impact-map-title impact-map-description"
	>
		<title id="impact-map-title">
			<?php esc_html_e( 'Global footprint of impact', 'greshma' ); ?>
		</title>

		<desc id="impact-map-description">
			<?php esc_html_e(
				'A world map showing impact locations in the United Kingdom, Europe, India, Costa Rica and Brazil.',
				'greshma'
			); ?>
		</desc>

		<path class="impact-map__land"></path>
	</svg>

	<p class="impact-map__status" aria-live="polite">
		<?php esc_html_e( 'Loading world map…', 'greshma' ); ?>
	</p>

</div>

			<?php foreach ( $impact_locations as $location ) : ?>
	<div class="impact-location <?php echo esc_attr( $location['class'] ); ?>">
		<span class="impact-location__pulse"></span>
		<span class="impact-location__dot"></span>

		<span class="impact-location__label">
			<?php echo esc_html( $location['name'] ); ?>
		</span>
	</div>
<?php endforeach; ?>

			</div>

			<div class="impact-map__fade" aria-hidden="true"></div>

		</div>

	</div>
</section>


<script src="https://cdn.jsdelivr.net/npm/d3@7.9.0/dist/d3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/topojson-client@3.1.0/dist/topojson-client.min.js"></script>

<script>
document.addEventListener( 'DOMContentLoaded', function () {
	'use strict';

	const mapElement = document.getElementById( 'greshma-impact-map' );

	if (
		! mapElement ||
		typeof window.d3 === 'undefined' ||
		typeof window.topojson === 'undefined'
	) {
		return;
	}

	const mapWidth  = 1000;
	const mapHeight = 520;

	const svg = window.d3.select( mapElement );

	const statusElement = mapElement
		.closest( '.impact-map__world' )
		.querySelector( '.impact-map__status' );

	window.d3
		.json(
			'https://cdn.jsdelivr.net/npm/world-atlas@2.0.2/land-110m.json'
		)
		.then( function ( world ) {
			const land = window.topojson.feature(
				world,
				world.objects.land
			);

			const projection = window.d3
				.geoNaturalEarth1()
				.fitExtent(
					[
						[ 20, 18 ],
						[ mapWidth - 20, mapHeight - 18 ]
					],
					land
				);

			const pathGenerator = window.d3.geoPath( projection );

			svg
				.select( '.impact-map__land' )
				.datum( land )
				.attr( 'd', pathGenerator );

			if ( statusElement ) {
				statusElement.remove();
			}
		})
		.catch( function ( error ) {
			console.error( 'Unable to load impact map:', error );

			if ( statusElement ) {
				statusElement.textContent =
					'The world map could not be loaded.';
			}
		});
});
</script>