<?php
    include_once 'profileheader.php';
?>
    <section class="signup-form">
        <br><h2>Add car</h2>
            <div class="signup-form-form">
                <form action="add.php" method="post" enctype="multipart/form-data">
                    <div class="input-box-signup">
                    <input type="text" name="make" placeholder="Make">
                    <input type="text" name="model" placeholder="Model">
                    <input type="text" name="bodytype" placeholder="Bodytype">
                    <input type="text" name="fueltype" placeholder="Fueltype">
                    <input type="text" name="mileage" placeholder="Mileage">
                    <input type="text" name="location" placeholder="Location">
                    <input type="text" name="year" placeholder="Year">
                    <input type="text" name="numdoors" placeholder="Number of Doors">
                    <input type="file" name="image_file" id="image_file">
                    </div>
                    <button type="submit" name="submit" class="btn">Add</button>
                </form>
            </div>
<?php
    include_once 'footer.php';
?>
<?php
require_once './includes/dbh.inc.php';
if(isset($_POST['submit'])) {

    $userid = $_SESSION["user_id"];
	$vehicle_make = $_POST['make'];
	$vehicle_model = $_POST['model'];
	$bodytype = $_POST['bodytype'];
	$fueltype = $_POST['fueltype'];
	$mileage = $_POST['mileage'];
	$location = $_POST['location'];
	$year = $_POST['year'];
	$num_doors = $_POST['num_doors'];
	
	// process image file upload
	if($_FILES['image_file']['name'] != '') {
		$image_file_name = $_FILES['image_file']['name'];
		$image_file_tmp = $_FILES['image_file']['tmp_name'];
		$image_file_path = "./uploads/".$image_file_name;
		if(move_uploaded_file($image_file_tmp, $image_file_path)) {
			header("location: add.php?error=Image_file_uploaded_successfuly");
		} else {
			header("location: add.php?error=Image_file_not_uploaded_successfuly");
		}
	}
	
	// insert form data into database
	$sql = "INSERT INTO vehicle_details (user_id, vehicle_make, vehicle_model, vehicle_bodytype, fuel_type, mileage, location, year, num_doors, image_url) VALUES ('$userid', '$vehicle_make', '$vehicle_model', '$bodytype', '$fueltype', '$mileage', '$location', '$year', '$num_doors', '$image_file_name')";
	if(mysqli_query($conn, $sql)) {
		header("location: add.php?error=none");
        exit();
	} else {
		header("location: add.php?error=Error_submitting_form_data_to_database:". mysqli_error($conn));
	}
}

// close database connection
mysqli_close($conn);
?>