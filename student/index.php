<?php
    require '../modules/config.php';
    if ($role !='student'){
        header('Location: ../index.php');
        die;
    }

    include '../components/header.php'; // Header
// all header included are in the components folder

    $sql = "SELECT * FROM class LEFT JOIN classprogress ON classprogress.ClassID = class.ClassID
    WHERE StudentID='$student_id'
    ORDER BY ProgressPoints DESC";

    
        
    $result=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/StudentHome.css">
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
                    echo "<td><a href='class?ClassID=".$row['ClassID']."'>".$row['ClassName']."</a></td>";
                    echo "<td><a href='class?ClassID=".$row['ClassID']."'>".$row['ClassDesc']."</a></td>";
                    // echo "<td><a href='class?ClassID=".$row['ClassID']."'>";


                    // $sqlSUM = "SELECT SUM(ProgressPoints) as [TotalPoints]
                    // FROM classprogress LEFT JOIN class ON class.ClassID = classprogress.ClassID
                    // WHERE classprogress.StudentID = '$student_id'
                    // AND class.ClassID = '".$row['ClassID']."'";

                    // $resultSUM = mysqli_query($conn, $sqlSUM);

                    // while($row2 = mysqli_fetch_array($resultSUM)){
                    //     echo $row2['TotalPoints'];
                    // }

                    // echo "/".$row['ClassMaxPoints']."</a></td>";
                    echo "<td><a href='class?ClassID=".$row['ClassID']."'>".$row['ProgressPoints']."/".$row['ClassMaxPoints']."</a></td>";
                    echo "</tr>";

                }

            ?>
        </table>        
    </div>
    <!-- make the classes thing a table, follow the previosu sched thing -->
    <!-- make the buttons bellow more cleaner looking and shit -->
    <div>
        <a href="../student/searchclasses.php" class="main-buttons">FIND CLASSES</a>
    </div>
    <div>
        <a href="../components/editBadges" class="main-buttons">VIEW BADGES</a>
    </div>
</body>
</html> 