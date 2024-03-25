<?php 
    require '../modules/config.php';

    //Get image path from database
    function getUserProfilePicture($conn, $user_id) {
        
        $query = "SELECT UserPFP FROM user WHERE UserID = '$user_id'";
        $result = mysqli_query($conn, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['UserPFP'];
        }
        return null; 
    }

    //See if user is guest
    if ($role) {
        $userProfilePicture = getUserProfilePicture($conn, $user_id);
    } else {
        $username = 'GUEST';
        $userProfilePicture = '../images/guestPFP.png';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0; 
            padding: 0; 
        }

        header {
            background-color: orange;
            color: black;
            padding: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            top: 0; 
            font-family: 'Montserrat', sans-serif;
        }

        .logo {
            margin-left: 20px; 
        }

        .logo img {
            max-width: 80px; 
            height: auto; 
        }

        .user-info {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

        .user-profile {
            width: 50px; 
            height: 50px; 
            border-radius: 50%; 
            background-color: #fff;
            overflow: hidden;
            margin-right: 10px;
        }

        .user-profile img {
            width: 100%;
            height: 100%;
            object-fit: cover; 
            object-position: center; 
        }


        .username {
            margin-left: 10px;
            font-weight: bold;
            cursor: pointer;
            position: relative;
            margin-right: 15px;
        }

        .username:hover {
            color: white;
            font-weight: bold;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            right: 0;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            display: flex; 
            align-items: center; 
        }

        .dropdown-content a img {
            margin-right: 10px; 
            width: 20px;
            height: auto;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .username:hover .dropdown-content {
            display: block;
        }

        .buttons {
            display: flex;
            margin: 0 auto; 
            align-items: center; 
        }

        .button {
            padding: 10px 20px;
            margin: 0 20px;
            background-color: bisque;
            color: black;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            font-family: 'Poppins', sans-serif; 
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: chocolate;
            font-weight: bold;
            color: white;
        }
    </style>
</head>
<body>

<header>
    <div class="logo">
        <a href="../index.php"><img src="../images/logo.png" alt="Logo"></a>
    </div>
    <div class="buttons">
        <?php if ($role): ?>
            <?php if ($role === 'admin'): ?>
                <a href="../admin/tickets.php" class="button">Tickets</a>
                <a href="../admin/search.php?type=user" class="button">Search</a>
            <?php elseif ($role === 'teacher'): ?>
                <a href="../teacher/myclasses.php" class="button">My Classes</a>
            <?php elseif ($role === 'student'): ?>
                <a href="../student/searchclasses.php" class="button">Search Classes</a>
                <a href="../student/FAQ.php" class="button">Help Me</a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="user-info">
        <div class="username"><?php echo $username; ?>
            <?php if ($role): ?>
                <div class="dropdown-content">
                    <a href="../public/profile.php"><img src="../images/profileicon.png" alt="Profile">Profile</a>
                    <a href="../public/contactUs.php"><img src="../images/phoneIcon.png" alt="Contact Us">Contact us</a>
                    <a href="../modules/logout.php"><img src="../images/logout.png" alt="Profile">Logout</a>
                </div>
                <?php else: ?>
                    <div class="dropdown-content">
                        <a href="../public/contactUs.php"><img src="../images/phoneIcon.png" alt="Contact Us">Contact us</a>
                    </div>
                <?php endif; ?>
        </div>
        <div class="user-profile">
            <?php if ($role): ?>
                <?php if (!empty($userProfilePicture)): ?>
                    <img src="<?php echo $userProfilePicture; ?>" alt="Profile Picture">
                <?php else: ?>
                    <img src="../images/guestPFP.png" alt="Guest Profile Picture">
                <?php endif; ?>
            <?php else: ?>
                <img src="../images/guestPFP.png" alt="Guest Profile Picture">
            <?php endif; ?>
        </div>
    </div>
</header>


</body>
</html>
