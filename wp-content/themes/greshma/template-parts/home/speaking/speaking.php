<?php
/**
 * Homepage Speaking & Engagements section.
 *
 * @package Greshma
 */

$speaking_items = array(
	array(
		'title'    => 'Youth Leadership and Peacebuilding',
		'type'     => 'Keynote',
		'location' => 'International Forum',
		'image'    => '',
		'link'     => home_url( '/speaking/' ),
	),
	array(
		'title'    => 'Climate Action Through Community',
		'type'     => 'Panel Discussion',
		'location' => 'Global Network',
		'image'    => '',
		'link'     => home_url( '/speaking/' ),
	),
	array(
		'title'    => 'Interfaith Dialogue for Social Change',
		'type'     => 'Workshop',
		'location' => 'India',
		'image'    => '',
		'link'     => home_url( '/speaking/' ),
	),
	array(
		'title'    => 'Building Youth-Led Movements',
		'type'     => 'Conference',
		'location' => 'Europe',
		'image'    => '',
		'link'     => home_url( '/speaking/' ),
	),
	array(
		'title'    => 'Education, Empathy and Transformation',
		'type'     => 'Guest Lecture',
		'location' => 'Academic Forum',
		'image'    => '',
		'link'     => home_url( '/speaking/' ),
	),
);
?>

<section class="home-speaking" aria-labelledby="home-speaking-title">

	<div class="site-container">

		<header class="home-speaking__header">

			<div class="home-speaking__heading-group">

				<p class="section-eyebrow">
					<?php esc_html_e( 'Speaking & Engagements', 'greshma' ); ?>
				</p>

				<h2 id="home-speaking-title" class="home-speaking__title">
					<?php esc_html_e(
						'Conversations that inspire reflection, courage and collective action.',
						'greshma'
					); ?>
				</h2>

			</div>

			<div class="home-speaking__intro">

				<p>
					<?php esc_html_e(
						'Selected keynotes, panels, workshops and conversations across youth leadership, peacebuilding and climate action.',
						'greshma'
					); ?>
				</p>

				<a
					class="home-speaking__all-link"
					href="<?php echo esc_url( home_url( '/speaking/' ) ); ?>"
				>
					<span><?php esc_html_e( 'Explore All Engagements', 'greshma' ); ?></span>
					<span aria-hidden="true">→</span>
				</a>

			</div>

		</header>

		<div class="home-speaking__grid">

			<?php foreach ( $speaking_items as $index => $item ) : ?>

				<article class="speaking-card speaking-card--<?php echo esc_attr( $index + 1 ); ?>">

					<a
						class="speaking-card__media"
						href="<?php echo esc_url( $item['link'] ); ?>"
						aria-label="<?php echo esc_attr( $item['title'] ); ?>"
					>

						<?php if ( ! empty( $item['image'] ) ) : ?>

							<img
								class="speaking-card__image"
								src="<?php echo esc_url( $item['image'] ); ?>"
								alt="<?php echo esc_attr( $item['title'] ); ?>"
								loading="lazy"
							>

						<?php else : ?>

							<div
								class="speaking-card__placeholder speaking-card__placeholder--<?php echo esc_attr( $index + 1 ); ?>"
								aria-hidden="true"
							>
								<span>
									<?php
									printf(
										esc_html__( 'Engagement Image %d', 'greshma' ),
										esc_html( $index + 1 )
									);
									?>
								</span>
							</div>

						<?php endif; ?>

						<span class="speaking-card__type">
							<?php echo esc_html( $item['type'] ); ?>
						</span>

					</a>

					<div class="speaking-card__content">

						<p class="speaking-card__location">
							<?php echo esc_html( $item['location'] ); ?>
						</p>

						<h3 class="speaking-card__title">
							<a href="<?php echo esc_url( $item['link'] ); ?>">
								<?php echo esc_html( $item['title'] ); ?>
							</a>
						</h3>

						<a
							class="speaking-card__link"
							href="<?php echo esc_url( $item['link'] ); ?>"
							aria-label="<?php echo esc_attr( $item['title'] ); ?>"
						>
							<span aria-hidden="true">↗</span>
						</a>

					</div>

				</article>

			<?php endforeach; ?>

		</div>

	</div>

</section>