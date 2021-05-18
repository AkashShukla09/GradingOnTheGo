<?php
   $conn = new mysqli('localhost', 'root', '', 'osp');

    $campus = $_POST['campus'];
    $exam = $_POST['exam'];

   if ($conn -> connect_error) {
       die('connection failed  : '.$conn->connect_error);
    
   }else{
       $stmt = $conn->prepare("insert into campus(campus, exam) values(?, ?)");
       $stmt->bind_param("ss", $campus, $exam);
       $stmt->execute();
       echo 'Data Saved';
       echo "<div class='text-center'><button style='background: white;' type='submit'><a href='student.html' style='color: black; text-decoration: none;'>Enter Student Details</a></button></div>";
       $stmt->close();
       $conn->close();
   }

?>