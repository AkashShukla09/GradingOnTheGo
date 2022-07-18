<?php
$con = mysqli_connect("localhost","root","");
if (!$con)
{
    die("Error Connecting to DB".mysqli_connect_error());
}
$db=mysqli_select_db($con,"osp");

$sql = "CREATE table campus (campus varchar(10), exam varchar(4))";


if (mysqli_query($con, $sql) )
{
    echo "Table Created";
}
else
{
    echo "Error:". mysqli_error($con);
}
mysqli_close($con);