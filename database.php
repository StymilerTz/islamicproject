<?php 

//define material for connctionm
	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "login_db";

//create connection
	$connect = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

//check for connection
	if ($connect) {

	} else {
		echo "Failed to connect to the server";
	}


?>