<?php
    include('db.php');

    $sql = "SELECT * FROM bikedb.user_tbl AS u
            LEFT JOIN bikedb.bike_tbl AS b ON u.col_userid = b.col_ownerid
            RIGHT JOIN bikedb.status_tbl AS s ON b.col_bikestatus = s.col_statusid
            WHERE u.col_privilege NOT IN (2, 3)
            UNION
            SELECT * FROM bikedb.user_tbl AS u
            RIGHT JOIN bikedb.bike_tbl AS b ON u.col_userid = b.col_ownerid
            RIGHT JOIN bikedb.status_tbl AS s ON b.col_bikestatus = s.col_statusid
            WHERE u.col_privilege NOT IN (2, 3);";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    $conn->close();
?>