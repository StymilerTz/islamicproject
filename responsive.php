<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
	<style type="text/css">
		.myForm {
			width: 900px;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			box-shadow: 0 0 15px black;
			padding: 20px;
			border-radius: 10px;
		}
	</style>
</head>
<body>
    <div class="container">
    	
       <div class="col-md-12 myForm">
       	<center>
       		<h3>LOGIN INTO YOUR ACCOUNT</h3>
       		<img src="photo/logo.jpg"  height="60px" width="60px" style="border-radius: 50%;">
       	</center>
       	<hr>
       	<div class="row">
       		<div class="col-md-6">
       			<div class="">
       				<img src="photo/logo.jpg"  height="200px">
       			</div>
       		</div>
       		<div class="col-md-6">
       			<div class="loginForm">
       				<form action="#" method="POST" enctype="multipart/form-data" onsubmit="return validationForm()">
       					<div class="form-group">
       						<strong>Username</strong>
       						<input class="form-control" type="text" name="username" placeholder="Enter Username" required>
       					</div>
       					<div class="form-group">
       						<strong>Password</strong>
       						<input class="form-control" type="password" name="password" placeholder="Enter Password" required>
       					</div>
       					
       				</form>
       			</div>
       		</div>
       	</div>
       </div>
    </div>
</body>
</html>