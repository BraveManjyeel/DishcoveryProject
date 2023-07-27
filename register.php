<?php
require 'config/config.php';
require 'includings/form_handlers/register_handler.php';
require 'includings/form_handlers/login_handler.php';
?>

<html>
    <head>
        <title>Welcome</title>
        <link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <script src="assets/js/register.js"></script>
</head>
<body>
    <?php
    if(isset($_POST['register_button'])){
        echo'
        <script>

        $(document).ready(function(){
            $("#first").hide();
            $("#second").show();

        </script>
        ';
    }

    ?>
    <div class="wrapper">

        <div class="login_box">
        <div class="login_header">
            <h2>Dishcovery</h2>
            Login or signup below to discover tasty Dishcoveries:
</div>
<div id="first">
        <form action= "register.php" method= "POST">
        <input type = "email" name="log_email" placeholder="Email Address" value="<?php 
        if(isset($_SESSION['log_email'])){
            echo $_SESSION['log_email'];
        }
        ?>" required><br>

        <input type = "password" name="log_password" placeholder="Password">
        <br>
        <?php if(in_array("Email or password you entered is incorrect<br>", $error_array)) echo "Email or password you entered is incorrect<br>" ?>
        <input type= "submit" name="login_button" value="Login"><br>
        <br>
        <a href="#" id="signup" class="signup">New to Dishcovery? Signup here </a>
</form>
    </div>
    <div id="second">
    <form action="register.php" method="POST">
        <input type="text" name="reg_fname" placeholder="First Name" value="<?php 
        if(isset($_SESSION['reg_fname'])){
            echo $_SESSION['reg_fname'];
        }
        ?>" required>
        <br>
        <?php if(in_array("Your first name should be in between 2 and 25 characters!!<br>", $error_array)) echo "Your first name should be in between 2 and 25 characters!!<br>"; ?>

        <input type="text" name="reg_lname" placeholder="Last name" value="<?php 
        if(isset($_SESSION['reg_lname'])){
            echo $_SESSION['reg_lname'];
        }
        ?>" required>
        <br>
        <?php if(in_array("Your last name should be in between 2 and 25 characters!!<br>", $error_array)) echo "Your last name should be in between 2 and 25 characters!!<br>"; ?>

        <input type="email" name="reg_email" placeholder="Email" value="<?php 
        if(isset($_SESSION['reg_email'])){
            echo $_SESSION['reg_email'];
        }
        ?>" required>
        <br>

        <input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php 
        if(isset($_SESSION['reg_email2'])){
            echo $_SESSION['reg_email2'];
        }
        ?>" required>
        <br>
        <?php if(in_array("Email already in use!!<br>", $error_array)) echo "Email already in use!!<br>";
        else if(in_array("Invalid Email Format <br>", $error_array)) echo "Invalid Email Format <br>";
        else if(in_array("Emails don't match, check again!!<br>", $error_array)) echo "Emails don't match, check again!!<br>"; ?>

        <input type="password" name="reg_password" placeholder="Password" required>
        <br>

        <input type="password" name="reg_password2" placeholder="Confirm Password" required>
        <br>
        <?php if(in_array("Your password do not match!!<br>", $error_array)) echo "Your password do not match!!<br>";
        else if(in_array("Your password can only contain english characters or numbers!!<br>", $error_array)) echo "Your password can only contain english characters or numbers!!<br>";
        else if(in_array("Your password must be in between 5 and 30 characters!!<br>", $error_array)) echo "Your password must be in between 5 and 30 characters!!<br>"; ?>

        <input type= "submit" name="register_button" value="Register">
        <br>
        <a href="#" id="signin" class="signin">Already a Dishcovery user? Login here </a>
        <?php if(in_array("<span style='color: #14C800;'>Thanks for registering. You can now login!</span><br>", $error_array)) echo "<span style='color:#14C800;'>Thanks for registering. You can now login!</span><br>"; ?>
</form>
    </div>
</div>
</div>
</body>
</html>