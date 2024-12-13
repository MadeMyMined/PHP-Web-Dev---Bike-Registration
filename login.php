<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="bootstrap.css" rel="stylesheet" crossorigin="anonymous">
        <title></title>
    </head>
    <body style="background-image: url('../bikeregistration/images/background.jpg'); background-repeat: no-repeat;background-size: cover;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="margin: 0 auto; margin-top: 320px; float: none; width: 300px; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);">
                        <div class="card-header" style="background-color:#17A9FD; text-align: center; ">
                            <h5>Login</h5>
                        </div>
                        <div class="card-body" style="background-image: url('../bikeregistration/images/background.jpg'); background-repeat: no-repeat;background-size: cover;">
                            <!-- Login -->
                            <form action="auth.php" method="POST">
                                <label for="i_username">Username:</label>
                                <input type="text" name="i_username" placeholder="Username" class="form-control" style="box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);" required >
                                <label for="i_password">Password:</label>
                                <input type="password" name="i_password" placeholder="Password" class="form-control" style="box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);" required>
                                <p style="color:red; text-align:center;">
                                    <?php if(!empty($_SESSION['l_note'])){
                                        echo $_SESSION['l_note'];
                                    }?>
                                </p>
                                <hr>
                                <input type="submit" name="b_login" value="Login" class="form-control" style="box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);">
                            </form>
                        </div>
                    </div>
                    <!-- User Registration -->
                    <form action="user_signup_view.php" method="POST" style="text-align: center; margin-top: 10px;">
                        Doesn't Have an Account?<input type="submit" name="i_user_reg" value="Register" style="color: red; background-color: transparent; border: none;">
                    </form>
                            <?php
                                if(!empty(($_SESSION['reg_success']))){
                                    if(($_SESSION['reg_success'] == "Username and Password is Taken")){
                                        echo "<p style='color:red; text-align:center;'>" . $_SESSION['reg_success'] . "</p>"; 
                                    } else {
                                        echo "<p style='color:green; text-align:center;'>" . $_SESSION['reg_success'] . "</p>"; 
                                    }
                                }
                            ?>
                </div>
            </div>
        </div>
        <script src="bootstrap.js" crossorigin="anonymous"></script>
    </body>
    <?php
        session_unset();
        session_destroy();
    ?>
</html>