<?php
    require '../modules/config.php';
    if ($role !='student'){
        header('Location: ../index.php');
        die;
    }

    include '../components/header.php'; // Header
// all header included are in the components folder
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/gamified-learning-system-master/css/StudentHome.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <title>Frequently Asked Questions</title>
</head>
<body>
    <div class="page-title">
        <h1>FAQ</h1>
    </div>    
<!-- make table of content header shit -->
    <div class="FAQ-main">
        <h2 id="FAQ-classes">Classes</h2>
    </div>
    <div class="FAQ-sub">
        Many classes are available for students to choose from and participate, students may simply proceed to the class page to look for any classes to join.
        Classes are also divided to several sub-sections starting with Classes > Chapters > Levels > Questions.
    </div>
    <br>
    <div class="FAQ-main">
        <h2 id="FAQ-chapters">Chapters</h2>
    </div>
    <div class="FAQ-sub">
        Each class will have chapters included inside. These chapters may serve as a container for many different levels and questions surrounding a certain topic covered in the class.
    </div>
    <!-- still a lot more but oh god i dont think i can do all those in time... T-T -->
    <div class="FAQ-ticket-container">
        <div>
            <a href="Ticket.php" class="FAQ-button">Submit support ticket</a>
        </div>
    </div>
</body>
</html>