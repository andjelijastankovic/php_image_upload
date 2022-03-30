<?php 

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        if(isset($_POST["submit"])) {
            $picture = $_FILES["uploaded_image"];
            $pictureName = $_FILES["uploaded_image"]["name"];
            $pictureType = $_FILES["uploaded_image"]["type"];
            $pictureTMPname = $_FILES["uploaded_image"]["tmp_name"];
            $pictureError = $_FILES["uploaded_image"]["error"];
            $pictureSize = $_FILES["uploaded_image"]["size"];

            $allowedExt = array("jpg", "jpeg", "png", "gif");
            $extension = strtolower(pathinfo($pictureName, PATHINFO_EXTENSION));

            if(!in_array($extension, $allowedExt)) {
                echo "<p> You should choose your image for uploading... Only .jpg, .jpeg, .png and .gif extensions are allowed, you can't upload any another type of file... </p>";
                echo "&nbsp <a href='index.php'> Go back for upload </a>";
            }
            elseif(in_array($extension, $allowedExt)) {
                if($pictureError === 0) {
                    if($pictureSize < 1000000) {
                        $pictureNewName = uniqid("", true).".".$extension;
    
                        $destination = "images/".$pictureNewName;
                        move_uploaded_file($pictureTMPname, $destination);
    
                        require_once "connection.php";
                        $sqlInsert = "INSERT INTO images(image_name)
                        VALUES('$pictureNewName');";
    
                        mysqli_query($conn, $sqlInsert);
    
                        header("Location: view.php?upload_sucess");
                    }
                    else {
                        echo "<p> Your file is too big! </p>";
                        echo "&nbsp <a href='index.php'> Go back for upload </a>";
                    }
                }
            } 
        } else {
            echo "<p> Oops! Something went wrong, try again later... </p>";
            echo "&nbsp <a href='index.php'> Go back for upload </a>";
        }
    }

?>