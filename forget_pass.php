<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script src="sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORGOT PASSWORD</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">

    <style>
    <?php

        include 'css/admin.css'

        ?>
        .box form input{
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .box form input[type="submit"]{
            margin-top: 10px;
            margin-bottom: 10px;
        }
        i{
    margin-right: 15px;
    margin-top: 3px;
        }
        .box form h2{
    color:black;
    font-weight: 300;
    font-size: 28px;

}
    </style>
</head>
<body>
    <div class="box">
        <form action="" method="post">
            <h2><i>Enter Username</i></h2>
            <input type="text" name="username" id="" placeholder="Username">
            <input type="submit" value="Send OTP" name="btn">
        </form>
    </div>
</body>
</html>
<?php
require 'connect.php';
if(isset($_POST['btn']))
{
    $username=$_POST['username'];
    $result=mysqli_query($connect,"SELECT *FROM admin WHERE username='$username'");
    $c1=mysqli_num_rows($result);
    if($c1>0)
    {
        while($info=mysqli_fetch_assoc($result))
        {
            $_SESSION['pass_otp_email']=$info['mail'];
        }
        $_SESSION['forget_username']=$username;
        ?><script>
            window.open('forget_check.php','_self');
        </script><?php
    }
    else
    {
        ?>
    <script>
        Swal.fire({
  icon: 'error',
  title: 'Invalid Username'
})
      </script><?php
    }
}
?>