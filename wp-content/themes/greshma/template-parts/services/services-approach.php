<?php
/**
 * Services Page — My Approach.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$approach_items = [

    [
        'title'       => 'People-Centred',
        'description' => 'Placing people, dignity and voices at the centre.',
        'icon'        => '♧',
    ],

    [
        'title'       => 'Inclusive',
        'description' => 'Creating spaces where everyone belongs.',
        'icon'        => '✦',
    ],

    [
        'title'       => 'Ethical',
        'description' => 'Acting with integrity, respect and transparency.',
        'icon'        => '◇',
    ],

    [
        'title'       => 'Transformative',
        'description' => 'Turning conversations into lasting change.',
        'icon'        => '❧',
    ],

    [
        'title'       => 'Sustainable',
        'description' => 'Building solutions that last for generations.',
        'icon'        => '◎',
    ],

];
?>

<section class="services-approach">

    <div class="container">

        <div class="services-approach__panel">


            <!-- ==========================================
                 LEFT INTRO
            =========================================== -->

            <div class="services-approach__intro">

                <div class="services-approach__heading">

                    <h2>
                        My Approach
                    </h2>

                    <span aria-hidden="true">
                        ❧
                    </span>

                </div>

                <span
                    class="services-approach__line"
                    aria-hidden="true"
                ></span>

                <p>
                    Every service is guided by values
                    that shape meaningful and lasting impact.
                </p>

            </div>


            <!-- ==========================================
                 VALUES
            =========================================== -->

            <div class="services-approach__grid">

                <?php foreach ( $approach_items as $item ) : ?>

                    <article class="services-approach__item">

                        <div class="services-approach__icon">

                            <?php
                            echo esc_html(
                                $item['icon']
                            );
                            ?>

                        </div>

                        <h3>
                            <?php
                            echo esc_html(
                                $item['title']
                            );
                            ?>
                        </h3>

                        <p>
                            <?php
                            echo esc_html(
                                $item['description']
                            );
                            ?>
                        </p>

                    </article>

                <?php endforeach; ?>

            </div>

        </div>

    </div>

</section>