<?php
    $con = mysqli_connect("localhost","root","");
    if (!$con)
    {
        die("Error Connecting to DB".mysqli_connect_error());
    }
    $db=mysqli_select_db($con,"osp");

    $reg = $_POST['reg'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];


    $emailquery = " select * from user where email = '$email' ";
    $query = mysqli_query($con, $emailquery);

    $emailcount = mysqli_num_rows($query);
    
    if ($emailcount > 0) {
        echo "Email already exist";
    }
    else {
        $insert = "insert into user(reg, email, password) values('$reg','$email','$pass')";

        $iquery = mysqli_query($con , $insert);

        if ($iquery) {
            echo "Sign Up Successful";
            echo "<div class='text-center'><button style='background: white;' type='submit'><a href='login.html' style='color: black; text-decoration: none;'>Login</a></button></div>";
        }
        else{
            echo "Error";
        }
       
    }

?>