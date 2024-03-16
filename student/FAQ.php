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
    <link rel="stylesheet" href="../css/StudentHome.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <title>Frequently Asked Questions</title>
</head>
<body>
    <div class="page-title">
        <h1>FAQ</h1>
    </div>    
<!-- make table of content header type element if possible to keep track easier -->
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
    <br>
    <div class="FAQ-main">
        <h2 id="FAQ-chapters">Levels</h2>
    </div>
    <div class="FAQ-sub">
        Within each chapters are a few levels for the student to partake in, each level will also contain learning materials and even questions to test your knowledge in. Teachers may insert any form of learning materials like links or even some important noteworthy info into said levels for the students to learn/take note from. Once students are ready, they may then proceed to the questions to test what they have learned from the levels to further progress their studies.
    </div>
    <br>
    <div class="FAQ-main">
        <h2 id="FAQ-chapters">Questions</h2>
    </div>
    <div class="FAQ-sub">
        Answering questions for the levels are a way for students to progress their learnings as each question have points included. When a student gains progress points, they will be considered to be "participating" in the class and will also be displayed on the leaderboard to further measure their progress with others.
    </div>
    <br>
    <div class="FAQ-main">
        <h2 id="FAQ-chapters">Badges</h2>
    </div>
    <div class="FAQ-sub">
        Students may earn badges by completing classes and even reaching certain milestones. These badges may be customized on your profile page and will also appear on the leaderboards for a chance to show off your great achievements
    </div>
    <br>
    <div class="FAQ-main">
        <h2 id="FAQ-chapters">Support</h2>
    </div>
    <div class="FAQ-sub">
        If none of your questions are answered here, please don't hesitate to send us a support ticket by pressing the button below to ask our admin staff to assist you with your problems.
    </div>
    <!-- DONE -->
    <div class="FAQ-ticket-container">
        <div>
            <a href="Ticket.php" class="FAQ-button">Submit support ticket</a>
        </div>
    </div>
</body>
</html>