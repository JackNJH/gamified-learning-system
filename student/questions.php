<?php
    require '../modules/config.php';
    if ($role !='student'){
        header('Location: ../index.php');
        die;
    }

    include '../components/header.php'; // Header
    $data = isset($_GET['chapter_id']) ? $_GET['chapter_id'] : '';
    
    
    $join = "SELECT `answers`.*, `question`.*, `level`.`ChapterID`
            FROM `answers` 
            LEFT JOIN `question` ON `answers`.`QuestionID` = `question`.`QuestionID` 
            LEFT JOIN `level` ON `question`.`LevelID` = `level`.`LevelID` 
             WHERE `level`.`ChapterID` = '$data'";
         
    $joinresult = mysqli_query($conn, $join);

    $sql1 = "SELECT * FROM chapter WHERE ChapterID= '$data'";
    $result1 = mysqli_query($conn,$sql1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Levels</title>
    <link rel="stylesheet" href="../css/question.css">
</head>
<body>
    <div class="navi-bar">
        <div class="options">
            <a href="index.php"><b>Student menu</a></b>
        </div>
        <div class="classes">
            <p>Recently Joined classes</p>
            <div class="options">
                <a href="chapter.php">CLASS A</a>
            </div>
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
        <div class="main">
            <div class="header2">Answer the questions to get points</div>
            
            <form action="../student/score?chapter_id=<?php echo $data; ?>" method="post">
                <div class="container">
                    <?php
                    $currentQuestion = null;
                    $questionNumber = 1;

                    if (mysqli_num_rows($joinresult) > 0) {
                        while ($row = mysqli_fetch_assoc($joinresult)) {
                            if ($currentQuestion == null || $currentQuestion['QuestionID'] != $row['QuestionID']) {
                                if ($currentQuestion != null) {
                                    echo '</div>';
                                }
                                $currentQuestion = $row;
                                ?>
                                <div class="question">
                                    <br>
                                    <div class="questionTitle">Q<?= $questionNumber ?>. <?= $row["QuestionText"] ?></div>
                                    <?php echo "</br>";?>
                                </div>
                            <?php
                                $questionNumber++;
                            }
                            ?>
                            <div class="AnswerSelection">
                                <input type="radio" class="form-check-input" name="checkanswer[<?php echo $row['QuestionID']; ?>]" value="<?php echo $row['AnswerID']; ?>">
                                 <?php echo $row['AnswerText']; ?>
                            </div>
                      <?php
                        }
                    }
                    ?>
                </div>
                <div class="quiz">
                    <input type="submit" name="answer-submit">                   
                </div>
            </form>

    </div>
    <button class ="back" onclick="history.back()">&#8592; Chapters</button>
        
</body>
</html>
