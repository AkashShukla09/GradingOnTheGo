<?php

 
    $con = mysqli_connect("localhost","root","");
    if (!$con)
    {
        die("Error Connecting to DB".mysqli_connect_error());
    }
    $db=mysqli_select_db($con,"osp");

    $reg = $_POST['reg'];
    $email = $_POST['email'];
    if(preg_match("/^[a-z0-9._-]+@vitstudent.ac.in$/", $email)){
        
            $pass = $_POST['pass'];


    $emailquery = " select * from user where email = '$email' ";
    $query = mysqli_query($con, $emailquery);

    $emailcount = mysqli_num_rows($query);
    
    if ($emailcount > 0) {
        echo "<p style='text-align: center;'>Email already exist </p>";
    }
    else {
        $insert = "insert into user(reg, email, password) values('$reg','$email','$pass')";

        $iquery = mysqli_query($con , $insert);

        if ($iquery) {
            echo "<p  style='text-align: center;'>Sign Up Successful</p>";
            echo "<div class='text-center'><button style='background: yellow;' type='submit'><a href='login.html' style='color: black; text-decoration: none;'>Login</a></button></div>";
        }
        else{
            echo "Error";
        }
       
    }

    }else{
        echo "<p style='text-align: center;'> You are not a vit student <p>";
    }

?>