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
    <title>NEW BATCH</title>
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
#not,#batch
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
#add1{
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
    <h2><i>New Batch</i></h2>

    <input type="number" name="batch" id="" required placeholder="Batch Code" min="10" max="99">
        <input type="text" name="dur" id="dur" required placeholder="Duration">
        <input type="submit" value="ADD" name="btn">
        <p id="not">Batch Is Already Exist</p>
        <p id="batch">Can Not Perform This Operation</p>

    </form></div></div>
</body>
</html>
<?php
require 'connect.php';
error_reporting(0);
if(isset($_POST['btn']))
{
    $batch1=$_POST['batch'];
    $batch=$batch1.'466';
    $_SESSION['add_batch_batch']=$batch;
    $_SESSION['add_batch_dur']=$_POST['dur'];
    $y=date('y');
    $m=date('m');
    if($m<6)
    {
         $y=$y-1;
    }
    if($batch1<$y)
    {
        
        if(mysqli_num_rows(mysqli_query($connect,"SELECT *FROM batch WHERE batch='$batch'"))>0)
        {
            ?>
        <script>
                       document.getElementById("not").style.display = "block";
    
        </script>
        <?php
        }
        else
        {
            $username=$_SESSION['m5'];
            $result2=mysqli_query($connect,"SELECT *FROM student_management.admin WHERE username='$username' and  type='admin'");
            while($info=mysqli_fetch_assoc($result2))
            {
                $mail_del=$info['mail'];
            }
            $otp_new=rand(10000000,99999999);
            $_SESSION['new_otp']=$otp_new;
            $pythonScriptPath = '/var/www/html/otp.py'; // Replace with the actual path to your Python script
            exec("python3 $pythonScriptPath $mail_del $otp_new", $output, $exitCode);
            ?>
            <script>
                window.open('new_batch_check.php','_self');
            </script><?php
        }
    }
    else
    {
        ?>
        <script>
                       document.getElementById("batch").style.display = "block";
    
        </script>
        <?php   
    } 
}
if($_SESSION['add_batch_count']==1)
{
    ?>
    <script>
      Swal.fire({
  icon: 'success',
  title: 'Added'
})
    </script>
    <?php
}

unset($_SESSION['add_batch_count']);
?>
