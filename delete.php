<?php
    require_once './includes/dbh.inc.php';
    include_once 'profileheader.php';
?>
<section class="signup-form">
        <br><h2>Delete</h2>
            <div class="signup-form-form">
            <?php
                require_once './includes/dbh.inc.php';
                require_once './includes/functions.inc.php';
                $id = $_GET['deleteid'];
                $userid = $_SESSION['user_id'];
                ?>
                <form action="./includes/delete.inc.php?id=<?php echo $id?>" method="post">
                <div class="input-box-signup">
                <?php
                $sql = "SELECT * FROM vehicle_details WHERE vehicle_id='$id' AND user_id='$userid'";
                $result = mysqli_query($conn, $sql);
                $queryResults = mysqli_num_rows($result);
    
                if ($queryResults > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                echo "<p>Do you want to delete the ".$row['vehicle_make']." ".$row['vehicle_model']."?";
                    }
                }
                ?>
                </div>
                    <button type="submit" name="submit" class="btn">Delete</button>
                </form>
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