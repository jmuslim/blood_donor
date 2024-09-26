<?php
    class Database {
    private $host = '127.0.0.1'; // Hostinger Database host (e.g., 'localhost' or specific hostname)
    private $db_name = 'u545091865_bloodbank'; // Hostinger Database name
    private $username = 'u545091865_blood_bank'; // Hostinger Database username
    private $password = '5U[v&/ZAc#M'; // Hostinger Database password
    public $conn;

    // Method to get the database connection
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
?>