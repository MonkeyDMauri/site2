<?php
require_once "../backend/general/session_config.php";

// checking user is logged in.
if (!isset($_SESSION["logged_in"]) && !$_SESSION["logged_in"] === true) {
    header("location: ../login_f/login_page.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maubook</title>
    <link rel="stylesheet" href="./chat_style.css">
    <script src="./chat.js" defer></script>
</head>
<body>
    <div class="main-wrapper">
        <div class="main-wrap">
            <div class="left-panel">
                <div class="user-info-wrap">
                    <div style="display: flex; flex-direction:column; align-items:center; gap:1rem;">
                        <!-- this info here will be filled using javascript since it will dynamically change -->
                        <div class="user-pic-wrap"></div>
                        <div class="username-email-wrap"></div>
                    </div>
                   
                </div>

                <div class="left-panel-buttons-wrap">
                    <label for="radio-show-chats" class="left-panel-btn chats-btn">
                        Chat 
                        <img src="../UI/ui/icons/Chats-icon.png" alt="chats-icon" class="left-panel-button-icons">
                    </label>
                    <label for="radio-hide-chats" class="left-panel-btn contacts-btn">
                        Contacts
                        <img src="../UI/ui/icons/contact-icon.png" alt="chats-icon" class="left-panel-button-icons">
                    </label>
                    <label for="radio-hide-chats" class="left-panel-btn settings-btn">
                        Settings
                        <img src="../UI/ui/icons/settings.png" alt="chats-icon" class="left-panel-button-icons">
                    </label>
                    <label class="left-panel-btn left-panel-logout-btn">Logout</label>
                </div>
            </div>

            <div class="right-panel">
                <div class="right-panel-header">
                    <h1>Maubook</h1>
                </div>
                <div class="inner-panels-wrapper">
                    <input type="radio" name="radio" id="radio-show-chats">
                    <input type="radio" name="radio" id="radio-hide-chats" checked>
                    <div class="inner-left-panel">
                        <div class="inner-left-panel-content flex">
                            <!-- this here will be filled with data depending on wether the user wants to see the contacts, chats, or settings. -->
                        </div>
                    </div>
                    <div class="inner-right-panel">
                        <div class="inner-right-panel-content">
                            <!-- this here will be filled with data depending on wether the user wants to see the contacts, chats, or settings. -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="logout-popup-wrapper">
        <div class="logout-popup-wrap">
            <h1 style="text-align:center;">Do you want to logout?</h1>
            <div class="logout-btns-wrap">
                <button class="logout-btn logout-btn-no">No</button>
                <button class="logout-btn logout-btn-yes">Yes</button>
            </div>
        </div>
    </div>
</body>
</html>