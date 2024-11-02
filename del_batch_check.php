
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
          .password-container{
  width: 100%;
  position: relative;
}
.fa-eye{
  position: absolute;
  top: 35%;
  right: 5%;
  cursor: pointer;
  color: lightgray;
}
#otp,#pass
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
    <input type="number" name="otp" placeholder="OTP">
<div class="password-container">
  <input type="password" placeholder="Password" name="password" id="password">
  <i class="fa-solid fa-eye" id="eye"></i>
</div>
        <input type="submit" value="Confirm" name="btn_check">
        <p id="otp">Invalid OTP</p>
        <p id="pass">Invalid Password</p>
    </form></div></div>
    <script>
        const passwordInput = document.querySelector("#password")
const eye = document.querySelector("#eye")
eye.addEventListener("click", function(){
  this.classList.toggle("fa-eye-slash")
  const type = passwordInput.getAttribute("type") === "password" ? "text" : "password"
  passwordInput.setAttribute("type", type)
});
    </script>
</body>
</html>
<?php
if(isset($_POST['btn_check']))
{
    require 'connect_db.php';
    $username=$_SESSION['m5'];
    $otp=$_POST['otp'];
    $pass=$_POST['password'];
    $batch=$_SESSION['del_batch'];
    $_SESSION['del_count']=0;
    if($otp==$_SESSION['del_otp'])
    {
      $check_count=mysqli_num_rows(mysqli_query($connect,"SELECT *FROM student_management.admin WHERE username='$username' and password='$pass' and type='admin'"));
      if($check_count>0)
  {
          $result2=mysqli_query($connect,"DROP DATABASE d$batch");
          if($result2)
          {
              $result3=mysqli_query($connect,"DELETE FROM student_management.batch WHERE batch='$batch'");
              if($result3)
          {
               $dir =getcwd()."/Attendance//".$batch;
               $current=getcwd()."/upload-$batch";
               function deleteAll($dir) {
                  foreach(glob($dir . '/*') as $file) {
                  if(is_dir($file))
                  deleteAll($file);
                  else
                  unlink($file);
                  }
                  rmdir($dir);
                  }
                  deleteAll($current);
                  deleteAll($dir);
                  $_SESSION['del_count']=1;
                  ?><script>
                    window.open('delete_batch.php','_self');
                  </script><?php
              }
          }
          else
          {
              $_SESSION['del_count']=2;
              ?><script>
              window.open('delete_batch.php','_self');
            </script><?php
  
          }
  }
  else{
    ?>
    <script>
                                   document.getElementById("pass").style.display = "block";

      </script><?php
  
  }
    }
    else
    {
      ?>
    <script>
                                   document.getElementById("otp").style.display = "block";

      </script><?php
    }
   
}

?>