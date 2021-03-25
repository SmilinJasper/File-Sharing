<?php 
$conn = mysqli_connect("localhost", "root", "", "student_data"); 
          
// Check connection 
if($conn === false){ 
    die("ERROR: Could not connect. " 
        . mysqli_connect_error()); 
} 


$id = $_GET['id'];

     $totalMarks = $_REQUEST['total-marks'];
     $sql = "UPDATE student_database SET marks =  $totalMarks,
     is_checked ='Yes' WHERE id = $id";
     if (mysqli_query($conn, $sql)) {
      header("Location: mark_updated.html");
     } 
     mysqli_close($conn);

?>;
