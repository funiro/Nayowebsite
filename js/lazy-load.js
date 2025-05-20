document.addEventListener('DOMContentLoaded', function() {
    // Select all images with data-src attribute
    const images = document.querySelectorAll('img[loading="lazy"]');

    // Create intersection observer
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                
                // Set src attribute if it's not already set
                if (!img.src && img.dataset.src) {
                    img.src = img.dataset.src;
                }

                // Add loaded class for fade-in effect
                img.classList.add('loaded');

                // Stop observing the image
                observer.unobserve(img);
            }
        });
    }, {
        rootMargin: '50px 0px',
        threshold: 0.1
    });

    // Start observing each image
    images.forEach(img => {
        // Only observe images that have a data-src attribute
        if (img.dataset.src) {
            imageObserver.observe(img);
        }
    });
});

