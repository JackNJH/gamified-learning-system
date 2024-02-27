<?php
    require '../modules/config.php';
    if ($role !='teacher'){
        header('Location: ../index.php');
        die;
    }

    include '../components/header.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher homepage</title>
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
        padding: 10rem;
        background-color: orange;
        color: white;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        width: 30rem;
        justify-self: end;

    }
    .class-form button[type="cancel"] {
        justify-self: start; 
        margin-right: auto;
    }

    .class-form button:hover {
        background-color: darkorange;
    }

    .notable-students {
    position: absolute;
    bottom: 10%;
    right: 50%;
    background-color: orange;
    padding: 5rem;
    width: 310px;
    height: 200px;
    border-radius: 0 0 20px 0;
}

.my-classes {
    position: absolute;
    bottom: 10%;
    right: 10%;
    background-color: orange;
    padding: 10rem;
    width: 310px;
    height: 390px;
    border-radius: 0 0 20px 0;
}

</style>
</head>
<body>
    <div class="container">
        <h1>Teacher homepage</h1>
        <form class="class-form">
            <button type="newclass">New Class</button>
        </form>
        <div class="notable-students">
            <h2>Notable Students</h2>

        </div>
        <div class= "my-classes">
            <h3>My Classes</h3>
        </div>
    </div>
</body>
</html>