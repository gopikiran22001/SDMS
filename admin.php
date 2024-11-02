<?php

session_start();
?>
<!DOCTYPE html>

<html lang="en">

<head>

    <style>

        <?php

        include 'css/admin.css'

        ?>
      .box  h2 a:hover{
          text-decoration: none; 
        }

        .password-container{

  width: 100%;

  position: relative;

}

.fa-eye{

  position: absolute;

  top: 28%;

  right: 13%;

  cursor: pointer;

  color: lightgray;

}

    </style>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LOGIN</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="sweetalert2.min.js"></script>

<link rel="stylesheet" href="sweetalert2.min.css">

<script src="sweetalert2.all.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>

<body>

    <div class="box">

    

    <form  action="" method="POST">
<h2><a href="index.php"><i class="fa fa-mortar-board" style="font-size:36px"></i><i>SDMS</i></a></h2>
        <input type="text" name="user_name" placeholder="Username" required>

<div class="password-container">

  <input type="password" placeholder="Password" name="password" id="password" required>

  <i class="fa-solid fa-eye" id="eye"></i>

</div>
        <input type="submit" name="log_in" value="Login">
        <div class="an">
        <a href="index.php">Back</a>
        <a href="forget_pass.php">Forget Password?</a>
        </div>

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
if($_SESSION['forget_response']==1)

{

  ?>

  <script>

      Swal.fire({

icon: 'success',

title: 'Password Reset'

})

    </script><?php

}

elseif($_SESSION['forget_response']==2)

{

  ?>

        <script>

            Swal.fire({

      icon: 'error',

      title: 'Error'

    })

          </script><?php

}
unset($_SESSION['forget_response']);
unset($_SESSION['forget_username']);

?>
<?php
require 'connect.php';
if(isset($_POST["log_in"]))
{
    $user_name=$_POST["user_name"];
    $pass=$_POST["password"];
    $sql="SELECT *FROM admin WHERE username='$user_name' AND password='$pass'";
$result=mysqli_query($connect,$sql);
$count=mysqli_num_rows($result);
if($count>0)
{
    while($info=mysqli_fetch_assoc($result))
    {
        $user_type=$info['type'];
    }
    $_SESSION['user_type']=$user_type;
    $_SESSION['m5']=$user_name;
    ?>
    <script>
        window.open('admin_dash.php','_self');

</script>
<?php
}
else{
    ?>
    <script>
        Swal.fire({
  icon: 'error',
  title: 'Invalid Username or Password'
})
      </script><?php
}
}

?>














