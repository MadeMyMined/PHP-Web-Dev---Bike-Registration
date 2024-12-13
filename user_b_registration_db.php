<?php
    session_start();
    include ('db.php');

    
    $i_ownerid = $_SESSION['g_userid'] ;
    $i_serialnumber = $_POST['u_serialnumber'];
    $i_bikemaker = $_POST['u_bikemaker'];
    $i_bikemodel = $_POST['u_bikemodel'];
    $i_bikecolor = $_POST['u_bikecolor'];
    $i_bikestatus = 1; //Default OK
    

    $f_sql = "SELECT col_serialnumber FROM bikedb.bike_tbl
            WHERE col_serialnumber = '$i_serialnumber'";
    $result = $conn->query($f_sql);

    if ($result->num_rows > 0) {
        // If Duplicate
        while($row = $result->fetch_assoc()) {
            
            $_SESSION['reg_b_successs'] = "Bike Registration Error: Serial Number Exist!";
            header('Location: /bikeregistration/user_view.php');
            die;
        }
    } else {
        // Insert Query
        $sql = "INSERT INTO bike_tbl(col_ownerid, col_serialnumber, col_maker, col_model, col_color, col_bikestatus)
                VALUES ('$i_ownerid','$i_serialnumber','$i_bikemaker ','$i_bikemodel',' $i_bikecolor',$i_bikestatus)";
        mysqli_query($conn, $sql);
        $_SESSION['reg_b_successs'] = "Registration Successful";
        header('Location: /bikeregistration/user_view.php');
        die;
    }
    $conn->close();


?>