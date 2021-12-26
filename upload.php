<?php 

    if(isset($_POST["submit"])) 
    {
        $picture = $_FILES["uploaded_image"];
        
        //print_r($picture);
        
        $pictureName = $_FILES["uploaded_image"]["name"];
        $pictureType = $_FILES["uploaded_image"]["type"];
        $pictureTMPname = $_FILES["uploaded_image"]["tmp_name"];
        $pictureError = $_FILES["uploaded_image"]["error"];
        $pictureSize = $_FILES["uploaded_image"]["size"];

        $extensionPicture = explode(".", $pictureName);
        $pictureRealExt = strtolower(end($extensionPicture));

        $allowedExt = array("jpg", "jpeg", "png", "gif");

        if(in_array($pictureRealExt, $allowedExt)) 
        {
            if($pictureError === 0) 
            {
                if($pictureSize < 10000000)
                {
                    $pictureNewName = uniqid("", true).".".$pictureRealExt;

                    $destination = "images/".$pictureNewName;
                    move_uploaded_file($pictureTMPname, $destination);

                    require_once "connection.php";
                    $sqlInsert = "INSERT INTO images(image_name)
                    VALUES('$pictureNewName');";

                    mysqli_query($conn, $sqlInsert);

                    header("Location: view.php?upload_sucess");
                }
                else 
                {
                    echo "<p> Your file is too big! </p>";
                }
            }
            else 
            {
                echo "<p> Oops! There is an error uploading your file, try again... </p>";
            }
        } 
        else 
        {
            echo "<p> Sorry, you can't upload files of this type! </p>";
        } 
        
    }







?>