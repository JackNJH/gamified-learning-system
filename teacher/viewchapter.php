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
    <title>Class </title>
    <link rel="stylesheet" href="../css/chapter.css">
    <style>
        .options{
    
    margin-top: 80px;
    font-size: 20px;
    color: #ffffff;
    text-decoration: none;
    font-weight: 500;

}


.options a{
    color: #000000;
    position: relative;
    text-decoration: none;
    padding: 10px 15px;
    display: flex;
    align-items: center;
    font-family: 'Montserrat', sans-serif;
    padding: 20px;
}

.options a::after{
    content: "";
    position: absolute;
    background-color: #ffffff;
    height: 3px;
    width: 0;
    left: 0;
    bottom: -10px;
    transform: scaleX(0);
    transition: transform 0.6s;

}
.options a:hover{
    color: #000000;
}
.options a:hover:after{
    width: 100%;
    transform: scaleX(1);

}
.classes{
    width: 170px;
    height: 600px;
    border-radius: 4px;
    padding: 10px;
    margin: 10px;
    margin-top: 40px;
    font-family: 'Montserrat', sans-serif;
    font-size: 15px;
    background-color: rgb(255, 221, 158);
}

.content{
    width: 72%;
    height: 700px;
    border-radius: 5px;
    margin-left: 20%;
    margin-top: 70px;
    margin-bottom: 60px;
    background-color: #000000;
    position: sticky;

}
.design{
    width: 50%;
    height: 700px;
    background-color: #ffb007;
    float: left;
    display: grid;
    align-items: center;
    text-align: center;
    font: bold 23px 'Montserrat', sans-serif;
}
.chapters{
    width: 50%;
    height: 700px;
    background-color: #f8e7c2;
    float: right;
}
.badge{
    position: fixed;
    top: 70px;
    left: 300px;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    border-color: #000000;
    background-color: aqua;
    display: grid;
    align-items: center;
    text-align: center;
    font: 23px 'Montserrat', sans-serif;

}
.completion{
    display: grid;
    align-items: center;
    text-align: center;
    margin-top: 45px;
    font: bold 20px 'Montserrat', sans-serif;
}
.progress{
    position: relative;
    width: 62%;
    height: 30px;
    background: #b8b8b8;
    border-radius: 50px;
    overflow: hidden;
    margin-top: 15px;
    margin-left: 140px;
}
.progressfill{
    width: 50%;
    height: 100%;
    background:#63f700;
}
.progresstext{
    position: absolute;
    top: 50%;
    right: 5px;
    transform: translateY(-50%);
    font: bold 14px 'Montserrat', sans-serif;
    color: #ffffff;
}
.ChapSelect{
    padding: 15px;
}
.selection{
    
    width: 80%;
    height: 50px;
    border: 2px solid rgb(0, 0, 0);
    border-radius: 6px;
    padding: 10px;
    margin-top: 30px;
    margin-left: 55px;
    display: grid;
    align-items: center;
    text-align: center;
    font: 20px 'Montserrat', sans-serif;
}
.leaderboard{
    width: 400px;
    height: 60px;
    border: 2px solid rgb(0, 0, 0);
    border-radius: 6px;
    margin: auto;
    background:#f8e7c2;
    text-align: center;
    font: 20px 'Montserrat', sans-serif;
    display: grid;
    align-items: center;
    text-align: center;

}
.button-container {
  position: fixed;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  justify-content: center;
  padding: 1rem;
  background-color: white;
  border-top: 1px solid #ccc;
}

.class-form button {
  padding: 0.7rem;
  background-color: orange;
  color: white;
  border: none;
  border-radius: 20px;
  cursor: pointer;
  width: 15rem;
  justify-self: center;
  margin: 0.5rem auto;
}

.class-form button[type="cancel"] {
  justify-self: start;
  margin-right: auto;
}

.class-form button:hover {
  background-color: darkorange;
}
.class-form {position: absolute;
    bottom: 2%;
    right: 25%;}
    </style>
</head>
<body>

    <div class="main">
        <div class="content">
            <div class="design">
                Dashboard Design, Name, etc
            </div>

            <div class="chapters">


                <div class="ChapSelect">
                    <div class="selection"><a href="levels.php">Chapter 1</div></a>
                    <div class="selection">Chapter 2</div>
                    <div class="selection">Chapter 3</div>
                    <div class="selection">Chapter 4</div>
                </div>
            </div>
        </div>
        <div class="badge">
            Badge Pic
        </div>
        <form class= class-form>
            <div>
            <button type="editclass">Edit Class</button>
            <button type="reviewstudent">Review Student</button>
            <button type="addchapter">Add Chapter</button>
            <button type="deleteclass">Delete Class</button>
            </div>
            </form>
            
            
    </div>
</body>
</html>