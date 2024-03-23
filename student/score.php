<?php
require '../modules/config.php';

$data = isset($_GET['chapter_id']) ? $_GET['chapter_id'] : '';
$_SESSION['chapter_id'] = $data;
$class = $_SESSION['class_id'];

if (isset($_POST['answer-submit'])) {
    if (!empty($_POST['checkanswer'])) {
        $i = 1;

        $correctAnswers = 0;
        $selected = $_POST['checkanswer'];

        
        $sql = "SELECT * FROM question";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['CorrectAnswer'] == $selected[$i]){
                $correctAnswers ++;                
            }
          
            $i++;
            $AnswerScore = $correctAnswers * $row['QuestionPoints'];
        }
        $_SESSION['attempted'] = count($_POST['checkanswer']);
        $_SESSION['correct'] = $correctAnswers;
        $_SESSION['score'] = $AnswerScore;
      
        $insert = "INSERT INTO classprogress (StudentID, ClassID, ProgressPoints)
                    VALUES ('$student_id', '$class', '$AnswerScore')";

        $result = mysqli_query($conn, $insert);
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        // Re-enable foreign key constraints
        $enableFKQuery = "SET foreign_key_checks = 1";
        mysqli_query($conn, $enableFKQuery);

        header("Location: review.php");
        exit();
    } else {
        $_SESSION['attempted'] = 0;
        $_SESSION['score'] = 0;
        header("Location: review.php");
        exit();
    }
}
?>


