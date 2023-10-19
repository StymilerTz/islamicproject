<?php
session_start();

include "database.php";

if (isset($_POST['register'])) {
    // Get values from the registration form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $date = $_POST['date'];
    $formattedBirthDate = date("Y-m-d", strtotime($date));
    $age = $_POST['age'];
    $media = $_POST['media'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $registration_number = $_POST['registration_number'];

    // Hash the password (you should use a proper password hashing method)
    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Use prepared statement to prevent SQL injection
    $stmt = $connect->prepare("INSERT INTO user (username, password, fname, sname, lname, gender, date, age, media, phone, email, course, registration_number) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("sssssssssssss", $username, $password, $fname, $sname, $lname, $gender, $formattedBirthDate, $age, $media, $phone, $email, $course, $registration_number);

    // Execute the statement
    $result = $stmt->execute();

    if ($result) {
        // Registration successful, you can redirect the user to a login page
        header("location: index.php");
        exit();
    } else {
        echo "Registration failed. Please try again.";
    }
}
?>
