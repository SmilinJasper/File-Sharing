<?php 

//Connect to MySQL database
$conn = mysqli_connect("localhost","root","","student_database"); 
          
// Check connection 
if($conn === false){ 
    die("ERROR: Could not connect. " 
        . mysqli_connect_error()); 
} 

//Send marks to row with paper's id
$id = $_GET['id'];

     $totalMarks = $_REQUEST['total-marks'];
     $sql = "UPDATE student_exam_results SET marks =  $totalMarks,
     is_checked ='Yes' WHERE id = $id";

//Redirect to mark updated message if successful
if (mysqli_query($conn, $sql)) {
    header("Location: mark_updated.html");
   }    

    //Close connection
    mysqli_close($conn);  

?>;
