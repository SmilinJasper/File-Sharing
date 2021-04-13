<?php

$files = scandir("uploads");
?>
<html>

<head>
    <title>Staff Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="js/update_page.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<div class="nav-bar">
<ul>
  <li><a href="admin_login.html">Admin Login</a></li>
  <li><a class="active" href="index.html">Staff Login</a></li>
</ul>
</div>

<img class="wave" src="img/wave.png">
<main class="page-wrapper">
<header class="downloads-header">
<h1 >DASHBOARD</h1>
</header>
<div class="downloads-container">

<div class="back-button"><input type="button" class="button" value="Back" onclick="history.back()"></div>   
<?php
//Connect to MySQL database
$connect = mysqli_connect("localhost", "root", "", "student_database");

//Get all info from database table
$sql = "SELECT * FROM student_exam_results";  
$result = mysqli_query($connect, $sql);

//Scan directory for uploads
$files = scandir("uploads");
echo "$files[4]";

?>

<br />
<div class="table-responsive">  
   <center> <table class="styled-table">
     <tr>  
                         <th>Assignment Id</th>  
                         <th>Check Answersheet</th>
                         <th>Is Checked</th>  
                         <th>Marks</th>
                         <th>Attendance</th>  
                    </tr>
     <?php
     //Display all info from database table and link to paper
     $index =2;
     while($row = mysqli_fetch_array($result))  
     {  
        echo "  
       <tr>  
         <td>".$row['id']."</td>  
         <td><a class='button' href='evaluation_forms/".$files[$index].".html'>Check Answersheet</a></td>
         <td>".$row['is_checked']."</td>  
         <td>".$row['marks']."</td>  
         <td>".$row['attendance']."</td>  
       </tr>  
        ";  
        $index++;
     }
     ?>
    </table></center>
    </div>
   </main>
</html>

</div>
</main>
</html>
