<?php
/**
 * News Article Router
 * 
 * Handles routing for news articles and categories
 */

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include necessary files
require_once __DIR__ . '/../includes/cms_functions.php';

// Get the base URL path
$base_path = rtrim(dirname(dirname($_SERVER['SCRIPT_NAME'])), '/');

// Get the requested path
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request_uri = str_replace($base_path, '', $request_uri);
$request_uri = trim($request_uri, '/');
$path_parts = explode('/', $request_uri);

// Debug output (uncomment if needed)
// echo "<pre>Request URI: "; print_r($request_uri); echo "</pre>";
// echo "<pre>Path parts: "; print_r($path_parts); echo "</pre>";

// Handle different types of requests
if (empty($path_parts[0]) || $path_parts[0] === 'news') {
    // News index
    if (isset($path_parts[1]) && is_numeric($path_parts[1])) {
        // News pagination: /news/2
        $_GET['page'] = (int)$path_parts[1];
    } elseif (isset($path_parts[1]) && $path_parts[1] === 'page' && isset($path_parts[2]) && is_numeric($path_parts[2])) {
        // News pagination: /news/page/2
        $_GET['page'] = (int)$path_parts[2];
    }
    
    require __DIR__ . '/index.php';
    exit;
} elseif (isset($path_parts[0]) && $path_parts[0] === 'news' && !empty($path_parts[1])) {
    // Handle /news/article-slug
    $slug = $path_parts[1];
    $article_file = __DIR__ . '/articles/' . $slug . '.md';
    
    // Debug output (uncomment if needed)
    // error_log("Looking for article file: " . $article_file);
    
    if (file_exists($article_file)) {
        // Parse the article
        $article = parse_markdown_article($article_file);
        
        if ($article) {
            // Set the page title
            $page_title = $article['title'] . ' - NAYO News';
            
            // Include header, template, and footer
            require_once __DIR__ . '/../includes/header.php';
            require __DIR__ . '/template.php';
            require_once __DIR__ . '/../includes/footer.php';
            exit;
        } else {
            error_log("Failed to parse article: " . $article_file);
        }
    } else {
        error_log("Article file not found: " . $article_file);
    }
}

// If we get here, the page wasn't found
header('HTTP/1.0 404 Not Found');
require __DIR__ . '/404.php';
?>
