<?php
/**
 * Homepage Journal Section
 *
 * @package Greshma
 */

$articles = array(
	array(
		'date'  => 'May 13, 2025',
		'title' => 'The Power of Youth in Climate Action',
		'image' => '',
		'link'  => home_url('/journal/'),
	),
	array(
		'date'  => 'April 20, 2025',
		'title' => 'Why Interfaith Dialogue Matters Today',
		'image' => '',
		'link'  => home_url('/journal/'),
	),
	array(
		'date'  => 'April 15, 2025',
		'title' => 'Lessons from Nature on Peace and Coexistence',
		'image' => '',
		'link'  => home_url('/journal/'),
	),
	array(
		'date'  => 'April 05, 2025',
		'title' => 'Building Communities that Care',
		'image' => '',
		'link'  => home_url('/journal/'),
	),
	array(
		'date'  => 'March 22, 2025',
		'title' => 'Hope is a Collective Journey',
		'image' => '',
		'link'  => home_url('/journal/'),
	),
);
?>

<section class="home-journal">

    <div class="site-container">

        <div class="journal-heading">

            <div>

                <span class="section-eyebrow">
                    From The Journal
                </span>

            </div>

            <a href="<?php echo esc_url(home_url('/journal/')); ?>" class="journal-all">

                View All Articles →

            </a>

        </div>

        <div class="journal-grid">

            <?php foreach($articles as $article): ?>

                <article class="journal-card">

                    <a href="<?php echo esc_url($article['link']); ?>" class="journal-image">

                        <?php if($article['image']) : ?>

                            <img
                                src="<?php echo esc_url($article['image']); ?>"
                                alt="<?php echo esc_attr($article['title']); ?>"
                            >

                        <?php else: ?>

                            <div class="journal-placeholder">

                                Image

                            </div>

                        <?php endif; ?>

                    </a>

                    <div class="journal-content">

                        <div class="journal-date">

                            <?php echo esc_html($article['date']); ?>

                        </div>

                        <h3>

                            <a href="<?php echo esc_url($article['link']); ?>">

                                <?php echo esc_html($article['title']); ?>

                            </a>

                        </h3>

                        <a
                            href="<?php echo esc_url($article['link']); ?>"
                            class="journal-read"
                        >

                            Read More →

                        </a>

                    </div>

                </article>

            <?php endforeach; ?>

        </div>

    </div>

</section>