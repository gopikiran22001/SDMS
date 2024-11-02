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
    <title>SEND OTP</title>
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
    width: 800px;
    height: 200px;
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
}
.box form button{
    position: relative;
    width: 55%;
    padding: 10px 15px;
    outline: none;
    border-radius: 5px;
    border: 1px solid black;
    font-size: 20px;
    background-color: transparent;
}
i{
    margin-right: 15px;
    margin-top: 3px;
}
.box form button:hover{
  color:rgb(129, 71,231);
  background-color:rgba(129, 71, 231, 0.2);
  border: none;
}
</style>
</head>
<body>
    <div class="box">
        <form action="" method="post">
            <input type="hidden" name="mail" value="<?php echo $_SESSION['pass_otp_email'];?>">
             <button name="btn"><i class="fa fa-envelope"></i><?php echo $_SESSION['pass_otp_email'];?></button>
        </form>
    </div>
</body>
</html>
<?php
if(isset($_POST['btn']))
{
    $mail=$_POST['mail'];
    $otp=rand(100000,999999);
    $_SESSION['otp_check']=$otp;
    $pythonScriptPath = '/var/www/html/otp1.py'; // Replace with the actual path to your Python script

// Execute the Python script and capture the output
exec("python3 $pythonScriptPath $mail $otp", $output, $exitCode);

    ?><script>
        window.open('forget_verify.php','_self')
    </script><?php
}
?>