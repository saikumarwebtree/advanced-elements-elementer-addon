document.addEventListener('DOMContentLoaded', function () {
    const elements = document.querySelectorAll('.animate-on-scroll');

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const animation = el.getAttribute('data-animation') || '';
                const delay = el.getAttribute('data-delay') || '0s';

                el.style.animationDelay = delay;
                el.classList.add('animate__animated', animation);

                observer.unobserve(el); // remove this if you want to allow repeated animations
            }
        });
    }, {
        threshold: 0.1
    });

    elements.forEach(el => observer.observe(el));
});
