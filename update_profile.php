<?php
session_start();

include "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newFirstName = $_POST["newFirstName"];
    $newSecondName = $_POST["newSecondName"];
    $newLastName = $_POST["newLastName"];
    $newEmail = $_POST["newEmail"];
    $newPhoneNumber = $_POST["newPhoneNumber"];
    $newPassword = $_POST["newPassword"];

    // You should validate user input and handle errors here

    // Update the user's profile in the database
    $username = $_SESSION['username'];
    $updateQuery = "UPDATE user SET fname='$newFirstName', sname='$newSecondName', lname='$newLastName', email='$newEmail', phone='$newPhoneNumber', password='$newPassword' WHERE username='$username'";
    
    if (mysqli_query($connect, $updateQuery)) {
        // Update the session variables with the new data
        $_SESSION['fname'] = $newFirstName;
        $_SESSION['sname'] = $newSecondName;
        $_SESSION['lname'] = $newLastName;
        $_SESSION['email'] = $newEmail;
        $_SESSION['phone'] = $newPhoneNumber;
        $_SESSION['password'] = $newPassword;

        // Redirect back to the home page
        header("location: home.php");
        exit();
    } else {
        echo "Error updating profile: " . mysqli_error($connect);
    }
}
?>
