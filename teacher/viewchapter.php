<?php
    require '../modules/config.php';
    if ($role !='teacher'){
        header('Location: ../index.php');
        die;
    }

    include '../components/header.php'; // Header
    
    $data = isset($_GET['ClassID']) ? $_GET['ClassID'] : '';

    if ($data === '') {
        // Handle case when user_id is not provided or invalid
        die("User ID not provided or invalid.");
    }

    $sql1 = "SELECT * FROM class WHERE ClassID= '$data'";
    $result1 = mysqli_query($conn,$sql1);

    $sql2 = "SELECT BadgePic FROM badges WHERE ClassID= '$data'";
    $result2 = mysqli_query($conn,$sql2);

    $sql3 = "SELECT * FROM chapter WHERE ClassID= '$data'";
    $result3 = mysqli_query($conn,$sql3);


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
    <link rel="stylesheet" href="../css/teacherchapter.css">
</head>
<body>
   
        <div class="options">

        </div>
        
        <?php
            while($row = mysqli_fetch_assoc($result1)){
        ?>

   

    <div class="main">
        
        <div class="content">
            
            <div class="design">
                <img src="<?php echo $row["ClassDashboard"]; ?>" alt="background">
                    <div class="title">
                        <h2><?php echo $row["ClassName"];?></h2>
                        <p><?php echo $row["ClassDesc"];?></p>
                    </div>
            </div>

        <?php
            } 
        ?> 
          
            <div class="chapters">
                 <?php
                    while($row = mysqli_fetch_assoc($result3)){
                 ?> 
                    <div class="ChapSelect">
                        <?php echo "<a class='classlink' href='../teacher/levels?chapter_id={$row['ChapterID']}'>";?>
                            <div class="selection">
                                <div class="ChapTitle"><b><?php echo $row['ChapterName'];?></div></b>
                            </div>
                        <?php echo "</a>";?>
                    </div>
                <?php
                    } 
                ?>     
                </div>  
            </div>
        <?php
            while($row = mysqli_fetch_assoc($result2)){
        ?>
        <div class="badge">
            <img src="<?php echo $row["BadgePic"]; ?>" alt="badge">
        </div>
        <?php
            } 
        ?>
                <form class= class-form>
            <div>
            <button type="editclass">Edit Class</button>
            <button type="reviewstudent">Review Student</button>
            <button type="addchapter">Add Chapter</button>
            <button type="deleteclass">Delete Class</button>
            </div>
            </form>
        
    </div>
</body>
</html>