<?php

// Getting uploaded file
$file = $_FILES["file"];

// Uploading in "uplaods" folder
move_uploaded_file($file["tmp_name"], "uploads/" . $file["name"]);

// Redirecting back
header("Location: " . $_SERVER["HTTP_REFERER"]);

$conn = mysqli_connect("localhost", "root", "", "epiz_28308908_student_data"); 
          
        // Check connection 
        if($conn === false){ 
            die("ERROR: Could not connect. " 
                . mysqli_connect_error()); 
        } 
          
        // Taking 4 values from the form data(input) 
        $is_checked ="No"  ; 
        $marks = 0;
        $attendance = "Present";
                 
        // Performing insert query execution 
        // here our table name is student_database 
        $sql = "INSERT INTO student_database (is_checked,marks,attendance) VALUES ('$is_checked','$marks','$attendance')"; 
          
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

//Connect Again
$conn = mysqli_connect("localhost", "root", "", "epiz_28308908_student_data"); 
          
        // Check connection 
        if($conn === false){ 
            die("ERROR: Could not connect. " 
                . mysqli_connect_error()); 
        } 

        //Get id of last entry in database
        $result = mysqli_query($conn, 'SELECT id FROM student_database ORDER BY id DESC LIMIT 1');
        if (mysqli_num_rows($result) > 0) {
           $last_id = mysqli_fetch_row($result);
        }

//HTML Content of Evaluation Page
$text = "<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' type='text/css' href='css/style.css'>
    <link href='https://fonts.googleapis.com/css?family=Poppins:600&display=swap' rel='stylesheet'>
    <script src='https://kit.fontawesome.com/a81368914c.js'></script>
    <script defer src='../js/update_total_marks.js'></script>
    <link href='../css/style.css' rel='stylesheet'>
    <title>Evaluation Form</title>
</head>

<body>
<div class='nav-bar'>
<ul>
  <li><a href='../admin_login.html'>Admin Login</a></li>
  <li><a class='active' href='../index.html'>Staff Login</a></li>
</ul>
</div>

<input type='number' name='id' id='id' value ='".$last_id[0]."' readonly class='paper-id'>

<main>
<img class='wave' src='../img/wave.png'>
<div class='evaluation-form-container'>
    <body>
        <table class='styled-table evaluation-table'>
            <tr>
                <th>Questions</th>
                <th>Out of</th>
                <th>Score</th>
            </tr>
            <tr>
                <td class='question-no'>1</td>
                <td>10</td>
                <td><input type='number' class='section-marks-input' value='0' min='0' max='10'></td>
            </tr>
            <tr>
                <td class='question-no'>2</td>
                <td>10</td>
                <td><input type='number' class='section-marks-input' value='0' min='0' max='10'></td>
            </tr>
            <tr>
                <td class='question-no'>3</td>
                <td>10</td>
                <td><input type='number' class='section-marks-input' value='0' min='0' max='10'></td>
            </tr>
            <tr>
                <td class='question-no'>4</td>
                <td>10</td>
                <td><input type='number' class='section-marks-input' value='0' min='0' max='10'></td>
            </tr>
            <tr>
                <td class='question-no'>5.1</td>
                <td>5</td>
                <td><input type='number' class='section-marks-input' value='0' min='0' max='5'></td>
            </tr>
            <tr>
                <td class='question-no'>5.2</td>
                <td>5</td>
                <td><input type='number' class='section-marks-input' value='0' min='0' max='5'></td>
            </tr>
        </table>
        <form action='../send_marks.php?id=".$last_id[0]."' method='POST'>
        <div class='total-marks-container'>
            <label for='total-marks'>    
Total Score (Out of 30):            
</label>
            <input id='total-marks' name='total-marks' type='number' value='0' readonly min='0' max='30' class='total-marks'>
            </div>
            <div class='finalize-paper-container'>
            <input id='finish-paper' type='submit' value='Finish Paper' class='button'>
            <a href='../delete.php?name=".$file["name"]."&id=".$last_id[0]."' class='button reject-paper-button'>Reject Paper</a>
        </form>
            </div>
</div>
    <div class='embedded-pdf-container'>
    <embed src='../uploads/{$file["name"]}' width='100%' height='100%'></embed></body>
</div>
</main>
</html>";

file_put_contents("evaluation_forms/{$file["name"]}.html", $text, FILE_APPEND | LOCK_EX);
?>
