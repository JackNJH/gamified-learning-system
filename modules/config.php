<?php
    echo '<link rel="shortcut icon" type="image/png" href="../images/tabicon.png">'; // Put tab icon
    
    // Connection to Database
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "loodle";
    $conn = mysqli_connect($host, $user, $password, $database);
    if (mysqli_connect_errno()) {
        die;
    }
    
    if (session_status() === PHP_SESSION_NONE){
        session_start();
    }

    $web_name = "Gamified E-System";

    $role = '';
    
    // Check if user is logged in
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $username = $_SESSION['username'];
        $role=$_SESSION['role']; 
    }else{
        $role='';
    }

?>
