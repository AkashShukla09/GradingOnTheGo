<?php

    $ccode = $_POST['ccode'];
    $cname = $_POST['cname'];
    $faculty = $_POST['faculty'];
    $slot = $_POST['slot'];
    $marks = $_POST['marks'];

   $conn = new mysqli('localhost', 'root', '', 'osp');
   if ($conn -> connect_error) {
       die('connection failed  : '.$conn->connect_error);
    
   }else{
       $stmt = $conn->prepare("insert into course(ccode, cname, faculty, slot, marks) values(?, ?, ?, ?, ?)");
       $stmt->bind_param("ssssi", $ccode, $cname, $faculty, $slot, $marks);
       $stmt->execute();
       echo 'done';
       $stmt->close();
       $conn->close();
   }

?>