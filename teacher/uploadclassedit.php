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
        $ClassID = $_POST ['ClassID'];
        $className = $_POST['class_name'];
        $classDesc = $_POST['description'];
        $difficulty = $_POST['difficulty'];
        $privacy = $_POST['privacy'];
        $classCode = $_POST['class_code'];

        // Handle uploaded dashboard design
        // $dashboardDesign = $_FILES['dashboard_design']['name'];
        // $dashboardDesignTmpName = $_FILES['dashboard_design']['tmp_name'];
        // $dashboardDesignPath = '../uploads/dashboard_design/' . $dashboardDesign;
        // move_uploaded_file($dashboardDesignTmpName, $dashboardDesignPath);

        // Handle uploaded class completion badge
        // $classBadge = $_FILES['class_badge']['name'];
        // $classBadgeTmpName = $_FILES['class_badge']['tmp_name'];
        // $classBadgePath = '../uploads/class_badge/' . $classBadge;
        // move_uploaded_file($classBadgeTmpName, $classBadgePath);

        $sql = "UPDATE class SET ClassName='$className', ClassDesc='$classDesc', 
                ClassDashboard='$dashboardDesignPath', ClassDiff='$difficulty', 
                ClassPrivacy='$privacy', ClassCode='$classCode' 
                WHERE ClassID='$ClassID'";

        // $result = mysqli_query($conn, $sql);

        
            // echo "<script>alert('Successfully updated info!');window.location.href='index.php';</script></script>";
    
       
            // echo "<script>alert('Fail to update information!');</script>";
            if (!mysqli_query($conn,$sql)) {
                die('Error! '.mysqli_error($conn));
            }
            
            else {
                echo '<script>alert("Record added!");window.location.href="index.php";</script>';
            }
            
    }
    include '../components/header.php'; // Header
?>