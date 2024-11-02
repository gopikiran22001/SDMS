<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT LIST</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">

   <?php
include 'head.php';
?>
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
#invalid
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
#std4{
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
 include 'options/std.php';
include 'admin_side.php';
 ?>
        <div class="box">
    <form action="" method="post">
    <h2><i>Student List</i></h2>

        <div class="details">
        <input type="number" name="batch" id="" placeholder="Batch" required>
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
        </select></div>
        <input type="submit" value="Get" name="btn">
        <p id="invalid">Invalid Batch</p>

    </form></div></div>
</body>
</html>
<?php
require 'connect_db.php';
if(isset($_POST['btn']))
{
    $branch=$_POST['branch'];
    $batch=$_POST['batch'];
    $c_1=mysqli_num_rows(mysqli_query($connect,"SELECT *FROM student_management.batch WHERE batch='$batch'"));
    if($c_1>0)
    {
        $_SESSION['branch_batch']=$batch;
        $_SESSION['branch_branch']=$branch;
        $result=mysqli_query($connect,"SELECT * FROM d$batch.$branch");
        $count=mysqli_num_rows($result);
            if($count>0)
            {
                ?>
                <script>
                    window.open('show3.php','_self');
                    </script>
                <?php 
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
                ?>
                <script>
                                                               document.getElementById("invalid").style.display = "block";

                </script>
                <?php
            }

    
}
?>
