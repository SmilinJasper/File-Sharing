
<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "student_data");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM student_database";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Reg No</th>  
                         <th>Name</th>  
                         <th>Subject</th>  
       <th>Date</th>
       <th>Marks</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["Reg No"].'</td>  
                         <td>'.$row["Name"].'</td>  
                         <td>'.$row["Subject"].'</td>  
       <td>'.$row["Date"].'</td>  
       <td>'.$row["Marks"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=marklist.xls');
  echo $output;
 }
}
?>
