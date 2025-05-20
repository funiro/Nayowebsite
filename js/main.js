// Traditional JavaScript implementation
const BaseGallery = class {
    constructor(containerSelector, options = {}) {
        this.container = document.querySelector(containerSelector);
        this.options = {
            itemsSelector: '.gallery-item',
            prevSelector: '.gallery-prev',
            nextSelector: '.gallery-next',
            startIndex: 0,
            loop: true,
            ...options
        };

        if (!this.container) {
            console.error('Gallery container not found');
            return;
        }

        this.initialize();
    }

    initialize() {
        this.items = this.container.querySelectorAll(this.options.itemsSelector);
        this.prevBtn = this.container.querySelector(this.options.prevSelector);
        this.nextBtn = this.container.querySelector(this.options.nextSelector);
        this.currentIndex = this.options.startIndex;

        this.setupEventListeners();
    }

    setupEventListeners() {
        this.prevBtn?.addEventListener('click', () => this.previous());
        this.nextBtn?.addEventListener('click', () => this.next());

        // Touch support
        this.setupTouchEvents();

        // Window resize
        window.addEventListener('resize', () => this.update());
    }

    setupTouchEvents() {
        let touchStartX = 0;
        let touchEndX = 0;

        this.container.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        });

        this.container.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            const diff = touchStartX - touchEndX;
            if (Math.abs(diff) > 50) {
                if (diff > 0) {
                    this.next();
                } else {
                    this.previous();
                }
            }
        });
    }

    previous() {
        this.currentIndex = (this.currentIndex - 1 + this.items.length) % this.items.length;
        this.update();
    }

    next() {
        this.currentIndex = (this.currentIndex + 1) % this.items.length;
        this.update();
    }

    update() {
        this.items.forEach((item, index) => {
            item.style.transform = `translateX(${(index - this.currentIndex) * 100}%)`;
        });
    }
};

const AntinatalGallery = class extends BaseGallery {
    constructor() {
        super('.antinatal-gallery', {
            itemsSelector: '.antinatal-item',
            prevSelector: '.antinatal-prev',
            nextSelector: '.antinatal-next'
        });
    }
};

const YouthGallery = class extends BaseGallery {
    constructor() {
        super('.youth-gallery', {
            itemsSelector: '.youth-item',
            prevSelector: '.youth-prev',
            nextSelector: '.youth-next'
        });
    }
};

const Lightbox = class {
    constructor() {
        this.modal = document.querySelector('.lightbox-modal');
        this.closeBtn = this.modal?.querySelector('.close-lightbox');
        this.image = this.modal?.querySelector('.lightbox-image');
        this.caption = this.modal?.querySelector('.lightbox-caption');

        if (this.modal) {
            this.setupEventListeners();
        }
    }

    setupEventListeners() {
        if (this.closeBtn) {
            this.closeBtn.addEventListener('click', () => this.close());
        }

        window.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                this.close();
            }
        });
    }

    open(img) {
        if (this.modal) {
            this.image.src = img.src;
            this.caption.textContent = img.alt;
            this.modal.style.display = 'block';
        }
    }

    close() {
        if (this.modal) {
            this.modal.style.display = 'none';
        }
    }
};

