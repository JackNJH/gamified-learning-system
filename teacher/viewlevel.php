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

.side-pane{
    height: 200px;
    width: 150px;
    background-color:#d9d9d9 ;
    border-radius: 10px;
    margin-top: 190px;
    margin-left: 20px;
    padding-right: 20px;    
}

.thin-pane{
    height: 500px;
    width: 900px;
    border-radius: 10px;
    margin-left: 300px;
    margin-top: -350px;
}


.btn-chapter {
    padding: 0.7rem;
    background-color: orange;
    color: white;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    width: 15rem;
    justify-self: end;
    margin-left: 20px;

}

.btn-chapter[type="submit"] {
    justify-self: start; 
    border-radius:10px;
    width:120px;
}

.btn-edit-level {
    padding: 0.7rem;
    background-color: orange;
    color: white;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    width: 15rem;
    justify-self: end;
    margin-left: 20px;

}

.btn-edit-level[type="submit"] {
    justify-self: start; 
    border-radius:10px;
    width:120px;
}

.btn-add-level {
    padding: 0.7rem;
    background-color: orange;
    color: white;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    width: 15rem;
    justify-self: end;
    margin-left: 20px;

}

.btn-add-level[type="submit"] {
    justify-self: start; 
    border-radius:10px;
    width:120px;
}

.btn-delete-level {
    padding: 0.7rem;
    background-color: #fe6c6c;
    color: white;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    width: 15rem;
    justify-self: end;
    margin-left: 20px;

}

.btn-delete-level[type="submit"] {
    justify-self: start; 
    border-radius:10px;
    width:120px;
}

.btn-questions {
    padding: 0.7rem;
    background-color: orange;
    color: white;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    width: 15rem;
    justify-self: end;
    margin-left: 20px;

}

.btn-questions[type="submit"] {
    justify-self: start; 
    border-radius:10px;
    width:120px;
}
    </style>
</head>
<body>
<div class="header">Chapter 1</div>

<div class="container">
    <div class="side-pane">
        <label><input type="checkbox" name="level" value="1" style="margin-left:50px; margin-top:50px;"> Level 1</label><br>
        <label><input type="checkbox" name="level" value="2" style="margin-left:50px; margin-top:20px;"> Level 2</label><br>
        <label><input type="checkbox" name="level" value="3" style="margin-left:50px; margin-top:20px;"> Level 3</label><br>
    </div>
    <div class="thin-pane">
    <img src="../images/tech.jpg" alt="A beautiful picture" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
</div><br>
<div style="margin-left:400px; padding-bottom:20px;"> 
        <button type="submit" class="btn-chapter" > &#9664; Chapters</button> 
        <button type="submit" class="btn-edit-level" >Edit Level</button>
        <button type="submit" class="btn-add-level" >Add Level</button>
        <button type="submit" class="btn-delete-level" >Delete Level</button>
        <button type="submit" class="btn-questions" >Questions &#9654;</button>
</div>
</body>
</html>
