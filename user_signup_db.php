<?php
session_start();
include('db.php');

if (empty($_POST['submit_sp'])) {
    header('Location: /bikeregistration/login.php');
    exit;
}

$i_username = $_POST['i_username_sp'];
$i_password = $_POST['i_password_sp'];
$i_fullname = $_POST['i_fullname_sp'];
$i_address = $_POST['i_address_sp'];
$i_contact = $_POST['i_contact_sp'];
$i_privilege = 1; // Default user privilege

$f_sql = "SELECT col_userid FROM bikedb.user_tbl 
            WHERE col_username = '$i_username' AND col_password = '$i_password'";
$result = $conn->query($f_sql);

if ($result && $result->num_rows > 0) {
    $_SESSION['reg_success'] = "Username and Password is Taken";
    header('Location: /bikeregistration/login.php');
    exit;
} else {
    $sql = "INSERT INTO bikedb.user_tbl (col_username, col_password, col_name, col_contact, col_address, col_privilege) 
            VALUES ('$i_username', '$i_password', '$i_fullname', '$i_contact', '$i_address', '$i_privilege')";
    
    if (mysqli_query($conn, $sql)) {
        $_SESSION['reg_success'] = "Registration Successful";
    } else {
        $_SESSION['reg_success'] = "Registration Failed: " . mysqli_error($conn);
    }

    header('Location: /bikeregistration/login.php');
    exit;
}

$conn->close();
?>
