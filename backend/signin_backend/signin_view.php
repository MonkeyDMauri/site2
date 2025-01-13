<?php


function show_messages() {
    if (isset($_SESSION["errors"])) {
        $errors = $_SESSION["errors"];

        foreach($errors as $error) {
            echo "<div class='error'>" . $error . "</div>";
        }
        unset($_SESSION["errors"]);
    }

    if (isset($_SESSION["account_created"])) {
        $flag = $_SESSION["account_created"];

        if ($flag) {
            echo "<div class='success'>Account created!</div>";
        }

        unset($_SESSION["account_created"]);
    }
}