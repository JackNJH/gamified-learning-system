<style>
    body {
        font-family: 'Montserrat', sans-serif; 
    }

    .login-alert {
        padding: 20px;
        background-color: #f44336;
        color: white;
        font-size: 1.5rem; 
        width: 50%; 
        max-width: 400px; 
        margin: 0 auto;
        margin-top: 20px; 
        position: fixed;
        top: 100px;
        left: 50%; 
        transform: translate(-50%); 
        z-index: 9999; 
        border-radius: 8px;
    }

    .login-alert-closebtn {
        position: absolute;
        top: 10px;
        right: 10px;
        color: white;
        font-weight: bold;
        font-size: 1.5rem; 
        cursor: pointer;
        transition: color 0.3s;
    }

    .login-alert-closebtn:hover {
        color: black;
    }
</style>
</head>
<body>

<div class="login-alert">
    <span class="login-alert-closebtn" onclick="window.location.href = 'index.php';">&times;</span> 
    <strong>Wrong email or password.</strong> Please try again.
</div>

</body>
</html>
