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
  <li><a href="index.php">Home</a></li>
  <li><a class="admin-login-nav active" href="admin_login.html">Admin Login</a></li>
</ul>
</div>

<img class="wave" src="img/wave.png">
<main class="page-wrapper">
<div class="upload-form-container">
           <form class="upload-form" method="POST" action="upload.php" enctype="multipart/form-data">
          <fieldset class="upload-form-fieldset">
        <legend>Student Details</legend>
            <div class="form-item">
                <label for="reg-no">Reg Number:</label>
                <input id="reg-no" type="text" name="reg-no" required="ture">
            </div>
            <div class="form-item">
                <label for="name">Name:</label>
                <input id="name" type="text" name="name" required="ture">
            </div>
            <div class="form-item">
                <label for="subject">Subject:</label>
                <input id="subject" type="text" name="subject" required="ture">
            </div>
            <div class="form-item">
                <label for="date">Date:</label>
                <input id="date" type="date" name="date" required="ture">
            </div>
    </fieldset> 
        <fieldset class="upload-form-fieldset">
        <legend>Upload Answersheet</legend>
        <div class="form-item">
            <label for="file">Attach Answersheet:</label>
            <input type="file" name="file" required="ture" accept="application/pdf">
                    </div>
                         </fieldset>
                         <div>
                             <div class="submit-button-container">
                    <input id ="submit-button" type="submit" value="Submit">
                    </div>
</div>
        </form>
    
</div>


<?php

$files = scandir("uploads");
for ($a = 2; $a < count($files); $a++)
{
    ?>
    <div class="file-container">
        <a class="view-document" href="evaluation_forms/<?php echo $files[$a]; ?>.html"> <?php echo $files[$a]; ?></a>
<div class="downlaod-button">
        <a href="uploads/<?php echo $files[$a]; ?>.html" download="<?php echo $files[$a]; ?>">
            Download
        </a>
</div>
<div class="delete-button">
        <a href="delete.php?name=<?php echo $files[$a]; ?>" style="color: red;">
            Delete
        </a>
        </div>
</div>
    <?php
}

?>
<div class="view-marklist-container">
<form method="post" action="export.php">
     <input type="submit" name="export" value="View Marklist" class="view-marklist-button">
    </form>
    </div>
</main>
</html>