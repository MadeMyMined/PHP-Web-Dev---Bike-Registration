<?php
    session_start();
    include('db.php');
    
    $sql = "SELECT col_statusid, col_status FROM status_tbl";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die('Query failed: ' . mysqli_error($conn));
    }

    $conn->close();
?>
