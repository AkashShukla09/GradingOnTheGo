<?php

    $name = $_POST['name'];
    $reg = $_POST['reg'];
    $email = $_POST['email'];

   $conn = new mysqli('localhost', 'root', '', 'osp');
   if ($conn -> connect_error) {
       die('connection failed  : '.$conn->connect_error);
    
   }else{
       $stmt = $conn->prepare("insert into student(name, reg, email) values(?, ?, ?)");
       $stmt->bind_param("sss", $name , $reg , $email);
       $stmt->execute();
       echo 'Data Saved';
       echo "<div class='text-center'><button style='background: white;' type='submit'><a href='course.html' style='color: black; text-decoration: none;'>Enter Campus Details</a></button></div>";
       $stmt->close();
       $conn->close();
   }

?>