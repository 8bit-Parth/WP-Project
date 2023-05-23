<?php
include 'functions.php';
$msg = '';
if (isset($_POST['id'], $_POST['title'], $_POST['description'])) {
    $mysqli = mysqli_connect('localhost:3308', 'root', '', 'photogallery');
    $stmt = $mysqli->prepare('UPDATE images SET title = ?, description = ? WHERE id = ?');
    $stmt->bind_param('ssi', $_POST['title'], $_POST['description'], $_POST['id']);
    if ($stmt->execute()) {
        $msg = 'Image information updated successfully!';
    } else {
        $msg = 'Error updating image information.';
    }
    $stmt->close();
    $mysqli->close();
} else if (isset($_GET['id'])) {
    $mysqli = mysqli_connect('localhost:3308', 'root', '', 'photogallery');
    $stmt = $mysqli->prepare('SELECT * FROM images WHERE id = ?');
    $stmt->bind_param('i', $_GET['id']);
    $stmt->execute();
    $image = $stmt->get_result()->fetch_assoc();
    if (!$image) {
        exit('Image doesn\'t exist with that ID!');
    }
    $stmt->close();
    $mysqli->close();
}
?>

<?=template_header('Edit Image')?>

<div class="content upload">
    <h2>Edit Image Information</h2>
    <form action="edit.php" method="post" enctype="multipart/form-data">
        <label for="id">ID</label>
        <input type="text" name="id" >
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
        <label for="description">Description</label>
        <textarea name="description" id="description" value="description"></textarea>
        <input type="submit" value="Update Information" name="submit">
    </form>
    <p><?=$msg?></p>
</div>

<?=template_footer()?> 
