<?php
require '../modules/config.php';

// Get the data sent from changes made
$data = json_decode(file_get_contents('php://input'), true);

$response = array('emailExists' => false, 'telExists' => false);

// Check if email already exists
if (isset($data['UserEmail'])) {
    $email = mysqli_real_escape_string($conn, $data['UserEmail']);
    $query = "SELECT * FROM user WHERE UserEmail = '$email' AND UserID != '$user_id'";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $response['emailExists'] = true;
    }
}

// Check if telephone number already exists
if (isset($data['UserTel'])) {
    $tel = mysqli_real_escape_string($conn, $data['UserTel']);
    $query = "SELECT * FROM user WHERE UserTel = '$tel' AND UserID != '$user_id'";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $response['telExists'] = true;
    }
}

// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
