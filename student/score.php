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
        
        //try and add some sorta preemptive measure to prevent it from submitting again or just make it an update instead.
        $insert = "INSERT INTO classprogress (StudentID, ClassID, ChapterID, ProgressPoints)
                    VALUES ('$student_id', '$class', '$data', '$AnswerScore')";

        $CheckDupes = "SELECT * FROM classprogress
                        WHERE StudentID = '$student_id'
                        AND ChapterID = '$data';";

        $update = "UPDATE classprogress
                    SET ProgressPoints='$AnswerScore'
                    WHERE StudentID = '$student_id'
                    AND ChapterID = '$data';";

        $DupesResult = mysqli_query($conn, $CheckDupes);

        if (mysqli_num_rows($DupesResult) > 0) {
            while($row = mysqli_fetch_assoc($DupesResult)){
                if($row['ProgressPoints'] < $AnswerScore){
                    $result = mysqli_query($conn, $update);
                    if (!$result) {
                        die("Query failed: " . mysqli_error($conn));
                    }
                    else{
                        echo '<script>alert("POINTS EARNED!");</script>';
                    }      
                }
            }
        }
        else if(mysqli_num_rows($DupesResult) == 0) {
            $result = mysqli_query($conn, $insert);
            if (!$result) {
                die("Query failed: " . mysqli_error($conn));
            }
            else{
                echo '<script>alert("POINTS EARNED!");</script>';
            }      
            
        }     

    // Re-enable foreign key constraints
    // $enableFKQuery = "SET foreign_key_checks = 1";
    // mysqli_query($conn, $enableFKQuery);
    


    echo "<script>alert('".$AnswerScore."');</script>";
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


