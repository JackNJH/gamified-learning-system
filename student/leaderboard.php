<?php
    require '../modules/config.php';
    if ($role !='student'){
        header('Location: ../index.php');
        die;
    }

    include '../components/header.php'; // Header

    $sql = "SELECT * FROM class WHERE ClassID=('2')";
    
    $result=mysqli_query($conn,$sql);

?>

<?php


$currentPage = $_SERVER['REQUEST_URI'];

if (!isset($_SESSION['recent_pages'])) {
    $_SESSION['recent_pages'] = array();
}

// Add the current page to the history
array_unshift($_SESSION['recent_pages'], $currentPage);

// Limit the number of stored pages (optional)
$maxPages = 5;
$_SESSION['recent_pages'] = array_slice($_SESSION['recent_pages'], 0, $maxPages);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/leaderboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <title>Leaderboard</title>

</head>
<body>
    <div class="navi-bar">
        <div class="options">
            <a href="index.php"><b>Student menu</a></b>
        </div>
        <div class="classes">
            <?php
                if (isset($_SESSION['recent_pages'])) {
                    echo "<h3>Recently Visited Pages:</h3>";
                    echo "<ul>";
                    foreach ($_SESSION['recent_pages'] as $page) {
                    echo "<li><a href='$page'>Class</a></li>";
                    }
                    echo "</ul>";
                 } else {
                    echo "<p>No recent pages available.</p>";
                }
            ?>
        </div>
    </div>

    <div class="main">
        <?php
            while($row = mysqli_fetch_assoc($result)){
        ?>
        <div class="content">
            
            <div class="design">
                <img src="<?php echo $row["ClassDashboard"]; ?>" alt="background">
                <div class="title">
                    <h2><?php echo $row["ClassName"];?></h2>
                    <p><?php echo $row["ClassDesc"];?></p>
                    
                </div>
            </div>

            
            <div class="chapters">
            <table id="leaderboard-table">
                <tr>
                    <td>1.</td>
                    <td>user PFP</td>
                    <td>user name</td>
                    <td>badges</td>
                    <td>points</td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>pic</td>
                    <td>Student123</td>
                    <td>badges</td>
                    <td>55</td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>user PFP</td>
                    <td>user name</td>
                    <td>badges</td>
                    <td>points</td>
                </tr>
                <tr>
                    <td>Position</td>
                    <td>user PFP</td>
                    <td>user name</td>
                    <td>badges</td>
                    <td>points</td>
                </tr>
                <tr>
                    <td>Position</td>
                    <td>user PFP</td>
                    <td>user name</td>
                    <td>badges</td>
                    <td>points</td>
                </tr>
                <tr>
                    <td>Position</td>
                    <td>user PFP</td>
                    <td>user name</td>
                    <td>badges</td>
                    <td>points</td>
                </tr>       
            </table> 
            </div>
    
        </div>
        <div class="badge">
        </div>
        <?php
                }
            ?>
        <div>
            <a href="chapter.php" class="Chapter-button">Chapter Details</a>
        </div>
        
    </div>
</body>
</html>