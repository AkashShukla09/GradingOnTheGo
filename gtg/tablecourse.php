<?php
$con = mysqli_connect("localhost","root","");
if (!$con)
{
    die("Error Connecting to DB".mysqli_connect_error());
}
$db=mysqli_select_db($con,"osp");

$sql = "CREATE table course (ccode varchar(7), cname varchar(25), faculty varchar(25), slot varchar(10), marks int(3))";


if (mysqli_query($con, $sql) )
{
    echo "Table Created";
}
else
{
    echo "Error:". mysqli_error($con);
}
mysqli_close($con);