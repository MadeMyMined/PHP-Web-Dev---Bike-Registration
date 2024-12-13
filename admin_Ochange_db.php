<?php
session_start();
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['col_userid']) && isset($_POST['status_list']) && isset($_POST['u_chname'])) {
    $user_ids = $_POST['col_userid'];
    $bike_ids = $_POST['col_bikeid'];
    $new_status = $_POST['status_list'];
    $new_owner = $_POST['u_chname'];

    foreach ($user_ids as $index => $user_id) {
        $bike_id = $bike_ids[$index];

        $user_id = $conn->real_escape_string($user_id);
        $bike_id = $conn->real_escape_string($bike_id);
        $new_status = $conn->real_escape_string($new_status);
        $new_owner = $conn->real_escape_string($new_owner);

        $sql = "UPDATE bikedb.bike_tbl 
                SET col_bikestatus = '$new_status', col_ownerid = '$new_owner' 
                WHERE col_ownerid = '$user_id' AND col_bikeid = '$bike_id'";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully for User ID: $user_id and Bike ID: $bike_id<br>";
        } else {
            echo "Error updating record: " . $conn->error . "<br>";
        }
    }
} else {
    echo "Invalid form submission!";
}

$conn->close();


if (!isset($_SESSION['checker'])) {
    header('Location: /bikeregistration/admin_view.php');
    exit;
} else {
    header('Location: /bikeregistration/superadmin_view.php');
    exit;
}



?>
