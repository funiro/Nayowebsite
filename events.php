<?php
session_start();
$page_title = "Events | Nancholi Youth Organization (NAYO)";

// Include base URL configuration
require_once 'base_url.php';

// Include header
include_once 'includes/header.php';

// Add events.css stylesheet
echo '<link rel="stylesheet" href="' . $base_url . '/css/events.css">';

// Sample categories - in production, these would come from a database
$categories = [
    'Community',
    'Health',
    'Fundraising',
    'Training',
    'Volunteer',
    'Education',
    'Outreach'
];

// Sample events data - in production, this would come from a database
$events = [
    [
        'id' => 1,
        'title' => 'Christmas for the Elderly',
        'date' => '2025-12-25',
        'time' => '10:00 - 16:00',
        'location' => 'Nancholi Community Center',
        'image' => 'images/christmas-events.jpg',
        'category' => 'Community',
        'description' => 'Join us for a heartwarming celebration as we bring the joy of Christmas to our elderly community members.',
        'status' => 'upcoming',
        'rsvp' => true
    ],
    [
        'id' => 2,
        'title' => 'Youth Health Fair',
        'date' => '2025-06-15',
        'time' => '09:00 - 15:00',
        'location' => 'NAYO Health Center',
        'image' => 'images/health-fair.jpg',
        'category' => 'Health',
        'description' => 'Annual health fair providing free medical check-ups and health education for youth.',
        'status' => 'upcoming',
        'rsvp' => true
    ],
    [
        'id' => 3,
        'title' => 'Annual Fundraiser Gala',
        'date' => '2025-08-12',
        'time' => '19:00 - 23:00',
        'location' => 'Blantyre Convention Center',
        'image' => 'images/gala.jpg',
        'category' => 'Fundraising',
        'description' => 'Join us for an evening of entertainment and support for NAYO programs.',
        'status' => 'upcoming',
        'rsvp' => true
    ],
    [
        'id' => 4,
        'title' => 'Palliative Care Training',
        'date' => '2025-07-05',
        'time' => '08:30 - 17:00',
        'location' => 'NAYO Training Room',
        'image' => 'images/training.jpg',
        'category' => 'Training',
        'description' => 'Professional training for healthcare workers in palliative care.',
        'status' => 'upcoming',
        'rsvp' => true
    ],
    [
        'id' => 5,
        'title' => 'Youth Leadership Workshop',
        'date' => '2025-06-20',
        'time' => '09:00 - 16:00',
        'location' => 'NAYO Community Hall',
        'image' => 'images/leadership.jpg',
        'category' => 'Education',
        'description' => 'Empower young leaders with skills for community development.',
        'status' => 'upcoming',
        'rsvp' => true
    ],
    [
        'id' => 6,
        'title' => 'HIV/AIDS Awareness Walk',
        'date' => '2025-07-15',
        'time' => '07:00 - 11:00',
        'location' => 'Blantyre City Center',
        'image' => 'images/awareness.jpg',
        'category' => 'Health',
        'description' => 'Join our community walk to raise awareness about HIV/AIDS prevention.',
        'status' => 'upcoming',
        'rsvp' => true
    ],
    [
        'id' => 7,
        'title' => 'School Supplies Drive',
        'date' => '2025-06-01',
        'time' => '09:00 - 16:00',
        'location' => 'NAYO Office',
        'image' => 'images/school-supplies.jpg',
        'category' => 'Outreach',
        'description' => 'Donate school supplies to support local students.',
        'status' => 'upcoming',
        'rsvp' => true
    ],
    [
        'id' => 8,
        'title' => 'Community Garden Launch',
        'date' => '2025-06-10',
        'time' => '10:00 - 13:00',
        'location' => 'Nancholi Community Garden',
        'image' => 'images/community-garden.jpg',
        'category' => 'Community',
        'description' => 'Help us launch our new community garden project.',
        'status' => 'upcoming',
        'rsvp' => true
    ],
    [
        'id' => 9,
        'title' => 'Antenatal Care Workshop',
        'date' => '2025-06-25',
        'time' => '09:00 - 12:00',
        'location' => 'NAYO Health Center',
        'image' => 'images/antenatal.jpg',
        'category' => 'Health',
        'description' => 'Educational workshop for expectant mothers.',
        'status' => 'upcoming',
        'rsvp' => true
    ],
    [
        'id' => 10,
        'title' => 'Youth Sports Tournament',
        'date' => '2025-07-01',
        'time' => '14:00 - 18:00',
        'location' => 'NAYO Sports Field',
        'image' => 'images/sports.jpg',
        'category' => 'Community',
        'description' => 'Annual sports tournament promoting healthy living among youth.',
        'status' => 'upcoming',
        'rsvp' => true
    ],
    [
        'id' => 11,
        'title' => 'Nutrition Education Program',
        'date' => '2025-07-10',
        'time' => '09:00 - 12:00',
        'location' => 'NAYO Training Room',
        'image' => 'images/nutrition.jpg',
        'category' => 'Health',
        'description' => 'Learn about healthy eating and nutrition.',
        'status' => 'upcoming',
        'rsvp' => true
    ],
    [
        'id' => 12,
        'title' => 'Volunteer Orientation',
        'date' => '2025-06-15',
        'time' => '14:00 - 16:00',
        'location' => 'NAYO Office',
        'image' => 'images/volunteer.jpg',
        'category' => 'Volunteer',
        'description' => 'Join us for our volunteer orientation session.',
        'status' => 'upcoming',
        'rsvp' => true
    ],
    [
        'id' => 13,
        'title' => 'Art Therapy Workshop',
        'date' => '2025-07-20',
        'time' => '10:00 - 13:00',
        'location' => 'NAYO Art Studio',
        'image' => 'images/art-therapy.jpg',
        'category' => 'Community',
        'description' => 'Creative therapy session for community members.',
        'status' => 'upcoming',
        'rsvp' => true
    ],
    [
        'id' => 14,
        'title' => 'Career Guidance Seminar',
        'date' => '2025-06-30',
        'time' => '14:00 - 17:00',
        'location' => 'NAYO Conference Room',
        'image' => 'images/career.jpg',
        'category' => 'Education',
        'description' => 'Learn about career opportunities and development.',
        'status' => 'upcoming',
        'rsvp' => true
    ],
    [
        'id' => 15,
        'title' => 'Community Clean-Up',
        'date' => '2025-06-28',
        'time' => '08:00 - 11:00',
        'location' => 'Nancholi Area',
        'image' => 'images/clean-up.jpg',
        'category' => 'Outreach',
        'description' => 'Join us in keeping our community clean and healthy.',
        'status' => 'upcoming',
        'rsvp' => true
    ],
    [
        'id' => 16,
        'title' => 'Youth Mentorship Program',
        'date' => '2025-07-05',
        'time' => '16:00 - 18:00',
        'location' => 'NAYO Community Hall',
        'image' => 'images/mentorship.jpg',
        'category' => 'Education',
        'description' => 'Monthly mentorship sessions for young people.',
        'status' => 'upcoming',
        'rsvp' => true
    ],
    [
        'id' => 17,
        'title' => 'Health Screening Camp',
        'date' => '2025-07-12',
        'time' => '09:00 - 15:00',
        'location' => 'NAYO Health Center',
        'image' => 'images/health-screening.jpg',
        'category' => 'Health',
        'description' => 'Free health screenings for community members.',
        'status' => 'upcoming',
        'rsvp' => true
    ],
    [
        'id' => 18,
        'title' => 'Youth Entrepreneurship Workshop',
        'date' => '2025-07-18',
        'time' => '10:00 - 14:00',
        'location' => 'NAYO Training Room',
        'image' => 'images/entrepreneurship.jpg',
        'category' => 'Education',
        'description' => 'Learn about starting and managing a business.',
        'status' => 'upcoming',
        'rsvp' => true
    ],
    [
        'id' => 19,
        'title' => 'Community Theater Performance',
        'date' => '2025-07-25',
        'time' => '19:00 - 21:00',
        'location' => 'NAYO Community Hall',
        'image' => 'images/theater.jpg',
        'category' => 'Community',
        'description' => 'Enjoy a community theater performance.',
        'status' => 'upcoming',
        'rsvp' => true
    ],
    [
        'id' => 20,
        'title' => 'Annual Report Launch',
        'date' => '2025-08-01',
        'time' => '14:00 - 16:00',
        'location' => 'NAYO Conference Room',
        'image' => 'images/annual-report.jpg',
        'category' => 'Education',
        'description' => 'Presentation of our annual achievements and plans.',
        'status' => 'upcoming',
        'rsvp' => true
    ]
];

