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
        margin-top: 50px; 
    }

    .user-profile-left { 
        text-align: center; 
        margin-bottom: 10px;
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
        padding: 5px 10px;
        margin-bottom: 10px;
        font-size: 25;
        font-weight: bold;
        font-family: 'Montserrat', sans-serif; 
    }

    .edit-icon {
        display: inline-block;
        margin-left: 10px; 
        width: 25px; 
        height: 25px; 
        cursor: pointer;
    }

</style>
<h2><?php echo $headerText; ?></h2>

<div class="profile-wrapper">
    <div class="profileLeft">
        <div class="profile-info-left">
            <div class="user-profile-left">
                <?php if ($role === 'admin'): ?>
                    <div class="admin-text">YOU ARE AN ADMIN</div>
                <?php endif; ?>
                <?php if ($userProfilePicture): ?>
                    <img class="user-profile-img" src="<?php echo $userProfilePicture; ?>" alt="Profile Picture">
                <?php else: ?>
                    <img class="user-profile-img" src="../images/guestPFP.png" alt="Default Profile Picture">
                <?php endif; ?>
                <img class="edit-icon" src="../images/edit.png" alt="Edit Profile Picture">
            </div>
            <div class="username-left"><?php echo $username; ?></div>
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



