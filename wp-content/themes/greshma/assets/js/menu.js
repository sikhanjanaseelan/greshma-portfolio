document.addEventListener("DOMContentLoaded", () => {
    const header = document.querySelector("#site-header");
    const openButton = document.querySelector(".mobile-menu-toggle");
    const closeButton = document.querySelector(".mobile-menu-close");
    const mobileNavigation = document.querySelector(
        ".mobile-navigation"
    );
    const overlay = document.querySelector(
        ".mobile-menu-overlay"
    );

    /**
     * Sticky and scrolled header
     */
    const updateHeader = () => {
        if (!header) {
            return;
        }

        if (window.scrollY > 40) {
            header.classList.add("is-scrolled");
        } else {
            header.classList.remove("is-scrolled");
        }


    };

    updateHeader();

    window.addEventListener("scroll", updateHeader, {
        passive: true,

        
    });

    /**
     * Open mobile menu
     */
    const openMobileMenu = () => {
        if (!mobileNavigation || !overlay || !openButton) {
            return;
        }

        mobileNavigation.classList.add("is-open");
        overlay.classList.add("is-visible");
        document.body.classList.add("mobile-menu-open");

        openButton.setAttribute("aria-expanded", "true");
        mobileNavigation.setAttribute("aria-hidden", "false");
        overlay.setAttribute("aria-hidden", "false");

        if (closeButton) {
            closeButton.focus();
        }
    };

    /**
     * Close mobile menu
     */
    const closeMobileMenu = () => {
        if (!mobileNavigation || !overlay || !openButton) {
            return;
        }

        mobileNavigation.classList.remove("is-open");
        overlay.classList.remove("is-visible");
        document.body.classList.remove("mobile-menu-open");

        openButton.setAttribute("aria-expanded", "false");
        mobileNavigation.setAttribute("aria-hidden", "true");
        overlay.setAttribute("aria-hidden", "true");
    };

    if (openButton) {
        openButton.addEventListener("click", openMobileMenu);
    }

    if (closeButton) {
        closeButton.addEventListener("click", closeMobileMenu);
    }

    if (overlay) {
        overlay.addEventListener("click", closeMobileMenu);
    }

    document.addEventListener("keydown", (event) => {
        if (event.key === "Escape") {
            closeMobileMenu();
        }
    });

    /**
     * Close mobile menu after clicking a link
     */
    const mobileLinks = document.querySelectorAll(
        ".mobile-menu a"
    );

    mobileLinks.forEach((link) => {
        link.addEventListener("click", () => {
            closeMobileMenu();
        });
    });

    /**
     * Reset menu when returning to desktop
     */
    window.addEventListener("resize", () => {
        if (window.innerWidth > 1240) {
            closeMobileMenu();
        }
    });
});