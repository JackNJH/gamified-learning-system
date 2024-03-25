<?php
include '../modules/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['badgeID']) && isset($_POST['slot'])) {
    $badgeID = $_POST['badgeID'];
    $slot = $_POST['slot'];
    $studentID = $student_id; // Assuming $student_id is defined in config.php

    // Update the selected badge slot for the student
    $sql = "UPDATE student SET SelectedBadge$slot = $badgeID WHERE StudentID = '$student_id'";
    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "Invalid request.";
}
?>
