<?php
// Start session first thing
session_start();

// Include base URL configuration
require_once __DIR__ . '/base_url.php';

$page_title = "Nancholi Youth Organization (NAYO) | Youth Development & Healthcare NGO in Malawi";

// Include header files
require_once 'includes/header-config.php';
require_once 'includes/header.php';
?>

<!-- Slider/Hero Section -->
<section class="hero">
        <div class="hero-slider">
            <div class="hero-slide active">
                <img src="<?php echo $base_url; ?>/images/hero-1.jpg" alt="Hero Image 1" class="hero-image active">
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <div class="hero-welcome">
                        <span>WELCOME TO</span>
                        <h1>NANCHOLI YOUTH ORGANISATION</h1>
                    </div>
                </div>
            </div> 
            <div class="hero-slide">
                <img src="<?php echo $base_url; ?>/images/hero-2.jpg" alt="Hero Image 2" class="hero-image">
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <div class="hero-welcome">
                        <span>WELCOME TO</span>
                        <h1>NANCHOLI YOUTH ORGANISATION</h1>
                    </div>
                </div>
            </div>
            <div class="hero-slide">
                <img src="<?php echo $base_url; ?>/images/hero-3.jpg" alt="Hero Image 3" class="hero-image">
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <div class="hero-welcome">
                        <span>WELCOME TO</span>
                        <h1>NANCHOLI YOUTH ORGANISATION</h1>
                    </div>
                </div>
            </div>
            <div class="hero-slide">
                <img src="<?php echo $base_url; ?>/images/hero-4.jpg" alt="Hero Image 4" class="hero-image">
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <div class="hero-welcome">
                        <span>WELCOME TO</span>
                        <h1>NANCHOLI YOUTH ORGANISATION</h1>
                    </div>
                </div>
            </div>
            <div class="hero-slide">
                <img src="<?php echo $base_url; ?>/images/hero-5.jpg" alt="Hero Image 5" class="hero-image">
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <div class="hero-welcome">
                        <span>WELCOME TO</span>
                        <h1>NANCHOLI YOUTH ORGANISATION</h1>
                    </div>
                </div>
            </div>
            <div class="hero-slide">
                <img src="<?php echo $base_url; ?>/images/hero-6.jpg" alt="Hero Image 6" class="hero-image">
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <div class="hero-welcome">
                        <span>WELCOME TO</span>
                        <h1>NANCHOLI YOUTH ORGANISATION</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-controls">
            <button class="slider-arrow prev-slide" aria-label="Previous slide">&#10094;</button>
            <div class="slider-dots" role="tablist">
                <span class="dot active" data-slide="0" role="tab" aria-selected="true" tabindex="0"></span>
                <span class="dot" data-slide="1" role="tab" aria-selected="false" tabindex="0"></span>
                <span class="dot" data-slide="2" role="tab" aria-selected="false" tabindex="0"></span>
                <span class="dot" data-slide="3" role="tab" aria-selected="false" tabindex="0"></span>
                <span class="dot" data-slide="4" role="tab" aria-selected="false" tabindex="0"></span>
                <span class="dot" data-slide="5" role="tab" aria-selected="false" tabindex="0"></span>
            </div>
            <button class="slider-arrow next-slide" aria-label="Next slide">&#10095;</button>
        </div>
    </section>

    <!-- Our Approach Section -->
    <section class="our-approach section-padding" style="background-color: #f7f7f7; padding: 4rem 0; text-align: center;">
        <div class="container">
            <h2 class="section-heading">OUR APPROACH</h2>
            <div style="font-size: 1.5rem; font-weight: bold; max-width: 900px; margin: 0 auto; line-height: 1.6; color: #333;">
                Empowering youth and communities through healthcare access and education. Our approach is centered on sustainable development, community engagement, and youth empowerment to create lasting positive change in Malawi.
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services section-padding">
        <div class="container">
            <h2 class="section-heading">OUR SERVICES</h2>
            <p class="section-subheading">Discover the comprehensive range of services we offer to empower our community and support youth development.</p>
            
            <div class="service-grid">
                <!-- Row 1 -->
                <div class="service-card">
                    <img src="<?php echo $base_url; ?>/images/antenatal.jpg" alt="Antenatal Care">
                    <h3><a href="<?php echo $base_url; ?>/antenatal.php">ANTENATAL CARE</a></h3>
                    <p>Supporting expectant mothers with comprehensive prenatal care services to ensure safe pregnancies and healthy babies.</p>
                    <a href="<?php echo $base_url; ?>/antenatal.php" class="btn view-more-btn">Learn More</a>
                </div>
                
                <div class="service-card">
                    <img src="<?php echo $base_url; ?>/images/art.jpg" alt="ART Program">
                    <h3><a href="<?php echo $base_url; ?>/art.php">ART PROGRAM</a></h3>
                    <p>Providing comprehensive care, treatment, and support for people living with HIV/AIDS in our community.</p>
                    <a href="<?php echo $base_url; ?>/art.php" class="btn view-more-btn">Learn More</a>
                </div>
                
                <div class="service-card">
                    <img src="<?php echo $base_url; ?>/images/youth-services.jpg" alt="Youth Friendly Services">
                    <h3><a href="<?php echo $base_url; ?>/youth.php">YOUTH FRIENDLY SERVICES</a></h3>
                    <p>Offering specialized healthcare, counseling, and support services tailored specifically for young people.</p>
                    <a href="<?php echo $base_url; ?>/youth.php" class="btn view-more-btn">Learn More</a>
                </div>
                
                <!-- Row 2 -->
                <div class="service-card">
                    <img src="<?php echo $base_url; ?>/images/palliative.jpg" alt="Palliative Care">
                    <h3><a href="<?php echo $base_url; ?>/palliative.php">PALLIATIVE CARE</a></h3>
                    <p>Providing compassionate care, pain management, and support for individuals with life-limiting illnesses.</p>
                    <a href="<?php echo $base_url; ?>/palliative.php" class="btn view-more-btn">Learn More</a>
                </div>
                
                <div class="service-card">
                    <img src="<?php echo $base_url; ?>/images/student.jpg" alt="Student Support">
                    <h3><a href="<?php echo $base_url; ?>/student.php">STUDENT SUPPORT</a></h3>
                    <p>Helping students achieve their educational goals through mentorship, resources, and scholarship programs.</p>
                    <a href="<?php echo $base_url; ?>/student.php" class="btn view-more-btn">Learn More</a>
                </div>
                
                <div class="service-card">
                    <img src="<?php echo $base_url; ?>/images/outreach.jpg" alt="Outreach Clinic">
                    <h3><a href="<?php echo $base_url; ?>/outreach.php">OUTREACH CLINIC</a></h3>
                    <p>Bringing essential healthcare services directly to underserved communities through our mobile clinics.</p>
                    <a href="<?php echo $base_url; ?>/outreach.php" class="btn view-more-btn">Learn More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Director's Quote -->
    <section class="quote section-padding" style="background-color: #f7f7f7; padding: 4rem 0; text-align: center;">
        <div class="container">
            <blockquote style="font-size: 1.5rem; font-weight: bold; max-width: 900px; margin: 0 auto 1rem; line-height: 1.6; color: #333;">
                "Access to Health Care is a basic human right. Everyone deserves it regardless of their economic background or geographical position."
            </blockquote>
            <cite style="font-style: normal; font-weight: 600; color: #008751; font-size: 1.2rem;">George Nedi - Executive Director</cite>
        </div>
    </section>

    <section class="impact-section">
        <div class="impact-container">
            <h2 class="impact-heading">OUR IMPACT</h2>
            <p class="impact-subheading">Since 2004, Nancholi Youth Organisation has been making a difference in communities across Malawi.</p>
            
            <div class="stats-container">
                <div class="stat-item">
                    <h3>Programs</h3>
                    <p class="stat-number" data-target="6">6</p>
                </div>
                
                <div class="stat-item">
                    <h3>Districts</h3>
                    <p class="stat-number" data-target="5">5</p>
                </div>
                
                <div class="stat-item">
                    <h3>Yearly Reach</h3>
                    <p class="stat-number" data-target="35000">35000+</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Staff Section -->
    <section class="staff-section section-padding">
        <div class="container">
            <h2 class="section-heading"><a href="<?php echo $base_url; ?>/staff.php" style="color: inherit; text-decoration: none;">OUR LEADERSHIP</a></h2>
            <p class="section-subheading">Meet the dedicated team behind NAYO's mission to empower youth and transform communities.</p>
            
            <div class="staff-grid">
                <!-- Staff Member 1 -->
                <div class="staff-card">
                    <div class="staff-image">
                        <img src="<?php echo $base_url; ?>/images/staff/george-nedi.jpg" alt="George Nedi">
                    </div>
                    <div class="staff-info">
                        <h3>George Nedi</h3>
                        <p>Executive Director</p>
                        <div class="staff-social">
                            <a href="https://www.linkedin.com/in/george-nedi-5b74b332/" target="_blank" class="linkedin">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Staff Member 2 -->
                <div class="staff-card">
                    <div class="staff-image">
                        <img src="<?php echo $base_url; ?>/images/staff/watson-shuzi.jpg" alt="Watson Shuzi">
                    </div>
                    <div class="staff-info">
                        <h3>Watson Shuzi</h3>
                        <p>Head of Programs</p>
                        <div class="staff-social">
                            <a href="https://mw.linkedin.com/in/nancholi-youth-organisation-nayo-478a38141" target="_blank" class="linkedin">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Staff Member 3 -->
                <div class="staff-card">
                    <div class="staff-image">
                        <img src="<?php echo $base_url; ?>/images/staff/Patson.jpg" alt="Patson Gondwe">
                    </div>
                    <div class="staff-info">
                        <h3>Patson Gondwe</h3>
                        <p>Head of Finance</p>
                        <div class="staff-social">
                            <a href="https://www.linkedin.com/in/patson-gondwe-531326107" target="_blank" class="linkedin">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Staff Member 4 -->
                <div class="staff-card">
                    <div class="staff-image">
                        <img src="<?php echo $base_url; ?>/images/staff/moses-mageza.jpg" alt="Moses Mageza">
                    </div>
                    <div class="staff-info">
                        <h3>Moses Mageza</h3>
                        <p>Human Resources Manager</p>
                        <div class="staff-social">
                            <a href="https://www.linkedin.com/in/moses-mageza-b3b3b3b3" target="_blank" class="linkedin">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Staff Member 5 -->
                <div class="staff-card">
                    <div class="staff-image">
                        <img src="<?php echo $base_url; ?>/images/staff/mloiso.JPG" alt="Mloiso M Katete">
                    </div>
                    <div class="staff-info">
                        <h3>Mloiso M Katete</h3>
                        <p>Programs Manager</p>
                        <div class="staff-social">
                            <a href="#" target="_blank" class="linkedin">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Staff Member 6 -->
                <div class="staff-card">
                    <div class="staff-image">
                        <img src="<?php echo $base_url; ?>/images/staff/Chifuniro.jpg" alt="Chifuniro Masamba">
                    </div>
                    <div class="staff-info">
                        <h3>Chifuniro Masamba</h3>
                        <p>communities Officer</p>
                        <div class="staff-social">
                            <a href="#" target="_blank" class="linkedin">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="view-more-staff">
                <a href="staff.php" class="btn view-more-btn">View More Staff</a>
            </div>
        </div>
    </section>

    <!-- Videos Section -->
    <section class="videos-section section-padding" style="background-color: #f9f9f9;">
        <div class="container">
            <h2 class="section-heading">OUR VIDEOS</h2>
            <div class="videos-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-top: 2rem;">
                <!-- Video 1 -->
                <div class="video-container" style="background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    <div class="video-wrapper" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
                        <iframe 
                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                            src="https://www.youtube.com/embed/K5SwAaZv0aU" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
                
                <!-- Video 2 -->
                <div class="video-container" style="background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    <div class="video-wrapper" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
                        <iframe 
                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                            src="https://www.youtube.com/embed/OpfboVkl6gs" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
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
    <?php
// Include footer
include 'includes/footer.php';
?>
</body>
</html>