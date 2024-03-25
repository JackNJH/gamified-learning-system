<?php
    require '../modules/config.php';
    if ($role !='teacher'){
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
    <title>Student menu</title>
    <link rel="stylesheet" href="../css/teacherpage.css">
    <style>

  

  
  .jason:hover {
    background-color: darkorange;
  }
  .jason {position: absolute;
    bottom: 82%;
    right: 70%;
    padding: 0.7rem;
    background-color: orange;
    color: white;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    width: 8rem;
    justify-self: center;
    margin: 0.5rem auto;}
        </style>
</head>
<body>

<body>
    </div>
    

</div>

<div class="searchbar">
    <form method="post">
        <input type="text" placeholder=" Search for classes" name="search">

        <button name="submit">
            <img src="../images/search.png">
        </button>
    </form>
</div>

<div class="searchresult">
    <?php
        if(isset($_POST['submit'])){
            $search=$_POST['search'];

            $sql= "SELECT * from class 
            where (ClassName like '%$search%' 
            or ClassID like '%$search%')
            AND TeacherID = '$teacher_id'";
            $result=mysqli_query($conn,$sql);

            if($result){
                if(mysqli_num_rows($result)>0){

                    while($row=mysqli_fetch_assoc($result))
                    {
                       
                        
    ?>
        <form action="class.php" method="get">
            
                <?php echo "<a class='classlink' href='../teacher/viewchapter.php?ClassID={$row['ClassID']}'>";?>
                    <div class="box">
                        <div class="image">
                            <img src="<?php echo $row['ClassDashboard']; ?>" alt="img">
                        </div>
                        <div class="difficulty"><?php echo $row['ClassDiff'];?></div>
                        <div class="data">
                            <br>
                            <div class="className"><b><?php echo $row['ClassName'];?></div></b>
                            <div class="description"><?php echo $row['ClassDesc'];?></div>                                
                        </div>    
                    </div>    
                <?php "</a>";?>
           
        </form>
        
    <?php
                    }
                }
            }  
        }      
    ?>
    <form class = jason>
        <a href="../teacher/createclass.php" class="selection">
        Create Class
        </a>
    </form>
</div> 
</body>
</html>

