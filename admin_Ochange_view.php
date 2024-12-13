<?php 
    session_start();
    $_SESSION['c_login']--;
    if(isset($_POST['b_ss'])){
        $_SESSION['checker'] = $_POST['b_ss'];
    } else {
        
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="bootstrap.css" rel="stylesheet" crossorigin="anonymous">
        <title></title>
    </head>
    <body style="background-image: url('../bikeregistration/images/background.jpg'); background-repeat: no-repeat;background-size: cover;">
    <nav class="navbar navbar-expand-sm" style="background-color: #17A9FD;height: 54px;">
    </nav>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="margin-top: 10px">
                        <div class="card-header">
                            <form action="admin_view.php" method="POST" >
                                User Owner Change
                                <input type="submit" name="b_cancel" value="Cancel" style="float: right;">
                            </form>
                        </div>
                        <div class="card-body">
                            <form action="admin_Ochange_db.php" method="POST">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
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
                                        <tbody>
                                            <?php
                                            if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['selected_rows'])) {
                                                $selectedRows = $_POST['selected_rows'];
                                                foreach ($selectedRows as $row) {
                                                    $data = json_decode($row, true);
                                                    if (is_array($data)) {
                                                        echo "<tr>";
                                                            echo "<td>" . htmlspecialchars($data['col_userid']) . 
                                                            "<input type='hidden' name='col_userid[]' value='" . htmlspecialchars($data['col_userid']) . "'></td>";                      
                                                            echo "<td>" . $data['col_name'] . "</td>";
                                                            echo "<td>" . $data['col_address'] . "</td>";
                                                            echo "<td>" . $data['col_contact'] . "</td>";
                                                            echo "<td>" . $data['col_bikeid'] . 
                                                             "<input type='hidden' name='col_bikeid[]' value='" . $data['col_bikeid'] . "'></td>";
                                                            echo "<td>" . $data['col_serialnumber'] . "</td>";
                                                            echo "<td>" . $data['col_maker'] . "</td>";
                                                            echo "<td>" . $data['col_model'] . "</td>";
                                                            echo "<td>" . $data['col_color'] . "</td>";
                                                            echo "<td>" . $data['col_status'] . "</td>";
                                                        echo "</tr>";
                                                    } else {
                                                        echo "<tr><td colspan='10'>Error decoding row data</td></tr>";
                                                    }
                                                }
                                            } else {
                                                echo "<tr><td colspan='11'>No data selected or invalid submission!</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>     
                                <input type="submit" name="s_change" value="Submit" style="float: right; margin-right: 10px">
                                <select name="status_list" style="float: right; margin-right: 10px" required>
                                    <?php
                                        require_once('admin_AvailableStatus_db.php');
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value='" . htmlspecialchars($row['col_statusid'], ENT_QUOTES, 'UTF-8') . "'>" . htmlspecialchars($row['col_status'], ENT_QUOTES, 'UTF-8') . "</option>";
                                            }
                                        } else {
                                            echo "<option value='' disabled>No Data Has Been Found!</option>";
                                        }
                                    ?>
                                </select>
                                <select type="text" name="u_chname" style="float: right; margin-right: 10px" required>
                                <?php
                                    require_once('admin_AvailableOwner_db.php');
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . htmlspecialchars($row['col_userid'], ENT_QUOTES, 'UTF-8') . "'>" . htmlspecialchars($row['col_name'], ENT_QUOTES, 'UTF-8') . "</option>";
                                        }
                                    } else {
                                        echo "<option value='' disabled>No Data Has Been Found!</option>";
                                    }
                                ?>
                            </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="bootstrap.js" crossorigin="anonymous"></script>
    </body>
</html>