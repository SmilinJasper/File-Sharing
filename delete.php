<?php

//Delete pdf and evaluation form
unlink("uploads/{$_GET["name"]}");
unlink("evaluation_forms/{$_GET["name"]}.html");

//Connect to MySQL structure
$con=mysqli_connect("localhost", "root", "", "epiz_28308908_student_data");

// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = $_GET['id']; // $id is now defined

// or assuming your column is indeed an int
// $id = (int)$_GET['id'];

mysqli_query($con,"DELETE FROM student_database WHERE id='".$id."'");
mysqli_close($con);

// Redirecting back
header("Location: paper_rejected_info.html");
?>