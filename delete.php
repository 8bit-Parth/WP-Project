<?php
include 'functions.php';
$conn = mysqli_connect('localhost:3308', 'root', '', 'photogallery');
$msg = '';
if (isset($_GET['id'])) {
    $stmt = mysqli_prepare($conn, 'SELECT * FROM images WHERE id = ?');
    mysqli_stmt_bind_param($stmt, 'i', $_GET['id']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $image = mysqli_fetch_assoc($result);
    if (!$image) {
        exit('Image doesn\'t exist with that ID!');
    }
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            unlink($image['filepath']);
            $stmt = mysqli_prepare($conn, 'DELETE FROM images WHERE id = ?');
            mysqli_stmt_bind_param($stmt, 'i', $_GET['id']);
            mysqli_stmt_execute($stmt);
            $msg = 'You have deleted the image!';
        } else {
            header('Location: index.php');
            exit;
        }
    }
} else {
    exit('No ID specified!');
}
?>

<?=template_header('Delete')?>

<div class="content delete">
	<h2>Delete Image #<?=$image['id']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Are you sure you want to delete <?=$image['title']?>?</p>
    <div class="yesno">
        <a href="delete.php?id=<?=$image['id']?>&confirm=yes">Yes</a>
        <a href="delete.php?id=<?=$image['id']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>



