<?php
    require '../modules/config.php';    

    $errorMessage = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['cpassword']; 
        $email = $_POST['email'];
        $phone = $_POST['tel'];
        $role = $_POST['role'];

        $create_date = date("Y-m-d H:i:s");
        
        if ($password != $confirmPassword) {
            $error = "Password and Confirmation Password are different!";
        } else {
            $sql = "INSERT INTO user (UserName, UserEmail, UserTel, UserPass, UserType, UserCreateDate) VALUES ('$username', '$email', '$phone', '$password', '$role', '$create_date')";
            
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Registration successful!'); window.location.href='../index.php';</script>";
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
    
    include '../components/header.php'; 
?>


<!DOCTYPE html>
<html lang="en">
<head>
<?php if (!empty($error)) : ?>
<div class="error-message">
    <?php echo $error; ?>
</div>
<?php endif; ?>
<title>Register Page</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@19.2.19/build/css/intlTelInput.css">
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@19.2.19/build/js/intlTelInput.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../css/submitButtons.css">
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

    .register-container {
        text-align: center;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #fff;
        max-width: 400px;
        width: 100%;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"]::placeholder,
    input[type="email"]::placeholder,
    input[type="tel"]::placeholder,
    input[type="password"]::placeholder,
    select {
        font-family: 'Montserrat', sans-serif;
        color: #999;
    }

    input[type="text"], 
    input[type="email"], 
    input[type="password"], 
    input[type="tel"], 
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
        color: black !important;
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


    input[type="text"], input[type="email"], input[type="password"], input[type="tel"] {
        font-family: 'Montserrat', sans-serif;
        color: #999; 
    }

    .show-password, .confirm-password {
        width: 20px;
        height: auto;
    }

    .show-password:hover,
    .confirm-password:hover {
        filter: drop-shadow(0 0 0 rgba(0, 0, 0, 2));
    }


    #error-msg, #valid-msg {
        margin-top: 10px; 
        font-weight: bold; 
    }
    
    .error-message {
        background-color: #ffcccc;
        color: #ff0000;
        border: 1px solid #ff0000;
        padding: 10px;
        margin-bottom: 10px;
        text-align: center;
    }

    .intl-tel-input{
        width: 100%;
    }
        
    .iti {
        width: 100%;
    }

</style>
</head>
<body>

<div class="container">
    <div class="register-container">
        <h2><img src="../images/register.png" alt="Lock Icon" width="35">Registration</h2>
        <form action="" method="post">

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your Username" required><br>

            <div class="password-input">
                <label for="password">Password:</label>
                <img src="../images/showpw.png" id="show-password" class="show-password" onclick="showPassword('show-password')">
            </div>
            <input type="password" id="password" name="password" placeholder="Enter your Password" required>

            <div class="password-input">
                <label for="cpassword">Confirm Password:</label>
                <img src="../images/showpw.png" id="confirm-password" class="confirm-password" onclick="showPassword('confirm-password')">
            </div>
            <input type="password" id="cpassword" name="cpassword" placeholder="Re-enter your Password" required>

            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your Email" required><br>

            <label for="phone">Phone Number:</label>
            <input id="phone" name="tel" type="tel" style="width: 100%; max-width: 400px;" pattern="[0-9]{7,15}" required placeholder="Enter your full Phone Number">

            <script>
                const input = document.querySelector("#phone");
                const errorMsg = document.querySelector("#error-msg");
                const validMsg = document.querySelector("#valid-msg");

                // Initialize plugin
                const iti = window.intlTelInput(input, {
                    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@19.2.19/build/js/utils.js",
                });

            </script><br><br>

            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
            </select><br>

            <input type="submit" value="REGISTER" class="form-btn">
        </form>
        <p>Already have an account? <a href="index.php">Login Now!</a></p>
    </div>
</div>
<script src="../js/showpw.js"></script>
</body>
</html>
