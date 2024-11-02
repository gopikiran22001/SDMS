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
    <title>DELETE EMPLOYEE</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">

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
   #emp3{
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
            

    <form action="" id="f" role="form" method="post">
    <h2><i>Enter Username</i></h2>

        <input type="text" name="id" id="id" required placeholder="Username">
        <input type="submit" value="Delete" name="btn">
        <p id="not">Invalid Username</p>

    </form></div></div>
</body>
</html>

<?php
require 'connect.php';

if(isset($_POST['btn']))
{
  $id=$_POST['id'];
    $s1="SELECT *FROM admin WHERE username='$id'";
    $r1=mysqli_query($connect,$s1);
    $count=mysqli_num_rows($r1);
    if($count>0)
    {
      $sql="DELETE FROM admin WHERE username='$id'";
          $query=mysqli_query($connect,$sql);
          if($query)
          {
            ?>
            <script>
              Swal.fire({
    icon: 'success',
    title: 'Deleted !'
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
    title: 'Error'
})
            </script>
            <?php
          }
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

