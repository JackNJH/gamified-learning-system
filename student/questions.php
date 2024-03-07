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
    <link rel="stylesheet" href="../css/question.css">
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
        <div class="main">
            <div class="header2">Answer the questions to get points</div>
            <div class="questions">
                <p>Q1. 1+1 = ?</p>
                    <form>
                        <input type="radio" id="lvl1" name="level-option" value="lvl1" />
                        <label for="lvl1">2</label>
                        <br>
                        <br>
                        <input type="radio" id="lvl2" name="level-option" value="lvl2">
                        <label for="lvl1">3</label>
                        <br>
                        <br>
                        <input type="radio" id="lvl3" name="level-option" value="lvl3">
                        <label for="lvl1">4</label>
                        <br>
                        <br>
                        <input type="radio" id="lvl3" name="level-option" value="lvl3">
                        <label for="lvl1">No ans</label>
                    </form>
                <br>
                <p>Q2. what is the color of carrot </p>
                    <form>
                        <input type="radio" id="lvl1" name="level-option" value="lvl1" />
                        <label for="lvl1">lster</label>
                        <br>
                        <br>
                        <input type="radio" id="lvl2" name="level-option" value="lvl2">
                        <label for="lvl1">orange</label>
                        <br>
                        <br>
                        <input type="radio" id="lvl3" name="level-option" value="lvl3">
                        <label for="lvl1">2</label>
                        <br>
                        <br>
                        <input type="radio" id="lvl3" name="level-option" value="lvl3">
                        <label for="lvl1">no ans</label>
                    </form>
                <br>
                <p>Q3. 3 x 2 = ? </p>
                    <form>
                        <input type="radio" id="lvl1" name="level-option" value="lvl1" />
                        <label for="lvl1">6</label>
                        <br>
                        <br>
                        <input type="radio" id="lvl2" name="level-option" value="lvl2">
                        <label for="lvl1">8</label>
                        <br>
                        <br>
                        <input type="radio" id="lvl3" name="level-option" value="lvl3">
                        <label for="lvl1">20</label>
                        <br>
                        <br>
                        <input type="radio" id="lvl3" name="level-option" value="lvl3">
                        <label for="lvl1">no ans</label>
                    </form>
                    <br>
            </div>
        </div>
        <div class="back">
            <a href="levels.php">&#8592; Levels</a>
        </div>
        <div class="next">
            <a href="review.php">Finish</a>
        </div>
    </div>

</body>
</html>