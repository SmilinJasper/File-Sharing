<?php

/*
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

file_put_contents("evaluation_forms/{$file["name"]}.html", $text, FILE_APPEND | LOCK_EX);*/


$conn = mysqli_connect("localhost", "root", "selvinjj", "student_data"); 
          
        // Check connection 
        if($conn === false){ 
            die("ERROR: Could not connect. " 
                . mysqli_connect_error()); 
        } 
          
        // Taking 4 values from the form data(input) 
        $reg_no =  $_REQUEST['reg-no']; 
        $name = $_REQUEST['name']; 
        $subject =  $_REQUEST['subject']; 
        $date = $_REQUEST['date']; 
          
        // Performing insert query execution 
        // here our table name is student_database 
        $sql = "INSERT INTO student_database  VALUES ('$reg_no',  
            '$name','$subject','$date')"; 
          
        if(mysqli_query($conn, $sql)){ 
            echo "<h3>data stored in a database successfully." 
                . " Please browse your localhost php my admin" 
                . " to view the updated data</h3>";  
  
            echo nl2br("\n$reg_no\n $name\n "
                . "$subject\n $date"); 
        } else{ 
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn); 
        } 
          
        // Close connection 
        mysqli_close($conn); 
        ?>
