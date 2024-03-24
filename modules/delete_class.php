<?php
require '../modules/config.php';

if (isset($_POST['classID'])) {
    $classID = $_POST['classID'];

    // Start a transaction
    mysqli_begin_transaction($conn);

    try {
        // Delete related records
        $deleteProgressQuery = "DELETE FROM classprogress WHERE ClassID = '$classID'";
        $resultProgress = mysqli_query($conn, $deleteProgressQuery);
        if (!$resultProgress) throw new Exception(mysqli_error($conn));

        $deleteAnswersQuery = "DELETE FROM answers WHERE QuestionID IN (SELECT QuestionID FROM question WHERE LevelID IN (SELECT LevelID FROM level WHERE ChapterID IN (SELECT ChapterID FROM chapter WHERE ClassID = '$classID')))";
        $resultAnswers = mysqli_query($conn, $deleteAnswersQuery);
        if (!$resultAnswers) throw new Exception(mysqli_error($conn));

        $deleteQuestionsQuery = "DELETE FROM question WHERE LevelID IN (SELECT LevelID FROM level WHERE ChapterID IN (SELECT ChapterID FROM chapter WHERE ClassID = '$classID'))";
        $resultQuestions = mysqli_query($conn, $deleteQuestionsQuery);
        if (!$resultQuestions) throw new Exception(mysqli_error($conn));

        $deleteLevelsQuery = "DELETE FROM level WHERE ChapterID IN (SELECT ChapterID FROM chapter WHERE ClassID = '$classID')";
        $resultLevels = mysqli_query($conn, $deleteLevelsQuery);
        if (!$resultLevels) throw new Exception(mysqli_error($conn));

        $deleteChaptersQuery = "DELETE FROM chapter WHERE ClassID = '$classID'";
        $resultChapters = mysqli_query($conn, $deleteChaptersQuery);
        if (!$resultChapters) throw new Exception(mysqli_error($conn));

        $deleteCommentsQuery = "DELETE FROM comments WHERE ClassID = '$classID'";
        $resultComments = mysqli_query($conn, $deleteCommentsQuery);
        if (!$resultComments) throw new Exception(mysqli_error($conn));

        $deleteStudentBadgeQuery = "DELETE FROM studentbadge WHERE BadgeID IN (SELECT BadgeID FROM badges WHERE ClassID = '$classID')";
        $resultStudentBadge = mysqli_query($conn, $deleteStudentBadgeQuery);
        if (!$resultStudentBadge) throw new Exception(mysqli_error($conn));

        $deleteBadgesQuery = "DELETE FROM badges WHERE ClassID = '$classID'";
        $resultBadges = mysqli_query($conn, $deleteBadgesQuery);
        if (!$resultBadges) throw new Exception(mysqli_error($conn));

        // Delete the class itself
        $deleteClassQuery = "DELETE FROM class WHERE ClassID = '$classID'";
        $resultClass = mysqli_query($conn, $deleteClassQuery);
        if (!$resultClass) throw new Exception(mysqli_error($conn));

        // Commit transaction
        mysqli_commit($conn);

        echo "<script>alert('Class removed successfully'); window.location.href = '../admin/search.php?type=class';</script>";
        exit;
    } catch (Exception $e) {
        // Rollback transaction on error
        mysqli_rollback($conn);

        $error_message = $e->getMessage();
        echo "<script>alert('Error: Unable to remove class. Error: $error_message'); window.location.href = '../admin/search.php?type=class';</script>";
        exit;
    }
} else {
    echo "<script>alert('Error: Form not submitted properly.');</script>";
    exit;
}
?>
