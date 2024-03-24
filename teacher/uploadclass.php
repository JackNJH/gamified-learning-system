<?php

require '../modules/config.php';
if ($role != 'teacher'){
    header('Location: ../index.php');
    die;
}

// Retrieve form data
$class_name = $_POST['class_name'];
$description = $_POST['description'];
$difficulty = $_POST['difficulty'];
$privacy = $_POST['privacy'];
$class_code = $_POST['class_code'];
$target_dir  = "../images/";
$target_file = $target_dir . basename($_FILES["dashboard_design"]["name"]);
$uploadOk=1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    showAlertAndRedirect("Sorry, only JPG, JPEG & PNG files are allowed.");
    exit;
}

// Upload the file
if (move_uploaded_file($_FILES["dashboard_design"]["tmp_name"], $target_file)) {
    $new_image_path = $target_file;
}

// SQL query to insert data into the table
$sql = "INSERT INTO class (TeacherID, ClassName, ClassDesc, ClassDashboard, ClassDiff, ClassPrivacy, ClassCode) 
        VALUES ('$teacher_id', '$class_name', '$description', '$target_file', '$difficulty', '$privacy', '$class_code')";    

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Class created successfully!'); window.location.href='index.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();

function showAlertAndRedirect($message) {
    echo "<script>alert('$message'); window.location.href='createclass.php';</script>";
}

?>
