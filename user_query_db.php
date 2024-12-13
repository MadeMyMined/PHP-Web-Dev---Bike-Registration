<?php 
    include ('db.php');

    $u_name = $_SESSION['g_username'];
    $u_pass = $_SESSION['g_password'];
    $u_id = $_SESSION['g_userid'];
    

    $sql = "SELECT * FROM bikedb.user_tbl
            RIGHT JOIN bikedb.bike_tbl ON user_tbl.col_userid = bike_tbl.col_ownerid
            RIGHT JOIN bikedb.status_tbl ON bike_tbl.col_bikestatus = status_tbl.col_statusid
            WHERE user_tbl.col_userid = '$u_id'";
    $result = mysqli_query($conn,$sql);

    $conn->close();

?>