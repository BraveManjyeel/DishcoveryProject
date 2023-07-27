<?php
//Dishcoveries-variables
$fname = "";
$lname = "";
$em = "";
$em2 = "";
$password = "";
$password2 = "";
$date = "";
$error_array  = array();

if(isset($_POST['register_button'])){


    //Register values
    //Fname
    $fname = strip_tags($_POST['reg_fname']); //remove tags html
    $fname = str_replace('' ,'' ,$fname); //spaces remove
    $fname = ucfirst(strtolower($fname)); //first letter uppercase
    $_SESSION['reg_fname'] = $fname; //stores firsst name in session

    //Lname
    $lname = strip_tags($_POST['reg_lname']); 
    $lname = str_replace('' ,'' ,$lname); 
    $lname = ucfirst(strtolower($lname));
    $_SESSION['reg_lname'] = $lname;

    //Email
    $em = strip_tags($_POST['reg_email']); 
    $em = str_replace('' ,'' ,$em); 
    $em = ucfirst(strtolower($em));
    $_SESSION['reg_email'] = $em;

    //Email2
    $em2 = strip_tags($_POST['reg_email2']); 
    $em2 = str_replace('' ,'' ,$em2); 
    $em2 = ucfirst(strtolower($em2));
    $_SESSION['reg_email2'] = $em2;

    //Password
    $password = strip_tags($_POST['reg_password']); 
    $password2 = strip_tags($_POST['reg_password2']); 

    $date = date("Y-m-d"); //hehe date tha hunxa

    if($em == $em2) {
        if(filter_var($em, FILTER_VALIDATE_EMAIL)){

            $em = filter_var($em, FILTER_VALIDATE_EMAIL);

            //Checking if email exists

            $e_check = mysqli_query($con, "SELECT email FROM users WHERE email= '$em'");

            //Num of rows retrnd

            $num_rows = mysqli_num_rows($e_check);

            if($num_rows > 0) {
                array_push($error_array, "Email already in use!!<br>");
            }
        
        }
        else {
            array_push($error_array,"Invalid Email Format <br>");
        }

    }
    else {
        array_push($error_array, "Emails don't match, check again!!<br>");
    }

    if(strlen($fname)> 25 || strlen($fname) < 2){
        array_push($error_array, "Your first name should be in between 2 and 25 characters!!<br>");
    }
    if(strlen($lname)> 25 || strlen($lname) < 2){
        array_push($error_array, "Your last name should be in between 2 and 25 characters!!<br>");
    }

    if($password != $password2) {
        array_push($error_array, "Your password do not match!!<br>");
    }
    else{
        if(preg_match('/[^A-Za-z0-9]/', $password)){
            array_push($error_array, "Your password can only contain english characters or numbers!!<br>");
        }
    }

    if(strlen($password) > 30 || strlen($password) < 5){
        array_push($error_array, "Your password must be in between 5 and 30 characters!!<br>");
    }
    if(empty($error_array)) {
        $password = md5($password); //encrypting the password
    
        //generating username- concatinating
        $username = strtolower($fname . "_" . $lname);
        $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");

        $i=0;
        //if usr exists add no to usrnm
        while(mysqli_num_rows($check_username_query) !=0) {
            $i++; //Adding numbers
            $username = $username . "_" . $i;
            $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'" );
        }
        //DP DP DP DP DP
        $rand = rand(1,2);

        if($rand == 1)
         $profile_pic = "assets/images/profile_pics/defaults/1.jpg";

         else if($rand == 2)
         $profile_pic = "assets/images/profile_pics/defaults/2.jpg";

         $query = mysqli_query($con, "INSERT INTO users VALUES('', '$fname', '$lname', '$username', '$em', '$password', '$date', '$profile_pic', '0', '0', 'no', ',' )");

         array_push($error_array, "<span style='color: #14C800;'>Thanks for registering. You can now login!</span><br>");

         //clear
         $_SESSION['reg_fname'] = "";
         $_SESSION['reg_lname'] = "";
         $_SESSION['reg_email'] = "";
         $_SESSION['reg_email2'] = "";
    }
}

?>