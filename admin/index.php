<?php
    require '../modules/config.php';
    if ($role != 'admin'){
        header('Location: ../index.php');
        die;
    }

    include '../components/header.php'; // Header

    $classQuery = "SELECT COUNT(ClassID) AS TotalClasses FROM class";
    $classResult = mysqli_query($conn, $classQuery);
    $totalClasses = mysqli_fetch_assoc($classResult)['TotalClasses'];

    $userQuery = "SELECT COUNT(UserID) AS TotalUsers FROM user";
    $userResult = mysqli_query($conn, $userQuery);
    $totalUsers = mysqli_fetch_assoc($userResult)['TotalUsers'];

    $classQuery = "SELECT ClassName FROM class ORDER BY ClassCreateDate DESC"; 
    $classResult = mysqli_query($conn, $classQuery);
    
    $registrationQuery = "SELECT UserName, UserType, UserCreateDate FROM user ORDER BY UserCreateDate DESC";
    $registrationResult = mysqli_query($conn, $registrationQuery);

    $latest_ticket_query = "SELECT * FROM tickets ORDER BY TicketID DESC LIMIT 1";
    $latest_ticket_result = mysqli_query($conn, $latest_ticket_query);
    $latest_ticket = mysqli_fetch_assoc($latest_ticket_result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/h2_title.css">
<title>Admin Home Page</title>
<style>
    
    .page-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 70vh;
    }

    .section-container {
        width: 60%;
        height: 100%;
        display: flex;
        position: relative;
    }

    .section {
        padding: 1vw;
        position: absolute;
    }


    .section h3, th {
        margin: 0;
        font-family: 'Montserrat', sans-serif;
        font-size: 1.3vw;
    }

    .manage-users {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        width: 18vw;
        height: 28vh;
        background-color: bisque;
        top: 0;
        left: 0;
    }

    .manage-classes {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        width: 18vw;
        height: 28vh;
        background-color: #ffe4c4;
        bottom: 0;
        left: 0;
    }

    .new-tickets {
        display: flex;
        flex-direction: column;
        width: 36vw;
        height: 18vh;
        background-color: #ffdab9;
        bottom: 0;
        right: 0;
    }

    .ticket-info {
        display: flex;
        flex-direction: column;
        margin-top: 0.3vw;
        height: 100%;
        overflow: auto;
    }

    .ticket-info p {
        margin: 0;
        padding: 0.3vw;
        font-family: 'Montserrat', sans-serif;
    }

    .recent-activities {
        display: flex;
        width: 36vw;
        height: 40vh;
        background-color: #ffdead; 
        top: 0;
        right: 0;
    }

    .stat {
        font-size: 1vw;
        margin: 1vw;
        font-family: 'Montserrat', sans-serif;
    }

    .continue-button {
        padding: 0.5vw 1vw;
        background-color: orange;
        color: black;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        font-family: 'Poppins', sans-serif;
        transition: background-color 0.3s;
    }

    .continue-button:hover {
        background-color: chocolate;
        font-weight: bold;
        color: white;
    }

    .table-container {
        display: flex;
        height: 100%;
        width: 100%;
        flex-direction: column;
    }

    table {
        width: 100%;
    }

    th, td {
        padding: 0.5vw;
        text-align: center;
        width: 50%;
    }

    td {
        font-size: 1vw;
        font-family: 'Montserrat', sans-serif;
        height: 2.5vw;
    }

    th {
        border-bottom: 2px solid black;
    }

</style>
</head>
<body>
<h2>Admin Home Page</h2>

<div class="page-container">
    <div class="section-container">

        <div class="section manage-users">
            <h3>Manage Users</h3>
            <div class="stat">Total Users: <?php echo $totalUsers; ?></div>
            <a href="search.php"><button class="continue-button">Continue</button></a>
        </div>

        <div class="section manage-classes">
            <h3>Manage Classes</h3>
            <div class="stat">Total Classes: <?php echo $totalClasses; ?></div>
            <a href="search.php"><button class="continue-button">Continue</button></a>
        </div>

        <div class="section new-tickets">
            <h3>New Tickets</h3>
            <div class="ticket-info">
                <?php
                if ($latest_ticket) {
                    echo "<p><strong>Ticket ID:</strong> {$latest_ticket['TicketID']}&nbsp;&nbsp;&nbsp;&nbsp;<strong>Category:</strong> {$latest_ticket['TicketCtgy']}</p>";
                    echo "<p><strong>Description:</strong> {$latest_ticket['TicketDesc']}</p>";
                } else {
                    echo "<p>No tickets found.</p>";
                }
                ?>
            </div>
        </div>

        <div class="section recent-activities bisque-darkest">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Recent Classes</th>
                            <th>Recent Registrations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Populate recent classes
                        while ($classRow = mysqli_fetch_assoc($classResult)) {
                            echo "<tr><td>" . $classRow['ClassName'] . "</td>";
                            
                            $registrationRow = mysqli_fetch_assoc($registrationResult);
                            if ($registrationRow) {
                                echo "<td>" . $registrationRow['UserName'] . " - " . $registrationRow['UserType'] . "</td></tr>";
                            } else {
                                echo "<td></td></tr>";
                            }
                        }
                        ?>

                        <?php
                        while ($registrationRow = mysqli_fetch_assoc($registrationResult)) {
                            echo "<tr><td></td><td>" . $registrationRow['UserName'] . " - " . $registrationRow['UserType'] . "</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


</body>
</html>
