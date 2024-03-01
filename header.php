<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Car Rental Website</title>
<link rel="icon" type="image/png" href="./images/car.png">
<!-- Link To CSS -->
<link rel="stylesheet" href="style.css">
<!-- Box Icons -->
<link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <header>
        <a href="index.php" class="logo"><img src="./images/jeep.png" alt=""></a> I
        <div class="bx bx-menu" id="menu-icon"></div>
        <ul class="navbar">
            <li><a href='#home'>Home</a></li>
            <li><a href='#ride'>Ride</a></li>
            <li><a href='#services'>Services</a></li>
            <li><a href='#about'>About</a></li>
            <li><a href='#reviews'>Reviews</a></li>
        </ul>
        <div class="header-btn">
            <?php
                if (isset($_SESSION["username"])) {
                    echo "<li><a href='personal-info.php' class= 'profile-page'>Profile Page</a></li>";
                    echo "<li><a href='./includes/signout.inc.php' class='sign-out'>Sign out</a></li>";
                }
                else {
                    echo "<li><a href='signup.php' class='sign-up'>Sign Up</a></li>";
                    echo "<li><a href='signin.php' class='sign-in'>Sign In</a></li>";
                }
            ?>
        </div>
        </header>