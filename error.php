<?php
// Set the response code
$status_codes = [
    400 => 'Bad Request',
    401 => 'Unauthorized',
    403 => 'Forbidden',
    404 => 'Page Not Found',
    500 => 'Internal Server Error'
];

$status_code = isset($_GET['code']) ? (int)$_GET['code'] : 404;
if (!array_key_exists($status_code, $status_codes)) {
    $status_code = 500;
}

http_response_code($status_code);
$status_text = $status_codes[$status_code];

// Set page title
$page_title = "$status_code $status_text - NAYO";

// Include header
include 'includes/header.php';
?>

<main class="error-page">
    <div class="error-container">
        <h1><?php echo $status_code; ?></h1>
        <h2><?php echo $status_text; ?></h2>
        
        <?php if ($status_code === 404): ?>
            <p>Oops! The page you're looking for doesn't exist or has been moved.</p>
        <?php elseif ($status_code === 500): ?>
            <p>We're experiencing some technical difficulties. Please try again later.</p>
        <?php else: ?>
            <p><?php echo $status_text; ?></p>
        <?php endif; ?>
        
        <a href="/" class="btn btn-primary">Return to Homepage</a>
    </div>
</main>

<style>
.error-page {
    min-height: 60vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 2rem;
}

.error-container {
    max-width: 600px;
    margin: 0 auto;
}

.error-container h1 {
    font-size: 8rem;
    font-weight: 700;
    color: #006b41;
    margin: 0;
    line-height: 1;
}

.error-container h2 {
    font-size: 2rem;
    margin: 1rem 0;
    color: #333;
}

.error-container p {
    font-size: 1.2rem;
    color: #666;
    margin-bottom: 2rem;
}

.btn-primary {
    display: inline-block;
    background-color: #006b41;
    color: white;
    padding: 0.8rem 1.5rem;
    border-radius: 4px;
    text-decoration: none;
    font-weight: 600;
    transition: background-color 0.3s;
}

.btn-primary:hover {
    background-color: #005a37;
}

@media (max-width: 768px) {
    .error-container h1 {
        font-size: 6rem;
    }
    
    .error-container h2 {
        font-size: 1.5rem;
    }
    
    .error-container p {
        font-size: 1rem;
    }
}
</style>

<?php include 'includes/footer.php'; ?>
