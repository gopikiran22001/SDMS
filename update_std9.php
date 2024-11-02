<?php
require 'connect_db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include 'head.php';
    ?><meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT DETAILS</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">     <style>
    <?php
        include 'css/update_side.css';
        ?>
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
    margin-top: 10%;
    margin-left: 25%;

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
.box textarea{
    height: 50%;
    width: 90%;
    border: none;
    border-bottom: 1px solid black;
}
.box form input[type="submit"]{
    font-weight: 400;
    font-size: 20px;
    width: 85%;
    border: none;
    border-radius: 5px;
    color: rgba(255, 255, 255, 1);
    background-color:  rgba(143, 109, 255, 1);
    cursor: pointer;
    transition: 0.5s;
    padding: 10px 15px;

}
.box form input[type="submit"]:hover{

    color: rgba(143, 109, 255, 1);
    background-color:rgba(129, 71, 231, 0.2);}
    #up6{
            background-color:rgba(129, 71, 231, 0.2);
   
        }
    </style>
</head>
<body>
<?php
include 'update_header.php';
$id=$_SESSION['std_id'];

    ?>
<div class="cont">
<?php
include 'update_std_side.php';
?>
    <div class="box">
    <form action="" method="post">
        <label></label>
        <textarea name="address" id="" cols="70" rows="15" placeholder="Address"></textarea></br>
        <input type="submit" value="Update" name="btn"></br>
    </form>
</body>
</html>
<?php
require 'connect_db.php';

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
if(isset($_POST['btn']))
{
    $address=$_POST['address'];
        $sql="UPDATE d$db.$branch SET address='$address' WHERE id='$id'";
        $result=mysqli_query($connect,$sql);
        if($result)
        {
            ?>
            <script>
                    Swal.fire({
                   icon: 'success',
                    title: 'Updated'
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
                    title: 'Not Updated'
                    })
            </script>
            <?php
        }
}
    ?>