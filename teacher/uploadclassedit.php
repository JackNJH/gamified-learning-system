<?php

require '../modules/config.php';
if ($role != 'teacher') {
    header('Location: ../index.php');
    die;
}

// Check if class ID is provided
if (!isset($_POST['class_id'])) {
    header('Location: ../index.php');
    die;
}

// Retrieve form data
$class_id = $_POST['class_id'];
$class_name = $_POST['class_name'];
$description = $_POST['description'];
$difficulty = $_POST['difficulty'];
$privacy = $_POST['privacy'];
$class_code = $_POST['class_code'];

// Check if a new image file is uploaded
if ($_FILES["dashboard_design"]["name"]) {
    $target_dir = "../images/";
    $target_file = $target_dir . basename($_FILES["dashboard_design"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check file extension
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        showAlertAndRedirect("Sorry, only JPG, JPEG & PNG files are allowed.");
        exit;
    }

    // Upload the file
    if (move_uploaded_file($_FILES["dashboard_design"]["tmp_name"], $target_file)) {
        $new_image_path = $target_file;
    } else {
        showAlertAndRedirect("Sorry, there was an error uploading your file.");
        exit;
    }
}

// Update class details
$sql = "UPDATE class SET ClassName = '$class_name', ClassDesc = '$description', ClassDiff = '$difficulty', 
        ClassPrivacy = '$privacy', ClassCode = '$class_code'";

// Update dashboard design if a new file is uploaded
if (isset($new_image_path)) {
    $sql .= ", ClassDashboard = '$new_image_path'";
}

$sql .= " WHERE ClassID = '$class_id'";

if ($conn->query($sql) === TRUE) {
    header("Location:index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();

?>
