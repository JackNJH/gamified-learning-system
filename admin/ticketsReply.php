<?php
    require '../modules/config.php';
    if ($role != 'admin'){
        header('Location: ../index.php');
        die;
    }

    include '../components/header.php'; // Header

    if(isset($_GET['ticketID'])) {
        $ticketID = $_GET['ticketID'];

        $query = "SELECT TicketCtgy, TicketDesc, TicketAttch, TicketStat FROM tickets WHERE TicketID = $ticketID";
        $result = mysqli_query($conn, $query);
        $ticketDetails = mysqli_fetch_assoc($result);

    } else {
        header('Location: tickets.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/h2_title.css">
<title>Tickets</title>
<style>
    .page-container {
        display: flex;
        justify-content: center;
        height: 75vh;
        font-family: 'Montserrat', sans-serif;
    }

    .section-container {
        width: 70%;
        height: 100%;
        display: flex;
        border-radius: 2vw;
        background-color: bisque;
        flex-direction: column;
    }

    .ticket-title {
        padding: 1vw;
        margin: 2vw;
        margin-bottom: 1vw;
        background-color: #F0F0F0; 
        display: inline-block;
        width: fit-content;
    }

    .ticket-title h3 {
        margin: 0; 
        color: black;
        font-size: 1vw;
    }

    .ticket-description {
        padding: 1vw;
        padding-top: 0;
        padding-bottom: 0;
        margin: 2vw;
        margin-top: 0;
        background-color: #F0F0F0;
        height: 50%; 
        overflow: auto;
        line-height: 1.7;
    }

    .ticket-description-text{
        font-size: 0.9vw;
    }

    .horizontal-line {
        border-top: 1px solid black;

    }

    .admin-reply-label {
        margin-left: 2vw;
        font-weight: bold;
        font-size: 0.8vw;
    }

    .reply-container {
        display: flex;
        flex-direction: row;
        height: 30%;
    }

    .admin-reply {
        padding: 1vw;
        margin: 2vw;
        margin-top: 0;
        margin-right: 1vw;
        background-color: #F0F0F0;
        line-height: 1.7;
        width: 70%;
    }

    .admin-reply[contenteditable="true"] {
        overflow: auto; 
    }

    .send-button {
        background-color: orange;
        margin: 2vw;
        margin-left: 0;
        color: black;
        border: none;
        border-radius: 1vw;
        cursor: pointer;
        font-family: 'Poppins', sans-serif;
        transition: background-color 0.3s;
        font-size: 0.8vw;
        width: 4vw;
        height: 2vw;
        align-self: flex-end;
    }

    .send-button:hover {
        background-color: darkorange;
        font-weight: bold;
        color: white;
    }

    .status-container {
        display: flex;
        flex-direction: column;
        justify-content: flex-start; 
        align-items: flex-start; 
    }

    .status-label {
        font-size: 1vw;
        color: black;
        font-weight: bold;
        align-self: center;
        margin-bottom: 0.4vw;
    }

    .status-dropdown {
        font-size: 1vw;
        border: 1px solid #ccc;
        border-radius: 0.5vw;
        padding: 0.3vw 0.5vw;
        background-color: white;
        color: black;
        cursor: pointer;
    }

    .status-dropdown:hover {
        background-color: #f9f9f9;
    }

    .status-dropdown option[value="open"] {
        background-color: lightgreen;
    }

    .status-dropdown option[value="closed"] {
        background-color: lightcoral;
    }

    .status-dropdown option[value="pending"] {
        background-color: lightgoldenrodyellow;
    }


</style>
</head>

<body>
<h2>Reply Tickets</h2>

<div class="page-container">
    <div class="section-container">
        <div class="ticket-title">
            <h3><?php echo $ticketDetails['TicketCtgy']; ?></h3>
        </div>
        <div class="ticket-description">
            <p class="ticket-description-text"><?php echo $ticketDetails['TicketDesc']; ?></p>
            <?php if(!empty($ticketDetails['TicketAttch'])): ?>
                <img src="<?php echo $ticketDetails['TicketAttch']; ?>" alt="Ticket Attachment"><br>
                <a href="<?php echo $ticketDetails['TicketAttch']; ?>" download>Download Attachment</a><br>
            <?php endif; ?>
        </div>
        <div class="horizontal-line"></div>
        <p class="admin-reply-label">Admin's Reply:</p>
        <div class="reply-container">
            <div class="admin-reply" contenteditable="true"></div>
            <button class="send-button" onclick="sendReply()">Send</button>
            <div class="status-container">
                <label for="status-dropdown" class="status-label">Status: </label>
                <select id="status-dropdown" class="status-dropdown" onchange="updateStatus()">
                    <?php
                    $statuses = array("open", "closed", "pending");
                    foreach ($statuses as $status) {
                        $selected = ($ticketDetails['TicketStat'] == $status) ? "selected" : "";
                        echo "<option value=\"$status\" $selected>$status</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
</div>


<script>
    function sendReply() {
        var replyContent = document.querySelector('.admin-reply').innerText.trim();
        if (replyContent !== '') {
            var confirmation = confirm("Are you sure you want to send this reply?");
            if (confirmation) {
                alert("Reply sent to user's email!");
                document.querySelector('.admin-reply').innerText = '';
            }
        } else {
            alert("Please enter a reply before sending.");
        }
    }

    function updateStatus() {
        var status = document.getElementById('status-dropdown').value;
        var ticketID = <?php echo $ticketID; ?>;
        
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText); 
            }
        };
        xhr.open("POST", "../modules/update_ticket_status.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("ticketID=" + ticketID + "&status=" + status);
    }
</script>

</body>
</html>