// Mobile Menu Toggle
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const navLinks = document.querySelector('.nav-links');
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

    if (mobileMenuToggle && navLinks) {
        // Toggle mobile menu
        mobileMenuToggle.addEventListener('click', (e) => {
            e.stopPropagation();
            navLinks.classList.toggle('active');
            mobileMenuToggle.classList.toggle('active');
            document.body.classList.toggle('menu-open');
            
            // Toggle hamburger icon
            const icon = mobileMenuToggle.querySelector('i');
            if (navLinks.classList.contains('active')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!navLinks.contains(e.target) && !mobileMenuToggle.contains(e.target)) {
                navLinks.classList.remove('active');
                mobileMenuToggle.classList.remove('active');
                document.body.classList.remove('menu-open');
                
                // Reset hamburger icon
                const icon = mobileMenuToggle.querySelector('i');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });

        // Handle dropdowns in mobile menu
        dropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', (e) => {
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    e.stopPropagation();
                    const dropdown = toggle.parentElement;
                    
                    // Close all other dropdowns
                    dropdownToggles.forEach(otherToggle => {
                        if (otherToggle !== toggle) {
                            const otherDropdown = otherToggle.parentElement;
                            otherDropdown.classList.remove('active');
                        }
                    });
                    
                    // Toggle current dropdown
                    dropdown.classList.toggle('active');
                }
            });
        });

        // Close mobile menu when clicking a regular link (not dropdown toggle)
        document.querySelectorAll('.nav-links a:not(.dropdown-toggle)').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 768) {
                    navLinks.classList.remove('active');
                    mobileMenuToggle.classList.remove('active');
                    document.body.classList.remove('menu-open');
                    
                    // Reset hamburger icon
                    const icon = mobileMenuToggle.querySelector('i');
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
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

    // Gallery functionality
    const gallery = document.querySelector('.gallery');
    const prevBtn = document.querySelector('.gallery-prev');
    const nextBtn = document.querySelector('.gallery-next');
    let currentIndex = 0;
    let touchStartX = 0;
    let touchEndX = 0;

    function updateGallery() {
        galleryItems.forEach((item, index) => {
            item.style.transform = `translateX(${(index - currentIndex) * 100}%)`;
        });
        
        // Update button states
        prevBtn.disabled = currentIndex === 0;
        nextBtn.disabled = currentIndex === galleryItems.length - 1;
    }

    // Navigation buttons
    prevBtn.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateGallery();
        }
    });

    nextBtn.addEventListener('click', () => {
        if (currentIndex < galleryItems.length - 1) {
            currentIndex++;
            updateGallery();
        }
    });

    // Touch events for mobile swipe
    gallery.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
    });

    gallery.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    });

    function handleSwipe() {
        const swipeThreshold = 50;
        const swipeDistance = touchEndX - touchStartX;

        if (Math.abs(swipeDistance) > swipeThreshold) {
            if (swipeDistance > 0 && currentIndex > 0) {
                // Swipe right
                currentIndex--;
            } else if (swipeDistance < 0 && currentIndex < galleryItems.length - 1) {
                // Swipe left
                currentIndex++;
            }
            updateGallery();
        }
    }

    // Initialize gallery
    updateGallery();

    // Gallery functionality for Antinatal and Youth Friendly
    const antinatalGallery = document.querySelector('.antinatal-gallery');
    const antinatalItems = document.querySelectorAll('.antinatal-gallery-item');
    const antinatalPrevBtn = document.querySelector('.antinatal-gallery-prev');
    const antinatalNextBtn = document.querySelector('.antinatal-gallery-next');
    let antinatalCurrentIndex = 0;
    let antinatalTouchStartX = 0;
    let antinatalTouchEndX = 0;

    // Youth Friendly Gallery
    const youthGallery = document.querySelector('.youth-friendly-gallery');
    const youthItems = document.querySelectorAll('.youth-friendly-gallery-item');
    const youthPrevBtn = document.querySelector('.youth-friendly-gallery-prev');
    const youthNextBtn = document.querySelector('.youth-friendly-gallery-next');
    let youthCurrentIndex = 0;
    let youthTouchStartX = 0;
    let youthTouchEndX = 0;

    // Antinatal Gallery Functions
    function updateAntinatalGallery() {
        antinatalItems.forEach((item, index) => {
            item.style.transform = `translateX(${(index - antinatalCurrentIndex) * 100}%)`;
        });
        
        // Update button states
        if (antinatalPrevBtn) antinatalPrevBtn.disabled = antinatalCurrentIndex === 0;
        if (antinatalNextBtn) antinatalNextBtn.disabled = antinatalCurrentIndex === antinatalItems.length - 1;
    }

    // Youth Friendly Gallery Functions
    function updateYouthGallery() {
        youthItems.forEach((item, index) => {
            item.style.transform = `translateX(${(index - youthCurrentIndex) * 100}%)`;
        });
        
        // Update button states
        if (youthPrevBtn) youthPrevBtn.disabled = youthCurrentIndex === 0;
        if (youthNextBtn) youthNextBtn.disabled = youthCurrentIndex === youthItems.length - 1;
    }

    // Antinatal Gallery Event Listeners
    if (antinatalPrevBtn) {
        antinatalPrevBtn.addEventListener('click', () => {
            if (antinatalCurrentIndex > 0) {
                antinatalCurrentIndex--;
                updateAntinatalGallery();
            }
        });
    }

    if (antinatalNextBtn) {
        antinatalNextBtn.addEventListener('click', () => {
            if (antinatalCurrentIndex < antinatalItems.length - 1) {
                antinatalCurrentIndex++;
                updateAntinatalGallery();
            }
        });
    }

    // Youth Friendly Gallery Event Listeners
    if (youthPrevBtn) {
        youthPrevBtn.addEventListener('click', () => {
            if (youthCurrentIndex > 0) {
                youthCurrentIndex--;
                updateYouthGallery();
            }
        });
    }

    if (youthNextBtn) {
        youthNextBtn.addEventListener('click', () => {
            if (youthCurrentIndex < youthItems.length - 1) {
                youthCurrentIndex++;
                updateYouthGallery();
            }
        });
    }

    // Antinatal Touch Events
    if (antinatalGallery) {
        antinatalGallery.addEventListener('touchstart', (e) => {
            antinatalTouchStartX = e.changedTouches[0].screenX;
        });

        antinatalGallery.addEventListener('touchend', (e) => {
            antinatalTouchEndX = e.changedTouches[0].screenX;
            handleAntinatalSwipe();
        });
    }

    // Youth Friendly Touch Events
    if (youthGallery) {
        youthGallery.addEventListener('touchstart', (e) => {
            youthTouchStartX = e.changedTouches[0].screenX;
        });

        youthGallery.addEventListener('touchend', (e) => {
            youthTouchEndX = e.changedTouches[0].screenX;
            handleYouthSwipe();
        });
    }

    function handleAntinatalSwipe() {
        const swipeThreshold = 50;
        const swipeDistance = antinatalTouchEndX - antinatalTouchStartX;

        if (Math.abs(swipeDistance) > swipeThreshold) {
            if (swipeDistance > 0 && antinatalCurrentIndex > 0) {
                // Swipe right
                antinatalCurrentIndex--;
            } else if (swipeDistance < 0 && antinatalCurrentIndex < antinatalItems.length - 1) {
                // Swipe left
                antinatalCurrentIndex++;
            }
            updateAntinatalGallery();
        }
    }

    function handleYouthSwipe() {
        const swipeThreshold = 50;
        const swipeDistance = youthTouchEndX - youthTouchStartX;

        if (Math.abs(swipeDistance) > swipeThreshold) {
            if (swipeDistance > 0 && youthCurrentIndex > 0) {
                // Swipe right
                youthCurrentIndex--;
            } else if (swipeDistance < 0 && youthCurrentIndex < youthItems.length - 1) {
                // Swipe left
                youthCurrentIndex++;
            }
            updateYouthGallery();
        }
    }

    // Initialize galleries
    if (antinatalItems.length > 0) updateAntinatalGallery();
    if (youthItems.length > 0) updateYouthGallery();
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