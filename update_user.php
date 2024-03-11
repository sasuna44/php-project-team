<?php
include 'db.php';

$db = new db();

$conn = $db->get_connection();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $user_name = $_POST["user_name"];
    $user_email = $_POST["user_email"];
    $room_number = $_POST["room_number"];
    $ext_number = $_POST["ext_number"];

    // Call the update_data_without_image method
    $update_result = $db->update_user_data($id, $user_name, $user_email, $room_number, $ext_number);
    if ($update_result === TRUE) {
        echo "User updated successfully.";
    } else {
        echo "Error updating user: " . $conn->error;
    }
}

// Redirect to the appropriate page after updating the user
header("Location: allUsers.php");
?>
