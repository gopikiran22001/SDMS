
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
    <input type="number" name="user_name" placeholder="OTP">
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
    $otp=$_POST['user_name'];
    $pass=$_POST['password'];
    $_SESSION['add_batch_count']=0;
    if($_SESSION['new_otp']==$otp)
    {
      $check_count=mysqli_num_rows(mysqli_query($connect,"SELECT *FROM student_management.admin WHERE username='$username' and password='$pass' and type='admin'"));
    if($check_count>0)
{
    $batch=$_SESSION['add_batch_batch'];
    $dur=$_SESSION['add_batch_dur'];
    $result=mysqli_query($connect,"INSERT INTO student_management.batch (batch,dur) VALUES ('$batch','$dur')");
    if($result)
    {
        $sql="CREATE DATABASE d$batch";
        $result1=mysqli_query($connect,$sql);
        if($result1)
        {
            $current=getcwd();
            $result2=mysqli_query($connect,"SELECT * FROM student_management.branch");
            while($info=mysqli_fetch_assoc($result2))
            {
                mysqli_query($connect,"CREATE TABLE d$batch.$info[name] (id VARCHAR(12) NOT NULL , name VARCHAR(255) NOT NULL , lname VARCHAR(255) NOT NULL , fname VARCHAR(255) NOT NULL , mname VARCHAR(255) NOT NULL , img VARBINARY(255) NOT NULL , gender VARCHAR(255) NOT NULL , dob DATE NOT NULL , phone BIGINT NOT NULL , address TEXT NOT NULL , PRIMARY KEY (`id`(12)))");
                mysqli_query($connect,"CREATE TABLE d$batch.$info[name]_att(id VARCHAR(12) NOT NULL ,img VARBINARY(255) NOT NULL ,PRIMARY KEY (`id`(12)))");
                mysqli_query($connect,"CREATE TABLE d$batch.$info[name]_face(dt DATE ,sem BIGINT NOT NULL , PRIMARY KEY (`dt`))");
            } 
            mkdir($current."/upload-$batch",0777);
            $_SESSION['add_batch_count']=1;
            ?><script>
            window.open('new_batch.php','_self');
          </script><?php

        }
        }
        else
    {
        $_SESSION['add_batch_count']=2;
        ?><script>
        window.open('new_batch.php','_self');
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