<?php
require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['donor-id'] ?? null;
    $full_name = $_POST['full_name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $blood_group = $_POST['blood_group'];
    $contact_number = $_POST['contact_number'];
    $email_address = $_POST['email_address'];
    $last_donation_date = $_POST['last_donation_date'];

    $database = new Database();
    $conn = $database->getConnection();

    if ($id) {
        // Update donor
        $query = "UPDATE blood_donors SET full_name = ?, age = ?, gender = ?, blood_group = ?, contact_number = ?, email_address = ?, last_donation_date = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$full_name, $age, $gender, $blood_group, $contact_number, $email_address, $last_donation_date, $id]);
        echo "Successfully donor's details updated.";
    } else {
        // Create donor
        $query = "INSERT INTO blood_donors (full_name, age, gender, blood_group, contact_number, email_address, last_donation_date) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->execute([$full_name, $age, $gender, $blood_group, $contact_number, $email_address, $last_donation_date]);
        echo "Successfully donor has been added.";
    }
}
?>
