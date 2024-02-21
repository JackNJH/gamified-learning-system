<?php
require '../modules/config.php';    

function getHeader($role) {
    switch ($role) {
        case 'admin':
            return 'Admin View Profile';
        case 'teacher':
            return 'Teacher View Profile';
        case 'student':
            return 'Student View Profile';
        default:
            return 'View Profile';
    }
}

$userProfilePicture = getUserProfilePicture($conn, $user_id);
$headerText = getHeader($role);
?>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../css/h2_title.css">
<style>
    .profile-wrapper {
        display: flex;
        justify-content: center; 
        height: 80vh; 
        width: 40%; 
        margin: 0; 
        padding: 0; 
    }

    .profile-info-left {
        margin-top: 40px; 
    }

    .user-profile-left { 
        text-align: center; 
        margin-bottom: 15px;
        position: relative;
    }

    .user-profile-img {
        width: 250px;
        height: 250px; 
        border: 2px solid #ccc; 
        box-shadow: 0 2px 4px rgba(0,0,0,0.2); 
        margin-left: 40px;
    }

    .username-left {
        text-align: center; 
        font-size: 26px; 
        font-family: 'Montserrat', sans-serif; 
    }

    .admin-text {
        color: limegreen;
        margin-bottom: 10px;
        font-size: 25px;
        font-weight: bold;
        font-family: 'Montserrat', sans-serif; 
        display: flex; 
        align-items: center; 
        justify-content: center; 
    }

    .edit-icon {
        display: inline-block;
        margin-left: 10px; 
        width: 25px; 
        height: 25px; 
        cursor: pointer;
    }

    .edit-icon:hover {
        filter: drop-shadow(0 0 1px rgba(0, 0, 0, 0.5));
    }

    .user-profile-left2 {
        display: flex;
        flex-direction: column; 
        align-items: center; 
    }

    .user-badge-container {
        display: flex;
        justify-content: center;
        align-items: center; 
        margin-top: 80px; 
    }

    .user-badge {
        width: 175px; 
        height: 175px; 
        margin: 0 20px; 
        filter: drop-shadow(0 0 5px rgba(0, 0, 0, 0.5));
    }

    .empty-badge {
        width: 175px; 
        height: 175px; 
        margin: 0 20px; 
        filter: drop-shadow(0 0 5px rgba(0, 0, 0, 0.5));
        opacity: 0.5;
    }

    .user-badge:hover {
        transform: scale(1.1); 
        transition: transform 0.3s ease; 
    }

    .badges-button {
        padding: 10px 20px;
        margin-top: 50px;
        background-color: bisque;
        color: black;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        cursor: pointer;
        font-family: 'Poppins', sans-serif; 
        font-size: 15;
    }

    .badges-button:hover {
        background-color: chocolate;
        font-weight: bold;
        color: white;
    }

</style>
<h2><?php echo $headerText; ?></h2>

<div class="profile-wrapper">
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
                    <img class="user-badge" src="../images/<?php echo $role; ?>Badge.png" alt="<?php echo ucfirst($role); ?> Badge" title="You have the <?php echo $role; ?> role!">
                    <img class="empty-badge" src="../images/badgePlaceholder.png" alt="Empty Badge">
                    <img class="empty-badge" src="../images/badgePlaceholder.png" alt="Empty Badge">
                </div>
            <?php endif; ?>
            <?php if ($role === 'teacher'): ?>
                <div class="user-badge-container">
                    <img class="user-badge" src="../images/<?php echo $role; ?>Badge.png" alt="<?php echo ucfirst($role); ?> Badge" title="You have the <?php echo $role; ?> role!">
                    <img class="empty-badge" src="../images/badgePlaceholder.png" alt="Empty Badge">
                    <img class="empty-badge" src="../images/badgePlaceholder.png" alt="Empty Badge">
                </div>
            <?php endif; ?>
            <?php if ($role === 'student'): ?>
                <div class="user-badge-container">
                    <img class="user-badge" src="../images/badgePlaceholder.png" alt="Empty Badge">
                    <img class="user-badge" src="../images/badgePlaceholder.png" alt="Empty Badge">
                    <img class="user-badge" src="../images/badgePlaceholder.png" alt="Empty Badge">
                </div>
            <?php endif; ?>
            
            <?php if ($role === 'student'): ?>
                <button class="badges-button" onclick="location.href='../public/editBadges.php'" type="button">Badges</button>
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