// Form validation
const FormValidator = class {
    constructor(formSelector) {
        this.form = document.querySelector(formSelector);
        if (!this.form) {
            console.error('Form not found');
            return;
        }

        this.setupEventListeners();
    }

    setupEventListeners() {
        this.form.addEventListener('submit', (e) => {
            e.preventDefault();
            if (this.validate()) {
                this.form.submit();
            }
        });

        this.form.querySelectorAll('input, textarea, select').forEach(field => {
            field.addEventListener('input', () => this.validateField(field));
        });
    }

    validate() {
        let isValid = true;
        this.form.querySelectorAll('input, textarea, select').forEach(field => {
            if (!this.validateField(field)) {
                isValid = false;
            }
        });
        return isValid;
    }

    validateField(field) {
        const validationRules = {
            'required': this.isRequired,
            'email': this.isEmail,
            'phone': this.isPhone,
            'minlength': this.hasMinLength,
            'maxlength': this.hasMaxLength
        };

        let isValid = true;
        Object.keys(validationRules).forEach(rule => {
            const ruleValue = field.getAttribute(rule);
            if (ruleValue !== null) {
                isValid = validationRules[rule].call(this, field, ruleValue) && isValid;
            }
        });

        return isValid;
    }

    isRequired(field) {
        return field.value.trim() !== '';
    }

    isEmail(field) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(field.value);
    }

    isPhone(field) {
        const phoneRegex = /^[0-9\-\+\s]+$/;
        return phoneRegex.test(field.value);
    }

    hasMinLength(field, length) {
        return field.value.length >= parseInt(length);
    }

    hasMaxLength(field, length) {
        return field.value.length <= parseInt(length);
    }
};

// Mobile Menu Toggle
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const navLinks = document.querySelector('.nav-links');
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
    const hamburgerBars = document.querySelectorAll('.mobile-menu-toggle .bar');

    if (mobileMenuToggle && navLinks) {
        mobileMenuToggle.addEventListener('click', function() {
            navLinks.classList.toggle('active');
            mobileMenuToggle.classList.toggle('active');
            document.body.classList.toggle('menu-open');

            // Toggle ARIA attributes
            const isExpanded = navLinks.classList.contains('active');
            mobileMenuToggle.setAttribute('aria-expanded', isExpanded);
            navLinks.setAttribute('aria-hidden', !isExpanded);
        });
    }

    // Handle dropdowns in mobile view
    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            if (window.innerWidth <= 768) {
                e.preventDefault();
                const dropdown = this.closest('.dropdown');
                dropdown.classList.toggle('active');
            }
        });
    });

    // Close menu when clicking outside
    document.addEventListener('click', function(e) {
        if (navLinks.classList.contains('active') && 
            !e.target.closest('.main-nav')) {
            navLinks.classList.remove('active');
            mobileMenuToggle.classList.remove('active');
            document.body.classList.remove('menu-open');
        }
    });

    // Close menu on window resize
    window.addEventListener('resize', debounce(function() {
        if (window.innerWidth > 768) {
            navLinks.classList.remove('active');
            mobileMenuToggle.classList.remove('active');
            document.body.classList.remove('menu-open');
            document.querySelectorAll('.dropdown').forEach(dropdown => {
                dropdown.classList.remove('active');
            });
        }
    }));

    // Debounce function to limit execution of resize events
    function debounce(func, wait = 20, immediate = true) {
        let timeout;
        return function() {
            const context = this, args = arguments;
            const later = function() {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            const callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    }

    if (mobileMenuToggle && navLinks) {
        // Add ARIA attributes for accessibility
        mobileMenuToggle.setAttribute('aria-expanded', 'false');
        mobileMenuToggle.setAttribute('aria-controls', 'nav-links');
        navLinks.id = 'nav-links';

        // Toggle mobile menu with improved accessibility
        mobileMenuToggle.addEventListener('click', (e) => {
            e.stopPropagation();
            const isExpanded = navLinks.classList.contains('active');
            navLinks.classList.toggle('active');
            mobileMenuToggle.classList.toggle('active');
            document.body.classList.toggle('menu-open');
            mobileMenuToggle.setAttribute('aria-expanded', !isExpanded);
            
            // Add focus trap for keyboard navigation
            if (!isExpanded) {
                setTimeout(() => {
                    const firstFocusableElement = navLinks.querySelector('a');
                    if (firstFocusableElement) firstFocusableElement.focus();
                }, 100);
            }
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (navLinks.classList.contains('active') && 
                !navLinks.contains(e.target) && 
                !mobileMenuToggle.contains(e.target)) {
                navLinks.classList.remove('active');
                mobileMenuToggle.classList.remove('active');
                document.body.classList.remove('menu-open');
                mobileMenuToggle.setAttribute('aria-expanded', 'false');
                mobileMenuToggle.focus(); // Return focus to toggle button
            }
        });

        // Handle dropdowns in mobile menu with improved accessibility
        dropdownToggles.forEach(toggle => {
            // Add ARIA attributes
            const dropdown = toggle.parentElement;
            const dropdownMenu = dropdown.querySelector('.dropdown-menu');
            const dropdownId = `dropdown-${Math.random().toString(36).substr(2, 9)}`;
            dropdownMenu.id = dropdownId;
            toggle.setAttribute('aria-expanded', 'false');
            toggle.setAttribute('aria-controls', dropdownId);
            
            toggle.addEventListener('click', (e) => {
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    // Close all other dropdowns
                    dropdownToggles.forEach(otherToggle => {
                        if (otherToggle !== toggle) {
                            const otherDropdown = otherToggle.parentElement;
                            otherDropdown.classList.remove('active');
                            otherToggle.setAttribute('aria-expanded', 'false');
                        }
                    });
                    
                    // Toggle current dropdown
                    const isExpanded = dropdown.classList.contains('active');
                    dropdown.classList.toggle('active');
                    toggle.setAttribute('aria-expanded', !isExpanded);
                    
                    // Focus on first item in dropdown when opened
                    if (!isExpanded) {
                        setTimeout(() => {
                            const firstItem = dropdownMenu.querySelector('a');
                            if (firstItem) firstItem.focus();
                        }, 100);
                    }
                }
            });
            
            // Add keyboard navigation for dropdowns
            toggle.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    toggle.click();
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
                    mobileMenuToggle.setAttribute('aria-expanded', 'false');
                }
            });
        });

        // Handle window resize with debounce for better performance
        window.addEventListener('resize', debounce(function() {
            if (window.innerWidth > 768) {
                navLinks.classList.remove('active');
                mobileMenuToggle.classList.remove('active');
                document.body.classList.remove('menu-open');
                mobileMenuToggle.setAttribute('aria-expanded', 'false');
                
                dropdownToggles.forEach(toggle => {
                    const dropdown = toggle.parentElement;
                    dropdown.classList.remove('active');
                    toggle.setAttribute('aria-expanded', 'false');
                });
            }
        }, 100));
        
        // Add escape key support
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && navLinks.classList.contains('active')) {
                navLinks.classList.remove('active');
                mobileMenuToggle.classList.remove('active');
                document.body.classList.remove('menu-open');
                mobileMenuToggle.setAttribute('aria-expanded', 'false');
                mobileMenuToggle.focus();
            }
        });
    }
});

