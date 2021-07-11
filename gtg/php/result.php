<?php
    $con = mysqli_connect("localhost","root","");
    if (!$con)
    {
        die("Error Connecting to DB".mysqli_connect_error());
    }
    $db=mysqli_select_db($con,"osp");

    $ccode = $_POST['ccode'];
    $cname = $_POST['cname'];
    $faculty = $_POST['faculty'];
    $slot = $_POST['slot'];
    
    $sql = " select marks from course where ccode = '$ccode' and cname = '$cname' and faculty = '$faculty' and slot = '$slot'";
    $query = mysqli_query($con, $sql);
    $count = mysqli_num_rows($query);
    $tot=0;

    
    
    if ($count > 0) {
        while($row = mysql_fetch_array($con, $query)) {
            $tot+={$row['marks']};
          // echo "EMP ID :{$row['emp_id']}  <br> ".
          //    "EMP NAME : {$row['emp_name']} <br> ".
          //    "EMP SALARY : {$row['emp_salary']} <br> ".
          //    "--------------------------------<br>";
       }
    }
    else {
        echo "No Data Found";
    }

?>