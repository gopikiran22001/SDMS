<?php
require 'connect_db.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include 'head.php';
    ?><meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT DETAILS</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png"> 
    <style>
    <?php
        include 'css/update_side.css';
        include 'css/update_name.css'

        ?>
        #up2{
            background-color:rgba(129, 71, 231, 0.2);
   
        }
    </style>
</head>
<body>
<?php
include 'update_header.php';
$id=$_SESSION['std_id'];
    ?>
<div class="cont">
<?php
include 'update_std_side.php';
?>
    <div class="box">
<form action="" method="post"> 
        <input type="text" name="fname" required placeholder="Father Name"></br>
        <input type="text" name="mname" required placeholder="Mother Name"></br>
        <input type="submit" name="btn" value="Update">
    </form></div></div>
</body>
</html>
<?php

require 'connect_db.php';

$batch=substr($id,0,5);
$branch=substr($id,6,2);
$roll=substr($id,9,3);
$d=substr($id,0,2);
    $b=466;
    $db=$d.$b;
if(strlen($id)==11)
    {
        $branch=substr($id,6,1);
        $roll=substr($id,8,3);
    }
if(isset($_POST['btn']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['mname'];
    $sql="UPDATE d$db.$branch SET fname='$fname',mname='$lname'  WHERE id='$id'";
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
