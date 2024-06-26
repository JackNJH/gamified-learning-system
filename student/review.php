<?php
    require '../modules/config.php';
    if ($role !='student'){
        header('Location: ../index.php');
        die;
    }

    include '../components/header.php'; // Header
    $chapID = $_SESSION['chapter_id'];
    $correct = $_SESSION['correct'];  
    $score = $_SESSION['score'];
    $attempt = $_SESSION['attempted'];

    $join = "SELECT `answers`.*, `question`.*, `level`.`ChapterID`
    FROM `answers` 
    LEFT JOIN `question` ON `answers`.`QuestionID` = `question`.`QuestionID` 
    LEFT JOIN `level` ON `question`.`LevelID` = `level`.`LevelID` 
     WHERE `level`.`ChapterID` = '$chapID'";
 
    $joinresult = mysqli_query($conn, $join);

    $sql1 = "SELECT * FROM chapter WHERE ChapterID= '$chapID'";
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

    <div class="final">
        <a href="index.php" class="situation">Finish</a>
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
            <div class="header2">
                <?php 
                
                if ($score == 0 && $attempt == 0) { ?>
                    <div class="AttemptedQuestion">No Question Attempted</div>
                    <div class="FinalScore">You Score is : <?php echo $score; ?></div>  

            <?php }else { ?> 
                <div class="message">
                    <div class="AttemptedQuestion">You have attempted <?php echo $attempt; ?> questions</div>
                    <div class="FinalScore">You Score: <?php echo $score; ?></div><span class="badge text-bg-primary"> You Answered <?php echo $correct; ?> Questions Correctly!</span>
                </div>

            <?php }?>
            </div>
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
                                
                                    <?php
                                        $questionNumber++;
                                    }
                                    ?>
                                    <div class="AnswerDisplay">
                                        <?php
                                            if ($row['CorrectAnswer'] == $row['AnswerID']){                           
                                            
                                        ?>
                                            <div class="correct">Answer: <?php echo $row['AnswerText'];?></div>
                                    </div>            
                                                <?php
                                                    }
                                                }
                                            }
                                                    ?>
                                </div>
                </div>          
        </div>  
    </div>

    
</body>
</html>

