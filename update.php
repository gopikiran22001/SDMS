
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE EMPLOYEE DETAILS</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">

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
    <style>
        <?php
  include 'css/admin_dash.css';
  include 'css/stdid.css';
  ?>
           .box form h2{
    color:black;
    font-weight: 500;
    font-size: 30px;

}
           #not
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
  #emp2{
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
include 'options/emp.php';
include 'admin_side.php';
?>
        <div class="box">
    <form action="" method="post">
    <h2><i>Enter Username</i></h2>

        <input type="text" name="id" placeholder="Username">
        
        <input type="submit" value="Enter" name="btn">
        <p id="not">Invalid Username</p>
    </form>
</body>
</html>
<?php 
require 'connect.php';
if(isset($_POST['btn']))
{
    $username=$_POST['id'];
    $sql="SELECT *FROM admin WHERE username='$username'";
    $query=mysqli_query($connect,$sql);
    $count=mysqli_num_rows($query);
    if($count>0)
    {
        $_SESSION['update']=$username;
        ?>
        <script>
            window.open('update1.php','_self');
          </script><?php
    }
    else
    {
        ?>
    <script>
           document.getElementById("not").style.display = "block";

    </script>
    <?php
    }
}

?>