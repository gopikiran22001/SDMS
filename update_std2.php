
<!DOCTYPE html>
<html lang="en">
<head>
<?php
include 'head.php';
?>
<?php
require 'connect_db.php';
error_reporting(0);
$id=$_SESSION['std_id'];
$batch=substr($id,0,5);
$branch=substr($id,6,2);
$roll=substr($id,9,3);
$d=substr($id,0,2);
    $b=466;
    $db=$d.$b;
if(strlen($id)==11)
    {
        $branch=substr($id,6,1);
        $roll=substr($id,8,3);
    }
if($_FILES["uploadfile"]["name"]!=null)
{
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./upload-$db/" . $filename;   
     $sql="UPDATE d$db.$branch SET img='$filename' WHERE id='$id'";
$result=mysqli_query($connect,$sql);
if($result)
{
    move_uploaded_file($tempname, $folder);
}
}

?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT DETAILS</title>
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
<header><a href="admin_dash.php"><i class="fa fa-home" style="font-size:20px">  </i>  <?php
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
  }?></a></header>
  <div class="cont">
  <div class="img">
<?php
        $batch=substr($id,0,5);
        $branch=substr($id,6,2);
        $roll=substr($id,9,3);
        $d=substr($id,0,2);
        $b='466';
        $db=$d.$b;
        if(strlen($id)==11)
        {
            $branch=substr($id,6,1);
            $roll=substr($id,8,3);
        }
        $query="SELECT *FROM d$db.$branch WHERE id='$id'";
        $sql=mysqli_query($connect,$query);
        while($data=mysqli_fetch_assoc($sql))
        {
            ?>
            <div class="imga">
            <label for="img"><img src="./upload-<?php echo $db;?>/<?php echo $data['img'];?>"></label></div> 
            <div class="upload">
            <form action="" method="post" enctype='multipart/form-data' id="fo_fo">
            <input type="file" name="uploadfile" value="<div id='display-image'></div>"id="img" style="display:none;visibility:none;" onchange="getImage(this.value);" required>
    </form></div>
            <?php
        }
        
        ?>
    <ul>
    <li><a href="update_std4.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Name</a></li>
    <li style="height:auto;"><a href="update_std5.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Father and Mother</a></li>
        <li><a href="update_std6.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>D.O.B</a></li>
        <li><a href="update_std7.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Gender</a></li>
        <li><a href="update_std8.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Phone</a></li>
        <li><a href="update_std9.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Address</a></li>
        
    </ul></div>
    <div class="box">
    <center><h2><i>PROFILE</i></h2></center>
<?php

$r=mysqli_query($connect,"SELECT *FROM d$db.$branch WHERE id='$id'");
while($in=mysqli_fetch_assoc($r))
{?>
<label for="img" style="margin-left:100px;">
<img src="./upload-<?php echo $db;?>/<?php echo $in['img'];?>"></br>
<span id="imgt"><i class="fa fa-photo"></i>Change Profile Photo</span>
</label>
<ul id="list">
<ul>
    <li><span><b>ID:</b><?php echo $in['id'];?></span></li>
    <li><a href="update_std4.php"><span id="name"><b>First Name:</b><?php echo $in['name'];?></span></a></li>
    <li><a href="update_std4.php"><span id="name"><b>Last Name:</b><?php echo $in['lname'];?></span></a></li></ul><ul>
    <li><a href="update_std5.php"><span id="name"><b>Father Name:</b><?php echo $in['fname'];?></span></a></li>
    <li><a href="update_std5.php"><span id="name"><b>Mother Name:</b><?php echo $in['mname'];?></span></a></li>
    <li><a href="update_std6.php"><span id="dob"><b>Date Of Birth:</b><?php echo $in['dob'];?></span></a></li></ul><ul>
    <li><a href="update_std7.php"><span><b>Gender:</b><?php echo $in['gender'];?></span></a></li>
    <li><a href="update_std8.php"><span id="phone"><b>Phone:</b><?php echo $in['phone'];?></span></a></li>
    <li><a href="update_std9.php"><span id="address"><b>Address:</b><?php echo $in['address'];?></span></a></li></ul></ul>
    <?php
    }
    ?>
    </div>
  </div>

</body>
</html>