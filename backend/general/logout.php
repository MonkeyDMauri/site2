<?php

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    header("Content_type:application/json");

    //resume session.
    session_start();
    //unset session variables.
    session_unset();
    //destroy sessions
    session_destroy();

    echo json_encode([
        "success" => true
    ]);
}