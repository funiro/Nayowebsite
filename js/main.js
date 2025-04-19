// Mobile Menu Toggle
const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
const navLinks = document.querySelector('.nav-links');
const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

if (mobileMenuToggle) {
    mobileMenuToggle.addEventListener('click', () => {
        navLinks.classList.toggle('active');
        mobileMenuToggle.classList.toggle('active');
    });
}

// Handle dropdowns in mobile menu
dropdownToggles.forEach(toggle => {
    toggle.addEventListener('click', (e) => {
        if (window.innerWidth <= 768) { // Only for mobile screens
            e.preventDefault();
            const dropdown = toggle.parentElement;
            dropdown.classList.toggle('active');
            
            // Close other dropdowns
            dropdownToggles.forEach(otherToggle => {
                if (otherToggle !== toggle) {
                    otherToggle.parentElement.classList.remove('active');
                }
            });
        }
    });
});

// Close mobile menu when clicking outside
document.addEventListener('click', (e) => {
    if (window.innerWidth <= 768) { // Only for mobile screens
        if (!navLinks.contains(e.target) && !mobileMenuToggle.contains(e.target)) {
            navLinks.classList.remove('active');
            mobileMenuToggle.classList.remove('active');
            dropdownToggles.forEach(toggle => {
                toggle.parentElement.classList.remove('active');
            });
        }
    }
});

// Close mobile menu when clicking a link
const navLinksItems = document.querySelectorAll('.nav-links a');
navLinksItems.forEach(link => {
    link.addEventListener('click', () => {
        if (window.innerWidth <= 768) { // Only for mobile screens
            navLinks.classList.remove('active');
            mobileMenuToggle.classList.remove('active');
            dropdownToggles.forEach(toggle => {
                toggle.parentElement.classList.remove('active');
            });
        }
    });
});

// Hero Slider
class HeroSlider {
    constructor() {
        this.slider = document.querySelector('.slider');
        this.slides = document.querySelectorAll('.slide');
        this.dots = document.querySelectorAll('.dot');
        this.prevBtn = document.querySelector('.slider-btn.prev');
        this.nextBtn = document.querySelector('.slider-btn.next');
        this.currentSlide = 0;
        this.slideCount = this.slides.length;
        this.autoPlayInterval = null;
        this.autoPlayDelay = 5000; // 5 seconds

        this.init();
    }

    init() {
        if (!this.slider) return;

        // Set initial slide
        this.showSlide(0);

        // Add event listeners
        if (this.prevBtn) {
            this.prevBtn.addEventListener('click', () => this.prevSlide());
        }
        if (this.nextBtn) {
            this.nextBtn.addEventListener('click', () => this.nextSlide());
        }
        this.dots.forEach((dot, index) => {
            dot.addEventListener('click', () => this.showSlide(index));
        });

        // Start autoplay
        this.startAutoPlay();

        // Pause autoplay on hover
        this.slider.addEventListener('mouseenter', () => this.stopAutoPlay());
        this.slider.addEventListener('mouseleave', () => this.startAutoPlay());
    }

    showSlide(index) {
        // Remove active class from all slides and dots
        this.slides.forEach(slide => {
            slide.classList.remove('active');
            slide.style.opacity = '0';
        });
        this.dots.forEach(dot => dot.classList.remove('active'));

        // Add active class to current slide and dot
        this.slides[index].classList.add('active');
        this.slides[index].style.opacity = '1';
        this.dots[index].classList.add('active');

        this.currentSlide = index;
    }

    prevSlide() {
        const index = (this.currentSlide - 1 + this.slideCount) % this.slideCount;
        this.showSlide(index);
    }

    nextSlide() {
        const index = (this.currentSlide + 1) % this.slideCount;
        this.showSlide(index);
    }

    startAutoPlay() {
        if (this.autoPlayInterval) {
            clearInterval(this.autoPlayInterval);
        }
        this.autoPlayInterval = setInterval(() => this.nextSlide(), this.autoPlayDelay);
    }

    stopAutoPlay() {
        if (this.autoPlayInterval) {
            clearInterval(this.autoPlayInterval);
            this.autoPlayInterval = null;
        }
    }
}

// Contact Form Functionality
const contactBtn = document.querySelector('.contact-btn');
const contactModal = document.querySelector('.contact-form-modal');
const closeModal = document.querySelector('.close-modal');
const contactForm = document.querySelector('.contact-form');

// Open modal
contactBtn.addEventListener('click', () => {
    contactModal.style.display = 'block';
    document.body.style.overflow = 'hidden';
    // Focus on first input when modal opens
    const firstInput = contactForm.querySelector('input, textarea');
    if (firstInput) firstInput.focus();
});

// Close modal
closeModal.addEventListener('click', () => {
    contactModal.style.display = 'none';
    document.body.style.overflow = '';
});

// Close modal when clicking outside
window.addEventListener('click', (e) => {
    if (e.target === contactModal) {
        contactModal.style.display = 'none';
        document.body.style.overflow = '';
    }
});

// Handle form submission
contactForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const formData = new FormData(contactForm);
    const submitBtn = contactForm.querySelector('.submit-btn');
    
    try {
        submitBtn.disabled = true;
        submitBtn.textContent = 'Sending...';
        
        // Here you would typically send the form data to your server
        // For now, we'll simulate a successful submission
        await new Promise(resolve => setTimeout(resolve, 1000));
        
        alert('Thank you for your message! We will get back to you soon.');
        contactForm.reset();
        contactModal.style.display = 'none';
        document.body.style.overflow = '';
        
    } catch (error) {
        alert('Sorry, there was an error sending your message. Please try again later.');
    } finally {
        submitBtn.disabled = false;
        submitBtn.textContent = 'Send Message';
    }
});

