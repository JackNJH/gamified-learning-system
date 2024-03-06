<?php
    require '../modules/config.php';
    if ($role !='student'){
        header('Location: ../index.php');
        die;
    }

    include '../components/header.php'; // Header
// all header included are in the components folder
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/gamified-learning-system-master/css/StudentHome.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <title>Student Home Page</title>
</head>
<body>
    <div class="page-title">
        <h1>STUDENT HOMEPAGE</h1>
    </div>
    <div class="classes">
        <table id="class-table">
            <tr>
                <td>Class Name + Desc</td>
                <td>Current Chapter</td>
                <td>Class Progress</td>
            </tr>
            <tr>
                <td>Class Name + Desc</td>
                <td>Current Chapter</td>
                <td>Class Progress</td>
            </tr>
            <tr>
                <td>Class Name + Desc</td>
                <td>Current Chapter</td>
                <td>Class Progress</td>
            </tr>
        </table>        
    </div>
    <!-- make the classes thing a table, follow the previosu sched thing -->
    <!-- make the buttons bellow more cleaner looking and shit -->
    <div class="main-buttons">
        FIND CLASSES
    </div>
    <div class="main-buttons">
        VIEW BADGES
    </div>
</body>
</html> 