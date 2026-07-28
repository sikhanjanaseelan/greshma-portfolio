<?php
/**
 * Projects Page — Organizations I Serve.
 *
 * Dynamic data from Greshma Core Organizations CPT.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$organizations_query = new WP_Query(
	array(
		'post_type'      => 'greshma_organization',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'orderby'        => array(
			'menu_order' => 'ASC',
			'title'      => 'ASC',
		),
		'order'          => 'ASC',
	)
);
?>

<div class="projects-organizations">

	<div class="projects-subsection-label">
		2. Organizations I Serve
	</div>

	<div class="projects-organizations__list">

		<?php if ( $organizations_query->have_posts() ) : ?>

			<?php while ( $organizations_query->have_posts() ) : ?>

				<?php
				$organizations_query->the_post();

				$organization_id = get_the_ID();

				$role = get_post_meta(
					$organization_id,
					'_greshma_organization_role',
					true
				);

				$organization_url = get_post_meta(
					$organization_id,
					'_greshma_organization_url',
					true
				);

				$logo_id = absint(
					get_post_meta(
						$organization_id,
						'_greshma_organization_logo_id',
						true
					)
				);

				$description = get_the_content();

				$link = ! empty( $organization_url )
					? $organization_url
					: '#';
				?>

				<article class="projects-organization-card">

					<div class="projects-organization-card__content">

						<div class="projects-organization-card__header">

							<div class="projects-organization-card__logo">

								<?php if ( $logo_id ) : ?>

									<?php
									echo wp_get_attachment_image(
										$logo_id,
										'medium',
										false,
										array(
											'alt'     => get_the_title(),
											'loading' => 'lazy',
										)
									);
									?>

								<?php else : ?>

									<span>
										LOGO
									</span>

								<?php endif; ?>

							</div>

							<div class="projects-organization-card__heading">

								<h3>
									<?php the_title(); ?>
								</h3>

								<?php if ( $role ) : ?>

									<span>
										<?php echo esc_html( $role ); ?>
									</span>

								<?php endif; ?>

							</div>

						</div>

						<?php if ( $description ) : ?>

							<div class="projects-organization-card__description">
								<?php
								echo wp_kses_post(
									wpautop( $description )
								);
								?>
							</div>

						<?php endif; ?>

						<?php if ( $organization_url ) : ?>

							<a
								href="<?php echo esc_url( $link ); ?>"
								target="_blank"
								rel="noopener noreferrer"
							>
								View My Role
								<span aria-hidden="true">→</span>
							</a>

						<?php endif; ?>

					</div>

					<div class="projects-organization-card__image">

						<?php if ( has_post_thumbnail() ) : ?>

							<?php
							the_post_thumbnail(
								'large',
								array(
									'alt'     => the_title_attribute(
										array(
											'echo' => false,
										)
									),
									'loading' => 'lazy',
								)
							);
							?>

						<?php else : ?>

							<span>
								<?php esc_html_e(
									'Organization image',
									'greshma'
								); ?>
							</span>

						<?php endif; ?>

					</div>

				</article>

			<?php endwhile; ?>

			<?php wp_reset_postdata(); ?>

		<?php else : ?>

			<p class="projects-organizations__empty">
				<?php esc_html_e(
					'Organizations will be added soon.',
					'greshma'
				); ?>
			</p>

		<?php endif; ?>

	</div>

</div>