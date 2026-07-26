document.addEventListener('DOMContentLoaded', () => {

    const sliders = document.querySelectorAll(
        '[data-speaking-slider]'
    );

    if (!sliders.length) {
        return;
    }


    sliders.forEach((slider) => {

        const track = slider.querySelector(
            '[data-speaking-track]'
        );

        const slides = Array.from(
            slider.querySelectorAll(
                '[data-speaking-slide]'
            )
        );

        const previousButton = slider.querySelector(
            '[data-speaking-prev]'
        );

        const nextButton = slider.querySelector(
            '[data-speaking-next]'
        );

        const dotsContainer = slider.querySelector(
            '[data-speaking-dots]'
        );


        if (
            !track ||
            slides.length === 0
        ) {
            return;
        }


        let currentIndex = 0;

        let autoPlayTimer = null;


        /* ==================================================
           NUMBER OF VISIBLE CARDS
        ================================================== */

        const getVisibleSlides = () => {

            if (
                window.matchMedia(
                    '(max-width: 600px)'
                ).matches
            ) {
                return 1;
            }


            if (
                window.matchMedia(
                    '(max-width: 900px)'
                ).matches
            ) {
                return 2;
            }


            return 3;
        };


        /* ==================================================
           MAXIMUM SLIDE INDEX
        ================================================== */

        const getMaximumIndex = () => {

            return Math.max(
                0,
                slides.length -
                getVisibleSlides()
            );

        };


        /* ==================================================
           CREATE DOTS
        ================================================== */

        const createDots = () => {

            dotsContainer.innerHTML = '';

            const maximumIndex =
                getMaximumIndex();


            for (
                let index = 0;
                index <= maximumIndex;
                index += 1
            ) {

                const dot =
                    document.createElement(
                        'button'
                    );

                dot.type = 'button';

                dot.className =
                    'speaking-testimonials__dot';

                dot.setAttribute(
                    'aria-label',
                    `Show testimonial group ${
                        index + 1
                    }`
                );

                dot.dataset.index = index;


                dot.addEventListener(
                    'click',
                    () => {

                        currentIndex =
                            index;

                        updateSlider();

                        restartAutoPlay();

                    }
                );


                dotsContainer.appendChild(
                    dot
                );

            }

        };


        /* ==================================================
           UPDATE ACTIVE DOT
        ================================================== */

        const updateDots = () => {

            const dots = Array.from(
                dotsContainer.querySelectorAll(
                    '.speaking-testimonials__dot'
                )
            );


            dots.forEach(
                (dot, index) => {

                    dot.classList.toggle(
                        'is-active',
                        index === currentIndex
                    );

                }
            );

        };


        /* ==================================================
           MOVE SLIDER
        ================================================== */

        const updateSlider = () => {

            const maximumIndex =
                getMaximumIndex();


            if (
                currentIndex >
                maximumIndex
            ) {
                currentIndex =
                    maximumIndex;
            }


            if (
                currentIndex < 0
            ) {
                currentIndex = 0;
            }


            const firstSlide =
                slides[0];


            if (!firstSlide) {
                return;
            }


            const slideWidth =
                firstSlide.getBoundingClientRect()
                    .width;


            const computedStyle =
                window.getComputedStyle(
                    track
                );


            const gap =
                parseFloat(
                    computedStyle.columnGap ||
                    computedStyle.gap ||
                    0
                );


            const distance =
                currentIndex *
                (slideWidth + gap);


            track.style.transform =
                `translateX(-${distance}px)`;


            updateDots();

        };


        /* ==================================================
           NEXT
        ================================================== */

        const nextSlide = () => {

            const maximumIndex =
                getMaximumIndex();


            if (
                currentIndex >=
                maximumIndex
            ) {

                currentIndex = 0;

            } else {

                currentIndex += 1;

            }


            updateSlider();

        };


        /* ==================================================
           PREVIOUS
        ================================================== */

        const previousSlide = () => {

            const maximumIndex =
                getMaximumIndex();


            if (
                currentIndex <= 0
            ) {

                currentIndex =
                    maximumIndex;

            } else {

                currentIndex -= 1;

            }


            updateSlider();

        };


        /* ==================================================
           AUTOPLAY
        ================================================== */

        const stopAutoPlay = () => {

            if (
                autoPlayTimer !== null
            ) {

                window.clearInterval(
                    autoPlayTimer
                );

                autoPlayTimer = null;

            }

        };


        const startAutoPlay = () => {

            stopAutoPlay();


            if (
                slides.length <=
                getVisibleSlides()
            ) {
                return;
            }


            autoPlayTimer =
                window.setInterval(
                    nextSlide,
                    5500
                );

        };


        const restartAutoPlay = () => {

            stopAutoPlay();
            startAutoPlay();

        };


        /* ==================================================
           BUTTONS
        ================================================== */

        if (previousButton) {

            previousButton.addEventListener(
                'click',
                () => {

                    previousSlide();
                    restartAutoPlay();

                }
            );

        }


        if (nextButton) {

            nextButton.addEventListener(
                'click',
                () => {

                    nextSlide();
                    restartAutoPlay();

                }
            );

        }


        /* ==================================================
           PAUSE ON HOVER
        ================================================== */

        slider.addEventListener(
            'mouseenter',
            stopAutoPlay
        );


        slider.addEventListener(
            'mouseleave',
            startAutoPlay
        );


        /* ==================================================
           KEYBOARD ACCESS
        ================================================== */

        slider.addEventListener(
            'keydown',
            (event) => {

                if (
                    event.key ===
                    'ArrowRight'
                ) {

                    nextSlide();
                    restartAutoPlay();

                }


                if (
                    event.key ===
                    'ArrowLeft'
                ) {

                    previousSlide();
                    restartAutoPlay();

                }

            }
        );


        /* ==================================================
           WINDOW RESIZE
        ================================================== */

        let resizeTimer;


        window.addEventListener(
            'resize',
            () => {

                window.clearTimeout(
                    resizeTimer
                );


                resizeTimer =
                    window.setTimeout(
                        () => {

                            currentIndex = 0;

                            createDots();
                            updateSlider();
                            restartAutoPlay();

                        },
                        150
                    );

            }
        );


        /* ==================================================
           INITIALIZE
        ================================================== */

        createDots();

        updateSlider();

        startAutoPlay();

    });

});