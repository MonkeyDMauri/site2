<?php


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = strtolower($_POST["username"]);
    $email = strtolower($_POST["email"]);
    $gender = $_POST["gender"];
    $pwd = $_POST["pwd"];

    try {
        require_once "../general/dbh.php";
        require_once "../general/session_config.php";
        require_once "./signin_contr.php";
        require_once "./signin_model.php";
        require_once "./signin_view.php";

        // error handlers.

        $errors = [];

        if (missing_input($username, $email, $gender, $pwd)) {
            $errors["missing_input"] = "Please fill out all fields";
        }

        if (invalid_email($email)) {
            $errors["invalid_email"] = "Invalid email format";
        }

        if (username_taken($pdo, $username)) {
            $errors["username_taken"] = "Username already taken";
        }

        if (email_taken($pdo, $email)) {
            $errors["email_taken"] = "email already taken";
        }

        // checking if any errors where found, if any, user will be redirected to same page and error messages will be shown.
        if ($errors) {
            $_SESSION["errors"] = $errors;
            header("location: ../../signin_f/signin_page.php");
            die();
        }

        // code to sign user in after no errors where found.
        sign_user_in($pdo, $username, $email, $gender, $pwd);

        //creating success SESSION variable to make a function display a success message

        $_SESSION["account_created"] = true;
        header("location: ../../signin_f/signin_page.php");

        echo "hello ";
        echo $username;
    } catch(PDOException $e) {
        die("Error when connecting to db: signin.php");
    }
    
    
} else {
    header("location: ../../signin_f/signin_page.php");
}