<?php
session_start();

include "database.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $select = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
    $row = mysqli_fetch_assoc($select);

    if (is_array($row)) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['fname'] = $row['fname'];
        $_SESSION['sname'] = $row['sname'];
        $_SESSION['lname'] = $row['lname'];
        $_SESSION['date'] = $row['date'];
        $_SESSION['age'] = $row['age'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['gender'] = $row['gender'];
        $_SESSION['media'] = $row['media'];
        $_SESSION['registration_number'] = $row['registration_number'];
        header("location: home.php");
        exit();
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Invalid Username or Password");';
        echo 'window.location.href = "index.php"';
        echo '</script>';
    }
}

?>