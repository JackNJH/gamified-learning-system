<?php
require '../modules/config.php';

if (isset($_POST['classID'])) {
    $classID = $_POST['classID'];

    // Delete related records first
    $deleteQuestionsQuery = "DELETE FROM question WHERE LevelID IN (SELECT LevelID FROM level WHERE ChapterID IN (SELECT ChapterID FROM chapter WHERE ClassID = '$classID'))";
    $deleteLevelsQuery = "DELETE FROM level WHERE ChapterID IN (SELECT ChapterID FROM chapter WHERE ClassID = '$classID')";
    $deleteChaptersQuery = "DELETE FROM chapter WHERE ClassID = '$classID'";
    $deleteCommentsQuery = "DELETE FROM comments WHERE ClassID = '$classID'";
    $deleteProgressQuery = "DELETE FROM classprogress WHERE ClassID = '$classID'";
    $deleteBadgesQuery = "DELETE FROM badges WHERE ClassID = '$classID'";
    $deleteStudentBadgeQuery = "DELETE FROM studentbadge WHERE BadgeID IN (SELECT BadgeID FROM badges WHERE ClassID = '$classID')";

    // Perform deletion queries
    $resultQuestions = mysqli_query($conn, $deleteQuestionsQuery);
    $resultLevels = mysqli_query($conn, $deleteLevelsQuery);
    $resultChapters = mysqli_query($conn, $deleteChaptersQuery);
    $resultComments = mysqli_query($conn, $deleteCommentsQuery);
    $resultProgress = mysqli_query($conn, $deleteProgressQuery);
    $resultBadges = mysqli_query($conn, $deleteBadgesQuery);
    $resultStudentBadge = mysqli_query($conn, $deleteStudentBadgeQuery);

    $deleteClassQuery = "DELETE FROM class WHERE ClassID = '$classID'";
    $resultClass = mysqli_query($conn, $deleteClassQuery);

    if ($resultQuestions && $resultLevels && $resultChapters && $resultComments && $resultProgress && $resultBadges && $resultStudentBadge && $resultClass) {
        echo "<script>alert('Class removed successfully'); window.location.href = '../admin/search.php?type=class';</script>";
        exit;
    } else {
        $error_message = mysqli_error($conn);
        echo "<script>alert('Error: Unable to remove class. Error: $error_message'); window.location.href = '../admin/search.php?type=class';</script>";
        exit;
    }
} else {
    echo "<script>alert('Error: Form not submitted properly.');</script>";
    exit;
}
?>