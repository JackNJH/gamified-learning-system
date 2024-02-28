<?php
include '../components/header.php'; // Header
if ($role == ''){
    header("Location: ../index.php");
    die;
}

require '../modules/config.php';    

$userProfilePicture = getUserProfilePicture($conn, $user_id);

function getBadgeInfo($conn, $badgeID) {
    $sql = "SELECT * FROM badges WHERE BadgeID = $badgeID";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

// Selected Badges
$sql = "SELECT SelectedBadge1, SelectedBadge2, SelectedBadge3 FROM student WHERE StudentID = '$student_id'";
$result = mysqli_query($conn, $sql);
$selectedBadges = mysqli_fetch_assoc($result);


// Earned Badges
$query = "SELECT badges.BadgeID, badges.BadgeName, badges.BadgePic
          FROM studentbadge
          INNER JOIN badges ON studentbadge.BadgeID = badges.BadgeID
          WHERE studentbadge.StudentID = '$student_id'";

$resultEarned = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/h2_title.css">
    <style>
        header {
            position: relative;
            z-index: 2; 
        }

        body {
            overflow: hidden;
        }

        .vertical-line {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 40%;
            border-left: 3px solid #000; 
            z-index: 1;
            height: 100%; 
        }
        
        .profile-container {
            display: flex;
            flex-direction: row;
            width: 100%;
        }

        .profile-left-section {
            width: 40%;
        }

        .profile-right-section {
            width: 60%;
        }

        /* Left Section Styles */
        .profile-wrapper-left {
            display: flex;
            justify-content: center; 
            height: 80vh; 
            width: 100%; 
            margin: 0; 
            padding: 0; 
        }

        .profileLeft{
            margin-top: 1vw; 
            width: 100%;
        }

        .user-profile-left { 
            text-align: center; 
            margin-bottom: 1vw;
            position: relative;
        }

        .user-profile-img {
            max-width: 35%; 
            max-height: 35%; 
            width: auto;
            height: auto;
            border: 2px solid #ccc; 
            box-shadow: 0 2px 4px rgba(0,0,0,0.2); 
        }

        .username-left {
            text-align: center; 
            font-size: 1.5vw; 
            font-family: 'Montserrat', sans-serif; 
        }

        .admin-text {
            color: limegreen;
            margin-bottom: 0.5vw;
            font-size: 1.4vw;
            font-weight: bold;
            font-family: 'Montserrat', sans-serif; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
        }

        .user-profile-left2 {
            display: flex;
            flex-direction: column; 
            align-items: center; 
            width: 100%;
        }

        .user-badge-container {
            display: flex;
            justify-content: center;
            align-items: center; 
            margin-top: 10%; 
            max-width: 50%;
        }

        .user-badge {
            width: 50%; 
            height: auto; 
            max-width: 175px; 
            max-height: 175px; 
            margin: 0 5%; 
            filter: drop-shadow(0 0 5px rgba(0, 0, 0, 0.5));
        }

        .user-badge:hover {
            transform: scale(1.05); 
            transition: transform 0.3s ease; 
        }

        .empty-badge {
            width: 50%; 
            height: auto; 
            max-width: 175px; 
            max-height: 175px; 
            margin: 0 5%; 
            filter: drop-shadow(0 0 5px rgba(0, 0, 0, 0.5));
            opacity: 0.5;
        }

        .badges-buttons {
            display: flex;
            margin-top: 2.6vw;
            gap: 2vw;
        }

        .badges-button {
            padding: 0.5vw 1vw;
            background-color: bisque;
            color: black;
            border: none;
            border-radius: 0.5vw;
            text-decoration: none;
            cursor: pointer;
            font-family: 'Poppins', sans-serif; 
            font-size: 1vw;
            transition: background-color 0.3s;
        }

        .badges-button:hover {
            background-color: darkorange;
            font-weight: bold;
            color: white;
        }

        /* Right Section Styles */
        .profile-wrapper-right {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 80vh;
            width: 100%;
            margin: 0;
            padding: 0;
            overflow: auto;
        }

        .profileRight {
            width: 100%;
            max-width: 50vw; 
            padding-top: 0.5vw;
        }

        .earned-badges {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            gap: 4vw;
        }

        .earned-badges img {
            width: 50%; 
            height: auto;
            max-width: 175px; 
            max-height: 175px; 
            filter: drop-shadow(0 0 5px rgba(0, 0, 0, 0.5));
        }

        .earned-badges img:hover {
            transform: scale(1.05); 
            transition: transform 0.3s ease; 
        }

    </style>
</head>
<body>

<h2>Edit Badges</h2>
<div class="vertical-line"></div>
<div class="profile-container">

    <!-- Left Side  -->
    <div class="profile-left-section">
        <div class="profile-wrapper-left">
            <div class="profileLeft">
                <div class="profile-info-left">
                    <!-- User Profile Pic + Username -->
                    <div class="user-profile-left">
                        <?php if ($userProfilePicture): ?>
                            <img class="user-profile-img" src="<?php echo $userProfilePicture; ?>" alt="Profile Picture">
                        <?php else: ?>
                            <img class="user-profile-img" src="../images/guestPFP.png" alt="Default Profile Picture">
                        <?php endif; ?>
                    </div>
                    <div class="username-left"><?php echo $username; ?></div>
                    <!-- User Badges -->
                    <div class="user-profile-left2">
                        <div class="user-badge-container">
                            <?php foreach ($selectedBadges as $badgeKey => $badgeID): ?>
                                <?php if (!is_null($badgeID)): ?>
                                    <?php $badgeInfo = getBadgeInfo($conn, $badgeID); ?>
                                    <img class="user-badge" src="<?php echo $badgeInfo['BadgePic']; ?>" alt="<?php echo $badgeInfo['BadgeName']; ?>">
                                <?php else: ?>
                                    <img class="empty-badge" src="../images/badgePlaceholder.png" alt="Empty Badge">
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <div class="badges-buttons">
                            <button class="badges-button" onclick="location.href='../public/profile.php'" type="button">< Back</button>
                            <button class="badges-button" onclick="clearBadges()" type="button">Clear Badges</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Side -->
    <div class="profile-right-section">
        <div class="profile-wrapper-right">
            <div class="profileRight">
                <div class="earned-badges">
                    <?php
                    while ($row = mysqli_fetch_assoc($resultEarned)) {
                        echo '<img class="earned-badge" src="' . $row['BadgePic'] . '" alt="' . $row['BadgeName'] . '" data-badge-id="' . $row['BadgeID'] . '">';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../js/selectBadge.js"></script>
<script src="../js/clearBadge.js"></script>
</body>
</html>
