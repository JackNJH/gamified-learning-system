<?php
    require '../modules/config.php';    

    function showAlertAndRedirect($message) {
        echo "<script>alert('$message'); window.location.href = '../public/profile.php';</script>";
    }

    // Check if the form was submitted
    if(isset($_FILES["profile-picture"]) && $_FILES["profile-picture"]["error"] == 0){

        $target_dir = "../uploads/profilepic/$user_id/";

        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        } else {

            $files = glob($target_dir . '*'); 
            foreach($files as $file) {
                if(is_file($file)) {
                    unlink($file); 
                }
            }
        }

        $target_file = $target_dir . basename($_FILES["profile-picture"]["name"]);

        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            showAlertAndRedirect("Sorry, only JPG, JPEG & PNG files are allowed.");
            exit;
        }

        // Upload the file
        if (move_uploaded_file($_FILES["profile-picture"]["tmp_name"], $target_file)) {
            $new_image_path = $target_file;

            $update_query = "UPDATE user SET UserPFP = '$new_image_path' WHERE UserId = '$user_id'";
            if(mysqli_query($conn, $update_query)){
                showAlertAndRedirect("Successfully updated profile picture!");
            } else{
                showAlertAndRedirect("Error updating record: " . mysqli_error($conn));
            }
        } else {
            showAlertAndRedirect("Sorry, there was an error uploading your file.");
        }
    } else {
        showAlertAndRedirect("Error: Form not submitted properly.");
    }

?>




