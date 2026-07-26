<?php
/**
 * Homepage Journey Timeline section.
 *
 * @package Greshma
 */

$journey_items = array(
	array(
		'year'        => '2010',
		'title'       => 'The Journey Begins',
		'description' => 'Started volunteering in intercultural, interfaith and environmental initiatives.',
		'icon'        => 'heart',
	),
	array(
		'year'        => '2016',
		'title'       => 'Academic Milestone',
		'description' => 'Completed my Bachelor’s degree in English.',
		'icon'        => 'education',
	),
	array(
		'year'        => '2019',
		'title'       => 'International Learning',
		'description' => 'Completed my Master’s in International Peace Studies at the University for Peace, Costa Rica.',
		'icon'        => 'globe',
	),
	array(
		'year'        => '2021',
		'title'       => 'Ecopeace Teen Café',
		'description' => 'Founded Ecopeace Teen Café, a grassroots youth hub for climate and peace.',
		'icon'        => 'community',
	),
	array(
		'year'        => '2024',
		'title'       => 'Global Fellowship',
		'description' => 'Joined Our Kids’ Climate as Community and Fellowship Manager.',
		'icon'        => 'people',
	),
	array(
		'year'        => 'Today',
		'title'       => 'Continuing the Journey',
		'description' => 'Serving as Global Council Trustee at URI while continuing the journey of impact and transformation.',
		'icon'        => 'star',
	),
);
?>

<section class="home-journey" aria-labelledby="home-journey-title">

	<div class="site-container">

		<header class="home-journey__heading">

			<span class="home-journey__heading-line" aria-hidden="true"></span>

			<h2 id="home-journey-title" class="home-journey__title">
				<?php esc_html_e( 'My Journey', 'greshma' ); ?>
			</h2>

			<span class="home-journey__leaf" aria-hidden="true">
				⌁
			</span>

			<span class="home-journey__heading-line" aria-hidden="true"></span>

		</header>

		<div class="journey-timeline">

			<div class="journey-timeline__line" aria-hidden="true"></div>

			<div class="journey-timeline__items">

				<?php foreach ( $journey_items as $index => $item ) : ?>

					<article class="journey-item">

						<div class="journey-item__marker">

							<span
								class="journey-item__icon journey-item__icon--<?php echo esc_attr( $item['icon'] ); ?>"
								aria-hidden="true"
							>
								<?php
								switch ( $item['icon'] ) {
									case 'heart':
										echo '♥';
										break;

									case 'education':
										echo '◆';
										break;

									case 'globe':
										echo '◎';
										break;

									case 'community':
										echo '♙';
										break;

									case 'people':
										echo '♣';
										break;

									case 'star':
										echo '★';
										break;

									default:
										echo '•';
								}
								?>
							</span>

						</div>

						<div class="journey-item__content">

							<p class="journey-item__year">
								<?php echo esc_html( $item['year'] ); ?>
							</p>

							<h3 class="journey-item__title">
								<?php echo esc_html( $item['title'] ); ?>
							</h3>

							<p class="journey-item__description">
								<?php echo esc_html( $item['description'] ); ?>
							</p>

						</div>

					</article>

				<?php endforeach; ?>

			</div>

		</div>

		<div class="home-journey__footer">

			<a
				class="home-journey__link"
				href="<?php echo esc_url( home_url( '/journey/' ) ); ?>"
			>
				<span><?php esc_html_e( 'Explore My Full Journey', 'greshma' ); ?></span>
				<span aria-hidden="true">→</span>
			</a>

		</div>

	</div>

</section>