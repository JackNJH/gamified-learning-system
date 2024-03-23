<?php
    require '../modules/config.php';
    if ($role !='teacher'){
        header('Location: ../index.php');
        die;
    }

    include '../components/header.php'; // Header
// all header included are in the components folder

    $sql = "SELECT * FROM class 
    WHERE class.TeacherID='$teacher_id' 
    ORDER BY class.ClassCreateDate DESC";
        
    $result=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/TeacherHome.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <title>Teacher Home Page</title>
</head>
<body>
    <div class="page-title">
        <h1>TEACHER HOMEPAGE</h1>
    </div>
    <div class="classes">
        <table id="class-table">
            <!-- <tr onclick="window.location='../student/searchclasses.php';">
                <td>Class Name + Desc</td>
                <td>Current Chapter</td>
                <td>Class Progress</td>
            </tr> -->
            <!-- make it linked to the specific class -->
            <?php

            while($row = mysqli_fetch_array($result))
                {

                    //make the rows linkable
                    echo "<tr>";
                    echo "<td><img src='".$row["ClassDashboard"]."'></td>";
                    echo "<td><a href='viewchapter.php?ClassID=".$row['ClassID']."'>".$row['ClassName']."</a></td>";
                    echo "<td><a href='viewchapter.php?ClassID=".$row['ClassID']."'>".$row['ClassDesc']."</a></td>";
                    echo "</tr>";

                }

            ?>
        </table>        
    </div>
    <!-- make the classes thing a table, follow the previosu sched thing -->
    <!-- make the buttons bellow more cleaner looking and shit -->
    <div>
        <a href="../teacher/myclasses.php" class="main-buttons">MY CLASSES</a>
    </div>
    <div>
        <a href="../teacher/createclass.php" class="main-buttons">NEW CLASSES</a>
    </div>
</body>
</html> 