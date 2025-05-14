<?php
// Start session first thing
session_start();
$page_title = "Student Support Program | Educational Assistance | Nancholi Youth Organization";
// Include dynamic base URL configuration
include_once 'base_url.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Support | Educational Assistance | Nancholi Youth Organization</title>
    
    <!-- Primary Meta Tags -->
    <meta name="title" content="Student Support | Educational Assistance | Nancholi Youth Organization">
    <meta name="description" content="NAYO's Student Support program provides educational assistance, scholarships, and mentorship to students in Blantyre, Malawi. Helping youth achieve their academic goals and build better futures.">
    <meta name="keywords" content="student support Malawi, educational assistance Blantyre, school scholarships Malawi, student mentorship, youth education Malawi, NAYO student support, academic support Malawi, school fees assistance">
    <meta name="author" content="Nancholi Youth Organization">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://nayomalawi.org/student.html">
    <meta property="og:title" content="Student Support | Educational Assistance | Nancholi Youth Organization">
    <meta property="og:description" content="NAYO's Student Support program provides educational assistance, scholarships, and mentorship to students in Blantyre, Malawi. Helping youth achieve their academic goals and build better futures.">
    <meta property="og:image" content="https://nayomalawi.org/images/student.jpg">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://nayomalawi.org/student.html">
    <meta property="twitter:title" content="Student Support | Educational Assistance | Nancholi Youth Organization">
    <meta property="twitter:description" content="NAYO's Student Support program provides educational assistance, scholarships, and mentorship to students in Blantyre, Malawi. Helping youth achieve their academic goals and build better futures.">
    <meta property="twitter:image" content="https://nayomalawi.org/images/student.jpg">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="https://nayomalawi.org/student.php">
    
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/styles.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/programs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="<?php echo $base_url; ?>/js/main.js" defer></script>
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
                <a href="<?php echo $base_url; ?>/index.php" class="logo-link">
                    <img src="<?php echo $base_url; ?>/images/logo.png" alt="NAYO Logo" class="logo-img">
                    <span class="tagline">One Heart,<br>One Community</span>
                </a>
            </div>
            <button class="mobile-menu-toggle">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="nav-links">
                <li><a href="<?php echo $base_url; ?>/index.php">HOME</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">PROJECTS</a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $base_url; ?>/art.php">ART</a></li>
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

                <li><a href="<?php echo $base_url; ?>/volunteer.php">VOLUNTEER</a></li>
                <li><a href="https://www.every.org/nancholi-youth-organization?search_meta=" class="donate-btn">Donate</a></li>
            </ul>
        </nav>
    </header>

    <main class="program-content">
        <section class="program-hero">
            <h1>Student Support Program</h1>
            <div class="program-image">
                <img src="<?php echo $base_url; ?>/images/student.jpg" alt="Student Support">
            </div>
        </section>

        <section class="program-details">
            <div class="program-overview">
                <h2>Program Overview</h2>
                <p>Our Student Support program aims to help students achieve their educational goals through various support initiatives. We provide academic assistance, mentorship, and resources to ensure students have the tools they need to succeed.</p>
            </div>

            <div class="program-services">
                <h2>Our Services</h2>
                <ul>
                    <li>Academic Support and Tutoring</li>
                    <li>Educational Materials and Resources</li>
                    <li>Mentorship Programs</li>
                    <li>Career Guidance</li>
                    <li>School Fee Assistance</li>
                    <li>Life Skills Training</li>
                </ul>
            </div>

            <section class="program-impact">
                <h2>Program Impact</h2>
                <div class="impact-stats">
                    <div class="stat-item">
                        <h3>Students Supported</h3>
                        <p class="number">200+</p>
                    </div>
                    <div class="stat-item">
                        <h3>Success Rate</h3>
                        <p class="number">85%</p>
                    </div>
                    <div class="stat-item">
                        <h3>Mentors</h3>
                        <p class="number">20+</p>
                    </div>
                </div>
            </section>

            <div class="sponsor-section">
                <h2>Become a Sponsor</h2>
                <p>Your support can change a student's life. Join us in making education accessible to all.</p>
                <div class="text-center">
                    <button class="btn sponsor-btn" onclick="openSponsorForm()">Become a Sponsor</button>
                </div>
            </div>

            <div class="get-involved">
                <h2>Get Involved</h2>
                <p>Support our Student Support program through donations or volunteering. Your contribution helps provide educational opportunities and resources to deserving students.</p>
                <div class="action-buttons">
                    <a href="https://www.every.org/nancholi-youth-organization?search_meta=" class="btn donate-btn">Donate Now</a>
                    <a href="<?php echo $base_url; ?>/volunteer.php" class="btn contact-btn">Volunteer</a>
                </div>
            </div>

            <!-- Sponsor Form Modal -->
            <div id="sponsor-modal" class="modal">
                <div class="modal-content">
                    <span class="close-modal" onclick="closeSponsorForm()">&times;</span>
                    <h2>Become a Sponsor</h2>
                    <form id="sponsor-form" action="https://formspree.io/f/xgegqjqg" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_subject" value="New Sponsor Application">
                        <input type="hidden" name="_captcha" value="false">
                        <input type="hidden" name="_next" value="https://nayomalawi.org/thank-you.html">
                        <input type="hidden" name="_autoresponse" value="Thank you for your interest in becoming a sponsor. We will review your application and get back to you soon.">
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="country">Country *</label>
                            <input type="text" id="country" name="country" required>
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile Number *</label>
                            <input type="tel" id="mobile" name="mobile" required>
                        </div>
                        <div class="form-group">
                            <label for="city">City *</label>
                            <input type="text" id="city" name="city" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Street Address *</label>
                            <input type="text" id="address" name="address" required>
                        </div>
                        <div class="form-group">
                            <label for="students">Number of Students You Wish to Sponsor *</label>
                            <input type="number" id="students" name="students" min="1" required>
                        </div>
                        <div class="form-group">
                            <label for="profiles">Number of Student Profiles You Wish to Review *</label>
                            <input type="number" id="profiles" name="profiles" min="1" required>
                        </div>
                        <div class="form-group">
                            <label for="start-date">Preferred Start Date for Sponsorship *</label>
                            <input type="date" id="start-date" name="start-date" required>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn">Submit Application</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section class="program-faq">
            <h2>Frequently Asked Questions</h2>
            <div class="faq-container">
                <div class="faq-item">
                    <div class="faq-question">Who is eligible for student support?</div>
                    <div class="faq-answer">
                        <p>Students from underprivileged backgrounds who demonstrate academic potential and financial need are eligible for our support programs.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">What types of support are available?</div>
                    <div class="faq-answer">
                        <p>We offer various forms of support including academic tutoring, mentorship, educational materials, school fee assistance, and career guidance.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">How can I apply for support?</div>
                    <div class="faq-answer">
                        <p>Students can apply through their schools or by contacting our office directly. We assess each application based on need and available resources.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">How can I become a mentor?</div>
                    <div class="faq-answer">
                        <p>We welcome qualified individuals who are passionate about education to join our mentorship program. Contact us to learn more about the application process.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Include footer -->
    <?php include 'includes/footer.php'; ?>
</body>
</html>
