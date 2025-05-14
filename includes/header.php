<?php
// Database connection (if needed)
// $conn = new mysqli('localhost', 'username', 'password', 'database');

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define base path
$base_path = dirname(__DIR__);
// Detect if on localhost or live server to set correct base URL
$server_name = isset($_SERVER['SERVER_NAME']) ? strtolower($_SERVER['SERVER_NAME']) : '';
$is_localhost = (strpos($server_name, 'localhost') !== false) || (strpos($server_name, '127.0.0.1') !== false);
$base_url = $is_localhost ? '/dashboard/nayo-website' : '';
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
    <meta property="og:image" content="https://nayomalawi.org/images/hero-1.jpg">
    
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/styles.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/programs.css">
    <?php if (isset($page_title) && strpos($page_title, 'Youth Friendly Services') !== false) { ?>
        <link rel="stylesheet" href="<?php echo $base_url; ?>/css/youth.css">
    <?php } ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="<?php echo $base_url; ?>/js/main.js" defer type="text/javascript"></script>
    <!-- Structured data for organization and logo (for search engines) -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "NGO",
      "name": "Nancholi Youth Organisation",
      "alternateName": "NAYO",
      "url": "https://nayomalawi.org",
      "logo": "https://nayomalawi.org/images/logo.png",
      "sameAs": [
        "https://www.facebook.com/nayomalawi/",
        "https://twitter.com/nayomalawi",
        "https://www.instagram.com/nayomalawi/"
      ],
      "slogan": "One Heart, One Community",
      "description": "NAYO is a leading NGO in Malawi providing healthcare services, youth development programs, HIV/AIDS care, palliative care, and educational support in Blantyre and surrounding areas."
    }
    </script>
    <style>
        /* Youth Friendly Page Styles */
        .program-content {
            padding: 4rem 5%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .program-hero {
            text-align: center;
            margin-bottom: 3rem;
        }

        .program-hero h1 {
            font-size: 2.5rem;
            color: #008751;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .program-image {
            max-width: 800px;
            margin: 0 auto;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .program-image img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .program-image:hover img {
            transform: scale(1.05);
        }

        .section-header {
            margin-bottom: 3rem;
        }

        .section-header h2 {
            font-size: 2rem;
            color: #008751;
            margin-bottom: 1.5rem;
            border-bottom: 2px solid #008751;
            padding-bottom: 0.5rem;
        }

        .section-content {
            margin-bottom: 3rem;
        }

        .section-content p {
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 1.5rem;
            color: #333;
        }

        .section-content ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .section-content li {
            margin-bottom: 1.5rem;
            padding-left: 2rem;
            position: relative;
        }

        .section-content li::before {
            content: "•";
            color: #008751;
            position: absolute;
            left: 0;
            top: 0.25rem;
        }

        .gallery-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .gallery-item img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.05);
        }

        .gallery-caption {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 1rem;
            text-align: center;
            font-size: 0.9rem;
        }

        .achievement-box {
            background: #f9f9f9;
            padding: 2rem;
            border-radius: 8px;
            margin-top: 2rem;
        }

        .achievement-box ul {
            list-style-type: none;
            padding: 0;
            margin: 1.5rem 0;
        }

        .achievement-box li {
            margin-bottom: 1rem;
            padding-left: 2rem;
            position: relative;
        }

        .achievement-box li::before {
            content: "✓";
            color: #008751;
            position: absolute;
            left: 0;
            top: 0.25rem;
        }

        .get-involved {
            background: #f9f9f9;
            padding: 3rem;
            border-radius: 8px;
            margin: 4rem 0;
            text-align: center;
        }

        .get-involved p {
            margin-bottom: 2rem;
            color: #333;
            font-size: 1.1rem;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 2rem;
        }

        .action-buttons a {
            flex: 1;
            min-width: 150px;
            padding: 1rem;
            font-size: 1rem;
            text-decoration: none;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }

        .action-buttons a:hover {
            transform: translateY(-2px);
        }

        .faq-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .faq-item {
            background: #f9f9f9;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .faq-question {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 1rem;
            color: #008751;
        }

        .faq-answer {
            margin-top: 1rem;
            color: #333;
            line-height: 1.6;
        }

        /* Mobile Styles */
        @media (max-width: 768px) {
            .program-content {
                padding: 2rem 2%;
            }

            .program-hero h1 {
                font-size: 2rem;
            }

            .gallery-container {
                grid-template-columns: 1fr;
            }

            .faq-container {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
    <!-- Slider JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.hero-slide');
            const dots = document.querySelectorAll('.dot');
            const prevArrow = document.getElementById('prev-slide');
            const nextArrow = document.getElementById('next-slide');
            let currentIndex = 0;
            const totalSlides = slides.length;
            let autoSlideInterval;

            function showSlide(index) {
                slides.forEach((slide, i) => {
                    if (i === index) {
                        slide.classList.add('active');
                    } else {
                        slide.classList.remove('active');
                    }
                });
                dots.forEach((dot, i) => {
                    if (i === index) {
                        dot.classList.add('active');
                    } else {
                        dot.classList.remove('active');
                    }
                });
            }

            function nextSlide() {
                currentIndex = (currentIndex + 1) % totalSlides;
                showSlide(currentIndex);
            }

            function prevSlide() {
                currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                showSlide(currentIndex);
            }

            function startAutoSlide() {
                autoSlideInterval = setInterval(nextSlide, 5000); // Change slide every 5 seconds
            }

            function stopAutoSlide() {
                clearInterval(autoSlideInterval);
            }

            dots.forEach(dot => {
                dot.addEventListener('click', function() {
                    currentIndex = parseInt(this.getAttribute('data-slide'));
                    showSlide(currentIndex);
                    stopAutoSlide(); // Stop auto-slide on user interaction
                    setTimeout(startAutoSlide, 10000); // Resume after 10 seconds of inactivity
                });
            });

            if (prevArrow && nextArrow) {
                prevArrow.addEventListener('click', function() {
                    prevSlide();
                    stopAutoSlide(); // Stop auto-slide on user interaction
                    setTimeout(startAutoSlide, 10000); // Resume after 10 seconds of inactivity
                });
                nextArrow.addEventListener('click', function() {
                    nextSlide();
                    stopAutoSlide(); // Stop auto-slide on user interaction
                    setTimeout(startAutoSlide, 10000); // Resume after 10 seconds of inactivity
                });
            }

            // Start auto-sliding on page load
            startAutoSlide();
        });
    </script>
    <!-- Schema.org markup for Google -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "NGO",
        "name": "Nancholi Youth Organisation",
        "alternateName": "NAYO",
        "url": "https://nayomalawi.org",
        "logo": "https://nayomalawi.org/images/logo.png",
        "sameAs": [
            "https://www.facebook.com/nayomalawi/",
            "https://x.com/nayo_malawi?t=wtvMMN8hWUn3ZA-5r5GbLg&s=09",
            "https://www.instagram.com/nayo_malawi/profilecard/?igsh=ZDFnbDdkN2huOHB4",
            "https://mw.linkedin.com/in/nancholi-youth-organisation-nayo-478a38141"
        ],
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Nancholi",
            "addressLocality": "Blantyre",
            "addressRegion": "Southern Region",
            "postalCode": "1624",
            "addressCountry": "MW"
        },
        "description": "Nancholi Youth Organisation (NAYO) is a youth-focused NGO in Malawi dedicated to empowering youth through education, healthcare, and community development initiatives.",
        "areaServed": "Blantyre, Malawi",
        "email": "info@nayomalawi.org"
    }
    </script>
