<?php
/**
 * Journal Page — Stories in Print.
 *
 * IMAGE ASSETS REQUIRED LATER:
 *
 * assets/images/journal/journal-print-01.png
 * assets/images/journal/journal-print-02.png
 * assets/images/journal/journal-print-03.png
 * assets/images/journal/journal-print-04.png
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$print_items = [

    [
        'title' => 'Dialogue for Women’s Agency',
        'role'  => 'Dialogue for',
        'year'  => '2024',
        'image' => 'journal-print-01.png',
    ],

    [
        'title' => 'Faith, Ecology and the Future',
        'role'  => 'Co-Author',
        'year'  => '2023',
        'image' => 'journal-print-02.png',
    ],

    [
        'title' => 'Building Peace Together',
        'role'  => 'Contributing Author',
        'year'  => '2022',
        'image' => 'journal-print-03.png',
    ],

    [
        'title' => 'Interfaith Voices of Hope',
        'role'  => 'Interfaith Voice',
        'year'  => '2021',
        'image' => 'journal-print-04.png',
    ],

];
?>

<section class="journal-print">

    <div class="journal-section-heading">

        <h2>
            Stories in Print
        </h2>

        <a href="#">
            View All

            <span aria-hidden="true">
                →
            </span>
        </a>

    </div>


    <div class="journal-print__grid">

        <?php foreach ( $print_items as $item ) : ?>

            <article class="journal-print-card">

                <div class="journal-print-card__cover">

                    <span>
                        <?php
                        echo esc_html(
                            $item['image']
                        );
                        ?>
                    </span>

                </div>


                <div class="journal-print-card__footer">

                    <div>

                        <h3>
                            <?php
                            echo esc_html(
                                $item['role']
                            );
                            ?>
                        </h3>

                        <span>
                            <?php
                            echo esc_html(
                                $item['year']
                            );
                            ?>
                        </span>

                    </div>


                    <a
                        href="#"
                        class="journal-print-card__icon"
                        aria-label="<?php echo esc_attr( $item['title'] ); ?>"
                    >

                        <svg
                            viewBox="0 0 24 24"
                            aria-hidden="true"
                        >
                            <path d="M5 4h6c2 0 3 1 3 3v13c0-2-1-3-3-3H5Z"/>
                            <path d="M19 4h-5c-2 0-3 1-3 3v13c0-2 1-3 3-3h5Z"/>
                        </svg>

                    </a>

                </div>

            </article>

        <?php endforeach; ?>

    </div>

</section>