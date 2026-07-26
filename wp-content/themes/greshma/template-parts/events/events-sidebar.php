<?php
/**
 * Events Page — Sidebar.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="events-sidebar">


    <!-- NEXT EVENT -->

    <section class="events-sidebar__widget events-sidebar__next">

        <span class="events-sidebar__eyebrow">
            Next Event
        </span>

        <div class="events-sidebar__next-date">

            <strong>
                12
            </strong>

            <span>
                JUN
            </span>

        </div>


        <h3>
            Youth Leadership &amp;
            Peacebuilding Workshop
        </h3>


        <p>
            Bengaluru
            <br>
            10:00 AM – 1:00 PM
        </p>


        <a href="#">
            View Event
            <span aria-hidden="true">→</span>
        </a>

    </section>


    <!-- CATEGORIES -->

    <section class="events-sidebar__widget">

        <div class="events-sidebar__heading">

            <h3>
                Categories
            </h3>

            <span aria-hidden="true">
                ❧
            </span>

        </div>


        <ul class="events-sidebar__categories">

            <li>
                <a href="#">
                    <span>Workshops</span>
                    <span>04</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span>Panel Discussions</span>
                    <span>03</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span>Webinars</span>
                    <span>06</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span>Community Walks</span>
                    <span>02</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span>Conferences</span>
                    <span>05</span>
                </a>
            </li>

        </ul>

    </section>


    <!-- NEWSLETTER -->

    <section class="events-sidebar__widget events-sidebar__newsletter">

        <span
            class="events-sidebar__newsletter-icon"
            aria-hidden="true"
        >
            ✉
        </span>


        <h3>
            Stay Updated
        </h3>


        <p>
            Get notified about upcoming
            events and gatherings.
        </p>


        <form action="#" method="post">

            <label
                class="screen-reader-text"
                for="events-sidebar-email"
            >
                Email Address
            </label>

            <input
                id="events-sidebar-email"
                type="email"
                placeholder="Your email address"
                required
            >

            <button type="submit">
                Subscribe
            </button>

        </form>

    </section>

</div>