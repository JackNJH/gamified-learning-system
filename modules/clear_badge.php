<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = "UPDATE student SET SelectedBadge1 = NULL, SelectedBadge2 = NULL, SelectedBadge3 = NULL WHERE StudentID = '$student_id'";
    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "Invalid request.";
}
?>