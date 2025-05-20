<?php
// Start session first thing
session_start();
$page_title = "Youth Friendly Services - Nancholi Youth Organization";
// Include dynamic base URL configuration

?>

<?php include_once 'includes/header.php'; ?>

    <main class="program-content">
        <section class="program-hero">
            <h1>Youth Friendly Services</h1>
            <div class="program-image">
                <img src="<?php echo $base_url; ?>/images/youth.jpg" alt="Youth Friendly Services">
            </div>
        </section>

        <section class="program-details">
            <div class="program-overview">
                <h2>Program Overview</h2>
                <p>Nancholi Youth Organization (NAYO) has been at the forefront of combating HIV/AIDS in Nancholi and beyond since 2004. We implement impactful programs aimed at reducing the spread of HIV/AIDS, from childbirth to affected adults, thereby improving the overall health of our community.</p>
                <p>Through collaboration with numerous partners, we've created a stigma-free environment where youth and senior citizens can access HIV prevention measures and treatment without fear or judgment. With HIV prevalence rates still high among youth, we're working to establish a Youth-Friendly Health Services Hub—the first of its kind—to provide easy access to sexual and reproductive health services.</p>
            </div>

            <section class="program-gallery">
                <h2>Our Youth-Friendly Environment</h2>
                <div class="gallery-container">
                    <div class="gallery-item">
                        <img src="<?php echo $base_url; ?>/images/youth-friendly2.jpg" alt="Youth-friendly services in action">
                        <div class="gallery-caption">Empowering youth through health education and support</div>
                    </div>
                    <div class="gallery-item">
                        <img src="<?php echo $base_url; ?>/images/youth-friendly3.jpg" alt="Youth engagement activities">
                        <div class="gallery-caption">Creating safe spaces for youth engagement</div>
                    </div>
                    <div class="gallery-item">
                        <img src="<?php echo $base_url; ?>/images/outreach.jpg" alt="Youth community outreach">
                        <div class="gallery-caption">Community outreach and youth empowerment programs</div>
                    </div>
                </div>
            </section>

            <div class="program-services">
                <h2>Our Services</h2>
                <ul>
                    <li>HIV testing and counseling</li>
                    <li>Access to contraceptives</li>
                    <li>Sexual and reproductive health education</li>
                    <li>Referrals to specialized care</li>
                    <li>Support for people living with HIV/AIDS</li>
                    <li>Prevention of mother-to-child transmission</li>
                </ul>
            </div>

            <section class="impact-section">
                <div class="impact-container">
                    <h2 class="impact-heading">OUR IMPACT</h2>
                    <p class="impact-subheading">Since 2004, NAYO has been making significant strides in youth development and healthcare.</p>
                    
                    <div class="stats-container">
                        <div class="stat-item">
                            <h3>Youth Reached</h3>
                            <p class="stat-number" data-target="5000">5,000+</p>
                        </div>
                        
                        <div class="stat-item">
                            <h3>Testing Services</h3>
                            <p class="stat-number" data-target="2500">2,500+</p>
                        </div>
                        
                        <div class="stat-item">
                            <h3>Support Groups</h3>
                            <p class="stat-number" data-target="15">15+</p>
                        </div>
                    </div>
                    
                    <div class="achievement-box" style="background: white; padding: 2rem; border-radius: 10px; margin-top: 2rem; box-shadow: 0 4px 8px rgba(0,0,0,0.05);">
                        <h3 style="color: #008751; margin-top: 0; margin-bottom: 1rem; font-size: 1.5rem;">Our Achievements</h3>
                        <ul style="padding-left: 1.5rem; margin: 0; color: #555; line-height: 1.8;">
                            <li>Creating stigma-free healthcare environments</li>
                            <li>Providing accessible HIV/AIDS prevention and treatment</li>
                            <li>Supporting vulnerable community members</li>
                            <li>Empowering youth through health education</li>
                        </ul>
                    </div>
                </div>
            </section>

            <div class="get-involved">
                <h2>Get Involved</h2>
                <p>Support our Youth Friendly Services program through donations or volunteering. Your contribution helps us provide essential health services and education to young people in our community.</p>
                <div class="action-buttons">
                    <a href="https://www.every.org/nancholi-youth-organization?search_meta=" class="btn donate-btn">Donate Now</a>
                    <a href="<?php echo $base_url; ?>/volunteer.php" class="btn contact-btn">Volunteer</a>
                </div>
            </div>
            
            <section class="program-faq">
                <h2>Frequently Asked Questions</h2>
                <div class="faq-container">
                    <div class="faq-item">
                        <div class="faq-question">What are Youth-Friendly Health Services?</div>
                        <div class="faq-answer">
                            <p>Youth-Friendly Health Services are designed to meet the specific needs of young people, providing a safe and supportive environment where they can access healthcare without judgment or discrimination.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">What services are available for youth?</div>
                        <div class="faq-answer">
                            <p>Our youth-friendly services include HIV testing and counseling, access to contraceptives, sexual and reproductive health education, and support for youth living with HIV/AIDS.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">Is the service confidential?</div>
                        <div class="faq-answer">
                            <p>Yes, all our services are completely confidential. We create a safe and non-judgmental environment where youth can seek help without fear of stigma.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">How can I access these services?</div>
                        <div class="faq-answer">
                            <p>You can visit our center in Nancholi, Blantyre, during operating hours or contact us to learn about our mobile outreach programs that bring services directly to communities. All services are provided in a confidential and supportive environment.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">Why is a Youth-Friendly Health Services Hub important?</div>
                        <div class="faq-answer">
                            <p>The HIV prevalence rate among youth remains high. A Youth-Friendly Health Services Hub provides easy access to sexual and reproductive health services tailored specifically for young people, encouraging education, prevention, and early treatment.</p>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>

    <!-- Include footer -->
    <?php include 'includes/footer.php'; ?>
</body>
</html>
