<?php
    include_once 'profileheader.php';
?>
    <section class="signup-form">
        <br><h2>Edit Vehicle</h2>
            <div class="signup-form-form">
            <?php
            require_once './includes/dbh.inc.php';
            require_once './includes/functions.inc.php';
            $id = $_GET['editid'];
            ?>
                <form action="includes/editv.inc.php" method="post">
                    <div class="input-box-signup">
                    <input type="text" name="make" placeholder="Make" value="<?php displaymakep($conn, $id) ?>">
                    <input type="text" name="model" placeholder="Model" value="<?php displaymodelp($conn, $id) ?>">
                    <input type="text" name="btype" placeholder="Body Type" value="<?php displaybtypep($conn, $id) ?>">
                    <input type="text" name="ftype" placeholder="Fuel Type" value="<?php displayftypep($conn, $id) ?>">
                    <input type="text" name="mileage" placeholder="Mileage" value="<?php displaymileagep($conn, $id) ?>">
                    <input type="text" name="location" placeholder="Location" value="<?php displaylocationp($conn, $id) ?>">
                    <input type="text" name="year" placeholder="Year" value="<?php displayyearp($conn, $id) ?>">
                    <input type="text" name="ndoors" placeholder="Number of Doors" value="<?php displayndoorsp($conn, $id) ?>">
                    <input type="text" name="vurl" placeholder="Video url" value="<?php displayvurlp($conn, $id) ?>">
                    <input type="text" name="iurl" placeholder="Image url" value="<?php displayiurlp($conn, $id) ?>">
                    <input type="text" name="id" placeholder="id" value="<?php echo $id ?>">
                    </div>
                    <button type="submit" name="submit" class="btn">Edit</button>
                </form>
            </div>
    </section>
<?php
    include_once 'footer.php';
?>