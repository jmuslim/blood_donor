<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'user.php';
require_once __DIR__ . '/user.php';




if($_SERVER['REQUEST_METHOD'] == 'POST'){
    var_dump($_POST);


    $username = $_POST['username'];
    $password  = $_POST['password'];
    $repeatPassword = $_POST['repeatPassword'];

    // Checking if both password are matched 
    if($password !== $repeatPassword){
        echo "Password did not match, please try again!! <br>";
        exit();
    }
    
    $user = new User();
    if($user->register($username, $password)){
        echo "You succesfully registred, now you can <a href='login.php'>login here</a> <br>";
        header("Location: ../../index.php");
    } else {
        echo "Please try again! <br>";
    }

}

?>