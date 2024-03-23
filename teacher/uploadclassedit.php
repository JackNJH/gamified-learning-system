<?php
    require '../modules/config.php';

    if ($role != 'teacher') {
        header('Location: ../index.php');
        die;
    }

    // $ClassID = isset($_GET['ClassID']) ? $_GET['ClassID'] : '';

    // if ($ClassID === '') {
    //     die("Class ID not provided or invalid.");
    // }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $ClassID = $_POST['ClassID'];
        $className = $_POST['class_name'];
        $classDesc = $_POST['description'];
        $difficulty = $_POST['difficulty'];
        $privacy = $_POST['privacy'];
        $classCode = $_POST['class_code'];
        $BadgeName = $_POST['badge_name'];


        // Handle uploaded dashboard design
        $dash_dir  = "../images/";
        //checks for the files' existence and creates/removes it
        if (!file_exists($dash_dir)) {
            mkdir($dash_dir, 0777, true);
        } else {

            $files = glob($dash_dir . '*'); 
            foreach($files as $file) {
                if(is_file($file)) {
                    unlink($file); 
                }
            }
        }
        $target_file = $dash_dir . basename($_FILES["dashboard_design"]["name"]);
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


        // Handle uploaded class completion badge
        $badge_dir  = "../uploads/classes/$ClassID/";

        //checks for the files' existence and creates/removes it
        if (!file_exists($badge_dir)) {
            mkdir($badge_dir, 0777, true);
        } else {

            $files = glob($badge_dir . '*'); 
            foreach($files as $file) {
                if(is_file($file)) {
                    unlink($file); 
                }
            }
        }

        $badge_file = $badge_dir . basename($_FILES["class_badge"]["name"]);
        $uploadOk=1;
        $imageFileType = strtolower(pathinfo($badge_file, PATHINFO_EXTENSION));
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            showAlertAndRedirect("Sorry, only JPG, JPEG & PNG files are allowed.");
            exit;
        }

        // Upload the badge
        if (move_uploaded_file($_FILES["class_badge"]["tmp_name"], $badge_file)) {
            $new_badge_path = $badge_file;
        }

        //make it check if badge already exist in the database
        //if yes make it update query
        //else insert query
        $sqlbadgecheck = 
        "SELECT * FROM badges
        WHERE ClassID = '$ClassID'";

        $sqlInsertBadge = 
        "INSERT INTO badges (BadgeName, BadgeReq, BadgePic, ClassID)
        VALUES ('$BadgeName','Complete $className class','$new_badge_path','$ClassID')";

        $sqlUpdateBadge =
        "UPDATE badges SET BadgeName='$BadgeName', BadgeReq='Complete $className', BadgePic='$new_badge_path'
        WHERE ClassID='$ClassID'";

        $checkbadge = mysqli_query($conn,$sqlbadgecheck);
        
        if (mysqli_num_rows($checkbadge) == 0){
            mysqli_query($conn,$sqlInsertBadge);
        }
        else{
            mysqli_query($conn,$sqlUpdateBadge);
        }

        $sql = "UPDATE class SET ClassName='$className', ClassDesc='$classDesc', 
                ClassDashboard='$new_image_path', ClassDiff='$difficulty', 
                ClassPrivacy='$privacy', ClassCode='$classCode' 
                WHERE ClassID='$ClassID'";
        


        // $result = mysqli_query($conn, $sql);

        
            // echo "<script>alert('Successfully updated info!');window.location.href='index.php';</script></script>";
    
       
            // echo "<script>alert('Fail to update information!');</script>";
            if (!mysqli_query($conn,$sql)) {
                die('Error! '.mysqli_error($conn));
            }
            
            else {
                echo '<script>alert("Class updated!");window.location.href="viewchapter.php?ClassID='.$ClassID.'";</script>';
            }
            
    }
    include '../components/header.php'; // Header
?>