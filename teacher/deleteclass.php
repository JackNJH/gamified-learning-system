<?php
    require '../modules/config.php';

    if ($role != 'teacher') {
        header('Location: ../index.php');
        die;
    }

    $classID = isset($_GET['ClassID']) ? $_GET['ClassID'] : '';

    if ($classID === '') {
        die("Class ID not provided or invalid.");
    }

    // Delete related data from badges, chapters, and class tables
    $sqlDeleteBadges = "DELETE FROM badges WHERE ClassID = '$classID'";
    $resultDeleteBadges = mysqli_query($conn, $sqlDeleteBadges);

    $sqlDeleteChapters = "DELETE FROM chapter WHERE ClassID = '$classID'";
    $resultDeleteChapters = mysqli_query($conn, $sqlDeleteChapters);

    $sqlDeleteClass = "DELETE FROM class WHERE ClassID = '$classID'";
    $resultDeleteClass = mysqli_query($conn, $sqlDeleteClass);

    if ($resultDeleteBadges && $resultDeleteChapters && $resultDeleteClass) {
        echo "<script>alert('Class and related data deleted successfully.'); window.location.href='../index.php';</script>";
    } else {
        echo "<script>alert('Error deleting class related data: " . mysqli_error($conn) . "'); window.location.href='../index.php';</script>";
    }
?>