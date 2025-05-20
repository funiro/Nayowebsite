<?php
// Start session first thing
session_start();
$page_title = "404 Not Found | Nancholi Youth Organization";

// Include header
include_once 'includes/header.php';
?>
    <main style="text-align:center; padding:60px 20px;">
        <h1>404 - Page Not Found</h1>
        <p>Sorry, the page you are looking for does not exist or has been moved.</p>
        <a href="index.php" class="btn">Return to Home</a>
    </main>
    <?php include_once 'includes/footer.php'; ?>
</body>
</html>
