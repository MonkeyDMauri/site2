<?php


function show_messages() {
    if (isset($_SESSION["signin_errors"])) {
        $errors = $_SESSION["signin_errors"];

        foreach($errors as $error) {
            echo "<div class='error'>" . $error . "</div>";
        }
        unset($_SESSION["signin_errors"]);
    }

    if (isset($_SESSION["account_created"])) {
        $flag = $_SESSION["account_created"];

        if ($flag) {
            echo "<div class='success'>Account created!</div>";
        }

        unset($_SESSION["account_created"]);
    }
}