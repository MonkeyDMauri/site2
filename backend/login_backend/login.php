<?php



if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $username = strtolower($_POST["username"]);
    $pwd = $_POST["pwd"];

    try {
        require_once "../general/dbh.php";
        require_once "../general/session_config.php";
        require_once "./login_contr.php";
        require_once "./login_model.php";

        // trying to get account info from users table if any matches the one username the user just entered.
        $getUser = get_user($pdo, $username);

        // error handlers.
        $errors = [];

        if (missing_input($username, $pwd)) {
            $errors["missing_input"] = "Please fill out all fields!";
        }

        if (wrong_username($getUser)) {
            $errors["account_doesnt_exist"] = "Account doesn't exist";
        }

        if (!wrong_username($getUser) && !password_verify($pwd, $getUser['pwd'])) {
            $errors["wrong_password"] = "Please check your password";
        }

        if ($errors) {
            $_SESSION["errors"] = $errors;
            header("location: ../../login_f/login_page.php");
            die();
        }

        $_SESSION["user_username"] = $username;
        $_SESSION["logged_in"] = true;
        header("location: ../../chat_f/chat_page.php");
        die();
    } catch(PDOException $e) {
        die($e->getMessage());
    }
} else {
    header("location: ../../login_f/login_page.php");
}