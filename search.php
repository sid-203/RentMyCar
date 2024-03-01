<?php
    include_once 'header.php';
    require_once './includes/dbh.inc.php';
?>
<section class="signup-form">
        <br><h2>Search Page</h2>
            <div class="signup-form-form">
                <?php
                if (isset($_POST["submit-search"])) {
                    $search = mysqli_real_escape_string($conn, $_POST["search"]);
                    $sql = "SELECT * FROM vehicle_details WHERE location LIKE '%$search%' OR vehicle_make LIKE '%$search%' OR vehicle_model LIKE '%$search%'";
                    $result = mysqli_query($conn, $sql);
                    $queryResult = mysqli_num_rows($result);

                    echo "There are ".$queryResult." results!";

                    if ($queryResult > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<a href='artical.php?make=".$row['vehicle_make']."&location=".$row['location']."'><div class='input-box'>
                                <h3>".$row['vehicle_make']."</h3>
                                <p>".$row['vehicle_model']."</p>
                                <p>".$row['location']."</P>
                                </div></a>";
                         }
                    }
                    else {
                        echo "There are no results matching your search!";
                    }
                }
                ?>
            </div>
            <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Fill all fields<p>";
            }
            else if ($_GET["error"] == "wronglogin") {
                echo "<p>Incorrect login information<p>";
            }
            else if ($_GET["error"] == "wrongpassword") {
                echo"<p>Incorrect password<p>";
            }
        }
    ?>
    </section>
<?php
    include_once 'footer.php';
?>