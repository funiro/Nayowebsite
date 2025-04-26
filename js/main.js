// Mobile Menu Toggle
const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
const navLinks = document.querySelector('.nav-links');
const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

mobileMenuToggle.addEventListener('click', () => {
    navLinks.classList.toggle('active');
    mobileMenuToggle.classList.toggle('active');
    document.body.classList.toggle('menu-open');
});

// Close mobile menu when clicking outside
document.addEventListener('click', (e) => {
    if (!navLinks.contains(e.target) && !mobileMenuToggle.contains(e.target)) {
        navLinks.classList.remove('active');
        mobileMenuToggle.classList.remove('active');
        document.body.classList.remove('menu-open');
    }
});

// Handle dropdowns in mobile menu
dropdownToggles.forEach(toggle => {
    toggle.addEventListener('click', (e) => {
        if (window.innerWidth <= 768) {
            e.preventDefault();
            const dropdown = toggle.parentElement;
            dropdown.classList.toggle('active');
        }
    });
});

// Close mobile menu when clicking a link
document.querySelectorAll('.nav-links a').forEach(link => {
    link.addEventListener('click', () => {
        if (window.innerWidth <= 768) {
            navLinks.classList.remove('active');
            mobileMenuToggle.classList.remove('active');
            document.body.classList.remove('menu-open');
        }
    });
});

// Handle window resize
window.addEventListener('resize', function() {
    if (window.innerWidth > 768) {
        navLinks.classList.remove('active');
        mobileMenuToggle.classList.remove('active');
        document.body.classList.remove('menu-open');
        dropdownToggles.forEach(toggle => {
            const dropdown = toggle.parentElement;
            dropdown.classList.remove('active');
        });
        // Reset hamburger icon
        const icon = mobileMenuToggle.querySelector('i');
        icon.classList.remove('fa-times');
        icon.classList.add('fa-bars');
    }
});

// Hero Slider
class HeroSlider {
    constructor() {
        this.slides = document.querySelectorAll('.hero-slide');
        this.prevBtn = document.querySelector('.prev-slide');
        this.nextBtn = document.querySelector('.next-slide');
        this.dots = document.querySelectorAll('.slider-dot');
        this.currentSlide = 0;
        this.slideInterval = null;
        this.init();
    }

    init() {
        if (this.slides.length === 0) return;
        
        // Show first slide
        this.showSlide(0);
        
        // Add event listeners
        if (this.prevBtn) {
            this.prevBtn.addEventListener('click', () => this.prevSlide());
        }
        if (this.nextBtn) {
            this.nextBtn.addEventListener('click', () => this.nextSlide());
        }
        
        // Add dot event listeners
        this.dots.forEach((dot, index) => {
            dot.addEventListener('click', () => this.showSlide(index));
        });

        // Start autoplay
        this.startAutoplay();
    }

    showSlide(index) {
        // Hide all slides
        this.slides.forEach(slide => {
            slide.style.display = 'none';
            slide.classList.remove('active');
        });
        
        // Remove active class from all dots
        this.dots.forEach(dot => dot.classList.remove('active'));
        
        // Show current slide
        this.slides[index].style.display = 'block';
        this.slides[index].classList.add('active');
        
        // Add active class to current dot
        this.dots[index].classList.add('active');
        
        this.currentSlide = index;
    }

    prevSlide() {
        let newIndex = this.currentSlide - 1;
        if (newIndex < 0) {
            newIndex = this.slides.length - 1;
        }
        this.showSlide(newIndex);
    }

    nextSlide() {
        let newIndex = this.currentSlide + 1;
        if (newIndex >= this.slides.length) {
            newIndex = 0;
        }
        this.showSlide(newIndex);
    }

    startAutoplay() {
        this.slideInterval = setInterval(() => {
            this.nextSlide();
        }, 5000); // Change slide every 5 seconds
    }

    stopAutoplay() {
        if (this.slideInterval) {
            clearInterval(this.slideInterval);
        }
    }
}

// Initialize slider when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    console.log('DOM loaded, initializing slider...');
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