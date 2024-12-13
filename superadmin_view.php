<?php 
    session_start();
    if ($_SESSION['c_login'] != 1) {
        header('Location: /bikeregistration/login.php');
        exit();
    }
    $_SESSION['c_login']++;
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="bootstrap.css" rel="stylesheet" crossorigin="anonymous">
        <title></title>
    </head>
    <body style="background-image: url('../bikeregistration/images/background.jpg'); background-repeat: no-repeat;background-size: cover;">
    <nav class="navbar navbar-expand-sm" style="background-color: #17A9FD;">
        &nbsp; Access: Super Admin!
		<div style="margin: 0 1px 0 auto">
			<form action="login.php">
				<input type="submit" name="logout" class="btn btn-primaryton" value="Logout">
			</form>
		</div>	
	</nav>
        <div class="container-lg">
            <div class="row">
                <div class="col-9">
                    <div class="card" style="margin-top: 10px">
                        <div class="card-header">
                            <form action="superadmin_search_db.php" method="POST">
                                Super Admin View (User)
                                <input type="submit" name="b_search" value="Search" style="float: right; ">
                                <input type="text" name="u_search" placeholder="Search" style="float: right; margin-right:5px" required>
                            </form>
                        </div>
                        <div class="card-body" style="max-height: 800px;min-height:20px; overflow:auto;">
                        <table class="table table-success" >
                                <thead class="thead-dark">
                                        <tr>
                                            <th><input type='checkbox'></th>
                                            <th>User ID</th>
                                            <th>Full Name</th>
                                            <th>Address</th>
                                            <th>Contact No.</th>
                                            <th>Bike ID</th>
                                            <th>Serial Number</th>
                                            <th>Bike Maker</th>
                                            <th>Bike Model</th>
                                            <th>Bike Color</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                <!-- For Search -->
                                <tbody>
                                <form action="admin_Ochange_view.php" method="POST">
                                        <?php
                                        if (isset($_GET['results'])) {
                                            $results = json_decode($_GET['results'], true);
                                            if (count($results) > 0) {
                                                foreach ($results as $row) {
                                                $jsonData = json_encode($row);
                                                echo "<tr>";
                                                    echo "<td><input type='checkbox' name='selected_rows[]' 
                                                        value='" . htmlspecialchars($jsonData, ENT_QUOTES, 'UTF-8') . "'></td>";
                                                    echo "<td>" . $row['col_userid'] . "</td>";
                                                    echo "<td>" . $row['col_name'] . "</td>";
                                                    echo "<td>" . $row['col_address'] . "</td>";
                                                    echo "<td>" . $row['col_contact'] . "</td>";
                                                    echo "<td>" . $row['col_bikeid'] . "</td>";
                                                    echo "<td>" . $row['col_serialnumber'] . "</td>";
                                                    echo "<td>" . $row['col_maker'] . "</td>";
                                                    echo "<td>" . $row['col_model'] . "</td>";
                                                    echo "<td>" . $row['col_color'] . "</td>";
                                                    echo "<td>" . $row['col_status'] . "</td>";
                                                echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='11'>No results found!</td></tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='11'>Please enter a search term and click Search.</td></tr>";
                                        }
                                        ?>
                                        <input type="Submit" name="b_ss" value="Update Values(admin)" style="float:right;">
                                    </form>
                                    </tbody>
                            </table>
                        <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>    
                                            <th><input type='checkbox'></th>
                                            <th>User ID</th>
                                            <th>Full Name</th>
                                            <th>Address</th>
                                            <th>Contact No.</th>
                                            <th>Bike ID</th>
                                            <th>Serial Number</th>
                                            <th>Bike Maker</th>
                                            <th>Bike Model</th>
                                            <th>Bike Color</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <!-- Admin View -->
                                    <tbody>
                                        <form action="admin_Ochange_view.php" method="POST">
                                                <?php
                                                require_once('admin_query_db.php');
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                    $jsonData = json_encode($row);
                                                    echo "<tr>";
                                                        echo "<td>
                                                        <input type='checkbox' name='selected_rows[]' 
                                                            value='" . htmlspecialchars($jsonData, ENT_QUOTES, 'UTF-8') . "'></td>";
                                                        echo "<td>" . $row['col_userid'] . "</td>";
                                                        echo "<td>" . $row['col_name'] . "</td>";
                                                        echo "<td>" . $row['col_address'] . "</td>";
                                                        echo "<td>" . $row['col_contact'] . "</td>";
                                                        echo "<td>" . $row['col_bikeid'] . "</td>";
                                                        echo "<td>" . $row['col_serialnumber'] . "</td>";
                                                        echo "<td>" . $row['col_maker'] . "</td>";
                                                        echo "<td>" . $row['col_model'] . "</td>";
                                                        echo "<td>" . $row['col_color'] . "</td>";
                                                        echo "<td>" . $row['col_status'] . "</td>";
                                                    echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='9'>No Data Has Been Found!</td></tr>";
                                                }
                                                ?>
                                                <input type="Submit" name="b_ss" value="Update Values(Super Admin)" style="float:right;">
                                            </form>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card" style="margin-top: 10px">
                        <div class="card-header">
                        Super Admin View (Admin)
                        </div>
                        <div class="card-body" style="max-height: 800px;min-height:20px; overflow:auto;">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>User ID</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    require_once('superadmin_Aquery_db.php');
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                                echo "<td>" . $row['col_userid'] . "</td>";
                                                echo "<td>" . $row['col_username'] . "</td>";
                                                echo "<td>" . $row['col_password'] . "</td>";
                                            echo "</tr>";
                                            }
                                    } else {
                                        echo "<tr><td colspan='3'>No Data Has Been Found!</td></tr>";
                                    }
                                ?>            
                            </tbody>
                        </table>
                        <hr>
                        <p style="color:red; text-align:center;">
                                <?php  if(!empty(($_SESSION['reg_a_success']))){
                                    if(($_SESSION['reg_a_success'] == "Admin Registration Error: Username and Password is Taken")){
                                        echo "<p style='color:red; text-align:center;'>" . $_SESSION['reg_a_success'] . "</p>"; 
                                    } else {
                                        echo "<p style='color:green; text-align:center;'>" . $_SESSION['reg_a_success'] . "</p>"; 
                                    }
                                } ?>
                                </p>
                                <form action="superadmin_a_registration_view.php" method="POST">
                                    <input type="submit" name="i_admin_reg" value="Register New Admin" style="float: right; margin: 5px;">
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="bootstrap.js" crossorigin="anonymous"></script>
    </body>
</html>