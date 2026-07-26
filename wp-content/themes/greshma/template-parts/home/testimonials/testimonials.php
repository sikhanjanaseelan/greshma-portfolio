<?php
/**
 * Homepage Voices of Impact section.
 *
 * @package Greshma
 */

$testimonials = array(
	array(
		'quote' => 'Greshma brings warmth, clarity and purpose into every space she enters. Her ability to connect people and inspire meaningful action is truly remarkable.',
		'name'  => 'Community Partner',
		'role'  => 'Peacebuilding & Youth Engagement',
		'image' => '',
	),
	array(
		'quote' => 'Her leadership is deeply rooted in empathy and collaboration. She creates spaces where young people feel heard, valued and empowered to lead.',
		'name'  => 'Programme Collaborator',
		'role'  => 'Youth Leadership & Education',
		'image' => '',
	),
	array(
		'quote' => 'Working with Greshma has shown me how local initiatives can grow into global movements through care, courage and consistent action.',
		'name'  => 'Global Network Member',
		'role'  => 'Climate Action & Community',
		'image' => '',
	),
);
?>

<section class="home-testimonials" aria-labelledby="home-testimonials-title">

	<div class="site-container">

		<header class="home-testimonials__heading">

			<span class="home-testimonials__line" aria-hidden="true"></span>

			<h2
				id="home-testimonials-title"
				class="home-testimonials__title"
			>
				<?php esc_html_e( 'Voices of Impact', 'greshma' ); ?>
			</h2>

			<span class="home-testimonials__leaf" aria-hidden="true">
				⌁
			</span>

			<span class="home-testimonials__line" aria-hidden="true"></span>

		</header>

		<div class="home-testimonials__grid">

			<?php foreach ( $testimonials as $testimonial ) : ?>

				<article class="testimonial-card">

					<span class="testimonial-card__quote-mark" aria-hidden="true">
						“
					</span>

					<blockquote class="testimonial-card__quote">
						<p>
							<?php echo esc_html( $testimonial['quote'] ); ?>
						</p>
					</blockquote>

					<div class="testimonial-card__person">

						<div class="testimonial-card__avatar">

							<?php if ( ! empty( $testimonial['image'] ) ) : ?>

								<img
									src="<?php echo esc_url( $testimonial['image'] ); ?>"
									alt="<?php echo esc_attr( $testimonial['name'] ); ?>"
									loading="lazy"
								>

							<?php else : ?>

								<span aria-hidden="true">
									<?php
									echo esc_html(
										strtoupper(
											substr(
												$testimonial['name'],
												0,
												1
											)
										)
									);
									?>
								</span>

							<?php endif; ?>

						</div>

						<div class="testimonial-card__details">

							<h3 class="testimonial-card__name">
								<?php echo esc_html( $testimonial['name'] ); ?>
							</h3>

							<p class="testimonial-card__role">
								<?php echo esc_html( $testimonial['role'] ); ?>
							</p>

						</div>

					</div>

				</article>

			<?php endforeach; ?>

		</div>

		<div class="home-testimonials__navigation">

			<button
				class="home-testimonials__arrow"
				type="button"
				aria-label="<?php esc_attr_e( 'Previous testimonials', 'greshma' ); ?>"
			>
				←
			</button>

			<div class="home-testimonials__dots" aria-hidden="true">
				<span class="is-active"></span>
				<span></span>
				<span></span>
			</div>

			<button
				class="home-testimonials__arrow"
				type="button"
				aria-label="<?php esc_attr_e( 'Next testimonials', 'greshma' ); ?>"
			>
				→
			</button>

		</div>

	</div>

</section>