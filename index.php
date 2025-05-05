<?php
// Start session first thing
session_start();

// Include header configuration
require_once 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nancholi Youth Organization (NAYO) | Youth Development & Healthcare NGO in Malawi</title>
    
    <!-- Primary Meta Tags -->
    <meta name="title" content="Nancholi Youth Organization (NAYO) | Youth Development & Healthcare NGO in Malawi">
    <meta name="description" content="NAYO is a leading NGO in Malawi providing healthcare services, youth development programs, HIV/AIDS care, palliative care, and educational support in Blantyre and surrounding areas.">
    <meta name="keywords" content="Nancholi Youth Organisation, NAYO, NGO Malawi, Blantyre NGO, youth development Malawi, HIV/AIDS care Malawi, palliative care Malawi, antenatal care Malawi, student support Malawi, outreach programs Malawi, youth friendly services Malawi">
    <meta name="author" content="Nancholi Youth Organization">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://nayomalawi.org/">
    <meta property="og:title" content="Nancholi Youth Organization (NAYO) | Youth Development & Healthcare NGO in Malawi">
    <meta property="og:description" content="NAYO is a leading NGO in Malawi providing healthcare services, youth development programs, HIV/AIDS care, palliative care, and educational support in Blantyre and surrounding areas.">
    <meta property="og:image" content="https://nayomalawi.org/images/logo.png">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://nayomalawi.org/">
    <meta property="twitter:title" content="Nancholi Youth Organization (NAYO) | Youth Development & Healthcare NGO in Malawi">
    <meta property="twitter:description" content="NAYO is a leading NGO in Malawi providing healthcare services, youth development programs, HIV/AIDS care, palliative care, and educational support in Blantyre and surrounding areas.">
    <meta property="twitter:image" content="https://nayomalawi.org/images/logo.png">
    
    <!-- Additional Meta Tags -->
    <meta name="geo.region" content="MW-BT">
    <meta name="geo.placename" content="Blantyre">
    <meta name="geo.position" content="-15.826812;34.980163">
    <meta name="ICBM" content="-15.826812, 34.980163">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="https://nayomalawi.org/">
    
    <link rel="stylesheet" href="css/styles.css?v=1.1">
    <link rel="stylesheet" href="css/programs.css?v=1.1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="js/main.js?v=1.1" defer></script>
    <script>
        // Hero slider functionality
        let currentSlide = 0;
        const slides = document.querySelectorAll('.hero-slide');
        const dots = document.querySelectorAll('.slider-dot');
        const prevButton = document.querySelector('.prev-slide');
        const nextButton = document.querySelector('.next-slide');

        function showSlide(n) {
            slides.forEach(slide => slide.style.display = 'none');
            dots.forEach(dot => dot.classList.remove('active'));
            
            currentSlide = (n + slides.length) % slides.length;
            slides[currentSlide].style.display = 'block';
            dots[currentSlide].classList.add('active');
        }

        function nextSlide() {
            showSlide(currentSlide + 1);
        }

        function prevSlide() {
            showSlide(currentSlide - 1);
        }

        // Initialize
        showSlide(currentSlide);

        // Add event listeners
        prevButton.addEventListener('click', prevSlide);
        nextButton.addEventListener('click', nextSlide);

        // Auto-advance slides
        setInterval(nextSlide, 5000);

        // Dot navigation
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => showSlide(index));
        });
    </script>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Nancholi Youth Organization (NAYO)",
      "alternateName": "NAYO",
      "url": "https://nayomalawi.org/",
      "logo": {
        "@type": "ImageObject",
        "url": "https://nayomalawi.org/images/logo.png",
        "width": 600,
        "height": 600
      },
      "image": {
        "@type": "ImageObject",
        "url": "https://nayomalawi.org/images/logo.png",
        "width": 600,
        "height": 600
      },
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
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">OUR PEOPLE</a>
                    <ul class="dropdown-menu">
                        <li><a href="board.php">BOARD</a></li>
                        <li><a href="staff.php">STAFF</a></li>
                    </ul>
                </li>

                <li><a href="volunteer.php">VOLUNTEER</a></li>
                <li><a href="https://www.every.org/nancholi-youth-organization?search_meta=" class="donate-btn">Donate</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <div class="hero-slider">
            <div class="hero-slide">
                <img src="/images/hero-1.jpg" alt="Hero Image 1">
                <div class="hero-overlay"></div>
                <div class="hero-text">
                    <span class="welcome-text">WELCOME TO</span>
                    <h1>NANCHOLI YOUTH ORGANIZATION</h1>
                </div>
            </div>
            <div class="hero-slide">
                <img src="/images/hero-2.jpg" alt="Hero Image 2">
                <div class="hero-overlay"></div>
                <div class="hero-text">
                    <span class="welcome-text">WELCOME TO</span>
                    <h1>NANCHOLI YOUTH ORGANIZATION</h1>
                </div>
            </div>
            <div class="hero-slide">
                <img src="/images/hero-3.jpg" alt="Hero Image 3">
                <div class="hero-overlay"></div>
                <div class="hero-text">
                    <span class="welcome-text">WELCOME TO</span>
                    <h1>NANCHOLI YOUTH ORGANIZATION</h1>
                </div>
            </div>
            <div class="hero-slide">
                <img src="/images/hero-4.jpg" alt="Hero Image 4">
                <div class="hero-overlay"></div>
                <div class="hero-text">
                    <span class="welcome-text">WELCOME TO</span>
                    <h1>NANCHOLI YOUTH ORGANIZATION</h1>
                </div>
            </div>
            <div class="hero-slide">
                <img src="/images/hero-5.jpg" alt="Hero Image 5">
                <div class="hero-overlay"></div>
                <div class="hero-text">
                    <span class="welcome-text">WELCOME TO</span>
                    <h1>NANCHOLI YOUTH ORGANIZATION</h1>
                </div>
            </div>
            <div class="hero-slide">
                <img src="/images/hero-6.jpg" alt="Hero Image 6">
                <div class="hero-overlay"></div>
                <div class="hero-text">
                    <span class="welcome-text">WELCOME TO</span>
                    <h1>NANCHOLI YOUTH ORGANIZATION</h1>
                </div>
            </div>
            <div class="hero-slide">
                <img src="/images/outreach.jpg" alt="Outreach Program">
                <div class="hero-overlay"></div>
                <div class="hero-text">
                    <span class="welcome-text">WELCOME TO</span>
                    <h1>NANCHOLI YOUTH ORGANIZATION</h1>
                </div>
            </div>
            <div class="hero-slide">
                <img src="/images/student.jpg" alt="Student Support">
                <div class="hero-overlay"></div>
                <div class="hero-text">
                    <span class="welcome-text">WELCOME TO</span>
                    <h1>NANCHOLI YOUTH ORGANIZATION</h1>
                </div>
            </div>
            <div class="hero-slide">
                <img src="/images/youth.jpg" alt="Youth Programs">
                <div class="hero-overlay"></div>
                <div class="hero-text">
                    <span class="welcome-text">WELCOME TO</span>
                    <h1>NANCHOLI YOUTH ORGANIZATION</h1>
                </div>
            </div>
            
            <div class="slider-controls">
                <span class="slider-dot active"></span>
                <span class="slider-dot"></span>
                <span class="slider-dot"></span>
                <span class="slider-dot"></span>
                <span class="slider-dot"></span>
                <span class="slider-dot"></span>
                <span class="slider-dot"></span>
                <span class="slider-dot"></span>
                <span class="slider-dot"></span>
            </div>
            
            <button class="prev-slide">❮</button>
            <button class="next-slide">❯</button>
        </div>
    </section>

    <section class="our-approach">
        <h2>OUR APPROACH</h2>
        <p>Empowering youth and communities through healthcare access and education.</p>
    </section>

    <section class="services">
        <div class="service-grid">
            <div class="service-card">
                <img src="images/antenetal.jpg" alt="Antenetal Care">
                <h3><a href="antenatal.php">ANTENETAL<br>CARE</a></h3>
                <p>Supporting expectant mothers with comprehensive prenatal care services.</p>
                <a href="antenatal.html" class="btn view-more-btn">View More</a>
            </div>
            <div class="service-card">
                <img src="images/art.jpg" alt="ART Program">
                <h3><a href="art.php">ART<br>PROGRAM</a></h3>
                <p>Providing comprehensive care and support for people living with HIV/AIDS.</p>
                <a href="art.html" class="btn view-more-btn">View More</a>
            </div>
            <div class="service-card">
                <img src="images/youth-services.jpg" alt="Youth Friendly Services">
                <h3><a href="youth.php">YOUTH FRIENDLY<br>SERVICES</a></h3>
                <p>Offering specialized healthcare and support services for young people.</p>
                <a href="youth.html" class="btn view-more-btn">View More</a>
            </div>
        </div>

        <div class="service-grid">
            <div class="service-card">
                <img src="images/palliative.jpg" alt="Palliative Care">
                <h3><a href="palliative.php">PALLIATIVE<br>CARE</a></h3>
                <p>Providing compassionate care and support for those with serious illnesses.</p>
                <a href="palliative.html" class="btn view-more-btn">View More</a>
            </div>
            <div class="service-card">
                <img src="images/student.jpg" alt="Student Support">
                <h3><a href="student.php">STUDENT<br>SUPPORT</a></h3>
                <p>Helping students achieve their educational goals through various support programs.</p>
                <a href="student.html" class="btn view-more-btn">View More</a>
            </div>
            <div class="service-card">
                <img src="images/outreach.jpg" alt="Out-Reach Clinic">
                <h3><a href="outreach.php">OUT-REACH<br>CLINIC</a></h3>
                <p>Bringing healthcare services directly to underserved communities.</p>
                <a href="outreach.html" class="btn view-more-btn">View More</a>
            </div>
        </div>
    </section>

    <section class="quote">
        <blockquote>
            "Access to Health Care is a basic human right. Everyone deserves it regardless of their economic background or geographical position"
        </blockquote>
        <cite>George Nedi - Executive Director</cite>
    </section>

    <section class="stats">
        <div class="stat-item">
            <h3>Programs</h3>
            <p class="number" data-target="6">6</p>
        </div>
        <div class="stat-item">
            <h3>Districts</h3>
            <p class="number" data-target="5">5</p>
        </div>
        <div class="stat-item">
            <h3>Yearly Reach</h3>
            <p class="number" data-target="35000+">35000+</p>
        </div>
    </section>

    <section id="staff" class="staff-section">
        <div class="staff-container">
            <div class="staff-header">
                <h2><a href="staff.php">OUR TEAM</a></h2>
                <p>Meet the dedicated professionals who make our mission possible.</p>
            </div>
            <div class="staff-grid">
                <div class="staff-card">
                    <div class="staff-image">
                        <img src="images/staff/george-nedi.jpg" alt="George Nedi">
                    </div>
                    <div class="staff-info">
                        <h3>George Nedi</h3>
                        <p>Executive Director</p>
                        <div class="staff-bio">
                            <p>George Nedi brings over 20 years of experience and expertise to Nancholi Youth Organization. Currently serving as NAYO's Executive Director, George holds a Master's degree in Marketing and has helped position Nancholi Youth Organisation as one the leading Non-governmental Organisations in Malawi.</p>
                        </div>
                        <div class="staff-social">
                            <a href="https://www.linkedin.com/in/george-nedi-5b74b332/" target="_blank" class="linkedin">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="staff-card">
                    <div class="staff-image">
                        <img src="images/staff/watson-shuzi.jpg" alt="Watson Shuzi">
                    </div>
                    <div class="staff-info">
                        <h3>Watson Shuzi</h3>
                        <p>Head of Programs</p>
                        <div class="staff-bio">
                            <p>Watson Shuzi has a background in public health and community development. He is one of the founding members and has been instrumental in developing NAYO's health programs since its inception in 2004.</p>
                        </div>
                        <div class="staff-social">
                            <a href="https://mw.linkedin.com/in/nancholi-youth-organisation-nayo-478a38141" target="_blank" class="linkedin">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="staff-card">
                    <div class="staff-image">
                        <img src="images/staff/Patson.JPG" alt="Patson Gondwe">
                    </div>
                    <div class="staff-info">
                        <h3>Patson Gondwe</h3>
                        <p>Head of Finance</p>
                        <div class="staff-bio">
                            <p>Patson Gondwe is a Chartered Accountant and currently serves as the Head of Finance at Nancholi Youth Organisation. He joined the organisation in 2019 and has since brought a wealth of financial expertise and strategic insight to the team.</p>
                        </div>
                        <div class="staff-social">
                            <a href="https://www.linkedin.com/in/patson-gondwe-531326107" target="_blank" class="linkedin">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="view-more-staff">
                <a href="staff.html" class="btn view-more-btn">View More Staff</a>
            </div>
        </div>
    </section>

    <section class="youtube-links">
        <div class="youtube-container">
            <div class="youtube-box">
                <iframe 
                    width="100%" 
                    height="315" 
                    src="https://www.youtube.com/embed/K5SwAaZv0aU" 
                    title="NAYO Video 1"
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                    allowfullscreen>
                </iframe>
            </div>
            <div class="youtube-box">
                <iframe 
                    width="100%" 
                    height="315" 
                    src="https://www.youtube.com/embed/OpfboVkl6gs" 
                    title="NAYO Video 2"
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </section>

    <section class="map-section">
        <div class="map-container">
            <h2>FIND US</h2>
            <iframe 
                class="map-frame"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3838.566187043514!2d34.98016297378146!3d-15.826812323751433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x18d84425915062bf%3A0x1181d8142e74ad86!2sNancholi%20Youth%20Organization!5e0!3m2!1sen!2smw!4v1744812140978!5m2!1sen!2smw"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
        <h3>Yearly Reach</h3>
        <p class="number" data-target="35000+">35000+</p>
    </div>
