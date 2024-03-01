
<?php
    include_once 'profileheader.php';
?>
        <section class="home" id="home">
            <div class="form-container">
               <form action="">
                <?php
                    require_once './includes/dbh.inc.php';
                    require_once './includes/functions.inc.php';
                    $userid = $_SESSION["user_id"];
                    $username = $_SESSION["username"];
                    displayemail($conn, $userid);
                    displaypwd($conn, $userid, $username);
                ?>
               </form> 
            </div>
        </section>
        <section class="ride" id="ride">
            <div class="heading">
                <span>How It Works</span>
                <h1>Rent With 3 Easy Steps</h1>
            </div>
            <div class="ride-container">
                <div class="box">
                    <i class='bx bxs-map'></i>
                    <h2>Choose a location</h2>
                    <p>Don't let anything or anyone hold you back</p>
                </div>
                <div class="box">
                    <i class='bx bxs-calendar-check'></i>
                    <h2>Pick-Up Date</h2>
                    <p>Don't let anything or anyone hold you back</p>
                </div>
                <div class="box">
                    <i class='bx bxs-calendar-star'></i>
                    <h2>Book A Car</h2>
                    <p>Don't lat anything or anyone hold you back</p>
                </div>
            </div>
        </section>
        <section class="services" id="services">
            <div class="heading">
                <span>Best Services</span>
                <h1>Explore Our Top Deals <br> From Top Rated Dealers</h1>
            </div>
        <?php
            include_once 'footer.php';
        ?>