<?php
require '../modules/config.php';    

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

    .empty-badge {
        width: 50%; 
        height: auto; 
        max-width: 175px; 
        max-height: 175px; 
        margin: 0 5%; 
        filter: drop-shadow(0 0 5px rgba(0, 0, 0, 0.5));
        opacity: 0.5;
    }

    .user-badge:hover {
        transform: scale(1.05); 
        transition: transform 0.3s ease; 
    }


    .selected-badge {
        border: 0.3vw solid lime;
    }

    .badges-button {
        padding: 0.5vw 1vw;
        margin-top: 50px;
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
                    <img class="user-badge" src="../images/badgePlaceholder.png" alt="Empty Badge">
                    <img class="user-badge" src="../images/badgePlaceholder.png" alt="Empty Badge">
                    <img class="user-badge" src="../images/badgePlaceholder.png" alt="Empty Badge">
                </div>
                <button class="badges-button" onclick="location.href='../public/profile.php'" type="button">Save</button>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const badges = document.querySelectorAll('.user-badge');
        
        badges.forEach(badge => {
            badge.addEventListener('click', function () {
                // Remove the 'selected-badge' class from all badges
                badges.forEach(badge => {
                    badge.classList.remove('selected-badge');
                });

                // Add the 'selected-badge' class to the clicked badge
                this.classList.add('selected-badge');
            });
        });
    });
</script>

</body>
</html>