class HeroSlider {
    constructor() {
        this.slides = document.querySelectorAll('.hero-slide');
        this.dots = document.querySelectorAll('.slider-dots .dot');
        this.prevBtn = document.querySelector('.prev-slide');
        this.nextBtn = document.querySelector('.next-slide');
        this.currentIndex = 0;
        this.slideInterval = null;
        this.isTransitioning = false; // Prevent rapid transitions
        this.setupEventListeners();
        this.setupAccessibility();
        this.updateSlide(); // Initialize first slide
        this.startAutoplay();
        
        // Preload images for smoother transitions
        this.preloadImages();
    }
    
    preloadImages() {
        // Preload all slider images to prevent flickering during transitions
        this.slides.forEach(slide => {
            const img = slide.querySelector('img');
            if (img && img.src) {
                const preloadImg = new Image();
                preloadImg.src = img.src;
            }
        });
    }
    
    setupAccessibility() {
        // Add proper ARIA attributes for accessibility
        const sliderContainer = document.querySelector('.hero-slider');
        if (sliderContainer) {
            sliderContainer.setAttribute('aria-roledescription', 'carousel');
            sliderContainer.setAttribute('aria-live', 'polite');
        }
        
        // Add ARIA attributes to slides
        this.slides.forEach((slide, index) => {
            slide.setAttribute('role', 'group');
            slide.setAttribute('aria-roledescription', 'slide');
            slide.setAttribute('aria-label', `Slide ${index + 1} of ${this.slides.length}`);
            slide.setAttribute('aria-hidden', index === this.currentIndex ? 'false' : 'true');
        });
        
        // Add ARIA attributes to navigation buttons
        if (this.prevBtn) {
            this.prevBtn.setAttribute('aria-label', 'Previous slide');
            this.prevBtn.setAttribute('aria-controls', 'hero-slider');
        }
        if (this.nextBtn) {
            this.nextBtn.setAttribute('aria-label', 'Next slide');
            this.nextBtn.setAttribute('aria-controls', 'hero-slider');
        }
        
        // Add ARIA attributes to dots
        this.dots.forEach((dot, index) => {
            dot.setAttribute('role', 'button');
            dot.setAttribute('aria-label', `Go to slide ${index + 1}`);
            dot.setAttribute('aria-pressed', index === this.currentIndex ? 'true' : 'false');
            dot.setAttribute('tabindex', '0'); // Make focusable
        });
    }

