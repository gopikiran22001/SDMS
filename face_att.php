<?php
require 'connect_db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php

include 'head.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATTENDANCE</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">

    <style>
        <?php
  include 'css/admin_dash.css';
  ?>
    .box
  {
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 96%;
    height: auto;
    width: 94%;
    margin-left:3%;
    margin-right: 3%;
    margin-top: 2%;
    margin-bottom: 2%;
    border-radius: 5px;
    background-color: white;
    box-shadow: 0px 4px 12px 0px rgba(129, 71, 231, 0.2);
  }
  .box a{
    text-decoration: none;
    color: black;
  }
  h3{
    margin-top: 1%;
  }
  .box a:hover
  {
    color: red;
    text-decoration: underline;
    margin-left: 0px;
  }
  table{
    height: auto;
    width: 70%;
    margin-left: 15%;
    margin-right: 15%;
    margin-top: 1%;
    margin-bottom: 2%;
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
    height:35px;
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
input[type="submit"]
{
    background-color:rgba(129, 71, 231, 0.2);
    color:rgba(129, 71, 231, 1);
    border-radius: 2px;
    border: 0px solid rgba(129, 71, 231, 1);
    padding-left: 5px;
    padding-right: 5px;
}
input[type="submit"]:hover{
    background-color:rgba(129, 71, 231, 1) ;
    color: white;
}
    #att3{
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
<?php
$batch=$_SESSION['att_batch'];
$branch=$_SESSION['att_branch'];
$sem=$_SESSION['att_sem'];
$count_att=$_SESSION['count_att'];
$tb_ch=$branch.'_att';
$tb_att=$branch.'_face';
$dt=date('Y-m-d');
require 'connect_db.php';
if(isset($_POST['btn']))
{
    $id=$_POST['id'];
    $std_batch=substr($id,0,5);
    $std_branch=substr($id,6,2);
    $std_roll=substr($id,9,3);
    if(strlen($id)==11)
    {
        $std_branch=substr($id,6,1);
        $std_roll=substr($id,8,3);
    }
    $tb_id=$std_batch.$std_branch.$std_roll;

    mysqli_query($connect,"UPDATE d$batch.$tb_att SET $tb_id= 'X' WHERE dt='$dt'");
    
}

$result1=mysqli_query($connect,"SELECT *FROM d$batch.$tb_ch");
?>
        <div class="box">
            <a href="face.php"><h3>ABSENT LIST</h3></a>
        <table border="2">
            
            <tr>
                <th>Absent ID</th>
                <th>Present</th>
            </tr>
                <?php
                while($info=mysqli_fetch_assoc($result1))
                {
                    $id=$info['id'];
                    $std_batch=substr($id,0,5);
                    $std_branch=substr($id,6,2);
                    $std_roll=substr($id,9,3);
                    if(strlen($id)==11)
                    {
                        $std_branch=substr($id,6,1);
                        $std_roll=substr($id,8,3);
                    }
                    $tb_id=$std_batch.$std_branch.$std_roll;
                    $result2=mysqli_query($connect,"SELECT *FROM d$batch.$tb_att WHERE dt='$dt'");
                     while($info2=mysqli_fetch_assoc($result2))
                     {
                        if($info2[$tb_id]!='X')
                        {
                            ?>
                            <tr>
                                <td><?php echo $id;?></td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="id" value="<?php echo $id;?>">

                                        <input type="submit" value="Present" name="btn" onclick="<?php $_SESSION['count_att']=1; ?>">
                                    </form>
                                </td>
                            </tr>
    
                            <?php
                        }
                     }

                    }

                
            ?>

        </table>


    </div></div>
    
</body>
</html>

