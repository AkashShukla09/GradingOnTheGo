<?php
    $con = mysqli_connect("localhost","root","");
    if (!$con)
    {
        die("Error Connecting to DB".mysqli_connect_error());
    }
    $db=mysqli_select_db($con,"osp");

    $email = $_POST['mail'];
    $pass = $_POST['pass'];


    $emailquery = " select * from user where email = '$email' AND password = '$pass'";
    $query = mysqli_query($con, $emailquery);

    $emailcount = mysqli_num_rows($query);
    
    if ($emailcount < 1) {
        echo "Email/Password does not exist";
        // echo "$emailcount";
    }
    else {
        echo "Login Successful";

        echo "<div class='text-center'><button style='background: white;' type='submit'><a href='student.html' style='color: black; text-decoration: none;'>Enter New Marks</a></button></div>";

        echo "<div class='text-center'><button style='background: white; margin-top: 15px;' type='submit'><a href='report.html' style='color: black; text-decoration: none;'>Already Entered Marks</a></button></div>";
        
       
    }
?>