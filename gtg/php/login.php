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
        echo "$emailcount";
    }
    else {
        echo "Login Successful";
        echo "<div class='text-center'><button style='background: white;' type='submit'><a href='campus.html' style='color: black; text-decoration: none;'>Enter Campus Details</a></button></div>";
       
    }

?>