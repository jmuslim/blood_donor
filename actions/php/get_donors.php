<?php
require_once 'database.php';

$database = new Database();
$conn = $database->getConnection();

$query = "SELECT * FROM blood_donors";
$stmt = $conn->query($query);
$donors = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($donors as $donor) {
    echo "<tr>
        <td>{$donor['full_name']}</td>
        <td>{$donor['age']}</td>
        <td>{$donor['gender']}</td>
        <td>{$donor['blood_group']}</td>
        <td>{$donor['contact_number']}</td>
        <td>{$donor['email_address']}</td>
        <td>{$donor['last_donation_date']}</td>
        <td>
    

        <div class='btn-group'>
                <button class='btn btn-success edit-btn' data-id='{$donor['id']}'><i class='fas fa-edit'></i></button>
                <button class='btn btn-danger delete-btn' data-id='{$donor['id']}'><i class='fas fa-trash-alt'></i></button>
            </div>
            
        </td>
    </tr>";
}
?>


<!-- <button class='btn btn-warning edit-btn' data-id='{$donor['id']}'>Edit</button>
            <button class='btn btn-danger delete-btn' data-id='{$donor['id']}'>Delete</button> 
            <button class='btn btn-warning edit-btn' data-id='{$donor['id']}'><i class='fas fa-edit'></i></button>
            <button class='btn btn-danger delete-btn' data-id='{$donor['id']}'><i class='fas fa-trash-alt'></i></button>
            -->
