<?php
include 'C:\wamp64\www\gamified-learning-system-master\components\header.php'; // Header
if ($role == ''){
    header("C:\wamp64\www\gamified-learning-system-master\components\index.php");
    die;
}

function getHeader($role) {
    switch ($role) {
        case 'admin':
            return 'Admin View Profile';
        case 'teacher':
            return 'Teacher View Profile';
        case 'student':
            return 'Student View Profile';
        default:
            return 'View Profile';
    }
}

$headerText = getHeader($role);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Class</title>
    <link rel="stylesheet" href="styles.css"> 
    <style>
    body {
    font-family:'Montserrat', sans-serif;
    line-height: 1.6;
}

.container {
    width: 50%;
    margin: auto;
}

h1 {
    text-align: center;
    margin-bottom: 2rem;
}

h2 {
    text-align: center;
    margin-bottom: 2rem;
    font-size: 20px;
}

.class-form {
    display: grid;
    grid-template-columns: 2fr 3fr;
    grid-gap: 2rem;
    align-items: center;
    justify-content: space-between;
}

.class-form label,
.class-form input,
.class-form select {
    padding: 0.5rem;
}

.class-form label[for="pic"] {
    justify-self: end;
    grid-column: 2;
    align-self: start;
}

.class-form input[type="file"] {
    grid-column: 1 / 3;
    align-self: start;
}

.class-form button {
    padding: 0.7rem;
    background-color: orange;
    color: white;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    width: 15rem;
    justify-self: end;

}
.class-form button[type="cancel"] {
    justify-self: start; 
    margin-right: auto;
}

.class-form button:hover {
    background-color: darkorange;
}
</style>
</head>
<body>
    <div class="container">
        <h1>CREATE CLASS</h1>
        <h2>ENTER CLASS DETAILS</h2>
        <form class="class-form">
            <label for="class-name">Class name:</label>
            <input type="text" id="class-name" required>

            <label for="description">Description:</label>
            <textarea id="description" required></textarea>

            <label for="dashboard-design">Insert Dashboard Design:</label>
            <input type="file" id="pic" accept="image/*">

            <label for="difficulty">Difficulty:</label>
            <select id="difficulty">
                <option value="easy">Easy</option>
                <option value="medium">Medium</option>
                <option value="hard">Hard</option>
            </select>

            <label for="privacy">Privacy:</label>
            <select id="privacy">
                <option value="public">Public</option>
                <option value="private">Private</option>
            </select>

            <label for="Insert-Badge">Insert Class Completion Badge:</label>
            <input type="file" id="pic" accept="image/*">

            <label for="class-code">Private class code:</label>
            <input type="text" id="class-code" required>

            <button type="cancel">Cancel</button>
            <button type="submit">Create class</button>
        </form>
    </div>
</body>
</html>