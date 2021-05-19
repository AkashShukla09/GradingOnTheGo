<?php

    $name = $_POST['name'];
    $email = $_POST['email'];
    $campus = $_POST['campus'];

   $conn = new mysqli('localhost', 'root', '', 'osp');
   if ($conn -> connect_error) {
       die('connection failed  : '.$conn->connect_error);
    
   }else{
       $stmt = $conn->prepare("insert into student(name, email, campus) values(?, ?, ?)");
       $stmt->bind_param("sss", $name , $email, $campus);
       $stmt->execute();
       echo 'Data Saved';
       echo "<div class='text-center'><button style='background: white;' type='submit'><a href='course.html' style='color: black; text-decoration: none;'>Enter Course Details</a></button></div>";
       $stmt->close();
       $conn->close();
   }

?>