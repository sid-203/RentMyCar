<?php
    include_once 'profileheader.php';
?>
    <section class="signup-form">
        <br><h2>Edit User</h2>
            <div class="signup-form-form">
                <form action="includes/edit.inc.php" method="post">
                    <?php
                        require_once './includes/dbh.inc.php';
                        require_once './includes/functions.inc.php';
                        $userid = $_SESSION["user_id"];
                    ?>
                    <div class="input-box-signup">
                    <input type="text" name="first_name" placeholder="First name" value="<?php displayfirstnamep($conn, $userid) ?>">
                    <input type="text" name="last_name" placeholder="Last name" value="<?php displaylastnamep($conn, $userid) ?>">
                    <input type="text" name="email" placeholder="Email" value="<?php displayemailp($conn, $userid) ?>">
                    <input type="text" name="telephone" placeholder="Telephone" value="<?php displaytelephonep($conn, $userid) ?>">
                    <input type="text" name="adress1" placeholder="Adress 1" value="<?php displayadress1p($conn, $userid) ?>">
                    <input type="text" name="postcode" placeholder="Postcode" value="<?php displaypostcodep($conn, $userid) ?>">
                    </div>
                    <button type="submit" name="submit" class="btn">Edit</button>
                </form>
            </div>
            <?php
            if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Fill all fields<p>";
            }
            }
            ?>
    </section>
<?php
    include_once 'footer.php';
?>