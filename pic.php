<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["profile_picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
    if ($check === false) {
        $uploadOk = 0;
    }

    if (file_exists($targetFile)) {
        $uploadOk = 0;
    }

    if ($_FILES["profile_picture"]["size"] > 500000) {
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $uploadOk = 0;
    }

    if ($uploadOk == 1 && move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFile)) {
        // File uploaded successfully
        $filePath = $targetFile;

        // Store the file path in the database
        $sql = "UPDATE user SET profile_picture = '$filePath' WHERE user_id = 1"; // Assuming user_id 1 for the example
        $conn->query($sql);
    } else {
        // Error uploading file, use default image
        $filePath = "uploads/default.jpg";
    }
} else {
    // Fetch profile picture path from the database
    $result = $conn->query("SELECT profile_picture FROM user WHERE user_id = 1"); // Assuming user_id 1 for the example

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $filePath = $row["profile_picture"];
    } else {
        // If no record is found, use default image
        $filePath = "uploads/default.jpg";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Picture Upload</title>
</head>
<body>
    <h2>Upload Profile Picture</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="profile_picture" accept="image/*" required>
        <button type="submit" name="upload">Upload</button>
    </form>

    <h2>Your Profile Picture</h2>
    <img src="<?php echo $filePath; ?>" alt="Profile Picture">
</body>
</html>
