<?php
    require '../modules/config.php';
    if ($role !='admin'){
        header('Location: ../index.php');
        die;
    }

    include '../components/header.php'; // Header

?>