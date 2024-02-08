<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
<style>
    body {
        margin: 0; 
        padding: 0; 
    }

    header {
        background-color: orange;
        color: #fff;
        padding: 5px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        top: 0; 
    }

    .logo {
        margin-left: 20px; 
    }

    .logo img {
        max-width: 5%; 
        height: auto; 
    }

    .user-info {
        display: flex;
        align-items: center;
        margin-right: 20px;
    }

    .user-role {
        margin-right: 10px;
    }

    .user-profile {
        width: 50px; 
        height: 50px; 
        border-radius: 50%; 
        background-color: #fff; 
    }
</style>
</head>
<body>

<header>
    <div class="logo">
        <a href="../index.php"><img src="../images/logo.png" alt="Logo"></a>
    </div>
    <div class="user-info">
        <div class="user-role">GUEST</div>
        <div class="user-profile"></div>
    </div>
</header>

</body>
</html>


