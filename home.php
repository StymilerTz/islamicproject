<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <style>
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            width: 60%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

    .info {
    padding: 50px;
    top: 15%;
    left: 50%;
    position: absolute;
    transform: translate(-50%, -50%);
}

.media{
    border-radius: 20%;
    box-shadow: black;
    width: 100px;
    padding: 50px;
    top: 70%;
    left: 20%;
    position: absolute;
    transform: translate(-50%, -50%);
}



   body {
            font-size: 16px; /* Set a base font size */
        }

        @media only screen and (max-width: 768px) {
            /* Adjust styles for smaller screens */
            body {
                font-size: 14px; /* Adjust font size for smaller screens if needed */
            }

            .info {
                padding: 20px; /* Adjust padding for smaller screens */
            }

            .modal-content {
                width: 80%; /* Adjust modal width for smaller screens */
            }
        }

    </style>
</head>
<body>
<center>
    <div>
        <h3>Welcome <b>
            <?php 
            if (isset($_SESSION['fname']) && isset($_SESSION['sname']) && isset(
            $_SESSION['lname'])) {

            echo $_SESSION['fname'] . ' ' . $_SESSION['sname'] . ' ' . $_SESSION['lname'];
            }
                else {
                    header('location: index.php');
                }
            
             ?>
                
            </b></h3>
        <hr>
    </div>
</center>

<div class="container">
    <div class="row">


<div class="info">
<h4>
    Welcome to <b>MoCU Islamic Student Home Page</b>
</h4>
</div> <br>


<nav>
    <ul>
        <li>
            <!-- Add an onclick event to open the Profile modal -->
            <a href="javascript:void(0);" onclick="openProfileModal()">
                <i class="fas fa-user"></i>
                <span class="nav-item">Profile</span>
            </a>
        </li>
        <li>
            <!-- Add an onclick event to open the Setting modal -->
            <a href="javascript:void(0);" onclick="openSettingModal()">
                <i class="fas fa-cog"></i>
                <span class="nav-item">Setting</span>
            </a>
        </li>
        <li>
            <!-- Add an onclick event to open the Help modal -->
            <a href="javascript:void(0);" onclick="openHelpModal()">
                <i class="fas fa-question-circle"></i>
                <span class="nav-item">Help</span>
            </a>
        </li>
        <li>
            <a href="#" class="logout">
                <i class="fas fa-sign-out-circle"></i>
                <span><a href="logout.php">Logout</a></span>
            </a>
        </li>
    </ul>
</nav>



<!-- Profile Modal -->
<div id="profileModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeProfileModal">&times;</span>
        <h2>User Profile</h2>
        <p><strong>First Name:</strong> <span id="profileFirstName"></span></p>
        <p><strong>Second Name:</strong> <span id="profileSecondName"></span></p>
        <p><strong>Last Name:</strong> <span id="profileLastName"></span></p>
        <p><strong>Email:</strong> <span id="profileEmal"></span></p>
        <p><strong>Date of Birth:</strong> <span id="profileDateOfBirth"></span></p>
        <p><strong>Age:</strong> <span id="profileAge"></span></p>
        <p><strong>Phone:</strong> <span id="profilePhone"></span></p>
        <p><strong>Gender:</strong> <span id="profileGender"></span></p>
        <p><strong>Registration Number:</strong> <span id="profileRegistrationNumber"></span></p>
        <p><strong>Password:</strong> <span id="profilePassword"></span></p>
        <p><strong>Media:</strong> <span id="profileMedia"></span></p>
    </div>
</div>

