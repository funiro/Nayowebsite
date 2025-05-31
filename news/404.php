<?php
/**
 * 404 Not Found Page
 */

// Set the response code to 404
http_response_code(404);

// Set page title
$page_title = 'Page Not Found - NAYO';

// Include header
require_once __DIR__ . '/../includes/header.php';
?>

<main class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="error-404">
                    <h1 class="display-1 text-navy">404</h1>
                    <h2 class="h3 mb-4">Oops! Page Not Found</h2>
                    <p class="lead mb-4">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
                    <a href="<?php echo $base_url; ?>" class="btn btn-navy me-2">
                        <i class="fas fa-home me-1"></i> Back to Home
                    </a>
                    <a href="<?php echo $base_url; ?>/news/" class="btn btn-outline-navy">
                        <i class="fas fa-newspaper me-1"></i> View All News
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
// Include footer
require_once __DIR__ . '/../includes/footer.php';
?>
