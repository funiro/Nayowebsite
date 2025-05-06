<?php
// Detect if on localhost or live server to set correct base URL
$base_url = (isset($_SERVER['HTTP_HOST']) && strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) ? '/dashboard/nayo-website' : '';
?>
