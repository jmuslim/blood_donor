<?php
session_start();
session_unset();  // Unset all session variables
session_destroy();  // Destroy the session

// Debugging message
echo "Logged out successfully.<br>";
echo "Redirecting to: ../../index.php";


// Redirect to login page
header("Location: ../../index.php");  
exit();
?>
