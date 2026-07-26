<?php
/**
 * Journal Page — Sidebar.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="journal-sidebar">


    <!-- ==========================================
         SEARCH
    =========================================== -->

    <section class="journal-sidebar__widget">

        <h2 class="journal-sidebar__title">
            Search Journal
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
                Search Journal
            </label>


            <input
                type="search"
                id="journal-search"
                name="s"
                placeholder="Search..."
            >


            <button
                type="submit"
                aria-label="Search"
            >

                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <circle cx="11" cy="11" r="6"/>
                    <path d="M16 16l5 5"/>
                </svg>

            </button>

        </form>

    </section>


    <!-- ==========================================
         CATEGORIES
    =========================================== -->

    <section class="journal-sidebar__widget">

        <div class="journal-sidebar__heading">

            <h2>
                Categories
            </h2>

            <span aria-hidden="true">
                ❧
            </span>

        </div>


        <ul class="journal-sidebar__categories">

            <li>
                <a href="#">
                    <span>Thoughts &amp; Reflections</span>
                    <span>12</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span>Stories in Print</span>
                    <span>08</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span>Media &amp; Interviews</span>
                    <span>06</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span>LinkedIn Insights</span>
                    <span>18</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span>Events &amp; Talks</span>
                    <span>10</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span>Research &amp; Reports</span>
                    <span>05</span>
                </a>
            </li>

        </ul>

    </section>


    <!-- ==========================================
         ARCHIVES
    =========================================== -->

    <section class="journal-sidebar__widget">

        <div class="journal-sidebar__heading">

            <h2>
                Archives
            </h2>

            <span aria-hidden="true">
                ❧
            </span>

        </div>


        <ul class="journal-sidebar__archives">

            <li>
                <a href="#">
                    June 2025
                </a>
            </li>

            <li>
                <a href="#">
                    May 2025
                </a>
            </li>

            <li>
                <a href="#">
                    April 2025
                </a>
            </li>

            <li>
                <a href="#">
                    March 2025
                </a>
            </li>

        </ul>

    </section>


    <!-- ==========================================
         POPULAR READS
    =========================================== -->

    <section class="journal-sidebar__widget">

        <div class="journal-sidebar__heading">

            <h2>
                Popular Reads
            </h2>

            <span aria-hidden="true">
                ❧
            </span>

        </div>


        <div class="journal-sidebar__popular">


            <!-- POPULAR ITEM -->

            <article class="journal-sidebar__popular-item">

                <div class="journal-sidebar__popular-image">
                    01
                </div>

                <div>

                    <h3>
                        Why Listening is a Form
                        of Leadership
                    </h3>

                    <span>
                        June 05, 2025
                    </span>

                </div>

            </article>


            <article class="journal-sidebar__popular-item">

                <div class="journal-sidebar__popular-image">
                    02
                </div>

                <div>

                    <h3>
                        Young People Are Already
                        Leading Change
                    </h3>

                    <span>
                        May 28, 2025
                    </span>

                </div>

            </article>


            <article class="journal-sidebar__popular-item">

                <div class="journal-sidebar__popular-image">
                    03
                </div>

                <div>

                    <h3>
                        Building Peace Through
                        Everyday Conversations
                    </h3>

                    <span>
                        May 16, 2025
                    </span>

                </div>

            </article>

        </div>

    </section>


    <!-- ==========================================
         TAGS
    =========================================== -->

    <section class="journal-sidebar__widget">

        <div class="journal-sidebar__heading">

            <h2>
                Tags
            </h2>

            <span aria-hidden="true">
                ❧
            </span>

        </div>


        <div class="journal-sidebar__tags">

            <a href="#">Peacebuilding</a>
            <a href="#">Climate</a>
            <a href="#">Leadership</a>
            <a href="#">Youth</a>
            <a href="#">Dialogue</a>
            <a href="#">Interfaith</a>
            <a href="#">Community</a>

        </div>

    </section>


    <!-- ==========================================
         SIDEBAR QUOTE
    =========================================== -->

    <blockquote class="journal-sidebar__quote">

        <span
            class="journal-sidebar__quote-mark"
            aria-hidden="true"
        >
            “
        </span>

        <p>
            Peace begins when
            people begin listening.
        </p>

        <span
            class="journal-sidebar__quote-leaf"
            aria-hidden="true"
        >
            ❧
        </span>

    </blockquote>

</div>