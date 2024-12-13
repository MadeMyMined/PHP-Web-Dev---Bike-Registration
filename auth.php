<?php
    session_start();
    include ('db.php');
    
    $username = $_POST['i_username'];
    $password = $_POST['i_password'];

    $sql = "SELECT * FROM bikedb.user_tbl
            WHERE col_username = '$username' AND col_password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // Redirect to User View
            if($row["col_privilege"] == 1) {
                $_SESSION['g_username'] = $row["col_username"];
                $_SESSION['g_password'] = $row["col_password"];
                $_SESSION['g_fullname'] = $row["col_name"];
                $_SESSION['g_privilege'] = $row["col_privilege"];
                $_SESSION['g_userid'] = $row["col_userid"];
                if(!empty($_POST['b_login'])){
                    $_SESSION['c_login'] = 1;
                    header('Location: /bikeregistration/user_view.php');
                } else {
                    header('Location: /bikeregistration/login.php');
                };
            // Redirect to Admin View
            } elseif ($row["col_privilege"] == 2) {
                $_SESSION['g_username'] = $row["col_username"];
                $_SESSION['g_privilege'] = $row["col_privilege"];
                if(!empty($_POST['b_login'])){
                    $_SESSION['c_login'] = 1;
                    header('Location: /bikeregistration/admin_view.php');
                } else {
                    header('Location: /bikeregistration/login.php');
                };
            // Redirect to Super Admin View
            } elseif($row["col_privilege"] == 3) {
                $_SESSION['g_privilege'] = $row["col_privilege"];
                $_SESSION['c_login'] = $_POST['b_login'];
                if(!empty($_POST['b_login'])){
                    $_SESSION['c_login'] = 1;
                    header('Location: /bikeregistration/superadmin_view.php');
                } else {
                    header('Location: /bikeregistration/login.php');
                };
            // None                
            } else {
                header('Location: /bikeregistration/login.php');
            }
        }
    } else {
        $_SESSION['l_note'] = "Invalid Username and Password";
        header('Location: /bikeregistration/login.php');
        die();
    }

    $conn->close();
?>