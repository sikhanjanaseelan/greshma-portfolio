document.addEventListener('DOMContentLoaded', function () {

    /* ======================================================
       UPCOMING EVENTS
    ====================================================== */

    const eventList = document.querySelector(
        '[data-events-list]'
    );

    if (!eventList) {
        return;
    }


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


    /* ======================================================
       NORMALIZE
    ====================================================== */

    function normalize(value) {

        return String(value || '')
            .trim()
            .toLowerCase();

    }


    /* ======================================================
       FILTER EVENTS
    ====================================================== */

    function applyFilters() {

        const searchValue = normalize(
            searchInput ? searchInput.value : ''
        );

        const typeValue = normalize(
            typeSelect ? typeSelect.value : 'all'
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


            /* SEARCH */

            const matchesSearch =
                searchValue === ''
                ||
                cardText.includes(
                    searchValue
                );


            /* EVENT TYPE */

            const matchesType =
                typeValue === 'all'
                ||
                cardType === typeValue;


            /* LOCATION */

            const matchesLocation =
                locationValue === 'all'
                ||
                cardLocation === locationValue;


            /* MONTH */

            const matchesMonth =
                monthValue === 'all'
                ||
                cardMonth === monthValue;


            /* FINAL */

            const shouldShow =
                matchesSearch
                &&
                matchesType
                &&
                matchesLocation
                &&
                matchesMonth;


            if (shouldShow) {

                card.classList.remove(
                    'is-hidden'
                );

                visibleCount++;

            } else {

                card.classList.add(
                    'is-hidden'
                );

            }

        });


        updateCount(
            visibleCount
        );


        updateEmptyState(
            visibleCount
        );

    }


    /* ======================================================
       COUNT
    ====================================================== */

    function updateCount(count) {

        if (!countElement) {
            return;
        }


        countElement.textContent =
            count === 1
                ? '1 Event'
                : count + ' Events';

    }


    /* ======================================================
       EMPTY STATE
    ====================================================== */

    function updateEmptyState(count) {

        let empty = document.querySelector(
            '.events-upcoming__empty'
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
            'events-upcoming__empty';


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


    /* ======================================================
       FORM SUBMIT
    ====================================================== */

    if (filterForm) {

        filterForm.addEventListener(
            'submit',
            function (event) {

                event.preventDefault();

                applyFilters();

            }
        );

    }


    /* ======================================================
       SELECT FILTERS
    ====================================================== */

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


    /* ======================================================
       SEARCH
    ====================================================== */

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


    /* ======================================================
       INITIAL
    ====================================================== */

    applyFilters();



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


    if (
        !viewport
        ||
        !track
        ||
        !prevButton
        ||
        !nextButton
    ) {
        return;
    }


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

});