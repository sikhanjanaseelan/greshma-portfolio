<?php
/**
 * Journal Page — Sidebar.
 *
 * Dynamic sidebar data powered by Editorial.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;


/* ==========================================================
   EDITORIAL ARCHIVE URL
========================================================== */

$editorial_archive_url = get_post_type_archive_link(
	'greshma_editorial'
);


/* ==========================================================
   EDITORIAL TYPES
========================================================== */

$journal_types = get_terms(
	array(
		'taxonomy'   => 'greshma_editorial_type',
		'hide_empty' => true,
	)
);


/* ==========================================================
   EDITORIAL TOPICS
========================================================== */

$journal_topics = get_terms(
	array(
		'taxonomy'   => 'greshma_editorial_topic',
		'hide_empty' => true,
		'number'     => 10,
		'orderby'    => 'count',
		'order'      => 'DESC',
	)
);


/* ==========================================================
   POPULAR READS

   For now:
   Latest 3 published Editorials.

   Later, if we add a view-count system,
   this can become true "Popular Reads".
========================================================== */

$popular_query = new WP_Query(
	array(
		'post_type'           => 'greshma_editorial',
		'post_status'         => 'publish',
		'posts_per_page'      => 3,
		'ignore_sticky_posts' => true,
		'orderby'             => 'date',
		'order'               => 'DESC',
	)
);


/* ==========================================================
   ARCHIVES

   Query Editorial posts only and group by month manually.
========================================================== */

$archive_posts = get_posts(
	array(
		'post_type'      => 'greshma_editorial',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'fields'         => 'ids',
		'orderby'        => 'date',
		'order'          => 'DESC',
	)
);

$archive_months = array();

foreach ( $archive_posts as $archive_post_id ) {

	$year  = get_the_date( 'Y', $archive_post_id );
	$month = get_the_date( 'm', $archive_post_id );

	$key = $year . '-' . $month;

	if ( ! isset( $archive_months[ $key ] ) ) {

		$archive_months[ $key ] = array(
			'year'  => $year,
			'month' => $month,
			'label' => get_the_date(
				'F Y',
				$archive_post_id
			),
		);
	}
}

$archive_months = array_slice(
	$archive_months,
	0,
	6
);
?>


