<?php
// Start session first thing
session_start();
$page_title = "Thank You | Nancholi Youth Organization";

// Include header
include_once 'includes/header.php';
?>

    <main>
        <section class="thank-you-section">
            <div class="thank-you-container">
                <h1>Thank You!</h1>
                <p>Your submission has been received. We appreciate your support and will get back to you soon.</p>
                <div class="thank-you-actions">
                    <a href="index.php" class="btn">Return to Home</a>
                    <a href="https://www.every.org/nancholi-youth-organization?search_meta=" class="btn">Make a Donation</a>
                </div>
            </div>
        </section>
    </main>

    <?php include_once 'includes/footer.php'; ?>
</body>
</html>
