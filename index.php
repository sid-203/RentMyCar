<?php
    include_once 'header.php';
    require_once './includes/dbh.inc.php';
?>
        <section class="home" id="home">
            <div class="text">
                <h1><span>Looking</span> to <br>rent a car</h1>
                <p>The company itself is a very successful company. Flee as you may</p>
                <div class="app-stores">
                    <img src="./images/ios.png" alt="app store image">
                    <img src="./images/512x512.png" alt="play store image">
                </div>
            </div>
            <div class="form-container">
               <form action="search.php" method="POST">
                <div class="input-box">
                    <span>Location</span>
                    <input type="text" name="search" id="" placeholder="Search">
                </div>
                <input type="submit" name="submit-search" id="" class="btn">
               </form> 
            </div>
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
        </section>
        <section class="services" id="services">
            <div class="heading">
                <span>Best Services</span>
                <h1>Explore Our Top Deals <br> From Top Rated Dealers</h1>
            </div>
            <div class = "services-container">
                <?php
                $sql = "SELECT * FROM vehicle_details";
                $result = mysqli_query($conn, $sql);
                $queryResults = mysqli_num_rows($result);

                if ($queryResults > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                    <div class = 'box'>
                        <div class='box-img'>
                            <img src='./uploads/".$row['image_url']."'>
                        </div>
                        <h3>".$row['vehicle_make']."</h3>
                        <p>".$row['vehicle_model']."</p>
                        <p>".$row['location']."</p>
                        <a href='artical.php?make=".$row['vehicle_make']."&location=".$row['location']."' class='btn'>Rent Now</a>
                    </div>";
                        }
                        }
                    ?>
            </div>
            </section>
            <section class = "about" id ="about">
                <div class = "heading">
                    <span>About Us</span>
                    <h1>Best Customer Experience</h1>
                </div>
                <div class = "about-container">
                    <div class = about-img>
                        <img src = ".\images\porsche2.png">
                    </div>
                    <div class = "about-text">
                    <span>About Us</span>
                    <p>Rentmycar.io is a car rental website that mainly operates in the UK. Helping people all over the nation find a rental that stisfies their needs</p>
                    <a href = "#" class = "btn">Learn More</a>
                    </div>
                </div>
            </section>
            <section class="reviews" id="reviews">
                <div class="heading">
                    <span>Reviews</span>
                    <h1>What People Think Of Us</h1>
                </div>
                <div class="reviews-container">
                <div class="box">
                        <div class="rev-img">
                            <img src="./images/rev1.png">
                        </div>
                        <h2>Lola Blake</h2>
                        <div class="stars">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star-half' ></i>
                        </div>
                        <p>The process of creating the ad was very simple. The contact process feels very secure. The cost of the ad seemed reasonable priced which considering the car was rented within a few days. However, I had paid for six weeks. But I'm satisfied with the overall result.</p>
                    </div>
                    <div class="box">
                        <div class="rev-img">
                            <img src="./images/rev2.png">
                        </div>
                        <h2>Hallie Huber</h2>
                        <div class="stars">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        </div>
                    <p>Very pleased, first time I have used, Ad generated several enquiries all within a few hours from local potential rentals and vehicle was rented within a day.Will use again. Very much more interest than from using Facebook marketplace.</p>
                    </div>
                    <div class="box">
                        <div class="rev-img">
                            <img src="./images/rev3.png">
                        </div>
                        <h2>Gail Richmond</h2>
                        <div class="stars">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star-half' ></i>
                        </div>
                        <p>Website was easy to use. Had a couple of people contact me who were obviously time wasters but also a couple who were genuine. Process to rent was very easy and the security for my phone number and email through Rentmycar.io gave me confidence that the time wasters couldn't cause any bother.</p>
                    </div>
                    <div class="box">
                        <div class="rev-img">
                            <img src="./images/rev4.png">
                        </div>
                        <h2>Jorge Leach</h2>
                        <div class="stars">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star-half' ></i>
                        </div>
                        <p>Rentmycar.io gave me visibility for my van. I didn't want to have to work hard to rent her. She had done a lot of miles and so Rentmycar.io helped me put her into the public view. It worked a treat! Thank you very much.</p>
                    </div>
                </div>
            </section>
            <section class="newsletter">
                <h2>SUbscribe To Newsletter</h2>
                <div class="box">
                    <input type="text" placeholder="Email">
                    <a href="#" class="btn">Subscribe</a>
                </div>
        <?php
            include_once 'footer.php';
        ?>