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


       $sql = " select marks from course where ccode = '$ccode' and cname = '$cname' and faculty = '$faculty' and slot = '$slot'";
        $query = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($query);
        $tot=0;
        echo "$count";
        
        
        if ($count > 0) {
            while($row = mysqli_fetch_array($conn, $query)) {
              echo "Marks: {$row['marks']}";
                $tot+=$row['marks'];
              // echo "EMP ID :{$row['emp_id']}  <br> ".
              //    "EMP NAME : {$row['emp_name']} <br> ".
              //    "EMP SALARY : {$row['emp_salary']} <br> ".
              //    "--------------------------------<br>";
           }
           echo "$tot";
        }
        else {
            echo "No Data Found";
        }


       echo 'Data Saved';
       echo "<div class='text-center'><button style='background: white;' type='submit'><a href='grade.html' style='color: black; text-decoration: none;'>Enter Campus Details</a></button></div>";
       $stmt->close();
       $conn->close();
   }

?>