<?php 

session_start();

include"database.php";

if (isset($_POST['submit'])) {
	$media = $_POST['media'];

	$stmt = $connect->prepare("INSERT INTO admin(media) VALUES (?)");

	$stmt->bind_param("s", $media);

	$result = $stmt->execute();


}

?>