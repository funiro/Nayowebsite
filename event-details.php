<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details - NAYO Events</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="js/events.js"></script>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Nancholi Youth Organization (NAYO)",
      "alternateName": "NAYO",
      "url": "https://nayomalawi.org/",
      "logo": "https://nayomalawi.org/images/logo.png",
      "description": "NAYO is a leading NGO in Malawi providing healthcare services, youth development programs, HIV/AIDS care, palliative care, and educational support in Blantyre and surrounding areas.",
      "email": "info@nayomalawi.org",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "P.O. Box 1624",
        "addressLocality": "Blantyre",
        "addressCountry": "MW"
      },
      "contactPoint": {
        "@type": "ContactPoint",
        "contactType": "General Inquiries",
        "email": "info@nayomalawi.org"
      },
      "sameAs": [
        "https://www.linkedin.com/company/nancholi-youth-organisation-nayo/",
        "https://www.givey.com/nayoukschoolfundraiser20232024",
        "https://www.every.org/nancholi-youth-organization"
      ]
    }
    </script>
</head>
<body>
    <header>
        <nav class="main-nav">
            <div class="logo">
                <a href="index.php" class="logo-link">
                    <img src="images/logo.png" alt="NAYO Logo" class="logo-img">
                    <span class="tagline">One Heart,<br>One Community</span>
                </a>
            </div>
            <button class="mobile-menu-toggle">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="nav-links">
                <li><a href="index.php">HOME</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">PROJECTS</a>
                    <ul class="dropdown-menu">
                        <li><a href="art.php">ART</a></li>
                        <li><a href="antenatal.php">ANTENATAL CARE</a></li>
                        <li><a href="palliative.php">PALLIATIVE CARE</a></li>
                        <li><a href="student.php">STUDENT SUPPORT</a></li>
                        <li><a href="outreach.php">OUTREACH PROGRAMS</a></li>
                        <li><a href="youth.php">YOUTH FRIENDLY SERVICES</a></li>
                    </ul>
                </li>
                <li><a href="events.php">EVENTS</a></li>
                <li><a href="index.html#staff">STAFF</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">PARTNERS</a>
                    <ul class="dropdown-menu">
                        <li><a href="https://www.copred.org/" target="_blank">Copred</a></li>
                        <li><a href="https://www.foccad.org/" target="_blank">FOCCAD</a></li>
                        <li><a href="https://k2fasteners.ca/" target="_blank">K2 Fasteners</a></li>
                        <li><a href="https://luena.org/" target="_blank">Luena Foundation</a></li>
                        <li><a href="https://www.masanawaafrika.org/" target="_blank">Masana Wa Wafrika</a></li>
                        <li><a href="https://www.health.gov.mw" target="_blank">Malawi's Ministry of Health</a></li>
                        <li><a href="https://stephenlewisfoundation.org" target="_blank">Stephen Lewis Foundation</a></li>
                        <li><a href="https://www.unaids.org/en" target="_blank">UNAIDS</a></li>
                        <li><a href="https://www.givey.com/nayoukschoolfundraiser20232024" target="_blank">NAYO UK FUNDRAISERS</a></li>
                    </ul>
                </li>
                <li><a href="volunteer.php">VOLUNTEER</a></li>
                <li><a href="https://www.every.org/nancholi-youth-organization?search_meta=" class="donate-btn">Donate</a></li>
            </ul>
        </nav>
    </header>

    <main class="event-details-content">
        <section class="event-hero">
            <div class="event-hero-image">
                <img id="event-image" src="" alt="Event Image">
            </div>
            <div class="event-hero-content">
                <h1 id="event-title"></h1>
                <div class="event-meta">
                    <div class="event-date">
                        <span class="day"></span>
                        <span class="month"></span>
                        <span class="year"></span>
                    </div>
                    <div class="event-location">
                        <i class="fas fa-map-marker-alt"></i>
                        <span id="event-location"></span>
                    </div>
                </div>
            </div>
        </section>

        <section class="event-description">
            <div class="event-main-content">
                <h2>About the Event</h2>
                <div id="event-description"></div>
                
                <div class="event-details-grid">
                    <div class="event-detail">
                        <i class="fas fa-clock"></i>
                        <div>
                            <h3>Time</h3>
                            <p id="event-time"></p>
                        </div>
                    </div>
                    <div class="event-detail">
                        <i class="fas fa-users"></i>
                        <div>
                            <h3>Target Audience</h3>
                            <p id="event-audience"></p>
                        </div>
                    </div>
                    <div class="event-detail">
                        <i class="fas fa-language"></i>
                        <div>
                            <h3>Language</h3>
                            <p id="event-language"></p>
                        </div>
                    </div>
                </div>

                <div class="event-content-section">
                    <h3>Event Highlights</h3>
                    <ul class="event-highlights" id="event-highlights"></ul>
                </div>

                <div class="event-content-section">
                    <h3>How to Participate</h3>
                    <ol class="participation-steps" id="event-participation"></ol>
                </div>

                <div class="event-content-section">
                    <h3>What to Bring</h3>
                    <ul class="items-to-bring" id="event-items"></ul>
                </div>

                <div class="event-content-section">
                    <h3>Getting Here</h3>
                    <div class="location-map">
                        <iframe id="event-map" src="" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <p id="event-directions"></p>
                </div>

                <div class="event-content-section">
                    <h3>Contact Information</h3>
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <p id="event-email"></p>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <p id="event-phone"></p>
                        </div>
                    </div>
                </div>

                <div class="event-content-section">
                    <h3>Share This Event</h3>
                    <div class="social-share">
                        <a href="#" class="share-btn facebook">
                            <i class="fab fa-facebook-f"></i>
                            Share on Facebook
                        </a>
                        <a href="#" class="share-btn twitter">
                            <i class="fab fa-twitter"></i>
                            Tweet
                        </a>
                        <a href="#" class="share-btn whatsapp">
                            <i class="fab fa-whatsapp"></i>
                            WhatsApp
                        </a>
                    </div>
                </div>

                <div class="event-content-section">
                    <h3>RSVP Now</h3>
                    <div class="rsvp-form">
                        <form id="rsvp-form">
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone" required>
                            </div>
                            <div class="form-group">
                                <label for="volunteer">Would you like to volunteer?</label>
                                <select id="volunteer" name="volunteer" required>
                                    <option value="">Select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="dietary">Dietary Requirements</label>
                                <textarea id="dietary" name="dietary"></textarea>
                            </div>
                            <button type="submit" class="btn primary">Submit RSVP</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const eventId = new URLSearchParams(window.location.search).get('id');
        
        if (!eventId) {
            window.location.href = 'events.html';
            return;
        }

        fetch(`php/events.php?id=${eventId}`)
            .then(response => response.json())
            .then(data => {
                const event = data.events[0];
                
                // Update event details
                document.getElementById('event-image').src = event.image;
                document.getElementById('event-title').textContent = event.title;
                
                const date = new Date(event.date);
                document.querySelector('.day').textContent = date.getDate();
                document.querySelector('.month').textContent = date.toLocaleString('en-US', { month: 'short' }).toUpperCase();
                document.querySelector('.year').textContent = date.getFullYear();
                
                document.getElementById('event-location').textContent = event.location;
                document.getElementById('event-description').innerHTML = event.description;
                document.getElementById('event-time').textContent = event.time;
                document.getElementById('event-audience').textContent = event.audience || 'Everyone';
                document.getElementById('event-language').textContent = event.language || 'English';

                // Update highlights
                const highlights = event.highlights || [];
                const highlightsList = document.getElementById('event-highlights');
                highlightsList.innerHTML = highlights.map(highlight => `
                    <li><i class="fas fa-check"></i> ${highlight}</li>
                `).join('');

                // Update participation steps
                const participation = event.participation || [];
                const participationList = document.getElementById('event-participation');
                participationList.innerHTML = participation.map(step => `
                    <li>${step}</li>
                `).join('');

                // Update items to bring
                const items = event.items || [];
                const itemsList = document.getElementById('event-items');
                itemsList.innerHTML = items.map(item => `
                    <li><i class="fas fa-check"></i> ${item}</li>
                `).join('');

                // Update map and directions
                document.getElementById('event-map').src = event.map || '';
                document.getElementById('event-directions').textContent = event.directions || '';

                // Update contact info
                document.getElementById('event-email').textContent = event.email || 'events@nayomalawi.org';
                document.getElementById('event-phone').textContent = event.phone || '+265 123 456 789';
            })
            .catch(error => {
                console.error('Error loading event details:', error);
                window.location.href = 'events.html';
            });

        // Handle RSVP form submission
        document.getElementById('rsvp-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            formData.append('eventId', eventId);

            fetch('php/rsvp.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Thank you for RSVPing! We will send you a confirmation email shortly.');
                    this.reset();
                } else {
                    alert('There was an error with your RSVP. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error processing RSVP:', error);
                alert('There was an error with your RSVP. Please try again.');
            });
        });

        // Handle social sharing
        const shareButtons = document.querySelectorAll('.share-btn');
        shareButtons.forEach(button => {
            button.addEventListener('click', function() {
                const url = window.location.href;
                const title = document.title;

                if (this.classList.contains('facebook')) {
                    window.open(`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}&t=${encodeURIComponent(title)}`, '_blank');
                } else if (this.classList.contains('twitter')) {
                    window.open(`https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${encodeURIComponent(title)}`, '_blank');
                } else if (this.classList.contains('whatsapp')) {
                    window.open(`https://wa.me/?text=${encodeURIComponent(`${title}: ${url}`)}`, '_blank');
                }
            });
        });
    });
    </script>

    <!-- Include footer -->`n    <?php include 'includes/footer.php'; ?>
</body>
</html>
