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
    <title>DELETE SUBJECTt</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">

    <style>
        <?php
  include 'css/admin_dash.css';
  include 'css/batch_branch.css';
  ?>
  .box form input[type="submit"]{
    margin-right: 47.25%;  
}
.details input
{
    width:300px;
}
.details  select{
width: 200px;
}
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
#add7{
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
include 'options/sub.php';
include 'admin_side.php';
?>
        <div class="box">
            

    <form action=""   method="post">
    <h2><i>Delete Subject</i></h2>
        <div class="details">
        <input type="number" name="sub" required placeholder="Subject Code">
        <span>Branch</span>
        <select name="branch" id="">
        <?php
        
        require 'connect_db.php';
       $result=mysqli_query($connect,"SELECT *FROM student_management.branch");
       while($info=mysqli_fetch_assoc($result))
       {
           ?>
           <option value="<?php echo $info['name'];?>"><?php echo $info['bname'];?></option>
           <?php
       }
       ?>
        </select></div>
        <input type="submit" value="Delete" name="btn">
        <p id="not">Invalid Subject Code</p>

    </form></div></div>
</body>
</html>
<?php
require 'connect.php';
if(isset($_POST['btn']))
{
    $sub=$_POST['sub'];
    $branch=$_POST['branch'];
    $count=mysqli_num_rows(mysqli_query($connect,"SELECT *FROM $branch WHERE code='$sub'"));
    if($count>0)
    {
        $result=mysqli_query($connect,"DELETE FROM $branch WHERE code='$sub'");
        if($result)
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
          title: 'Can not Delete Subject'
      })
            </script>
            <?php
        }
    }
    else
{            ?>
    <script>
                  document.getElementById("not").style.display = "block";

    </script>
    <?php
}
}
?>