    setupEventListeners() {
        // Navigation buttons with improved handling
        if (this.prevBtn) {
            this.prevBtn.addEventListener('click', (e) => {
                e.preventDefault();
                this.previous();
            });
        }
        if (this.nextBtn) {
            this.nextBtn.addEventListener('click', (e) => {
                e.preventDefault();
                this.next();
            });
        }
        
        // Dot navigation with improved accessibility
        this.dots.forEach((dot, index) => {
            // Mouse click
            dot.addEventListener('click', () => {
                this.goToSlide(index);
            });
            
            // Keyboard support
            dot.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    this.goToSlide(index);
                }
            });
        });
        
        // Touch support with improved handling
        this.setupTouchEvents();
        
        // Pause autoplay on hover or focus
        const heroSlider = document.querySelector('.hero-slider');
        if (heroSlider) {
            heroSlider.addEventListener('mouseenter', () => this.stopAutoplay());
            heroSlider.addEventListener('mouseleave', () => this.startAutoplay());
            heroSlider.addEventListener('focusin', () => this.stopAutoplay());
            heroSlider.addEventListener('focusout', () => this.startAutoplay());
        }
        
        // Add keyboard navigation
        document.addEventListener('keydown', (e) => {
            const sliderInView = this.isElementInViewport(heroSlider);
            if (!sliderInView) return;
            
            if (e.key === 'ArrowLeft') {
                e.preventDefault();
                this.previous();
            } else if (e.key === 'ArrowRight') {
                e.preventDefault();
                this.next();
            }
        });
        
        // Optimize for reduced motion preference
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
        if (prefersReducedMotion.matches) {
            this.stopAutoplay();
            // Use simpler transitions
            document.documentElement.style.setProperty('--slider-transition', 'none');
        }
    }
    
    isElementInViewport(el) {
        if (!el) return false;
        const rect = el.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    setupTouchEvents() {
        const heroSlider = document.querySelector('.hero-slider');
        if (!heroSlider) return;
        
        let touchStartX = 0;
        let touchEndX = 0;
        let touchStartY = 0;
        let touchEndY = 0;

        heroSlider.addEventListener('touchstart', (e) => {
            this.stopAutoplay();
            touchStartX = e.changedTouches[0].screenX;
            touchStartY = e.changedTouches[0].screenY;
        }, { passive: true });

        heroSlider.addEventListener('touchend', (e) => {
            if (this.isTransitioning) return;
            
            touchEndX = e.changedTouches[0].screenX;
            touchEndY = e.changedTouches[0].screenY;
            
            const diffX = touchStartX - touchEndX;
            const diffY = touchStartY - touchEndY;

            // Only handle horizontal swipes (prevent conflicts with vertical scrolling)
            if (Math.abs(diffX) > Math.abs(diffY) && Math.abs(diffX) > 50) {
                if (diffX > 0) {
                    this.next();
                } else {
                    this.previous();
                }
            }
            this.startAutoplay();
        }, { passive: true });
    }

    startAutoplay() {
        this.stopAutoplay(); // Clear any existing interval
        this.slideInterval = setInterval(() => {
            this.next();
        }, 6000); // Slightly longer interval for better user experience
    }

    stopAutoplay() {
        if (this.slideInterval) {
            clearInterval(this.slideInterval);
            this.slideInterval = null;
        }
    }
    
    goToSlide(index) {
        if (this.isTransitioning || index === this.currentIndex) return;
        this.stopAutoplay();
        this.currentIndex = index;
        this.updateSlide();
        this.startAutoplay();
    }

    next() {
        if (this.isTransitioning) return;
        this.currentIndex = (this.currentIndex + 1) % this.slides.length;
        this.updateSlide();
    }

    previous() {
        if (this.isTransitioning) return;
        this.currentIndex = (this.currentIndex - 1 + this.slides.length) % this.slides.length;
        this.updateSlide();
    }

    updateSlide() {
        if (this.isTransitioning) return;
        this.isTransitioning = true;
        
        // Update slides with better transitions
        this.slides.forEach((slide, index) => {
            // Update ARIA attributes
            slide.setAttribute('aria-hidden', index === this.currentIndex ? 'false' : 'true');
            
            if (index === this.currentIndex) {
                // Show current slide
                slide.style.display = 'block';
                slide.classList.add('active');
                
                // Use requestAnimationFrame for smoother transitions
                requestAnimationFrame(() => {
                    slide.style.opacity = 1;
                });
                
                // Announce slide change for screen readers
                const liveRegion = document.getElementById('slider-live-region') || 
                    this.createLiveRegion();
                liveRegion.textContent = `Showing slide ${index + 1} of ${this.slides.length}`;
            } else {
                // Hide other slides
                slide.style.opacity = 0;
                
                // Use a promise to ensure proper timing
                const transitionEnd = new Promise(resolve => {
                    setTimeout(resolve, 500); // Match CSS transition duration
                });
                
                transitionEnd.then(() => {
                    if (index !== this.currentIndex) { // Double-check it's still not active
                        slide.style.display = 'none';
                        slide.classList.remove('active');
                    }
                });
            }
        });
        
        // Update dots with ARIA states
        this.dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === this.currentIndex);
            dot.setAttribute('aria-pressed', index === this.currentIndex ? 'true' : 'false');
        });
        
        // Reset transition lock after animation completes
        setTimeout(() => {
            this.isTransitioning = false;
        }, 500);
    }
    
    createLiveRegion() {
        const liveRegion = document.createElement('div');
        liveRegion.id = 'slider-live-region';
        liveRegion.setAttribute('aria-live', 'polite');
        liveRegion.setAttribute('aria-atomic', 'true');
        liveRegion.classList.add('sr-only'); // Screen reader only
        document.body.appendChild(liveRegion);
        return liveRegion;
    }
}

