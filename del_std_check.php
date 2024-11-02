
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
    <title>DELETE STUDENT</title>
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
#std3{
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
    $_SESSION['del_count_std']=0;
    $id=$_SESSION['del_std_id'];
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
    if($otp==$_SESSION['del_otp_std'])
    {
      $check_count=mysqli_num_rows(mysqli_query($connect,"SELECT *FROM student_management.admin WHERE username='$username' and password='$pass' and type='admin'"));
      if($check_count>0)
  {
    $result2=mysqli_query($connect,"DELETE FROM d$db.$branch WHERE id='$id'");
    if($result2)
    {
        $att=$branch.'_att';
        $at=$branch.'_face';
        mysqli_query($connect,"DELETE FROM d$db.$att WHERE id='$id'");
        mysqli_query($connect,"ALTER TABLE d$db.$at DROP COLUMN $batch$branch$roll");
        $result3=mysqli_query($connect,"DROP TABLE d$db.$batch$branch$roll");
        if($result3)
        {
            $_SESSION['del_count']=1;
                  ?><script>
                    window.open('delete_std.php','_self');
                  </script><?php
            
        }
        else
        {
            $_SESSION['del_count']=2;
            ?><script>
            window.open('delete_std.php','_self');
          </script><?php
        }
    }
    else
    {
        $_SESSION['del_count']=3;
        ?><script>
        window.open('delete_std.php','_self');
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