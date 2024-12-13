<?php 
    session_start();
    if ($_SESSION['c_login'] != 1) {
        header('Location: /bikeregistration/login.php');
        exit();
    }
    $_SESSION['c_login']++;
    if(isset($_SESSION['checker'])){
        $_SESSION['c_login']--;
        header('Location: /bikeregistration/superadmin_view.php');
        exit;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="bootstrap.css" rel="stylesheet" crossorigin="anonymous">
        <title></title>
    </head>
    <body style="background-image: url('../bikeregistration/images/background.jpg'); background-repeat: no-repeat;background-size: cover;">
    <nav class="navbar navbar-expand-sm" style="background-color: #17A9FD;">
        &nbsp; Welcome, <?php echo $_SESSION['g_username'] ?>!
		<div style="margin: 0 1px 0 auto">
			<form action="login.php">
				<input type="submit" name="logout" class="btn btn-primaryton" value="Logout">
			</form>
		</div>	
	</nav>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="margin-top: 10px;">
                        <div class="card-header">
                            <form action="admin_search_db.php" method="POST">
                                Admin View
                                <input type="submit" name="b_search" value="Search" style="float: right; " >
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
                                        <input type="Submit" value="Update Values(admin)" style="float:right;">
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
                                                echo "<tr><td colspan='9'>No Data Has Been Found!</td></tr>";
                                            }
                                            ?>
                                            <input type="Submit" value="Update Values(admin)" style="float:right;">
                                        </form>
                                    </tbody>
                                </table>
                                <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="bootstrap.js" crossorigin="anonymous"></script>
    </body>
</html>