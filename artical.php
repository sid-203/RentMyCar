<?php
    include_once 'header.php';
    require_once './includes/dbh.inc.php';
?>
<h1>Vehicle Page<h1>
    <section class="home" id="home">
        <?php
            $make = mysqli_real_escape_string($conn, $_GET['make']);
            $location = mysqli_real_escape_string($conn, $_GET['location']);
            
            $sql = "SELECT * FROM vehicle_details WHERE vehicle_make='$make' AND location='$location'";
            $result = mysqli_query($conn, $sql);
            $queryResults = mysqli_num_rows($result);

            if ($queryResults > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            
                    echo "
                    <div class='vehicle-box'>
                    <h1>Make: </h1><p>".$row['vehicle_make']."</p>
                    <h1>Model: </h1><p>".$row['vehicle_model']."</p>
                    <h1>Location: </h1><p>".$row['location']."</p>
                    <h1>Fuel Type: </h1><p>".$row['fuel_type']."</p> 
                    <input type='submit' class='btn' onclick='openPopup()' value='contact seller'>
                    </div>
                    
                    <div class='img-box'>
                    <img src='./uploads/".$row['image_url']."'>
                    </div>";

                    $userid = $row['user_id'];
                    $sql = "SELECT * FROM users WHERE user_id='$userid';";
                    $result = mysqli_query($conn, $sql);
                    $queryResults = mysqli_num_rows($result);

                    if ($queryResults > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo"
                            <div class='popup' id='popup'>
                            <h1>Email: </h1><p>".$row['email']."</p>
                            <h1>Telephone: </h1><p>".$row['telephone']."</p>
                            <button type='button' onclick='closePopup()'>Done</button>
                            </div>";
                        }
                    }
                }
            }
        ?> 
        <style>
        .home .popup {
            width: 400px;
            background: #fff;
            border-radius: 6px;
            position: absolute;
            top: 0;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.1);
            text-align: center;
            padding: 0 30px 30px;
            visibility: hidden;
            transition: transform 0.4s, top 0.4s;
        }
        .open-popup {
            visibility: visible;
            top: 50%;
            transform: translate(-50%, -50%) scale(1);
        }
        .popup .btn {
            background: #474fa0;
            color: #fff;
            border-radius: 0.5rem;
            text-align: center;
            display: inline-block;
        }
        </style>
        <script>
            let popup = document.getElementById("popup");
            function openPopup() {
                popup.classList.add("open-popup");
            }
            function closePopup() {
                popup.classList.remove("open-popup");
            }
        </script>  
        </section>
        <section class="ride" id="ride">
        <div class="heading">
                <span>How It Works</span>
                <h1>Rent With 3 Easy Steps</h1>
            </div>
            <div class = "ride-container">
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
              
        <?php
            include_once 'footer.php';
        ?>