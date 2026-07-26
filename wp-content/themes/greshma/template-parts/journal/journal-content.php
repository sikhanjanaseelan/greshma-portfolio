<?php
/**
 * Journal Page — Main Content Area.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="journal-content">

    <div class="container">

        <div class="journal-content__layout">


            <!-- ==========================================
                 LEFT JOURNAL COLUMN
            =========================================== -->

            <div class="journal-content__main">


                <!-- FEATURED STORY -->

                <?php
                get_template_part(
                    'template-parts/journal/journal-featured'
                );
                ?>


                <!-- LATEST REFLECTIONS -->

                <?php
                get_template_part(
                    'template-parts/journal/journal-latest'
                );

                get_template_part(
    'template-parts/journal/journal-print'
);

get_template_part(
    'template-parts/journal/journal-bottom-grid'
);
                ?>


                <!--
                NEXT SECTIONS WILL GO HERE:

                journal-print
                journal-bottom-grid

                DO NOT place them outside this column.
                -->


            </div>


            <!-- ==========================================
                 RIGHT SIDEBAR
            =========================================== -->

            <aside class="journal-content__sidebar">

                <?php
                get_template_part(
                    'template-parts/journal/journal-sidebar'
                );
                ?>

            </aside>


        </div>

    </div>

</section>