<?php
// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define base path
$base_path = dirname(__DIR__);

// Detect if on localhost or live server to set correct base URL
$server_name = isset($_SERVER['SERVER_NAME']) ? strtolower($_SERVER['SERVER_NAME']) : '';
$is_localhost = (strpos($server_name, 'localhost') !== false) || (strpos($server_name, '127.0.0.1') !== false);
$base_url = $is_localhost ? '/dashboard/nayo-website' : '';
?>
