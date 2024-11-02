
<!DOCTYPE html>
<html lang="en">
<head>
<?php
    include 'head.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE PHONE AND MAIL</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">    <style>
    <?php
        include 'css/update_side.css';
        include 'css/update_name.css'

        ?>
          #up4{
            background-color:rgba(129, 71, 231, 0.2);
   
        }
    </style>
</head>
<body>
<?php
include 'update_header.php';
    ?>
    <div class="cont">
<?php
include 'update_emp_side.php';
?>
    <div class="box">
    <form action="" method="post">
        <input type="text" name="phone" required placeholder="Phone"></br>
        <input type="email" name="mail" required placeholder="Mail"></br>
        <input type="submit" value="Update" name="btn"></br>
    </form></div></div>
</body>
</html>
<?php
require 'connect.php';
$username=$_SESSION['m5'];
if(isset($_POST['btn']))
{
    $phone=$_POST['phone'];
    $mail=$_POST['mail'];
    
        $sql1="UPDATE admin SET phone='$phone',mail='$mail' WHERE username='$username'";
        $result=mysqli_query($connect,$sql1);
        if($result)
        {
            ?>
            <script>
                    Swal.fire({
                   icon: 'success',
                    title: 'Updated'
                    })
            </script>
            <?php
        
        }
        else
        {
            ?>
            <script>
                    Swal.fire({
                   icon: 'error',
                    title: 'Not Updated'
                    })
            </script>
            <?php
        }
}
?>