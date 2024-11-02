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
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script src="sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VERIFY OTP</title>
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
    margin-top: 15px;
    background-color: rgba(237, 237, 237, 1);
    margin-bottom: 15px;
    font-size: 1em;
    letter-spacing: 0.05em;
}
.box form input::placeholder{
    color: rgba(170, 170, 170, 1);
}

.box form input[type="submit"]{
    font-weight: 400;
    font-size: 20px;
    color: rgba(255, 255, 255, 1);
    background-color:  rgba(143, 109, 255, 1);
    cursor: pointer;
    margin-top: 15px;
    transition: 0.5s;
}
.box form input[type="submit"]:hover{

    color: rgba(143, 109, 255, 1);
    background-color:rgba(129, 71, 231, 0.2);}
i{
    margin-left: 5px;
    margin-right: 5px;
    color:black;
}
.box form h2{
    color:black;
    font-weight: 200;
    font-size: 28px;

}
    </style>
</head>
<body>
    <div class="box">
        <form action="" method="post">
            <h2><i>Enter OTP</i></h2>
            <input type="number" name="otp" id="" placeholder="Enter OTP">
            <input type="submit" value="Verify" name="btn">
        </form>
    </div>
</body>
</html>
<?php
if(isset($_POST['btn']))
{
    $otp=$_POST['otp'];
    if($otp==$_SESSION['otp_check'])
    {
        ?>
        <script>
            window.open('forget_change.php','_self');
        </script><?php
    }
    else
    {
        ?>
    <script>
        Swal.fire({
  icon: 'error',
  title: 'Invalid OTP'
})
      </script><?php
    }
}
?>