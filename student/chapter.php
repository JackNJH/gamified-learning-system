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
    <title>Class </title>
    <link rel="stylesheet" href="../css/chapter.css">
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
                <div class="completion">Completion</div>
                <div class="progress">
                    <div class="progressfill"></div>
                    <span class="progresstext">50%</span>
                </div>

                <div class="ChapSelect">
                    <div class="selection"><a href="levels.php">Chapter 1</div></a>
                    <div class="selection">Chapter 2</div>
                    <div class="selection">Chapter 3</div>
                    <div class="selection">Chapter 4</div>
                </div>
            </div>
    
        </div>
        <div class="badge">
        </div>
        <?php
                }
            ?>
        <div class="leaderboard">Class Leaderboard</div>
        
    </div>
</body>
</html>