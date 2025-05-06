<?php
// Start session first thing
session_start();
$page_title = "Nancholi Youth Organization (NAYO) | Youth Development & Healthcare NGO in Malawi";
// Include dynamic base URL configuration
include_once 'base_url.php';
?>

<?php include_once 'includes/header.php'; ?>

    <section class="hero">
        <div class="hero-slider">
            <div class="hero-slide active">
                <img src="<?php echo $base_url; ?>/images/hero-1.jpg" alt="Hero Image 1" class="hero-image active">
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <div style="margin-bottom: 1.5rem;">
                        <span style="display: block; font-size: 1.5rem; font-weight: 400; letter-spacing: 3px; margin-bottom: 0.5rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.7); color: #ffffff;">WELCOME TO</span>
                        <h1 style="font-size: 3rem; font-weight: 700; margin: 0.5rem 0 1.5rem 0; text-shadow: 2px 2px 4px rgba(0,0,0,0.7); letter-spacing: 2px; color: #ffffff; text-transform: uppercase;">NANCHOLI YOUTH ORGANISATION</h1>
                    </div>
                    <p>Empowering Youth Through Education, Healthcare, and Community Development</p>
                </div>
            </div>
            <div class="hero-slide">
                <img src="<?php echo $base_url; ?>/images/hero-2.jpg" alt="Hero Image 2" class="hero-image">
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <div style="margin-bottom: 1.5rem;">
                        <span style="display: block; font-size: 1.5rem; font-weight: 400; letter-spacing: 3px; margin-bottom: 0.5rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.7); color: #ffffff;">WELCOME TO</span>
                        <h1 style="font-size: 3rem; font-weight: 700; margin: 0.5rem 0 1.5rem 0; text-shadow: 2px 2px 4px rgba(0,0,0,0.7); letter-spacing: 2px; color: #ffffff; text-transform: uppercase;">NANCHOLI YOUTH ORGANISATION</h1>
                    </div>
                    <p>Providing Quality Healthcare in Blantyre</p>
                </div>
            </div>
            <div class="hero-slide">
                <img src="<?php echo $base_url; ?>/images/hero-3.jpg" alt="Hero Image 3" class="hero-image">
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <div style="margin-bottom: 1.5rem;">
                        <span style="display: block; font-size: 1.5rem; font-weight: 400; letter-spacing: 3px; margin-bottom: 0.5rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.7); color: #ffffff;">WELCOME TO</span>
                        <h1 style="font-size: 3rem; font-weight: 700; margin: 0.5rem 0 1.5rem 0; text-shadow: 2px 2px 4px rgba(0,0,0,0.7); letter-spacing: 2px; color: #ffffff; text-transform: uppercase;">NANCHOLI YOUTH ORGANISATION</h1>
                    </div>
                    <p>Supporting Education and Community Growth</p>
                </div>
            </div>
            <div class="hero-slide">
                <img src="<?php echo $base_url; ?>/images/hero-4.jpg" alt="Hero Image 4" class="hero-image">
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <div style="margin-bottom: 1.5rem;">
                        <span style="display: block; font-size: 1.5rem; font-weight: 400; letter-spacing: 3px; margin-bottom: 0.5rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.7); color: #ffffff;">WELCOME TO</span>
                        <h1 style="font-size: 3rem; font-weight: 700; margin: 0.5rem 0 1.5rem 0; text-shadow: 2px 2px 4px rgba(0,0,0,0.7); letter-spacing: 2px; color: #ffffff; text-transform: uppercase;">NANCHOLI YOUTH ORGANISATION</h1>
                    </div>
                    <p>Dedicated to Youth Empowerment and Healthcare Access</p>
                </div>
            </div>
            <div class="hero-slide">
                <img src="<?php echo $base_url; ?>/images/hero-5.jpg" alt="Hero Image 5" class="hero-image">
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <div style="margin-bottom: 1.5rem;">
                        <span style="display: block; font-size: 1.5rem; font-weight: 400; letter-spacing: 3px; margin-bottom: 0.5rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.7); color: #ffffff;">WELCOME TO</span>
                        <h1 style="font-size: 3rem; font-weight: 700; margin: 0.5rem 0 1.5rem 0; text-shadow: 2px 2px 4px rgba(0,0,0,0.7); letter-spacing: 2px; color: #ffffff; text-transform: uppercase;">NANCHOLI YOUTH ORGANISATION</h1>
                    </div>
                    <p>Building Stronger Communities Through Outreach Programs</p>
                </div>
            </div>
            <div class="hero-slide">
                <img src="<?php echo $base_url; ?>/images/hero-6.jpg" alt="Hero Image 6" class="hero-image">
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <div style="margin-bottom: 1.5rem;">
                        <span style="display: block; font-size: 1.5rem; font-weight: 400; letter-spacing: 3px; margin-bottom: 0.5rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.7); color: #ffffff;">WELCOME TO</span>
                        <h1 style="font-size: 3rem; font-weight: 700; margin: 0.5rem 0 1.5rem 0; text-shadow: 2px 2px 4px rgba(0,0,0,0.7); letter-spacing: 2px; color: #ffffff; text-transform: uppercase;">NANCHOLI YOUTH ORGANISATION</h1>
                    </div>
                    <p>Serving the Community Since 2004</p>
                </div>
            </div>
        </div>
        <div class="slider-controls">
            <div class="slider-arrow left-arrow" id="prev-slide">&#10094;</div>
            <div class="slider-dots">
                <span class="dot active" data-slide="0"></span>
                <span class="dot" data-slide="1"></span>
                <span class="dot" data-slide="2"></span>
                <span class="dot" data-slide="3"></span>
                <span class="dot" data-slide="4"></span>
                <span class="dot" data-slide="5"></span>
            </div>
            <div class="slider-arrow right-arrow" id="next-slide">&#10095;</div>
        </div>
    </section>

    <section class="our-approach">
        <h2>OUR APPROACH</h2>
        <p>Empowering youth and communities through healthcare access and education.</p>
    </section>

    <section class="services">
        <div class="service-grid">
            <div class="service-card">
                <img src="<?php echo $base_url; ?>/images/antenatal.jpg" alt="Antenatal Care">
                <h3><a href="<?php echo $base_url; ?>/antenatal.php">ANTENATAL<br>CARE</a></h3>
                <p>Supporting expectant mothers with comprehensive prenatal care services.</p>
                <a href="<?php echo $base_url; ?>/antenatal.php" class="btn view-more-btn">View More</a>
            </div>
            <div class="service-card">
                <img src="<?php echo $base_url; ?>/images/art.jpg" alt="ART Program">
                <h3><a href="<?php echo $base_url; ?>/art.php">ART<br>PROGRAM</a></h3>
                <p>Providing comprehensive care and support for people living with HIV/AIDS.</p>
                <a href="<?php echo $base_url; ?>/art.php" class="btn view-more-btn">View More</a>
            </div>
            <div class="service-card">
                <img src="<?php echo $base_url; ?>/images/youth-services.jpg" alt="Youth Friendly Services">
                <h3><a href="<?php echo $base_url; ?>/youth.php">YOUTH FRIENDLY<br>SERVICES</a></h3>
                <p>Offering specialized healthcare and support services for young people.</p>
                <a href="<?php echo $base_url; ?>/youth.php" class="btn view-more-btn">View More</a>
            </div>
        </div>

        <div class="service-grid">
            <div class="service-card">
                <img src="<?php echo $base_url; ?>/images/palliative.jpg" alt="Palliative Care">
                <h3><a href="<?php echo $base_url; ?>/palliative.php">PALLIATIVE<br>CARE</a></h3>
                <p>Providing compassionate care and support for those with serious illnesses.</p>
                <a href="<?php echo $base_url; ?>/palliative.php" class="btn view-more-btn">View More</a>
            </div>
            <div class="service-card">
                <img src="<?php echo $base_url; ?>/images/student.jpg" alt="Student Support">
                <h3><a href="<?php echo $base_url; ?>/student.php">STUDENT<br>SUPPORT</a></h3>
                <p>Helping students achieve their educational goals through various support programs.</p>
                <a href="<?php echo $base_url; ?>/student.php" class="btn view-more-btn">View More</a>
            </div>
            <div class="service-card">
                <img src="<?php echo $base_url; ?>/images/outreach.jpg" alt="Outreach Clinic">
                <h3><a href="<?php echo $base_url; ?>/outreach.php">OUTREACH<br>CLINIC</a></h3>
                <p>Bringing healthcare services directly to underserved communities.</p>
                <a href="<?php echo $base_url; ?>/outreach.php" class="btn view-more-btn">View More</a>
            </div>
        </div>
    </section>

    <section class="quote">
        <blockquote>
            "Access to Health Care is a basic human right. Everyone deserves it regardless of their economic background or geographical position"
        </blockquote>
        <cite>George Nedi - Executive Director</cite>
    </section>

    <section class="stats" style="padding: 4rem 0; background-color: #f9f9f9;">
        <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
            <h2 style="color: #008751; font-size: 2.5rem; font-weight: bold; margin-bottom: 1rem; text-align: center;">OUR IMPACT</h2>
            <p style="max-width: 800px; margin: 0 auto 3rem auto; font-size: 1.1rem; color: #555; text-align: center;">Since 2004, Nancholi Youth Organisation has been making a difference in communities across Malawi.</p>
            
            <div class="stats-container" style="display: flex; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
                <div class="stat-item" style="text-align: left; flex: 1; min-width: 200px; background-color: white; padding: 1.5rem; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.05);">
                    <h3 style="color: #555; margin-bottom: 0.5rem; font-size: 1.5rem;">Programs</h3>
                    <p class="number" data-target="6" style="color: #008751; font-size: 3.5rem; font-weight: bold; margin: 0;">6</p>
                </div>
                
                <div class="stat-item" style="text-align: center; flex: 1; min-width: 200px; background-color: white; padding: 1.5rem; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.05);">
                    <h3 style="color: #555; margin-bottom: 0.5rem; font-size: 1.5rem;">Districts</h3>
                    <p class="number" data-target="5" style="color: #008751; font-size: 3.5rem; font-weight: bold; margin: 0;">5</p>
                </div>
                
                <div class="stat-item" style="text-align: right; flex: 1; min-width: 200px; background-color: white; padding: 1.5rem; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.05);">
                    <h3 style="color: #555; margin-bottom: 0.5rem; font-size: 1.5rem;">Yearly Reach</h3>
                    <p class="number" data-target="35000+" style="color: #008751; font-size: 3.5rem; font-weight: bold; margin: 0;">35000+</p>
                </div>
            </div>
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
                        <img src="<?php echo $base_url; ?>/images/staff/george-nedi.jpg" alt="George Nedi">
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
                        <img src="<?php echo $base_url; ?>/images/staff/watson-shuzi.jpg" alt="Watson Shuzi">
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
                        <img src="<?php echo $base_url; ?>/images/staff/Patson.jpg" alt="Patson Gondwe">
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
                <a href="staff.php" class="btn view-more-btn">View More Staff</a>
            </div>
        </div>
    </section>

    <section class="youtube-links">
        <h2>OUR VIDEOS</h2>
        <div class="youtube-container">
            <div class="youtube-box">
                <iframe 
                    width="100%" 
                    height="200" 
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
                    height="200" 
                    src="https://www.youtube.com/embed/OpfboVkl6gs" 
                    title="NAYO Video 2"
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </section>
<section class="map-section" style="margin-top: 0; padding-top: 0;">
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