<html>

<head>
    <title>Upload Form</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<div class="nav-bar">
<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a class="admin-login-nav" href="admin_login.html">Admin Login</a></li>
</ul>
</div>

<img class="wave" src="img/wave.png">
<main class="page-wrapper">
<div class="upload-form-container">
           <form class="upload-form" method="POST" action="upload.php" enctype="multipart/form-data">
        <fieldset class="upload-form-fieldset">
        <legend>Student Details</legend>
            <div>
                <label for="reg-no">Reg Number:</label>
                <input id="reg-no" type="text" name="reg-no" required="ture">
            </div>
            <div>
                <label for="name">Name:</label>
                <input id="name" type="text" name="name" required="ture">
            </div>
            <div>
                <label for="subject">Subject:</label>
                <input id="subject" type="text" name="subject" required="ture">
            </div>
            <div>
                <label for="date">Date:</label>
                <input id="date" type="date" name="date" required="ture">
            </div>
    </fieldset>
    <fieldset class="upload-form-fieldset">
        <legend>File</legend>
        <div>
            <label for="file">Attach Document:</label>
            <input type="file" name="file" required="ture">
                    </div>
                    </fieldset>
                    <input id ="submit-button" type="submit" value="Submit">
        </form>
    
</div>

<div class="downloads-container">

<?php

$files = scandir("uploads");
for ($a = 2; $a < count($files); $a++)
{
    ?>
    <div class="download-container">
        <a class="view-document" href="uploads/<?php echo $files[$a]; ?>"> <?php echo $files[$a]; ?></a>
<div class="downlaod-button">
        <a href="uploads/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>">
            Download
        </a>
</div>
<div class="delete-button">
        <a class="view-document" href="delete.php?name=uploads/<?php echo $files[$a]; ?>" style="color: red;">
            Delete
        </a>
        </div>
</div>
    <?php
}

?>
</div>
</main>
</html>