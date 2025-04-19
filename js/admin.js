// Admin Dashboard Functionality
document.addEventListener('DOMContentLoaded', function() {
    // Initialize dashboard
    initDashboard();
    
    // Handle modal functionality
    setupModals();
    
    // Handle form submissions
    setupForms();
});

function initDashboard() {
    // Update statistics
    updateStats();
    
    // Load initial content
    loadEvents();
    loadNews();
}

function updateStats() {
    // In a real implementation, this would fetch data from a server
    const stats = {
        events: 5,
        news: 8,
        media: 12
    };
    
    document.querySelectorAll('.stat-number').forEach(stat => {
        const type = stat.dataset.type;
        if (stats[type]) {
            stat.textContent = stats[type];
        }
    });
}

function loadEvents() {
    // In a real implementation, this would fetch events from a server
    const events = [
        {
            id: 1,
            title: 'Christmas for the Elderly',
            date: '2025-12-25',
            location: 'Nancholi Community Center',
            status: 'active'
        },
        // Add more events as needed
    ];
    
    const tbody = document.querySelector('#events-table tbody');
    tbody.innerHTML = '';
    
    events.forEach(event => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${event.title}</td>
            <td>${formatDate(event.date)}</td>
            <td>${event.location}</td>
            <td><span class="status ${event.status}">${event.status}</span></td>
            <td>
                <button class="btn-edit" onclick="editEvent(${event.id})">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn-delete" onclick="deleteEvent(${event.id})">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        `;
        tbody.appendChild(row);
    });
}

function loadNews() {
    // In a real implementation, this would fetch news from a server
    const news = [
        {
            id: 1,
            title: 'NAYO Launches New Youth Program',
            category: 'Programs',
            date: '2025-01-15',
            status: 'active'
        },
        // Add more news items as needed
    ];
    
    const tbody = document.querySelector('#news-table tbody');
    tbody.innerHTML = '';
    
    news.forEach(item => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${item.title}</td>
            <td>${item.category}</td>
            <td>${formatDate(item.date)}</td>
            <td><span class="status ${item.status}">${item.status}</span></td>
            <td>
                <button class="btn-edit" onclick="editNews(${item.id})">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn-delete" onclick="deleteNews(${item.id})">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        `;
        tbody.appendChild(row);
    });
}

function setupModals() {
    // Event modal buttons
    document.querySelectorAll('[data-modal]').forEach(button => {
        button.addEventListener('click', function() {
            const modalId = this.dataset.modal;
            openModal(modalId);
        });
    });
    
    // Close modal buttons
    document.querySelectorAll('.close-modal').forEach(button => {
        button.addEventListener('click', function() {
            const modal = this.closest('.modal');
            closeModal(modal);
        });
    });
    
    // Close modal when clicking outside
    document.querySelectorAll('.modal').forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal(this);
            }
        });
    });
}

function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'block';
        document.body.style.overflow = 'hidden';
    }
}

function closeModal(modal) {
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
}

function setupForms() {
    // Event form
    const eventForm = document.getElementById('event-form');
    if (eventForm) {
        eventForm.addEventListener('submit', function(e) {
            e.preventDefault();
            // In a real implementation, this would send data to a server
            console.log('Event form submitted:', new FormData(this));
            closeModal(this.closest('.modal'));
            loadEvents(); // Refresh the events list
        });
    }
    
    // News form
    const newsForm = document.getElementById('news-form');
    if (newsForm) {
        newsForm.addEventListener('submit', function(e) {
            e.preventDefault();
            // In a real implementation, this would send data to a server
            console.log('News form submitted:', new FormData(this));
            closeModal(this.closest('.modal'));
            loadNews(); // Refresh the news list
        });
    }
}

function editEvent(id) {
    // In a real implementation, this would fetch event data from a server
    console.log('Editing event:', id);
    openModal('event-modal');
}

function deleteEvent(id) {
    if (confirm('Are you sure you want to delete this event?')) {
        // In a real implementation, this would send a delete request to a server
        console.log('Deleting event:', id);
        loadEvents(); // Refresh the events list
    }
}

function editNews(id) {
    // In a real implementation, this would fetch news data from a server
    console.log('Editing news:', id);
    openModal('news-modal');
}

function deleteNews(id) {
    if (confirm('Are you sure you want to delete this news item?')) {
        // In a real implementation, this would send a delete request to a server
        console.log('Deleting news:', id);
        loadNews(); // Refresh the news list
    }
}

function formatDate(dateString) {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(dateString).toLocaleDateString(undefined, options);
} 