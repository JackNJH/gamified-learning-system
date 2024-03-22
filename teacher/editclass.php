<?php
    require '../modules/config.php';

    if ($role != 'teacher') {
        header('Location: ../index.php');
        die;
    }

    $ClassID = isset($_GET['ClassID']) ? $_GET['ClassID'] : '';

    if ($ClassID === '') {
        die("Class ID not provided or invalid.");
    }



    
    $sql = "SELECT * FROM class WHERE ClassID = '$ClassID'";
    $result = mysqli_query($conn, $sql);
    if ($result){
        $class_data = mysqli_fetch_assoc($result);
    }

       


    
    include '../components/header.php'; // Header
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"  content="width=device-width, initial-scale=1.0">
    <title>Edit class</title>
    <link rel="stylesheet" href="styles.css">
    <style>body {
    font-family:'Montserrat', sans-serif;;
    line-height: 1.6;
}

.container {
    width: 50%;
    margin: auto;
}

h1 {
    text-align: center;
    margin-bottom: 2rem;
}

h2 {
    text-align: center;
    margin-bottom: 2rem;
    font-size: 20px;
}

.class-form {
    display: grid;
    grid-template-columns: 2fr 3fr;
    grid-gap: 2rem;
    align-items: center;
    justify-content: space-between;
}

.class-form label,
.class-form input,
.class-form select {
    padding: 0.5rem;
}

.class-form label[for="pic"] {
    justify-self: end;
    grid-column: 2;
    align-self: start;
}

.class-form input[type="file"] {
    grid-column: 1 / 3;
    align-self: start;
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
    justify-self: start; 
    margin-right: auto;
}

.class-form button:hover {
    background-color: darkorange;
}
</style>
</head>
<body>
    <div class="container">
        <h1>EDIT CLASS</h1>
        <h2>RE-ENTER CLASS DETAILS</h2>
        <form class="class-form"  action="uploadclassedit.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="ClassID" value="<?php $ClassID ?>">
            <label for="class-name">Class name:</label>
            <input type="text" id="class-name" name="class_name" value="<?php echo $class_data['ClassName']; ?>" required>

            <label for="description">Description:</label>
            <textarea id="description" name= "description"  required><?php echo $class_data['ClassDesc']; ?></textarea>

            <label for="dashboard-design">Insert Dashboard Design:</label>
            <input type="file" id="pic" name="dashboard_design" accept="image/*">

            <label for="difficulty">Difficulty:</label>
            <select id="difficulty" name="difficulty">
                <option value="easy">Easy</option>
                <option value="medium">Medium</option>
                <option value="hard">Hard</option>
            </select>

            <label for="privacy">Privacy:</label>
            <select id="privacy" name="privacy">
                <option value="public">Public</option>
                <option value="private">Private</option>
            </select>

            <!-- <label for="Insert-Badge">Insert Class Completion Badge:</label>
            <input type="file" id="pic" name="class_badge" accept="image/*"> -->

            <label for="class-code">Private class code:</label>
            <input type="text" id="class-code" name="class_code" value="<?php echo $class_data['ClassCode']; ?>" required>

            <button type="cancel">Cancel</button>
            <button type="submit">Save</button>
            
        </form>
    </div>
</body>
</html>
