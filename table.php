<?php 

    require_once "connection.php";

    $table = 
    "
        CREATE TABLE IF NOT EXISTS images
        (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            image_name TEXT NOT NULL 
        )ENGINE = InnoDB;
    ";

    if($conn->query($table))
    {
        echo "<p> Table created successfully </p>";
    }
    else 
    {
        echo "<p> Error: " . $conn->error . "</p>";
    }




?>