<?php 
    session_start();
    $_SESSION['c_login']--;
    if(!isset($_POST['b_register']))
        {
            header('Location: /bikeregistration/user_view.php');
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
                            <form action="user_view.php" method="POST" >
                                User Bike Registration
                                <input type="submit" name="b_cancel" value="Cancel" style="float: right;">
                            </form>
                        </div>
                        <div class="card-body">
                        <p style="font-weight: bold; font-size: 20px; text-align: center">Bike Details</p>
                            <form action="user_b_registration_db.php" method="POST">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th></th>        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><label for="u_serialnumber">Serial Number:</label></td>
                                            <td><input type="number" name="u_serialnumber" placeholder="Serial-Number" required></td>   
                                            <td><label for="u_bikemaker">Bike Maker:</label></td>
                                            <td><input type="text" name="u_bikemaker" placeholder="Bike Maker" required></td>  
                                        </tr>
                                        <tr>
                                            <td><label for="u_bikemodel">Bike Model:</label></td>
                                            <td><input type="text" name="u_bikemodel" placeholder="Bike Model" required></td>   
                                            <td><label for="u_bikecolor">Bike Color:</label></td>
                                            <td><input type="text" name="u_bikecolor" placeholder="Bike Color" required></td>  
                                        </tr>
                                        <tr>
                                            <!-- <td><label for="u_bikepic">Bike Picture:</label></td>
                                            <td><input type="file" name="u_bikepic" placeholder="Serial-Number"></td>   
                                            <td></td>
                                            <td></td>    -->
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
        <script src="bootstrap.js" crossorigin="anonymous"></script>
    </body>
</html>