</head>
<body>
    <header>
        <nav class="main-nav">
            <div class="logo">
                <a href="<?php echo $base_url; ?>/index.php" class="logo-link">
                    <img src="<?php echo $base_url; ?>/images/logo.png" alt="NAYO Logo" class="logo-img" style="max-height: 60px;">
                    <span class="tagline" style="font-size: 0.9rem; color: #333;">One Heart,<br>One Community</span>
                </a>
            </div>
            <button class="mobile-menu-toggle" aria-label="Toggle mobile menu" style="background-color: #006b41; border-radius: 4px; padding: 8px; border: none; cursor: pointer; z-index: 1003;">
                <span class="hamburger" style="display: flex; flex-direction: column; justify-content: space-between; height: 24px;">
                    <span class="bar" style="display: block; width: 30px; height: 3px; background-color: white; border-radius: 3px; transition: all 0.3s ease;"></span>
                    <span class="bar" style="display: block; width: 30px; height: 3px; background-color: white; border-radius: 3px; transition: all 0.3s ease;"></span>
                    <span class="bar" style="display: block; width: 30px; height: 3px; background-color: white; border-radius: 3px; transition: all 0.3s ease;"></span>
                </span>
            </button>
            <ul class="nav-links">
                <li><a href="<?php echo $base_url; ?>/index.php">HOME</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">PROJECTS</a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $base_url; ?>/art.php">ART</a></li>
                        <li><a href="<?php echo $base_url; ?>/antenatal.php">ANTENATAL CARE</a></li>
                        <li><a href="<?php echo $base_url; ?>/palliative.php">PALLIATIVE CARE</a></li>
                        <li><a href="<?php echo $base_url; ?>/student.php">STUDENT SUPPORT</a></li>
                        <li><a href="<?php echo $base_url; ?>/outreach.php">OUTREACH PROGRAMS</a></li>
                        <li><a href="<?php echo $base_url; ?>/youth.php">YOUTH FRIENDLY SERVICES</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo $base_url; ?>/events.php">EVENTS</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">OUR PEOPLE</a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $base_url; ?>/board.php">BOARD</a></li>
                        <li><a href="<?php echo $base_url; ?>/staff.php">STAFF</a></li>
                    </ul>
                </li>

                <li><a href="<?php echo $base_url; ?>/volunteer.php">VOLUNTEER</a></li>
                <li><a href="https://www.every.org/nancholi-youth-organization?search_meta=" class="donate-btn">Donate</a></li>
            </ul>
        </nav>
    </header>
