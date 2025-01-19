<?php


if ($_SERVER["REQUEST_METHOD"] === "GET") {
    header("Content-Type:application/json");
    // this sleep function is to allow the loading gif to be seen for a second.
    sleep(1);

    try {
        require_once "../general/dbh.php";
        require_once "../general/session_config.php";

        $query = "SELECT * FROM users WHERE username != :username;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $_SESSION["user_username"]);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            echo json_encode([
                "success" => true,
                "contacts" => $result
            ]);
        } else {
            echo json_encode([
                "error" => "No contacts were found"
            ]);
        }

    } catch(PDOException $e) {
        echo json_encode([
            "error" => $e->getMessage()
        ]);
    }
}