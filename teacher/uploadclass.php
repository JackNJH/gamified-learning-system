<?php

require '../modules/config.php';
if ($role != 'teacher'){
    header('Location: ../index.php');
    die;
}



// Database connection parameters


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

            //$update_query = "UPDATE class SET ClassDashboard = '$new_image_path' WHERE UserId = '$user_id'";
    //         if(mysqli_query($conn, $update_query)){
    //             showAlertAndRedirect("Successfully updated profile picture!");
    //         } else{
    //             showAlertAndRedirect("Error updating record: " . mysqli_error($conn));
    //         }
    //     } else {
    //         showAlertAndRedirect("Sorry, there was an error uploading your file.");
    //     }
    // } else {
    //     showAlertAndRedirect("Error: Form not submitted properly.");
    // }

// Handle file uploads
// Move uploaded files to desired directory
//$upload_dir = "uploads/";
//move_uploaded_file($_FILES['dashboard_design']['tmp_name'], $upload_dir . $dashboard_design);
//move_uploaded_file($_FILES['class_badge']['tmp_name'], $upload_dir . $class_badge);

// SQL query to insert data into the table
$sql = "INSERT INTO class (TeacherID, ClassName, ClassDesc, ClassDashboard, ClassDiff, ClassPrivacy, ClassCode) 
        VALUES ('$teacher_id', '$class_name', '$description', '$target_file', '$difficulty', '$privacy', '$class_code')";    

if ($conn->query($sql) === TRUE) {
    header("Location:index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>