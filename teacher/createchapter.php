<?php
    require '../modules/config.php';
    if ($role !='teacher'){
        header('Location: ../index.php');
        die;
    }

    include '../components/header.php'; // Header

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Chapter</title>
    <link rel="stylesheet" href="styles.css">
    <style>body {
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
    font-family: 'Montserrat', sans-serif; 
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
        <h1>CREATE LEVEL FOR ADDED CHAPTERS</h1>
        <h2>ENTER DETAILS</h2>
        <form class="class-form">


            <label for="Chapter-picvid">Picture/Videos:</label>
            <input type="file" id="pic/vid" accept="image/*,video/*">
            <label for="Chapter-picvid">Picture/Videos:</label>
            <input type="file" id="pic/vid" accept="image/*,video/*">



            <button type="cancel">Cancel</button>
            <button type="submit">Create class</button>
        </form>
    </div>
</body>
</html>