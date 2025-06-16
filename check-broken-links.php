<?php
/**
 * Broken Link Checker for NAYO Website
 * 
 * This script checks for broken internal links on the website.
 * Run this script from the command line: php check-broken-links.php
 */

// Base URL of the website
$base_url = 'http://localhost/dashboard/nayo-website';

// Maximum pages to check (for testing, set to 0 for no limit)
$max_pages = 100;

// Array to store checked URLs and their status
$checked_urls = [];
$broken_links = [];
$queue = [];

// Start with the homepage
$queue[] = $base_url . '/';

// Function to check a single URL
function check_url($url) {
    global $base_url, $checked_urls, $broken_links;
    
    // Skip if already checked
    if (isset($checked_urls[$url])) {
        return;
    }
    
    echo "Checking: $url\n";
    
    // Initialize cURL
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    
    // Execute the request
    curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $effective_url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    
    // Close cURL
    curl_close($ch);
    
    // Store the result
    $checked_urls[$url] = [
        'status' => $http_code,
        'effective_url' => $effective_url
    ];
    
    // Check for errors
    if ($http_code >= 400) {
        $broken_links[] = [
            'url' => $url,
            'status' => $http_code,
            'referrer' => 'Manual check'
        ];
        echo "  -> Broken: $http_code\n";
    } else {
        echo "  -> OK: $http_code\n";
    }
}

// Function to extract links from HTML
function extract_links($html, $base_url) {
    $links = [];
    
    // Create a DOM document
    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    
    // Get all anchor tags
    $anchors = $dom->getElementsByTagName('a');
    
    foreach ($anchors as $a) {
        $href = $a->getAttribute('href');
        
        // Skip empty links and anchors
        if (empty($href) || $href === '#' || strpos($href, 'javascript:') === 0) {
            continue;
        }
        
        // Convert relative URLs to absolute
        if (strpos($href, 'http') !== 0) {
            if ($href[0] === '/') {
                $href = $base_url . $href;
            } else {
                $href = rtrim($base_url, '/') . '/' . ltrim($href, '/');
            }
        }
        
        // Only include internal links
        if (strpos($href, $base_url) === 0) {
            $links[] = $href;
        }
    }
    
    return $links;
}

// Main loop
$count = 0;
while (!empty($queue) && ($max_pages === 0 || $count < $max_pages)) {
    $url = array_shift($queue);
    
    // Skip if already checked
    if (isset($checked_urls[$url])) {
        continue;
    }
    
    // Check the URL
    check_url($url);
    $count++;
    
    // If it's an HTML page, extract and queue links
    if (strpos($url, '.') === false || strpos($url, '.php') !== false || strpos($url, '.html') !== false) {
        $html = @file_get_contents($url);
        
        if ($html !== false) {
            $links = extract_links($html, $base_url);
            
            // Add new links to the queue
            foreach ($links as $link) {
                if (!isset($checked_urls[$link]) && !in_array($link, $queue)) {
                    $queue[] = $link;
                }
            }
        }
    }
}

// Output results
echo "\n\n=== Broken Links Report ===\n";
echo "Checked URLs: " . count($checked_urls) . "\n";
echo "Broken links: " . count($broken_links) . "\n\n";

if (!empty($broken_links)) {
    echo "Broken Links:\n";
    foreach ($broken_links as $link) {
        echo "- {$link['url']} (Status: {$link['status']})\n";
    }
}

echo "\nScan complete.\n";

// Save results to a file
$report = "=== Broken Links Report ===\n";
$report .= "Generated on: " . date('Y-m-d H:i:s') . "\n";
$report .= "Base URL: $base_url\n";
$report .= "Checked URLs: " . count($checked_urls) . "\n";
$report .= "Broken links: " . count($broken_links) . "\n\n";

if (!empty($broken_links)) {
    $report .= "Broken Links:\n";
    foreach ($broken_links as $link) {
        $report .= "- {$link['url']} (Status: {$link['status']})\n";
    }
}

file_put_contents('broken-links-report.txt', $report);
echo "\nReport saved to: broken-links-report.txt\n";
