<?php
session_start();
$_SESSION['c_login']--;
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['b_search'])) {
    $i_searchy = $_POST['u_search'];

    $s_sql = "SELECT * FROM bikedb.user_tbl
            RIGHT JOIN bikedb.bike_tbl ON user_tbl.col_userid = bike_tbl.col_ownerid
            RIGHT JOIN bikedb.status_tbl ON bike_tbl.col_bikestatus = status_tbl.col_statusid
            WHERE col_userid = '$i_searchy' OR col_name LIKE '%$i_searchy%' OR col_address LIKE '%$i_searchy%'
            OR col_contact LIKE '$%i_searchy%' OR col_bikeid = '$i_searchy' OR col_serialnumber = '$i_searchy' 
            OR col_maker LIKE '%$i_searchy%' OR col_model LIKE '%$i_searchy%' OR col_color LIKE '%$i_searchy%'
            OR col_bikestatus LIKE '%$i_searchy%'";

    $s_result = mysqli_query($conn, $s_sql);
    $results = [];

    if ($s_result && mysqli_num_rows($s_result) > 0) {
        while ($row = mysqli_fetch_assoc($s_result)) {
            $results[] = $row;
        }
    }

    $conn->close();

    header('Location: admin_view.php?results=' . urlencode(json_encode($results)));
    exit();
} else {
    header('Location: admin_view.php');
    exit();
}
?>
