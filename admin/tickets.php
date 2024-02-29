<?php
    require '../modules/config.php';
    if ($role != 'admin'){
        header('Location: ../index.php');
        die;
    }

    include '../components/header.php'; // Header

    $query = "SELECT t.TicketCtgy AS Category,
                CONCAT(u.UserName) AS StudentName,
                t.TicketDate, t.TicketID,
                t.TicketStat AS Status
            FROM tickets t
            JOIN student s ON t.StudentID = s.StudentID
            JOIN user u ON s.UserID = u.UserID";
    $result = mysqli_query($conn, $query);

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
    }

    .section-container {
        width: 70%;
        height: 100%;
        display: flex;
        border-radius: 2vw;
        background-color: bisque;
        flex-direction: column;
    }

    .filter-container {
        display: flex;
        justify-content: flex-end; 
        margin-top: 2vw;
        margin-right: 2vw;
    }

    .table-container {
        display: flex;
        width: 100%;
        height: 100%;
        flex-direction: column;
        font-family: 'Montserrat', sans-serif;
        padding-top: 1vw;
        padding-right: 2vw;
        padding-bottom: 2vw;
        padding-left: 2vw;
        box-sizing: border-box;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 1vw;
        text-align: left;
        font-size: 0.9vw;
    }

    .ticket-id { width: 12%; }
    .category { width: 33%; }
    .student-name { width: 20%; }
    .ticket-date { width: 20%; }
    .status { width: 15%; }

    th {
        background-color: #ffdead; 
        border-bottom: 2px solid black;
        font-size: 1vw;
    }

    #status-filter {
        padding: 0.2vw;
        font-size: 0.9vw;
        font-family: 'Poppins', sans-serif;
    }

    .ticket-link {
        color: chocolate; 
        text-decoration: underline; 
        cursor: pointer; 
    }

    .ticket-link:hover {
        color: orange; 
        font-weight: bold;
    }
</style>
</head>
<body>
<h2>View Tickets</h2>

<div class="page-container">
    <div class="section-container">

        <!-- Filter -->
        <div class="filter-container">
            <select id="status-filter">
                <option value="">Filter</option>
                <option value="open">Open</option>
                <option value="closed">Closed</option>
            </select>
        </div>

        <!-- Table -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th class="ticket-id">Ticket ID</th>
                        <th class="category">Category</th>
                        <th class="student-name">Student Name</th>
                        <th class="ticket-date">Ticket Date</th>
                        <th class="status">Status</th>
                    </tr>
                </thead>
                <tbody id="ticket-table-body" style="height: 5vh; overflow-y: auto;">
                    <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td><a href='ticketsReply.php?ticketID=".$row['TicketID']."' class='ticket-link'>".$row['TicketID']."</a></td>";
                            echo "<td>".$row['Category']."</td>";
                            echo "<td>".$row['StudentName']."</td>";
                            echo "<td>".$row['TicketDate']."</td>";
                            echo "<td>".$row['Status']."</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.getElementById('status-filter').addEventListener('change', function() {
        var status = this.value;
        var rows = document.getElementById('ticket-table-body').getElementsByTagName('tr');
        for (var i = 0; i < rows.length; i++) {
            var row = rows[i];
            var statusCell = row.getElementsByTagName('td')[4];
            var cellText = statusCell.textContent || statusCell.innerText;
            if (status === '' || cellText.trim() === status) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    });
</script>


</body>
</html>