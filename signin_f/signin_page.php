<?php
require_once "../backend/general/session_config.php";
require_once "../backend/signin_backend/signin_view.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin Page</title>
    <link rel="stylesheet" href="./signin_style.css">
</head>
<body>

    <div class="main-wrapper">
        <div class="main-wrap">
            <h1 style="cursor: default;">Maubook</h1>
            <p style="cursor: default;">Signin to Maubook</p>

            <form action="../backend/signin_backend/signin.php" method="POST">
                <div class="form-wrapper">
                    <input type="text" name="username" placeholder="Username">
                    <input type="text" name="email" placeholder="E-mail">
                    <div class="gender-input-wrap">
                        <div>
                            <label for="male">Male</label>
                            <input type="radio" value="male" id="male" name="gender" checked>
                        </div>
                        <div>
                            <label for="female">Female</label>
                            <input type="radio" value="female" id="female" name="gender">
                        </div>
                    </div>
                    <input type="password" name="pwd" placeholder="Password">
                    <button class="signin-btn">Sign in</button>
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
