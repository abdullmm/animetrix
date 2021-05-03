<?php


$servername = "localhost";
$username = "root";
$password = "";
$dBName = "test";

$conn = mysqli_connect($servername,$username,$password,$dBName);

if(!$conn) {
    die("connection failed: ".mysqli_connect_error());
}