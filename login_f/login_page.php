<?php
require_once "../backend/general/session_config.php";
require_once "../backend/signin_backend/signin_view.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maubook</title>
    <link rel="stylesheet" href="./login_style.css">
    <link rel="stylesheet" href="./login_media_queries.css">
</head>
<body>

    <div class="main-wrapper">
        <div class="main-wrap">
            <h1 style="cursor: default;">Maubook</h1>
            <p style="cursor: default;">Login to Maubook</p>

            <form action="../backend/login_backend/login.php" method="POST">
                <div class="form-wrapper">
                    <input type="text" name="username" placeholder="Username">
                    <input type="password" name="pwd" placeholder="Password">
                    <button class="login-btn">Login</button>
                    <div class="q-link"><a href="../signin_f/signin_page.php">Don't have an account?</a></div>
                </div>
                
            </form>
        </div>

        <div class="messages-wrapper">
            <?php
                show_messages();
            ?>
        </div>
    </div>
    
</body>
</html>
