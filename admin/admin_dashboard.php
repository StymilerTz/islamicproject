<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

<div class="container">
	<form action="admin_dashboard.php" method="POST" enctype="multipart/form-data">
		<div>
			<strong>Media</strong>
			<input type="file" accept="image/*" name="media" placeholder="upload a video" required><br>
			<button class="btn btn-succes" value="submit">Submit</button>
		</div>
	</form>
</div>

</body>
</html>

<?php 

session_start();

include"database.php";

if (isset($_POST['submit'])) {
	$media = $_POST['media'];

	$stmt = $connect->prepare("INSERT INTO admin(media) VALUES (?)");

	$stmt->bind_param("s", $media);

	$result = $stmt->execute();
	if ($result) {
        // Registration successful, you can redirect the user to a login page
        header("location: admin_dashboard.php");
        exit();
    } else {
        echo "Incorrect input type. Choose again";
    }

}

?>