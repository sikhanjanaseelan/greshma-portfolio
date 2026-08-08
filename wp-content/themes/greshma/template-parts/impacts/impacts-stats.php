<?php
/**
 * Impacts Page — Impact at a Glance.
 *
 * Dynamic source:
 * Greshma Core → Site Settings.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;


/* ==========================================================
   SETTINGS
========================================================== */

$countries = class_exists( 'Greshma_Core_Settings' )
	? Greshma_Core_Settings::get(
		'impact_countries',
		'25'
	)
	: '25';

$countries_suffix = class_exists( 'Greshma_Core_Settings' )
	? Greshma_Core_Settings::get(
		'impact_countries_suffix',
		'+'
	)
	: '+';


$young_people = class_exists( 'Greshma_Core_Settings' )
	? Greshma_Core_Settings::get(
		'impact_young_people',
		'500'
	)
	: '500';

$young_people_suffix = class_exists( 'Greshma_Core_Settings' )
	? Greshma_Core_Settings::get(
		'impact_young_people_suffix',
		'+'
	)
	: '+';


$workshops = class_exists( 'Greshma_Core_Settings' )
	? Greshma_Core_Settings::get(
		'impact_workshops',
		'100'
	)
	: '100';

$workshops_suffix = class_exists( 'Greshma_Core_Settings' )
	? Greshma_Core_Settings::get(
		'impact_workshops_suffix',
		'+'
	)
	: '+';


$collaborations = class_exists( 'Greshma_Core_Settings' )
	? Greshma_Core_Settings::get(
		'impact_collaborations',
		'50'
	)
	: '50';

$collaborations_suffix = class_exists( 'Greshma_Core_Settings' )
	? Greshma_Core_Settings::get(
		'impact_collaborations_suffix',
		'+'
	)
	: '+';


$years = class_exists( 'Greshma_Core_Settings' )
	? Greshma_Core_Settings::get(
		'impact_years',
		'12'
	)
	: '12';

$years_suffix = class_exists( 'Greshma_Core_Settings' )
	? Greshma_Core_Settings::get(
		'impact_years_suffix',
		'+'
	)
	: '+';


$continents = class_exists( 'Greshma_Core_Settings' )
	? Greshma_Core_Settings::get(
		'impact_continents',
		'4'
	)
	: '4';

$continents_suffix = class_exists( 'Greshma_Core_Settings' )
	? Greshma_Core_Settings::get(
		'impact_continents_suffix',
		''
	)
	: '';


$networks = class_exists( 'Greshma_Core_Settings' )
	? Greshma_Core_Settings::get(
		'impact_networks',
		'10'
	)
	: '10';

$networks_suffix = class_exists( 'Greshma_Core_Settings' )
	? Greshma_Core_Settings::get(
		'impact_networks_suffix',
		'+'
	)
	: '+';


$background_image = class_exists( 'Greshma_Core_Settings' )
	? Greshma_Core_Settings::get(
		'impact_stats_background',
		''
	)
	: '';


$stats = array(

	array(
		'value'  => $countries,
		'suffix' => $countries_suffix,
		'label'  => __( 'Countries', 'greshma' ),
	),

	array(
		'value'  => $young_people,
		'suffix' => $young_people_suffix,
		'label'  => __( 'Young People Reached', 'greshma' ),
	),

	array(
		'value'  => $workshops,
		'suffix' => $workshops_suffix,
		'label'  => __( 'Workshops & Sessions', 'greshma' ),
	),

	array(
		'value'  => $collaborations,
		'suffix' => $collaborations_suffix,
		'label'  => __( 'Collaborations', 'greshma' ),
	),

	array(
		'value'  => $years,
		'suffix' => $years_suffix,
		'label'  => __( 'Years of Engagement', 'greshma' ),
	),

	array(
		'value'  => $continents,
		'suffix' => $continents_suffix,
		'label'  => __( 'Continents', 'greshma' ),
	),

	array(
		'value'  => $networks,
		'suffix' => $networks_suffix,
		'label'  => __( 'Global Networks', 'greshma' ),
	),
);
?>

<section class="impacts-stats">


	<!-- ======================================================
	     BACKGROUND
	====================================================== -->

	<div class="impacts-stats__background">

		<?php if ( $background_image ) : ?>

			<img
				src="<?php echo esc_url( $background_image ); ?>"
				alt=""
				class="impacts-stats__background-image"
				loading="lazy"
			>

		<?php else : ?>

			<div class="impacts-stats__background-placeholder">

				<span>
					<?php
					esc_html_e(
						'Impact at a Glance',
						'greshma'
					);
					?>
				</span>

			</div>

		<?php endif; ?>

	</div>


	<div
		class="impacts-stats__overlay"
		aria-hidden="true"
	></div>


	<div class="container">

		<div class="impacts-stats__inner">


			<!-- ==============================================
			     HEADING
			============================================== -->

			<div class="impacts-stats__heading">

				<span
					class="impacts-stats__heading-line"
					aria-hidden="true"
				></span>


				<h2>
					<?php
					esc_html_e(
						'Impact at a Glance',
						'greshma'
					);
					?>
				</h2>


				<span
					class="impacts-stats__heading-leaf"
					aria-hidden="true"
				>
					❧
				</span>

			</div>


			<!-- ==============================================
			     STATS
			============================================== -->

			<div class="impacts-stats__grid">

				<?php foreach ( $stats as $stat ) : ?>

					<div class="impacts-stats__item">

						<strong>

							<?php
							echo esc_html(
								$stat['value']
							);
							?>

							<?php if ( '' !== $stat['suffix'] ) : ?>

								<span>
									<?php
									echo esc_html(
										$stat['suffix']
									);
									?>
								</span>

							<?php endif; ?>

						</strong>


						<p>
							<?php
							echo esc_html(
								$stat['label']
							);
							?>
						</p>

					</div>

				<?php endforeach; ?>

			</div>

		</div>

	</div>

</section>