<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "shop";


$con = mysqli_connect($host,$username,$password,$dbname);

if(!$con){
    die("Connection Error: ".mysqli_connect_error());
}







?>