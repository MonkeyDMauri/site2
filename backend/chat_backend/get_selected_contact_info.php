<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    header("Content-Type:application/json");
    $input = json_decode(file_get_contents("php://input"), true);
    $contactId = $input["contactId"];

    try {
        require_once "../general/dbh.php";
        require_once "../general/session_config.php";

        $query = "SELECT * FROM users WHERE id = :id;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":id", $contactId);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            echo json_encode([
                "success" => true,
                "contactInfo" => $result
            ]);
        } else {
            echo json_encode([
                "error" => "No contact info was retreived"
            ]);
        }
    } catch(PDOException $e) {
        echo json_encode([
            "error" => "Error when tryna get selected contact info: " . $e->getMessage()
        ]);
    }
}