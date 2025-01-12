<?php


function missing_input($username, $email, $gender, $pwd) {
    if (empty($username) || empty($email) || empty($gender) || empty($pwd)) {
        return true;
    }
}

function invalid_email(string $email) {
    if ($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
    }
}

function username_taken($pdo, $username) {
    if (get_username($pdo, $username)) {
        return true;
    }
}

function email_taken($pdo, $email) {
    if (get_email($pdo, $email)) {
        return true;
    }
}
