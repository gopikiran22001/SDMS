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
        $result2=mysqli_query($connect,"SELECT * FROM d$db.$batch$branch$roll WHERE sem='$sem'");
        $count2=mysqli_num_rows($result2);
        if($count2>0)
        {
            $_SESSION['id1']=$id;
            $_SESSION['sem1']=$sem;
            ?>
            <script>
                window.open('result_show.php','_blank');
            </script>
            <?php
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