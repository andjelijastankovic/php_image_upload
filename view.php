<?php require_once "connection.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Your photos</title>

	<link rel="stylesheet" href="style.css">

</head>
<body>
	
	<button type="submit" name="upload_more"><a href="index.php"> Upload more </a></button>

	<?php 
		$sql = "SELECT * FROM images ORDER BY id DESC";
		$res = mysqli_query($conn,  $sql);

		if (mysqli_num_rows($res) > 0) {
		while($images = mysqli_fetch_assoc($res)) {  
	?>
			
		<div class="photo_div">
			<img id="<?=$images['id']?>" class="myImg" src="images/<?=$images['image_name']?>">
		</div>

		<div id="myModal" class="modal">
			<span class="close">&times;</span>
			<img class="modal-content" id="img01">
    	</div>

		<script>
        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the image and insert it inside the modal
        var img = document.getElementById('<?=$images['id']?>');
        var modalImg = document.getElementById("img01");
		img.onclick = function()
		{
        	modal.style.display = "block";
        	modalImg.src = this.src;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() 
		{ 
        	modal.style.display = "none";
        }
    </script>
			
	<?php } }?>

	
	
</body>
</html>
