<?php
// Start session first thing
session_start();
$page_title = "ART Program | HIV/AIDS Treatment & Care | Nancholi Youth Organization";
// Include dynamic base URL configuration

?>

<?php include_once 'includes/header.php'; ?>

    <main class="program-content">
        <section class="program-hero">
            <h1>ART Program</h1>
            <div class="program-image">
                <img src="<?php echo $base_url; ?>/images/art.jpg" alt="ART Program">
            </div>
        </section>

        <section class="program-details">
            <div class="program-overview">
                <h2>Program Overview</h2>
                <p>Our ART (Antiretroviral Therapy) program provides comprehensive care and support for people living with HIV/AIDS. We ensure access to life-saving medications and ongoing healthcare services to improve quality of life and reduce transmission.</p>
            </div>

            <div class="program-services">
                <h2>Our Services</h2>
                <ul>
                    <li>Access to Antiretroviral Medications</li>
                    <li>Regular Health Monitoring</li>
                    <li>Adherence Counseling</li>
                    <li>Nutritional Support</li>
                    <li>Psychosocial Support</li>
                    <li>Referral to Specialized Care</li>
                </ul>
            </div>

            <div class="program-impact">
                <h2>Program Impact</h2>
                <div class="impact-stats">
                    <div class="stat-box">
                        <h3>Patients on ART</h3>
                        <p class="number">500+</p>
                    </div>
                    <div class="stat-box">
                        <h3>Adherence Rate</h3>
                        <p class="number">95%</p>
                    </div>
                    <div class="stat-box">
                        <h3>Monthly Consultations</h3>
                        <p class="number">150+</p>
                    </div>
                </div>
            </div>

            <div class="get-involved">
                <h2>Get Involved</h2>
                <p>Support our ART program through donations or volunteering. Your contribution helps us provide essential medications and care to those living with HIV/AIDS in our community.</p>
                <div class="action-buttons">
                    <a href="https://www.every.org/nancholi-youth-organization?search_meta=" class="btn donate-btn">Donate Now</a>
                    <a href="volunteer.php" class="btn contact-btn">Volunteer</a>
                </div>
            </div>

            <!-- FAQ Section -->
            <section class="program-faq">
                <h2>Frequently Asked Questions</h2>
                <div class="faq-container">
                    <div class="faq-item">
                        <div class="faq-question">Who can access ART services at NAYO?</div>
                        <div class="faq-answer">
                            <p>Anyone living with HIV/AIDS in our catchment area can access ART services. We provide care regardless of age, gender, or background.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">What is ART?</div>
                        <div class="faq-answer">
                            <p>ART stands for Antiretroviral Therapy, a treatment for HIV/AIDS that helps people live longer, healthier lives and reduces the risk of transmission.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">Is ART treatment free at NAYO?</div>
                        <div class="faq-answer">
                            <p>Yes, all ART services provided by NAYO are free of charge to clients.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">How do I enroll in the ART program?</div>
                        <div class="faq-answer">
                            <p>Visit our facility or contact us directly. Our team will guide you through the enrollment process and provide the necessary support.</p>
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
