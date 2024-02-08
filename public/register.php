<?php
    include 'header.php'; // Header
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Register Page</title>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css">
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
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"], input[type="email"], input[type="password"], input[type="tel"], select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
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

    input[type="text"], input[type="email"], input[type="password"], input[type="tel"] {
        font-family: 'Montserrat', sans-serif;
        color: #999; 
    }

    select {
        font-family: 'Montserrat', sans-serif;
    }


</style>
</head>
<body>

<div class="container">
    <div class="register-container">
        <h2>Registeration</h2>
        <form action="" method="post">
            <label for="userID">User ID:</label>
            <input type="text" id="userID" name="userID" placeholder="Enter your User ID" required><br>

            <label for="username">Display Name:</label>
            <input type="text" id="username" name="username" placeholder="Enter your Username" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your Password" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your Email" required><br>

            <label for="phone">Phone Number:</label>
            <input id="phone" name="Tel" type="tel" style="width: 100%;" required placeholder="Enter your phone number (include country code)">
            <div id="error-msg" style="color: red; display: none;">Invalid</div>
            <div id="valid-msg" style="display: none;">✓ Valid</div>

            <!-- Initialize intl-tel-input plugin -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
            <script>
                const input = document.querySelector("#phone");
                const errorMsg = document.querySelector("#error-msg");
                const validMsg = document.querySelector("#valid-msg");

                // Initialize plugin
                const iti = window.intlTelInput(input, {
                    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
                });

                // Event listener for validation
                input.addEventListener("input", function() {
                    if (iti.isValidNumber()) {
                        errorMsg.style.display = "none";
                        validMsg.style.display = "block";
                    } else {
                        errorMsg.style.display = "block";
                        validMsg.style.display = "none";
                    }
                });
            </script><br><br>

            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
            </select><br>

            <input type="submit" value="Register" class="form-btn">
        </form>
        <p>Already have an account? <a href="index.php">Login Now!</a></p>
    </div>
</div>

</body>
</html>
