<!DOCTYPE html>
<html lang="en">
<head>
        <?php
    include 'head.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE NAME</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">
    <style>
        <?php
        include 'css/update_side.css';
        include 'css/update_name.css'
        ?>
          #up1{
            background-color:rgba(129, 71, 231, 0.2);
   
        }
    </style>
</head>
<body>
    <?php
include 'update_header.php';
    ?>
    <div class="cont">
<?php
include 'update_emp_side.php';
?>
    <div class="box">
    <form action="" method="post"> 
        <input type="text" name="fname" required placeholder="First Name"></br>
        <input type="text" name="lname" required placeholder="Larst Name"></br>
        <input type="submit" name="update" value="Update">
    </form></div></div>
    

</body>
</html>
<?php
require 'connect.php';
if(isset($_POST['update']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $username=$_SESSION['m5'];
$sql="UPDATE admin SET fname='$fname',lname='$lname'  WHERE username='$username'";
$result=mysqli_query($connect,$sql);
if($result)
{
    ?>
    <script>
            Swal.fire({
           icon: 'success',
            title: 'Updated'
            })
    </script>
    <?php

}
else
{
    ?>
    <script>
            Swal.fire({
           icon: 'error',
            title: 'Not Updated'
            })
    </script>
    <?php
}
}

?>
