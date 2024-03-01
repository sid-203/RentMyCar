<?php
    include_once 'header.php';
?>
    <section class="signup-form">
        <br><h2>Sign Up</h2>
            <div class="signup-form-form">
                <form action="includes/signup.inc.php" method="post">
                    <div class="input-box-signup">
                    <input type="text" name="title" placeholder="Title">
                    <input type="text" name="first_name" placeholder="First name">
                    <input type="text" name="last_name" placeholder="Last name">
                    <input type="text" name="email" placeholder="Email">
                    <input type="text" name="username" placeholder="Username">
                    <input type="password" name="PASSWORD" placeholder="Password">
                    <input type="password" name="PASSWORDrpt" placeholder="Repeat Password">
                    <input type="text" name="telephone" placeholder="Telephone">
                    <input type="text" name="gender" placeholder="Gender">
                    <input type="text" name="adress1" placeholder="Adress 1">
                    <input type="text" name="adress2" placeholder="Adress 2 'OPTIONAL'">
                    <input type="text" name="adress3" placeholder="Adress 3 'OPTIONAL'">
                    <input type="text" name="postcode" placeholder="Postcode">
                    <input type="text" name="description" placeholder="Description 'OPTIONAL'">
                    </div>
                    <button type="submit" name="submit" class="btn">Sign Up</button>
                </form>
            </div>
            <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Fill all fields<p>";
            }
            else if ($_GET["error"] == "invaliduid") {
                echo "<p>Choose a proper username<p>";
            }
            else if ($_GET["error"] == "invalidemail") {
                echo "<p>Choose a proper email<p>";
            }
            else if ($_GET["error"] == "passwordsdontmatch") {
                echo "<p>Passwords don't match!<p>";
            }
            else if ($_GET["error"] == "stmtfailed") {
                echo "<p>Something went wrong, Try again!<p>";
            }
            else if ($_GET["error"] == "usernametaken") {
                echo "<p>Choose another username<p>";
            }
            else if ($_GET["error"] == "none") {
                echo "<p>You have  signed Up<p>";
            }
        }
    ?>
    </section>
<?php
    include_once 'footer.php';
?>