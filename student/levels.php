<?php
    require '../modules/config.php';
    if ($role !='student'){
        header('Location: ../index.php');
        die;
    }

    include '../components/header.php'; // Header

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Levels</title>
    <link rel="stylesheet" href="../css/levels.css">
</head>
<body>
    <div class="navi-bar">
        <div class="options">
            <a href="index.php"><b>Student menu</a></b>
        </div>
        <div class="classes">
            <p>Recently Joined classes</p>
            <div class="options">
                <a href="chapter.php">CLASS A</a>
            </div>
        </div>
    </div>  

    <div class="header">Chapter 1</div>
    <div class="wrapper">
        <div class="levelselect">
            <div class="list">
                <form>
                    <input type="radio" id="lvl1" name="level-option" value="lvl1" checked />
                    <label for="lvl1">Level 1</label>
                    <br>
                    <br>
                    <input type="radio" id="lvl2" name="level-option" value="lvl2">
                    <label for="lvl1">Level 2</label>
                    <br>
                    <br>
                    <input type="radio" id="lvl3" name="level-option" value="lvl3">
                    <label for="lvl1">Level 3</label>
                </form>
            </div>
        </div>
        
        <div class="guide">
            <p>CONTENT</p>
            <p>(Video, pics, guides etc)</p>
        </div>

        <div class="back">
            <a href="chapter.php">&#8592; Chapters</a>
        </div>
        <div class="next">
            <a href="questions.php">Questions &#8594;</a>
        </div>
    </div>

</body>
</html>