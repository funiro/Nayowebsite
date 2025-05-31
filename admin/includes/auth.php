<?php
// Simple authentication for the admin panel
session_start();

// Change this to a secure password
$admin_password = 'nayo2025';

function is_logged_in() {
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}

function login($password) {
    global $admin_password;
    if ($password === $admin_password) {
        $_SESSION['logged_in'] = true;
        return true;
    }
    return false;
}

function require_login() {
    if (!is_logged_in() && basename($_SERVER['PHP_SELF']) !== 'login.php') {
        header('Location: login.php');
        exit;
    }
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}
