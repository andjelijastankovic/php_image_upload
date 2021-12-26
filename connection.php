<?php 

    $servername = "localhost";
    $user = "root";
    $password = "";
    $db = "image_upload_db";

    $conn = new mysqli($servername, $user, $password, $db);
    if($conn->connect_error)
    {
        die("Error connecting to database: " . $conn->connect_error);
    }



?>