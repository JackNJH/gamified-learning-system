<?php
include '../components/header.php'; // Header
if ($role == ''){
    header("Location: ../index.php");
    die;
}

require '../modules/config.php'; 

// Retrieve the user_id from the URL
$view_user_id = isset($_GET['user_id']) ? $_GET['user_id'] : '';

if ($view_user_id === '') {
    // Handle case when user_id is not provided or invalid
    die("User ID not provided or invalid.");
}

$query = "SELECT * FROM user WHERE UserID = '$view_user_id'"; 
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error fetching user data: " . mysqli_error($conn));
}


// STUDENT PROFILE 
function get_student_badges_count($view_user_id, $conn) {
    $query = "SELECT COUNT(*) AS badge_count 
                FROM studentbadge 
                INNER JOIN student ON student.StudentID = studentbadge.StudentID 
                WHERE student.UserID = '$view_user_id'";
    $result = mysqli_query($conn, $query);
    
    if (!$result) {
        die("Error fetching student's badges: " . mysqli_error($conn));
    }
    
    $row = mysqli_fetch_assoc($result);
    return $row['badge_count'];
}

// TEACHER PROFILE 
function get_teacher_classes_count($view_user_id, $conn) {
    $query = "SELECT COUNT(*) AS class_count 
                FROM class 
                INNER JOIN teacher ON teacher.TeacherID = class.TeacherID 
                WHERE teacher.UserID = '$view_user_id'";

    $result = mysqli_query($conn, $query);
    
    if (!$result) {
        die("Error fetching teacher's classes: " . mysqli_error($conn));
    }
    
    $row = mysqli_fetch_assoc($result);
    return $row['class_count'];
}

$userProfilePicture = getUserProfilePicture($conn, $view_user_id);
$user_data = mysqli_fetch_assoc($result);
$teacher_stats = get_teacher_classes_count($view_user_id, $conn);
$student_stats = get_student_badges_count($view_user_id, $conn);

// VARIABLE DECLARATION
$view_role = $user_data['UserType'];
$user_status = $user_data['UserStatus'];

if ($user_status === 'banned') {
    $already_banned = true;
    $banned_message = "This user is banned.";
} else {
    $already_banned = false;
    $banned_message = "";
}

// STUDENT BADGES
if ($view_role === 'student') {
    function getBadgeInfo($conn, $badgeID) {
        $sql = "SELECT * FROM badges WHERE BadgeID = $badgeID";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_assoc($result);
    }
    
    // Selected Badges
    $sql = "SELECT SelectedBadge1, SelectedBadge2, SelectedBadge3 FROM student WHERE UserID = '$view_user_id'";
    $result = mysqli_query($conn, $sql);
    $selectedBadges = mysqli_fetch_assoc($result);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $user_data['UserName']; ?>'s Profile</title>
<link rel="stylesheet" href="../css/h2_title.css">
<link rel="stylesheet" href="../css/error.css">
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

    /* Styles from profileLeft.php */
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
    }

    .username-left {
        text-align: center; 
        font-size: 1.5vw; 
        font-family: 'Montserrat', sans-serif; 
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

    /* Styles from profileRight.php */
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
        flex: 0.7;
        padding: 0.2vw; 
    }

    .value {
        color: #333; 
        font-family: 'Montserrat', sans-serif; 
        font-size: 1.1vw; 
        flex: 3; 
        border: 1px solid #ccc; 
        padding: 0.2vw; 
        display: block;
        max-width: 80%;
        word-wrap: break-word;
        border: none;
    }

    .bio .value {
        line-height: 1.5; 
        max-height: 13vw; 
        height: 13vw;
        overflow-y: auto; 
    }

    .ban-button {
        margin-top: 1vw;
        background-color: #ff4444;
        color: #fff;
        border: none;
        padding: 0.5vw 1vw;
        border-radius: 0.5vw;
        cursor: pointer;
        font-size: 1vw;
        transition: background-color 0.3s ease;
        font-family: 'Poppins', sans-serif; 
        white-space: nowrap;
    }

    .ban-button:hover {
        background-color: #cc0000;
        font-weight: bold;
    }
    </style>
