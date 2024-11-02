
<!DOCTYPE html>
<html lang="en">
<head>
<?php
include 'head.php';
    ?>
    <?php
if($_SESSION['sup_id']==false or $_SESSION['sup_sem']==false)
{
    ?>
    <script>
        window.open('sup_result.php','_self');
    </script><?php
}
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUPPLEMENTARY</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">
    <style>
        <?php
  include 'css/admin_dash.css';
  ?>
    .box{
    display: flex;
    flex-direction: column;
    min-height: 96%;
    height: auto;
    width: 94%;
    margin-left: 3%;
    margin-right: 3%;
    margin-top: 2%;
    margin-bottom: 2%;
   border-radius: 5px;
    box-shadow: 0px 4px 12px 0px rgba(129, 71, 231, 0.2);
  }
  .box form
  {
    height: auto;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-top: 10px;
  }
  .name1
  {
    display: flex;
    flex-direction: column;
    justify-content: center;
    margin-top: 30px;
    margin-bottom: 10px;
    margin-left: 32.5%;
  }
  table{
    height: auto;
    min-height: 100%;
    width: 450px;
    margin-left: 2%;
    margin-right: 2%;
    margin-top: 20px;
    margin-bottom: 30px;
    border: 1px solid black;
    background-color: transparent;
    border-collapse: collapse;
    
}
th,td{
    padding-left: 5px;
    padding-right: 5px;
    text-overflow: auto;
color: black;
border: 1px solid black;
}
tr{
    height:auto;
    width: 70%;
}
caption,th,td{
    text-align: center;
}
caption{
    font-size: 1.5rem;
    font-weight: 700;
    text-transform: uppercase;
}
th{
background-color:rgba(143, 109, 255, 1);

}
input[type="number"]
{
    height: 100%;
    width: 100%;
    border: none;
}
span
{
    margin-left: 8px;
}
button
{
    height: 40px;
    width: 100px;
    border-radius: 5px;
    border: none;
    background-color: rgba(143, 109, 255, 1);
    color: white;
    margin-left: 25.5%;
}
button:hover
{
    background-color:rgba(143, 109, 255, 0.2) ;
    color: rgba(143, 109, 255, 1);
    border: 1px solid rgba(143, 109, 255, 1);
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
        <?php
require 'connect_db.php';
    $id=$_SESSION['sup_id'];
    $sem=$_SESSION['sup_sem'];
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
    $result1=mysqli_query($connect,"SELECT * FROM d$db.$branch WHERE id='$id'");
    $result2=mysqli_query($connect,"SELECT *FROM student_management.branch WHERE name='$branch'");
    $result3=mysqli_query($connect,"SELECT *FROM d$db.$batch$branch$roll WHERE sem='$sem' and grade='F'");
    $info2=mysqli_fetch_assoc($result2);
    $info1=mysqli_fetch_assoc($result1);
?>
            <div class="name1">
    <span><b>ID:</b><?php echo $info1['id'];?></span>
    <span><b>Name:</b><?php echo $info1['name'];?></span>
    <span><b>Branch:</b><?php echo $info2['bname'];?></span></div>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $id;?>" required>
        <input type="hidden" name="sem" value="<?php echo $sem;?>" required>
        <table border="3">
        <tr>
            <th>Subject Code</th>
            <th>External</th>
            <th>Internal</th>
        </tr>
        <?php  
        $e=1;
        $i=1;
        while($info3=mysqli_fetch_assoc($result3))
        {
            ?>
            <tr>
            <td><?php echo $info3['code'];?></td>
            <?php
            $code=$info3['code'];
            $result5=mysqli_query($connect,"SELECT *FROM student_management.$branch WHERE code='$code'");
            while($info5=mysqli_fetch_assoc($result5))
            {
                if($info5['type']=='T')
                {
                    ?>
                    <td><input type="number" name="e<?php echo $e;?>" id="" required min="0" max="80"></td>
                    <td><input type="number" name="i<?php echo $i;?>" id="" required min="0" max="20"></td>
                    <?php
                }
                else
                {
                    if($info5['code']== 109 or $info5['code']== 110)
                    {
                        ?>
                        <td><input type="number" name="e<?php echo $e;?>" id="" required min="0" max="30"></td>
                        <td><input type="number" name="i<?php echo $i;?>" id="" required min="0" max="20"></td>
                        <?php
                    }
                    else
                    {
                    ?>
                    <td><input type="number" name="e<?php echo $e;?>" id="" required min="0" max="60"></td>
                    <td><input type="number" name="i<?php echo $i;?>" id="" required min="0" max="40"></td>
                    <?php
                    }
                }
            }
            ?></tr><?php
            $e=$e+1;
            $i=$i+1;
        }

        ?>
        </table>
        <button type="submit" name="btn">Upload</button>
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
        $result3=mysqli_query($connect,"SELECT *FROM d$db.$batch$branch$roll WHERE sem='$sem' and grade='F'");
        $e=1;
        $i=1;
        while($info3=mysqli_fetch_assoc($result3))
        {
            $code=$info3['code'];
            $c_s=mysqli_query($connect,"SELECT *FROM student_management.$branch WHERE code='$code'");
            while($info4=mysqli_fetch_assoc($c_s))
            {
                $type=$info4['type'];
            }
            $external=$_POST["e$e"];
            $internal=$_POST["i$i"];
            $total=$external+$internal;
            if($type=='T')
            {
                if($external<29)
            {
                mysqli_query($connect,"UPDATE d$db.$batch$branch$roll SET internal=$internal,external=$external,total=$total,grade='F' WHERE code=$code");
            }
            else
            {
                if($total<36)
                {
                    mysqli_query($connect,"UPDATE d$db.$batch$branch$roll SET internal=$internal,external=$external,total=$total,grade='F' WHERE code=$code");                }
                else
                {
                    mysqli_query($connect,"UPDATE d$db.$batch$branch$roll SET internal=$internal,external=$external,total=$total,grade='P' WHERE code=$code");                }
            }
            }
            else
            {
                if($code==109 or $code==110)
                {
                    if($external<15)
                    {
                        mysqli_query($connect,"UPDATE d$db.$batch$branch$roll SET internal=$internal,external=$external,total=$total,grade='F' WHERE code=$code");                    }
                    else
                    {
                        if($total<25)
                        {
                            mysqli_query($connect,"UPDATE d$db.$batch$branch$roll SET internal=$internal,external=$external,total=$total,grade='F' WHERE code=$code");                        }
                        else
                        {
                            mysqli_query($connect,"UPDATE d$db.$batch$branch$roll SET internal=$internal,external=$external,total=$total,grade='P' WHERE code=$code");                        }
                    }
                     
                }
                else
                {
                    if($external<30)
                    {
                        mysqli_query($connect,"UPDATE d$db.$batch$branch$roll SET internal=$internal,external=$external,total=$total,grade='F' WHERE code=$code");                    }
                    else
                    {
                        if($total<50)
                        {
                            mysqli_query($connect,"UPDATE d$db.$batch$branch$roll SET internal=$internal,external=$external,total=$total,grade='F' WHERE code=$code");                        }
                        else
                        {
                            mysqli_query($connect,"UPDATE d$db.$batch$branch$roll SET internal=$internal,external=$external,total=$total,grade='P' WHERE code=$code");                        }
                    } 
                }
            }
            $e=$e+1;
            $i=$i+1;
        }
        $_SESSION['sup_upload_result']='false';
        ?><script>
            window.open('sup_result.php','_self');
        </script><?php
        
        }
?>
</body>
</html>