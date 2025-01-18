<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    header("Content-Type:application/json");

    $input = json_decode(file_get_contents("php://input"), true);
    $userId = $input["userId"];
    $imgName = $input["imgName"];

    try {
        require_once "../general/dbh.php";
        require_once "../general/session_config.php";

        $query = "UPDATE users SET img = :imgName WHERE id = :userId;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":imgName", $imgName);
        $stmt->bindParam(":userId", $userId);
        $stmt->execute();

        echo json_encode([
            "success" => true,
            "name" => $imgName
        ]);

    } catch(PDOException $e) {
        echo json_encode([
            "error" => "Error when tryna save imgName to db:", $e->getMessage()
        ]);
    }

    
}