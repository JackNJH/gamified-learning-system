<?php
    require '../modules/config.php';
    if ($role !='teacher'){
        header('Location: ../index.php');
        die;
    }

    include '../components/header.php'; // Header

// SQL query to fetch student names
$sql = "SELECT UserName FROM user WHERE UserType = 'student'";
$result = mysqli_query($conn, $sql);

// Check if the query execution was successful
if (!$result) {
    // Handle query error
    die("Query failed: " . mysqli_error($conn));
}

// Check if there are rows returned
if (mysqli_num_rows($result) > 0) {
    // Initialize an array to store student names
    $studentNames = array();

    // Store student names in the array
    while ($row = mysqli_fetch_assoc($result)) {
        $studentNames[] = $row["UserName"];
    }
} else {
    // If no students found
    $studentNames = array(); // Empty array
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Students</title>
    <link rel="stylesheet" href="styles.css"> 
    <style>
        .searchbar{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 50px;
}
.searchbar input[type=text]{
    height: 40px;
    width: 500px;
    border-radius: 50px;
    font-size: 20px;
    font-family:'Montserrat', sans-serif;
}
.searchbar button {
    height: 40px;
    width: 40px;
    background-color: #3eed81b9;
    cursor: pointer;
    border-radius: 50px;
    float: right;
    margin-left: 5px;
}

.searchresult{
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 20px;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}

.std-name{
    height:100px;
    width:1000px;
    background-color:#d9d9d9;
    margin-left:10rem;
}

#container {
    display: flex;
    align-items: center;
}

#editableContent, button {
    display: inline-block;
    margin-right: 10px; 
}



        </style>
</head>
<body>
<div class="container">
    <div class="searchbar">
    <h1 style="margin-left:-100px;">REVIEW STUDENTS</h1>
        <form method="post" style="margin-left:300px;">
            <input type="text" placeholder=" Search for students" name="search">
            <button name="submit"></button>
        </form>
    </div>
    <form class="horizontal-form">
    <label for="name" style="margin-left:350px;">Name:</label>

    <label for="progress" style="margin-left:100px;">Progress:</label>

    <label for="remove-students" style="margin-left:100px;">Remove Students:</label>

    <label for="comments" style="margin-left:100px;">Comments:</label>
</form>
<div class="std-name" style="margin-top:5px;">
    <p style="margin-left:170px; padding-top:40px;">
        Student123
    </p>
    <p style="margin-left:350px;margin-top:-33px; ">
        90%
    </p>
    <button class="remove" style="background-color:#fe6d6c; border-radius:10px; border:none; height:30px; width:70px; margin-left:530px; margin-top: -39px; cursor:pointer;">
        Remove
    </button>
    <div id="container" style="margin-left:740px; margin-top:-50px;">
        <p id="editableContent" contenteditable="false">GoodJob!</p>
        <button onclick="toggleEdit()" style="margin-left:50px;">Edit</button>
    </div>
</div><br>
<div class="std-name" style="margin-top:5px;">
    <p style="margin-left:170px; padding-top:40px;">
        Student3
    </p>
    <p style="margin-left:350px;margin-top:-33px; ">
        32%
    </p>
    <button class="remove" style="background-color:#fe6d6c; border-radius:10px; border:none; height:30px; width:70px; margin-left:530px; margin-top: -39px; cursor:pointer;">
        Remove
    </button>
    <div id="container" style="margin-left:740px; margin-top:-50px;">
        <p id="editableContent" contenteditable="false">GoodJob!</p>
        <button onclick="toggleEdit()" style="margin-left:50px;">Edit</button>
    </div>
</div><br>
<div class="std-name" style="margin-top:5px;">
    <p style="margin-left:170px; padding-top:40px;">
        Student1
    </p>
    <p style="margin-left:350px;margin-top:-33px; ">
        38%
    </p>
    <button class="remove" style="background-color:#fe6d6c; border-radius:10px; border:none; height:30px; width:70px; margin-left:530px; margin-top: -39px; cursor:pointer;">
        Remove
    </button>
    <div id="container" style="margin-left:740px; margin-top:-50px;">
        <p id="editableContent" contenteditable="false">GoodJob!</p>
        <button onclick="toggleEdit()" style="margin-left:50px;">Edit</button>
    </div>
</div><br>
<div class="std-name" style="margin-top:5px;">
    <p style="margin-left:170px; padding-top:40px;">
        Student2
    </p>
    <p style="margin-left:350px;margin-top:-33px; ">
        45%
    </p>
    <button class="remove" style="background-color:#fe6d6c; border-radius:10px; border:none; height:30px; width:70px; margin-left:530px; margin-top: -39px; cursor:pointer;">
        Remove
    </button>
    <div id="container" style="margin-left:740px; margin-top:-50px;">
        <p id="editableContent" contenteditable="false">GoodJob!</p>
        <button onclick="toggleEdit()" style="margin-left:50px;">Edit</button>
    </div>
</div>

</div>
<script>
// Function to toggle edit mode
function toggleEdit() {
    var editableContent = document.getElementById("editableContent");
    var button = document.querySelector("#container button");
    if (editableContent.contentEditable === "false") {
        editableContent.contentEditable = "true";
        editableContent.focus(); // Focus on the editable content
        button.textContent = "Done"; // Change button text to "Done"
    } else {
        editableContent.contentEditable = "false";
        button.textContent = "Edit"; // Change button text back to "Edit"
    }
}

// Function to handle Enter key press
function handleKeyPress(event) {
    if (event.keyCode === 13) { // Check if Enter key is pressed
        toggleEdit(); // Call toggleEdit function
    }
}

// Add event listener for Enter key press on editable content
document.getElementById("editableContent").addEventListener("keypress", handleKeyPress);

    </script>
</body>
</html>