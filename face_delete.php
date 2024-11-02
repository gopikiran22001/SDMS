
<!DOCTYPE html>
<html lang="en">
<head>
<?php

include 'head.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELETE FACE</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">

    <style>
        <?php
  include 'css/admin_dash.css';
  include 'css/stdid.css';
  ?>
  #att4{
            background-color:rgba(129, 71, 231, 0.2);
   
        }
    </style>
</head>
<body>
<?php
    include 'admin_header.php';
    ?>
    <div class="cont">
<?php
include 'options/att.php';
include 'admin_side.php';
?>
        <div class="box">
            

    <form action="" method="post">
        <input type="text" name="id" id="" required placeholder="ID">
        <input type="submit" value="Delete" name="btn">
    </form></div></div>
</body>
</html>
<?php
require 'connect_db.php';
if(isset($_POST['btn']))
{
    $id=$_POST['id'];
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
    $att=$branch.'_att';
    $att_f=$branch.'_face';
    $c_1=mysqli_num_rows(mysqli_query($connect,"SELECT *FROM student_management.batch WHERE batch='$db'"));
if($c_1>0)
{
    $c_2=mysqli_num_rows(mysqli_query($connect,"SELECT *FROM student_management.branch WHERE name='$branch'"));
    if($c_2>0)
    {
        $result1=mysqli_query($connect,"SELECT * FROM d$db.$att WHERE id='$id'");
        $count=mysqli_num_rows($result1);
    if($count>0)
    {
        $result2=mysqli_query($connect,"DELETE FROM d$db.$att WHERE id='$id'");
        $result5=mysqli_query($connect,"ALTER TABLE d$db.$att_f DROP COLUMN $batch$branch$roll");
        if($result2  and $result5)
            {
                ?>
                <script>
                  Swal.fire({
        icon: 'success',
        title: 'Deleted !'
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
              title: 'Can not Delete Table'
          })
                </script>
                <?php
            }
    }
    else
    {
        ?>
                <script>
                           Swal.fire({
                            icon: 'error',
                            title: 'Can Not Find ID'
                            })
                </script>
                <?php
    }
    }
    else
    {
        ?>
        <script>
                Swal.fire({
               icon: 'error',
                title: 'Invalid ID'
                })
        </script>
        <?php
    }
}
else
{
    ?>
    <script>
            Swal.fire({
           icon: 'error',
            title: 'Invalid ID'
            })
    </script>
    <?php
}
}
?>