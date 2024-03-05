<style>
    body {
        font-family: 'Montserrat', sans-serif; 
    }

    .login-alert {
        padding: 1vw;
        background-color: #f44336;
        color: white;
        font-size: 1vw; 
        width: 50%; 
        max-width: 20vw; 
        margin: 0 auto;
        margin-top: 1vw; 
        position: fixed;
        top: 5vw;
        left: 50%; 
        transform: translate(-50%); 
        z-index: 9999; 
        border-radius: 8px;
    }

    .login-alert-closebtn {
        position: absolute;
        top: 0.5vw;
        right: 0.5vw;
        color: white;
        font-weight: bold;
        font-size: 1rem; 
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
    <?php if (isset($banned_user) && $banned_user): ?>
        <strong>This account has been banned.</strong> Please contact the administrator for assistance.
    <?php else: ?>
        <strong>Wrong email or password.</strong> Please try again.
    <?php endif; ?>
</div>

</body>
</html>
