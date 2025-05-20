<?php
// Start session first thing
session_start();
$page_title = "Outreach Programs | Community Health Services | Nancholi Youth Organization";
// Include dynamic base URL configuration

?>

<?php include_once 'includes/header.php'; ?>

    <main class="program-content">
        <section class="program-hero">
            <h1>Community Outreach Program</h1>
            <div class="program-image">
                <img src="<?php echo $base_url; ?>/images/outreach.jpg" alt="Community Outreach Program">
            </div>
        </section>

        <section class="program-details">
            <div class="program-overview">
                <h2>Program Overview</h2>
                <p>Our Outreach Programs bring essential healthcare services directly to underserved communities. We work to ensure that quality healthcare is accessible to everyone, regardless of their location or economic status.</p>
            </div>

            <div class="program-services">
                <h2>Our Services</h2>
                <ul>
                    <li>Mobile Health Clinics</li>
                    <li>Community Health Education</li>
                    <li>HIV Testing and Counseling</li>
                    <li>Basic Health Screenings</li>
                    <li>Vaccination Programs</li>
                    <li>Health Awareness Campaigns</li>
                </ul>
            </div>

            <div class="program-impact">
                <h2>Program Impact</h2>
                <div class="impact-stats">
                    <div class="stat-box">
                        <h3>Communities Reached</h3>
                        <p class="number">15+</p>
                    </div>
                    <div class="stat-box">
                        <h3>Monthly Outreach Events</h3>
                        <p class="number">8+</p>
                    </div>
                    <div class="stat-box">
                        <h3>People Served</h3>
                        <p class="number">5000+</p>
                    </div>
                </div>
            </div>

            <div class="get-involved">
                <h2>Get Involved</h2>
                <p>Support our Outreach Programs through donations or volunteering. Your contribution helps us bring healthcare services to underserved communities.</p>
                <div class="action-buttons">
                    <a href="https://www.every.org/nancholi-youth-organization?search_meta=" class="btn donate-btn">Donate Now</a>
                    <a href="<?php echo $base_url; ?>/volunteer.php" class="btn contact-btn">Volunteer</a>
                </div>
            </div>

            <div class="program-faq">
                <h2>Frequently Asked Questions</h2>
                <div class="faq-container">
                    <div class="faq-item">
                        <div class="faq-question">How often do you conduct outreach programs?</div>
                        <div class="faq-answer">
                            <p>We conduct outreach programs monthly, visiting different communities to ensure regular access to healthcare services.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">What services are available during outreach?</div>
                        <div class="faq-answer">
                            <p>Our outreach programs offer various services including health screenings, HIV testing, vaccinations, and health education sessions.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">How can my community request an outreach program?</div>
                        <div class="faq-answer">
                            <p>Communities can request our services by contacting our office directly. We assess requests based on need and available resources.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">Are outreach services free?</div>
                        <div class="faq-answer">
                            <p>Yes, all services provided during our outreach programs are free of charge to ensure accessibility for all community members.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Include footer -->
    <?php include 'includes/footer.php'; ?>
</body>
</html>
