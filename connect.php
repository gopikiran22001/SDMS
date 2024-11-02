<?php
$host="localhost";
$user="root";
$password="gopikiran";
$db="student_management";
$connect=mysqli_connect($host,$user,$password,$db);
if(!$connect)
{
    die("could not connect to database server");
}
?>