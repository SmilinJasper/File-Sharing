<?php 
include_once 'db.php';
if(isset($_POST['submit']))
{    
     $marks = $_POST['marks'];
     $sql = "INSERT INTO student_database VALUES ('$marks')";
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>;
