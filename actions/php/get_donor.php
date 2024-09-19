<?php
require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $database = new Database();
    $conn = $database->getConnection();

    $query = "SELECT * FROM blood_donors WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$id]);
    $donor = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($donor);
}
?>
