<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUBJECT LIST</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">

   <?php
include 'head.php';
?>
    <style>
        <?php
  include 'css/admin_dash.css';
  ?>
   .box
{
    margin-top: 10.5%;
    margin-left: 7.5%;
    position: relative;
    width: 70%;
    height: 300px;
    display: flex;
    text-align: center;
    justify-content: center;
    flex-direction: column;
    border-radius: 3%;
    box-shadow: 0px 4px 12px 0px rgba(129, 71, 231, 0.2);

    background: rgba(255, 255, 255, 1);
    border-radius: 10px;

}
.box form{
    position: relative;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 30px;
    padding: 0 40px;


}

.details
{
    margin-right: 6.5%;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    flex-direction: row;
}
.details input
{
    position: relative;
    width:350px;
    padding: 10px 15px;
    outline: none;
    border: 1px solid black;
    border-radius: 5px;
    font-size: 1em;
    letter-spacing: 0.05em;
    color: black;
    margin-left: 20px;
    margin-right: 20px;

}
.details1{
    margin-right: 7.5%;
}
.details1 select{
    padding: 10px 15px;
    border-radius: 5px;
    width: 195PX;

}
.details1 span{
    margin-left: 10px;
}
.box form input::placeholder{
    color: rgba(170, 170, 170, 1);
}

.box form input[type="submit"]{
    width: 130px;
    height: 35px;
    border: none;
    border-radius: 5px;
    font-weight: 400;
    font-size: 20px;
    color: rgba(255, 255, 255, 1);
    background-color:  rgba(143, 109, 255, 1);
    cursor: pointer;
    transition: 0.5s;
    margin-right: 45.25%;
}
.box form h2{
    color:black;
    font-weight: 500;
    font-size: 30px;

}
.box form input[type="submit"]:hover{

    color: rgba(143, 109, 255, 1);
    background-color:rgba(129, 71, 231, 0.2);
}

          #add4{
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
    <form action="" method="post">
    <h2><i>Subject List</i></h2>

        <div class="details1">
        <span>Branch</span>
        <select name="branch">
        <?php
        require 'connect.php';
        $result=mysqli_query($connect,"SELECT *FROM branch");
        while($info=mysqli_fetch_assoc($result))
        {
            ?>
            <option value="<?php echo $info['name'];?>"><?php echo $info['bname'];?></option>
            <?php
        }
        ?>
        </select>
        <span>Semester</span>
        <select name="sem">
            <option value="all">Select all</option>
            <option value="1">1</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select></div>
        <input type="submit" value="Enter" name="btn">
    </form></div></div>
</body>
</html>
<?php
require 'connect.php';
if(isset($_POST['btn']))
{
    $name=$_POST['branch'];
    $sem=$_POST['sem'];
    $_SESSION['branch']=$name;
    $_SESSION['sem']=$sem;
    if($sem=='all')
    {
        $result=mysqli_query($connect,"SELECT * FROM $name");
        $count=mysqli_num_rows($result);
        if($count>0)
        {
            ?>
            <script>
            
            window.open('show1.php','_self')
              </script><?php 
        }
        else
        {
            ?>
            <script>
              Swal.fire({
          icon: 'error',
          title: 'Data Not Found'
      })
            </script>
            <?php
        }
    }
    else
    {
        $result=mysqli_query($connect,"SELECT * FROM $name WHERE sem=$sem");
        $count=mysqli_num_rows($result);
        if($count>0)
        {
            ?>
            <script>
            
            window.open('show2.php','_self')
              </script><?php 
        }
        else
        {
            ?>
            <script>
              Swal.fire({
          icon: 'error',
          title: 'Data Not Found'
      })
            </script>
            <?php
        } 
    }
}
?>
