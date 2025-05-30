<?php
require_once 'includes/db.php';
require_once 'includes/auth.php';

// If logged in, redirect to patients page
if (is_logged_in()) {
    header('Location: calendar.php');
    exit();
} else {
    // If not logged in, redirect to login page
    header('Location: login.php');
    exit();
}