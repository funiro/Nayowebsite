<?php
/**
 * Dynamic Base URL Configuration
 * 
 * This file determines the correct base URL for the website based on the environment.
 * - For localhost: Uses '/dashboard/nayo-website'
 * - For production: Uses an empty string as the site is at the root of the domain
 */

// Get server name in lowercase for consistent comparison
$server_name = isset($_SERVER['SERVER_NAME']) ? strtolower($_SERVER['SERVER_NAME']) : '';

// Check if running on localhost (either by name or IP)
$is_localhost = (strpos($server_name, 'localhost') !== false) || 
                (strpos($server_name, '127.0.0.1') !== false);

// Set the base URL accordingly
$base_url = $is_localhost ? '/dashboard/nayo-website' : '';

// Debug information (comment out in production)
// error_log('Server: ' . $server_name . ', Is localhost: ' . ($is_localhost ? 'true' : 'false') . ', Base URL: ' . $base_url);
?>
