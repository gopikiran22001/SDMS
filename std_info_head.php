<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script src="sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<?php
require 'connect_db.php';
session_start();
error_reporting(0);
if($_SESSION['std_info_id']==false)
{
    ?>
    <script>
        window.open('std_check.php','_self');
    </script><?php
}
    $id=$_SESSION['std_info_id'];
    $batch=substr($id,0,5);
    $branch=substr($id,6,2);
    $roll=substr($id,9,3);
    if(strlen($id)==11)
    {
        $branch=substr($id,6,1);
        $roll=substr($id,8,3);
    }
    $db=substr($batch,0,2).'466';
    $result1=mysqli_query($connect,"SELECT * FROM d$db.$branch WHERE id='$id'");
    $per=0;
    $no=0;
    $gto=0;
    $info=mysqli_fetch_assoc($result1);
    $res1=mysqli_fetch_assoc(mysqli_query($connect,"SELECT *FROM student_management.branch WHERE name='$branch'"));
    $tb_c=$branch.'_att';
    $tb=mysqli_num_rows(mysqli_query($connect,"SELECT *FROM d$db.$tb_c WHERE id='$id'"));
    if($tb>0)
    {
    
        $tb_n=$branch.'_face';
        $y=date('y');
        $m=date('m');
        $c_y=substr($db,0,2);
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
        $c_2=mysqli_query($connect,"SELECT $batch$branch$roll FROM d$db.$tb_n WHERE sem='$sem' and $batch$branch$roll='A'");
        $no=mysqli_num_rows(mysqli_query($connect,"SELECT $batch$branch$roll FROM d$db.$tb_n WHERE sem='$sem' and $batch$branch$roll='X'"));
       $gto=mysqli_num_rows($c_2)+$no;
       $per=100*$no/$gto;
      
    }

  
    ?>