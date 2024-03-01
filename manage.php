<?php
    include_once 'profileheader.php';
?>
        <section class="home" id="home">
            <div class="form-container">
                <form action="">
                <style>
                    th, td {
                    border: 1px solid black;
                    border-radius: 10px;
                    }
                </style>
                <?php
                    require_once './includes/dbh.inc.php';
                    require_once './includes/functions.inc.php';
                    $userid = $_SESSION["user_id"];
                    $query = "SELECT * FROM vehicle_details WHERE user_id=$userid;";
                    $result = mysqli_query($conn,$query);
                ?>
                <table class="table">
                    <tr>
                        <td> Make </td>
                        <td> Model </td>
                        <td> Year </td>
                        <td> View </td>
                        <td> Edit </td>
                        <td> Delete </td>
                    </tr>
                    <tr>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {

                            ?>
                            <td><?php echo $row['vehicle_make']?></td>
                            <td><?php echo $row['vehicle_model']?></td>
                            <td><?php echo $row['year']?></td>
                            <td><a href="vehicle_info.php?viewid=<?php echo $row['vehicle_id'] ?>">View</a></td>
                            <td><a href="editv.php?editid=<?php echo $row['vehicle_id'] ?>">Edit</a></td>
                            <td><a href="delete.php?deleteid=<?php echo $row['vehicle_id']?>">Delete</a></td>
                            </tr>
                            <?php
                            }
                            ?>
                </table>
                <style>
                    table, tr,td {
                        border: 1px solid;
                        width: 50%;
                        text-align: center;
                    }
                </style>
                <input type=button onClick="location.href='add.php'" value='Add' class="btn">
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
        <?php
            include_once 'footer.php';
        ?>