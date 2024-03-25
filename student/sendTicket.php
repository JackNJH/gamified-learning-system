<?php
    require '../modules/config.php';
    if($role !='student'){
        header('Location: ../index.php');
        die;
    }

        $date = date('Y-m-d');
        //$target_dir = "../uploads/tickets/";
        //$target_file = $target_dir . basename($_FILES["TicketAttch"]["name"]);
        $sql = "INSERT INTO tickets (StudentID, TicketCtgy, TicketDesc, TicketStat, TicketDate)

        VALUES ('$student_id','$_POST[TicketCtgy]','$_POST[TicketDesc]','pending', '$date')";


    if(empty($_POST['TicketCtgy']) || empty($_POST['TicketDesc'])){
        echo '<script>alert("Empty Ticket wont be submitted");window.location.href="Ticket.php";</script>';
    }

    //just need to fix the upload to actually upload
    else if(!mysqli_query($conn,$sql)) {
        die('Error: ' . mysqli_error($conn));
    }
        
    else{
        echo '<script>alert("Ticket Submitted!");window.location.href="FAQ.php";</script>';
    }

?>