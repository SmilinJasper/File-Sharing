<html>

<head>
    <title>Upload Form</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="js/update_page.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="upload-form-body">

<!--Navigation bar-->
<div class="nav-bar">
<ul>
  <li><a class="admin-login-nav active" href="admin_login.html">Admin Login</a></li>
  <li><a href="index.html">Staff Login</a></li>
</ul>
</div>

<!--Background image-->
<img class="wave" src="img/wave.png">

<!--Page wrapper-->
<main class="page-wrapper">

<!--Upload form for answersheet-->
<div class="upload-form-container">
           <form class="upload-form" method="POST" action="upload.php" enctype="multipart/form-data">
                  <fieldset class="upload-form-fieldset">
        <legend>Upload Answersheet</legend>
        <div class="form-item">
            <label for="file">Attach Answersheet:</label>
            <input type="file" name="file" required="ture" accept="application/pdf">
                    </div>
                         </fieldset>
                         <div>
                             <div class="submit-button-container">
                    <input id ="submit-button" type="submit" value="Submit" class="button">
                    </div>
</div>
        </form>
</div>

<?php

//Connect to MySQL database
$connect = mysqli_connect("sql111.epizy.com","epiz_28308908","tq4nOlJirw","epiz_28308908_student_database");

//Get all info from database table
$sql = "SELECT * FROM student_exam_results";  
$result = mysqli_query($connect, $sql);

//Scan directory for uploads
$files = chdir("uploads");
array_multisort(array_map('filemtime', ($files = glob("*.{pdf}", GLOB_BRACE))), SORT_DESC, $files);
$orderedFiles = array_reverse($files);

?>

<!--Table with answersheets info-->
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