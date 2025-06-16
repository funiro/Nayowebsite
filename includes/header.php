<?php
// Include base URL configuration
require_once dirname(__DIR__) . '/base_url.php';

// Include redirects
require_once __DIR__ . '/redirects.php';

// Include breadcrumbs
require_once __DIR__ . '/breadcrumbs.php';

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set default breadcrumbs if not set
if (!isset($breadcrumbs)) {
    $breadcrumbs = [
        ['url' => $base_url, 'text' => 'Home']
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="theme-color" content="#006b41">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    
    <?php
    // Get current URL for canonical and meta tags
    $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http');
    $current_url = $protocol . '://' . $_SERVER['HTTP_HOST'] . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $current_url = rtrim($current_url, '/');
    $page_title = isset($page_title) ? $page_title . ' - NAYO' : 'NAYO - Empowering Communities in Malawi';
    $page_description = isset($page_description) ? $page_description : 'NAYO is dedicated to empowering communities in Malawi through healthcare, education, and youth development programs.';
    $page_image = $protocol . '://' . $_SERVER['HTTP_HOST'] . $base_url . '/images/logo.png';
    ?>
    
    <title><?php echo htmlspecialchars($page_title); ?></title>
    
    <!-- Primary Meta Tags -->
    <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta name="keywords" content="NAYO, Malawi, youth development, healthcare, education, NGO, Blantyre, community development">
    <meta name="author" content="Nancholi Youth Organisation">
    
    <!-- Open Graph / Social Media Meta Tags -->
    <meta property="og:site_name" content="NAYO - Empowering Communities in Malawi">
    <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($page_image); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($current_url); ?>">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="en_GB">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($page_image); ?>">
    <meta name="twitter:site" content="@nayomalawi">
    
    <!-- Canonical URL - Remove query parameters and fragments -->
    <?php
    $canonical_url = $protocol . '://' . $_SERVER['HTTP_HOST'] . strtok($_SERVER['REQUEST_URI'], '?');
    $canonical_url = rtrim($canonical_url, '/');
    ?>
    <link rel="canonical" href="<?php echo htmlspecialchars($canonical_url); ?>">
    
    <!-- Prevents search engines from indexing search results and similar pages -->
    <?php if (strpos($_SERVER['REQUEST_URI'], '?s=') !== false || strpos($_SERVER['REQUEST_URI'], '&s=') !== false || 
              strpos($_SERVER['REQUEST_URI'], 'search') !== false || strpos($_SERVER['REQUEST_URI'], '?q=') !== false): ?>
        <meta name="robots" content="noindex, follow">
    <?php else: ?>
        <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <?php endif; ?>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo $base_url; ?>/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $base_url; ?>/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $base_url; ?>/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $base_url; ?>/images/favicon-16x16.png">
    <link rel="manifest" href="<?php echo $base_url; ?>/site.webmanifest">
    <meta name="robots" content="index, follow">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="<?php echo htmlspecialchars($current_url); ?>">
    
    <!-- Preload critical assets -->
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $base_url; ?>/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $base_url; ?>/images/favicon-16x16.png">
    <link rel="shortcut icon" href="<?php echo $base_url; ?>/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $base_url; ?>/images/apple-touch-icon.png">
    <link rel="manifest" href="<?php echo $base_url; ?>/site.webmanifest">
    
    <!-- Preconnect to external domains -->
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Preload critical resources -->
    <link rel="preload" href="<?php echo $base_url; ?>/images/logo.png" as="image">
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">
    
    <!-- Load non-critical CSS asynchronously -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" media="print" onload="this.media='all'">
    
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/styles.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/navigation.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/slider.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/index.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/programs.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/staff.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/impact.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/footer.css?ver=1.2">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/mobile-optimizations.css?ver=1.0">
    
    <!-- Primary Meta Tags -->
    <meta name="title" content="Nancholi Youth Organization (NAYO) | Youth Development & Healthcare NGO in Malawi">
    <meta name="description" content="NAYO is a leading NGO in Malawi providing healthcare services, youth development programs, HIV/AIDS care, palliative care, and educational support in Blantyre and surrounding areas.">
    <meta name="keywords" content="Nancholi Youth Organisation, NAYO, NGO Malawi, Blantyre NGO, youth development Malawi, HIV/AIDS care Malawi, palliative care Malawi, antenatal care Malawi, student support Malawi, outreach programs Malawi, youth friendly services Malawi">
    <meta name="author" content="Nancholi Youth Organization">
    <script defer src="<?php echo $base_url; ?>/js/lazy-load.js"></script>
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://nayomalawi.org/">
    <meta property="og:title" content="Nancholi Youth Organization (NAYO) | Youth Development & Healthcare NGO in Malawi">
    <meta property="og:description" content="NAYO is a leading NGO in Malawi providing healthcare services, youth development programs, HIV/AIDS care, palliative care, and educational support in Blantyre and surrounding areas.">
    <meta property="og:image" content="https://nayomalawi.org/images/hero-1.jpg">
    
    <?php 
    if (isset($page_title) && strpos($page_title, 'Youth Friendly Services') !== false) { 
        echo '<link rel="stylesheet" href="' . $base_url . '/css/youth.css">';
    }
    if (strpos($_SERVER['REQUEST_URI'], '/news/') !== false) {
        echo '<link rel="stylesheet" href="' . $base_url . '/css/news.css">';
    }
    ?>
    
    <!-- Schema.org JSON-LD -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "NGO",
        "@id": "https://nayomalawi.org/#organization",
        "name": "Nancholi Youth Organisation (NAYO)",
        "legalName": "Nancholi Youth Organisation",
        "alternateName": "NAYO",
        "url": "https://nayomalawi.org/",
        "logo": {
            "@type": "ImageObject",
            "url": "https://nayomalawi.org/images/logo.png",
            "width": "150",
            "height": "60"
        },
        "description": "NAYO is a leading NGO in Malawi providing healthcare services, youth development programs, HIV/AIDS care, palliative care, and educational support in Blantyre and surrounding areas.",
        "foundingDate": "2009",
        "foundingLocation": "Blantyre, Malawi",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "P.O. Box 1624",
            "addressLocality": "Blantyre",
            "addressRegion": "Southern Region",
            "postalCode": "1624",
            "addressCountry": "MW"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": "-15.7861",
            "longitude": "35.0058"
        },
        "contactPoint": {
            "@type": "ContactPoint",
            "contactType": "Customer service",
            "email": "info@nayomalawi.org",
            "url": "https://nayomalawi.org/contact"
        },
        "sameAs": [
            "https://www.facebook.com/nayomalawi",
            "https://twitter.com/nayomalawi",
            "https://www.instagram.com/nayomalawi"
        ],
        "areaServed": {
            "@type": "Country",
            "name": "Malawi"
        },
        "keywords": [
            "NGO Malawi",
            "Youth Development",
            "Healthcare Services Malawi",
            "HIV/AIDS Care",
            "Palliative Care",
            "Education Support"
        ],
        "hasOfferCatalog": {
            "@type": "OfferCatalog",
            "name": "Services",
            "itemListElement": [
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Youth Development Programs"
                    }
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Healthcare Services"
                    }
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Educational Support"
                    }
                }
            ]
        },
        "founder": {
            "@type": "Organization",
            "name": "Nancholi Youth Organisation Founders"
        },
        "memberOf": [
            {
                "@type": "NGO",
                "name": "Malawi Network of AIDS Service Organizations (MANASO)"
            }
        ]
    }
    </script>
    
    <!-- BreadcrumbList Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [
            {
                "@type": "ListItem",
                "position": 1,
                "item": {
                    "@id": "https://nayomalawi.org/",
                    "name": "Home"
                }
            }
        ]
    }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="<?php echo $base_url; ?>/js/main.js" defer></script>
    <script src="<?php echo $base_url; ?>/js/lazy-load.js" defer></script>
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
            // Hero Slider functionality
            const slides = document.querySelectorAll('.hero-slide');
            const dots = document.querySelectorAll('.dot');
            let currentSlide = 0;
            let slideInterval;

            function showSlide(n) {
                // Remove active class from current slide and dot
                if (slides[currentSlide]) slides[currentSlide].classList.remove('active');
                if (dots[currentSlide]) dots[currentSlide].classList.remove('active');
                
                // Calculate new slide index
                currentSlide = (n + slides.length) % slides.length;
                
                // Add active class to new slide and dot
                if (slides[currentSlide]) slides[currentSlide].classList.add('active');
                if (dots[currentSlide]) dots[currentSlide].classList.add('active');
            }

            function nextSlide() {
                showSlide(currentSlide + 1);
            }

            function startAutoSlide() {
                stopAutoSlide(); // Clear any existing interval
                slideInterval = setInterval(nextSlide, 5000);
            }


            function stopAutoSlide() {
                clearInterval(slideInterval);
            }

            // Add click event listeners to dots
            dots.forEach((dot, index) => {
                dot.addEventListener('click', function() {
                    showSlide(index);
                    stopAutoSlide(); // Stop auto-slide on user interaction
                    setTimeout(startAutoSlide, 10000); // Resume after 10 seconds of inactivity
                });
            });

            // Start auto-sliding on page load
            startAutoSlide();

            // Pause auto-slide when user hovers over slider
            const heroSlider = document.querySelector('.hero-slider');
            if (heroSlider) {
                heroSlider.addEventListener('mouseenter', stopAutoSlide);
                heroSlider.addEventListener('mouseleave', startAutoSlide);
                
                // For touch devices
                heroSlider.addEventListener('touchstart', stopAutoSlide);
                heroSlider.addEventListener('touchend', function() {
                    setTimeout(startAutoSlide, 10000);
                });
            }
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
<body class="<?php echo (strpos($_SERVER['REQUEST_URI'], '/news/') !== false) ? 'news-page' : ''; ?>">
    <header>
        <nav class="main-nav">
            <div class="logo" itemscope itemtype="https://schema.org/Organization">
                <a href="<?php echo $base_url; ?>" class="logo-link" itemprop="url" aria-label="Nancholi Youth Organisation - Home">
                    <img src="<?php echo $base_url; ?>/images/logo.png" 
                         alt="Nancholi Youth Organisation Logo" 
                         class="logo-img" 
                         width="150" 
                         height="60" 
                         fetchpriority="high" 
                         loading="eager"
                         itemprop="logo"
                         aria-hidden="false"> 
                    <span class="tagline">One Heart,<br>One Community</span>
                </a>
                <meta itemprop="name" content="Nancholi Youth Organisation (NAYO)">
                <meta itemprop="description" content="Empowering communities in Malawi through youth development and healthcare services">
            </div>
            <button class="mobile-menu-toggle" aria-label="Toggle mobile menu">
                <span class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
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
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">EVENTS & NEWS</a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $base_url; ?>/events.php">Events</a></li>
                        <li><a href="<?php echo $base_url; ?>/news/">News</a></li>
                    </ul>
                </li>
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
