<?php
    include 'functions.php';
    // Connect to MySQL using mysqli
    $conn = mysqli_connect("localhost:3308", "root", "", "photogallery");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // mysqli query that selects all the images
    $result = mysqli_query($conn, "SELECT * FROM images ORDER BY uploaded_date DESC");

    // Fetch all the images as an associative array
    $images = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Close the connection
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
        // Container we'll use to output the image
        let image_popup = document.querySelector('.image-popup');
        // Iterate the images and apply the onclick event to each individual image
        document.querySelectorAll('.images a').forEach(img_link => {
            img_link.onclick = e => {
                e.preventDefault();
                let img_meta = img_link.querySelector('img');
                let img = new Image();
                img.onload = () => {
                    // Create the pop out image
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
        // Hide the image popup container, but only if the user clicks outside the image
        image_popup.onclick = e => {
            if (e.target.className == 'image-popup') {
                image_popup.style.display = "none";
            }
        };
    </script>

<?=template_footer()?>

