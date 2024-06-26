<?php
require '../modules/config.php';    

if ($role === 'student') {

    function getBadgeInfo($conn, $badgeID) {
        $sql = "SELECT * FROM badges WHERE BadgeID = $badgeID";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_assoc($result);
    }
    
    // Selected Badges
    $sql = "SELECT SelectedBadge1, SelectedBadge2, SelectedBadge3 FROM student WHERE StudentID = '$student_id'";
    $result = mysqli_query($conn, $sql);
    $selectedBadges = mysqli_fetch_assoc($result);

}


$userProfilePicture = getUserProfilePicture($conn, $user_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
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
        margin-bottom: 0.8vw;
        position: relative;
    }

    .user-profile-img {
        width: 15vw;
        height: 15vw;
        border: 2px solid #ccc; 
        box-shadow: 0 2px 4px rgba(0,0,0,0.2); 
        margin-left: 2vw;
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

    .edit-icon {
        display: inline-block;
        margin-left: 10px; 
        max-width: 4%; 
        max-height: 4%; 
        width: auto;
        height: auto;
        cursor: pointer;
    }

    .edit-icon:hover {
        filter: drop-shadow(0 0 1px rgba(0, 0, 0, 0.5));
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
        margin-top: 2vw; 
        width: 100%;
    }

    .badge-wrapper {
        margin: 0 3%; 
    }

    .user-badge,
    .empty-badge {
        width: 9vw; 
        height: 9vw; 
        filter: drop-shadow(0 0 5px rgba(0, 0, 0, 0.5));
    }

    .user-badge {
        object-fit: cover;
    }

    .empty-badge {
        opacity: 0.5;
    }

    .user-badge:hover {
        transform: scale(1.05); 
        transition: transform 0.3s ease; 
    }

    .badges-button {
        padding: 0.5vw 1vw;
        margin-top: 2vw;
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

</style>
</head>
<body>
<div class="profile-wrapper-left">
    <div class="profileLeft">
        <div class="profile-info-left">
            <?php if ($role === 'admin'): ?>
                <div class="admin-text">YOU ARE AN ADMIN</div>
            <?php endif; ?>

            <!-- User Profile Pic + Username -->
            <div class="user-profile-left">
                <?php if ($userProfilePicture): ?>
                    <img class="user-profile-img" src="<?php echo $userProfilePicture; ?>" alt="Profile Picture">
                <?php else: ?>
                    <img class="user-profile-img" src="../images/guestPFP.png" alt="Default Profile Picture">
                <?php endif; ?>
                <img class="edit-icon" src="../images/edit.png" alt="Edit Profile Picture">
            </div>
            <div class="username-left"><?php echo $username; ?></div>

            <!-- User Badges -->
            <div class="user-profile-left2">
            <?php if ($role === 'admin'): ?>
                <div class="user-badge-container">
                    <div class="badge-wrapper">
                        <img class="user-badge" src="../images/<?php echo $role; ?>Badge.png" alt="<?php echo ucfirst($role); ?> Badge" title="You have the <?php echo $role; ?> role!">
                    </div>
                    <div class="badge-wrapper">
                        <img class="empty-badge" src="../images/badgePlaceholder.png" alt="Empty Badge">
                    </div>
                    <div class="badge-wrapper">
                        <img class="empty-badge" src="../images/badgePlaceholder.png" alt="Empty Badge">
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($role === 'teacher'): ?>
                <div class="user-badge-container">
                    <div class="badge-wrapper">
                        <img class="user-badge" src="../images/<?php echo $role; ?>Badge.png" alt="<?php echo ucfirst($role); ?> Badge" title="You have the <?php echo $role; ?> role!">
                    </div>
                    <div class="badge-wrapper">
                        <img class="empty-badge" src="../images/badgePlaceholder.png" alt="Empty Badge">
                    </div>
                    <div class="badge-wrapper">
                        <img class="empty-badge" src="../images/badgePlaceholder.png" alt="Empty Badge">
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($role === 'student'): ?>
                <div class="user-badge-container">
                    <?php foreach ($selectedBadges as $badgeKey => $badgeID): ?>
                        <div class="badge-wrapper">
                        <?php 
                        if (!is_null($badgeID)) {
                            $badgeInfo = getBadgeInfo($conn, $badgeID);
                            if ($badgeInfo) {
                                // Badge exists, display badge image
                                echo '<img class="user-badge" src="' . $badgeInfo['BadgePic'] . '" alt="' . $badgeInfo['BadgeName'] . '">';
                            } else {
                                // Badge not found, display default image
                                echo '<img class="empty-badge" src="../images/badgePlaceholder.png" alt="Empty Badge">';
                            }
                        } else {
                            // Badge ID is null, display default image
                            echo '<img class="empty-badge" src="../images/badgePlaceholder.png" alt="Empty Badge">';
                        }
                        ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            
            <?php if ($role === 'student'): ?>
                <button class="badges-button" onclick="location.href='../components/editBadges.php'" type="button">Badges</button>
            <?php endif; ?>
            
        </div>
    </div>
</div>



<form id="profile-picture-form" action="../modules/upload_pfp.php" method="post" enctype="multipart/form-data">
    <input type="file" id="profile-picture-input" name="profile-picture" style="display: none;">
</form>

<script>
    document.querySelector('.edit-icon').addEventListener('click', function(event) {
        event.preventDefault();
        document.querySelector('#profile-picture-input').click();
    });

    document.querySelector('#profile-picture-input').addEventListener('change', function() {
        document.querySelector('#profile-picture-form').submit();
    });
</script>
</body>
</html>








