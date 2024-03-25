<?php
    require '../modules/config.php';
    if ($role !='student'){
        header('Location: ../index.php');
        die;
    }

    include '../components/header.php'; // Header
    
    $data = isset($_GET['ClassID']) ? $_GET['ClassID'] : '';

    if ($data === '') {
        // Handle case when user_id is not provided or invalid
        die("User ID not provided or invalid.");
    }

    $sql1 = "SELECT * FROM class WHERE ClassID= '$data'";
    $result1 = mysqli_query($conn,$sql1);

    $sql2 = "SELECT BadgePic FROM badges WHERE ClassID= '$data'";
    $result2 = mysqli_query($conn,$sql2);

    $sql3 = "SELECT `user`.*, `student`.*, `classprogress`.*
            FROM `user` 
            LEFT JOIN `student` ON `student`.`UserID` = `user`.`UserID` 
            LEFT JOIN `classprogress` ON `classprogress`.`StudentID` = `student`.`StudentID`
            WHERE classprogress.ClassID = $data
            ORDER BY ProgressPoints DESC;";
    $result3 = mysqli_query($conn,$sql3);




?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Leaderboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <title>Leaderboard</title>
</head>
<body>
    <div class="navi-bar">
        <div class="options">
            <a href="index.php"><b>Student menu</a></b>
        </div>
        
        <?php
            while($row = mysqli_fetch_assoc($result1)){
        ?>
        <div class="classes">
            <?php
                if (isset($_SESSION['recent_pages'])) {
                    echo "<h3>Recently Visited Pages:</h3>";
                    echo "<ul>";
                    foreach ($_SESSION['recent_pages'] as $page) {
                    echo "<li><a href='$page'>$page</a></li>";
                    }
                    echo "</ul>";
                 } else {
                    echo "<p>No recent pages available.</p>";
                }
            ?>
        </div>
    </div>

    <div class="main">
        
        <div class="content">
            
            <div class="design">
                <img src="<?php echo $row["ClassDashboard"]; ?>" alt="background">
                    <div class="title">
                        <h2><?php echo $row["ClassName"];?></h2>
                        <p><?php echo $row["ClassDesc"];?></p>
                    </div>
            </div>

            <?php
                } 
            ?> 
          
            <div class="chapters">            
            <table id="Leaderboard-table">

                <?php 
                    while($row = mysqli_fetch_assoc($result3)){

                        //figure out badge showing sql
                        echo "<tr>";
                        if (!empty($row['UserPFP'])){
                            echo "<td class='pfp'><img src='".$row['UserPFP']."'></td>";
                        }
                        else{
                            echo "<td class='pfp'><img src='../images/guestPFP.png'></td>";
                        }
                        echo "<td>".$row['UserName']."</td>";

                        $B1 = $row['SelectedBadge1'];
                        $B2 = $row['SelectedBadge2'];
                        $B3 = $row['SelectedBadge3'];

                        $Badge1 = "SELECT `studentbadge`.*, `badges`.`BadgePic`
                                    FROM `studentbadge` 
                                    LEFT JOIN `badges` ON `studentbadge`.`BadgeID` = `badges`.`BadgeID`
                                    WHERE studentbadge.EarnedBadgeID = '$B1';";
                        $Badge2 = "SELECT `studentbadge`.*, `badges`.`BadgePic`
                                    FROM `studentbadge` 
                                    LEFT JOIN `badges` ON `studentbadge`.`BadgeID` = `badges`.`BadgeID`
                                    WHERE studentbadge.EarnedBadgeID = '$B2';";
                        $Badge3 = "SELECT `studentbadge`.*, `badges`.`BadgePic`
                                    FROM `studentbadge` 
                                    LEFT JOIN `badges` ON `studentbadge`.`BadgeID` = `badges`.`BadgeID`
                                    WHERE studentbadge.EarnedBadgeID = '$B3';";

                        $GetBadge1 = mysqli_query($conn,$Badge1);
                        $GetBadge2 = mysqli_query($conn,$Badge2);
                        $GetBadge3 = mysqli_query($conn,$Badge3);
                        if(!is_null($B1)){
                            while($ShowBadge = mysqli_fetch_assoc($GetBadge1)){
                                echo "<td class='leaderboard-badge'><img src='".$ShowBadge['BadgePic']."'></td>";
                            }
                        }
                        else{
                            echo "<td class='leaderboard-badge'><img src='../images/badgePlaceholder.png'></td>";
                            }                            
                        
                        if(!is_null($B2)){
                            while($ShowBadge = mysqli_fetch_assoc($GetBadge2)){
                                echo "<td class='leaderboard-badge'><img src='".$ShowBadge['BadgePic']."'></td>";
                            }
                        }
                        else{
                            echo "<td class='leaderboard-badge'><img src='../images/badgePlaceholder.png'></td>";
                            }                            
                            
                        if(!is_null($B3)){
                            while($ShowBadge = mysqli_fetch_assoc($GetBadge3)){
                                echo "<td class='leaderboard-badge'><img src='".$ShowBadge['BadgePic']."'></td>";
                            }
                        }
                        else{
                            echo "<td class='leaderboard-badge'><img src='../images/badgePlaceholder.png'></td>";
                            }                            
                            
                        // echo "<td>".$B1."</td>";
                        // echo "<td>".$row['SelectedBadge2']."</td>";
                        // echo "<td>".$row['SelectedBadge3']."</td>";
                        echo "<td>".$row['ProgressPoints']."</td>";

                    }
                ?>

            </table>
            </div>  

        </div>
        <?php
            while($row = mysqli_fetch_assoc($result2)){
        ?>

        <div class="badge">
            <img src="<?php echo $row["BadgePic"]; ?>" alt="badge">
        </div>

        <?php
            } 
        ?>

        <div>
            <?php 
            echo "<a href='class?ClassID=".$_GET['ClassID']."' class='Chapter-button'>back to Chapters</a>";  
            ?>
        </div>
        
    </div>
</body>
</html>