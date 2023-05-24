<?php
include 'functions.php';
$msg = '';
if (isset($_FILES['image'], $_POST['title'], $_POST['description'])) {
	$target_dir = 'images/';
	$image_path = $target_dir . basename($_FILES['image']['name']);
	if (!empty($_FILES['image']['tmp_name']) && getimagesize($_FILES['image']['tmp_name'])) {
		if (file_exists($image_path)) {
			echo '<script>alert("Image already exists, please choose another or rename that image.")</script>';
		} else if ($_FILES['image']['size'] > 500000) {
			echo '<script>alert("Image file size too large, please choose an image less than 500kb.")</script>';
		} else {
			move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
			$mysqli = mysqli_connect('localhost:3308', 'root', '', 'photogallery');
			$stmt = $mysqli->prepare('INSERT INTO images (title, description, filepath, uploaded_date) VALUES (?, ?, ?, CURRENT_TIMESTAMP)');
	        $stmt->bind_param('sss', $_POST['title'], $_POST['description'], $image_path);
	        if ($stmt->execute()) {
				echo '<script>alert("Image Uploaded Successfully!!")</script>';
			} else {
				echo '<script>alert("Error uploading image.")</script>';
			}
			$stmt->close();
			$mysqli->close();
		}
	} else {
		echo '<script>alert("Please upload an image!")</script>';
	}
}
?>

<?=template_header('Upload Image')?>

<div class="content upload">
	<h2>Upload Image</h2>
	<form action="upload.php" method="post" enctype="multipart/form-data">
		<label for="image">Choose Image</label>
		<input type="file" name="image" accept="image\*" id="image">
		<label for="title">Title</label>
		<input type="text" name="title" id="title">
		<label for="description">Description</label>
		<textarea name="description" id="description"></textarea>
		<!-- <label for="latitude">Latitude:</label>
		<input type="text" name="latitude" id="latitude" required>
		<label for="longitude">Longitude:</label>
		<input type="text" name="longitude" id="longitude" required> -->
	    <input type="submit" value="Upload Image" name="submit">
	</form>
	<p><?=$msg?></p>
</div>

<?=template_footer()?>