// Accessibility improvements
document.addEventListener('keydown', (e) => {
    // Close modal with Escape key
    if (e.key === 'Escape' && contactModal.style.display === 'block') {
        contactModal.style.display = 'none';
        document.body.style.overflow = '';
    }
});

// Add skip link functionality
const skipLink = document.createElement('a');
skipLink.href = '#main-content';
skipLink.className = 'skip-link';
skipLink.textContent = 'Skip to main content';
document.body.insertBefore(skipLink, document.body.firstChild);

// Add ARIA labels to form inputs
const formInputs = contactForm.querySelectorAll('input, textarea');
formInputs.forEach(input => {
    const label = input.previousElementSibling;
    if (label && label.tagName === 'LABEL') {
        input.setAttribute('aria-labelledby', label.id);
    }
});

// Initialize components when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new HeroSlider();
    
    // Initialize sponsor form if it exists
    if (document.getElementById('sponsor-form-modal')) {
        // Sponsor Form Modal Functions
        window.openSponsorForm = function() {
            document.getElementById('sponsor-form-modal').style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        window.closeSponsorForm = function() {
            document.getElementById('sponsor-form-modal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('sponsor-form-modal');
            if (event.target === modal) {
                closeSponsorForm();
            }
        }
    }

    // Lightbox functionality
    const galleryItems = document.querySelectorAll('.gallery-item');
    const lightboxModal = document.querySelector('.lightbox-modal');
    const lightboxImg = lightboxModal.querySelector('img');
    const lightboxClose = lightboxModal.querySelector('.lightbox-close');
    const lightboxPrev = lightboxModal.querySelector('.lightbox-prev');
    const lightboxNext = lightboxModal.querySelector('.lightbox-next');

    let currentImageIndex = 0;
    const images = [];

    // Initialize lightbox
    if (galleryItems.length > 0) {
        galleryItems.forEach((item, index) => {
            const img = item.querySelector('img');
            images.push({
                src: img.src,
                alt: img.alt
            });

            item.addEventListener('click', () => {
                currentImageIndex = index;
                updateLightbox();
                lightboxModal.classList.add('active');
            });
        });

        // Close lightbox
        lightboxClose.addEventListener('click', () => {
            lightboxModal.classList.remove('active');
        });

        // Close on click outside
        lightboxModal.addEventListener('click', (e) => {
            if (e.target === lightboxModal) {
                lightboxModal.classList.remove('active');
            }
        });

        // Navigation
        lightboxPrev.addEventListener('click', (e) => {
            e.stopPropagation();
            currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
            updateLightbox();
        });

        lightboxNext.addEventListener('click', (e) => {
            e.stopPropagation();
            currentImageIndex = (currentImageIndex + 1) % images.length;
            updateLightbox();
        });

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (lightboxModal.classList.contains('active')) {
                if (e.key === 'Escape') {
                    lightboxModal.classList.remove('active');
                } else if (e.key === 'ArrowLeft') {
                    currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
                    updateLightbox();
                } else if (e.key === 'ArrowRight') {
                    currentImageIndex = (currentImageIndex + 1) % images.length;
                    updateLightbox();
                }
            }
        });
    }

    function updateLightbox() {
        lightboxImg.src = images[currentImageIndex].src;
        lightboxImg.alt = images[currentImageIndex].alt;
    }

    // Gallery Slider
    const galleryGrids = document.querySelectorAll('.gallery-grid');
    
    galleryGrids.forEach(grid => {
        const items = grid.querySelectorAll('.gallery-item');
        const prevBtn = document.createElement('button');
        const nextBtn = document.createElement('button');
        
        prevBtn.className = 'gallery-nav-prev';
        nextBtn.className = 'gallery-nav-next';
        prevBtn.innerHTML = '❮';
        nextBtn.innerHTML = '❯';
        
        const navContainer = document.createElement('div');
        navContainer.className = 'gallery-nav';
        navContainer.appendChild(prevBtn);
        navContainer.appendChild(nextBtn);
        
        grid.parentNode.insertBefore(navContainer, grid.nextSibling);
        
        prevBtn.addEventListener('click', () => {
            grid.scrollBy({
                left: -300,
                behavior: 'smooth'
            });
        });
        
        nextBtn.addEventListener('click', () => {
            grid.scrollBy({
                left: 300,
                behavior: 'smooth'
            });
        });
        
        // Touch swipe functionality
        let touchStartX;
        let touchEndX;
        
        grid.addEventListener('touchstart', e => {
            touchStartX = e.changedTouches[0].screenX;
        });
        
        grid.addEventListener('touchend', e => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });
        
        function handleSwipe() {
            const swipeDistance = touchEndX - touchStartX;
            if (Math.abs(swipeDistance) > 50) {
                if (swipeDistance > 0) {
                    grid.scrollBy({
                        left: -300,
                        behavior: 'smooth'
                    });
                } else {
                    grid.scrollBy({
                        left: 300,
                        behavior: 'smooth'
                    });
                }
            }
        }
    });
}); 

function openSponsorForm() {
    const modal = document.getElementById('sponsor-modal');
    modal.style.display = 'block';
    document.body.style.overflow = 'hidden'; // Prevent scrolling when modal is open
}

function closeSponsorForm() {
    const modal = document.getElementById('sponsor-modal');
    modal.style.display = 'none';
    document.body.style.overflow = 'auto'; // Restore scrolling
}

// Close modal when clicking outside the modal content
window.addEventListener('click', function(event) {
    const modal = document.getElementById('sponsor-modal');
    if (event.target === modal) {
        closeSponsorForm();
    }
}); 