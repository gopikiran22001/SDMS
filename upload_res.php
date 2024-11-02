
<!DOCTYPE html>
<html lang="en">
<head><?php
include 'head.php';
    ?>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPLOAD RESULT</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">
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
#not,#inv
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
  #result1{
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
    <h2><i>Upload Result</i></h2>

        <div class="details">
        <input type="text" name="id" id="" required placeholder="Enter Student ID">
        <span>Semister</span>
        <select name="sem">
            <option value="1">1</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select></div>
        <input type="submit" value="Enter" name="btn">
        <p id="not">Invalid ID</p>
        <p id="inv">Not Registered</p>
    </form></div></div>
</body>
</html>
<?php
if($_SESSION['result_upload_count']=='true')
{
    ?>
    <script>
    
    Swal.fire({
    icon: 'success',
    title: 'Uploaded'
     })
      </script><?php
}
unset($_SESSION['result_upload_count']);
unset($_SESSION['id']);
unset($_SESSION['sem']);
?>
<?php
require 'check.php';
?>

