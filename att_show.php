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
  include 'css/batch_branch.css';
  ?>
.details input
{
    width:300px;
}
.details  select{
    margin-right: 20px;
width: 200px;
}
.box form input[type="submit"]{

    margin-right: 78.5%;
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
#att5{
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
    include 'options/att.php';
    include 'admin_side.php';
 ?>
        <div class="box">
    <form action="" method="post">
    <h2><i>Attendance List</i></h2>

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
        </select>
        <span>Semester</span>
        <select name="sem" id="">
            <option value="" selected disabled>--Select Sem--</option>
            <option value="1">1</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select></div>
        <input type="submit" name="btn" value="Get">
        <p id="not">Invalid Batch</p>

   </form></div></div>
</body>
</html>
<?php
require 'connect_db.php';
if(isset($_POST['btn']))
{
    $branch=$_POST['branch'];
    $batch=$_POST['batch'];
    $sem=$_POST['sem'];
    $c_1=mysqli_num_rows(mysqli_query($connect,"SELECT *FROM student_management.batch WHERE batch='$batch'"));
    if($c_1>0)
    {
        $_SESSION['att_batch']=$batch;
        $_SESSION['att_branch']=$branch;
        $_SESSION['att_sem']=$sem;
        $tb=$branch.'_att';
        $tb_n=$branch.'_face';
        $result=mysqli_query($connect,"SELECT * FROM d$batch.$tb");
        $count=mysqli_num_rows($result);
            if($count>0)
            {
                $c_2=mysqli_num_rows(mysqli_query($connect,"SELECT *FROM d$batch.$tb_n WHERE sem='$sem'"));
                if($c_2>0)
                {
                    ?>
                <script>
                    window.open('show4.php','_self');
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
                                 document.getElementById("not").style.display = "block";

                </script>
                <?php
            }

    
}
?>