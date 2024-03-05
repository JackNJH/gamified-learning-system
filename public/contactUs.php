<?php
require "../modules/config.php";
include '../components/header.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .content-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 90vh;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', sans-serif;
        }

        h1{
            margin-bottom: 0;
            font-size: 1.7vw;
        }
        .logo-container {
            display: flex;
            justify-content: center; 
            align-items: center; 
            width: 100%;
        }

        .logo-container img {
            width: 15vw; 
            height: auto; 
            margin-bottom: 1vw;
        }

        .page-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            text-align: center;
            padding: 1vw;
            background-color: #FFF0F5;
            border-radius: 0 0 0.5vw 0.5vw;
            box-shadow: 0 0 1vw rgba(0, 0, 0, 0.3);
            width: 40%;
        }

        .container .about-section {
            text-align: justify;
            line-height: 1.7;
        }

        p{
            font-size: 0.9vw;
        }
        
        h2 {
            margin-bottom: 1vw;
            font-size: 1.3vw;
        }

        .image-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 2vw;
        }

        .image-container div {
            text-align: center;
        }

        .image-container img {
            width: 5vw;
            background-color: white;
            height: 5vw;
            border-radius: 50%;
            margin-bottom: 0.5vw;
            border: 2px solid #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .image-container p {
            margin: 0;
        }

        .contact-info {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            background-color: gainsboro;
            padding: 10px 0;
            border-radius: 0 0 10px 10px;
        }

        .contact-info p {
            margin: 5px 10px;
        }

        .contact-info a {
            color: chocolate;
            text-decoration: none;
        }

        .contact-info a:hover {
            color: orange;
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="content-container">
    <div class="page-container">
        <div class="container">
            <h1>Thanks for using,</h1>
            <div class="logo-container">
                <img src="../images/logo.png" alt="Logo">
            </div>

            <h2>About Our Gamified E-learning System</h2>
            <div class="about-section">
                <p>Welcome to our project! Here, teachers craft interactive 'classes' packed with valuable content, while students dive in eagerly, earning badges as they conquer challenges. These badges aren't just digital rewards; they signify real achievement, proudly displayed on students' profiles. Join us on this journey where learning is exciting, and together, let's reshape education for the digital era!</p>
            </div>

            <h2>Team Members</h2>
            <div class="image-container">
                <?php
                $names = array("Jack", "Melvin", "Scott", "Sebastian", "Nathaniel");

                // Display images with names
                for ($i = 0; $i < count($names); $i++) {
                    echo '<div>';
                    echo '<img src="../images/guestPFP.png" alt="Members">';
                    echo '<p>' . $names[$i] . '</p>';
                    echo '</div>';
                }
                ?>
            </div>
            <div class="contact-info">
                <p>Phone: <a href="tel:03-12345678">03-12345678</a></p>
                <p>Email: <a href="mailto:loodleteam@gmail.com">loodleteam@gmail.com</a></p>
            </div>
        </div>
    </div>
</div>

</body>
</html>


