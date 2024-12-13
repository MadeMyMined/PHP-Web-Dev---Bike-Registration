<?php
    session_start();
    include('db.php');
    
    $sql = "SELECT col_name, col_userid FROM user_tbl
            WHERE col_privilege NOT IN (2,3)";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die('Query failed: ' . mysqli_error($conn));
    }

    $conn->close();
?>
