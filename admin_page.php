<?php
include "database.php";

// Ensure you have a database connection established
$conn = mysqli_connect("localhost", "root", "", "login_db");

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to fetch user data
function getUsers($result) {
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td><a href='admin_page.php?edit=" . $row['id'] . "'>Edit</a></td>";
                echo "<td><a href='admin_page.php?delete=" . $row['id'] . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No users found</td></tr>";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Handle Update, Add, and Delete operations
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['editUser'])) {
        // Handle Edit operation
        $userIdToEdit = isset($_POST['userIdToEdit']) ? $_POST['userIdToEdit'] : null;
        $editedEmail = isset($_POST['editedEmail']) ? $_POST['editedEmail'] : null;

        if ($userIdToEdit !== null && $editedEmail !== null) {
            $sqlEdit = "UPDATE user SET email = '$editedEmail' WHERE id = $userIdToEdit";
            $resultEdit = mysqli_query($conn, $sqlEdit);

            if ($resultEdit) {
                // Successfully updated
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }
    } elseif (isset($_POST['deleteUser'])) {
        // Handle Delete operation
        $userIdToDelete = isset($_POST['userIdToDelete']) ? $_POST['userIdToDelete'] : null;

        if ($userIdToDelete !== null) {
            $sqlDelete = "DELETE FROM user WHERE id = $userIdToDelete";
            $resultDelete = mysqli_query($conn, $sqlDelete);

            if ($resultDelete) {
                // Successfully deleted
            } else {
                echo "Error deleting record: " . mysqli_error($conn);
            }
        }
    } elseif (isset($_POST['addUser'])) {
        // Handle Add operation
        $newEmail = isset($_POST['newEmail']) ? $_POST['newEmail'] : null;

        if ($newEmail !== null) {
            $sqlAdd = "INSERT INTO user (email) VALUES ('$newEmail')";
            $resultAdd = mysqli_query($conn, $sqlAdd);

            if ($resultAdd) {
                // Successfully added
            } else {
                echo "Error adding record: " . mysqli_error($conn);
            }
        }
    }
}

// Execute the query and pass the result to the function
$sql = "SELECT id, email FROM user";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h2>Admin Page</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        
        <?php getUsers($result); ?>
        
    </table>

    <!-- Add User Form -->
    <h3>Add User</h3>
    <form method="post" action="admin_page.php">
        <label>Email:</label>
        <input type="text" name="newEmail" required>
        <input type="submit" name="addUser" value="Add User">
    </form>

    <!-- Edit User Form -->
    <?php
    if (isset($_GET['edit'])) {
        $userIdToEdit = $_GET['edit'];
        $sqlEdit = "SELECT * FROM user WHERE id = $userIdToEdit";
        $resultEdit = mysqli_query($conn, $sqlEdit);
        $rowEdit = mysqli_fetch_assoc($resultEdit);
        ?>
        <h3>Edit User</h3>
        <form method="post" action="admin_page.php">
            <input type="hidden" name="userIdToEdit" value="<?php echo $rowEdit['id']; ?>">
            <label>Email:</label>
            <input type="text" name="editedEmail" value="<?php echo $rowEdit['email']; ?>" required>
            <input type="submit" name="editUser" value="Save Changes">
        </form>
    <?php
    }
    ?>

    <!-- Delete User Form -->
    <h3>Delete User</h3>
    <form method="post" action="admin_page.php">
        <label>ID:</label>
        <input type="text" name="userIdToDelete" required>
        <input type="submit" name="deleteUser" value="Delete User">
    </form>

</body>
</html>
