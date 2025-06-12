<?php
// Sitemap URL
$sitemapUrl = 'https://nayomalawi.org/sitemap.xml';

// Search Engine Submission URLs
$searchEngines = [
    'google' => "http://www.google.com/ping?sitemap=" . urlencode($sitemapUrl),
    'bing' => "http://www.bing.com/ping?sitemap=" . urlencode($sitemapUrl),
    'yandex' => "https://webmaster.yandex.com/ping?sitemap=" . urlencode($sitemapUrl)
];

// Function to submit sitemap
function submitSitemap($url, $engine) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    return [
        'engine' => ucfirst($engine),
        'status' => $httpCode,
        'success' => ($httpCode >= 200 && $httpCode < 300)
    ];
}

// Submit to all search engines
$results = [];
foreach ($searchEngines as $engine => $url) {
    $results[] = submitSitemap($url, $engine);
    // Add a small delay between submissions
    sleep(1);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitemap Submission Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }
        h1 {
            color: #006b41;
            text-align: center;
        }
        .result {
            margin: 15px 0;
            padding: 15px;
            border-radius: 5px;
            background-color: #f5f5f5;
        }
        .success {
            border-left: 5px solid #4CAF50;
        }
        .error {
            border-left: 5px solid #f44336;
        }
        .status {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .success .status {
            color: #4CAF50;
        }
        .error .status {
            color: #f44336;
        }
        .btn {
            display: inline-block;
            background-color: #006b41;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .btn:hover {
            background-color: #005a37;
        }
        .last-updated {
            text-align: center;
            color: #666;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <h1>Sitemap Submission Results</h1>
    <div class="last-updated">
        Last updated: <?php echo date('Y-m-d H:i:s'); ?>
    </div>
    
    <?php foreach ($results as $result): ?>
        <div class="result <?php echo $result['success'] ? 'success' : 'error'; ?>">
            <div class="status">
                <?php echo $result['engine']; ?>: 
                <?php echo $result['success'] ? 'Successfully submitted!' : 'Failed to submit (HTTP ' . $result['status'] . ')'; ?>
            </div>
            <div class="details">
                <?php if ($result['success']): ?>
                    Your sitemap has been successfully submitted to <?php echo $result['engine']; ?>.
                <?php else: ?>
                    There was an error submitting to <?php echo $result['engine']; ?>. 
                    HTTP Status Code: <?php echo $result['status']; ?>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
    
    <div style="text-align: center; margin-top: 30px;">
        <a href="/" class="btn">Return to Homepage</a>
        <a href="https://search.google.com/search-console" target="_blank" class="btn" style="margin-left: 10px;">Google Search Console</a>
    </div>
    
    <div class="last-updated" style="margin-top: 40px;">
        <p>Note: This is an automated submission. For more detailed analytics, please use the respective webmaster tools.</p>
    </div>
</body>
</html>