</section>

<section id="staff" class="staff-section">
    <div class="staff-container">
        <div class="staff-header">
            <h2><a href="staff.php">OUR TEAM</a></h2>
            <p>Meet the dedicated professionals who make our mission possible.</p>
        </div>
        <div class="staff-grid">
            <div class="staff-card">
                <div class="staff-image">
                    <img src="images/staff/george-nedi.jpg" alt="George Nedi">
                </div>
                <div class="staff-info">
                    <h3>George Nedi</h3>
                    <p>Executive Director</p>
                    <div class="staff-bio">
                        <p>George Nedi brings over 20 years of experience and expertise to Nancholi Youth Organization. Currently serving as NAYO's Executive Director, George holds a Master's degree in Marketing and has helped position Nancholi Youth Organisation as one the leading Non-governmental Organisations in Malawi.</p>
                    </div>
                    <div class="staff-social">
                        <a href="https://www.linkedin.com/in/george-nedi-5b74b332/" target="_blank" class="linkedin">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="staff-card">
                <div class="staff-image">
                    <img src="images/staff/watson-shuzi.jpg" alt="Watson Shuzi">
                </div>
                <div class="staff-info">
                    <h3>Watson Shuzi</h3>
                    <p>Head of Programs</p>
                    <div class="staff-bio">
                        <p>Watson Shuzi has a background in public health and community development. He is one of the founding members and has been instrumental in developing NAYO's health programs since its inception in 2004.</p>
                    </div>
                    <div class="staff-social">
                        <a href="https://mw.linkedin.com/in/nancholi-youth-organisation-nayo-478a38141" target="_blank" class="linkedin">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="staff-card">
                <div class="staff-image">
                    <img src="images/staff/Patson.JPG" alt="Patson Gondwe">
                </div>
                <div class="staff-info">
                    <h3>Patson Gondwe</h3>
                    <p>Head of Finance</p>
                    <div class="staff-bio">
                        <p>Patson Gondwe is a Chartered Accountant and currently serves as the Head of Finance at Nancholi Youth Organisation. He joined the organisation in 2019 and has since brought a wealth of financial expertise and strategic insight to the team.</p>
                    </div>
                    <div class="staff-social">
                        <a href="https://www.linkedin.com/in/patson-gondwe-531326107" target="_blank" class="linkedin">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="view-more-staff">
            <a href="staff.html" class="btn view-more-btn">View More Staff</a>
        </div>
    </div>
</section>

<section class="youtube-links">
    <div class="youtube-container">
        <div class="youtube-box">
            <iframe 
                width="100%" 
                height="315" 
                src="https://www.youtube.com/embed/K5SwAaZv0aU" 
                title="NAYO Video 1"
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                allowfullscreen>
            </iframe>
        </div>
        <div class="youtube-box">
            <iframe 
                width="100%" 
                height="315" 
                src="https://www.youtube.com/embed/OpfboVkl6gs" 
                title="NAYO Video 2"
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                allowfullscreen>
            </iframe>
        </div>
    </div>
</section>

<section class="map-section">
    <div class="map-container">
        <h2>FIND US</h2>
        <iframe 
            class="map-frame"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3838.566187043514!2d34.98016297378146!3d-15.826812323751433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x18d84425915062bf%3A0x1181d8142e74ad86!2sNancholi%20Youth%20Organization!5e0!3m2!1sen!2smw!4v1744812140978!5m2!1sen!2smw"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</section>


    <!-- Include footer -->
    <?php require_once 'includes/footer.php'; ?>
</body>
</html>