<div class="journal-sidebar">


	<!-- =====================================================
	     SEARCH
	===================================================== -->

	<section class="journal-sidebar__widget">

		<h2 class="journal-sidebar__title">
			<?php esc_html_e(
				'Search Journal',
				'greshma'
			); ?>
		</h2>


		<form
			class="journal-sidebar__search"
			role="search"
			method="get"
			action="<?php echo esc_url( home_url( '/' ) ); ?>"
		>

			<label
				class="screen-reader-text"
				for="journal-search"
			>
				<?php esc_html_e(
					'Search Journal',
					'greshma'
				); ?>
			</label>


			<input
				type="search"
				id="journal-search"
				name="s"
				placeholder="<?php esc_attr_e(
					'Search...',
					'greshma'
				); ?>"
			>


			<input
				type="hidden"
				name="post_type"
				value="greshma_editorial"
			>


			<button
				type="submit"
				aria-label="<?php esc_attr_e(
					'Search',
					'greshma'
				); ?>"
			>

				<svg viewBox="0 0 24 24" aria-hidden="true">
					<circle cx="11" cy="11" r="6"></circle>
					<path d="M16 16l5 5"></path>
				</svg>

			</button>

		</form>

	</section>


	<!-- =====================================================
	     CATEGORIES
	===================================================== -->

	<?php
	if (
		! empty( $journal_types ) &&
		! is_wp_error( $journal_types )
	) :
		?>

		<section class="journal-sidebar__widget">

			<div class="journal-sidebar__heading">

				<h2>
					<?php esc_html_e(
						'Categories',
						'greshma'
					); ?>
				</h2>

				<span aria-hidden="true">
					❧
				</span>

			</div>


			<ul class="journal-sidebar__categories">

				<?php foreach ( $journal_types as $type ) : ?>

					<li>

						<a
							href="<?php echo esc_url(
								add_query_arg(
									'editorial_type',
									$type->slug,
									$editorial_archive_url
								)
							); ?>"
						>

							<span>
								<?php echo esc_html( $type->name ); ?>
							</span>

							<span>
								<?php
								echo esc_html(
									str_pad(
										(string) $type->count,
										2,
										'0',
										STR_PAD_LEFT
									)
								);
								?>
							</span>

						</a>

					</li>

				<?php endforeach; ?>

			</ul>

		</section>

	<?php endif; ?>


	<!-- =====================================================
	     ARCHIVES
	===================================================== -->

	<?php if ( ! empty( $archive_months ) ) : ?>

		<section class="journal-sidebar__widget">

			<div class="journal-sidebar__heading">

				<h2>
					<?php esc_html_e(
						'Archives',
						'greshma'
					); ?>
				</h2>

				<span aria-hidden="true">
					❧
				</span>

			</div>


			<ul class="journal-sidebar__archives">

				<?php foreach ( $archive_months as $archive_month ) : ?>

					<li>

						<a
							href="<?php echo esc_url(
								add_query_arg(
									array(
										'editorial_year'  => $archive_month['year'],
										'editorial_month' => $archive_month['month'],
									),
									$editorial_archive_url
								)
							); ?>"
						>

							<?php
							echo esc_html(
								$archive_month['label']
							);
							?>

						</a>

					</li>

				<?php endforeach; ?>

			</ul>

		</section>

	<?php endif; ?>


	<!-- =====================================================
	     POPULAR READS
	===================================================== -->

	<?php if ( $popular_query->have_posts() ) : ?>

		<section class="journal-sidebar__widget">

			<div class="journal-sidebar__heading">

				<h2>
					<?php esc_html_e(
						'Popular Reads',
						'greshma'
					); ?>
				</h2>

				<span aria-hidden="true">
					❧
				</span>

			</div>


			<div class="journal-sidebar__popular">

				<?php
				$popular_index = 1;

				while ( $popular_query->have_posts() ) :
					$popular_query->the_post();
					?>

					<article class="journal-sidebar__popular-item">


						<a
							class="journal-sidebar__popular-image"
							href="<?php the_permalink(); ?>"
							aria-label="<?php echo esc_attr(
								get_the_title()
							); ?>"
						>

							<?php if ( has_post_thumbnail() ) : ?>

								<?php
								the_post_thumbnail(
									'thumbnail',
									array(
										'class'    => 'journal-sidebar__popular-image-file',
										'loading'  => 'lazy',
										'decoding' => 'async',
										'alt'      => the_title_attribute(
											array(
												'echo' => false,
											)
										),
									)
								);
								?>

							<?php else : ?>

								<span>
									<?php
									echo esc_html(
										str_pad(
											(string) $popular_index,
											2,
											'0',
											STR_PAD_LEFT
										)
									);
									?>
								</span>

							<?php endif; ?>

						</a>


						<div>

							<h3>

								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>

							</h3>


							<span>
								<?php echo esc_html(
									get_the_date()
								); ?>
							</span>

						</div>

					</article>

					<?php
					++$popular_index;

				endwhile;
				?>

			</div>

		</section>

		<?php wp_reset_postdata(); ?>

	<?php endif; ?>


	<!-- =====================================================
	     TOPICS
	===================================================== -->

	<?php
	if (
		! empty( $journal_topics ) &&
		! is_wp_error( $journal_topics )
	) :
		?>

		<section class="journal-sidebar__widget">

			<div class="journal-sidebar__heading">

				<h2>
					<?php esc_html_e(
						'Topics',
						'greshma'
					); ?>
				</h2>

				<span aria-hidden="true">
					❧
				</span>

			</div>


			<div class="journal-sidebar__tags">

				<?php foreach ( $journal_topics as $topic ) : ?>

					<a
						href="<?php echo esc_url(
							add_query_arg(
								'editorial_topic',
								$topic->slug,
								$editorial_archive_url
							)
						); ?>"
					>

						<?php echo esc_html(
							$topic->name
						); ?>

					</a>

				<?php endforeach; ?>

			</div>

		</section>

	<?php endif; ?>


	<!-- =====================================================
	     SIDEBAR QUOTE
	===================================================== -->

	<blockquote class="journal-sidebar__quote">

		<span
			class="journal-sidebar__quote-mark"
			aria-hidden="true"
		>
			“
		</span>


		<p>
			<?php
			esc_html_e(
				'Peace begins when people begin listening.',
				'greshma'
			);
			?>
		</p>


		<span
			class="journal-sidebar__quote-leaf"
			aria-hidden="true"
		>
			❧
		</span>

	</blockquote>

</div>