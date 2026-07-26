<?php
/**
 * Homepage CTA section.
 *
 * @package Greshma
 */
?>

<section class="home-cta" aria-labelledby="home-cta-title">

	<div class="home-cta__landscape">

		<div class="site-container home-cta__container">

			<div class="home-cta__panel">

				<img
					class="home-cta__leaf home-cta__leaf--left"
					src="<?php echo esc_url(
						get_template_directory_uri()
						. '/assets/images/home/leaf-left.png'
					); ?>"
					alt=""
					aria-hidden="true"
				>

				<img
					class="home-cta__leaf home-cta__leaf--right"
					src="<?php echo esc_url(
						get_template_directory_uri()
						. '/assets/images/home/leaf-right.png'
					); ?>"
					alt=""
					aria-hidden="true"
				>

				<div class="home-cta__content">

					<h2
						id="home-cta-title"
						class="home-cta__title"
					>
						<?php
						esc_html_e(
							'“Let’s build a world where people and the planet thrive together.”',
							'greshma'
						);
						?>
					</h2>

					<p class="home-cta__subtitle">
						<?php
						esc_html_e(
							'Together, we create ripples of change that last.',
							'greshma'
						);
						?>
					</p>

					<a
						class="home-cta__button"
						href="<?php echo esc_url(
							home_url( '/connect/' )
						); ?>"
					>
						<span>
							<?php
							esc_html_e(
								'Let’s Connect',
								'greshma'
							);
							?>
						</span>

						<span
							class="home-cta__button-icon"
							aria-hidden="true"
						>
							⌁
						</span>
					</a>

				</div>

			</div>

		</div>

	</div>

</section>