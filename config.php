<?php

$server ="localhost";
$user ="root";
$password ="";
$db="database";

$con =mysqli_connect($server,$user,$password,$db);

if(!($con)){
    echo "connection unsuccesful";
}
?>