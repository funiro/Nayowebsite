<?php
// Start session first thing
session_start();
$page_title = "Antenatal Care | Maternal Health Services | Nancholi Youth Organization";
// Include dynamic base URL configuration

?>

<?php include_once 'includes/header.php'; ?>

    <main class="program-content">
        <section class="program-hero">
            <h1>Antenatal Care Program</h1>
            <div class="program-image">
                <img src="<?php echo $base_url; ?>/images/antenatal.jpg" alt="Antenatal Care Program">
            </div>
        </section>

        <section class="program-details">
            <div class="program-overview">
                <h2>Program Overview</h2>
                <p>Our Antenatal Care program provides essential healthcare services to expectant mothers, ensuring healthy pregnancies and safe deliveries. We focus on comprehensive care and support throughout pregnancy.</p>
            </div>

            <div class="program-services">
                <h2>Our Services</h2>
                <ul>
                    <li>Regular Health Check-ups</li>
                    <li>Nutritional Counseling</li>
                    <li>Pregnancy Education and Support</li>
                    <li>Birth Preparedness Planning</li>
                    <li>Maternal Health Monitoring</li>
                    <li>Post-natal Care Support</li>
                </ul>
            </div>

            <div class="program-impact">
                <h2>Program Impact</h2>
                <div class="impact-stats">
                    <div class="stat-box">
                        <h3>Mothers Supported</h3>
                        <p class="number">800+</p>
                    </div>
                    <div class="stat-box">
                        <h3>Successful Deliveries</h3>
                        <p class="number">98%</p>
                    </div>
                    <div class="stat-box">
                        <h3>Monthly Check-ups</h3>
                        <p class="number">200+</p>
                    </div>
                </div>
            </div>

            <div class="get-involved">
                <h2>Get Involved</h2>
                <p>Support our Antenatal Care program through donations or volunteering. Your contribution helps ensure healthy mothers and babies in our community.</p>
                <div class="action-buttons">
                    <a href="https://www.every.org/nancholi-youth-organization?search_meta=" class="btn donate-btn">Donate Now</a>
                    <a href="<?php echo $base_url; ?>/volunteer.php" class="btn contact-btn">Volunteer</a>
                </div>
            </div>

            <!-- FAQ Section -->
            <section class="program-faq">
                <h2>Frequently Asked Questions</h2>
                <div class="faq-container">
                    <div class="faq-item">
                        <div class="faq-question">Who can access Antenatal Care at NAYO?</div>
                        <div class="faq-answer">
                            <p>All expectant mothers in our community are welcome to access our antenatal care services.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">What services are included in Antenatal Care?</div>
                        <div class="faq-answer">
                            <p>We provide regular health check-ups, nutritional counseling, pregnancy education, birth preparedness, and post-natal support.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">Is antenatal care free at NAYO?</div>
                        <div class="faq-answer">
                            <p>Yes, all antenatal care services at NAYO are provided free of charge to our clients.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">How do I enroll in the Antenatal Care program?</div>
                        <div class="faq-answer">
                            <p>You can enroll by visiting our facility or contacting us directly. Our staff will assist you with the process.</p>
                        </div>
                    </div>
                </div>
            </section>
        </section>

        <section class="gallery-section">
            <div class="gallery-container">
                <div class="gallery-grid">
                    <div class="gallery-item">
                        <img src="<?php echo $base_url; ?>/images/Gallery/Antinetal/antinatal-1.jpg" alt="Antenatal Care Activity">
                    </div>
                    <div class="gallery-item">
                        <img src="<?php echo $base_url; ?>/images/Gallery/Antinetal/antinatal-2.jpg" alt="Antenatal Care Support">
                    </div>
                    <div class="gallery-item">
                        <img src="<?php echo $base_url; ?>/images/Gallery/Antinetal/antinatal-3.jpg" alt="Antenatal Care Team">
                    </div>
                    <div class="gallery-item">
                        <img src="<?php echo $base_url; ?>/images/Gallery/Antinetal/antinatal-4.jpg" alt="Antenatal Care Service">
                    </div>
                    <div class="gallery-item">
                        <img src="<?php echo $base_url; ?>/images/Gallery/Antinetal/antinatal-5.jpg" alt="Antenatal Care Program">
                    </div>
                    <div class="gallery-item">
                        <img src="<?php echo $base_url; ?>/images/Gallery/Antinetal/antinatal-6.jpg" alt="Antenatal Care Outreach">
                    </div>
                    <div class="gallery-item">
                        <img src="<?php echo $base_url; ?>/images/Gallery/Antinetal/antinatal-7.jpg" alt="Antenatal Care Community">
                    </div>
                </div>
            </div>
        </section>

        <!-- Lightbox Modal -->
        <div class="lightbox-modal">
            <div class="lightbox-content">
                <span class="lightbox-close">&times;</span>
                <img src="" alt="">
                <div class="lightbox-nav">
                    <button class="lightbox-prev">❮</button>
                    <button class="lightbox-next">❯</button>
                </div>
            </div>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