// Initialize components when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    console.log('DOM loaded, initializing components...');
    
    // Initialize Hero Slider
    if (document.querySelector('.hero-slider')) {
        new HeroSlider();
        console.log('Hero slider initialized');
    }

    // Initialize Gallery
    if (document.querySelector('.gallery')) {
        const gallery = new BaseGallery('.gallery');
        console.log('Main gallery initialized');
    }

    // Initialize Antinatal Gallery
    if (document.querySelector('.antinatal-gallery')) {
        const antinatalGallery = new AntinatalGallery();
        console.log('Antinatal gallery initialized');
    }

    // Initialize Youth Gallery
    if (document.querySelector('.youth-gallery')) {
        const youthGallery = new YouthGallery();
        console.log('Youth gallery initialized');
    }

    // Initialize Lightbox
    if (document.querySelector('.lightbox-modal')) {
        const lightbox = new Lightbox();
        console.log('Lightbox initialized');
    }

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
    if (document.querySelector('.gallery')) {
        updateGallery();
    }

    // Gallery functionality for Antinatal and Youth Friendly
    if (document.querySelector('.antinatal-gallery')) {
        const antinatalPrevBtn = document.querySelector('.antinatal-prev');
        const antinatalNextBtn = document.querySelector('.antinatal-next');
        const antinatalItems = document.querySelectorAll('.antinatal-item');
        let antinatalCurrentIndex = 0;

        const updateAntinatalGallery = () => {
            antinatalItems.forEach((item, index) => {
                if (index === antinatalCurrentIndex) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        };

        // Update button states
        if (antinatalPrevBtn) antinatalPrevBtn.disabled = antinatalCurrentIndex === 0;
        if (antinatalNextBtn) antinatalNextBtn.disabled = antinatalCurrentIndex === antinatalItems.length - 1;

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

        // Touch support
        let antinatalTouchStartX = 0;
        let antinatalTouchEndX = 0;

        document.querySelector('.antinatal-gallery').addEventListener('touchstart', (e) => {
            antinatalTouchStartX = e.changedTouches[0].screenX;
        });

        document.querySelector('.antinatal-gallery').addEventListener('touchend', (e) => {
            antinatalTouchEndX = e.changedTouches[0].screenX;
            handleAntinatalSwipe();
        });

        function handleAntinatalSwipe() {
            const swipeThreshold = 50;
            const swipeDistance = antinatalTouchEndX - antinatalTouchStartX;

            if (Math.abs(swipeDistance) > swipeThreshold) {
                if (swipeDistance > 0 && antinatalCurrentIndex > 0) {
                    antinatalCurrentIndex--;
                } else if (swipeDistance < 0 && antinatalCurrentIndex < antinatalItems.length - 1) {
                    antinatalCurrentIndex++;
                }
                updateAntinatalGallery();
            }
        }

        // Initialize gallery
        updateAntinatalGallery();
    }

    // Youth Friendly Gallery Functions
    if (document.querySelector('.youth-gallery')) {
        const youthPrevBtn = document.querySelector('.youth-prev');
        const youthNextBtn = document.querySelector('.youth-next');
        const youthItems = document.querySelectorAll('.youth-item');
        let youthCurrentIndex = 0;

        const updateYouthGallery = () => {
            youthItems.forEach((item, index) => {
                if (index === youthCurrentIndex) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        };

        // Update button states
        if (youthPrevBtn) youthPrevBtn.disabled = youthCurrentIndex === 0;
        if (youthNextBtn) youthNextBtn.disabled = youthCurrentIndex === youthItems.length - 1;

        // Youth Gallery Event Listeners
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

        // Touch support
        let youthTouchStartX = 0;
        let youthTouchEndX = 0;

        document.querySelector('.youth-gallery').addEventListener('touchstart', (e) => {
            youthTouchStartX = e.changedTouches[0].screenX;
        });

        document.querySelector('.youth-gallery').addEventListener('touchend', (e) => {
            youthTouchEndX = e.changedTouches[0].screenX;
            handleYouthSwipe();
        });

        function handleYouthSwipe() {
            const swipeThreshold = 50;
            const swipeDistance = youthTouchEndX - youthTouchStartX;

            if (Math.abs(swipeDistance) > swipeThreshold) {
                if (swipeDistance > 0 && youthCurrentIndex > 0) {
                    youthCurrentIndex--;
                } else if (swipeDistance < 0 && youthCurrentIndex < youthItems.length - 1) {
                    youthCurrentIndex++;
                }
                updateYouthGallery();
            }
        }

        // Initialize gallery
        updateYouthGallery();
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

// Partners section navigation - Improved with better scrolling and accessibility
document.addEventListener('DOMContentLoaded', function() {
    // Get partner elements
    const partnersContainer = document.getElementById('partners-container');
    const prevButton = document.getElementById('partners-prev')?.querySelector('button');
    const nextButton = document.getElementById('partners-next')?.querySelector('button');
    
    if (!partnersContainer || !prevButton || !nextButton) return;
    
    // Add ARIA attributes for accessibility
    partnersContainer.setAttribute('aria-label', 'Our partners');
    prevButton.setAttribute('aria-label', 'Scroll to previous partners');
    nextButton.setAttribute('aria-label', 'Scroll to next partners');
    
    // Variables for smooth scrolling
    let isScrolling = false;
    const scrollAmount = 300; // Pixels to scroll each time
    const scrollDuration = 300; // Duration of scroll animation in ms
    
    // Smooth scroll function using requestAnimationFrame
    function smoothScroll(element, target, duration) {
        if (isScrolling) return;
        isScrolling = true;
        
        const start = element.scrollLeft;
        const change = target - start;
        const startTime = performance.now();
        
        function animateScroll(currentTime) {
            const elapsedTime = currentTime - startTime;
            if (elapsedTime >= duration) {
                element.scrollLeft = target;
                isScrolling = false;
                updateNavigation();
                return;
            }
            
            // Easing function for smoother animation
            const progress = elapsedTime / duration;
            const easeInOutCubic = progress < 0.5 
                ? 4 * progress * progress * progress 
                : 1 - Math.pow(-2 * progress + 2, 3) / 2;
                
            element.scrollLeft = start + change * easeInOutCubic;
            requestAnimationFrame(animateScroll);
        }
        
        requestAnimationFrame(animateScroll);
    }
    
    // Update navigation buttons visibility
    function updateNavigation() {
        const scrollLeft = partnersContainer.scrollLeft;
        const scrollWidth = partnersContainer.scrollWidth;
        const clientWidth = partnersContainer.clientWidth;
        const maxScroll = scrollWidth - clientWidth;
        
        // Show/hide buttons based on scroll position
        if (scrollLeft <= 10) { // Allow small margin of error
            prevButton.parentElement.classList.add('disabled');
            prevButton.setAttribute('aria-disabled', 'true');
        } else {
            prevButton.parentElement.classList.remove('disabled');
            prevButton.setAttribute('aria-disabled', 'false');
        }
        
        if (scrollLeft >= maxScroll - 10) { // Allow small margin of error
            nextButton.parentElement.classList.add('disabled');
            nextButton.setAttribute('aria-disabled', 'true');
        } else {
            nextButton.parentElement.classList.remove('disabled');
            nextButton.setAttribute('aria-disabled', 'false');
        }
    }
    
    // Previous button click handler
    prevButton.addEventListener('click', (e) => {
        e.preventDefault();
        const target = Math.max(0, partnersContainer.scrollLeft - scrollAmount);
        smoothScroll(partnersContainer, target, scrollDuration);
    });
    
    // Next button click handler
    nextButton.addEventListener('click', (e) => {
        e.preventDefault();
        const maxScroll = partnersContainer.scrollWidth - partnersContainer.clientWidth;
        const target = Math.min(maxScroll, partnersContainer.scrollLeft + scrollAmount);
        smoothScroll(partnersContainer, target, scrollDuration);
    });
    
    // Add keyboard navigation
    partnersContainer.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') {
            e.preventDefault();
            prevButton.click();
        } else if (e.key === 'ArrowRight') {
            e.preventDefault();
            nextButton.click();
        }
    });
    
    // Add touch support
    let touchStartX = 0;
    let touchEndX = 0;
    
    partnersContainer.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
    }, { passive: true });
    
    partnersContainer.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        const diff = touchStartX - touchEndX;
        
        if (Math.abs(diff) > 50) { // Minimum swipe distance
            if (diff > 0) {
                nextButton.click();
            } else {
                prevButton.click();
            }
        }
    }, { passive: true });
    
    // Update navigation when scrolling (with throttle for performance)
    let scrollTimeout;
    partnersContainer.addEventListener('scroll', () => {
        if (!scrollTimeout) {
            scrollTimeout = setTimeout(() => {
                updateNavigation();
                scrollTimeout = null;
            }, 100);
        }
    }, { passive: true });
    
    // Update on window resize (with debounce)
    let resizeTimeout;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            updateNavigation();
        }, 200);
    }, { passive: true });
    
    // Initial update
    updateNavigation();
    
    // Add auto-scrolling functionality for continuous display
    let autoScrollInterval;
    const partnerSection = partnersContainer.closest('.partners-section');
    
    function startAutoScroll() {
        stopAutoScroll(); // Clear any existing interval
        autoScrollInterval = setInterval(() => {
            // If we're at the end, go back to start
            if (partnersContainer.scrollLeft >= partnersContainer.scrollWidth - partnersContainer.clientWidth - 10) {
                smoothScroll(partnersContainer, 0, scrollDuration * 2);
            } else {
                // Otherwise scroll forward
                const target = Math.min(
                    partnersContainer.scrollWidth - partnersContainer.clientWidth,
                    partnersContainer.scrollLeft + 150
                );
                smoothScroll(partnersContainer, target, scrollDuration);
            }
        }, 5000); // Scroll every 5 seconds
    }
    
    function stopAutoScroll() {
        if (autoScrollInterval) {
            clearInterval(autoScrollInterval);
            autoScrollInterval = null;
        }
    }
    
    // Start/stop auto-scroll on hover
    if (partnerSection) {
        partnerSection.addEventListener('mouseenter', stopAutoScroll);
        partnerSection.addEventListener('mouseleave', startAutoScroll);
        partnerSection.addEventListener('touchstart', stopAutoScroll, { passive: true });
        partnerSection.addEventListener('touchend', () => {
            // Delay restart to avoid conflicts with manual touch navigation
            setTimeout(startAutoScroll, 1000);
        }, { passive: true });
    }
    
    // Start auto-scrolling after a delay
    setTimeout(startAutoScroll, 3000);
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

