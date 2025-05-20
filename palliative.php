<?php
// Start session first thing
session_start();
$page_title = "Palliative Care | End-of-Life Support | Nancholi Youth Organization";
// Include dynamic base URL configuration

?>

<?php include_once 'includes/header.php'; ?>

    <main class="program-content">
        <section class="program-hero">
            <h1>Palliative Care Program</h1>
            <div class="program-image">
                <img src="<?php echo $base_url; ?>/images/palliative.jpg" alt="Palliative Care Program">
            </div>
        </section>

        <section class="program-details">
            <div class="program-overview">
                <h2>Program Overview</h2>
                <p>Our Palliative Care program provides compassionate care and support for individuals living with serious illnesses. We focus on improving quality of life through pain management, emotional support, and comprehensive care services.</p>
            </div>

            <div class="program-services">
                <h2>Our Services</h2>
                <ul>
                    <li>Pain and Symptom Management</li>
                    <li>Emotional and Spiritual Support</li>
                    <li>Family Caregiver Support</li>
                    <li>Home-based Care Services</li>
                    <li>Medical Equipment Support</li>
                    <li>End-of-Life Care</li>
                </ul>
            </div>

            <div class="program-impact">
                <h2>Program Impact</h2>
                <div class="impact-stats">
                    <div class="stat-box">
                        <h3>Patients Supported</h3>
                        <p class="number">300+</p>
                    </div>
                    <div class="stat-box">
                        <h3>Home Visits Monthly</h3>
                        <p class="number">100+</p>
                    </div>
                    <div class="stat-box">
                        <h3>Caregivers Trained</h3>
                        <p class="number">50+</p>
                    </div>
                </div>
            </div>

            <div class="get-involved">
                <h2>Get Involved</h2>
                <p>Support our Palliative Care program through donations or volunteering. Your contribution helps us provide compassionate care to those living with serious illnesses in our community.</p>
                <div class="action-buttons">
                    <a href="https://www.every.org/nancholi-youth-organization?search_meta=" class="btn donate-btn">Donate Now</a>
                    <a href="volunteer.php" class="btn contact-btn">Volunteer</a>
                </div>
            </div>
        </section>

        <section class="gallery-section">
            <div class="gallery-container">
                <div class="gallery-grid">
                    <div class="gallery-item">
                        <img src="<?php echo $base_url; ?>/images/Gallery/Palliative/palliative-1.jpg" alt="Palliative Care Activity">
                    </div>
                    <div class="gallery-item">
                        <img src="<?php echo $base_url; ?>/images/Gallery/Palliative/palliative-2.jpg" alt="Palliative Care Support">
                    </div>
                    <div class="gallery-item">
                        <img src="<?php echo $base_url; ?>/images/Gallery/Palliative/palliative-3.jpg" alt="Palliative Care Team">
                    </div>
                    <div class="gallery-item">
                        <img src="<?php echo $base_url; ?>/images/Gallery/Palliative/palliative-4.jpg" alt="Palliative Care Service">
                    </div>
                    <div class="gallery-item">
                        <img src="<?php echo $base_url; ?>/images/Gallery/Palliative/palliative-5.jpg" alt="Palliative Care Program">
                    </div>
                    <div class="gallery-item">
                        <img src="<?php echo $base_url; ?>/images/Gallery/Palliative/palliative-6.jpg" alt="Palliative Care Outreach">
                    </div>
                    <div class="gallery-item">
                        <img src="<?php echo $base_url; ?>/images/Gallery/Palliative/Palliative-7.jpg" alt="Palliative Care Community">
                    </div>
                </div>
            </div>
        </section>

        <div class="program-faq">
            <h2>Frequently Asked Questions</h2>
            <div class="faq-container">
                <div class="faq-item">
                    <div class="faq-question">What is palliative care?</div>
                    <div class="faq-answer">
                        <p>Palliative care is specialized medical care for people living with serious illnesses. It focuses on providing relief from symptoms, pain, and stress, with the goal of improving quality of life for both the patient and their family.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">Who can receive palliative care?</div>
                    <div class="faq-answer">
                        <p>Palliative care is available to anyone living with a serious illness, regardless of age or stage of illness. It can be provided alongside curative treatment.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">What services are included in palliative care?</div>
                    <div class="faq-answer">
                        <p>Our palliative care services include pain management, emotional support, family caregiver support, home-based care, medical equipment support, and end-of-life care.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">How can I access palliative care services?</div>
                    <div class="faq-answer">
                        <p>You can access our palliative care services by contacting our office directly or through a referral from your healthcare provider. We will work with you to develop a care plan that meets your needs.</p>
                    </div>
                </div>
            </div>
        </div>

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

    <!-- Include footer -->
    <?php include 'includes/footer.php'; ?>
</body>
</html>
