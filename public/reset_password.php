<?php
require '../modules/config.php';
if ($role != ''){
    header("Location: ../index.php");
    die;
}

include '../components/header.php'; // Header

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $newPassword = $_POST['password'];
    $confirmPassword = $_POST['cpassword'];

    if ($newPassword != $confirmPassword) {
        $error = 'New Password and Confirmed Password do not match.';
    } else {
        
        $query = "SELECT * FROM user WHERE UserEmail = '$email' AND UserName = '$username' AND UserTel = '$phone'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $updateQuery = "UPDATE user SET UserPass = '$newPassword' WHERE UserEmail = '$email' AND UserName = '$username' AND UserTel = '$phone'";
            $updateResult = mysqli_query($conn, $updateQuery);

            if ($updateResult) {
                echo "<script> alert('Password reset successful!'); window.location.href='../index.php';</script>";
            } else {
                $error = "Error updating password.";
            }
        } else {
            $error = "Invalid credentials.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php if (!empty($error)) : ?>
<div class="error-message">
    <?php echo $error; ?>
</div>
<?php endif; ?>
<title>Reset Password</title>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../css/error.css">
<style>
    body {
        font-family: 'Montserrat', sans-serif;
        background-color: #f1f1f1;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 90vh; 
    }

    .reset-password-container {
        text-align: center;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #fff;
        max-width: 400px;
        width: 100%;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }

    h2 {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
    }

    input[type="text"]::placeholder,
    input[type="email"]::placeholder,
    input[type="tel"]::placeholder,
    input[type="password"]::placeholder {
        font-family: 'Montserrat', sans-serif;
        color: #999;
    }

    .button-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 10px;
    }

    .input-button {
        width: 20%;
        padding: 10px;
        border: none;
        border-radius: 4px;
        background-color: orange;
        color: black;
        cursor: pointer;
    }

    .input-button:hover {
        background-color: darkorange;
    }

    .password-input {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .password-input img {
            margin-left: 10px;
            margin-bottom: 10px;
            width: 20px;
            height: auto;
            cursor: pointer;
        }

        .show-password, .confirm-password {
            width: 20px;
            height: auto;
        }

        .show-password:hover,
        .confirm-password:hover {
            filter: drop-shadow(0 0 0 rgba(0, 0, 0, 2));
        }

</style>
</head>
<body>

<div class="container">
    <div class="reset-password-container">
        <h2><img src="../images/lockicon.png" alt="Lock Icon" width="30">Reset Password</h2>
        <form action="" method="post">
            <h3>Identity Verification</h3>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required><br>

            <label for="userID">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your Username" required><br>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{7,15}" placeholder="Enter your full Phone Number" required><br>

            <h3>Enter New Password</h3>
            <div class="password-input">
                <label for="newPassword">New Password:</label>
                <img src="../images/showpw.png" id="show-password" class="show-password" onclick="showPassword('show-password')">
            </div>
            <input type="password" id="password" name="password" placeholder="Enter your new password" required>

            <div class="password-input">
                <label for="confirmPassword">Confirm Password:</label>
                <img src="../images/showpw.png" id="confirm-password" class="confirm-password" onclick="showPassword('confirm-password')">
            </div>
            <input type="password" id="cpassword" name="cpassword" placeholder="Confirm your new password" required>

            <div class="button-container">
                <button type="button" onclick="goBack()" class="input-button">< BACK</button>
                <input type="submit" value="RESET" class="input-button">
            </div>
        </form>
    </div>
</div>

<script>
    function goBack() {
        window.location.href = 'index.php';
    }
</script>
<script src="../js/showpw.js"></script>

</body>
</html>
