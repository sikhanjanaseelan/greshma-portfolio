document.addEventListener('DOMContentLoaded', function () {
    const revealElements = document.querySelectorAll('.reveal');

    if (!revealElements.length) {
        return;
    }

    if (!('IntersectionObserver' in window)) {
        revealElements.forEach(function (element) {
            element.classList.add('is-visible');
        });

        return;
    }

    const observer = new IntersectionObserver(
        function (entries, revealObserver) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) {
                    return;
                }

                entry.target.classList.add('is-visible');
                revealObserver.unobserve(entry.target);
            });
        },
        {
            threshold: 0.15,
            rootMargin: '0px 0px -60px 0px',
        }
    );

    revealElements.forEach(function (element) {
        observer.observe(element);
    });
});