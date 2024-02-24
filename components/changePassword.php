<?php
require '../modules/config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $query = "SELECT UserPass FROM user WHERE UserID = '$user_id'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $currentPassword = $row['UserPass'];

        $oldPassword = $_POST['old-password'];
        $newPassword = $_POST['new-password'];
        $confirmPassword = $_POST['cpassword'];

        if ($oldPassword === $currentPassword) {
            if ($newPassword != $confirmPassword) {
                $error = 'Error: New Password and Confirmed Password do not match.';
            } else {

                $updateQuery = "UPDATE user SET UserPass = '$newPassword' WHERE UserID = '$user_id'";
                $updateResult = mysqli_query($conn, $updateQuery);

                if ($updateResult) {
                    echo "<script> alert('Password changed successfully!'); window.location.href='../public/profile.php';</script>";
                    exit(); 
                } else {
                    $error = "Error updating password.";
                }
            }
        } else {
            $error = "Error: Old Password is incorrect.";
        }
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php if (!empty($error)) : ?>
<div class="error-container">
    <div class="error-message">
        <?php echo $error; ?>
    </div>
</div>
<?php endif; ?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../css/error.css">
<style>
    .error-container {
        padding-left: 2.5vw;
        padding-right: 2.5vw;
    }

    .content-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 26vw;
    }

    .container {
        max-width: 20vw;
        text-align: center; 
        display: flex;
        justify-content: center;
        align-items: center;
    }

    label {
        font-size: 1.1vw;
        font-weight: bold;
        font-family: 'Montserrat', sans-serif;
    }

    input[type="password"],
    input[type="text"] {
        width: 100%;
        padding: 0.5vw;
        margin: 0.5vw 0 1.6vw 0;
        border: 1px solid #ccc;
        box-sizing: border-box;
        font-size: 16px;
    }

    input[type="password"]::placeholder,
    input[type="text"]::placeholder {
        font-family: 'Montserrat', sans-serif;
        color: #999;
    }

    .confirm-button {
        padding: 0.5vw 1vw;
        margin-top: 1.2vw;
        background-color: bisque;
        color: black;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s;
        font-family: 'Poppins', sans-serif;

    }

    .confirm-button:hover {
        background-color: darkorange;
        font-weight: bold;
        color: white;
    }

    .show-password,
    .show-password2 {
        margin-left: 10px;
        width: 1.3vw;
        height: auto;
        cursor: pointer;
    }

    .show-password:hover {
        filter: drop-shadow(0 0 0 rgba(0, 0, 0, 1));
    }

    .go-back-link {
        position: absolute;
        bottom: 2vw;
        right: 3vw;
        font-size: 1.2vw;
        font-family: 'Poppins', sans-serif; 
    }

    .go-back-link a {
        color: red;
        text-decoration: none; 
    }

    .go-back-link a:hover {
        color: #FF0595;
        filter: drop-shadow(0 0 1px rgba(0, 0, 0, 0.5));
    }
</style>
</head>

<body>

<div class="content-wrapper">
    <div class="container">
        <form id="changePasswordForm" method="post">
            <label for="old-password">Old Password:</label>
            <img src="../images/showpw.png" id="show-password" class="show-password" onclick="showPassword('old-password', 'show-password')">
            <input type="password" id="old-password" name="old-password" placeholder="Enter your old password" required><br>

            <label for="new-password">New Password:</label>
            <img src="../images/showpw.png" id="show-password2" class="show-password" onclick="showPassword('new-password', 'show-password2')">
            <input type="password" id="new-password" name="new-password" placeholder="Enter your new password" required><br>

            <label for="cpassword">Confirm New Password:</label>
            <img src="../images/showpw.png" id="confirm-password" class="show-password" onclick="showPassword('cpassword', 'confirm-password')">
            <input type="password" id="cpassword" name="cpassword" placeholder="Confirm your new password" required><br>

            <button type="submit" id="confirmBtn" class="confirm-button">Confirm</button>
        </form>
    </div>
</div>

<script src="../js/showpw.js"></script>

<div class="go-back-link">
    <a href="../public/profile.php" id="changePasswordLink">GO BACK?</a>
</div>

</body>
</html>
