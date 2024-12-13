<?php 
    include ('db.php');
    
    $sql = "SELECT * FROM bikedb.user_tbl AS u
            WHERE u.col_privilege NOT IN (1,3)";
    $result = mysqli_query($conn,$sql);

    $conn->close();

?>