<!DOCTYPE html>
<html lang="en">
<head>
<?php
include 'head.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT DETAILS</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">    <style>
        <?php
        include 'css/admin_dash.css';
        include 'css/stdid.css';
        ?>
        .box form h2{
    color:black;
    font-weight: 500;
    font-size: 36px;

}
        #invalid,#not
{
    font-size: 20px;
    text-align: center;
    color: red;
    display: none;
    background-color: rgba(255, 0, 0, 0.15);
    padding-left: 15px;
    padding-right: 15px;
    padding-top: 5px;
    padding-bottom: 5px;
    border-radius: 5px;
}
        #std2{
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
include 'options/std.php';
include 'admin_side.php';
?>
        <div class="box">
    <form action="" method="post">
    <h2><i>Enter ID</i></h2>
        <input type="text" name="id" id="" required placeholder="Enter Pin">

        <input type="submit" value="Enter" name="btn">
        <p id="invalid">Invalid ID</p>
        <p id="not">Can Not Find ID</p>
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
    $c_1=mysqli_num_rows(mysqli_query($connect,"SELECT *FROM student_management.batch WHERE batch='$db'"));
    if($c_1>0)
    {
        $c_2=mysqli_num_rows(mysqli_query($connect,"SELECT *FROM student_management.branch WHERE name='$branch'"));
        if($c_2>0)
        {
            
    $result=mysqli_query($connect,"SELECT * FROM d$db.$branch WHERE id='$id'");
    $count=mysqli_num_rows($result);
    if($count>0)
    {
        $_SESSION['std_id']=$id;
        ?>
        <script>
            window.open('update_std2.php','_self');
          </script><?php
    }
    else
    {
        ?>
    <script>
                           document.getElementById("not").style.display = "block";

    </script>
    <?php
    }
        }
        else{
            ?>
    <script>
                           document.getElementById("invalid").style.display = "block";

    </script>
    <?php
        }
 
    }
    else{
        ?>
        <script>
                              document.getElementById("invalid").style.display = "block";

        </script>
        <?php
    }
}
?>