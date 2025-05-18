<?php
require_once 'includes/auth.php';

logout_user();

// Redirect to login page after logout
header('Location: login.php');
exit();
?>