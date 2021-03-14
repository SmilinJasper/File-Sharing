<?php

// Getting uploaded file
$file = $_FILES["file"];

// Uploading in "uplaods" folder
move_uploaded_file($file["tmp_name"], "uploads/" . $file["name"]);

// Redirecting back
header("Location: " . $_SERVER["HTTP_REFERER"]);

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