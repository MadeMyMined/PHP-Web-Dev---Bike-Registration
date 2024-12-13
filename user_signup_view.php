<?php
    session_start();
    if(empty($_POST['i_user_reg'])){
        header('Location: /bikeregistration/login.php');
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
    <nav class="navbar navbar-expand-sm" style="background-color: #17A9FD; height: 54px">	
	</nav>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="width: 800px; margin: 10px auto;">
                        <div class="card-header">
                            <form action="login.php" method="POST" >
                                <p style="font-weight: bold; font-size: 15px">User Registration
                                <input type="submit" name="b_cancel" value="Cancel" style="float: right;"></p>
                            </form>
                        </div>
                        <div class="card-body">
                            <form action="user_signup_db.php" method="POST">
                                <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>        
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><label for="i_username_sp">Username:</label></td>
                                                <td><input type="text" name="i_username_sp" placeholder="Input Username" required></td>   
                                                <td><label for="i_password_sp">Password:</label></td>
                                                <td><input type="text" name="i_password_sp" placeholder="Input Password" required></td>  
                                            </tr>
                                            <tr>
                                                <td><label for="i_fullname_sp">Full Name:</label></td>
                                                <td><input type="text" name="i_fullname_sp" placeholder="Input Full Name" required></td>   
                                                <td><label for="i_address_sp">Address:</label></td>
                                                <td><input type="text" name="i_address_sp" placeholder="Input Address" required></td>  
                                            </tr>
                                            <tr>
                                                <td><label for="i_contact_sp">Contact:</label></td>
                                                <td><input type="number" name="i_contact_sp" placeholder="Input Contact" required></td>   
                                                <td></td>
                                                <td></td>   
                                            </tr>
                                        </tbody>    
                                    </table>
                                <hr>
                                <input type="submit" name="submit_sp" value="Submit" style="float: right;">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>