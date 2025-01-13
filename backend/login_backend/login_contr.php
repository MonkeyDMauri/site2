<?php


function missing_input($username, $pwd) {
    if (empty($username) || empty($pwd)) {
        return true;
    }
}

function wrong_username($getUser) {
    if (!$getUser) {
        return true;
    }
}