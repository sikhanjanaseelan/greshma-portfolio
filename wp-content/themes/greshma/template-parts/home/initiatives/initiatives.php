<?php
/**
 * Homepage Featured Initiatives section.
 *
 * @package Greshma
 */

$initiatives = array(
	array(
		'title'       => 'Ecopeace Teen Café',
		'category'    => 'Youth Peacebuilding',
		'description' => 'A youth-led space nurturing dialogue, leadership, creativity and meaningful action for peace and the planet.',
		'location'    => 'India',
		'image'       => '',
		'link'        => home_url( '/projects/ecopeace-teen-cafe/' ),
	),
	array(
		'title'       => 'Global Youth Engagement',
		'category'    => 'Leadership & Collaboration',
		'description' => 'Connecting young leaders, educators and communities through conversations, workshops and collaborative initiatives.',
		'location'    => 'Global',
		'image'       => '',
		'link'        => home_url( '/projects/' ),
	),
	array(
		'title'       => 'Peace and Planet Programs',
		'category'    => 'Education & Sustainability',
		'description' => 'Programs that help communities explore peacebuilding, environmental responsibility and collective wellbeing.',
		'location'    => 'International',
		'image'       => '',
		'link'        => home_url( '/projects/' ),
	),
);
?>

<section class="home-initiatives" aria-labelledby="home-initiatives-title">
	<div class="site-container">

		<header class="home-initiatives__header">

			<div class="home-initiatives__heading-group">
				<p class="section-eyebrow">
					<?php esc_html_e( 'Featured Initiatives', 'greshma' ); ?>
				</p>

				<h2
					id="home-initiatives-title"
					class="home-initiatives__title"
				>
					<?php esc_html_e(
						'Ideas brought to life through community and collaboration.',
						'greshma'
					); ?>
				</h2>
			</div>

			<div class="home-initiatives__intro">
				<p>
					<?php esc_html_e(
						'Selected initiatives created and supported across youth leadership, peacebuilding, education and sustainability.',
						'greshma'
					); ?>
				</p>

				<a
					class="text-link home-initiatives__all-link"
					href="<?php echo esc_url( home_url( '/projects/' ) ); ?>"
				>
					<span><?php esc_html_e( 'Explore All Projects', 'greshma' ); ?></span>

					<span class="text-link__arrow" aria-hidden="true">
						→
					</span>
				</a>
			</div>

		</header>

		<div class="home-initiatives__grid">

			<?php foreach ( $initiatives as $index => $initiative ) : ?>

				<article
					class="initiative-card initiative-card--<?php echo esc_attr( $index + 1 ); ?>"
				>

					<a
						class="initiative-card__media"
						href="<?php echo esc_url( $initiative['link'] ); ?>"
						aria-label="<?php echo esc_attr(
							sprintf(
								/* translators: %s: initiative title */
								__( 'View %s', 'greshma' ),
								$initiative['title']
							)
						); ?>"
					>

						<?php if ( ! empty( $initiative['image'] ) ) : ?>

							<img
								class="initiative-card__image"
								src="<?php echo esc_url( $initiative['image'] ); ?>"
								alt="<?php echo esc_attr( $initiative['title'] ); ?>"
								loading="lazy"
							>

						<?php else : ?>

							<div
								class="initiative-card__placeholder"
								aria-hidden="true"
							>
								<span>
									<?php
									echo esc_html(
										sprintf(
											/* translators: %d: placeholder number */
											__( 'Project Image %d', 'greshma' ),
											$index + 1
										)
									);
									?>
								</span>
							</div>

						<?php endif; ?>

						<span class="initiative-card__number" aria-hidden="true">
							<?php echo esc_html( str_pad( $index + 1, 2, '0', STR_PAD_LEFT ) ); ?>
						</span>

					</a>

					<div class="initiative-card__content">

						<div class="initiative-card__meta">
							<span class="initiative-card__category">
								<?php echo esc_html( $initiative['category'] ); ?>
							</span>

							<span class="initiative-card__location">
								<?php echo esc_html( $initiative['location'] ); ?>
							</span>
						</div>

						<h3 class="initiative-card__title">
							<a href="<?php echo esc_url( $initiative['link'] ); ?>">
								<?php echo esc_html( $initiative['title'] ); ?>
							</a>
						</h3>

						<p class="initiative-card__description">
							<?php echo esc_html( $initiative['description'] ); ?>
						</p>

						<a
							class="initiative-card__link"
							href="<?php echo esc_url( $initiative['link'] ); ?>"
						>
							<span><?php esc_html_e( 'Discover the Initiative', 'greshma' ); ?></span>
							<span aria-hidden="true">→</span>
						</a>

					</div>

				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>