// FAQ Accordion functionality with accessibility improvements
document.addEventListener('DOMContentLoaded', function() {
    const faqItems = document.querySelectorAll('.faq-item');
    if (!faqItems.length) return;
    
    console.log('FAQ accordions initialized');
    
    faqItems.forEach((item, index) => {
        const question = item.querySelector('.faq-question');
        const answer = item.querySelector('.faq-answer');
        
        if (!question || !answer) return;
        
        // Set up ARIA attributes for accessibility
        const id = `faq-answer-${index}`;
        answer.id = id;
        question.setAttribute('aria-expanded', 'false');
        question.setAttribute('aria-controls', id);
        question.setAttribute('role', 'button');
        question.setAttribute('tabindex', '0');
        
        // Add initial state
        answer.style.maxHeight = '0';
        answer.style.overflow = 'hidden';
        answer.style.transition = 'max-height 0.3s ease-in-out, opacity 0.3s ease-in-out';
        answer.style.opacity = '0';
        
        // Toggle function with smooth animation
        const toggleAnswer = () => {
            const isExpanded = question.getAttribute('aria-expanded') === 'true';
            
            // Close all other FAQs first (accordion behavior)
            faqItems.forEach(otherItem => {
                const otherQuestion = otherItem.querySelector('.faq-question');
                const otherAnswer = otherItem.querySelector('.faq-answer');
                
                if (otherItem !== item && otherQuestion && otherAnswer) {
                    otherQuestion.setAttribute('aria-expanded', 'false');
                    otherAnswer.style.maxHeight = '0';
                    otherAnswer.style.opacity = '0';
                    otherItem.classList.remove('active');
                }
            });
            
            // Toggle current FAQ
            if (isExpanded) {
                question.setAttribute('aria-expanded', 'false');
                answer.style.maxHeight = '0';
                answer.style.opacity = '0';
                item.classList.remove('active');
            } else {
                question.setAttribute('aria-expanded', 'true');
                answer.style.maxHeight = answer.scrollHeight + 'px';
                answer.style.opacity = '1';
                item.classList.add('active');
            }
        };
        
        // Add click event listener
        question.addEventListener('click', toggleAnswer);
        
        // Add keyboard accessibility
        question.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                toggleAnswer();
            }
        });
        
        // Handle window resize to update max-height
        window.addEventListener('resize', () => {
            if (question.getAttribute('aria-expanded') === 'true') {
                answer.style.maxHeight = answer.scrollHeight + 'px';
            }
        });
    });
});