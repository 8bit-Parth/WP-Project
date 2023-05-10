<?php
	function mysqli_connect_db() {
        // The below variables should reflect your MySQL credentials
        $DATABASE_HOST = 'localhost:3308';
        $DATABASE_USER = 'root';
        $DATABASE_PASS = '';
        $DATABASE_NAME = 'photogallery';
        // Connect to MySQL using the MySQLi extension
        $conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
        if ($conn->connect_error) {
            // If there is an error with the connection, stop the script and output the error.
            exit('Failed to connect to database!');
        }
        // Set the character set to UTF-8
        $conn->set_charset('utf8');
        return $conn;
    }
    
    function template_header($title) {
        echo <<<EOT
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <title>$title</title>
                <link href="style.css" rel="stylesheet" type="text/css">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
            </head>
            <body>
            <nav class="navtop">
                <div>
                    <h1>Gallery System</h1>
                    <a href="index.php"><i class="fas fa-image"></i>Gallery</a>
                </div>
            </nav>
        EOT;
        }
    // Template footer
    function template_footer() {
        echo <<<EOT
            </body>
        </html>
        EOT;
        }
?>