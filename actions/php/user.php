<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// echo __DIR__;


require_once 'database.php';

class User {
    private $conn;
    private $table = 'users';

    //Users properties 
    public $id;
    public $username;
    public $password;

    public function __construct(){
        $database = new Database();
        $this->conn = $database->getConnection();
}

    // User Login 
    public function login($username, $password){
        $query = "SELECT * FROM " . $this->table . " WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Debugging
    // if ($user) {
    //     echo "User found: " . htmlspecialchars($user['username']) . "<br>";
    //     echo "Hashed password: " . htmlspecialchars($user['password']) . "<br>";
    // } else {
    //     echo "No user found with username: " . htmlspecialchars($username) . "<br>";
    // }

    // if ($user && password_verify($password, $user['password'])) {
    //     return $user;
    // } else {
    //     return false;
    // }
     // Check if password_verify is successful
     if ($user && password_verify($password, $user['password'])) {
        echo "Password verified successfully!<br>";
        return $user;
    } else {
        echo "Password verification failed.<br>";
    }
        return false;
        if($user && password_verify($password, $user['password'])){
            return $user;
        }else {
            return false;
        }
    }


    // User registration 
    public function register($username, $password){

         //Checking if user already exists
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Username already exists!<br>";
            return false;
        }
        //insert the new user into the database
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT); 
        $insertQuery = "INSERT INTO " . $this->table . " (username, password) VALUES (:username, :password)";
        // $insertQuery = "INSERT INTO {$this->table} (username, password) VALUES (:username, :password)";
        $stmt = $this->conn->prepare($insertQuery);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);

        if ($stmt->execute()) {
            return true; // Registration successful
        } else {
            return false; // Registration failed
        }
    }


    //Redirect to the blood donors page


}
?>