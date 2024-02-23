<?php
require '../modules/config.php';

// Get the data sent from changes made
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['UserEmail'])) {
    $email = mysqli_real_escape_string($conn, $data['UserEmail']);
    $query = "UPDATE user SET UserEmail = '$email' WHERE UserID = '$user_id'";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo 'error';
        exit;
    }
}

if (isset($data['UserTel'])) {
    $tel = mysqli_real_escape_string($conn, $data['UserTel']);
    $query = "UPDATE user SET UserTel = '$tel' WHERE UserID = '$user_id'";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo 'error';
        exit;
    }
}

if (isset($data['UserName'])) {
    $new_username = mysqli_real_escape_string($conn, $data['UserName']);
    $query = "UPDATE user SET UserName = '$new_username' WHERE UserID = '$user_id'";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo 'error';
        exit;
    }
}

if (isset($data['UserBio'])) {
    $new_username = mysqli_real_escape_string($conn, $data['UserBio']);
    $query = "UPDATE user SET UserBio = '$new_username' WHERE UserID = '$user_id'";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo 'error';
        exit;
    }
}

?>