<?php
// Start session first thing
session_start();
$page_title = "Events | Nancholi Youth Organization";
// Include dynamic base URL configuration

?>

<?php include_once 'includes/header.php'; ?>

<main class="events-content">
    <section class="events-hero">
        <div class="hero-content">
            <h1>NAYO Events</h1>
            <p>Join us in making a difference in our community through various events and activities.</p>
        </div>
    </section>

    <section class="events-filter">
        <div class="filter-container">
            <select id="categoryFilter" class="filter-select">
                <option value="">All Categories</option>
            </select>
            <select id="statusFilter" class="filter-select">
                <option value="">All Status</option>
                <option value="upcoming">Upcoming</option>
                <option value="past">Past</option>
            </select>
        </div>
    </section>

    <section class="events-grid">
        <div id="eventsContainer" class="events-container">
            <!-- Events will be dynamically loaded here -->
        </div>
    </section>
</main>

<link rel="stylesheet" href="<?php echo $base_url; ?>/css/events.css">
<script>
document.addEventListener('DOMContentLoaded', function() {
    const eventsContainer = document.getElementById('eventsContainer');
    const categoryFilter = document.getElementById('categoryFilter');
    const statusFilter = document.getElementById('statusFilter');

    // Load categories
    fetch('events.php?categories=true')
        .then(response => response.json())
        .then(data => {
            data.categories.forEach(category => {
                const option = document.createElement('option');
                option.value = category;
                option.textContent = category;
                categoryFilter.appendChild(option);
            });
        });

    // Function to load events
    function loadEvents() {
        const category = categoryFilter.value;
        const status = statusFilter.value;
        const url = `events.php?category=${category}&status=${status}`;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                eventsContainer.innerHTML = '';
                data.events.forEach(event => {
                    const eventCard = document.createElement('div');
                    eventCard.className = 'event-card';
                    eventCard.innerHTML = `
                        <div class="event-image">
                            <img src="${event.image}" alt="${event.title}">
                            <div class="event-category">${event.category}</div>
                        </div>
                        <div class="event-details">
                            <h3>${event.title}</h3>
                            <div class="event-info">
                                <p><i class="fas fa-calendar"></i> ${event.date}</p>
                                <p><i class="fas fa-clock"></i> ${event.time}</p>
                                <p><i class="fas fa-map-marker-alt"></i> ${event.location}</p>
                            </div>
                            <p class="event-description">${event.description}</p>
                            ${event.rsvp ? '<button class="rsvp-btn">RSVP</button>' : ''}
                        </div>
                    `;
                    eventsContainer.appendChild(eventCard);
                });
            });
    }

    // Load events on page load and when filters change
    loadEvents();
    categoryFilter.addEventListener('change', loadEvents);
    statusFilter.addEventListener('change', loadEvents);
});
</script>

<?php include_once 'includes/footer.php'; ?>