</style>
</head>
<body>
<h2><?php echo $user_data['UserName']; ?>'s Profile</h2>
<div class="vertical-line"></div>
<div class="profile-container">

    <!-- Left Side -->
    <div class="profile-left-section">
        <div class="profile-wrapper-left">
            <div class="profileLeft">

                    <!-- User Profile Pic + Username -->
                    <div class="user-profile-left">
                        <?php if ($userProfilePicture): ?>
                            <img class="user-profile-img" src="<?php echo $userProfilePicture; ?>" alt="Profile Picture">
                        <?php else: ?>
                            <img class="user-profile-img" src="../images/guestPFP.png" alt="Default Profile Picture">
                        <?php endif; ?>
                    </div>
                    <div class="username-left"><?php echo $user_data['UserName']; ?></div>

                    <!-- User Badges -->
                    <div class="user-profile-left2">
                    <?php if ($view_role === 'admin'): ?>
                        <div class="user-badge-container">
                            <div class="badge-wrapper">
                                <img class="user-badge" src="../images/<?php echo $view_role; ?>Badge.png" alt="<?php echo ucfirst($view_role); ?> Badge" title="You have the <?php echo $view_role; ?> role!">
                            </div>
                            <div class="badge-wrapper">
                                <img class="empty-badge" src="../images/badgePlaceholder.png" alt="Empty Badge">
                            </div>
                            <div class="badge-wrapper">
                                <img class="empty-badge" src="../images/badgePlaceholder.png" alt="Empty Badge">
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($view_role === 'teacher'): ?>
                        <div class="user-badge-container">
                            <div class="badge-wrapper">
                                <img class="user-badge" src="../images/<?php echo $view_role; ?>Badge.png" alt="<?php echo ucfirst($view_role); ?> Badge" title="You have the <?php echo $view_role; ?> role!">
                            </div>
                            <div class="badge-wrapper">
                                <img class="empty-badge" src="../images/badgePlaceholder.png" alt="Empty Badge">
                            </div>
                            <div class="badge-wrapper">
                                <img class="empty-badge" src="../images/badgePlaceholder.png" alt="Empty Badge">
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($view_role === 'student'): ?>
                        <div class="user-badge-container">
                            <?php foreach ($selectedBadges as $badgeKey => $badgeID): ?>
                                <div class="badge-wrapper">
                                    <?php if (!is_null($badgeID)): ?>
                                        <?php $badgeInfo = getBadgeInfo($conn, $badgeID); ?>
                                        <img class="user-badge" src="<?php echo $badgeInfo['BadgePic']; ?>" alt="<?php echo $badgeInfo['BadgeName']; ?>">
                                    <?php else: ?>
                                        <img class="empty-badge" src="../images/badgePlaceholder.png" alt="Empty Badge">
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                
                </div>
            </div>
        </div>
    </div>

    <!-- Right Side -->
    <div class="profile-right-section">
        <div class="profile-wrapper-right">
            <div class="profileRight">
                <div class="profile-info-right" id="profile-right-content">
                    <?php if (!empty($banned_message)): ?>
                        <div class="error-message"><?php echo $banned_message; ?></div>
                    <?php endif; ?>
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
                        <span class="value bio"><?php echo nl2br($user_data['UserBio']); ?></span>
                    </div>
                    <div class="user-detail">
                    <?php if ($user_data['UserType'] == 'teacher'): ?>
                        <span class="label">Total Classes:</span>
                        <span class="value"><?php echo $teacher_stats; ?></span>
                    <?php elseif ($user_data['UserType'] == 'student'): ?>
                        <span class="label">Total Badges:</span>
                        <span class="value"><?php echo $student_stats; ?></span>
                    <?php endif; ?>

                </div>
                <?php if ($role === 'admin' && !$already_banned && $view_role !== 'admin'): ?>
                    <div class="user-detail">
                        <span class="value">
                            <form id="banForm" action="../modules/ban_user.php" method="POST">
                                <input type="hidden" name="view_user_id" value="<?php echo $view_user_id; ?>">
                                <button type="button" onclick="confirmBan()" class="ban-button">Ban User</button>
                            </form>
                        </span>
                    </div>
                    <script>
                        function confirmBan() {
                            if (confirm('Are you sure you want to ban this user? (ACTION IS IRREVERSIBLE)')) {
                                document.getElementById('banForm').submit();
                            } else {
                                alert('Ban action cancelled.');
                            }
                        }
                    </script>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</div>


</body>
</html>