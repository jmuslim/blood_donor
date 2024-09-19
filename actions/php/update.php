<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'database.php';

$database = new Database();
$conn = $database->getConnection();

$id = $_POST['id'];
$full_name = $_POST['full_name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$blood_group = $_POST['blood_group'];
$contact_number = $_POST['contact_number'];
$email_address = $_POST['email_address'];
$last_donation_date = $_POST['last_donation_date'];


$query = "UPDATE blood_donors SET full_name = :full_name, age = :age, gender = :gender, blood_group = :blood_group, 
          contact_number = :contact_number, email_address = :email_address, last_donation_date = :last_donation_date 
          WHERE id = :id";


$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->bindParam(':full_name', $full_name);
$stmt->bindParam(':age', $age);
$stmt->bindParam(':gender', $gender);
$stmt->bindParam(':blood_group', $blood_group);
$stmt->bindParam(':contact_number', $contact_number);
$stmt->bindParam(':email_address', $email_address);
$stmt->bindParam(':last_donation_date', $last_donation_date);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error']);
}

?>
