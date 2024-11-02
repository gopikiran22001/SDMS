<!DOCTYPE html>
<html lang="en">
<head>
<?php 
session_start();
unset($_SESSION['std_info_id']);?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT INFO</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script src="sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<link rel="shortcut icon" href="icon/29302.png" type="image/png">

<style>
    @import url('https://fonts.cdnfonts.com/css/poppins');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body
{
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background-image: url("icon\\Waves.png");
    background-size: cover;

}
.box
{
    position: relative;
    width: 400px;
    height: 400px;
    display: flex;
    text-align: center;
    justify-content: center;
    border-radius: 3%;
    box-shadow: 0px 4px 12px 0px rgba(129, 71, 231, 0.2);
    background: rgba(255, 255, 255, 1);
    border-radius: 15px;

}
.box form{
    position: relative;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 20px;
    padding: 0 40px;


}
.box form a{
    margin-top: 20px;
    text-decoration: none;
}
.box form a:hover{
    color: red;
    text-decoration: underline;
}
.box form h2{
    color:black;
    font-weight: 300;
    font-size: 36px;

}
.box form input{
    position: relative;
    width: 85%;
    padding: 10px 15px;
    border: none;
    outline: none;
    border-radius: 5px;
    border: 1px solid black;
    font-size: 1em;
    letter-spacing: 0.05em;
}
.box form input::placeholder{
    color: rgba(170, 170, 170, 1);
}

.box form input[type="submit"]{
    font-weight: 400;
    font-size: 20px;
    color: rgba(255, 255, 255, 1);
    background-color:  rgba(143, 109, 255, 1);
    cursor: pointer;
    transition: 0.5s;
    border: none;
}
.box form input[type="submit"]:hover{

    color: rgba(143, 109, 255, 1);
    background-color:rgba(129, 71, 231, 0.2);
}
.an{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: row;
    gap: 95px;
    margin-right: 5px;
}
#invalid,#not
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

</style>
</head>
<body>
    <div class="box">
        <form action="" method="post">
            <h2><i>Enter ID</i></h2>
            <input type="text" name="id" id="" placeholder="Enter ID">

            <input type="submit" value="Enter" name="btn">
            <div class="an">
        <a href="index.php">Back</a>
        </div>         
           <p id="invalid">Invalid ID</p>
        <p id="not">Can Not Find ID</p>

        </form>
    </div>
</body>
</html>
<?php
require 'connect_db.php';

if(isset($_POST['btn']))
{
    $id=$_POST['id'];
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
    $c_1=mysqli_num_rows(mysqli_query($connect,"SELECT *FROM student_management.batch WHERE batch=$db"));
    if($c_1>0)
    {
        $c_2=mysqli_num_rows(mysqli_query($connect,"SELECT *FROM student_management.branch WHERE name='$branch'"));
        if($c_2>0)
        {
            $result=mysqli_query($connect,"SELECT * FROM d$db.$branch WHERE id='$id'");
    $count=mysqli_num_rows($result);
    if($count>0)
    {
        $_SESSION['std_info_id']=$id;
        ?>
       <script>
       window.open('std_info.php','_self')
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
        else
        {
            ?>
            <script>
                                 document.getElementById("invalid").style.display = "block";

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