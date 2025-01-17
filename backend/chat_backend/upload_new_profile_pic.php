<?php


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    header("Content-Type:application/json");

    // checking if a file(image) was uploaded and the name is not empty.
    if (isset($_FILES["file"]) && $_FILES["file"]["name"] != "") {
        // checking image doesnt contain an error.
        if ($_FILES["file"]["error"] == 0) {

            //checking if uploads/ folder doesnt exist
            $folder = "uploads/";
            if (!file_exists($folder)) {
                // creating uploads folder to store profile pics and giving it full permissions.
                mkdir($folder, 0777, true);
            }

            $destination = $folder . $_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"], $destination);


            echo json_encode([
                "success" => true,
                "name" => $_FILES["file"]
            ]);
        } else {
            echo json_encode([
                "error" => "image contains an error"
            ]);
        }
        
    } else{ 
        echo json_encode([
            "error" => "No pic was uploaded"
        ]);
    }
} else {
    header("location: ../../chat_f/chat_page.php");
}