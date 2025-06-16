<?php
// Set the 404 status code
http_response_code(404);

// Start session first thing
session_start();
$page_title = "404 Page Not Found | Nancholi Youth Organization";
$page_description = "The page you're looking for doesn't exist or has been moved. Find the information you need on our website.";

// Include header
include_once 'includes/header.php';
?>
<main class="error-page">
    <div class="container">
        <div class="error-content">
            <h1>404</h1>
            <h2>Page Not Found</h2>
            <p>We're sorry, but the page you're looking for doesn't exist or has been moved.</p>
            <div class="error-actions">
                <a href="<?php echo $base_url; ?>" class="btn">Return to Home</a>
                <a href="<?php echo $base_url; ?>/about" class="btn btn-outline">About Us</a>
                <a href="<?php echo $base_url; ?>/contact" class="btn btn-outline">Contact Us</a>
            </div>
            <div class="search-box">
                <p>Or try searching for what you're looking for:</p>
                <form action="<?php echo $base_url; ?>/search" method="get" class="search-form">
                    <input type="search" name="q" placeholder="Search our website..." required>
                    <button type="submit" class="search-button">Search</button>
                </form>
            </div>
        </div>
    </div>
</main>

<style>
.error-page {
    min-height: 60vh;
    display: flex;
    align-items: center;
    padding: 4rem 0;
    background: #f9f9f9;
}

.error-content {
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
    padding: 2rem;
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 15px rgba(0,0,0,0.1);
}

.error-content h1 {
    font-size: 8rem;
    margin: 0;
    color: var(--primary-color);
    line-height: 1;
}

.error-content h2 {
    font-size: 2.5rem;
    margin: 0 0 1rem;
    color: #333;
}

.error-content p {
    font-size: 1.2rem;
    color: #666;
    margin-bottom: 2rem;
}

.error-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    margin-bottom: 2rem;
    flex-wrap: wrap;
}

.search-box {
    margin-top: 2rem;
    padding-top: 2rem;
    border-top: 1px solid #eee;
}

.search-form {
    display: flex;
    max-width: 500px;
    margin: 1rem auto 0;
}

.search-form input[type="search"] {
    flex: 1;
    padding: 0.75rem 1rem;
    border: 1px solid #ddd;
    border-radius: 4px 0 0 4px;
    font-size: 1rem;
}

.search-button {
    background-color: var(--primary-color);
    color: white;
    border: none;
    padding: 0 1.5rem;
    border-radius: 0 4px 4px 0;
    cursor: pointer;
    font-weight: 600;
    transition: background-color 0.3s;
}

.search-button:hover {
    background-color: #005a3c;
}

@media (max-width: 768px) {
    .error-content {
        padding: 1.5rem;
    }
    
    .error-content h1 {
        font-size: 5rem;
    }
    
    .error-content h2 {
        font-size: 2rem;
    }
    
    .error-actions {
        flex-direction: column;
        gap: 0.75rem;
    }
    
    .error-actions .btn {
        width: 100%;
    }
}
</style>

<?php include_once 'includes/footer.php'; ?>
