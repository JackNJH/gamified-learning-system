<?php
    require '../modules/config.php';
    if ($role !='student'){
        header('Location: ../index.php');
        die;
    }

    include '../components/header.php'; // Header
// all header included are in the components folder
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/StudentHome.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <title>Ticket Attachment Submission</title>
</head>
<body>
    <div class="page-title">
        <h1>TICKET ATTACHMENT SUBMISSION</h1>
    </div>
    <!-- start creating the form -->
    <div class="ticket-form-container">
        <div class="ticket-form">
            <!-- <form method="post" action="sendTicketAttch.php">
                <label class="ticket-form-text">Attach Files</label>
                <br>
                <input type="file" name="TicketAttch" id="TicketAttch">
                <br><br>
                 figure out upload thing, refer to jacc's pfp part
                <br>
                <button type="submit" class="ticket-form-button" value="Submit">Send</button>
            </form> -->
            <form action="sendTicketAttch.php" method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
            </form>
        </div>
    </div>
</body>
</html>