<?php

    $campus = $_POST['campus'];
    $exam = $_POST['exam'];

   $conn = new mysqli('localhost', 'root', '', 'osp');
   if ($conn -> connect_error) {
       die('connection failed  : '.$conn->connect_error);
    
   }else{
       $stmt = $conn->prepare("insert into campus(campus, exam) values(?, ?)");
       $stmt->bind_param("ss", $campus, $exam);
       $stmt->execute();
       echo 'inserted';
       $stmt->close();
       $conn->close();
   }

?>