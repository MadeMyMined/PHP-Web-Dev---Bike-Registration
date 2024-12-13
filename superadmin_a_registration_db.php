<?php
session_start();
include('db.php');

$i_username = $_POST['a_username'];
$i_password = $_POST['a_password'];
$i_fullname = $_POST['a_fullname'];
$i_address = $_POST['a_address'];
$i_contact = $_POST['a_contact'];
$i_privilege = 2; // Default privilege for admin

$f_sql = "SELECT col_userid FROM bikedb.user_tbl 
            WHERE col_username = '$i_username' AND col_password = '$i_password'";
$result = $conn->query($f_sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['i_admin_reg'] = 1;
    $_SESSION['reg_a_success'] = "Admin Registration Error: Username and Password is Taken";
    header('Location: /bikeregistration/superadmin_view.php');
    exit;
} else {
    $sql = "INSERT INTO bikedb.user_tbl (col_username, col_password, col_name, col_contact, col_address, col_privilege) 
            VALUES ('$i_username', '$i_password', '$i_fullname', '$i_contact', '$i_address', '$i_privilege')";
    
    if ($conn->query($sql) === TRUE) {
        $_SESSION['i_admin_reg'] = 1;
        $_SESSION['reg_a_success'] = "Registration Successful";
    } else {
        $_SESSION['i_admin_reg'] = 0;
        $_SESSION['reg_a_success'] = "Registration Failed: " . $conn->error;
    }

    header('Location: /bikeregistration/superadmin_view.php');
    exit;
}

$conn->close();
?>