<!-- Setting Modal -->
<div id="settingModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeSettingModal">&times;</span>
        <h2>Settings</h2>
        <form id="updateForm" method="POST" action="update_profile.php">
            <div class="form-group">
                <label for="newFirstName">New First Name:</label>
                <input type="text" id="newFirstName" name="newFirstName" placeholder="Enter new first name">
            </div>
             <div class="form-group">
                <label for="newSecondName">New Second Name:</label>
                <input type="text" id="newSecondName" name="newSecondName" placeholder="Enter new Second name">
            </div>
            <div class="form-group">
                <label for="newLastName">New Last Name:</label>
                <input type="text" id="newLastName" name="newLastName" placeholder="Enter new last name">
            </div>
            <div class="form-group">
                <label for="newEmail">New Email Adress:</label>
                <input type="text" id="newEmail" name="newEmail" placeholder="Enter new email address">
            </div>
            <div class="form-group">
                <label for="newPhoneNumber">New Phone Number:</label>
                <input type="text" id="newPhoneNumber" name="newPhoneNumber" placeholder="Enter new Phone Number">
            </div>
            <div class="form-group">
                <label for="newPassword">New Password:</label>
                <input type="password" id="newPassword" name="newPassword" placeholder="Enter new password">
                <input type="checkbox" id="showPassword" onclick="togglePassword()"> Show Password
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
</div>

<!-- Help Modal -->
<div id="helpModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeHelpModal">&times;</span>
        <h2>Help</h2>
        <p>If you need assistance, please contact us via:</p>
        <p><strong>WhatsApp:</strong> <center><a href="https://wa.me/255623972542" target="_blank">+255623972542</a></center></p>
        <p><strong>Email:</strong> <center><a href="mailto:stymilermushi444@gmail.com">stymilermushi444@gmail.com</a></center></p>
    </div>
</div>

<script>
    // Function to toggle password visibility
    function togglePassword() {
        var newPasswordInput = document.getElementById("newPassword");
        var showPasswordCheckbox = document.getElementById("showPassword");

        if (showPasswordCheckbox.checked) {
            newPasswordInput.type = "text";
        } else {
            newPasswordInput.type = "password";
        }
    }

    // Function to open the Profile modal
    function openProfileModal() {
        document.getElementById("profileFirstName").textContent = "<?php echo $_SESSION['fname']; ?>";
        document.getElementById("profileSecondName").textContent = "<?php echo $_SESSION['sname']; ?>";
        document.getElementById("profileLastName").textContent = "<?php echo $_SESSION['lname']; ?>";
        document.getElementById("profileEmal").textContent = "<?php echo $_SESSION['email']; ?>";
        document.getElementById("profileDateOfBirth").textContent = "<?php echo $_SESSION['date']; ?>";
        document.getElementById("profileAge").textContent = "<?php echo $_SESSION['age']; ?>";
        document.getElementById("profilePhone").textContent = "<?php echo $_SESSION['phone']; ?>";
         document.getElementById("profileGender").textContent = "<?php echo $_SESSION['gender']; ?>";
        document.getElementById("profileRegistrationNumber").textContent = "<?php echo $_SESSION['registration_number']; ?>";
        document.getElementById("profilePassword").textContent = "<?php echo $_SESSION['password']; ?>";
        document.getElementById("profileMedia").textContent = "<?php echo $_SESSION['media']; ?>";
        profileModal.style.display = "block";
    }

    // Function to open the Setting modal
    function openSettingModal() {
        document.getElementById("newFirstName").value = "<?php echo $_SESSION['fname']; ?>";
        document.getElementById("newSecondName").value = "<?php echo $_SESSION['sname']; ?>";
        document.getElementById("newLastName").value = "<?php echo $_SESSION['lname']; ?>";
        document.getElementById("newEmail").value = "<?php echo $_SESSION['email']; ?>";
        document.getElementById("newPhoneNumber").value = "<?php echo $_SESSION['phone']; ?>";
        document.getElementById("newPassword").value = "<?php echo $_SESSION['password']; ?>";
        settingModal.style.display = "block";
    }

    // Function to open the Help modal
    function openHelpModal() {
        helpModal.style.display = "block";
    }

    // Function to close the modals
    closeProfileModal.onclick = function () {
        profileModal.style.display = "none";
    }

    closeSettingModal.onclick = function () {
        settingModal.style.display = "none";
    }

    closeHelpModal.onclick = function () {
        helpModal.style.display = "none";
    }

    // Close the modals if the user clicks outside of them
    window.onclick = function (event) {
        if (event.target === profileModal) {
            profileModal.style.display = "none";
        }
        if (event.target === settingModal) {
            settingModal.style.display = "none";
        }
        if (event.target === helpModal) {
            helpModal.style.display = "none";
        }
    }
</script>
</body>
</html>