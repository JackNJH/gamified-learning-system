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
    <title>Create Questions</title>
    <link rel="stylesheet" href="styles.css"> 
    <style>
    body {
    font-family:'Montserrat', sans-serif;
    line-height: 1.6;
}

.container {
    width: 80%;
    margin: auto;
}

h1 {
    margin-bottom: -1rem;
}

h2 {
    font-size: 20px;
}
.class-form {
    display: grid;
    grid-template-columns: 4fr 3fr;
    grid-gap: 2rem;
    align-items: center;
    justify-content: space-between;
}

.class-form label,
.class-form input,
.class-form select {
    padding: 0.5rem;
}

.class-form button {
    padding: 0.7rem;
    background-color: orange;
    color: white;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    width: 15rem;
    justify-self: end;

}
.class-form button[type="cancel"] {
    margin-right: auto;
    border-radius:10px;
    width:120px;
}

#class-name{
    height: 50px;
}

.class-form button[type="submit"] {
    justify-self: start; 
    margin-left: -300px;
    border-radius:10px;
    width:120px;
}

.selectable-button {
    border: 1px solid #ccc;
    background-color: #fff;
    cursor: pointer;
    padding: 5px 10px;
    font-size: 16px;
    color: #666;
    border-radius: 5px;
    outline: none;
}

.selectable-button.selected {
    background-color: #229954; 
}
</style>
</head>

<body>
<div class="container">
    <h1>CREATE QUESTIONS</h1>
    <h2>ENTER QUESTION DETAILS</h2>
    <form class="class-form">
        <input type="text" id="class-name" placeholder="Question" required style="margin-right:140px;"><br><br><br>

            <div style="display: flex; align-items: center;">
                <input type="text" id="class-name" placeholder="Answer" required style="flex: 1;">
                <button type="button" class="selectable-button" onclick="toggleSelection(this)" style="margin-left:20px; width:120px;">Correct</button>
            </div><br>

            <div style="display: flex; align-items: center;">
                <input type="text" id="class-name" placeholder="Answer" required style="flex: 1;">
                <button type="button" class="selectable-button" onclick="toggleSelection(this)" style="margin-left:20px; width:120px;">Correct</button>
            </div><br>

            <div style="display: flex; align-items: center;">
                <input type="text" id="class-name" placeholder="Answer" required style="flex: 1;">
                <button type="button" class="selectable-button" onclick="toggleSelection(this)" style="margin-left:20px; width:120px;">Correct</button>
            </div><br>

            <div style="display: flex; align-items: center;">
                <input type="text" id="class-name" placeholder="Answer" required style="flex: 1;">
                <button type="button" class="selectable-button" onclick="toggleSelection(this)" style="margin-left:20px; width:120px;">Correct</button>
            </div><br>

        <button type="cancel">Cancel</button>
        <button type="submit" id="continue" >Continue</button>
            
    </form>      
</div>
<script>
function toggleSelection(button) {
    button.classList.toggle('selected');
}
</script>

</body>
</html>
