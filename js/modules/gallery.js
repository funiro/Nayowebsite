// Base gallery class
export class BaseGallery {
    constructor(containerSelector, options = {}) {
        this.container = document.querySelector(containerSelector);
        this.options = {
            ...{
                itemsSelector: '.gallery-item',
                prevSelector: '.gallery-prev',
                nextSelector: '.gallery-next',
                startIndex: 0,
                loop: true
            },
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

    update() {
        this.items.forEach((item, index) => {
            item.style.transform = `translateX(${index * 100}%)`;
        });
        this.scrollToCurrent();
    }

    scrollToCurrent() {
        this.container.style.transform = `translateX(-${this.currentIndex * 100}%)`;
    }

    next() {
        this.currentIndex = (this.currentIndex + 1) % this.items.length;
        this.scrollToCurrent();
    }

    previous() {
        this.currentIndex = (this.currentIndex - 1 + this.items.length) % this.items.length;
        this.scrollToCurrent();
    }
}

// Extend for specific gallery types
export class AntinatalGallery extends BaseGallery {
    constructor() {
        super('.antinatal-gallery', {
            itemsSelector: '.antinatal-item',
            prevSelector: '.antinatal-prev',
            nextSelector: '.antinatal-next'
        });
    }
}

export class YouthGallery extends BaseGallery {
    constructor() {
        super('.youth-gallery', {
            itemsSelector: '.youth-item',
            prevSelector: '.youth-prev',
            nextSelector: '.youth-next'
        });
    }
}

// Lightbox functionality
export class Lightbox {
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
        // Open lightbox
        document.querySelectorAll('.gallery-item img').forEach(img => {
            img.addEventListener('click', () => this.open(img));
        });

        // Close lightbox
        this.closeBtn?.addEventListener('click', () => this.close());
        this.modal?.addEventListener('click', (e) => {
            if (e.target === this.modal) {
                this.close();
            }
        });
    }

    open(img) {
        this.image?.setAttribute('src', img.src);
        this.caption?.textContent = img.alt;
        this.modal?.classList.add('active');
    }

    close() {
        this.modal?.classList.remove('active');
    }
}
