<?php
$host="localhost";
$user="root";
$password="gopikiran";
$connect=mysqli_connect($host,$user,$password);
if(!$connect)
{
    die("could not connect to database server");
}
?>