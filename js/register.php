<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register Page</title>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Montserrat', sans-serif;
        background-color: #f1f1f1;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; 
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

    input[type="text"], input[type="email"], input[type="password"], select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
        border: none;
        border-radius: 4px;
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    input[type="text"], input[type="email"], input[type="password"] {
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
            <input type="text" id="phone" name="phone" placeholder="Enter your Phone Number" required><br>

            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
            </select><br>

            <input type="submit" value="Register">
        </form>
        <p>Already have an account? <a href="index.php">Login Now!</a></p>
    </div>
</div>

</body>
</html>