// Get query parameters
$category = $_GET['category'] ?? '';
$status = $_GET['status'] ?? '';
$search = $_GET['search'] ?? '';

// Filter events based on parameters
$filteredEvents = array_filter($events, function($event) use ($category, $status, $search) {
    $matches = true;
    
    if ($category && $event['category'] !== $category) {
        $matches = false;
    }
    
    if ($status && $event['status'] !== strtolower($status)) {
        $matches = false;
    }
    
    if ($search) {
        $search = strtolower($search);
        if (strpos(strtolower($event['title']), $search) === false && 
            strpos(strtolower($event['description']), $search) === false) {
            $matches = false;
        }
    }
    
    return $matches;
});

// Get unique categories from events
$allCategories = array_values(array_unique(array_merge($categories, array_column($events, 'category'))));
?>

<main class="events-page">
    <section class="page-header">
        <h1>Upcoming Events</h1>
        <p>Join us for our upcoming events and activities in the community</p>
    </section>

    <div class="events-container">
        <aside class="events-sidebar">
            <div class="events-filter">
                <h3>Filter Events</h3>
                <form method="get" action="" class="filter-form">
                    <div class="form-group">
                        <input type="text" name="search" placeholder="Search events..." value="<?php echo htmlspecialchars($search); ?>">
                    </div>
                    
                    <div class="form-group">
                        <select name="category">
                            <option value="">All Categories</option>
                            <?php foreach ($allCategories as $cat): ?>
                                <option value="<?php echo htmlspecialchars($cat); ?>" <?php echo $category === $cat ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($cat); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <select name="status">
                            <option value="">All Statuses</option>
                            <option value="upcoming" <?php echo $status === 'upcoming' ? 'selected' : ''; ?>>Upcoming</option>
                            <option value="past" <?php echo $status === 'past' ? 'selected' : ''; ?>>Past Events</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn">Apply Filters</button>
                    <?php if ($category || $status || $search): ?>
                        <a href="events.php" class="btn btn-outline">Clear Filters</a>
                    <?php endif; ?>
                </form>
            </div>
        </aside>

        <div class="events-list">
            <?php if (empty($filteredEvents)): ?>
                <div class="no-events">
                    <p>No events found matching your criteria.</p>
                    <a href="events.php" class="btn">View All Events</a>
                </div>
            <?php else: ?>
                <?php foreach ($filteredEvents as $event): ?>
                    <article class="event-card">
                        <div class="event-image">
                            <img src="<?php echo $base_url . '/' . htmlspecialchars($event['image']); ?>" alt="<?php echo htmlspecialchars($event['title']); ?>">
                            <span class="event-category"><?php echo htmlspecialchars($event['category']); ?></span>
                        </div>
                        <div class="event-details">
                            <div class="event-date">
                                <span class="day"><?php echo date('d', strtotime($event['date'])); ?></span>
                                <span class="month"><?php echo date('M', strtotime($event['date'])); ?></span>
                            </div>
                            <div class="event-info">
                                <h3><?php echo htmlspecialchars($event['title']); ?></h3>
                                <div class="event-meta">
                                    <span><i class="fas fa-clock"></i> <?php echo htmlspecialchars($event['time']); ?></span>
                                    <span><i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($event['location']); ?></span>
                                </div>
                                <p><?php echo htmlspecialchars($event['description']); ?></p>
                                <div class="event-actions">
                                    <?php if ($event['rsvp']): ?>
                                        <a href="#" class="btn">RSVP Now</a>
                                    <?php endif; ?>
                                    <a href="#" class="btn btn-outline">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php include_once 'includes/footer.php'; ?>
