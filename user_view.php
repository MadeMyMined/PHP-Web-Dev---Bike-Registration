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
        &nbsp; Welcome, <?php echo $_SESSION['g_fullname'] ?>!
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
                            <form action="user_search_db.php" method="POST">
                            User View
                                <input type="submit" name="b_search" value="Search" style="float: right;" >
                                <input type="text" name="u_search" placeholder="Search" style="float: right; margin-right:5px" required>
                            </form>
                        </div>
                        <div class="card-body" style="max-height: 800px;min-height:20px; overflow:auto;">
                            <table class="table table-success" >
                                <thead class="thead-dark">
                                        <tr>
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
                                    <?php
                                    if (isset($_GET['results'])) {
                                        $results = json_decode($_GET['results'], true);
                                        if (count($results) > 0) {
                                            foreach ($results as $row) {
                                                echo "<tr>";
                                                    echo "<td>" . $row['col_bikeid'] . "</td>";
                                                    echo "<td>" . $row['col_serialnumber'] . "</td>";
                                                    echo "<td>" . $row['col_maker'] . "</td>";
                                                    echo "<td>" . $row['col_model'] . "</td>";
                                                    echo "<td>" . $row['col_color'] . "</td>";
                                                    echo "<td>" . $row['col_status'] . "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='7'>No results found!</td></tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>Please enter a search term and click Search.</td></tr>";
                                    }
                                    ?>
                                    </tbody>
                            </table>
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Bike ID</th>
                                        <th>Serial Number</th>
                                        <th>Bike Maker</th>
                                        <th>Bike Model</th>
                                        <th>Bike Color</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <!-- For Query -->
                                <tbody>
                                    <?php
                                    require_once('user_query_db.php');
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                            echo "<td>" . $row['col_bikeid'] . "</td>";
                                            echo "<td>" . $row['col_serialnumber'] . "</td>";
                                            echo "<td>" . $row['col_maker'] . "</td>";
                                            echo "<td>" . $row['col_model'] . "</td>";
                                            echo "<td>" . $row['col_color'] . "</td>";
                                            echo "<td>" . $row['col_status'] . "</td>";
                                        echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'><p style='color:red; text-align:center;'>No Data Has Been Found!</p></td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <hr>
                            <p style="color:red; text-align:center;">
                                    <?php 
                                        if(!empty(($_SESSION['reg_b_successs']))){
                                            if(($_SESSION['reg_b_successs'] == "Bike Registration Error: Serial Number Exist!")){
                                                echo "<p style='color:red; text-align:center;'>" . $_SESSION['reg_b_successs'] . "</p>"; 
                                            } else {
                                                echo "<p style='color:green; text-align:center;'>" . $_SESSION['reg_b_successs'] . "</p>"; 
                                            }
                                        }
                                    ?>
                                </p>
                            <form action="user_b_registration_view.php" method="POST">
                                <input type="submit" name="b_register" value="Register" style="float: right;">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="bootstrap.js" crossorigin="anonymous"></script>
    </body>
</html>