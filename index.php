<?php
    include 'functions.php';
    $conn = mysqli_connect("localhost:3308", "root", "", "photogallery");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $result = mysqli_query($conn, "SELECT * FROM images ORDER BY uploaded_date DESC");

    $images = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_close($conn);
?>

    <?=template_header('Gallery')?>

    <div class="content home">
        <h2>Gallery</h2>
        <p>Welcome to the gallery page! You can view the list of uploaded images below.</p>
        <!-- <a href="location.php" class="upload-image">Image Location</a> -->
        <a href="upload.php" class="upload-image">Upload Image</a>
        <a href="edit.php" class="upload-image">Edit Information</a>
        <div class="images">
            <?php foreach ($images as $image): ?>
            <?php if (file_exists($image['filepath'])): ?>
            <a href="#">
                <img src="<?=$image['filepath']?>" alt="<?=$image['description']?>" data-id="<?=$image['id']?>" data-title="<?=$image['title']?>" width="300" height="200">
                <span><?=$image['description']?></span>
            </a>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="image-popup"></div>

    <script>
        let image_popup = document.querySelector('.image-popup');
        document.querySelectorAll('.images a').forEach(img_link => {
            img_link.onclick = e => {
                e.preventDefault();
                let img_meta = img_link.querySelector('img');
                let img = new Image();
                img.onload = () => {
                    image_popup.innerHTML = `
                        <div class="con">
                            <h3>${img_meta.dataset.title}</h3>
                            <p>${img_meta.alt}</p>
                            <img src="${img.src}" width="700px" height="700px">
                            <a href="delete.php?id=${img_meta.dataset.id}" class="trash" title="Delete Image"><i class="fas fa-trash fa-xs"></i></a>
                        </div>
                    `;
                    image_popup.style.display = 'flex';
                };
                img.src = img_meta.src;
            };
        });
        image_popup.onclick = e => {
            if (e.target.className == 'image-popup') {
                image_popup.style.display = "none";
            }
        };
    </script>

<?=template_footer()?>

