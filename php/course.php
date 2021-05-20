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
        echo 'Data Saved<br>';
        
        if ($count > 0) {
            while($row = mysqli_fetch_array($query)) {
              
                $tot+=$row['marks'];
              // echo "EMP ID :{$row['emp_id']}  <br> ".
              //    "EMP NAME : {$row['emp_name']} <br> ".
              //    "EMP SALARY : {$row['emp_salary']} <br> ".
              //    "--------------------------------<br>";
           }
          //  echo "<br> $tot <br>";
           $avg = $tot/$count;
          //  echo "$avg <br>";
           $meansquare=0;
           // $i=1;

           $sql1 = " select marks from course where ccode = '$ccode' and cname = '$cname' and faculty = '$faculty' and slot = '$slot' and exam = '$exam'";
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
          //  echo "ms: $meansquare <br>";
           $meansquare=$meansquare/$count;
          //  echo "ms2: $meansquare <br>";
           $msf=sqrt($meansquare);
          //  echo "msf: $msf <br>";
           $avg=round($avg,2);
           $msf=round($msf,2);


           //max marks query
           $sql2 = " select marks from course where ccode = '$ccode' and cname = '$cname' and faculty = '$faculty' and slot = '$slot' and exam = '$exam' order by marks desc limit 1";
           $query2 = mysqli_query($conn, $sql2);
           $max = 0;

           while($rows2 = mysqli_fetch_array($query2)) {
              
            $max = $rows2['marks'];
              
           }


           echo "Subject Info: <br>";
           echo "<div style='overflow-x: auto;'> <table border='2'> <thead> <th style='padding: 5px;'>Strength</th> <th style='padding: 5px;'>Max. Marks</th> <th style='padding: 5px;'>Average</th> <th style='padding: 5px;'>Standard Deviation</th> </thead>";
           echo "<tr>";
           echo "<td style='padding: 5px; text-align: center;'> $count </td>";
           echo "<td style='padding: 5px; text-align: center;'> $max </td>";
           echo "<td style='padding: 5px; text-align: center;'> $avg </td>"; 
           echo "<td style='padding: 5px; text-align: center;'> $msf </td>";
           echo "</tr>"; 
           echo "</table></div>";
           echo "<br>";


           echo "Grade Table: <br>";
           echo "<div style='overflow-x: auto;'> <table border='2'> <thead> <th style='padding: 5px;'>S</th> <th style='padding: 5px;'>A</th> <th style='padding: 5px;'>B</th> <th style='padding: 5px;'>C</th><th style='padding: 5px;'>D</th> <th style='padding: 5px;'>E</th> <th style='padding: 5px;'>F</th></thead>";

           echo "<tr>";
           $s = round(($avg+1.5*$msf),0);
           $a = round(($avg+0.5*$msf),0);
           $b = round(($avg-0.5*$msf),0);
           $c = round(($avg-1*$msf),0);
           $d = round(($avg-1.5*$msf),0);
           $e = round(($avg-2*$msf),0);

           if($b<0)
           {
             $b=0;
           }
           if($c<0)
           {
             $c=0;
           }
           if($d<0)
           {
             $d=0;
           }
           if($e<0)
           {
             $e=0;
           }
           

           echo "<td style='padding: 5px; text-align: center;'> >$s </td>";
           echo "<td style='padding: 5px; text-align: center;'> >$a </td>";
           echo "<td style='padding: 5px; text-align: center;'> >$b </td>"; 
           echo "<td style='padding: 5px; text-align: center;'> >$c </td>";
           echo "<td style='padding: 5px; text-align: center;'> >$d </td>";
           echo "<td style='padding: 5px; text-align: center;'> >$e </td>";
           echo "<td style='padding: 5px; text-align: center;'> <$e </td>";
           echo "</tr>"; 
           echo "</table></div>";
        }

        else {
            echo "No Data Found";
        }


       
      //  echo "<div class='text-center'><button style='background: white;' type='submit'><a href='grade.html' style='color: black; text-decoration: none;'>See Report</a></button></div>";
       $stmt->close();
       $conn->close();
   }
  }

?>