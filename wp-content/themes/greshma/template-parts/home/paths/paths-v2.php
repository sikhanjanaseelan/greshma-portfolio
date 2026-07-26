<?php
/**
 * Homepage Paths Section
 *
 * @package GreshmaPortfolio
 */

defined( 'ABSPATH' ) || exit;

$paths = [
    [
        'number'      => '01',
        'title'       => 'Peacebuilding',
        'description' => 'Creating spaces for dialogue, healing and meaningful connection across communities.',
        'link'        => home_url( '/my-paths/#peacebuilding' ),
    ],
    [
        'number'      => '02',
        'title'       => 'Education',
        'description' => 'Supporting young people through learning experiences rooted in empathy and purpose.',
        'link'        => home_url( '/my-paths/#education' ),
    ],
    [
        'number'      => '03',
        'title'       => 'Social Innovation',
        'description' => 'Transforming community ideas into practical initiatives that create lasting impact.',
        'link'        => home_url( '/my-paths/#social-innovation' ),
    ],
    [
        'number'      => '04',
        'title'       => 'Storytelling',
        'description' => 'Using stories to amplify voices, inspire reflection and bring people closer together.',
        'link'        => home_url( '/my-paths/#storytelling' ),
    ],
];
?>

<section class="paths-section" id="paths">

    <div class="container">

        <header class="paths-heading reveal">

    <div class="paths-heading__eyebrow">
        <span class="paths-heading__line"></span>
        <span>My Paths</span>
    </div>

    <div class="paths-heading__content">

        <h2 class="paths-heading__title reveal reveal-delay-1">
            Different paths.
            <em>One purpose.</em>
        </h2>

        <p class="paths-heading__description reveal reveal-delay-2">
            My work brings together peacebuilding, education,
            social innovation and storytelling to help people
            imagine and create a better future.
        </p>

    </div>

</header>

        <div class="paths-grid">

            <?php foreach ( $paths as $index => $path ) : ?>

                <article class="path-card">

                    <div class="path-card__top">

                        <span class="path-card__number">
                            <?php echo esc_html( $path['number'] ); ?>
                        </span>

                        <span class="path-card__arrow" aria-hidden="true">
                            ↗
                        </span>

                    </div>

                    <div class="path-card__content">

                        <h3 class="path-card__title">
                            <?php echo esc_html( $path['title'] ); ?>
                        </h3>

                        <p class="path-card__description">
                            <?php echo esc_html( $path['description'] ); ?>
                        </p>

                    </div>

                    <a
                        href="<?php echo esc_url( $path['link'] ); ?>"
                        class="path-card__link"
                    >
                        Explore this path
                        <span aria-hidden="true">→</span>
                    </a>

                </article>

            <?php endforeach; ?>

        </div>

    </div>

</section>