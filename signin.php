<?php
    include_once 'header.php';
?>
<section class="signup-form">
        <br><h2>Sign In</h2>
            <div class="signup-form-form">
                <form action="includes/signin.inc.php" method="post">
                <div class="input-box-signup">
                    <input type="text" name="username" placeholder="Username/Email">
                    <input type="password" name="pwd" placeholder="Password">
                </div>
                    <button type="submit" name="submit" class="btn">Sign In</button>
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