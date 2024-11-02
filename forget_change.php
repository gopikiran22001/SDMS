<?php
session_start();
if($_SESSION['forget_username']==false)
{

    ?>
    <script>
        window.open('admin.php','_self');
    </script><?php
}
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
    <title>RESET PASSWORD</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">

    <style>
        @import url('https://fonts.cdnfonts.com/css/poppins');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body
{
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background-image: url("icon\\Waves.png");

}
.box
{
    position: relative;
    width: 400px;
    height: 400px;
    display: flex;
    text-align: center;
    justify-content: center;
    border-radius: 3%;
    box-shadow: 0px 4px 12px 0px rgba(158, 158, 158, 0.25);
    background: rgba(255, 255, 255, 1);
    border-radius: 15px;

}
.box form{
    position: relative;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 20px;
    padding: 0 40px;


}
.box form input{
    position: relative;
    width: 85%;
    padding: 10px 15px;
    border: none;
    outline: none;
    border-radius: 10px;
    border: 1px;
    margin-top: 30px;
    background-color: rgba(237, 237, 237, 1);
    
    font-size: 1em;
    letter-spacing: 0.05em;
}
.box form input::placeholder{
    color: rgba(170, 170, 170, 1);
}
.box form h2{
    color:black;
    font-weight: 300;
    font-size: 30px;

}
i{
    margin-left: 5px;
    margin-right: 5px;
    color:black;
}
.box form input[type="submit"]{
    font-weight: 400;
    font-size: 20px;
    color: rgba(255, 255, 255, 1);
    background-color:  rgba(143, 109, 255, 1);
    cursor: pointer;
    transition: 0.5s;
}
.box form input[type="submit"]:hover{

    color: rgba(143, 109, 255, 1);
    background-color:rgba(129, 71, 231, 0.2);}
        .password-container{

width: 100%;

position: relative;

}

.fa-eye{

position: absolute;

top: 62%;

right: 13%;

cursor: pointer;

color: lightgray;

}

    </style>
</head>
<body>
        <div class="box">
    
    <form  action="" method="POST">
        <h2><i>Reset Password</i></h2>
    <input type="password" placeholder="New Password" name="password2" id="password2">

<div class="password-container">
  <input type="password" placeholder="Confirm Password" name="password" id="password">
  <i class="fa-solid fa-eye" id="eye"></i>
</div>
        <input type="submit" name="log_in" value="Reset">
    </form>
    <script>
        const passwordInput = document.querySelector("#password")
const eye = document.querySelector("#eye")
eye.addEventListener("click", function(){
  this.classList.toggle("fa-eye-slash")
  const type = passwordInput.getAttribute("type") === "password" ? "text" : "password"
  passwordInput.setAttribute("type", type)
});
    </script>
</div>
</body>
</html>
<?php
require 'connect.php';
if(isset($_POST['log_in']))
{
    $pass1=$_POST['password'];
    $pass2=$_POST['password2'];
    $user=$_SESSION['forget_username'];
    if($pass1==$pass2)
    {
        $result=mysqli_query($connect,"UPDATE admin SET password='$pass1' WHERE username='$user'");
        if($result)
        {
            $_SESSION['forget_response']=1;
            ?>
            <script>
                window.open('admin.php','_self');
            </script><?php
        }
        else
        {
            $_SESSION['forget_response']=2;
            ?>
            <script>
                window.open('admin.php','_self');
            </script><?php 
        }
    }
    else
    {
        ?>
        <script>
            Swal.fire({
      icon: 'error',
      title: 'Password Doesn not Match'
    })
          </script><?php
    }
}
?>