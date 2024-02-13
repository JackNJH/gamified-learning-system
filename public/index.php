<?php

require "../modules/config.php";
include '../components/header.php'; // Header

// Redirect if user is already logged in
if ($role != '') {
    header("Location: ../index.php");
    exit; 
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Email = $_POST["email"];
    $Password = $_POST["password"];

    $sql = "SELECT * FROM user WHERE UserEmail ='$Email' AND UserPass ='$Password'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user_info = mysqli_fetch_array($result);
        
        $_SESSION['email'] = $Email;
        $_SESSION['username'] = $user_info['UserName'];
        $_SESSION['user_id'] = $user_info['UserID'];
        $role = $user_info['UserType'];
        $_SESSION['role'] = $user_info['UserType'];

        if (!empty($_POST["remember"])) {
            setcookie("email", $Email, time() + (365 * 24 * 60 * 60));
            setcookie("password", $_POST["password"], time() + (365 * 24 * 60 * 60));
        } else {
            setcookie("email", "", time() - 3600);
            setcookie("password", "", time() - 3600);
        }

        
        header("Location: ../index.php");
        exit;
    } else {
        include 'login_err.php';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../css/submitButtons.css">
<style>
    body {
        font-family: 'Montserrat', sans-serif;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 90vh; 
    }

    .login-container {
        text-align: center;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #f9f9f9;
        max-width: 400px; 
        width: 100%; 
    }

    .login-container img {
        max-width: 100%; 
    }

    input[type="email"], input[type="password"] {
        width: 100%;
        padding: 10px;
        margin: 5px 0;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
    }

    input[type="email"]::placeholder,
    input[type="password"]::placeholder {
        font-family: 'Montserrat', sans-serif;
        color: #999; 
    }

    input[type="email"]:focus,
    input[type="password"]:focus {
        border-color: #007bff; 
    }

    .login-options {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

</style>
</head>
<body>

<div class="container">
    <div class="login-container">
        <a href="index.php"><img src="../images/logo.png" width="35%"></a>
        <form method="post">
            <input type="email" name="email" id="email" placeholder="Email" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <div class="login-options">
                <div>
                    <input type="checkbox" id="remember" name="remember"><label for="remember" class="remember">Remember me?</label>
                </div>
                <div>
                    <a href="reset_password.php">Forgot Password?</a>
                </div>
            </div>
            <input type="submit" value="LOGIN" class="form-btn">
            <p>Are you new? <a href="register.php">Register Now!</a></p>
        </form>
    </div>
</div>

</body>
</html>


