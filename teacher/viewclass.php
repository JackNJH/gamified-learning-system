<?php
include 'C:\wamp64\www\gamified-learning-system-master\components\header.php'; // Header
if ($role == ''){
    header("C:\wamp64\www\gamified-learning-system-master\components\index.php");
    die;
}

function getHeader($role) {
    switch ($role) {
        case 'admin':
            return 'Admin View Profile';
        case 'teacher':
            return 'Teacher View Profile';
        case 'student':
            return 'Student View Profile';
        default:
            return 'View Profile';
    }
}

$headerText = getHeader($role);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student menu</Menu></title>
    <link rel="stylesheet" href="../css/studentpage.css">
    <style>
        .options{
    
    margin-top: 80px;
    font-size: 20px;
    color: #ffffff;
    text-decoration: none;
    font-weight: 500;

}


.options a{
    color: #000000;
    position: relative;
    text-decoration: none;
    padding: 10px 15px;
    display: flex;
    align-items: center;
    font-family: 'Montserrat', sans-serif;
    padding: 20px;
}

.options a::after{
    content: "";
    position: absolute;
    background-color: #ffffff;
    height: 3px;
    width: 0;
    left: 0;
    bottom: -10px;
    transform: scaleX(0);
    transition: transform 0.6s;

}
.options a:hover{
    color: #000000;
}
.options a:hover:after{
    width: 100%;
    transform: scaleX(1);

}
.classes{
    width: 170px;
    height: 600px;
    border-radius: 4px;
    padding: 10px;
    margin: 10px;
    margin-top: 40px;
    font-family: 'Montserrat', sans-serif;
    font-size: 15px;
    background-color: rgb(255, 221, 158);
}
.searchbar{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 50px;
}
.searchbar input[type=text]{
    height: 40px;
    width: 500px;
    border-radius: 50px;
    font-size: 20px;
    font-family:'Montserrat', sans-serif;
}
.searchbar button {
    height: 40px;
    width: 40px;
    background-color: #3eed81b9;
    cursor: pointer;
    border-radius: 50px;
    float: right;
    margin-left: 5px;
}

.searchresult{
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 20px;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}
th {
    border: 1px solid black;
    background: rgb(12, 90, 72);
    color: #f3f3f3;
  }

th, td{
    width:365px;
    padding:8px;
    border: 1px solid ;
    text-align: center;
}

.table-result{
    border-collapse:separate;
    border-spacing:0 15px;
    margin-right: 50px;
    
}
.results{
    flex-direction: column;
}
.result-fail{
    font-size: 22px;
    color: red;

}

        </style>
</head>
<body>

    <div class="searchbar">
        <form method="post">
            <input type="text" placeholder=" Search for classes" name="search">
            <button name="submit"></button>
        </form>
    </div>
    <div class="searchresult">
        <table class="table-result">
        <?php
            if(isset($_POST['submit'])){
                $search=$_POST['search'];

                $sql="SELECT * from class 
                where ClassName like '%$search%'";
                $result=mysqli_query($conn,$sql);

                          
                if($result){
                    if(mysqli_num_rows($result)>0){
                        echo '<thead>
                        <tr>
                        <th>Class Name</th>
                        <th> Description</th>
                        <th>ID</th>
                        </tr>
                        </thead>';

                        while($row=mysqli_fetch_assoc($result)){
                        echo '<tbody>
                        <tr>
                        <td>'.$row['ClassName'].'</td>
                        <td>'.$row['ClassDesc'].'</td>
                        <td>'.$row['ClassID'].'</td>
                        </tr>
                        <tbody>';
                        }
                     }else{
                        echo "<div class='result-fail'>";
                             echo'<h2>Sorry, we can\'t find what you were looking for :(</h2>';
                        echo "</div>";
                    }
                }
            }
                        
        ?>
        </table>
    </div>
</body>
</html>

