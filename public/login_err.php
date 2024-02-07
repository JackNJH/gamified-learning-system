<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Error</title>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Montserrat', sans-serif; 
    }

    .login-alert {
        padding: 20px;
        background-color: #f44336;
        color: white;
        font-size: 1.5rem; 
        width: 50%; 
        max-width: 400px; 
        margin: 0 auto;
        margin-top: 50px; 
        position: relative; 
        border-radius: 8px;
    }

    .login-alert-closebtn {
        position: absolute;
        top: 10px;
        right: 10px;
        color: white;
        font-weight: bold;
        font-size: 1.5rem; 
        cursor: pointer;
        transition: color 0.3s;
    }

    .login-alert-closebtn:hover {
        color: black;
    }
</style>
</head>
<body>

<div class="login-alert">
    <span class="login-alert-closebtn" onclick="window.location.href = 'login.php';">&times;</span> 
    <strong>Wrong username or password.</strong> Please try again.
</div>

</body>
</html>
