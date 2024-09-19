<?php
class Database {
    private $host = 'localhost'; // Database host
    private $db_name = 'blood_bank'; // Database name
    private $username = 'root'; // Database username
    private $password = ''; // Database password
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}



// Checking database connection
// $database = new Database();
// $conn = $database->getConnection();
// // Output the result
// if ($conn) {
//     echo "<br> Successfully! database get connected to the server.<br>";
// } else {
//     echo "<br> Connection failed to the database.<br>";
// }

?>
