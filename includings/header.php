    <?php
    require 'config/config.php';

    if(isset($_SESSION['username'])) {
        $userLoggedIn = $_SESSION['username'];
        $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
        $user = mysqli_fetch_array($user_details_query);
    }
    else {
        header('Location: register.php');
    }
    ?>

    <html>
        <head>
            <title>Welcome</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
            <script src="assets/js/bootstrap.js"></script>
            <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
            <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    </head>
    <body>
    <div class="top_bar">
    <div class="logo">
        <a href="index.php">Dishcovery</a>
    </div>
    <nav>
    <a href="<?php echo $userLoggedIn; ?>"">
        <?php
        echo $user['first_name'];
        ?>
        </a>
        <a href="#">
        <i class="fa-solid fa-house"></i>
        </a>
        <a href="#">
        <i class="fa-solid fa-envelope"></i>
        </a>
        <a href="<?php echo $userLoggedIn; ?>"">
        <i class="fa-solid fa-user"></i>
        </a>
        <a href="includings/handlers/logout.php">
        <i class="fa-solid fa-right-from-bracket"></i>
        </a>

    </nav>
    </div>

    <div class="wrapper">