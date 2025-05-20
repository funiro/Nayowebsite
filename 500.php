<?php
// Start session first thing
session_start();
$page_title = "500 Internal Server Error | Nancholi Youth Organization";

// Include header
include_once 'includes/header.php';
?>
    <main style="text-align:center; padding:60px 20px;">
        <h1>500 - Internal Server Error</h1>
        <p>Sorry, something went wrong on our end. Please try again later.</p>
        <a href="index.php" class="btn">Return to Home</a>
    </main>
    <?php include_once 'includes/footer.php'; ?>
</body>
</html>
