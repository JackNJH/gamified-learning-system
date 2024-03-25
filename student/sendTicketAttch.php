<?php
    require '../modules/config.php';
    if($role !='student'){
        header('Location: ../index.php');
        die;
    }
    //     $latest_ID = "SELECT TicketID FROM tickets ORDER BY TicketID DESC LIMIT 1";
    //     $target_dir = "../uploads/tickets/$latest_ID/";
    //     $target_file = $target_dir . basename($_FILES["TicketAttch"]["name"]);
    //     $sql = "UPDATE tickets SET TicketAttch = '$target_file' WHERE $latest_ID";


    
    // //just need to fix the upload to actually upload
    // if(!mysqli_query($conn,$latest_ID)) {
    //     die('Error: ' . mysqli_error($conn));
    // }

    // if(!mysqli_query($conn,$sql)) {
    //     die('Error: ' . mysqli_error($conn));
    // }
        
    // else{
    //     echo '<script>alert("Ticket Submitted!");window.location.href="FAQ.php";</script>';
    // }
    $target_dir = "../uploads/tickets/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
?>