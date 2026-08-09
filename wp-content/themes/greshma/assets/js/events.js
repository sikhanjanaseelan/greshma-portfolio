document.addEventListener('DOMContentLoaded', function () {

    /* ======================================================
       UPCOMING EVENTS
    ====================================================== */

    const eventList = document.querySelector(
        '[data-events-list]'
    );

    if (eventList) {

        const eventCards = Array.from(
            eventList.querySelectorAll(
                '[data-event-item]'
            )
        );

        const filterForm = document.querySelector(
            '#events-filter-form'
        );

        const searchInput = document.querySelector(
            '[data-event-search]'
        );

        const typeSelect = document.querySelector(
            '[data-event-type]'
        );

        const locationSelect = document.querySelector(
            '[data-event-location]'
        );

        const dateSelect = document.querySelector(
            '[data-event-date]'
        );

        const countElement = document.querySelector(
            '.events-upcoming__count'
        );


        /* ==================================================
           NORMALIZE
        ================================================== */

        function normalize(value) {

            return String(value || '')
                .trim()
                .toLowerCase();

        }


        /* ==================================================
           COUNT
        ================================================== */

        function updateCount(count) {

            if (!countElement) {
                return;
            }

            countElement.textContent =
                count === 1
                    ? '1 Event'
                    : count + ' Events';

        }


        /* ==================================================
           EMPTY STATE
        ================================================== */

        function updateEmptyState(count) {

            let empty = document.querySelector(
                '.events-upcoming__filter-empty'
            );


            if (count > 0) {

                if (empty) {
                    empty.remove();
                }

                return;
            }


            if (empty) {
                return;
            }


            empty = document.createElement(
                'div'
            );

            empty.className =
                'events-upcoming__filter-empty';


            empty.innerHTML = `
                <strong>No events found.</strong>
                <span>
                    Try changing the event type,
                    location, date or search term.
                </span>
            `;


            eventList.insertAdjacentElement(
                'afterend',
                empty
            );

        }


        /* ==================================================
           FILTER EVENTS
        ================================================== */

        function applyFilters() {

            const searchValue = normalize(
                searchInput
                    ? searchInput.value
                    : ''
            );

            const typeValue = normalize(
                typeSelect
                    ? typeSelect.value
                    : 'all'
            );

            const locationValue = normalize(
                locationSelect
                    ? locationSelect.value
                    : 'all'
            );

            const monthValue = normalize(
                dateSelect
                    ? dateSelect.value
                    : 'all'
            );


            let visibleCount = 0;


            eventCards.forEach(function (card) {

                const cardType = normalize(
                    card.getAttribute(
                        'data-event-type'
                    )
                );

                const cardLocation = normalize(
                    card.getAttribute(
                        'data-event-location'
                    )
                );

                const cardMonth = normalize(
                    card.getAttribute(
                        'data-event-month'
                    )
                );

                const cardText = normalize(
                    card.textContent
                );


                const matchesSearch =
                    searchValue === ''
                    ||
                    cardText.includes(
                        searchValue
                    );


                const matchesType =
                    typeValue === 'all'
                    ||
                    cardType === typeValue;


                const matchesLocation =
                    locationValue === 'all'
                    ||
                    cardLocation === locationValue;


                const matchesMonth =
                    monthValue === 'all'
                    ||
                    cardMonth === monthValue;


                const shouldShow =
                    matchesSearch
                    &&
                    matchesType
                    &&
                    matchesLocation
                    &&
                    matchesMonth;


                card.classList.toggle(
                    'is-hidden',
                    !shouldShow
                );


                if (shouldShow) {
                    visibleCount++;
                }

            });


            updateCount(
                visibleCount
            );


            /*
             * Only create the filter-specific empty
             * state when the filter UI actually exists.
             *
             * On /events/ there are intentionally
             * no filters.
             */
            if (filterForm) {

                updateEmptyState(
                    visibleCount
                );

            }

        }


        /* ==================================================
           FILTER FORM
        ================================================== */

        if (filterForm) {

            filterForm.addEventListener(
                'submit',
                function (event) {

                    event.preventDefault();

                    applyFilters();

                }
            );


            if (typeSelect) {

                typeSelect.addEventListener(
                    'change',
                    applyFilters
                );

            }


            if (locationSelect) {

                locationSelect.addEventListener(
                    'change',
                    applyFilters
                );

            }


            if (dateSelect) {

                dateSelect.addEventListener(
                    'change',
                    applyFilters
                );

            }


            if (searchInput) {

                let searchTimer;


                searchInput.addEventListener(
                    'input',
                    function () {

                        clearTimeout(
                            searchTimer
                        );


                        searchTimer = setTimeout(
                            applyFilters,
                            150
                        );

                    }
                );

            }


            /*
             * Initial filtering is only needed
             * on the Event Library.
             */
            applyFilters();

        } else {

            /*
             * Events landing page:
             * no filter UI exists, therefore make sure
             * every queried preview card is visible.
             */

            eventCards.forEach(function (card) {

                card.classList.remove(
                    'is-hidden'
                );

            });


            updateCount(
                eventCards.length
            );

        }

    }


    /* ======================================================
       PAST EVENTS SLIDER
    ====================================================== */

    const viewport = document.querySelector(
        '[data-events-past-viewport]'
    );

    const track = document.querySelector(
        '[data-events-past-track]'
    );

    const prevButton = document.querySelector(
        '[data-events-past-prev]'
    );

    const nextButton = document.querySelector(
        '[data-events-past-next]'
    );


    /*
     * Past slider is independent from
     * Upcoming Events and filters.
     */
    if (
        viewport &&
        track &&
        prevButton &&
        nextButton
    ) {

        const pastCards = Array.from(
            track.querySelectorAll(
                '.events-past-card'
            )
        );


        let currentIndex = 0;


        function visibleCards() {

            if (window.innerWidth <= 520) {
                return 1;
            }

            if (window.innerWidth <= 767) {
                return 2;
            }

            if (window.innerWidth <= 992) {
                return 3;
            }

            return 4;

        }


        function maxIndex() {

            return Math.max(
                0,
                pastCards.length -
                visibleCards()
            );

        }


        function updateSlider() {

            if (!pastCards.length) {
                return;
            }


            const cardWidth =
                pastCards[0]
                    .getBoundingClientRect()
                    .width;


            const styles =
                window.getComputedStyle(
                    track
                );


            const gap =
                parseFloat(
                    styles.gap
                ) || 0;


            const distance =
                currentIndex *
                (cardWidth + gap);


            track.style.transform =
                'translateX(-'
                + distance
                + 'px)';


            prevButton.disabled =
                currentIndex === 0;


            nextButton.disabled =
                currentIndex >=
                maxIndex();

        }


        nextButton.addEventListener(
            'click',
            function () {

                if (
                    currentIndex <
                    maxIndex()
                ) {

                    currentIndex++;

                    updateSlider();

                }

            }
        );


        prevButton.addEventListener(
            'click',
            function () {

                if (currentIndex > 0) {

                    currentIndex--;

                    updateSlider();

                }

            }
        );


        window.addEventListener(
            'resize',
            function () {

                currentIndex =
                    Math.min(
                        currentIndex,
                        maxIndex()
                    );


                updateSlider();

            }
        );


        updateSlider();

    }

});