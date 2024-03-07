<?php
    require '../modules/config.php';
    if ($role !='student'){
        header('Location: ../index.php');
        die;
    }

    include '../components/header.php'; // Header

    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student menu</Menu></title>
    <link rel="stylesheet" href="../css/searchclasses.css">
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
                    echo "<li><a href='$page'>$page</a></li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p><b>No recent pages available.</p></b>";
                }
            ?>
        </div>
    </div>

    <div class="searchbar">
        <form method="post">
            <input type="text" placeholder=" Search for classes" name="search">
    
            <button name="submit"></button>
        </form>
    </div>
    
    <div class="searchresult">

        <?php
            if(isset($_POST['submit'])){
                $search=$_POST['search'];

                $sql="SELECT * from class 
                where ClassName like '%$search%' 
                or ClassID like '%$search%'";
                $result=mysqli_query($conn,$sql);

                if($result){
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result))
                        {
        ?>
            <a href= "chapter.php" style="text-decoration:none">
                <div class="box">
                    <div class="image">
                        <img src="<?php echo $row["ClassDashboard"]; ?>" alt="img">
                    </div>
                    <div class="difficulty"><?php echo $row["ClassDiff"];?></div>
                    <div class="data">
                        <div class="className"><b><?php echo $row["ClassName"];?></div></b>
                        <div class="description"><?php echo $row["ClassDesc"];?></div>
                    </div>
                
                </div>
            </a>
            
        <?php
                        }
                    }
                }  
            }      
        ?>
    </div>
</body>
</html>

