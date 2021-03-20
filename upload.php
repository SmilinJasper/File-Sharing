<?php

// Getting uploaded file
$file = $_FILES["file"];

// Uploading in "uplaods" folder
move_uploaded_file($file["tmp_name"], "uploads/" . $file["name"]);

// Redirecting back
header("Location: " . $_SERVER["HTTP_REFERER"]);

$text = "<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' type='text/css' href='css/style.css'>
    <link href='https://fonts.googleapis.com/css?family=Poppins:600&display=swap' rel='stylesheet'>
    <script src='https://kit.fontawesome.com/a81368914c.js'></script>
    <link href='../css/style.css' rel='stylesheet'>
    <title>Evaluation Form</title>
</head>

<body>
<div class='nav-bar'>
<ul>
  <li><a class='active' href='../index.php'>Home</a></li>
  <li><a class='admin-login-nav' href='../admin_login.html'>Admin Login</a></li>
  <li><a href='staff_login.html'>Staff Login</a></li>
</ul>
</div>

<main class='page-wrapper'>
<img class='wave' src='../img/wave.png'>
<div class='marks-input-container'>
        <form class='marks-form' action='send_marks.php' method='POST'>
                            <div>
                <label for='marks'>Marks:</label>
                <input id='marks' name='marks' type='number' min='0' max='100'>
                </div>
                <div>
                <input type='submit' value='OK'>
                </div>
        </form>
    </div>
    <div class='embedded-pdf-container'>
    <embed src='../uploads/{$file["name"]}' width='100%' height='100%'></embed></body>
</div>
</main>
</html>";

file_put_contents("evaluation_forms/{$file["name"]}.html", $text, FILE_APPEND | LOCK_EX);


include_once 'db.php';
if(isset($_POST['submit']))
{    
     $reg_no = $_POST['reg-no'];
     $name = $_POST['name'];
     $subject = $_POST['subject'];
     $date = $_POST['date'];
     $sql = "INSERT INTO student_database VALUES ('$reg_no',$name','$subject','$date')";
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>;
