
<html>
    <head>
   <?php
include 'head.php';
   ?>
   <title>DASHBOARD</title>
   <link rel="shortcut icon" href="icon/29302.png" type="image/png">

<style>
  <?php
  include 'css/admin_dash.css';
  ?>
  .box
  {
    background-color: white;
    height: auto;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  .main
  {
    margin-top: 30px;
    height:260px;
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    border: 0px solid black;
  }
  .main span
  {
    box-shadow: 0px 4px 12px 0px rgba(129,71,231,0.2);
    background-color: rgba(129,71,231,1);
    color: white;
    height: 220px;
    width: 40%;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 0px solid black;
    border-radius: 5px;
    font-size: 36px;
  }
  .sub
  {
    margin-top: 10px;
    height:auto;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    border: 0px solid black;
  }
  .branch
  {
    height:150px;
    width: 25%;
    background-color: rgba(129,71,231,0.2);
    margin: 4.16666666667%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    border: 0px solid black;
    border-radius: 5px;
    box-shadow: 0px 4px 12px 0px rgba(129,71,231,1);
  }
  .branch span
  {
    font-size: 18px;
  }
</style>
    </head>
    <body>
    <?php
    include 'admin_header.php';
    ?>
    <div class="cont">
<?php
include 'options/dash.php';
include 'admin_side.php';
?>
<div class="box">
    <?php
    require 'connect_db.php';
    $result2=mysqli_query($connect,"SELECT *FROM student_management.branch");
    $result1=mysqli_fetch_row(mysqli_query($connect,"SELECT MAX(batch) FROM student_management.batch"));
    $batch=$result1[0];
    $total_std=0;
    $total_att=0;
    $dt=date('Y-m-d');
        while($info=mysqli_fetch_assoc($result2))
        {
            for($x=1;$x<4;$x++)
            {
                $y=date('y');
                $m=date('m');
                $c_y=substr($batch,0,2);
                $_t_n=$info['name'].'_att';
                $_t_n_f=$info['name'].'_face';
                $s_id_t=mysqli_query($connect,"SELECT *FROM d$batch.$_t_n");
                $s_t=mysqli_num_rows($s_id_t);
                $total_std=$total_std+$s_t;
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
                            $total_att=$total_att+1;
                        }
                    }

                }
$batch=$batch-1000;
            }
            $batch=$result1[0];
    }
  ?>
    <div class="main">
        <span style="margin-right:5%;">
            <i>TOTAL STUDENTS:<?php echo $total_std;?></i>
        </span>
        <span style="margin-left:5%;">
        <i>            ATTENDED STUDENTS:<?php echo $total_att;?>
</i>
        </span>
    </div>
    <div class="sub">
    <?php
        require 'connect_db.php';
        $result2=mysqli_query($connect,"SELECT *FROM student_management.branch");
        $result1=mysqli_fetch_row(mysqli_query($connect,"SELECT MAX(batch) FROM student_management.batch"));
        $batch=$result1[0];
            while($info=mysqli_fetch_assoc($result2))
            {
                ?>
                <span style="display:flex;flex-direction:row;height:auto;width:100%;">
                <?php
                for($x=1;$x<4;$x++)
                {
                    $y=date('y');
                    $m=date('m');
                    $c_y=substr($batch,0,2);
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
                    <div class="branch" style="">
                            <span><?php echo $info['name'].'E'.'   '.$x.'YEAR';?></span>
                            <span style="display:flex;flex-direction:row;">
                                <span style="margin: 15px;">
                                    Total Students:<?php echo $s_t;?>
                                </span>
                                <span style="margin: 15px;">
                                    Attended Students:<?php echo $present;?>
                                </span>
                            </span>
                    </div>
                    <?php

    $batch=$batch-1000;
                }?>
                </span><?php
                $batch=$result1[0];
                
        }
    ?>
    </div>
</div>
</div>
    </body>
</html>
<?php
require 'connect_db.php';
$y=date('y');
$m=date('m');
$yy=date('Y');
$c=466;
if($m<6)
{
    $y=$y-1;
    $yy=$yy-1;
}
$dur=$yy+3;
$db=$y.$c;

    $res=mysqli_query($connect,"SELECT * FROM student_management.batch WHERE batch=$db");
    $cot=mysqli_num_rows($res);
    if($cot<=0)
    {
        $result=mysqli_query($connect,"INSERT INTO student_management.batch (batch,dur) VALUES ('$db','$yy to $dur')");
        if($result)
        {
            $sql="CREATE DATABASE d$db";
            $result1=mysqli_query($connect,$sql);
            if($result1)
            {
                $current=getcwd();
                $a='\Attendance';
                $cc=$current.$a;
                $b=$cc.'\\'.$db;
                $result2=mysqli_query($connect,"SELECT * FROM student_management.branch");
                while($info=mysqli_fetch_assoc($result2))
                {
                    mysqli_query($connect,"CREATE TABLE d$db.$info[name] (id VARCHAR(12) NOT NULL , name VARCHAR(255) NOT NULL , lname VARCHAR(255) NOT NULL , fname VARCHAR(255) NOT NULL , mname VARCHAR(255) NOT NULL , img VARBINARY(255) NOT NULL , gender VARCHAR(255) NOT NULL , dob DATE NOT NULL , phone BIGINT NOT NULL , address TEXT NOT NULL , PRIMARY KEY (`id`(12)))");
                    mysqli_query($connect,"CREATE TABLE d$db.$info[name]_att(id VARCHAR(12) NOT NULL ,img VARBINARY(255) NOT NULL ,PRIMARY KEY (`id`(12)))");
                    mysqli_query($connect,"CREATE TABLE d$db.$info[name]_face(dt DATE NOT NULL ,sem BIGINT NOT NULL , PRIMARY KEY (`dt`))");
                 
                   
                } 
                mkdir($current."/upload-$db",0777);
            }
        }
    }
?>