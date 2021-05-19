<?php

    $reg = $_POST['reg'];
    $ccode = $_POST['ccode'];
    $cname = $_POST['cname'];
    $faculty = $_POST['faculty'];
    $slot = $_POST['slot'];
    $exam = $_POST['exam'];
    $marks = $_POST['marks'];

   $conn = new mysqli('localhost', 'root', '', 'osp');
   if ($conn -> connect_error) {
       die('connection failed  : '.$conn->connect_error);
    
   }else{
    $regquery = " select * from course where reg = '$reg' and ccode = '$ccode' and  exam = '$exam'";
    $sql2 = mysqli_query($conn, $regquery);

    $regcount = mysqli_num_rows($sql2);
    
    if ($regcount > 0) {
        echo "You have already entered marks for the following subject and exam";
    }
    else {
       $stmt = $conn->prepare("insert into course(reg, ccode, cname, faculty, slot, exam, marks) values(?, ?, ?, ?, ?, ?, ?)");
       $stmt->bind_param("ssssssi", $reg, $ccode, $cname, $faculty, $slot, $exam, $marks);
       $stmt->execute();


       $sql = " select marks from course where ccode = '$ccode' and faculty = '$faculty' and slot = '$slot'  and exam = '$exam'";
        $query = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($query);
        $tot=0;
        // echo "$count";
        echo 'Data Saved';
        
        if ($count > 0) {
            while($row = mysqli_fetch_array($query)) {
              
                $tot+=$row['marks'];
              // echo "EMP ID :{$row['emp_id']}  <br> ".
              //    "EMP NAME : {$row['emp_name']} <br> ".
              //    "EMP SALARY : {$row['emp_salary']} <br> ".
              //    "--------------------------------<br>";
           }
           echo "<br> $tot <br>";
           $avg = $tot/$count;
           echo "$avg <br>";
           $meansquare=0;
           // $i=1;

           $sql1 = " select marks from course where ccode = '$ccode' and cname = '$cname' and faculty = '$faculty' and slot = '$slot'";
           $query1 = mysqli_query($conn, $sql1);

          while($rows = mysqli_fetch_array($query1)) {
            // echo "1";
              // echo $row['marks'];
            // echo "<br>".$rows['marks'];
                $meansquare+=(pow(($rows['marks']-$avg),2));
              // echo "EMP ID :{$row['emp_id']}  <br> ".
              //    "EMP NAME : {$row['emp_name']} <br> ".
              //    "EMP SALARY : {$row['emp_salary']} <br> ".
              //    "--------------------------------<br>";
                // $i=$i+1;
           }
           echo "ms: $meansquare <br>";
           $meansquare=$meansquare/$count;
           echo "ms2: $meansquare <br>";
           $msf=sqrt($meansquare);
           echo "msf: $msf <br>";
        }

        else {
            echo "No Data Found";
        }


       
       echo "<div class='text-center'><button style='background: white;' type='submit'><a href='grade.html' style='color: black; text-decoration: none;'>See Report</a></button></div>";
       $stmt->close();
       $conn->close();
   }
  }

?>