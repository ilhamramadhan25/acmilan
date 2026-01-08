<?php
date_default_timezone_set('asia/jakarta');

$servername="localhost";
$username="root";
$password="";
$db="webacmilan";

$conn=new mysqli($servername,$username,$password,$db);

if($conn->connect_error)
{
    die("conection failed : ".$conn->connect_error);
}

//echo "connected successfully<hr>";
?>