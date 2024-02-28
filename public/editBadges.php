<?php
include '../components/header.php'; // Header
if ($role == ''){
    header("Location: ../index.php");
    die;
}

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
        
    </style>
</head>
<body>
<h2><?php echo 'Edit Badges'; ?></h2>
<div class="vertical-line"></div>
<div class="profile-container">
    <div class="profile-left-section">
        <?php require_once '../components/editBadgesLeft.php'; ?>
    </div>
    <div class="profile-right-section">
        <?php require_once '../components/editBadgesRight.php'?>
    </div>
</div>


</body>
</html>