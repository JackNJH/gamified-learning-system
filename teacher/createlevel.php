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

h4 {
    margin-top:5px;
    /* padding-top:-30px; */
    padding-bottom:50px;  
    margin-left:15px;
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
    height: 200px;
    border-radius:10px;
}

.class-form button[type="submit"] {
    justify-self: start; 
    margin-left: -160px;
    border-radius:10px;
    width:120px;
}

</style>
</head>

<body>
<div class="container">
    <h1>CREATE LEVEL</h1>
    <h2>ENTER LEVEL DETAILS</h2>
    <form class="class-form" enctype="multipart/form-data">
            <input type="text" id="class-name" placeholder="Content" required><br>
            <h4>
                Picture / Videos:
            </h4><br></br>
            <input type="file" id="pic-input" accept="image/*" style="display: none;">
            <button class="insert-pic" id="insert-pic-btn" 
            style="
            height: 100px;
            width: 670px;
            background-color: white; 
            border: 1px solid black;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 10px;
            color: black;
            margin-top:-110px;">
            Insert Pic
            </button></br>
        <button type="cancel">Cancel</button>   
        <button type="submit" id="continue" >Create</button>         
    </form>
</div>

<script>
    // Function to handle file selection
    document.getElementById('insert-pic-btn').addEventListener('click', function() {
        document.getElementById('pic-input').click();
    });

    // Function to display the selected image
    document.getElementById('pic-input').addEventListener('change', function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var img = document.getElementById('selected-pic');
                img.src = e.target.result;
                img.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });
</script>

</body>
</html>