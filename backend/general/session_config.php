<?php

ini_set("session:use_cookies_only", true);
ini_set("session:use_strict_mode", true);

session_start();

if (!isset($_SESSION["last_regeneration"])) {
    regenerate_id();
} else {
    $intervale = 10;

    if (time() - $_SESSION["last_regeneration"] >= $intervale) {
        regenerate_id();
    }
}

function regenerate_id() {
    $_SESSION["last_regeneration"] = time();
    session_regenerate_id(true);
}