<?php
/**
 * Speaking Page — Values Strip.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$values = [

    [
        'title'       => 'Global Perspective',
        'description' => 'Connecting people across borders',
        'icon'        => '◎',
    ],

    [
        'title'       => 'Faith-rooted Values',
        'description' => 'Guided by compassion, dignity, and justice',
        'icon'        => '❧',
    ],

    [
        'title'       => 'Action-driven Impact',
        'description' => 'Turning dialogue into real-world change',
        'icon'        => '◉',
    ],

    [
        'title'       => 'Inclusive Approach',
        'description' => 'Bringing diverse voices to the table',
        'icon'        => '♧',
    ],

];
?>

<section class="speaking-values">

    <div class="container">

        <div class="speaking-values__panel">

            <?php foreach ( $values as $value ) : ?>

                <article class="speaking-values__item">

                    <div class="speaking-values__icon">

                        <?php
                        echo esc_html(
                            $value['icon']
                        );
                        ?>

                    </div>

                    <div class="speaking-values__content">

                        <h3>
                            <?php
                            echo esc_html(
                                $value['title']
                            );
                            ?>
                        </h3>

                        <p>
                            <?php
                            echo esc_html(
                                $value['description']
                            );
                            ?>
                        </p>

                    </div>

                </article>

            <?php endforeach; ?>

        </div>

    </div>

</section>