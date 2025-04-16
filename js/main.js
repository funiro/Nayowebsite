// Mobile Menu Toggle
const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
const navLinks = document.querySelector('.nav-links');

if (mobileMenuToggle) {
    mobileMenuToggle.addEventListener('click', () => {
        navLinks.classList.toggle('show');
    });
}

// Hero Slider
class HeroSlider {
    constructor() {
        this.slider = document.querySelector('.slider');
        this.slides = document.querySelectorAll('.slide');
        this.dots = document.querySelectorAll('.dot');
        this.prevBtn = document.querySelector('.prev');
        this.nextBtn = document.querySelector('.next');
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
        this.slides.forEach(slide => slide.classList.remove('active'));
        this.dots.forEach(dot => dot.classList.remove('active'));

        // Add active class to current slide and dot
        this.slides[index].classList.add('active');
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
        this.autoPlayInterval = setInterval(() => this.nextSlide(), this.autoPlayDelay);
    }

    stopAutoPlay() {
        clearInterval(this.autoPlayInterval);
    }
}

// Contact Form
class ContactForm {
    constructor() {
        this.form = document.querySelector('.contact-form');
        this.modal = document.querySelector('.contact-form-modal');
        this.closeBtn = document.querySelector('.close-modal');
        this.submitBtn = document.querySelector('.submit-btn');

        this.init();
    }

    init() {
        if (!this.form) return;

        // Open modal
        this.form.addEventListener('submit', (e) => {
            e.preventDefault();
            this.openModal();
        });

        // Close modal
        if (this.closeBtn) {
            this.closeBtn.addEventListener('click', () => this.closeModal());
        }

        // Close on outside click
        this.modal.addEventListener('click', (e) => {
            if (e.target === this.modal) {
                this.closeModal();
            }
        });

        // Handle form submission
        if (this.submitBtn) {
            this.submitBtn.addEventListener('click', () => this.handleSubmit());
        }
    }

    openModal() {
        this.modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    closeModal() {
        this.modal.classList.remove('active');
        document.body.style.overflow = '';
    }

    async handleSubmit() {
        const formData = new FormData(this.form);
        const data = Object.fromEntries(formData.entries());

        try {
            this.submitBtn.classList.add('loading');
            
            // Send email using EmailJS
            const response = await emailjs.send(
                "service_id", // Replace with your EmailJS service ID
                "template_id", // Replace with your EmailJS template ID
                {
                    from_name: data.name,
                    from_email: data.email,
                    message: data.message,
                    to_email: "nayomalawi@gmail.com"
                }
            );

            if (response.status === 200) {
                alert('Message sent successfully!');
                this.form.reset();
                this.closeModal();
            }
        } catch (error) {
            console.error('Error sending message:', error);
            alert('Failed to send message. Please try again.');
        } finally {
            this.submitBtn.classList.remove('loading');
        }
    }
}

// Initialize components when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new HeroSlider();
    new ContactForm();
    
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
}); 