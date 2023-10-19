<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Page</title>
  
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">

    <style>
    	
.myform1 {
	width: 400px;
	padding: 50px;
	top: 65%;
	left: 65%;
	position: absolute;
	transform: translate(-50%, -50%);
}



.myform2 {
	width: 400px;
	padding: 20px;
	top: 58%;
	right: 45%;
	position: absolute;
	transform: translate(-50%, -50%);
}
    </style>

</head>

<body style="background: #dfe9f5;">
    <div class="container">
	 <center>
        <h2>Welcome!</h2>
            <img class="img" src="photo/logo.jpg" width="60px" height="60px">
            <hr>
        </center>
    <form action="action.php" method="POST">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
            <strong for="fname">First Name:</strong>
            <input type="text" name="fname" placeholder="Enter First Name" class="form-control" required>
        </div>
        <div class="form-group">
            <strong for="sname">Second Name:</strong>
            <input type="text" name="sname" placeholder="Enter Second Name" class="form-control" required>
        </div>
        <div class="form-group">
            <strong for="lname">Last Name:</strong>
            <input type="text" name="lname" placeholder="Enter Last Name" class="form-control" required>
        </div>
        <div class="form-group">
            <strong for="gender">Gender:</strong>
            <input type="radio" name="gender" value="Male" required> Male
            <input type="radio" name="gender" value="Female" required> Female
        </div>
        <div class="form-group">
            <strong for="date">Date of Birth:</strong>
            <input type="date" name="date" placeholder="Enter Date of birth" class="form-control" required>
        </div>
        <div class="form-group">
            <strong for="age">Age:</strong>
            <input type="number" name="age" placeholder="Enter Age" class="form-control" required>
        </div>

    <div>
            <strong>Profile Photo</strong>
            <input type="file" accept="image/*" name="media" placeholder="upload a video" required>
        </div>

    </div>

    
            <div class="col-md-6">
                <div class="form-group">
            <strong for="phone">Phone Number:</strong>
            <input type="tel" name="phone" placeholder="Enter Phone Number" class="form-control" required>
        </div>

        <div class="formgroup">
            <strong for="email">Email Address:</strong>
            <input type="email" name="email" placeholder="Enter Email Address" class="form-control" required>
        </div>

        <div class="formgroup">
            <strong for="course">Course Name:</strong>
            <input type="text" name="course" placeholder="Enter Course Name" class="form-control" required>
        </div>

        <div class="formgroup">
            <strong for="registration_number">Registration Number:</strong>
            <input type="text" name="registration_number" placeholder="Enter Registration Number" class="form-control" required>
        </div>

        <div class="formgroup">
            <strong for="username">Username:</strong>
            <input type="text" name="username" placeholder="Enter Username" class="form-control" required>
        </div>

        <div class="formgroup">
            <strong for="password">Password:</strong>
            <input type="password" name="password" placeholder="Enter Password" class="form-control" required>
            <input type="checkbox" id="showPassword" onchange="togglePassword()"> Show Password
        </div>
            <br>

        <div class="col-md-12">
            <div class="col-md-6">
                <button class="btn btn-primary" name="register">Register</button>
            </div>
             <div class="col-md-6">
                <p><b>Do you have an account? <a href="index.php">Login</a></b></p>
            </div>
        </div>
                </div>
            </div>
        </div>

    </div>
</form>

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
</div>
</body>
</html>
