<?php
session_start();
$page_title = "Events | Nancholi Youth Organization (NAYO)";

// Include base URL configuration
require_once 'base_url.php';

// Include header
include_once 'includes/header.php';
?>

<!-- Add events.css stylesheet -->
<link rel="stylesheet" href="<?php echo $base_url; ?>/css/events.css">

<style>
    .events-news-page {
        padding: 40px 0;
    }
    
    .hero-banner {
        background: linear-gradient(rgba(0, 107, 65, 0.8), rgba(0, 107, 65, 0.9)), url(<?php echo $base_url; ?>/images/events/hero-bg.jpg);
        background-size: cover;
        background-position: center;
        color: white;
        padding: 100px 0;
        text-align: center;
        margin-bottom: 50px;
    }
    
    .hero-banner h1 {
        font-size: 3rem;
        margin-bottom: 20px;
        font-weight: 700;
    }
    
    .hero-banner p {
        font-size: 1.2rem;
        max-width: 800px;
        margin: 0 auto 30px;
    }
    
    .main-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    
    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f0f0f0;
    }
    
    .section-header h2 {
        color: #006b41;
        font-size: 1.8rem;
        margin: 0;
    }
    
    .view-all {
        color: #006b41;
        text-decoration: none;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 5px;
    }
    
    .view-all:hover {
        text-decoration: underline;
    }
    
    .event-card {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        margin-bottom: 30px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }
    
    .event-image {
        height: 200px;
        position: relative;
        overflow: hidden;
    }
    
    .event-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .event-card:hover .event-image img {
        transform: scale(1.05);
    }
    
    .event-category {
        position: absolute;
        top: 15px;
        right: 15px;
        background: #006b41;
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }
    
    .event-details {
        padding: 20px;
        display: flex;
        gap: 15px;
    }
    
    .event-date {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 15px;
        text-align: center;
        min-width: 80px;
    }
    
    .event-day {
        font-size: 2rem;
        font-weight: 700;
        color: #006b41;
        line-height: 1;
    }
    
    .event-month {
        font-size: 0.9rem;
        color: #666;
        text-transform: uppercase;
        font-weight: 600;
    }
    
    .event-info {
        flex: 1;
    }
    
    .event-info h3 {
        margin: 0 0 10px 0;
        font-size: 1.3rem;
        color: #333;
    }
    
    .event-meta {
        display: flex;
        gap: 15px;
        margin-bottom: 15px;
        color: #666;
        font-size: 0.9rem;
    }
    
    .event-meta i {
        color: #006b41;
        margin-right: 5px;
    }
    
    .btn-primary {
        display: inline-block;
        background: #006b41;
        color: white;
        padding: 8px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 600;
        transition: background 0.3s ease;
        border: none;
        cursor: pointer;
    }
    
    .btn-primary:hover {
        background: #005a36;
        color: white;
        text-decoration: none;
    }
    
    .events-section {
        max-width: 1000px;
        margin: 0 auto 50px;
    }
    
    /* Responsive Design */
    @media (max-width: 992px) {
        .main-container {
            flex-direction: column;
        }
        
        .events-section {
            width: 100%;
        }
    }
    
    @media (max-width: 768px) {
        .hero-banner {
            padding: 70px 0;
        }
        
        .hero-banner h1 {
            font-size: 2.2rem;
        }
        
        .event-details {
            flex-direction: column;
        }
        
        .event-date {
            align-self: flex-start;
            margin-bottom: 15px;
        }
    }
</style>

<main class="events-news-page">
    <!-- Hero Banner -->
    <section class="hero-banner">
        <div class="container">
            <h1>Upcoming Events</h1>
            <p>Join us at our upcoming events and activities</p>
        </div>
    </section>

    <div class="main-container">
        <!-- Events Section -->
        <section class="events-section">
            <div class="section-header">
                <h2>Upcoming Events</h2>
                <a href="<?php echo $base_url; ?>/events.php" class="view-all">View All <i class="fas fa-arrow-right"></i></a>
            </div>
            
            <!-- Event 1 -->
            <div class="event-card">
                <div class="event-image">
                    <img src="<?php echo $base_url; ?>/images/events/health-fair.jpg" alt="Youth Health Fair">
                    <span class="event-category">Health</span>
                </div>
                <div class="event-details">
                    <div class="event-date">
                        <span class="event-day">15</span>
                        <span class="event-month">JUN</span>
                    </div>
                    <div class="event-info">
                        <h3>Youth Health Fair</h3>
                        <div class="event-meta">
                            <span><i class="far fa-clock"></i> 9:00 AM - 3:00 PM</span>
                            <span><i class="fas fa-map-marker-alt"></i> NAYO Health Center</span>
                        </div>
                        <p>Annual health fair providing free medical check-ups and health education for youth.</p>
                        <a href="#" class="btn-primary">RSVP Now</a>
                    </div>
                </div>
            </div>

            <!-- Event 2 -->
            <div class="event-card">
                <div class="event-image">
                    <img src="<?php echo $base_url; ?>/images/events/leadership.jpg" alt="Youth Leadership Workshop">
                    <span class="event-category">Training</span>
                </div>
                <div class="event-details">
                    <div class="event-date">
                        <span class="event-day">22</span>
                        <span class="event-month">JUN</span>
                    </div>
                    <div class="event-info">
                        <h3>Youth Leadership Workshop</h3>
                        <div class="event-meta">
                            <span><i class="far fa-clock"></i> 10:00 AM - 2:00 PM</span>
                            <span><i class="fas fa-map-marker-alt"></i> Nancholi Community Hall</span>
                        </div>
                        <p>Interactive workshop to develop leadership skills among young people in our community.</p>
                        <a href="#" class="btn-primary">RSVP Now</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<?php include_once 'includes/footer.php'; ?>
