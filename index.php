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

<ul class="nav-bar">
  <li><a class="active" href="index.php">Home</a></li>
  <li><a class="admin-login-nav" href="admin_login.html">Admin Login</a></li>
</ul>

<img class="wave" src="img/wave.png">
<main class="page-wrapper">
<header class="downloads-header">
<h1 >Downloads</h1>
</header>
<div class="downloads-container">

    <?php
    
for ($a = 2; $a < count($files); $a++)
{
    ?>
    <p>
        <?php echo $files[$a]; ?>

        <a href="uploads/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>">
            Download
        </a>
    </p>
    <?php
}
?>
</div>
</main>
</html>
