<?php

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // specifying the type of data for the response.
    header("Content-type:application/json");

    try {
        require_once "../general/dbh.php";
        require_once "../general/session_config.php";

        $query = "SELECT * FROM users WHERE username = :username;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $_SESSION["user_username"]);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            echo json_encode([
                "success" => true,
                "result" => $result
            ]);
        }
    } catch(PDOException $e) {
        echo json_encode([
            "error" => "error in get_logged_user_info.php: " . $e->getMessage()
        ]);
    }
}