<?php
/**
 * Services Page — Who I Work With.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$work_with = [

    [
        'title' => 'Youth & Students',
        'icon'  => '♧',
    ],

    [
        'title' => 'Schools & Universities',
        'icon'  => '◇',
    ],

    [
        'title' => 'NGOs & Civil Society',
        'icon'  => '◎',
    ],

    [
        'title' => 'International Organizations',
        'icon'  => '◉',
    ],

    [
        'title' => 'Community Groups',
        'icon'  => '✦',
    ],

    [
        'title' => 'Faith-Based Networks',
        'icon'  => '❧',
    ],

    [
        'title' => 'Social Impact Teams',
        'icon'  => '♢',
    ],

];
?>

<section class="services-work-with">

    <div class="container">

        <!-- ==========================================
             HEADING
        =========================================== -->

        <div class="services-work-with__heading">

            <span
                class="services-work-with__line"
                aria-hidden="true"
            ></span>

            <h2>
                Who I Work With
            </h2>

            <span
                class="services-work-with__leaf"
                aria-hidden="true"
            >
                ❧
            </span>

        </div>


        <!-- ==========================================
             AUDIENCE GRID
        =========================================== -->

        <div class="services-work-with__grid">

            <?php foreach ( $work_with as $item ) : ?>

                <article class="services-work-with__item">

                    <div class="services-work-with__icon">

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

                </article>

            <?php endforeach; ?>

        </div>

    </div>

</section>