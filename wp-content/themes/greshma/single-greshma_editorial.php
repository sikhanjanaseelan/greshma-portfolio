<?php
/**
 * Single Editorial template.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();

	$post_id = get_the_ID();

	$summary = get_post_meta(
		$post_id,
		'_greshma_editorial_summary',
		true
	);

	if ( empty( $summary ) ) {
		$summary = wp_trim_words( get_the_excerpt(), 30, '…' );
	}

	$manual_reading_time = (int) get_post_meta(
		$post_id,
		'_greshma_editorial_reading_time_override',
		true
	);

	$automatic_reading_time = (int) get_post_meta(
		$post_id,
		'_greshma_editorial_reading_time',
		true
	);

	$reading_time = $manual_reading_time > 0
		? $manual_reading_time
		: $automatic_reading_time;

	$editorial_types = get_the_terms(
		$post_id,
		'greshma_editorial_type'
	);

	$editorial_topics = get_the_terms(
		$post_id,
		'greshma_editorial_topic'
	);

	$editorial_archive_url = get_post_type_archive_link(
		'greshma_editorial'
	);

	$share_url   = get_permalink();
	$share_title = get_the_title();

	$primary_type = '';

	if (
		! empty( $editorial_types ) &&
		! is_wp_error( $editorial_types )
	) {
		$primary_type = $editorial_types[0]->name;
	}
	?>

	<main id="primary" class="site-main editorial-single">

		<article
			id="post-<?php the_ID(); ?>"
			<?php post_class( 'editorial-single__article' ); ?>
		>

			<!-- Editorial Hero -->
			<section class="editorial-single__hero">

				<div class="editorial-single__hero-decoration editorial-single__hero-decoration--left" aria-hidden="true"></div>

				<div class="container">

					<div class="editorial-single__hero-grid">

						<div class="editorial-single__hero-content">

							<?php if ( $primary_type ) : ?>

								<p class="editorial-single__eyebrow">
									<?php echo esc_html( $primary_type ); ?>
									<span aria-hidden="true">⌁</span>
								</p>

							<?php endif; ?>

							<h1 class="editorial-single__title">
								<?php the_title(); ?>
							</h1>

							<?php if ( $summary ) : ?>

								<p class="editorial-single__summary">
									<?php echo esc_html( $summary ); ?>
								</p>

							<?php endif; ?>

							<div class="editorial-single__meta">

								<span class="editorial-single__meta-item">

									<span class="editorial-single__meta-icon" aria-hidden="true">
										▣
									</span>

									<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
										<?php echo esc_html( get_the_date() ); ?>
									</time>

								</span>

								<?php if ( $reading_time > 0 ) : ?>

									<span class="editorial-single__meta-separator" aria-hidden="true"></span>

									<span class="editorial-single__meta-item">

										<span class="editorial-single__meta-icon" aria-hidden="true">
											◷
										</span>

										<?php
										printf(
											/* translators: %d: Reading time in minutes. */
											esc_html(
												_n(
													'%d min read',
													'%d min read',
													$reading_time,
													'greshma'
												)
											),
											$reading_time
										);
										?>

									</span>

								<?php endif; ?>

								<?php if ( $primary_type ) : ?>

									<span class="editorial-single__meta-separator" aria-hidden="true"></span>

									<span class="editorial-single__meta-item">

										<span class="editorial-single__meta-icon" aria-hidden="true">
											⌁
										</span>

										<?php echo esc_html( $primary_type ); ?>

									</span>

								<?php endif; ?>

							</div>

						</div>

						<div class="editorial-single__hero-media">

							<?php if ( has_post_thumbnail() ) : ?>

								<figure class="editorial-single__hero-figure">

									<?php
									the_post_thumbnail(
										'full',
										array(
											'class'    => 'editorial-single__hero-image',
											'loading'  => 'eager',
											'decoding' => 'async',
											'alt'      => the_title_attribute(
												array(
													'echo' => false,
												)
											),
										)
									);
									?>

									<?php
									$featured_caption = get_the_post_thumbnail_caption();

									if ( $featured_caption ) :
										?>

										<figcaption class="editorial-single__hero-caption">
											<?php echo wp_kses_post( $featured_caption ); ?>
										</figcaption>

									<?php endif; ?>

								</figure>

							<?php else : ?>

								<div class="editorial-single__hero-placeholder" aria-hidden="true">
									<span>⌁</span>
								</div>

							<?php endif; ?>

							<div class="editorial-single__hero-leaf" aria-hidden="true"></div>

						</div>

					</div>

				</div>

			</section>


			<!-- Editorial Information Strip -->
			<section class="editorial-single__overview">

				<div class="container">

					<div class="editorial-single__overview-card">

						<div class="editorial-single__overview-item">

							<div class="editorial-single__overview-icon" aria-hidden="true">
								▣
							</div>

							<div>
								<span class="editorial-single__overview-label">
									<?php esc_html_e( 'Published', 'greshma' ); ?>
								</span>

								<strong class="editorial-single__overview-value">
									<?php echo esc_html( get_the_date() ); ?>
								</strong>
							</div>

						</div>

						<?php if ( $reading_time > 0 ) : ?>

							<div class="editorial-single__overview-item">

								<div class="editorial-single__overview-icon" aria-hidden="true">
									◷
								</div>

								<div>
									<span class="editorial-single__overview-label">
										<?php esc_html_e( 'Reading Time', 'greshma' ); ?>
									</span>

									<strong class="editorial-single__overview-value">
										<?php
										printf(
											/* translators: %d: Reading time in minutes. */
											esc_html(
												_n(
													'%d minute',
													'%d minutes',
													$reading_time,
													'greshma'
												)
											),
											$reading_time
										);
										?>
									</strong>
								</div>

							</div>

						<?php endif; ?>

						<?php
						if (
							! empty( $editorial_topics ) &&
							! is_wp_error( $editorial_topics )
						) :
							?>

							<div class="editorial-single__overview-item editorial-single__overview-item--topics">

								<div class="editorial-single__overview-icon" aria-hidden="true">
									⌁
								</div>

								<div>
									<span class="editorial-single__overview-label">
										<?php esc_html_e( 'Topics', 'greshma' ); ?>
									</span>

									<strong class="editorial-single__overview-value">
										<?php
										echo esc_html(
											implode(
												', ',
												wp_list_pluck(
													$editorial_topics,
													'name'
												)
											)
										);
										?>
									</strong>
								</div>

							</div>

						<?php endif; ?>

					</div>

				</div>

			</section>


			<!-- Article Content -->
			<section class="editorial-single__main">

				<div class="container">

					<div class="editorial-single__content">

						<?php
						the_content();

						wp_link_pages(
							array(
								'before' =>
									'<nav class="editorial-single__page-links">' .
									esc_html__( 'Pages:', 'greshma' ),
								'after'  => '</nav>',
							)
						);
						?>

					</div>


					<!-- Topics and Sharing -->
					<div class="editorial-single__end-matter">

						<?php
						if (
							! empty( $editorial_topics ) &&
							! is_wp_error( $editorial_topics )
						) :
							?>

							<div class="editorial-single__topics">

								<p class="editorial-single__section-label">
									<?php esc_html_e( 'Explore these topics', 'greshma' ); ?>
								</p>

								<div class="editorial-single__topics-list">

									<?php foreach ( $editorial_topics as $topic ) : ?>

										<a
											class="editorial-single__topic"
											href="<?php echo esc_url(
												add_query_arg(
													'editorial_topic',
													$topic->slug,
													$editorial_archive_url
												)
											); ?>"
										>
											<?php echo esc_html( $topic->name ); ?>
										</a>

									<?php endforeach; ?>

								</div>

							</div>

						<?php endif; ?>

						<div class="editorial-single__share">

							<p class="editorial-single__section-label">
								<?php esc_html_e( 'Share this editorial', 'greshma' ); ?>
							</p>

							<div class="editorial-single__share-links">

								<a
									href="<?php echo esc_url(
										'https://www.linkedin.com/sharing/share-offsite/?url=' .
										rawurlencode( $share_url )
									); ?>"
									target="_blank"
									rel="noopener noreferrer"
									aria-label="<?php esc_attr_e( 'Share on LinkedIn', 'greshma' ); ?>"
								>
									in
								</a>

								<a
									href="<?php echo esc_url(
										'https://www.facebook.com/sharer/sharer.php?u=' .
										rawurlencode( $share_url )
									); ?>"
									target="_blank"
									rel="noopener noreferrer"
									aria-label="<?php esc_attr_e( 'Share on Facebook', 'greshma' ); ?>"
								>
									f
								</a>

								<a
									href="<?php echo esc_url(
										'mailto:?subject=' .
										rawurlencode( $share_title ) .
										'&body=' .
										rawurlencode( $share_url )
									); ?>"
									aria-label="<?php esc_attr_e( 'Share by email', 'greshma' ); ?>"
								>
									✉
								</a>

								<a
									href="<?php echo esc_url( $share_url ); ?>"
									aria-label="<?php esc_attr_e( 'Open editorial link', 'greshma' ); ?>"
								>
									↗
								</a>

							</div>

						</div>

					</div>

				</div>

				<div class="editorial-single__content-leaf" aria-hidden="true"></div>

			</section>

		</article>


		<?php
		/*
		 * Related Editorials.
		 */
		$related_args = array(
			'post_type'           => 'greshma_editorial',
			'post_status'         => 'publish',
			'posts_per_page'      => 3,
			'post__not_in'        => array( $post_id ),
			'ignore_sticky_posts' => true,
			'orderby'             => 'date',
			'order'               => 'DESC',
		);

		if (
			! empty( $editorial_topics ) &&
			! is_wp_error( $editorial_topics )
		) {
			$related_args['tax_query'] = array(
				array(
					'taxonomy' => 'greshma_editorial_topic',
					'field'    => 'term_id',
					'terms'    => wp_list_pluck(
						$editorial_topics,
						'term_id'
					),
				),
			);
		}

		$related_query = new WP_Query( $related_args );

		if ( $related_query->have_posts() ) :
			?>

			<section class="editorial-related">

				<div class="container">

					<div class="editorial-related__heading">

						<div>

							<p class="editorial-related__eyebrow">
								<?php esc_html_e( 'Continue exploring', 'greshma' ); ?>
							</p>

							<h2 class="editorial-related__title">
								<?php esc_html_e( 'Related Editorials', 'greshma' ); ?>
							</h2>

						</div>

						<a
							class="editorial-related__archive-link"
							href="<?php echo esc_url( $editorial_archive_url ); ?>"
						>
							<?php esc_html_e( 'View all editorials', 'greshma' ); ?>
							<span aria-hidden="true">→</span>
						</a>

					</div>

					<div class="editorial-related__grid">

						<?php
						while ( $related_query->have_posts() ) :
							$related_query->the_post();

							$related_id = get_the_ID();

							$related_types = get_the_terms(
								$related_id,
								'greshma_editorial_type'
							);

							$related_manual_time = (int) get_post_meta(
								$related_id,
								'_greshma_editorial_reading_time_override',
								true
							);

							$related_auto_time = (int) get_post_meta(
								$related_id,
								'_greshma_editorial_reading_time',
								true
							);

							$related_reading_time = $related_manual_time > 0
								? $related_manual_time
								: $related_auto_time;
							?>

							<article
								id="post-<?php the_ID(); ?>"
								<?php post_class( 'editorial-card editorial-related__card' ); ?>
							>

								<?php if ( has_post_thumbnail() ) : ?>

									<a
										class="editorial-card__image-link"
										href="<?php the_permalink(); ?>"
										aria-label="<?php echo esc_attr( get_the_title() ); ?>"
									>

										<div class="editorial-card__image">

											<?php
											the_post_thumbnail(
												'large',
												array(
													'loading'  => 'lazy',
													'decoding' => 'async',
												)
											);
											?>

										</div>

									</a>

								<?php endif; ?>

								<div class="editorial-card__content">

									<?php
									if (
										! empty( $related_types ) &&
										! is_wp_error( $related_types )
									) :
										?>

										<p class="editorial-card__type">
											<?php echo esc_html( $related_types[0]->name ); ?>
										</p>

									<?php endif; ?>

									<h3 class="editorial-card__title">

										<a href="<?php the_permalink(); ?>">
											<?php the_title(); ?>
										</a>

									</h3>

									<div class="editorial-card__meta">

										<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
											<?php echo esc_html( get_the_date() ); ?>
										</time>

										<?php if ( $related_reading_time > 0 ) : ?>

											<span aria-hidden="true">•</span>

											<span>
												<?php
												printf(
													/* translators: %d: Reading time in minutes. */
													esc_html(
														_n(
															'%d min read',
															'%d min read',
															$related_reading_time,
															'greshma'
														)
													),
													$related_reading_time
												);
												?>
											</span>

										<?php endif; ?>

									</div>

									<a
										class="editorial-card__link"
										href="<?php the_permalink(); ?>"
										aria-label="<?php echo esc_attr( get_the_title() ); ?>"
									>
										<span aria-hidden="true">→</span>
									</a>

								</div>

							</article>

						<?php endwhile; ?>

					</div>

				</div>

			</section>

			<?php
		endif;

		wp_reset_postdata();
		?>


		<!-- Newsletter CTA -->
		<section class="editorial-newsletter">

			<div class="container">

				<div class="editorial-newsletter__inner">

					<div class="editorial-newsletter__icon" aria-hidden="true">
						✉
					</div>

					<div class="editorial-newsletter__content">

						<p class="editorial-newsletter__eyebrow">
							<?php esc_html_e( 'Stay connected', 'greshma' ); ?>
						</p>

						<h2>
							<?php esc_html_e( 'Never miss a reflection.', 'greshma' ); ?>
						</h2>

						<p>
							<?php
							esc_html_e(
								'Receive new editorials, stories and insights directly in your inbox.',
								'greshma'
							);
							?>
						</p>

					</div>

					<a
						href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"
						class="btn btn--primary editorial-newsletter__button"
					>
						<?php esc_html_e( 'Subscribe Now', 'greshma' ); ?>
						<span aria-hidden="true">→</span>
					</a>

					<div class="editorial-newsletter__leaf" aria-hidden="true"></div>

				</div>

			</div>

		</section>

	</main>

	<?php
endwhile;

get_footer();