<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image upload</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <form action="upload.php" method="POST" enctype="multipart/form-data">

        <input type="file" name="uploaded_image">
        <button type="submit" name="submit"> Upload your image </button>
    </form>
</body>
</html>