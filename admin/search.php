<?php
    require '../modules/config.php';
    if ($role != 'admin'){
        header('Location: ../index.php');
        die;
    }

    include '../components/header.php'; // Header

    $userQuery = "SELECT UserID, UserName, UserType, UserBio, UserPFP, UserCreateDate FROM user WHERE UserType != 'admin'";
    $userResult = mysqli_query($conn, $userQuery);
    

    $productQuery = "SELECT c.ClassID, c.ClassName, c.ClassDesc, c.ClassDiff, c.ClassMaxPoints, c.ClassCreateDate, t.TeacherID, u.UserID, u.UserName
                        FROM class c
                        JOIN teacher t ON c.TeacherID = t.TeacherID
                        JOIN user u ON t.UserID = u.UserID";
    $productResult = mysqli_query($conn, $productQuery);

?>

<!DOCTYPE html>
<html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/h2_title.css">
<head>
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

        .menu {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
            
        }

        .menu button {
            flex: 1;
            padding: 0.5vw 0;
            margin: 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1vw; 
            
        }

        .menu button.active {
            background-color: bisque;
            color: black;
            font-family: 'Poppins', sans-serif;
            font-size: 1vw; 
            
        }

        .content {
            display: none;
        }

        .content.active {
            display: block;
        }

        div.search-container{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        input.user-content-search-input, input.class-content-search-input{
            width: 20vw;
            font-size: 0.8vw;
            height: 2vw;
            min-height: 2vw;
            font-family: 'Poppins', sans-serif;
        }
        .search-button{
            cursor: pointer;
            height: 2vw;
            min-width: 2vw;
            width: fit-content;
            font-size: 1vw;
        }
    </style>
</head>
<body>
    <h2>Search</h2>
    <div class="page-container">
        <div class="section-container">
            <div class="menu">
                <button id="user-btn" class="active" onclick="showContent('user')">Users</button>
                <button id="class-btn" onclick="showContent('class')">Classes</button>
            </div>

            <!-- User Content -->
            <div class="content <?php echo ($_GET['type'] == 'user' ? 'active' : ''); ?>" id="user-content">
                <div class="search-container">
                    <input type="text" class="user-content-search-input" id="user-content-search-input" placeholder="Search users..." onkeyup="searchFunction('user')" autofocus>
                    <button class="search-button" >🔍</button>
                </div><br>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>User Name</th>
                                <th>User Type</th>
                                <th>User Bio</th>
                                <th>User Profile Picture</th>
                                <th>Creation Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while ($row = mysqli_fetch_assoc($userResult)) {
                                    echo "<tr>";
                                    echo "<td>{$row['UserID']}</td>";
                                    echo "<td>{$row['UserName']}</td>";
                                    echo "<td>{$row['UserType']}</td>";
                                    echo "<td>{$row['UserBio']}</td>";
                                    echo "<td><img src='{$row['UserPFP']}' alt='Profile Picture' width='100'></td>";
                                    echo "<td>{$row['UserCreateDate']}</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>


            <!-- Class Content -->
            <div class="content <?php echo ($_GET['type'] == 'class' ? 'active' : ''); ?>" id="class-content">
                <div class="search-container">
                    <input type="text" class="class-content-search-input" id="class-content-search-input" placeholder="Search classes..." onkeyup="searchFunction('class')" autofocus>
                    <button class="search-button" >🔍</button>
                </div><br>
            </div>
        </div>
    </div>

    <script>
        function showContent(contentType) {
            if (contentType === 'user') {
                document.getElementById('user-content').classList.add('active');
                document.getElementById('class-content').classList.remove('active');
                document.getElementById('user-btn').classList.add('active');
                document.getElementById('class-btn').classList.remove('active');
            } else if (contentType === 'class') {
                document.getElementById('user-content').classList.remove('active');
                document.getElementById('class-content').classList.add('active');
                document.getElementById('user-btn').classList.remove('active');
                document.getElementById('class-btn').classList.add('active');
            }
        }
    </script>
</body>
</html>
