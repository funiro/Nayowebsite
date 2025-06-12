<?php
/**
 * SEO Check Tool for NAYO Website
 * This script checks various SEO elements on the website
 */

// Function to check if URL exists
function urlExists($url) {
    $handle = curl_init($url);
    curl_setopt($handle, CURLOPT_HEADER, true);
    curl_setopt($handle, CURLOPT_NOBODY, true);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($handle, CURLOPT_TIMEOUT, 10);
    
    $response = curl_exec($handle);
    $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
    curl_close($handle);
    
    return $httpCode >= 200 && $httpCode < 400;
}

// Function to get page content
function getPageContent($url) {
    return @file_get_contents($url);
}

// Function to check for meta tags
function checkMetaTags($url) {
    $content = getPageContent($url);
    $checks = [
        'title' => preg_match('/<title>[^<]+<\/title>/i', $content),
        'meta_description' => preg_match('/<meta\s+name=[\'\"]description[\'\"][^>]+content=[\'\"]([^\'\"]+)[\'\"]/i', $content, $matches),
        'og_title' => preg_match('/<meta\s+property=[\'\"]og:title[\'\"][^>]+content=[\'\"]([^\'\"]+)[\'\"]/i', $content, $matches),
        'og_description' => preg_match('/<meta\s+property=[\'\"]og:description[\'\"][^>]+content=[\'\"]([^\'\"]+)[\'\"]/i', $content, $matches),
        'og_image' => preg_match('/<meta\s+property=[\'\"]og:image[\'\"][^>]+content=[\'\"]([^\'\"]+)[\'\"]/i', $content, $matches),
        'canonical' => preg_match('/<link\s+rel=[\'\"]canonical[\'\"][^>]+href=[\'\"]([^\'\"]+)[\'\"]/i', $content, $matches)
    ];
    return $checks;
}

// Base URL
$base_url = 'https://nayomalawi.org';
$pages = [
    '/',
    '/about',
    '/contact',
    '/news',
    '/projects',
    '/volunteer',
    '/donate'
];

// Check each page
$results = [];
foreach ($pages as $page) {
    $url = rtrim($base_url, '/') . $page;
    $results[$url] = [
        'exists' => urlExists($url),
        'meta' => urlExists($url) ? checkMetaTags($url) : []
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NAYO SEO Check</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; margin: 20px; }
        h1 { color: #006b41; }
        .check { margin: 20px 0; padding: 15px; border: 1px solid #ddd; border-radius: 4px; }
        .passed { background-color: #e8f5e9; border-left: 5px solid #4caf50; }
        .failed { background-color: #ffebee; border-left: 5px solid #f44336; }
        .meta-check { margin: 5px 0; padding: 5px; }
        .meta-check.passed::before { content: "✓ "; color: #4caf50; }
        .meta-check.failed::before { content: "✗ "; color: #f44336; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f5f5f5; }
        tr:hover { background-color: #f5f5f5; }
    </style>
</head>
<body>
    <h1>NAYO Website SEO Check</h1>
    <p>Last checked: <?php echo date('Y-m-d H:i:s'); ?></p>
    
    <h2>Page Checks</h2>
    <table>
        <tr>
            <th>URL</th>
            <th>Status</th>
            <th>Meta Tags</th>
        </tr>
        <?php foreach ($results as $url => $result): ?>
        <tr>
            <td><a href="<?php echo htmlspecialchars($url); ?>" target="_blank"><?php echo htmlspecialchars($url); ?></a></td>
            <td>
                <?php if ($result['exists']): ?>
                    <span style="color: #4caf50;">✓ Accessible (200 OK)</span>
                <?php else: ?>
                    <span style="color: #f44336;">✗ Not Accessible</span>
                <?php endif; ?>
            </td>
            <td>
                <?php if ($result['exists']): ?>
                    <div class="meta-check <?php echo $result['meta']['title'] ? 'passed' : 'failed'; ?>">Title Tag</div>
                    <div class="meta-check <?php echo $result['meta']['meta_description'] ? 'passed' : 'failed'; ?>">Meta Description</div>
                    <div class="meta-check <?php echo $result['meta']['og_title'] ? 'passed' : 'failed'; ?>">OG Title</div>
                    <div class="meta-check <?php echo $result['meta']['og_description'] ? 'passed' : 'failed'; ?>">OG Description</div>
                    <div class="meta-check <?php echo $result['meta']['og_image'] ? 'passed' : 'failed'; ?>">OG Image</div>
                    <div class="meta-check <?php echo $result['meta']['canonical'] ? 'passed' : 'failed'; ?>">Canonical URL</div>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    
    <h2>Important SEO Files</h2>
    <table>
        <tr>
            <th>File</th>
            <th>Status</th>
        </tr>
        <?php
        $files = [
            '/robots.txt' => 'Robots.txt file',
            '/sitemap.xml' => 'Sitemap XML file',
            '/sitemap_index.xml' => 'Sitemap Index',
            '/.htaccess' => 'HTAccess file',
            '/favicon.ico' => 'Favicon',
            '/browserconfig.xml' => 'Browser Configuration',
            '/site.webmanifest' => 'Web App Manifest'
        ];
        
        foreach ($files as $file => $description):
            $url = rtrim($base_url, '/') . $file;
            $exists = urlExists($url);
        ?>
        <tr>
            <td><?php echo htmlspecialchars($description); ?> (<code><?php echo htmlspecialchars($file); ?></code>)</td>
            <td>
                <?php if ($exists): ?>
                    <span style="color: #4caf50;">✓ Found</span>
                <?php else: ?>
                    <span style="color: #f44336;">✗ Missing</span>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    
    <div class="check">
        <h3>Next Steps:</h3>
        <ol>
            <li>Submit your sitemap to Google Search Console</li>
            <li>Fix any missing meta tags or broken links</li>
            <li>Monitor your search performance in Google Search Console</li>
            <li>Regularly update your sitemap when adding new content</li>
        </ol>
    </div>
</body>
</html>
