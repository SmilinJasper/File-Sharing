<?php

//Delete pdf and evaluation form
unlink("uploads/{$_GET["name"]}");
unlink("evaluation_forms/{$_GET["name"]}.html");

//Connect to MySQL structure
$con=mysqli_connect("sql111.epizy.com", "epiz_28308908", "tq4nOlJirw", "epiz_28308908_student_database");

// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = $_GET['id']; // $id is now defined

//Delete entry of answersheet from MySQL table
mysqli_query($con,"DELETE FROM student_exam_results WHERE id='".$id."'");

//Close connection
mysqli_close($con);

// Redirecting back
header("Location: paper_rejected_info.html");
?>