<?php

//Moves uploaded files to a directory
$targetPath = "upload/" . basename($_FILES["upload-file"]["name"]);
move_uploaded_file($_FILES["upload-file"]["tmp_name"], $targetPath);