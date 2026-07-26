document.addEventListener('DOMContentLoaded', () => {

    const grid = document.querySelector('[data-gallery-grid]');

    const filterButtons = document.querySelectorAll(
        '[data-gallery-filter]'
    );

    const viewButtons = document.querySelectorAll(
        '[data-gallery-view]'
    );

    if (!grid) {
        return;
    }

    const items = Array.from(
        grid.querySelectorAll('[data-gallery-item]')
    );


    /* ======================================================
       FILTERING
    ====================================================== */

    filterButtons.forEach((button) => {

        button.addEventListener('click', () => {

            const selectedFilter =
                button.dataset.galleryFilter;


            /* Active button */

            filterButtons.forEach((item) => {

                item.classList.remove('is-active');

            });

            button.classList.add('is-active');


            /* Filter cards */

            items.forEach((item) => {

                const category =
                    item.dataset.category;

                const shouldShow =
                    selectedFilter === 'all'
                    || category === selectedFilter;

                item.classList.toggle(
                    'is-hidden',
                    !shouldShow
                );

            });

        });

    });


    /* ======================================================
       GRID / LIST VIEW
    ====================================================== */

    viewButtons.forEach((button) => {

        button.addEventListener('click', () => {

            const selectedView =
                button.dataset.galleryView;


            viewButtons.forEach((item) => {

                item.classList.remove('is-active');

            });

            button.classList.add('is-active');


            grid.classList.toggle(
                'is-list',
                selectedView === 'list'
            );

        });

    });

});