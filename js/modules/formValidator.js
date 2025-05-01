export class FormValidator {
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

        this.showFieldFeedback(field, isValid);
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
        const phoneRegex = /^\+?\d{1,15}$/;
        return phoneRegex.test(field.value);
    }

    hasMinLength(field, length) {
        return field.value.length >= parseInt(length);
    }

    hasMaxLength(field, length) {
        return field.value.length <= parseInt(length);
    }

    showFieldFeedback(field, isValid) {
        const feedback = field.nextElementSibling;
        if (isValid) {
            field.classList.remove('invalid');
            field.classList.add('valid');
            feedback?.classList.remove('visible');
        } else {
            field.classList.remove('valid');
            field.classList.add('invalid');
            feedback?.classList.add('visible');
        }
    }
}

// Loading states for interactive elements
export class LoadingIndicator {
    constructor(element) {
        this.element = element;
        this.loadingClass = 'loading';
        this.loadingText = 'Loading...';
    }

    show() {
        this.element.classList.add(this.loadingClass);
        this.element.textContent = this.loadingText;
    }

    hide() {
        this.element.classList.remove(this.loadingClass);
    }
}

// Keyboard navigation for accessibility
export class KeyboardNavigation {
    constructor() {
        this.setupEventListeners();
    }

    setupEventListeners() {
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Tab') {
                this.handleTabNavigation(e);
            } else if (e.key === 'Escape') {
                this.handleEscape(e);
            }
        });
    }

    handleTabNavigation(e) {
        const focusableElements = 'a[href], area[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), iframe, object, embed, [tabindex="0"], [contenteditable]';
        const focusable = document.querySelectorAll(focusableElements);
        const firstFocusable = focusable[0];
        const lastFocusable = focusable[focusable.length - 1];

        if (e.shiftKey) {
            if (document.activeElement === firstFocusable) {
                e.preventDefault();
                lastFocusable.focus();
            }
        } else {
            if (document.activeElement === lastFocusable) {
                e.preventDefault();
                firstFocusable.focus();
            }
        }
    }

    handleEscape(e) {
        const modal = document.querySelector('.modal.active');
        if (modal) {
            modal.classList.remove('active');
        }
    }
}

// ARIA labels for accessibility
export class AriaLabels {
    constructor() {
        this.setupAriaLabels();
    }

    setupAriaLabels() {
        // Add ARIA labels to buttons
        document.querySelectorAll('button').forEach(button => {
            if (!button.getAttribute('aria-label')) {
                button.setAttribute('aria-label', button.textContent);
            }
        });

        // Add ARIA labels to form elements
        document.querySelectorAll('input, select, textarea').forEach(field => {
            const label = field.previousElementSibling;
            if (label && label.tagName === 'LABEL') {
                field.setAttribute('aria-label', label.textContent);
            }
        });

        // Add ARIA roles to navigation
        const nav = document.querySelector('nav');
        if (nav) {
            nav.setAttribute('role', 'navigation');
        }
    }
}
