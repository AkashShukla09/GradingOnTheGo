<?php

    include 'dbconn.php';

    if(isset($_POST['submit'])){
        $reg = mysqli_real_escape_string($con, $_POST['reg']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $pass = mysqli_real_escape_string($con, $_POST['pass']);
    }


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
        ?>
        <script>
            alert("Inserted Successful");
        </script>
        <?php
        }else{
            ?>
            <script>
                alert("Error");
            </script>
            <?php
        }
       
        
    }

?>