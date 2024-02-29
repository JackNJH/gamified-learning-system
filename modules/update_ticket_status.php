<?php
require '../modules/config.php';

if(isset($_POST['ticketID']) && isset($_POST['status'])) {
    $ticketID = $_POST['ticketID'];
    $status = $_POST['status'];

    $update_query = "UPDATE tickets SET TicketStat = '$status' WHERE TicketID = $ticketID";

    if(mysqli_query($conn, $update_query)) {
        echo "Status updated successfully.";
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }

} else {
    echo "Error: Missing parameters.";
}
?>
