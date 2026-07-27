<?php
/**
 * Single Project template.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();

	$project_id = get_the_ID();

	$subtitle = get_post_meta(
		$project_id,
		'_greshma_project_subtitle',
		true
	);

	$year = get_post_meta(
		$project_id,
		'_greshma_project_year',
		true
	);

	$location = get_post_meta(
		$project_id,
		'_greshma_project_location',
		true
	);

	$role = get_post_meta(
		$project_id,
		'_greshma_project_role',
		true
	);

	$organization = get_post_meta(
		$project_id,
		'_greshma_project_organization',
		true
	);

	$project_url = get_post_meta(
		$project_id,
		'_greshma_project_url',
		true
	);

	$categories = get_the_terms(
		$project_id,
		'greshma_project_category'
	);
	?>

	<main class="single-project">

		<section class="single-project__hero">

			<div class="container">

				<div class="single-project__hero-grid">

					<div class="single-project__hero-content">

						<?php if ( $categories && ! is_wp_error( $categories ) ) : ?>

							<div class="single-project__categories">

								<?php foreach ( $categories as $category ) : ?>

									<span class="single-project__category">
										<?php echo esc_html( $category->name ); ?>
									</span>

								<?php endforeach; ?>

							</div>

						<?php endif; ?>

						<h1 class="single-project__title">
							<?php the_title(); ?>
						</h1>

						<?php if ( $subtitle ) : ?>

							<p class="single-project__subtitle">
								<?php echo esc_html( $subtitle ); ?>
							</p>

						<?php endif; ?>


						<?php if ( $year || $location || $role || $organization ) : ?>

							<div class="single-project__meta">

								<?php if ( $year ) : ?>

									<div class="single-project__meta-item">
										<span>Year</span>
										<strong>
											<?php echo esc_html( $year ); ?>
										</strong>
									</div>

								<?php endif; ?>


								<?php if ( $location ) : ?>

									<div class="single-project__meta-item">
										<span>Location</span>
										<strong>
											<?php echo esc_html( $location ); ?>
										</strong>
									</div>

								<?php endif; ?>


								<?php if ( $role ) : ?>

									<div class="single-project__meta-item">
										<span>Role</span>
										<strong>
											<?php echo esc_html( $role ); ?>
										</strong>
									</div>

								<?php endif; ?>


								<?php if ( $organization ) : ?>

									<div class="single-project__meta-item">
										<span>Organization / Partner</span>
										<strong>
											<?php echo esc_html( $organization ); ?>
										</strong>
									</div>

								<?php endif; ?>

							</div>

						<?php endif; ?>

					</div>


					<div class="single-project__hero-image">

						<?php if ( has_post_thumbnail() ) : ?>

							<?php
							the_post_thumbnail(
								'large',
								array(
									'loading' => 'eager',
									'alt'     => the_title_attribute(
										array(
											'echo' => false,
										)
									),
								)
							);
							?>

						<?php endif; ?>

					</div>

				</div>

			</div>

		</section>


		<section class="single-project__content">

			<div class="container">

				<div class="single-project__content-layout">

					<article class="single-project__body">

						<?php the_content(); ?>

					</article>


					<aside class="single-project__sidebar">

						<h2>
							Project Details
						</h2>


						<?php if ( $year ) : ?>

							<div class="single-project__sidebar-item">
								<span>Year</span>
								<strong>
									<?php echo esc_html( $year ); ?>
								</strong>
							</div>

						<?php endif; ?>


						<?php if ( $location ) : ?>

							<div class="single-project__sidebar-item">
								<span>Location</span>
								<strong>
									<?php echo esc_html( $location ); ?>
								</strong>
							</div>

						<?php endif; ?>


						<?php if ( $role ) : ?>

							<div class="single-project__sidebar-item">
								<span>Role</span>
								<strong>
									<?php echo esc_html( $role ); ?>
								</strong>
							</div>

						<?php endif; ?>


						<?php if ( $organization ) : ?>

							<div class="single-project__sidebar-item">
								<span>Organization</span>
								<strong>
									<?php echo esc_html( $organization ); ?>
								</strong>
							</div>

						<?php endif; ?>


						<?php if ( $project_url ) : ?>

							<a
								href="<?php echo esc_url( $project_url ); ?>"
								class="single-project__external-link"
								target="_blank"
								rel="noopener noreferrer"
							>
								Visit Project
								<span aria-hidden="true">↗</span>
							</a>

						<?php endif; ?>

					</aside>

				</div>

			</div>

		</section>


		<section class="single-project__back">

			<div class="container">

				<a
					href="<?php echo esc_url( home_url( '/projects/' ) ); ?>"
					class="single-project__back-link"
				>
					← Back to Projects
				</a>

			</div>

		</section>

	</main>

	<?php
endwhile;

get_footer();