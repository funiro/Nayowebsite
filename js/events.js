// Initialize FullCalendar
document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar');
    
    if (calendarEl) {
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: 'events.php',
            eventClick: function(info) {
                window.location.href = 'event-details.html?id=' + info.event.id;
            }
        });
        
        calendar.render();
    }
});

// Event filtering
const categoryFilter = document.getElementById('category-filter');
const statusFilter = document.getElementById('status-filter');
const eventsList = document.getElementById('events-list');

if (categoryFilter && statusFilter && eventsList) {
    categoryFilter.addEventListener('change', filterEvents);
    statusFilter.addEventListener('change', filterEvents);

    async function filterEvents() {
        try {
            const response = await fetch('events.php?category=' + categoryFilter.value + '&status=' + statusFilter.value);
            const events = await response.json();
            displayEvents(events);
        } catch (error) {
            console.error('Error filtering events:', error);
        }
    }

    function displayEvents(events) {
        eventsList.innerHTML = '';
        events.forEach(event => {
            const eventCard = createEventCard(event);
            eventsList.appendChild(eventCard);
        });
    }

    function createEventCard(event) {
        const card = document.createElement('div');
        card.className = 'event-card';
        
        card.innerHTML = `
            <div class="event-image">
                <img src="${event.image}" alt="${event.title}">
            </div>
            <div class="event-content">
                <h3>${event.title}</h3>
                <div class="event-meta">
                    <span><i class="fas fa-calendar"></i> ${formatDate(event.date)}</span>
                    <span><i class="fas fa-clock"></i> ${event.time}</span>
                    <span><i class="fas fa-map-marker-alt"></i> ${event.location}</span>
                </div>
                <p class="event-description">${event.description}</p>
                ${event.rsvp ? '<button class="btn primary" onclick="showRSVPForm(' + event.id + ')">RSVP Now</button>' : ''}
            </div>
        `;
        
        return card;
    }

    function formatDate(dateString) {
        const date = new Date(dateString);
        return date.toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
    }
}

// RSVP Form Handling
function showRSVPForm(eventId) {
    const modal = document.getElementById('rsvp-modal');
    const form = document.getElementById('rsvp-form');
    
    if (modal && form) {
        form.dataset.eventId = eventId;
        modal.style.display = 'block';
    }
}

document.getElementById('rsvp-form')?.addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const eventId = formData.get('eventId');
    
    try {
        const response = await fetch('php/rsvp.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(Object.fromEntries(formData))
        });
        
        const result = await response.json();
        
        if (result.success) {
            alert('RSVP submitted successfully!');
            document.getElementById('rsvp-modal').style.display = 'none';
            this.reset();
        } else {
            alert(result.message || 'Error submitting RSVP');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Error submitting RSVP. Please try again.');
    }
});

// Close RSVP modal
document.getElementById('close-rsvp')?.addEventListener('click', function() {
    document.getElementById('rsvp-modal').style.display = 'none';
});

// Event Details Page
document.addEventListener('DOMContentLoaded', function() {
    const eventId = new URLSearchParams(window.location.search).get('id');
    
    if (eventId) {
        fetchEventDetails(eventId);
    }
});

async function fetchEventDetails(eventId) {
    try {
        const response = await fetch(`events.php?id=${eventId}`);
        const event = await response.json();
        
        if (event) {
            populateEventDetails(event);
        }
    } catch (error) {
        console.error('Error fetching event details:', error);
    }
}

function populateEventDetails(event) {
    document.getElementById('event-title').textContent = event.title;
    document.getElementById('event-date').textContent = formatDate(event.date);
    document.getElementById('event-time').textContent = event.time;
    document.getElementById('event-location').textContent = event.location;
    document.getElementById('event-description').innerHTML = event.description;
    document.getElementById('event-highlights').innerHTML = createHighlightsHTML(event.highlights);
    document.getElementById('participation-steps').innerHTML = createStepsHTML(event.steps);
    document.getElementById('items-to-bring').innerHTML = createItemsHTML(event.items);
    
    // Set up social sharing
    setupSocialSharing(event);
}

function createHighlightsHTML(highlights) {
    return highlights.map(highlight => `
        <li>
            <i class="fas fa-check-circle"></i>
            ${highlight}
        </li>
    `).join('');
}

function createStepsHTML(steps) {
    return steps.map((step, index) => `
        <li>
            <span class="step-number">${index + 1}</span>
            ${step}
        </li>
    `).join('');
}

function createItemsHTML(items) {
    return items.map(item => `
        <li>
            <i class="fas fa-check"></i>
            ${item}
        </li>
    `).join('');
}

function setupSocialSharing(event) {
    const url = window.location.href;
    const title = event.title;
    const description = event.description;
    
    document.getElementById('share-facebook')?.addEventListener('click', function() {
        window.open(
            `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}&title=${encodeURIComponent(title)}`,
            '_blank'
        );
    });

    document.getElementById('share-twitter')?.addEventListener('click', function() {
        window.open(
            `https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${encodeURIComponent(description)}`,
            '_blank'
        );
    });

    document.getElementById('share-whatsapp')?.addEventListener('click', function() {
        window.open(
            `https://wa.me/?text=${encodeURIComponent(description + '\n' + url)}`,
            '_blank'
        );
    });
}

// Mobile Menu Toggle
document.getElementById('mobile-menu-toggle')?.addEventListener('click', function() {
    document.querySelector('.nav-links').classList.toggle('active');
});
