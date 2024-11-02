<!DOCTYPE html>
<html lang="en">
<head>
<?php

include 'head.php';
    ?>
<?php
  if($_SESSION['user_type']!='Admin')
  {
    ?>
    <script>
        window.open('admin_dash.php','_self');
    </script><?php
  }
  ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD BRANCH</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">
    <style>
        <?php
  include 'css/admin_dash.css';
  include 'css/update_name.css'
  ?>
  .box form input{
border: 1px solid black;
border-radius: 5px;  
}
.box form input[type="submit"]{
    
    height: 45px;
    border: none;
    border-radius: 5px;
    font-weight: 400;
    font-size: 20px;
    color: rgba(255, 255, 255, 1);
    background-color:  rgba(143, 109, 255, 1);
    cursor: pointer;
    transition: 0.5s;
}
.box form h2{
    color:black;
    font-weight: 500;
    font-size: 30px;

}
#not
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
#add2{
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
include 'options/br.php';
include 'admin_side.php';
?>
        <div class="box">
            

<form action="" id="f" role="form" method="post">
<h2><i>New Branch</i></h2>

        <input type="text" name="branch" required placeholder="Branch code">
        <input type="text" name="name" required placeholder="Branch Name">
        <input type="submit" value="ADD" name="btn">
        <p id="not">Branch Is Already Exists</p>

    </form></div></div>
</body>
</html>
<?php
require 'connect_db.php';

if(isset($_POST['btn']))
{
    $branch=$_POST['branch'];
$name=$_POST['name'];
$result3=mysqli_num_rows(mysqli_query($connect,"SELECT *FROM student_management.branch WHERE name='$branch'"));
        if($result3<=0)
        {
            $result=mysqli_query($connect,"INSERT INTO student_management.branch (name,bname) VALUES ('$branch','$name')");
            $result1=mysqli_query($connect,"CREATE TABLE student_management.$branch (name VARCHAR(255) NOT NULL , code INT NOT NULL , sem INT NOT NULL , type VARCHAR(10) NOT NULL , PRIMARY KEY (code))");
            if($result1 and $result)
            {
                $result7=mysqli_fetch_row(mysqli_query($connect,"SELECT MAX(batch) FROM student_management.batch"));
                $batch=$result7[0];
                for($x=1;$x<=3;$x++)
                {
                    $t_att=$branch.'_att';
                    $t_face=$branch.'_face';
                    mysqli_query($connect,"CREATE TABLE IF NOT EXISTS d$batch.$branch (id VARCHAR(12) NOT NULL , name VARCHAR(255) NOT NULL , lname VARCHAR(255) NOT NULL , fname VARCHAR(255) NOT NULL , mname VARCHAR(255) NOT NULL , img VARBINARY(255) NOT NULL , gender VARCHAR(255) NOT NULL , dob DATE NOT NULL , phone BIGINT NOT NULL , address TEXT NOT NULL , PRIMARY KEY (`id`(12)))");
                    mysqli_query($connect,"CREATE TABLE IF NOT EXISTS d$batch.$t_att(id VARCHAR(12) NOT NULL ,img VARBINARY(255) NOT NULL ,PRIMARY KEY (`id`(12)))");
                    mysqli_query($connect,"CREATE TABLE IF NOT EXISTS d$batch.$t_face(dt DATE ,sem BIGINT NOT NULL , PRIMARY KEY (`dt`))");
                    $batch=$batch-1000;
                }
                ?>
                <script>
                        Swal.fire({
                       icon: 'success',
                        title: 'Branch Added Successfully'
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
                        title: 'Can Not Create Table'
                        })
                </script>
                <?php 
            }

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


?>
