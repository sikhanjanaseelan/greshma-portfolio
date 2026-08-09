<?php
/**
 * Homepage — From The Journal.
 *
 * Dynamic source:
 * Editorial content marked "Show on Homepage".
 *
 * Field Stories are excluded because they have
 * their own homepage section.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;


/* ==========================================================
   JOURNAL QUERY
========================================================== */

$journal_query = new WP_Query(
	array(
		'post_type'           => 'greshma_editorial',
		'post_status'         => 'publish',
		'posts_per_page'      => 4,
		'ignore_sticky_posts' => true,

		'meta_query' => array(
			array(
				'key'     => '_greshma_editorial_show_on_homepage',
				'value'   => '1',
				'compare' => '=',
			),
		),

		'tax_query' => array(
			array(
				'taxonomy' => 'greshma_editorial_type',
				'field'    => 'slug',
				'terms'    => array(
					'field-story',
				),
				'operator' => 'NOT IN',
			),
		),

		'orderby' => 'date',
		'order'   => 'DESC',
	)
);


/*
 * Do not show an empty Journal section.
 */
if ( ! $journal_query->have_posts() ) {
	return;
}


/* ==========================================================
   BUILD ARTICLE ARRAY
========================================================== */

$journal_articles = array();

while ( $journal_query->have_posts() ) {

	$journal_query->the_post();

	$article_id = get_the_ID();


	/* ------------------------------------------------------
	   EDITORIAL TYPE
	------------------------------------------------------ */

	$types = get_the_terms(
		$article_id,
		'greshma_editorial_type'
	);

	$type_label = __(
		'Editorial',
		'greshma'
	);

	if (
		$types &&
		! is_wp_error( $types )
	) {

		$primary_type = reset(
			$types
		);

		if ( $primary_type ) {

			$type_label =
				$primary_type->name;
		}
	}


	/* ------------------------------------------------------
	   EXCERPT
	------------------------------------------------------ */

	$excerpt = get_the_excerpt();

	if ( ! $excerpt ) {

		$excerpt = wp_trim_words(
			wp_strip_all_tags(
				get_the_content()
			),
			22,
			'…'
		);
	}


	/* ------------------------------------------------------
	   STORE ARTICLE
	------------------------------------------------------ */

	$journal_articles[] = array(
		'id'      => $article_id,
		'title'   => get_the_title(),
		'url'     => get_permalink(),
		'date'    => get_the_date(
			'F j, Y'
		),
		'type'    => $type_label,
		'excerpt' => $excerpt,
	);
}

wp_reset_postdata();


/* ==========================================================
   FEATURED + SECONDARY
========================================================== */

$featured_article =
	array_shift(
		$journal_articles
	);
?>

<section
	class="home-journal"
	aria-labelledby="home-journal-title"
>

	<div class="site-container">


		<!-- ==================================================
		     HEADING
		================================================== -->

		<div class="journal-heading">

			<div>

				<span class="section-eyebrow">
					<?php esc_html_e(
						'From The Journal',
						'greshma'
					); ?>
				</span>

			</div>


			<a
				href="<?php echo esc_url(
					home_url( '/journal/' )
				); ?>"
				class="journal-all"
			>
				<?php esc_html_e(
					'View All Articles',
					'greshma'
				); ?>

				<span aria-hidden="true">
					→
				</span>
			</a>

		</div>


		<!-- ==================================================
		     EDITORIAL LAYOUT
		================================================== -->

		<div class="journal-editorial-layout">


			<!-- ==================================================
			     FEATURED ARTICLE
			================================================== -->

			<?php if ( $featured_article ) : ?>

				<article class="journal-featured">


					<a
						href="<?php echo esc_url(
							$featured_article['url']
						); ?>"
						class="journal-featured__image"
						aria-label="<?php echo esc_attr(
							$featured_article['title']
						); ?>"
					>

						<?php if (
							has_post_thumbnail(
								$featured_article['id']
							)
						) : ?>

							<?php
							echo get_the_post_thumbnail(
								$featured_article['id'],
								'large',
								array(
									'class' =>
										'journal-featured__image-file',

									'loading' =>
										'lazy',

									'decoding' =>
										'async',
								)
							);
							?>

						<?php else : ?>

							<div class="journal-featured__placeholder">

								<span>
									<?php echo esc_html(
										$featured_article['type']
									); ?>
								</span>

							</div>

						<?php endif; ?>

					</a>


					<div class="journal-featured__content">


						<div class="journal-featured__meta">

							<span class="journal-featured__type">

								<?php echo esc_html(
									$featured_article['type']
								); ?>

							</span>


							<span
								class="journal-featured__dot"
								aria-hidden="true"
							></span>


							<time>
								<?php echo esc_html(
									$featured_article['date']
								); ?>
							</time>

						</div>


						<h2 id="home-journal-title">

							<a
								href="<?php echo esc_url(
									$featured_article['url']
								); ?>"
							>
								<?php echo esc_html(
									$featured_article['title']
								); ?>
							</a>

						</h2>


						<?php if (
							$featured_article['excerpt']
						) : ?>

							<p>
								<?php echo esc_html(
									wp_trim_words(
										$featured_article['excerpt'],
										25,
										'…'
									)
								); ?>
							</p>

						<?php endif; ?>


						<a
							href="<?php echo esc_url(
								$featured_article['url']
							); ?>"
							class="journal-featured__read"
						>
							<?php esc_html_e(
								'Read Article',
								'greshma'
							); ?>

							<span aria-hidden="true">
								→
							</span>
						</a>

					</div>

				</article>

			<?php endif; ?>


			<!-- ==================================================
			     SECONDARY ARTICLES
			================================================== -->

			<?php if ( $journal_articles ) : ?>

				<div class="journal-list">

					<?php
					foreach (
						$journal_articles as $article
					) :
						?>

						<article class="journal-list-card">


							<a
								href="<?php echo esc_url(
									$article['url']
								); ?>"
								class="journal-list-card__image"
								aria-label="<?php echo esc_attr(
									$article['title']
								); ?>"
							>

								<?php if (
									has_post_thumbnail(
										$article['id']
									)
								) : ?>

									<?php
									echo get_the_post_thumbnail(
										$article['id'],
										'medium',
										array(
											'class' =>
												'journal-list-card__image-file',

											'loading' =>
												'lazy',

											'decoding' =>
												'async',
										)
									);
									?>

								<?php else : ?>

									<div class="journal-list-card__placeholder">

										<span>
											<?php echo esc_html(
												$article['type']
											); ?>
										</span>

									</div>

								<?php endif; ?>

							</a>


							<div class="journal-list-card__content">


								<div class="journal-list-card__meta">

									<span>
										<?php echo esc_html(
											$article['type']
										); ?>
									</span>

									<time>
										<?php echo esc_html(
											$article['date']
										); ?>
									</time>

								</div>


								<h3>

									<a
										href="<?php echo esc_url(
											$article['url']
										); ?>"
									>
										<?php echo esc_html(
											$article['title']
										); ?>
									</a>

								</h3>


								<a
									href="<?php echo esc_url(
										$article['url']
									); ?>"
									class="journal-list-card__read"
								>
									<?php esc_html_e(
										'Read',
										'greshma'
									); ?>

									<span aria-hidden="true">
										→
									</span>
								</a>

							</div>


						</article>

					<?php endforeach; ?>

				</div>

			<?php endif; ?>


		</div>

	</div>

</section>