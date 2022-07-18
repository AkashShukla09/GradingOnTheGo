<?php
$con = mysqli_connect("localhost","root","");
if (!$con)
{
    die("Error Connecting to DB".mysqli_connect_error());
}
$db=mysqli_select_db($con,"osp");

$sql = "CREATE table student (name varchar(25), reg varchar(9), email varchar(30))";


if (mysqli_query($con, $sql) )
{
    echo "Table Created";
}
else
{
    echo "Error:". mysqli_error($con);
}
mysqli_close($con);