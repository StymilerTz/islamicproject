<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="myform">
	<form method="POST" action="login_progress.php">
		<h2>Login here</h2>
		<hr>
		<center>
			<img class="img" src="photo/logo.jpg" width="90px" height="90px">
		</center>
		<div>
			<strong>Username</strong>
			<input type="text" name="username" placeholder="username" class="form-control" required>
		</div>
		<div>
			<strong>Password</strong>
			<input type="password" id="password" name="password" placeholder="password" class="form-control" required>
			<input type="checkbox" id="showPassword" onchange="togglePassword()"> Show Password
		</div>
		<br>
		<button class="btn btn-primary" name="login">Login</button>
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-6">
					<p><b>Forget Password? <a href="#">Reset</a> </b></p>
				</div>
				<div class="col-md-6">
					<p><b>Don't you have an account? <a href="register.php">Register</a></b></p>
				</div>
			</div>
		</div>
	</form>
</div>

<script>
	function togglePassword() {
		var passwordField = document.getElementById("password");
		var showPasswordCheckbox = document.getElementById("showPassword");

		if (showPasswordCheckbox.checked) {
			passwordField.type = "text";
		} else {
			passwordField.type = "password";
		}
	}
</script>

</body>
</html>
