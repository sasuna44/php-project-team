<?php
require("db.php");

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_name = validate_data($_POST['user_name']);
    $user_email = validate_data($_POST['user_email']);
    $user_password = validate_data($_POST['user_password']);
    $room_number = validate_data($_POST['room_number']);
    $ext_number = validate_data($_POST['ext_number']);
    $user_image = $_FILES["user_image"]["name"];

    // Validate other fields if needed

    if (empty($errors)) {
        $db = new db();
        move_uploaded_file($_FILES["user_image"]["tmp_name"], "./images/" . $_FILES["user_image"]["name"]);
    
        // Insert user data into "Users" table
        $db->insert_data(
            "Users",
            ["user_name", "user_email", "user_password", "user_image"],
            ["'$user_name'", "'$user_email'", "'$user_password'", "'$user_image'"]
        );
    
        // Get the inserted user's ID
        $user_id = get_last_insert_id($db->get_connection());
    
        // Insert room data into "Rooms" table
        // Insert room data into "Rooms" table
$db->insert_data(
    "Rooms",
    ["room_number", "ext_number"],
    ["'$room_number'", "'$ext_number'"]
);
    
        // Fetching user data after insertion
        $result = $db->get_data('Users', "user_email = '$user_email'");
        $user_data = $result->fetch_assoc();
    
        // Starting session and setting session variables
        session_start();
        $_SESSION['id'] = $user_data['id'];
        $_SESSION['user_email'] = $user_data['user_email'];
    
        // Redirecting user to dashboard or any other page after successful registration
        header("Location: addUser.php");
        // exit;
    }
}
function validate_data($data)
{
$data = trim($data);
$data = addslashes($data);
$data = htmlspecialchars($data);
return $data;
}
?>