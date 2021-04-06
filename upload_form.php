<html>

<head>
    <title>Upload Form</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="js/update_page.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<div class="nav-bar">
<ul>
  <li><a class="admin-login-nav active" href="admin_login.html">Admin Login</a></li>
  <li><a href="index.html">Staff Login</a></li>
</ul>
</div>

<img class="wave" src="img/wave.png">
<main class="page-wrapper">
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
$connect = mysqli_connect("sql111.epizy.com", "epiz_28308908", "tq4nOlJirw", "epiz_28308908_student_database");
$sql = "SELECT * FROM student_exam_results";  
$result = mysqli_query($connect, $sql);
$files = scandir("uploads");
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
     $index =count($files)-1;
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
        $index--;
     }
     ?>
    </table></center>
    </div>
   </main>
</html>