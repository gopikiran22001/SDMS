
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
include 'head.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE EMPLOYEE DETAILS</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">
    <style>
        <?php
        include 'css/update_side.css';
        include 'css/update_name.css'

        ?>
         #up2{
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
include 'update_side.php';
?>
    <div class="box">
    <form action="" method="post">
        <input type="date" name="date" required placeholder="D.O.B"></br>
        <input type="submit" value="Update" name="btn"></br>
    </form>
    <div></div>
</body>
</html>
<?php

require 'connect.php';
$username=$_SESSION['update'];
if(isset($_POST['btn']))
{
    $dob=date('y-m-d',strtotime($_POST['date']));
        $sql="UPDATE admin SET dob='$dob' WHERE username='$username'";
        $result=mysqli_query($connect,$sql);
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