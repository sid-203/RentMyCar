<?php

    function emptyInputSignup($fist_name, $last_name, $email, $username, $password, $passwordrpt, $telephone, $postcode, $gender, $adress1, $title) {
        $result = false;
        if (empty($fist_name) || empty($last_name) || empty($email) || empty($username) || empty($password) || empty($passwordrpt) || empty($telephone) || empty($postcode) || empty($gender) || empty($adress1) || empty($title)) {
            $result = true;
        }
        else {
            $result = false;
        }
            return $result;
    }
    function invalidUid($username) {
        $result = false;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            $result = true;
        }
        else {
            $result = false;
        }
            return $result;
    }
    function invalidemail($email) {
        $result = false;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        }
        else {
            $result = false;
        }
            return $result;
    }
    function pwdMatch($password, $passwordrpt) {
        $result = false;
        if ($password !== $passwordrpt) {
            $result = true;
        }
        else {
            $result = false;
        }
            return $result;
    }
    function uidExists($conn, $username, $email) {
        $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signup.php?error=stmtfailed");
        exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        }
        else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }
    function createUser($conn, $fist_name, $last_name, $email, $username, $password, $title, $adress1, $gender, $postcode, $telephone, $adress2, $adress3, $description) {
        $sql = "INSERT INTO users (first_name, last_name, email, username, PASSWORD, title, adress1, gender, postcode, telephone, adress2, adress3, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signup.php?error=stmtfailed");
        exit();
        }

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sssssssssssss", $fist_name, $last_name, $email, $username, $hashedPwd, $title, $adress1, $gender, $postcode, $telephone, $adress2, $adress3, $description);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../signup.php?error=none");
        exit();
    }
    function emptyInputSignin($username, $password) {
        $result = false;
        if (empty($username) || empty($password)) {
            $result = true;
        }
        else {
            $result = false;
        }
            return $result;
    }
    function signinUser($conn, $username, $password) {
        $uidExists = uidExists($conn, $username, $username);

        if ($uidExists === false) {
            header("location: ../signin.php?error=user_not_found");
            exit();
        }

        $pwdHashed = $uidExists["password"];
        $checkPwd = password_verify($password, $pwdHashed);

        if ($checkPwd === false) {
            header("location: ../signin.php?error=wrong_password");
            exit();
        }

        else if ($checkPwd === true) {
            session_start();
            $_SESSION["user_id"] = $uidExists["user_id"];
            $_SESSION["username"] = $uidExists["username"];
            header("location: ../index.php");
            exit();
        }
    }
    function displayfirstname($conn, $userid) {
        $sql = "SELECT * FROM users WHERE user_id=$userid;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo "First name: " . $row['first_name'] . "<br>";
        }
        }
    }
    function displaylastname($conn, $userid) {
        $sql = "SELECT * FROM users WHERE user_id=$userid;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo "Last name: " . $row['last_name'] . "<br>";
        }
        }
    }
    function diplaytelephone($conn, $userid) {
        $sql = "SELECT * FROM users WHERE user_id=$userid;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo "Telephone: " . $row['telephone'] . "<br>";
        }
        }
    }
    function displayemail($conn, $userid) {
        $sql = "SELECT * FROM users WHERE user_id=$userid;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo "Email: " . $row['email'] . "<br>";
        }
        }
    }
    function displayadress($conn, $userid) {
        $sql = "SELECT * FROM users WHERE user_id=$userid;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo "Adress: " . $row['adress1'] . "<br>";
        }
        }
    }
    function displaypostcode($conn, $userid) {
        $sql = "SELECT * FROM users WHERE user_id=$userid;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo "Postcode: " . $row['postcode'] . "<br>";
        }
        }
    }
    function displaypwd($conn, $userid, $username) {
        $uidExists = uidExists($conn, $username, $username);
        $hashedPwd = $uidExists["PASSWORD"];
        echo "Password: " . $hashedPwd;
    }
    function editUser($conn, $userid, $first_name, $last_name, $email, $adress1, $postcode, $telephone) {
        $sql = "UPDATE users SET first_name='$first_name', last_name='$last_name', adress1='$adress1', postcode='$postcode', telephone='$telephone' WHERE user_id='$userid'";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../edit.php?error=stmtfailed");
        exit();
        }
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../personal-info.php?error=none");
        exit();
    }
    function displayfirstnamep($conn, $userid) {
        $sql = "SELECT * FROM users WHERE user_id=$userid;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo $row['first_name'];
        }
        }
    }
    function displaylastnamep($conn, $userid) {
        $sql = "SELECT * FROM users WHERE user_id=$userid;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo $row['last_name'];
        }
        }
    }
    function displaytelephonep($conn, $userid) {
        $sql = "SELECT * FROM users WHERE user_id=$userid;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo $row['telephone'];
        }
        }
    }
    function displayemailp($conn, $userid) {
        $sql = "SELECT * FROM users WHERE user_id=$userid;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo $row['email'];
        }
        }
    }
    function displaypostcodep($conn, $userid) {
        $sql = "SELECT * FROM users WHERE user_id=$userid;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo $row['postcode'];
        }
        }
    }
    function displayadress1p($conn, $userid) {
        $sql = "SELECT * FROM users WHERE user_id=$userid;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo $row['adress1'];
        }
        }
    }
    function displaymake($conn, $vehicle_id) {
        $sql = "SELECT * FROM vehicle_details WHERE vehicle_id=$vehicle_id;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo "Make: " . $row['vehicle_make'] . "<br>";
        }
        }
    }
    function displaymodel($conn, $vehicle_id) {
        $sql = "SELECT * FROM vehicle_details WHERE vehicle_id=$vehicle_id;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo "Model: " . $row['vehicle_model'] . "<br>";
        }
        }
    }
    function displaybtype($conn, $vehicle_id) {
        $sql = "SELECT * FROM vehicle_details WHERE vehicle_id=$vehicle_id;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo "Body Type: " . $row['vehicle_bodytype'] . "<br>";
        }
        }
    }
    function displayftype($conn, $vehicle_id) {
        $sql = "SELECT * FROM vehicle_details WHERE vehicle_id=$vehicle_id;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo "Fuel Type: " . $row['fuel_type'] . "<br>";
        }
        }
    }
    function displaymileage($conn, $vehicle_id) {
        $sql = "SELECT * FROM vehicle_details WHERE vehicle_id=$vehicle_id;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo "Mileage: " . $row['mileage'] . "<br>";
        }
        }
    }
    function displayyear($conn, $vehicle_id) {
        $sql = "SELECT * FROM vehicle_details WHERE vehicle_id=$vehicle_id;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo "Year: " . $row['year'] . "<br>";
        }
        }
    }
    function editVehicle($conn, $id, $make, $model, $bodytype, $fueltype, $mileage, $location, $year, $numdoors, $vurl, $iurl) {
        $sql = "UPDATE vehicle_details SET vehicle_make='$make', vehicle_model='$model', vehicle_bodytype='$bodytype', fuel_type='$fueltype', mileage='$mileage',location='$location', year='$year', num_doors='$numdoors', video_url='$vurl', image_url='$iurl' WHERE vehicle_id='$id'";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../editv.php?error=stmtfailed");
        exit();
        }
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../manage.php?error=none");
        exit();
    }
    function displaymakep($conn, $id) {
        $sql = "SELECT * FROM vehicle_details WHERE vehicle_id=$id;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo $row['vehicle_make'];
        }
        }
    }
    function displaymodelp($conn, $id) {
        $sql = "SELECT * FROM vehicle_details WHERE vehicle_id=$id;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo $row['vehicle_model'];
        }
        }
    }
    function displaybtypep($conn, $id) {
        $sql = "SELECT * FROM vehicle_details WHERE vehicle_id=$id;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo $row['vehicle_bodytype'];
        }
        }
    }
    function displayftypep($conn, $id) {
        $sql = "SELECT * FROM vehicle_details WHERE vehicle_id=$id;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo $row['fuel_type'];
        }
        }
    }
    function displaymileagep($conn, $id) {
        $sql = "SELECT * FROM vehicle_details WHERE vehicle_id=$id;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo $row['mileage'];
        }
        }
    }
    function displaylocationp($conn, $id) {
        $sql = "SELECT * FROM vehicle_details WHERE vehicle_id=$id;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo $row['location'];
        }
        }
    }
    function displayyearp($conn, $id) {
        $sql = "SELECT * FROM vehicle_details WHERE vehicle_id=$id;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo $row['year'] ;
        }
        }
    }
    function displayndoorsp($conn, $id) {
        $sql = "SELECT * FROM vehicle_details WHERE vehicle_id=$id;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo $row['num_doors'];
        }
        }
    }
    function displayvurlp($conn, $id) {
        $sql = "SELECT * FROM vehicle_details WHERE vehicle_id=$id;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo $row['video_url'];
        }
        }
    }
    function displayiurlp($conn, $id) {
        $sql = "SELECT * FROM vehicle_details WHERE vehicle_id=$id;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo $row['image_url'];
        }
        }
    }
    function deleteVehicle($conn, $id) {
        $sql = "DELETE FROM vehicle_details WHERE vehicle_id=$id;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../manage.php?error=stmtfailed");
        exit();
        }
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../manage.php?error=none");
        exit();
    }