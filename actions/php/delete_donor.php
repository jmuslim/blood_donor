<?php
require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $database = new Database();
    $conn = $database->getConnection();

    $query = "DELETE FROM blood_donors WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$id]);

    echo "Donor deleted successfully.";
}
?>
