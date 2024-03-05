<?php
    require '../modules/config.php';
    if ($role != 'admin'){
        header('Location: ../index.php');
        die;
    }

    include '../components/header.php'; // Header

    $userQuery = "SELECT UserID, UserName, UserType, UserPFP, UserCreateDate FROM user WHERE UserType != 'admin'";
    $userResult = mysqli_query($conn, $userQuery);
    

    $classQuery = "SELECT c.ClassID, c.ClassName, c.ClassDiff, c.ClassDashboard, c.ClassCreateDate, t.TeacherID, u.UserID, u.UserName
                        FROM class c
                        JOIN teacher t ON c.TeacherID = t.TeacherID
                        JOIN user u ON t.UserID = u.UserID";
    $classResult = mysqli_query($conn, $classQuery);

?>

<!DOCTYPE html>
<html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/h2_title.css">
<title>Search</title>
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
            transition: background-color 0.3s, color 0.3s, font-size 0.3s;
        }

        .menu button.active {
            background-color: bisque;
            color: black;
            font-family: 'Poppins', sans-serif;
            font-size: 1vw; 
        }

        .menu button:hover { 
            background-color: #ffdead; 
            font-size: 1.1vw;
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
            border-radius: 1vw;
            padding-left: 1vw;
        }

        .table-container { 
            padding: 1vw;
            padding-left: 3vw;
            padding-right: 3vw;
            overflow-y: auto;
            max-height: 50vh;
        }

        table {
            width: 100%; 
            font-family: 'Montserrat', sans-serif;
            white-space: nowrap;
            table-layout: fixed;
            border-spacing: 0 1vw;
        }

        td {
            display: table-cell;
            text-align: left;
            border: 1px solid black;
        }

        td.profile-pic,
        td.class-pic {
            width: 12%; 
            height: 7vw;
        }

        td.user-data,
        td.class-data {
            width: 70%; 
        }

        tr {
            background-color: #f9f9f9; 
        }

        .profile-pic,
        .class-pic {
            text-align: center;
            overflow: hidden;
        }

        .profile-pic img,
        .class-pic img {
            width: 100%; 
            height: 100%;
            object-fit: cover;
        }

        .user-data,
        .class-data {
            font-size: 1vw; 
        }

        .user-data span,
        .class-data span {
            display: block; 
            padding-left: 0.8vw;
        }

        .username-label,
        .class-name-label {
            font-size: 1.2vw; 
            font-weight: bold;
        }

        .other-data,
        .other-class-data {
            font-size: 0.8vw;
        }

        .user-type,
        .class-difficulty {
            text-align: center; 
            font-size: 1vw;
            font-weight: bold;
        }

        .user-type.student {
            color: blue; 
        }

        .user-type.teacher {
            color: green; 
        }

        .class-difficulty {
            font-weight: bold;
        }

        .class-difficulty.easy {
            color: limegreen;
        }

        .class-difficulty.medium {
            color: mediumblue;
        }

        .class-difficulty.hard {
            color: red;
        }

    </style>
</head>
<body>
<h2>Search</h2>
<div class="page-container">
    <div class="section-container">
        <div class="menu">
            <button id="user-btn" class="<?php echo ($_GET['type'] == 'user' || !isset($_GET['type'])) ? 'active' : ''; ?>" onclick="showContent('user')">Users</button>
            <button id="class-btn" class="<?php echo ($_GET['type'] == 'class') ? 'active' : ''; ?>" onclick="showContent('class')">Classes</button>
        </div>

        <!-- User Content -->
        <div class="content <?php echo ($_GET['type'] == 'user' ? 'active' : ''); ?>" id="user-content">
            <div class="search-container">
                <input type="text" class="user-content-search-input" id="user-content-search-input" placeholder="Search users..." onkeyup="searchFunction('user')" autofocus>
            </div><br>
            <div class="table-container">
                <table>
                    <tbody>
                        <?php
                            while ($row = mysqli_fetch_assoc($userResult)) {
                                echo "<tr>";
                                echo "<td class='profile-pic'><img src='" . (!empty($row['UserPFP']) ? $row['UserPFP'] : '../images/guestPFP.png') . "' alt='Profile Picture'></td>";
                                echo "<td class='user-data'>";
                                echo "<span class='username-label'>{$row['UserName']}</span><br>"; 
                                echo "<span class='other-data'><b>ID:</b> {$row['UserID']}<br>"; 
                                echo "<b>Created Date:</b> {$row['UserCreateDate']}<br></span>"; 
                                echo "</td>";
                                echo "<td class='user-type " . ($row['UserType'] == 'student' ? 'student' : 'teacher') . "'>{$row['UserType']}</td>";
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
        </div><br>
        <div class="table-container">
            <table>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($classResult)) {
                        echo "<tr>";
                        echo "<td class='class-pic'><img src='" . (!empty($row['ClassDashboard']) ? $row['ClassDashboard'] : '../images/emptyImage.png') . "' alt='Class Picture'></td>";
                        echo "<td class='class-data'>";
                        echo "<span class='class-name-label'>{$row['ClassName']}</span><br>";
                        echo "<span class='other-class-data'><b>ID:</b> {$row['ClassID']}<br>";
                        echo "<b>Created By:</b> {$row['UserName']}<br>";
                        echo "<b>Created Date:</b> {$row['ClassCreateDate']}<br></span>";
                        echo "</td>";
                        echo "<td class='class-difficulty " . strtolower($row['ClassDiff']) . "'>{$row['ClassDiff']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
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
            history.pushState(null, null, '?type=user'); 
        } else if (contentType === 'class') {
            document.getElementById('user-content').classList.remove('active');
            document.getElementById('class-content').classList.add('active');
            document.getElementById('user-btn').classList.remove('active');
            document.getElementById('class-btn').classList.add('active');
            history.pushState(null, null, '?type=class'); 
        }
    }
</script>
<script src="../js/search.js"></script>
</body>
</html>
