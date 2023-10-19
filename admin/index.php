<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
</head>
<body>
<div class="container">
	<form action="index.php" method="POST">
			<div class="add">
		<div>
		<strong>Username</strong>
		<input type="text" name="username" placeholder="username" required>
		</div>
		<div>
		<strong>Password</strong>
		<input type="password" name="password" placeholder="password" required>
		</div>
		<br>
		<button class="btn btn-primary" name="login">Login</button>
		</div>
</form>
</div>

</body>
</html>

<?php

 session_start();

 include "database.php";

 if (isset($_POST['login'])) {
 	$username = $_POST['username'];
 	$password = $_POST['password'];

 	$select = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
 	$row = mysqli_fetch_assoc($select);

 	if(is_array($row)){
 		$_SESSION['username'] = $row['username'];
 		$_SESSION['password'] = $row['password'];

 		header("location: admin_dashboard.php");
 		exit();
 	} else {
        echo '<script type="text/javascript">';
        echo 'alert("Invalid Username or Password");';
        echo 'window.location.href = "index.php"';
        echo '</script>';
    }
}

?>