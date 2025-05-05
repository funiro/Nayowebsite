<?php
// Database connection (if needed)
// $conn = new mysqli('localhost', 'username', 'password', 'database');

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define base path
$base_path = dirname(__DIR__);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? htmlspecialchars($page_title) : 'Nancholi Youth Organization (NAYO)'; ?></title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/programs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="/js/main.js" defer></script>
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
</head>
<body>
    <header>
        <nav class="main-nav">
            <div class="logo">
                <a href="index.php" class="logo-link">
                    <img src="/images/logo.png" alt="NAYO Logo" class="logo-img" style="max-height: 60px;">
                    <span class="tagline" style="font-size: 0.9rem; color: #333;">One Heart,<br>One Community</span>
                </a>
            </div>
            <button class="mobile-menu-toggle" aria-label="Toggle mobile menu">
                <span class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </span>
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
