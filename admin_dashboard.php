<html>

<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="js/update_page.js"></script>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="upload-form-body">

    <!--Navigation bar-->
    <nav>
        <ul class="nav-bar">
            <li><a class="student-login-nav" href="student_login.php">Student Login</a></li>
            <li><a href="index.html">Staff Login</a></li>
            <li><a class="active" href="admin_login.html">Admin Login</a></li>
        </ul>
    </nav>

    <!--Background image-->
    <img class="wave" src="img/wave.png">

    <!--Page wrapper-->
    <main class="page-wrapper">

        <section class="add-user">
            <a class="button button__add-user" href="student_registration_form.php">Add New Student</a>
            <a class="button button__add-user" href="staff_registration_form.php">Add New Staff</a>
        </section>

        <?php

        // Include database file
        include "database.php";

        //Get all info from database table
        $sql = "SELECT * FROM student_exam_results";
        $result = mysqli_query($conn, $sql);

        //Scan directory for uploads
        $files = chdir("uploads");
        array_multisort(array_map('filemtime', ($files = glob("*.{pdf}", GLOB_BRACE))), SORT_DESC, $files);
        $orderedFiles = array_reverse($files);

        ?>

        <!--Table with answersheets info-->
        <br />
        <div class="table-responsive">
            <center>
                <table class="styled-table">
                    <tr>
                        <th>Assignment Id</th>
                        <th>Is Checked</th>
                        <th>Marks</th>
                        <th>Attendance</th>
                    </tr>
                    <?php

                    //Display all info from database table and link to answersheet
                    $index = 0;
                    while ($row = mysqli_fetch_array($result)) {
                        echo "  
       <tr>  
         <td>" . $row['id'] . "</td>  
         <td>" . $row['is_checked'] . "</td>  
         <td>" . $row['marks'] . "</td>  
         <td>" . $row['attendance'] . "</td>  
       </tr>  
        ";
                        $index++;
                    }

                    // Close connection 
                    mysqli_close($conn);

                    ?>

                </table>
            </center>
        </div>
    </main>
</body>

</html>