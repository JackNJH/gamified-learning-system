<?php
    require '../modules/config.php';

    if ($role != 'teacher') {
        header('Location: ../index.php');
        die;
    }

    $classID = isset($_GET['ClassID']) ? $_GET['ClassID'] : '';

    if ($classID === '') {
        die("Class ID not provided or invalid.");
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_delete'])) {
        $sqlDeleteBadges = "DELETE FROM badges WHERE ClassID = '$classID'";
        $resultDeleteBadges = mysqli_query($conn, $sqlDeleteBadges);

        $sqlDeleteChapters = "DELETE FROM chapter WHERE ClassID = '$classID'";
        $resultDeleteChapters = mysqli_query($conn, $sqlDeleteChapters);

        $sqlDeleteClassProgress = "DELETE FROM classprogress WHERE ClassID = '$classID'";
        $resultDeleteClassProgress = mysqli_query($conn, $sqlDeleteClassProgress);

        $sqlDeleteClass = "DELETE FROM class WHERE ClassID = '$classID'";
        $resultDeleteClass = mysqli_query($conn, $sqlDeleteClass);

        if ($resultDeleteBadges && $resultDeleteChapters && $resultDeleteClass && $resultDeleteClassProgress) {
            echo "<script>alert('Class and related data deleted successfully.'); window.location.href='../index.php';</script>";
        } else {
            echo "<script>alert('Error deleting class related data: " . mysqli_error($conn) . "'); window.location.href='../index.php';</script>";
        }
    }

    include '../components/header.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Class</title>
    <style>
    body {
    font-family:'Montserrat', sans-serif;
    line-height: 1.6;
}

.container {
    width: 50%;
    margin: auto;
    text-align: center; 
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

.button:hover {
    background-color: darkorange;
}
</style>
</head>
<body>
    <div class="container">
        <h1>Delete Class</h1>
        <p>Are you sure you want to delete this class and all its related data?</p>
        <form method="post" class="class-form">
            <input type="hidden" name="confirm_delete" value="1">
            <button type="submit">Confirm Delete</button>
            <button type="button" onclick="window.location.href='../index.php';">Cancel</button>
        </form>
    </div>
</body>
</html>
