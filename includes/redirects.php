<?php
/**
 * Handle URL redirects for SEO and broken links
 */
function handle_redirects() {
    // Get the current request URI
    $request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $request_uri = rtrim($request_uri, '/');
    
    // Define redirects (old URL => new URL)
    $redirects = [
        // Example: '/old-page' => '/new-page',
        // Add more redirects as needed
    ];
    
    // Check if current URL needs to be redirected
    if (array_key_exists($request_uri, $redirects)) {
        $new_url = $redirects[$request_uri];
        
        // If the URL is relative, prepend the base URL
        if (strpos($new_url, 'http') !== 0) {
            $new_url = $GLOBALS['base_url'] . $new_url;
        }
        
        // Perform 301 (permanent) redirect
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $new_url);
        exit();
    }
    
    // Handle common 404 cases
    $common_404s = [
        // Add common 404 URLs that should be redirected to the homepage
        // Example: '/nonexistent-page',
    ];
    
    if (in_array($request_uri, $common_404s)) {
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $GLOBALS['base_url']);
        exit();
    }
}

// Call the redirect handler
handle_redirects();
?>
