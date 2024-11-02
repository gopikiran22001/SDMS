
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
    <title>DELETE BATCH</title>
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
#add6{
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
include 'options/dev.php';
include 'admin_side.php';
?>
        <div class="box">
            

    <form action="" id="f" role="form" method="post">
    <h2><i>Delete Batch</i></h2>

        <input type="number" name="batch" id="" required placeholder="Batch Code" min="10000" max="99999">
        <input type="submit" value="Delete" name="btn">
        <p id="not">Batch Does Not Exist</p>

    </form></div></div>
</body>
</html>
<?php
error_reporting(0);
require 'connect_db.php';
if(isset($_POST['btn']))
{
    $batch=$_POST['batch'];
    $result=mysqli_query($connect,"SELECT * FROM student_management.batch WHERE batch='$batch'");
    
    if(mysqli_num_rows($result)>0)
    {
        $username=$_SESSION['m5'];
        $result2=mysqli_query($connect,"SELECT *FROM student_management.admin WHERE username='$username' and  type='admin'");
        while($info=mysqli_fetch_assoc($result2))
        {
            $mail_del=$info['mail'];
        }
        $_SESSION['del_batch']=$batch;
        $otp_del=rand(10000000,99999999);
        $_SESSION['del_otp']=$otp_del;
        $pythonScriptPath = '/var/www/html/otp.py'; // Replace with the actual path to your Python script
        exec("python3 $pythonScriptPath $mail_del $otp_del", $output, $exitCode);
        ?>
        <script>
            window.open('del_batch_check.php','_self');
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
if($_SESSION['del_count']==1)
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
elseif($_SESSION['del_count']==2)
{
    ?>
    <script>
         Swal.fire({
icon: 'error',
title: 'Can Not Delete DataBase'
})

    </script>
    <?php
}
unset($_SESSION['del_count']);
?>