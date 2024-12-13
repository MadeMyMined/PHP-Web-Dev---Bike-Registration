<?php
    session_start();
    $_SESSION['c_login']--;
    if(!empty($_POST['i_admin_reg'])) {
        $_SESSION['i_admin_reg'] = NULL;
    } else {
        header('Location: /bikeregistration/superadmin_view.php');
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
           Access: Super Admin!
	</nav>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="margin-top: 10px">
                        <div class="card-header">
                            <form action="superadmin_view.php" method="POST" >
                                <p style="font-weight: bold; font-size: 15px">Admin Registration
                                <input type="submit" name="b_cancel" value="Cancel (SAdmin)" style="float: right;"></p>
                            </form>
                        </div>
                        <div class="card-body">
                            <form action="superadmin_a_registration_db.php" method="POST">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th></th>        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><label for="a_username">Username:</label></td>
                                            <td><input type="text" name="a_username" placeholder="Input Username" required></td>   
                                            <td><label for="a_password">Password:</label></td>
                                            <td><input type="text" name="a_password" placeholder="Input Password" required></td>  
                                        </tr>
                                        <tr>
                                            <td><label for="a_fullname">Full Name:</label></td>
                                            <td><input type="text" name="a_fullname" placeholder="Input Full Name"></td>   
                                            <td><label for="a_address">Address:</label></td>
                                            <td><input type="text" name="a_address" placeholder="Input Address"></td>  
                                        </tr>
                                        <tr>
                                            <td><label for="a_contact">Contact:</label></td>
                                            <td><input type="number" name="a_contact" placeholder="Input Contact"></td>   
                                            <td></td>
                                            <td></td>   
                                        </tr>
                                    </tbody>
                                </table>
                                <?php if(!empty($_SESSION['reg_a_success'])){
                                        $_SESSION['reg_a_success'];
                                    }?>
                                <hr>
                                <input type="submit" name="submit_sp" value="Submit" style="float: right;">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="bootstrap.js" crossorigin="anonymous"></script>
    </body>
</html>