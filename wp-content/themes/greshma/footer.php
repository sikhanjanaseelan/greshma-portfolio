<?php
/**
 * Theme footer.
 *
 * @package Greshma
 */
?>

<footer class="site-footer">

	<div class="site-container">

		<div class="site-footer__main">

			<div class="site-footer__brand">

				<a
					class="site-footer__logo"
					href="<?php echo esc_url( home_url( '/' ) ); ?>"
				>
					<span class="site-footer__logo-mark">
						GPR
					</span>

					<span class="site-footer__logo-name">
						Greshma<br>
						Pious Raju
					</span>
				</a>

				<p class="site-footer__description">
					<?php
					esc_html_e(
						'Creating spaces of peace, nurturing communities, and caring for our planet through education, dialogue and collective action.',
						'greshma'
					);
					?>
				</p>

				<div class="site-footer__socials">

					<a href="#" aria-label="Instagram">
						<span aria-hidden="true">◎</span>
					</a>

					<a href="#" aria-label="YouTube">
						<span aria-hidden="true">▶</span>
					</a>

					<a href="#" aria-label="LinkedIn">
						<span aria-hidden="true">in</span>
					</a>

					<a href="mailto:hello@greshma.me" aria-label="Email">
						<span aria-hidden="true">✉</span>
					</a>

				</div>

			</div>

			<div class="site-footer__column">

				<h2 class="site-footer__heading">
					<?php esc_html_e( 'Quick Links', 'greshma' ); ?>
				</h2>

				<ul class="site-footer__links">
					<li>
						<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">
							<?php esc_html_e( 'About', 'greshma' ); ?>
						</a>
					</li>

					<li>
						<a href="<?php echo esc_url( home_url( '/my-paths/' ) ); ?>">
							<?php esc_html_e( 'My Paths', 'greshma' ); ?>
						</a>
					</li>

					<li>
						<a href="<?php echo esc_url( home_url( '/experiences/' ) ); ?>">
							<?php esc_html_e( 'Experiences', 'greshma' ); ?>
						</a>
					</li>

					<li>
						<a href="<?php echo esc_url( home_url( '/impact/' ) ); ?>">
							<?php esc_html_e( 'Impact', 'greshma' ); ?>
						</a>
					</li>

					<li>
						<a href="<?php echo esc_url( home_url( '/speaking/' ) ); ?>">
							<?php esc_html_e( 'Speaking', 'greshma' ); ?>
						</a>
					</li>

					<li>
						<a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>">
							<?php esc_html_e( 'Gallery', 'greshma' ); ?>
						</a>
					</li>

					<li>
						<a href="<?php echo esc_url( home_url( '/journal/' ) ); ?>">
							<?php esc_html_e( 'Journal', 'greshma' ); ?>
						</a>
					</li>
				</ul>

			</div>

			<div class="site-footer__column">

				<h2 class="site-footer__heading">
					<?php esc_html_e( 'Explore', 'greshma' ); ?>
				</h2>

				<ul class="site-footer__links">
					<li><a href="#">Initiatives</a></li>
					<li><a href="#">Resources</a></li>
					<li><a href="#">Press</a></li>
					<li><a href="#">Media</a></li>
					<li><a href="#">Books</a></li>
					<li><a href="#">Events</a></li>
				</ul>

			</div>

			<div class="site-footer__column site-footer__contact">

				<h2 class="site-footer__heading">
					<?php esc_html_e( 'Get In Touch', 'greshma' ); ?>
				</h2>

				<ul class="site-footer__contact-list">

					<li>
						<span aria-hidden="true">✉</span>
						<a href="mailto:hello@greshma.me">
							hello@greshma.me
						</a>
					</li>

					<li>
						<span aria-hidden="true">⌕</span>
						<a href="tel:+919876543210">
							+91 98765 43210
						</a>
					</li>

					<li>
						<span aria-hidden="true">⌖</span>
						<span>
							Bangalore, Karnataka, India
						</span>
					</li>

				</ul>

			</div>

			<div class="site-footer__newsletter">

				<h2 class="site-footer__heading">
					<?php esc_html_e( 'Stay Connected', 'greshma' ); ?>
				</h2>

				<p>
					<?php
					esc_html_e(
						'Subscribe to my ripple updates on my work, stories and upcoming events.',
						'greshma'
					);
					?>
				</p>

				<form
					class="site-footer__form"
					action="#"
					method="post"
				>

					<label class="screen-reader-text" for="footer-email">
						<?php esc_html_e( 'Email address', 'greshma' ); ?>
					</label>

					<input
						id="footer-email"
						type="email"
						name="footer_email"
						placeholder="<?php esc_attr_e(
							'Your email address',
							'greshma'
						); ?>"
						required
					>

					<button
						type="submit"
						aria-label="<?php esc_attr_e(
							'Subscribe',
							'greshma'
						); ?>"
					>
						→
					</button>

				</form>

			</div>

		</div>

		<div class="site-footer__bottom">

			<p>
				&copy;
				<?php echo esc_html( wp_date( 'Y' ) ); ?>
				Greshma Pious Raju.
				<?php esc_html_e( 'All Rights Reserved.', 'greshma' ); ?>
			</p>

			<div class="site-footer__legal">
				<a href="<?php echo esc_url(
					home_url( '/privacy-policy/' )
				); ?>">
					<?php esc_html_e( 'Privacy Policy', 'greshma' ); ?>
				</a>

				<span aria-hidden="true">|</span>

				<a href="<?php echo esc_url(
					home_url( '/terms-and-conditions/' )
				); ?>">
					<?php esc_html_e( 'Terms & Conditions', 'greshma' ); ?>
				</a>
			</div>

		</div>

	</div>

</footer>

<?php wp_footer(); ?>

</body>
</html>