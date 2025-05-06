<?php
// Detect if on localhost or live server to set correct base URL
// If on localhost, use '/dashboard/nayo-website'; if on live server, use the correct path based on Hostinger structure
$base_url = (isset($_SERVER['HTTP_HOST']) && strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) ? '/dashboard/nayo-website' : '';
// Since the site is in public_html on Hostinger, ensure paths are relative to root or adjust if in subdirectory
// If images are directly under public_html/images, no additional path is needed for base_url, keeping it empty for live server
// $base_url = (isset($_SERVER['HTTP_HOST']) && strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) ? '/dashboard/nayo-website' : '/nayo-website';
?>
