document.addEventListener('DOMContentLoaded', function () {
    const filterButtons = document.querySelectorAll('.projects-filter');
    const projectCards = document.querySelectorAll('.projects-collaboration-card');

    if (!filterButtons.length || !projectCards.length) {
        return;
    }

    filterButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const selectedFilter = button.dataset.filter;

            // Active button state.
            filterButtons.forEach(function (item) {
                item.classList.remove('is-active');
            });

            button.classList.add('is-active');

            // Show / hide project cards.
            projectCards.forEach(function (card) {
                const categories = (card.dataset.category || '')
                    .split(' ')
                    .filter(Boolean);

                const shouldShow =
                    selectedFilter === 'all' ||
                    categories.includes(selectedFilter);

                card.hidden = !shouldShow;
            });
        });
    });
});