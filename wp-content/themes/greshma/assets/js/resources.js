document.addEventListener('DOMContentLoaded', () => {

    const grid = document.querySelector(
        '[data-resource-grid]'
    );

    if (!grid) {
        return;
    }


    /* ======================================================
       CARDS
    ====================================================== */

    const items = Array.from(
        grid.querySelectorAll(
            '[data-resource-item]'
        )
    );


    /*
     * Keep original order so "Most Recent"
     * can restore the PHP order.
     */

    const originalItems = [
        ...items
    ];


    /* ======================================================
       CONTROLS
    ====================================================== */

    const categoryButtons = Array.from(
        document.querySelectorAll(
            '[data-resource-category]'
        )
    );


    const typeRadios = Array.from(
        document.querySelectorAll(
            'input[name="resource-type"]'
        )
    );


    const formatButtons = Array.from(
        document.querySelectorAll(
            '[data-resource-format]'
        )
    );


    const searchInput = document.querySelector(
        '[data-resource-search]'
    );


    const sortSelect = document.querySelector(
        '[data-resource-sort]'
    );


    const resetButton = document.querySelector(
        '.resources-filter__reset'
    );


    const loadMoreButton = document.querySelector(
        '[data-resource-load-more]'
    );


    const loadMoreWrap = document.querySelector(
        '[data-resource-more-wrap]'
    );


    /* ======================================================
       STATE
    ====================================================== */

    let activeCategory = 'all';

    let activeType = 'all';

    let activeFormat = 'all';

    let searchTerm = '';

    let visibleLimit = 4;


    /* ======================================================
       HELPERS
    ====================================================== */

    const normalize = (value = '') => {

        return String(value)
            .trim()
            .toLowerCase();

    };


    /* ======================================================
       MATCH CARD
    ====================================================== */

    const matchesFilters = (item) => {

        const category = normalize(
            item.dataset.category
        );


        const type = normalize(
            item.dataset.type
        );


        const format = normalize(
            item.dataset.format
        );


        const searchContent = normalize(
            item.textContent
        );


        const categoryMatch =
            activeCategory === 'all'
            ||
            category === activeCategory;


        const typeMatch =
            activeType === 'all'
            ||
            type === activeType;


        const formatMatch =
            activeFormat === 'all'
            ||
            format === activeFormat;


        const searchMatch =
            searchTerm === ''
            ||
            searchContent.includes(
                searchTerm
            );


        return (
            categoryMatch
            &&
            typeMatch
            &&
            formatMatch
            &&
            searchMatch
        );

    };


    /* ======================================================
       SORT
    ====================================================== */

    const sortItems = (filteredItems) => {

        if (!sortSelect) {
            return filteredItems;
        }


        const sortValue = normalize(
            sortSelect.value
        );


        const sorted = [
            ...filteredItems
        ];


        /* MOST RECENT / ORIGINAL ORDER */

        if (sortValue === 'recent') {

            sorted.sort(
                (a, b) => {

                    return (
                        originalItems.indexOf(a)
                        -
                        originalItems.indexOf(b)
                    );

                }
            );

        }


        /* A-Z */

        if (sortValue === 'az') {

            sorted.sort(
                (a, b) => {

                    const titleA =
                        normalize(
                            a.querySelector('h3')
                                ?.textContent
                        );


                    const titleB =
                        normalize(
                            b.querySelector('h3')
                                ?.textContent
                        );


                    return titleA.localeCompare(
                        titleB
                    );

                }
            );

        }


        /* TYPE */

        if (sortValue === 'type') {

            sorted.sort(
                (a, b) => {

                    return normalize(
                        a.dataset.type
                    ).localeCompare(
                        normalize(
                            b.dataset.type
                        )
                    );

                }
            );

        }


        return sorted;

    };


    /* ======================================================
       EMPTY STATE
    ====================================================== */

    const updateEmptyState = (count) => {

        let emptyState =
            document.querySelector(
                '.resources-library__empty'
            );


        if (count > 0) {

            if (emptyState) {
                emptyState.remove();
            }

            return;

        }


        if (!emptyState) {

            emptyState =
                document.createElement(
                    'div'
                );


            emptyState.className =
                'resources-library__empty';


            emptyState.innerHTML = `
                <strong>No resources found.</strong>

                <span>
                    Try changing the category,
                    resource type, format,
                    or search keyword.
                </span>
            `;


            grid.insertAdjacentElement(
                'afterend',
                emptyState
            );

        }

    };


    /* ======================================================
       RENDER
    ====================================================== */

    const renderResources = () => {

        let filteredItems =
            items.filter(
                matchesFilters
            );


        filteredItems =
            sortItems(
                filteredItems
            );


        /*
         * Hide every card.
         */

        items.forEach((item) => {

            item.classList.add(
                'is-hidden'
            );

        });


        /*
         * Reorder only matching items.
         */

        filteredItems.forEach((item) => {

            grid.appendChild(item);

        });


        /*
         * Display only items inside
         * current visible limit.
         */

        filteredItems
            .slice(
                0,
                visibleLimit
            )
            .forEach((item) => {

                item.classList.remove(
                    'is-hidden'
                );

            });


        /* LOAD MORE */

        if (loadMoreWrap) {

            loadMoreWrap.hidden =
                filteredItems.length <=
                visibleLimit;

        }


        /* EMPTY MESSAGE */

        updateEmptyState(
            filteredItems.length
        );

    };


    /* ======================================================
       RESET LOAD LIMIT
    ====================================================== */

    const resetLimit = () => {

        visibleLimit = 4;

    };


    /* ======================================================
       CATEGORY FILTER
    ====================================================== */

    categoryButtons.forEach((button) => {

        button.addEventListener(
            'click',
            (event) => {

                event.preventDefault();


                activeCategory =
                    normalize(
                        button.dataset
                            .resourceCategory
                    );


                categoryButtons.forEach(
                    (categoryButton) => {

                        categoryButton
                            .classList
                            .remove(
                                'is-active'
                            );

                    }
                );


                button.classList.add(
                    'is-active'
                );


                resetLimit();

                renderResources();

            }
        );

    });


    /* ======================================================
       TYPE FILTER
    ====================================================== */

    typeRadios.forEach((radio) => {

        radio.addEventListener(
            'change',
            () => {

                if (!radio.checked) {
                    return;
                }


                activeType =
                    normalize(
                        radio.value
                    );


                resetLimit();

                renderResources();

            }
        );

    });


    /* ======================================================
       FORMAT FILTER
    ====================================================== */

    formatButtons.forEach((button) => {

        button.addEventListener(
            'click',
            () => {

                const clickedFormat =
                    normalize(
                        button.dataset
                            .resourceFormat
                    );


                /*
                 * Clicking the active format
                 * again clears format filtering.
                 */

                if (
                    activeFormat ===
                    clickedFormat
                ) {

                    activeFormat = 'all';


                    button.classList.remove(
                        'is-active'
                    );

                } else {

                    activeFormat =
                        clickedFormat;


                    formatButtons.forEach(
                        (formatButton) => {

                            formatButton
                                .classList
                                .remove(
                                    'is-active'
                                );

                        }
                    );


                    button.classList.add(
                        'is-active'
                    );

                }


                resetLimit();

                renderResources();

            }
        );

    });


    /* ======================================================
       SEARCH
    ====================================================== */

    if (searchInput) {

        let searchTimer;


        searchInput.addEventListener(
            'input',
            () => {

                window.clearTimeout(
                    searchTimer
                );


                searchTimer =
                    window.setTimeout(
                        () => {

                            searchTerm =
                                normalize(
                                    searchInput.value
                                );


                            resetLimit();

                            renderResources();

                        },
                        150
                    );

            }
        );

    }


    /* ======================================================
       SORT
    ====================================================== */

    if (sortSelect) {

        sortSelect.addEventListener(
            'change',
            () => {

                renderResources();

            }
        );

    }


    /* ======================================================
       LOAD MORE
    ====================================================== */

    if (loadMoreButton) {

        loadMoreButton.addEventListener(
            'click',
            () => {

                visibleLimit += 4;

                renderResources();

            }
        );

    }


    /* ======================================================
       RESET EVERYTHING
    ====================================================== */

    if (resetButton) {

        resetButton.addEventListener(
            'click',
            () => {

                activeCategory = 'all';

                activeType = 'all';

                activeFormat = 'all';

                searchTerm = '';

                visibleLimit = 4;


                /* CATEGORY */

                categoryButtons.forEach(
                    (button) => {

                        button.classList.toggle(
                            'is-active',

                            normalize(
                                button.dataset
                                    .resourceCategory
                            ) === 'all'
                        );

                    }
                );


                /* TYPE */

                typeRadios.forEach(
                    (radio) => {

                        radio.checked =
                            normalize(
                                radio.value
                            ) === 'all';

                    }
                );


                /* FORMAT */

                formatButtons.forEach(
                    (button) => {

                        button.classList.remove(
                            'is-active'
                        );

                    }
                );


                /* SEARCH */

                if (searchInput) {

                    searchInput.value = '';

                }


                /* SORT */

                if (sortSelect) {

                    sortSelect.value =
                        'recent';

                }


                renderResources();

            }
        );

    }


    /* ======================================================
       INITIALIZE
    ====================================================== */

    renderResources();

});