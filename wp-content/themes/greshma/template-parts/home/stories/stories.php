<?php
/**
 * Homepage Stories From The Field section.
 *
 * @package Greshma
 */

$stories = array(
	array(
		'title'    => 'Empowering Young Minds for a Better Tomorrow',
		'category' => 'Education',
		'image'    => '',
		'link'     => home_url( '/impact/' ),
	),
	array(
		'title'    => 'Climate Justice Starts with Community',
		'category' => 'Climate Action',
		'image'    => '',
		'link'     => home_url( '/impact/' ),
	),
	array(
		'title'    => 'Bridging Faiths, Building Peace',
		'category' => 'Interfaith',
		'image'    => '',
		'link'     => home_url( '/impact/' ),
	),
	array(
		'title'    => 'Conversations That Heal and Unite',
		'category' => 'Dialogue',
		'image'    => '',
		'link'     => home_url( '/impact/' ),
	),
	array(
		'title'    => 'Young Leaders, Global Impact',
		'category' => 'Youth Leadership',
		'image'    => '',
		'link'     => home_url( '/impact/' ),
	),
);
?>

<section class="field-stories" aria-labelledby="field-stories-title">

	<div class="site-container">

		<div class="field-stories__heading">

			<span class="field-stories__line" aria-hidden="true"></span>

			<h2 id="field-stories-title" class="field-stories__title">
				<?php esc_html_e( 'Stories From The Field', 'greshma' ); ?>
			</h2>

			<span class="field-stories__leaf" aria-hidden="true">
				⌁
			</span>

			<span class="field-stories__line" aria-hidden="true"></span>

		</div>

		<div class="field-stories__slider">

			<button
				class="field-stories__arrow field-stories__arrow--previous"
				type="button"
				aria-label="<?php esc_attr_e( 'Previous stories', 'greshma' ); ?>"
			>
				←
			</button>

			<div class="field-stories__track">

				<?php foreach ( $stories as $index => $story ) : ?>

					<article class="field-story-card">

						<a
							class="field-story-card__media"
							href="<?php echo esc_url( $story['link'] ); ?>"
							aria-label="<?php echo esc_attr( $story['title'] ); ?>"
						>

							<?php if ( ! empty( $story['image'] ) ) : ?>

								<img
									class="field-story-card__image"
									src="<?php echo esc_url( $story['image'] ); ?>"
									alt="<?php echo esc_attr( $story['title'] ); ?>"
									loading="lazy"
								>

							<?php else : ?>

								<div
									class="field-story-card__placeholder field-story-card__placeholder--<?php echo esc_attr( $index + 1 ); ?>"
									aria-hidden="true"
								>
									<span>
										<?php
										printf(
											esc_html__( 'Story Image %d', 'greshma' ),
											esc_html( $index + 1 )
										);
										?>
									</span>
								</div>

							<?php endif; ?>

							<span class="field-story-card__category">
								<?php echo esc_html( $story['category'] ); ?>
							</span>

						</a>

						<div class="field-story-card__content">

							<h3 class="field-story-card__title">
								<a href="<?php echo esc_url( $story['link'] ); ?>">
									<?php echo esc_html( $story['title'] ); ?>
								</a>
							</h3>

						</div>

					</article>

				<?php endforeach; ?>

			</div>

			<button
				class="field-stories__arrow field-stories__arrow--next"
				type="button"
				aria-label="<?php esc_attr_e( 'Next stories', 'greshma' ); ?>"
			>
				→
			</button>

		</div>

	</div>

</section>