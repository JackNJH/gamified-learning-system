<?php
    include '../components/header.php'; // Header
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Reset Password</title>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
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
            <input type="tel" id="phone" name="phone" placeholder="0000000000" required><br>

            <h3>Enter New Password</h3>
            <label for="newPassword">New Password:</label>
            <input type="password" id="newPassword" name="newPassword" placeholder="Enter your new password" required><br>

            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm your new password" required><br>

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


</body>
</html>
