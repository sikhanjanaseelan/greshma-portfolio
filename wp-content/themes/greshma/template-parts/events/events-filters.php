<?php
/**
 * Events Page — Search & Filters.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="events-filters">

    <div class="container">

        <form
            class="events-filters__panel"
            id="events-filter-form"
            action="#"
            method="get"
        >


            <!-- SEARCH -->

            <label class="events-filter events-filter--search">

                <span class="screen-reader-text">
                    Search Events
                </span>


                <span
                    class="events-filter__icon"
                    aria-hidden="true"
                >

                    <svg viewBox="0 0 24 24">

                        <circle
                            cx="10.5"
                            cy="10.5"
                            r="6.5"
                        />

                        <path d="M16 16l5 5"/>

                    </svg>

                </span>


                <input
                    type="search"
                    name="event_search"
                    placeholder="Search events..."
                    data-event-search
                >

            </label>


            <!-- EVENT TYPE -->

            <label class="events-filter events-filter--select">

                <span class="screen-reader-text">
                    Event Type
                </span>


                <select
                    name="event_type"
                    data-event-type
                >

                    <option value="all">
                        All Event Types
                    </option>

                    <option value="workshop">
                        Workshops
                    </option>

                    <option value="panel-discussion">
                        Panel Discussions
                    </option>

                    <option value="webinar">
                        Webinars
                    </option>

                    <option value="community-walk">
                        Community Walks
                    </option>

                    <option value="conference">
                        Conferences
                    </option>

                </select>


                <span
                    class="events-filter__chevron"
                    aria-hidden="true"
                >

                    <svg viewBox="0 0 24 24">
                        <path d="m7 9 5 5 5-5"/>
                    </svg>

                </span>

            </label>


            <!-- LOCATION -->

            <label class="events-filter events-filter--select">

                <span class="screen-reader-text">
                    Event Location
                </span>


                <select
                    name="event_location"
                    data-event-location
                >

                    <option value="all">
                        All Locations
                    </option>

                    <option value="bengaluru">
                        Bengaluru
                    </option>

                    <option value="new-delhi">
                        New Delhi
                    </option>

                    <option value="online">
                        Online
                    </option>

                    <option value="nandi-hills">
                        Nandi Hills
                    </option>

                </select>


                <span
                    class="events-filter__chevron"
                    aria-hidden="true"
                >

                    <svg viewBox="0 0 24 24">
                        <path d="m7 9 5 5 5-5"/>
                    </svg>

                </span>

            </label>


            <!-- DATE -->

            <label class="events-filter events-filter--select">

                <span class="screen-reader-text">
                    Event Date
                </span>


                <select
                    name="event_date"
                    data-event-date
                >

                    <option value="all">
                        All Dates
                    </option>

                    <option value="may">
                        May
                    </option>

                    <option value="june">
                        June
                    </option>

                    <option value="july">
                        July
                    </option>

                    <option value="august">
                        August
                    </option>

                </select>


                <span
                    class="events-filter__chevron"
                    aria-hidden="true"
                >

                    <svg viewBox="0 0 24 24">
                        <path d="m7 9 5 5 5-5"/>
                    </svg>

                </span>

            </label>


            <!-- FIND EVENTS -->

            <button
                type="submit"
                class="events-filters__submit"
            >

                <span>
                    Find Events
                </span>


                <svg
                    viewBox="0 0 24 24"
                    aria-hidden="true"
                >
                    <path d="M4 5h16l-6 7v5l-4 2v-7Z"/>
                </svg>

            </button>

        </form>

    </div>

</section>