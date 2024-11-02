<?php
require 'connect_db.php';


$result2=mysqli_query($connect,"SELECT *FROM student_management.branch");
$result1=mysqli_fetch_row(mysqli_query($connect,"SELECT MAX(batch) FROM student_management.batch"));
$batch=$result1[0];
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
    justify-content: center;
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
  .box form{
    height: auto;
    width: 100%;
    display: flex;
    justify-content: center;
    justify-content: center;
  }
  .box form input[type="submit"]{
    height: 80px;
    width: 70%;
    margin: 20px;
    background-color: rgba(129, 71, 231, 0.2);
    border-radius: 5px;
    border: 1px;
    box-shadow: 0px 2px 6px 0px rgba(129, 71, 231, 1);
    color: rgba(129, 71, 231, 1);
    padding-bottom: 10px;
  }
  .box form input[type="submit"]:hover{
    color: black;
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
        <div class="box">
            <?php
            $dt=date('Y-m-d');
                while($info=mysqli_fetch_assoc($result2))
                {
                    for($x=1;$x<4;$x++)
                    {
                        $y=date('y');
                        $m=date('m');
                        $c_y=substr($batch,0,2);
                        if($m<6)
                        {
                            $y=$y-1;
                        }
                        if($y==$c_y)
                        {
                            $sem=1;
                        }
                        elseif($y==$c_y+1)
                        {
                            if($m>6 and $m!=12)
                            {
                                $sem=3;
                            }  
                            else
                            {

                                $sem=4;
                            }
                        }
                        elseif($y==$c_y+2)
                        {
                            if($m>6 and $m!=12)
                            {
                                $sem=5;
                            }  
                            else
                            {

                                $sem=6;
                            }
                        }
                        $present=0;
                        $_t_n=$info['name'].'_att';
                        $_t_n_f=$info['name'].'_face';
                        $s_id_t=mysqli_query($connect,"SELECT *FROM d$batch.$_t_n");
                        $s_t=mysqli_num_rows($s_id_t);
                        while($info5=mysqli_fetch_assoc($s_id_t))
                        {
                            $id=$info5['id'];
                            $std_batch=substr($id,0,5);
                            $std_branch=substr($id,6,2);
                            $std_roll=substr($id,9,3);
                            if(strlen($id)==11)
                            {
                                $std_branch=substr($id,6,1);
                                $std_roll=substr($id,8,3);
                            }
                            $tb_id=$std_batch.$std_branch.$std_roll;
                            $re2=mysqli_query($connect,"SELECT *FROM d$batch.$_t_n_f WHERE dt='$dt'");
                            while($info6=mysqli_fetch_assoc($re2))
                            {
                                if($info6[$tb_id]=='X')
                                {
                                    $present=$present+1;
                                }
                            }

                        }
            ?>
        <form action="" method="post">
            <input type="hidden" name="batch" value="<?php echo $batch;?>">
            <input type="hidden" name="branch" value="<?php echo $info['name'];?>">
            <input type="hidden" name="sem" value="<?php echo $sem;?>">
            <input type="submit" value="
            <?php echo $info['name'];?>E  <?php echo $x;?>Year
            Total:<?php echo $s_t;?>
            Present:<?php echo $present;?>" name="btn">
        </form>
        <?php
        $batch=$batch-1000;
                    }
                    $batch=$result1[0];
            }
          ?>
            
        </div></div>
</body>
</html>
<?php
require 'connect_db.php';
if(isset($_POST['btn']))
{
    $batch=$_POST['batch'];
    $branch=$_POST['branch'];
    $sem=$_POST['sem'];
    $tb_ch=$branch.'_att';
    $tb_att=$branch.'_face';
    $dt=date('Y-m-d');
    $result3=mysqli_query($connect,"SELECT *FROM d$batch.$tb_ch");
    $count=mysqli_num_rows($result3);
    if($count>0)
    {
        $result4=mysqli_query($connect,"SELECT *FROM d$batch.$tb_att WHERE dt='$dt'");
        $count2=mysqli_num_rows($result4);
        //echo $count2;
        if($count2<=0)
        {
            $coy=mysqli_query($connect,"INSERT INTO d$batch.$tb_att (dt,sem) VALUES ('$dt',$sem)");
           if($coy)
           {
             while($info2=mysqli_fetch_assoc($result3))
             {
                $tb_id=$info2['id'];
                $tb_batch=substr($tb_id,0,5);
                $tb_branch=substr($tb_id,6,2);
                $tb_roll=substr($tb_id,9,3);
                if(strlen($tb_id)==11)
                {
                    $tb_branch=substr($tb_id,6,1);
                    $tb_roll=substr($tb_id,8,3);
                }
                $tb_col=$tb_batch.$tb_branch.$tb_roll;
                //echo $tb_col;
                mysqli_query($connect,"UPDATE d$batch.$tb_att SET $tb_col= 'A' WHERE dt='$dt'");
             }
           }            
        }
        $_SESSION['att_batch']=$batch;
        $_SESSION['att_branch']=$branch;
        $_SESSION['att_sem']=$sem;
        $_SESSION['count_att']=0;
        ?>
        <script>
            window.open('face_att.php','_self');
        </script>
        <?php

    }
    else
    {
        ?>
    <script>
            Swal.fire({
           icon: 'error',
            title: 'No Data Found'
            })
    </script>
    <?php
    }

}
?>