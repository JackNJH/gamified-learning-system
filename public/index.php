<?php



?>





<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Montserrat', sans-serif;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; 
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

    input[type="text"], input[type="password"] {
        width: 100%;
        padding: 10px;
        margin: 5px 0;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
    }

    input[type="text"]::placeholder,
    input[type="password"]::placeholder {
        font-family: 'Montserrat', sans-serif;
        color: #999; 
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
        border-color: #007bff; 
    }

    .login-options {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    input[type="submit"] {
        display: block;
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        box-sizing: border-box;
        border: none;
        border-radius: 4px;
        background-color: orange;
        color: black;
        font-size: 16px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: darkorange;
    }


</style>
</head>
<body>

<div class="container">
    <div class="login-container">
        <a href="index.php"><img src="../images/logo.png" width="35%"></a>
        <form>
            <input type="text" name="userID" placeholder="UserID">
            <input type="password" name="password" placeholder="Password">
            <div class="login-options">
                <div>
                    <input type="checkbox" id="remember" name="remember"><label for="remember" class="remember">Remember me?</label>
                </div>
                <div>
                    <a href="reset_password.php">Forgot Password?</a>
                </div>
            </div>
            <input type="submit" value="Login" class="form-btn">
            <p>Are you new? <a href="register.php">Register Now!</a></p>
        </form>
    </div>
</div>

</body>
</html>


