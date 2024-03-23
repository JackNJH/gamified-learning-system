<?php
    require '../modules/config.php';
    if ($role !='teacher'){
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
    <title>View Questions</title>
    <link rel="stylesheet" href="../css/question.css">
    <link rel="stylesheet" href="styles.css">
    <style>
    .header{
    width: 70%;
    height: 50px;
    background-color: orange;
    border-radius: 10px;
    margin: auto;
    margin-top: 25px;
    margin-left: 200px;
    display: grid;
    align-items: center;
    text-align: center;
    font: 23px 'Montserrat', sans-serif;
}
.main{
    width: 1410px;
    height: 750px;
    border-radius: 12px;
    margin-left: 60px;
    margin-top: 20px;
    margin-bottom: 60px;
    background-color: rgb(255, 221, 158);
    position: sticky;
    overflow: scroll;
}

.button-level {
    padding: 0.7rem;
    background-color: orange;
    color: white;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    width: 15rem;
    justify-self: end;
    margin-bottom:20px;

}
.button-submit {
    padding: 0.7rem;
    background-color: orange;
    color: white;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    width: 15rem;
    justify-self: end;

}
.button-level[type="cancel"] {
    margin-right: auto;
    border-radius:10px;
    margin-left: 200px;
    width:120px;
}

.button-submit[type="submit"] {
    justify-self: start; 
    margin-left: 850px;
    border-radius:10px;
    width:180px;
}

    </style>


</head>

<body>

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
                <br><hr>    
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
                <br><hr>
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
    </div>
    <button type="cancel" class="button-level">Level</button>
        <button type="submit" class="button-submit" >Create Questions</button><br>
</body>
</html>