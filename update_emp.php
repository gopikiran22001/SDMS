<?php
require 'connect.php';
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include 'head.php';
    ?>
    <?php
error_reporting(0);
require 'connect.php';
if($_FILES["uploadfile"]["name"]!=null)
{
    
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./upload/" . $filename;
    
$username=$_SESSION['m5'];
$sql="UPDATE admin SET img='$filename' WHERE username='$username'";
$result=mysqli_query($connect,$sql);
if($result)
{
    move_uploaded_file($tempname, $folder);
    
}}
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>PROFILE</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">

    <style>
        <?php
        include 'css/update_side.css';
 ?>
.box
{
    display: flex;
    min-height: 800px;
    height: 100%;
    width: 100%;
    background-color: transparent;
    box-shadow: 0px 4px 12px 0px rgba(129, 71, 231, 0.2);
    border-radius: 5px;
    flex-direction: column;
}
.box h2{
}
.box img{
    height:200px;
    width:200px;
    border-radius: 10px;
}
.box ul{
    display: flex;
    flex-direction: column;
    
}
.box li{
    background-color: rgba(237,237,245,1);
    border-radius: 15px;
    padding: 15px 10px;
    min-width: 300px;
    width: auto;
    height: auto;
    min-height: 15px;
}
.box ul li a:hover{
margin-left: 0px;
}
#imgt
{
    color: rgba(143, 109, 255, 1);
}
#list
{
    margin-left: 15px;
    display: flex;
    flex-direction: row;
}
#imgt:hover{
    color: black;
    cursor: pointer;
}
    </style>
    <script type="text/javascript">
        function getImage(imgagename)
        {
            var newimg=imgagename.replace(/^.*\\/,"");
            $("#display-image").html(newimg);
            document.getElementById('fo_fo').submit();
        }
    </script>
</head>
<body>
<header><a href="admin_dash.php"><i class="fa fa-home" style="font-size:20px">  </i><?php
if($_SESSION['user_type']=='Admin')
  {
    ?>ADMIN DASHBOARD
    <?php
  }
  else
  {
    ?>
    EMPLOYEE DASHBOARD
    <?php
  }?></a>
</header>
<div class="cont">
<div class="img">

    <?php
        $username=$_SESSION['m5'];
        $query="SELECT *FROM admin WHERE username='$username'";
        $sql=mysqli_query($connect,$query);
        while($data=mysqli_fetch_assoc($sql))
        {
            ?>
             <div class="imga">
            <label for="img"><img src="./upload/<?php echo $data['img'];?>"></label></div>  
           <div class="upload">
             <form action="" method="post" enctype='multipart/form-data' id="fo_fo" >
        <input type="file" name="uploadfile" value="<div id='display-image'></div>"id="img" style="display:none;visibility:none;" onchange="getImage(this.value);" required>
    </form></div>
            <?php
        }
        
        ?>
    <ul>
        <li><a href="update_emp1.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Name</a></li>
        <li><a href="update_emp2.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>D.O.B</a></li>
        <li><a href="update_emp3.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Gender</a></li>
        <li><a href="update_emp4.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Phone and Mail</a></li>
        <li><a href="update_emp5.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Address</a></li>
        <li><a href="update_emp6.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Password</a></li>
    </ul>
    </div> 
    <div class="box">

    <center><h2><i>PROFILE</i></h2></center>
<?php

$r=mysqli_query($connect,"SELECT *FROM admin WHERE username='$username'");
while($in=mysqli_fetch_assoc($r))
{?>
<label for="img" style="margin-left:100px;">
<img src="./upload/<?php echo $in['img'];?>" alt="" style=""></br>
<span id="imgt"><i class="fa fa-photo"></i>Change Profile Photo</span>
</label>
<ul id="list">
<ul>
    <li><a href="update_emp1.php"><span id="name" style="background-color":"black"><b>First Name:</b><?php echo $in['fname'];?></span></a></li>
    <li><a href="update_emp1.php"><span id="name"><b>Last Name:</b><?php echo $in['lname'];?></span></a></li>
    <li><a href="update_emp2.php"><span id="dob"><b>Date Of Birth:</b><?php echo $in['dob'];?></span></a></li></ul><ul>
    <li><a href="update_emp3.php"><span><b>Gender:</b><?php echo $in['gender'];?></span></a></li>
    <li><a href="update_emp4.php"><span id="phone"><b>Phone:</b><?php echo $in['phone'];?></span></a></li>
    <li><a href="update_emp4.php"><span id="mail"><b>Mail:</b><?php echo $in['mail'];?></span></a></li></ul><ul>

    <li><a href="update_emp5.php"><span id="address"><b>Address:</b><?php echo $in['address'];?></span></a></li>
    <li><span><b>Username:</b><?php echo $in['username'];?></span></li>
</ul>  </ul>
    <?php
    }
    ?>
        </div></div>
</body>
</html>

