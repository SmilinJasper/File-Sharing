<html>

<head>
    <title>Staff Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="js/update_page.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<!--Navigation bar-->
<div class="nav-bar">
<ul>
  <li><a href="admin_login.html">Admin Login</a></li>
  <li><a class="active" href="index.html">Staff Login</a></li>
</ul>
</div>

<body>
<!--Background image-->
<img class="wave" src="img/wave.png">

<!--Page wrapper-->
<main class="page-wrapper">

<!--Dashboard Header-->
<header class="center">
<h1 >DASHBOARD</h1>
</header>

<!--Back button-->
<div class="back-button"><input type="button" class="button" value="Back" onclick="history.back()"></div>   

<?php

//Connect to MySQL database
$connect = mysqli_connect("sql111.epizy.com", "epiz_28308908", "tq4nOlJirw", "epiz_28308908_student_database");

//Get all info from database table
$sql = "SELECT * FROM student_exam_results";  
$result = mysqli_query($connect, $sql);

//Scan directory for uploads
$files = chdir("uploads");
array_multisort(array_map('filemtime', ($files = glob("*.{pdf}", GLOB_BRACE))), SORT_DESC, $files);
$orderedFiles = array_reverse($files);

?>

<br />

<!--Table with answersheets info-->
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

     //Display all info from database table and link to answersheet
     $index =0;
     while($row = mysqli_fetch_array($result))  
     {  
        echo "  
       <tr>  
         <td>".$row['id']."</td>  
         <td><a class='button' href='evaluation_forms/".$orderedFiles[$index].".html'>Check Answersheet</a></td>
         <td>".$row['is_checked']."</td>  
         <td>".$row['marks']."</td>  
         <td>".$row['attendance']."</td>  
       </tr>  
        ";  
        $index++;
     }

     // Close connection 
       mysqli_close($connect); 

     ?>
    </table></center>
    </div>
   </main>
   </body>
</html>