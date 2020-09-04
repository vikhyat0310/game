<?php

$server ="localhost";
$user ="root";
$password ="";
$db="oss";

$con = mysqli_connect($server,$user,$password,$db);

if(!($con)){
    echo "connection unsuccesful";
}
?>