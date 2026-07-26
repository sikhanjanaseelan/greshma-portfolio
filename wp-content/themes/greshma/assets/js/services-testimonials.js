document.addEventListener('DOMContentLoaded', () => {

    const slider = document.querySelector(
        '[data-services-testimonials]'
    );

    if (!slider) {
        return;
    }

    const slides = Array.from(
        slider.querySelectorAll('[data-testimonial-slide]')
    );

    const dots = Array.from(
        slider.querySelectorAll('[data-testimonial-dot]')
    );

    const previousButton = slider.querySelector(
        '[data-testimonial-prev]'
    );

    const nextButton = slider.querySelector(
        '[data-testimonial-next]'
    );

    if (slides.length < 2) {
        return;
    }

    let currentIndex = 0;

    let autoPlayTimer = null;


    const showSlide = (index) => {

        currentIndex =
            (index + slides.length) %
            slides.length;

        slides.forEach((slide, slideIndex) => {

            slide.classList.toggle(
                'is-active',
                slideIndex === currentIndex
            );

        });

        dots.forEach((dot, dotIndex) => {

            dot.classList.toggle(
                'is-active',
                dotIndex === currentIndex
            );

        });

    };


    const nextSlide = () => {
        showSlide(currentIndex + 1);
    };


    const previousSlide = () => {
        showSlide(currentIndex - 1);
    };


    const stopAutoPlay = () => {

        if (autoPlayTimer) {

            window.clearInterval(
                autoPlayTimer
            );

            autoPlayTimer = null;
        }

    };


    const startAutoPlay = () => {

        stopAutoPlay();

        autoPlayTimer = window.setInterval(
            nextSlide,
            5000
        );

    };


    previousButton?.addEventListener(
        'click',
        () => {

            previousSlide();
            startAutoPlay();

        }
    );


    nextButton?.addEventListener(
        'click',
        () => {

            nextSlide();
            startAutoPlay();

        }
    );


    dots.forEach((dot) => {

        dot.addEventListener(
            'click',
            () => {

                const index = Number(
                    dot.dataset.testimonialDot
                );

                showSlide(index);
                startAutoPlay();

            }
        );

    });


    slider.addEventListener(
        'mouseenter',
        stopAutoPlay
    );


    slider.addEventListener(
        'mouseleave',
        startAutoPlay
    );


    showSlide(0);

    startAutoPlay();

});