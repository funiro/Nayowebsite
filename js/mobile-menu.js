/**
 * Mobile Menu Functionality for NAYO Website
 */
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu elements
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const navLinks = document.querySelector('.nav-links');
    const body = document.body;
    
    // Toggle mobile menu
    if (mobileMenuToggle && navLinks) {
        mobileMenuToggle.addEventListener('click', function(e) {
            e.preventDefault();
            this.classList.toggle('active');
            navLinks.classList.toggle('active');
            body.classList.toggle('menu-open');
            
            // Toggle aria-expanded attribute
            const isExpanded = this.getAttribute('aria-expanded') === 'true' || false;
            this.setAttribute('aria-expanded', !isExpanded);
            
            // Toggle aria-label for better screen reader feedback
            this.setAttribute(
                'aria-label', 
                isExpanded ? 'Open main menu' : 'Close main menu'
            );
        });
    }
    
    // Handle dropdown toggles on mobile
    const dropdownToggles = document.querySelectorAll('.dropdown > a');
    dropdownToggles.forEach(toggle => {
        // Add click handler for mobile
        toggle.addEventListener('click', function(e) {
            if (window.innerWidth <= 768) {
                e.preventDefault();
                const parent = this.parentElement;
                const isActive = parent.classList.contains('active');
                
                // Close all other dropdowns
                document.querySelectorAll('.dropdown').forEach(dropdown => {
                    if (dropdown !== parent) {
                        dropdown.classList.remove('active');
                    }
                });
                
                // Toggle current dropdown
                parent.classList.toggle('active', !isActive);
            }
        });
        
        // Add keyboard navigation
        toggle.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.click();
            }
        });
    });
    
    // Close menu when clicking outside
    document.addEventListener('click', function(e) {
        if (window.innerWidth <= 768 && 
            !e.target.closest('.nav-links') && 
            !e.target.closest('.mobile-menu-toggle') &&
            navLinks.classList.contains('active')) {
            mobileMenuToggle.click();
        }
    });
    
    // Close menu when window is resized to desktop
    function handleResize() {
        if (window.innerWidth > 768) {
            if (mobileMenuToggle) mobileMenuToggle.classList.remove('active');
            if (navLinks) navLinks.classList.remove('active');
            body.classList.remove('menu-open');
        }
    }
    
    // Debounce resize handler
    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(handleResize, 250);
    });
    
    // Initialize ARIA attributes
    if (mobileMenuToggle) {
        mobileMenuToggle.setAttribute('aria-expanded', 'false');
        mobileMenuToggle.setAttribute('aria-label', 'Open main menu');
        mobileMenuToggle.setAttribute('aria-controls', 'main-navigation');
    }
    
    if (navLinks) {
        navLinks.id = 'main-navigation';
    }
    
    // Add focus styles for keyboard navigation
    document.addEventListener('keydown', function(e) {
        // Only run for tab key
        if (e.key !== 'Tab') return;
        
        // Add focus-visible class to body when keyboard is used
        document.body.classList.add('using-keyboard');
    });
    
    // Remove focus styles when mouse is used
    document.addEventListener('mousedown', function() {
        document.body.classList.remove('using-keyboard');
    });
});
