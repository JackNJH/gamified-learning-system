<?php
    require '../modules/config.php';
    if ($role !='student'){
        header('Location: ../index.php');
        die;
    }

    include '../components/header.php'; // Header
    $data = isset($_GET['chapter_id']) ? $_GET['chapter_id'] : '';
    
    if ($data === '') {
        // Handle case when user_id is not provided or invalid
        die("User ID not provided or invalid.");
    }

    $sql = "SELECT * FROM `level` WHERE ChapterID= '$data'";
    $result = mysqli_query($conn,$sql);

    $sql1 = "SELECT * FROM chapter WHERE ChapterID= '$data'";
    $result1 = mysqli_query($conn,$sql1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Levels</title>
    <link rel="stylesheet" href="../css/levels.css">
</head>
<body>
    <div class="navi-bar">
        <div class="options">
            <a href="index.php"><b>Student menu</a></b>
        </div>
        <div class="classes">
            <?php

                if (isset($_SESSION['recent_pages'])) {
                    echo "<h3>Recently Visited Pages:</h3>";
                    echo "<ul>";
                    
                    foreach ($_SESSION['recent_pages'] as $page) {
                        echo "<li><a href='$page'>$page</a></li>";
                    }
                    echo "</ul>";
                } 
                else {
                    echo "<p>No recent pages available.</p>";
                }
            ?>
        </div>
    </div>  

    <?php while($row1=mysqli_fetch_assoc($result1))
        {                    
    ?>
        
        <div class="header"><?php echo $row1['ChapterName'];?></div>
    <?php
        }
    ?>

    <div class="wrapper">
        <div class="levelselect">
            <div class="list">

            <?php while($row=mysqli_fetch_assoc($result))
                 {                    
            ?>
                
                <form method="POST">
                    Level    
                    <input type="submit" value="<?php echo $row['LevelValue'];?>" name="mybutton">
                </form>
            <?php
                }
            ?>
            </div>
        </div>

        
        <div class="guide">
            
            <?php
            if(isset($_POST['mybutton'])){
                $level = $_POST['mybutton'];
                $sql2 = "SELECT * FROM `level` WHERE LevelValue= '$level' AND ChapterID= '$data'";
                $result2 = mysqli_query($conn,$sql2);
                    while($row=mysqli_fetch_assoc($result2))
                    {              
            ?>          
                    <div class="content">
                        <!-- change content to LevelTitle if possible -->
                    <div class="text"><u>&nbsp;&nbsp;&nbsp;Content&nbsp;&nbsp;&nbsp;</u></div>
                         <img src="<?php echo $row["LevelPic"]; ?>" alt="pic"> 
                         <br>
                        <div class="LevelContent"><?php echo $row['LevelContent'];?></div>
                    </div>
            <?php            
                    }
                }
            ?>
        </div>

       
        

    </div>
    <?php
        $sqlClass = "SELECT `chapter`.`ClassID`
        FROM `chapter`
        WHERE `chapter`.`ChapterID` = '$data'";

        $resultClass = mysqli_query($conn, $sqlClass);

        while($row = mysqli_fetch_assoc($resultClass)){
            echo "<a href='../student/class?ClassID=".$row['ClassID']."'class ='back'>&#8592; Chapters</a>";
        }

    ?>
      
        <div class="next">
            <?php echo "<a class='classlink' href='../student/questions?chapter_id={$data}'>";?>
            Questions &#8594;
        </div>
</body>
</html>
