<?php
require("db.php");
session_start();
$errors = [];

$user_email = validate_data($_POST['user_email']);
$user_password = validate_data($_POST['user_password']);
//var_dump($user_email);

$db = new db();
$result = $db->get_data('users', "user_email='$user_email' AND user_password='$user_password'");

if ( $result->num_rows > 0) {
    $user_data = $result->fetch_assoc();
   // var_dump($user_data);
    $_SESSION['id'] = $user_data['id'];
    $_SESSION['user_email'] = $user_data['user_email'];
    $_SESSION['role'] = $user_data['role'];
    var_dump($_SESSION);

    if ($_SESSION['role'] == 'user') {
        // header("Location: user_page.php");
        exit;
    } elseif ($_SESSION['role'] == 'admin') {
        // header("Location: admin_page.php");
        exit;
    }
} else {
    $errors[] = "Invalid email or password";
    $errors = json_encode($errors);
    header("Location: login.php?errors=" . urlencode($errors));
    exit;
}

function validate_data($data)
{
    $data = trim($data);
    $data = addslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>