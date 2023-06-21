<?php
include 'inc/connection.php';

function checkExistingUsername($link, $username) {
    $query = "SELECT * FROM t_registration WHERE username = '$username'";
    $result = mysqli_query($link, $query);

    if (!$result) {
        // Query execution failed
        die("Error: " . mysqli_error($link));
    }

    return mysqli_num_rows($result) > 0;
}

function checkExistingEmail($link, $email) {
    $query = "SELECT * FROM t_registration WHERE email = '$email'";
    $result = mysqli_query($link, $query);

    if (!$result) {
        // Query execution failed
        die("Error: " . mysqli_error($link));
    }

    return mysqli_num_rows($result) > 0;
}

function registerTeacher($link, $name, $username, $password, $dept, $email, $phone, $regno, $address) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password
    $photo = "upload/img.png";
    $utype = "teacher";
    $query = "INSERT INTO t_registration (name, username, password, dept, email, phone, regno, address,utype,photo)
              VALUES ('$name', '$username', '$hashedPassword', '$dept', '$email', '$phone', '$regno', '$address', '$utype', '$photo''pending', '$vkey', 'no')";

    $result = mysqli_query($link, $query);

    if (!$result) {
        // Query execution failed
        die("Error: " . mysqli_error($link));
    }

    return $result;
}
?>

