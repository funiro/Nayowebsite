<?php
// Include base URL configuration
require_once 'base_url.php';

// Set the content type to XML
header('Content-Type: application/xml; charset=utf-8');

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
        http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    
    <?php
    // Get the base URL
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domain = $_SERVER['HTTP_HOST'];
    $base_url = $protocol . $domain . $base_url;
    
    // Define the pages to include in the sitemap
    $pages = [
        ['loc' => '/', 'priority' => '1.0', 'changefreq' => 'daily'],
        ['loc' => '/about', 'priority' => '0.8', 'changefreq' => 'monthly'],
        ['loc' => '/programs', 'priority' => '0.8', 'changefreq' => 'weekly'],
        ['loc' => '/news', 'priority' => '0.8', 'changefreq' => 'weekly'],
        ['loc' => '/events', 'priority' => '0.8', 'changefreq' => 'weekly'],
        ['loc' => '/contact', 'priority' => '0.7', 'changefreq' => 'monthly'],
        ['loc' => '/staff', 'priority' => '0.6', 'changefreq' => 'monthly'],
        // Add more pages as needed
    ];
    
    // Output each URL in the sitemap
    foreach ($pages as $page) {
        echo "<url>\n";
        echo "    <loc>" . htmlspecialchars($base_url . $page['loc']) . "</loc>\n";
        echo "    <lastmod>" . date('Y-m-d') . "</lastmod>\n";
        echo "    <changefreq>" . $page['changefreq'] . "</changefreq>\n";
        echo "    <priority>" . $page['priority'] . "</priority>\n";
        echo "</url>\n";
    }
    ?>
    
</urlset>
