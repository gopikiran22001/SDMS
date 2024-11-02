
    
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
    $c_1=mysqli_num_rows(mysqli_query($connect,"SELECT *FROM student_management.batch WHERE batch='$db'"));
if($c_1>0)
{
    $c_2=mysqli_num_rows(mysqli_query($connect,"SELECT *FROM student_management.branch WHERE name='$branch'"));
    if($c_2>0)
    {
        $c_3=mysqli_num_rows(mysqli_query($connect,"SELECT *FROM d$db.$branch WHERE id='$id'")); 
        if($c_3>0)
        {
            $result2=mysqli_query($connect,"SELECT * FROM d$db.$batch$branch$roll WHERE sem='$sem'");
            $count2=mysqli_num_rows($result2);
            if($count2>0)
            {
                ?>
                <script>
                        Swal.fire({
                       icon: 'error',
                        title: 'Already Uploaded'
                        })
                </script>
                <?php
            }
            else
            {
        $result3=mysqli_query($connect,"SELECT *FROM student_management.$branch WHERE sem='$sem'");
        $e=1;
        $i=1;
        while($info3=mysqli_fetch_assoc($result3))
        {
            $code=$info3['code'];
            $type=$info3['type'];
            $external=$_POST["e$e"];
            $internal=$_POST["i$i"];
            $total=$external+$internal;
            if($type=='T')
            {
                if($external<29)
            {
                mysqli_query($connect,"INSERT INTO d$db.$batch$branch$roll(code,internal,external,total,grade,sem) VALUES ($code,$internal,$external,$total,'F',$sem)");
            }
            else
            {
                if($total<36)
                {
                    mysqli_query($connect,"INSERT INTO d$db.$batch$branch$roll(code,internal,external,total,grade,sem) VALUES ($code,$internal,$external,$total,'F',$sem)");
                }
                else
                {
                    mysqli_query($connect,"INSERT INTO d$db.$batch$branch$roll(code,internal,external,total,grade,sem) VALUES ($code,$internal,$external,$total,'P',$sem)");
                }
            }
            }
            else
            {
                if($code==109 or $code==110)
                {
                    if($external<15)
                    {
                        mysqli_query($connect,"INSERT INTO d$db.$batch$branch$roll(code,internal,external,total,grade,sem) VALUES ($code,$internal,$external,$total,'F',$sem)");
                    }
                    else
                    {
                        if($total<25)
                        {
                            mysqli_query($connect,"INSERT INTO d$db.$batch$branch$roll(code,internal,external,total,grade,sem) VALUES ($code,$internal,$external,$total,'F',$sem)");
                        }
                        else
                        {
                            mysqli_query($connect,"INSERT INTO d$db.$batch$branch$roll(code,internal,external,total,grade,sem) VALUES ($code,$internal,$external,$total,'P',$sem)");
                        }
                    }
                     
                }
                else
                {
                    if($external<30)
                    {
                        mysqli_query($connect,"INSERT INTO d$db.$batch$branch$roll(code,internal,external,total,grade,sem) VALUES ($code,$internal,$external,$total,'F',$sem)");
                    }
                    else
                    {
                        if($total<50)
                        {
                            mysqli_query($connect,"INSERT INTO d$db.$batch$branch$roll(code,internal,external,total,grade,sem) VALUES ($code,$internal,$external,$total,'F',$sem)");
                        }
                        else
                        {
                            mysqli_query($connect,"INSERT INTO d$db.$batch$branch$roll(code,internal,external,total,grade,sem) VALUES ($code,$internal,$external,$total,'P',$sem)");
                        }
                    } 
                }
            }
            $e=$e+1;
            $i=$i+1;
        }
        $_SESSION['result_upload_count']='true';
        ?>
        <script>
            window.open('upload_res.php','_self');
        </script><?php
        
        }
        }  
        else
        {
            ?>
            <script>
                    Swal.fire({
                   icon: 'error',
                    title: 'ID Not Found'
                    })
            </script>
            <?php
        }     
 
    }
    else
    {
        ?>
        <script>
                Swal.fire({
               icon: 'error',
                title: 'Invalid ID'
                })
        </script>
        <?php
    }
}
else
{
    ?>
    <script>
            Swal.fire({
           icon: 'error',
            title: 'Invalid ID'
            })
    </script>
    <?php
}
}
?>