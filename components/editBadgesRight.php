<?php
require '../modules/config.php';    

$query = "SELECT badges.BadgeID, badges.BadgeName, badges.BadgePic
          FROM studentbadge
          INNER JOIN badges ON studentbadge.BadgeID = badges.BadgeID
          WHERE studentbadge.StudentID = '$student_id'";

$result = mysqli_query($conn, $query);

// Error validation
if (!$result) {
    die('Error: ' . mysqli_error($conn));
}

// Display earned badges based on student ID
$earnedBadges = [];
while ($row = mysqli_fetch_assoc($result)) {
    $earnedBadges[] = $row;
}

$numPlaceholders = 12; 
$placeholderBadges = [];

for ($i = 0; $i < $numPlaceholders; $i++) {
    $placeholderBadges[] = [
        'BadgePic' => 'badgePlaceholder.png',
        'BadgeName' => 'Placeholder'
    ];
}

foreach ($earnedBadges as $index => $earnedBadge) {
    if ($index < $numPlaceholders) {
        $placeholderBadges[$index] = $earnedBadge;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
<style>
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
        justify-content: center;
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

    .earned-badges img[alt="Placeholder"] {
        opacity: 0.5; 
    }


</style>
</head>
<body>

<div class="profile-wrapper-right">
    <div class="profileRight">
        <div class="earned-badges">
            <?php
            // Display badges
            foreach ($placeholderBadges as $badge) {
                echo '<img src="../images/' . $badge['BadgePic'] . '" alt="' . $badge['BadgeName'] . '">';
            }
            ?>
        </div>
    </div>
</div>


</body>
</html>


