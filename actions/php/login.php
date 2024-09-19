<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once 'user.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Debugging 
    echo "Username: " . htmlspecialchars($username) . "<br>";
    echo "Password: " . htmlspecialchars($password) . "<br>";


    $user = new User();
    $loggedInUser = $user->login($username, $password);

    // Debugging - print the content of $loggedInUser
    echo "<pre>";
    print_r($loggedInUser);
    echo "</pre>";

    if($loggedInUser){
        // Authenticate user and redairect start session
        session_start();
        $_SESSION['user'] = $loggedInUser['username'];
        header("Location: ../../assets/html/blood_donor.html"); //check again if this path is correct
        exit();
    } else {
        echo "Invalid user details, check again!!";
    }
}

?>
