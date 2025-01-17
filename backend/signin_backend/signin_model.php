<?php


function get_username(object $pdo, string $username) {

    $query = "SELECT * FROM users WHERE username = :username;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        return true;
    }
}

function get_email(object $pdo, string $email) {

    $query = "SELECT * FROM users WHERE email = :email;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        return true;
    }
}

// saving new user's info to database.
function sign_user_in($pdo, $username, $email, $gender, $pwd) {

    // hashing password before saving to db.
    $options = [
        "cost" => 12
    ];
    
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

    $query = "INSERT INTO users(username, gender, email, pwd) VALUES(:username, :gender, :email, :pwd);";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":gender", $gender);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":pwd", $hashedPwd);

    $stmt->execute();
    $pdo = null;
    $stmt = null;
} 




// CREATE TABLE users(
// id INT PRIMARY KEY AUTO_INCREMENT,
// username VARCHAR(255) NOT NULL,
// gender VARCHAR(255) NOT NULL,
// email VARCHAR(255) NOT NULL,
// pwd VARCHAR(255) NOT NULL,
// created_at DATETIME DEFAULT CURRENT_TIMESTAMP
// );
