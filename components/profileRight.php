<?php
require '../modules/config.php';

$query = "SELECT * FROM user WHERE UserID = '$user_id'"; 
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error fetching user data: " . mysqli_error($conn));
}

$user_data = mysqli_fetch_assoc($result);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../css/h2_title.css">
<style>
    .profile-wrapper-right {
        display: flex;
        height: 80vh; 
        width: 100%; 
        margin: 0; 
        padding: 0; 
    }

    .profileRight{
        width: 100%;
    }

    .profile-info-right {
        padding-left: 2.5vw;
        padding-right: 2.5vw;
    }

    .user-detail {
        margin-bottom: 1vw;
        display: flex;
    }

    .label {
        font-weight: bold;
        font-family: 'Montserrat', sans-serif; 
        font-size: 1.1vw;
        flex: 0.5;
        padding: 0.5vw; 
    }

    .value {
        color: #333; 
        font-family: 'Montserrat', sans-serif; 
        font-size: 1.1vw; 
        flex: 3; 
        border: 1px solid #ccc; 
        padding: 0.5vw; 
        display: block;
        max-width: 80%;
        word-wrap: break-word;
    }

    .bio .value {
        line-height: 1.5; 
        max-height: 16vw; /* Set a maximum height */
        overflow-y: auto; /* Enable vertical overflow scrolling */
    }

    .change-password-link {
        position: absolute;
        bottom: 2vw;
        right: 3vw;
        font-size: 1.2vw;
        font-family: 'Poppins', sans-serif; 
    }

    .change-password-link a {
        color: red;
        text-decoration: none; 
    }

    .change-password-link a:hover {
        color: #FF0595;
        filter: drop-shadow(0 0 1px rgba(0, 0, 0, 0.5));
    }
    </style>
</head>
<body>

<div class="profile-wrapper-right">
    <div class="profileRight">
        <div class="profile-info-right" id="profile-right-content">
            <div class="user-detail">
                <span class="label">User ID:</span>
                <span class="value"><?php echo $user_data['UserID']; ?></span>
            </div>
            <div class="user-detail">
                <span class="label">Role:</span>
                <span class="value"><?php echo $user_data['UserType']; ?></span>
            </div>
            <div class="user-detail">
                <span class="label">Username:</span>
                <span class="value"><?php echo $user_data['UserName']; ?></span>
            </div>
            <div class="user-detail">
                <span class="label">Email:</span>
                <span class="value"><?php echo $user_data['UserEmail']; ?></span>
            </div>
            <div class="user-detail">
                <span class="label">Telephone:</span>
                <span class="value"><?php echo $user_data['UserTel']; ?></span>
            </div>
            <div class="user-detail bio">
                <span class="label">Bio:</span>
                <span class="value"><?php echo nl2br($user_data['UserBio']); ?></span>
            </div>
        </div>
    </div>
</div>


<div class="change-password-link">
    <a href="#" id="changePasswordLink">CHANGE PASSWORD?</a>
</div>

</body>
</html>