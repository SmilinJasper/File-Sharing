<?php

$files = scandir("uploads");
?>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<div class="nav-bar">
<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="admin_login.html">Admin Login</a></li>
  <li><a href="staff_login.html">Staff Login</a></li>
</ul>
</div>

<img class="wave" src="img/wave.png">
<main class="page-wrapper">
<header class="downloads-header">
<h1 >DOWNLOADS</h1>
</header>
<div class="downloads-container">

    <?php
    
for ($a = 2; $a < count($files); $a++)
{
    ?>
    <?php echo $a-1?><a class="view-document" href="evaluation_forms/<?php echo $files[$a]; ?>.html"><?php echo $files[$a]; ?></a>

    <div class="downlaod-button">
        <a href="uploads/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>">
            Download
        </a>
</div>

    <?php
}
?>

</div>
</main>
</html>
