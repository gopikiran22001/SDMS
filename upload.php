
<!DOCTYPE html>
<html lang="en">
<head>
<?php
include 'head.php';
    ?>
    <?php
    if($_SESSION['id']==false or $_SESSION['sem']==false)
    {
        ?>
        <script>
            window.open('upload_res.php','_self');
        </script><?php
    }?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPLOAD RESULT</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">    <style>
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
    width: 400px;
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
        <?php
require 'connect_db.php';
    $id=$_SESSION['id'];
    $sem=$_SESSION['sem'];
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
    $result3=mysqli_query($connect,"SELECT *FROM student_management.$branch WHERE sem='$sem'");
    $info2=mysqli_fetch_assoc($result2);
    $info1=mysqli_fetch_assoc($result1);
?><div class="name1">
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
                if($info3['type']=='T')
                {
                    ?>
                    <td><input type="number" name="e<?php echo $e;?>" id="" required min="0" max="80"></td>
                    <td><input type="number" name="i<?php echo $i;?>" id="" required min="0" max="20"></td>
                    <?php
                }
                else
                {
                    if($info3['code']== 109 or $info3['code']== 110)
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

                }?>

            </tr>
            <?php
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
require 'upload_re.php';
?>