
<!DOCTYPE html>
<html lang="en">
<head><?php
include 'head.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUPPLEMENTARY</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">

    <style>
        <?php
  include 'css/admin_dash.css';
  include 'css/batch_branch.css';
  ?>
   .box form input[type="submit"]{
    margin-right: 51.25%;  
}
.details input
{
    width:300px;
}
.details  select{
width: 200px;
}
.box form input[type="submit"]{

margin-right: 48.5%;
}
.box form h2{
    color:black;
    font-weight: 500;
    font-size: 30px;

}
#not,#inv,#no
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

  #result3{
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
include 'options/res.php';
include 'admin_side.php';
?>
        <div class="box">
            
    <form action="" method="post">
    <h2><i>Upload Supplementary Result</i></h2>

        <div class="details">
        <input type="text" name="id" id="" required placeholder="Enter Student ID">
        <span>Semister</span>
        <select name="sem">
            <option value="1">1</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select>
        </div>
        <input type="submit" value="Enter" name="btn">
        <p id="not">Invalid ID</p>
        <p id="inv">Not Registered</p>
        <p id="no">No Data Found</p>
    </form></div></div>
</body>
</html>
<?php
require 'connect_db.php';
if(isset($_POST['btn']))
{
    $id=$_POST['id'];
    $sem=$_POST['sem'];
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
    $c_1=mysqli_num_rows(mysqli_query($connect,"SELECT *FROM student_management.batch WHERE batch='$db'"));
    if($c_1>0){
        $c_2=mysqli_num_rows(mysqli_query($connect,"SELECT *FROM student_management.branch WHERE name='$branch'"));
        if($c_2>0)
        {
            
        $result=mysqli_query($connect,"SELECT * FROM d$db.$branch WHERE id='$id'");
        $count=mysqli_num_rows($result);
        if($count>0)
        {
            $c_check=mysqli_num_rows(mysqli_query($connect,"SELECT * FROM d$db.$batch$branch$roll WHERE sem='$sem'"));
            if($c_check>0){
                
            $result2=mysqli_query($connect,"SELECT * FROM d$db.$batch$branch$roll WHERE sem='$sem' and grade='F'");
            $count2=mysqli_num_rows($result2);
            if($count2>0)
            {
                $_SESSION['sup_id']=$id;
                $_SESSION['sup_sem']=$sem;
                ?>
                <script>
                    window.open('sup_result_upload.php','_self');
                  </script><?php
                
            }
            else
            {
                ?>
                <script>
                
                Swal.fire({
                icon: 'error',
                title: 'All Clear'
                 })
                  </script><?php
            }
            }
            else
            {
                ?>
                <script>
                
                document.getElementById("no").style.display = "block";

                  </script><?php
            }
    
        }
        else
        {
            ?>
            <script>
                                     document.getElementById("inv").style.display = "block";

              </script><?php
        }
    
        }
        else{

            ?>
            <script>
            
            document.getElementById("not").style.display = "block";

              </script><?php
        }
}
else{

    ?>
    <script>
    
    document.getElementById("not").style.display = "block";

      </script><?php
}
}
if($_SESSION['sup_upload_result']=='false')
{
    ?>
    <script>
    
    Swal.fire({
    icon: 'success',
    title: 'Uploaded'
  })
      </script>
      <?php
      unset($_SESSION['sup_id']);
      unset($_SESSION['sup_sem']);
}

unset($_SESSION['sup_upload_result']);
?>