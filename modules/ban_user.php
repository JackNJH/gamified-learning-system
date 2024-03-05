<?php
require '../modules/config.php';

if (isset($_POST['view_user_id'])) {
    $view_user_id = $_POST['view_user_id'];

    $query = "UPDATE user SET UserStatus = 'banned' WHERE UserID = '$view_user_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('User banned successfully'); window.location.href = '../public/viewOtherProfile.php?user_id=$view_user_id';</script>";
        exit;
    } else {
        echo "<script>alert('Error: Unable to ban user'); window.location.href = '../public/viewOtherProfile.php?user_id=$view_user_id';</script>";
        exit;
    }
} else {
    echo "<script>alert('Error: Form not submitted properly.');</script>";
    exit;
}
?>




