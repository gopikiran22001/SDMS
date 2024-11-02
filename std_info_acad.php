<!DOCTYPE html>
<html lang="en">
<head>
<?php
    include 'std_info_head.php';
    ?>
    <?php
    $g_1=0;
    $g_3=0;
    $g_6=0;
    $g_4=0;
    $g_5=0;
    $per_1=0;
    $per_3=0;
    $per_4=0;
    $per_5=0;
    $per_6=0;
    $result_count=0;
    if(mysqli_num_rows(mysqli_query($connect,"SELECT *FROM d$db.$batch$branch$roll")))
    {
        $res1=mysqli_query($connect,"SELECT *FROM d$db.$batch$branch$roll WHERE sem=1");
        if(mysqli_num_rows($res1)>0)
        {
            while($info_r=mysqli_fetch_assoc($res1))
            {
                $g_1=$g_1+$info_r['internal'];
                $g_1=$g_1+$info_r['external'];
            }
            $per_1=100*$g_1/((mysqli_num_rows($res1)-1)*100);
        }
        $res3=mysqli_query($connect,"SELECT *FROM d$db.$batch$branch$roll WHERE sem=3");
        if(mysqli_num_rows($res3)>0)
        {
            while($info_r=mysqli_fetch_assoc($res3))
            {
                $g_3=$g_3+$info_r['internal'];
                $g_3=$g_3+$info_r['external'];
            }
            $per_3=100*$g_3/(mysqli_num_rows($res3)*100);
        }
        $res4=mysqli_query($connect,"SELECT *FROM d$db.$batch$branch$roll WHERE sem=4");
        if(mysqli_num_rows($res4)>0)
        {
            while($info_r=mysqli_fetch_assoc($res4))
            {
                $g_4=$g_4+$info_r['internal'];
                $g_4=$g_4+$info_r['external'];
            }
            $per_4=100*$g_4/(mysqli_num_rows($res4)*100);
        }
        $res5=mysqli_query($connect,"SELECT *FROM d$db.$batch$branch$roll WHERE sem=5");
        if(mysqli_num_rows($res5)>0)
        {
            while($info_r=mysqli_fetch_assoc($res5))
            {
                $g_5=$g_5+$info_r['internal'];
                $g_5=$g_5+$info_r['external'];
            }
            $per_5=100*$g_5/(mysqli_num_rows($res5)*100);
        }
        $res6=mysqli_query($connect,"SELECT *FROM d$db.$batch$branch$roll WHERE sem=6");
        if(mysqli_num_rows($res6)>0)
        {
            while($info_r=mysqli_fetch_assoc($res6))
            {
                $g_6=$g_6+$info_r['internal'];
                $g_6=$g_6+$info_r['external'];
            }
            $per_6=100*$g_6/(mysqli_num_rows($res6)*100);
        }
    }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT INFO</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">

    <style>
                <?php
        include 'css/stdinfo.css';
        ?>
        .academics
        {
            min-height: 100%;
            height: auto;
            width: 100%;
            display: flex;
            flex-direction: row;
            background-color: white;
            border-radius: 5px;
        }
        button{
            border: 0px;
            background-color: rgba(61, 112, 245, 1);
            color: rgba(228, 228, 228, 1);
            margin-left: 30%;
        }
        button:hover{
            background-color: rgba(61, 112, 245, 0.7);
        }
        .graph
        {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            width: 55%;
            margin-top: 5%;
            margin-bottom: 5%;
            margin-right: 5%;
            height: auto;
            border: 0px solid black;
        }
        .graph_box{
            min-height: 550px;
            width: 440px;
            display: flex;
            align-items: last baseline;
            border-left: 1px solid black;
            border-bottom: 1px solid black;
        }
        #sem1
        {
            height:<?php echo number_format($per_1, 2, '.', '')*4.8;?>px;
        }
        #sem3
        {
            height:<?php echo number_format($per_3, 2, '.', '')*4.8;?>px;
        }
        #sem4
        {
            height:<?php echo number_format($per_4, 2, '.', '')*4.8;?>px;
        }
        #sem5
        {
            height:<?php echo number_format($per_5, 2, '.', '')*4.8;?>px;
        }
        #sem6
        {
            height:<?php echo number_format($per_6, 2, '.', '')*4.8;?>px;
        }
        #Academics{
            color: rgba(61, 112, 245, 1);
    border-bottom: 2px solid rgba(61, 112, 245, 1);
        }
    </style>
</head>
<body>
    <div class="box">
    <?php
        include 'std_info_side.php';
        ?>
        <div class="academics">
        <span style="display:flex;flex-direction:column;justify-content:center;align-items:center;width:40%;">
        <span style="display:flex;flex-direction:column;justify-content:center;width:60%;height:190px;border: 2px solid rgba(228, 228, 228, 1);border-radius:5px;margin:20px;">
        <span style="display:flex;justify-content:center;align-items;">
            <span style="font-size:24px;margin-bottom:15px;"><b>1 SEM</b></span>
        </span>
        <span style="display:flex;flex-direction:row;">
        <span style="display:flex;flex-direction:column;justify-content:center;">
        <span style="color:black; margin-left:25px;"><b>Total Subjects:</b><?php echo mysqli_num_rows(mysqli_query($connect,"SELECT *FROM d$db.$batch$branch$roll WHERE sem=1"));?></span>
            <span style="color:rgba(62, 220, 78, 1);margin-left:25px;"><b>Passed:</b><?php echo mysqli_num_rows(mysqli_query($connect,"SELECT *FROM d$db.$batch$branch$roll WHERE sem=1 and grade='P'"));?></span>
            <span style="color:red;margin-left:25px;"><b>Backlog:</b><?php echo mysqli_num_rows(mysqli_query($connect,"SELECT *FROM d$db.$batch$branch$roll WHERE sem=1 and grade='F'"));?></span>
        </span>
        <span style="height:65px;width:30%;margin-left:60px;display:flex;align-items:center;font-size:24px;justify-content:center;border:0px solid black;border-radius:5px;background-color: rgba(129, 71, 231, 0.2);color: rgba(129, 71, 231, 1);"><?php echo number_format($per_1, 2, '.', '');?>%</span>
    </span>
    <form action="" method="post">
        <input type="hidden" name="sem" value="1">
    <button inputype="submit" style="width:40%;height:30px;border-radius:5px;" onclick="<?php $result_count=1;?>">View Details</button>
    </form>
        </span>
        <span style="display:flex;flex-direction:column;justify-content:center;width:60%;height:190px;border: 2px solid rgba(228, 228, 228, 1);border-radius:5px;margin:20px;">
        <span style="display:flex;justify-content:center;align-items;">
            <span style="font-size:24px;margin-bottom:15px;"><b>3 SEM</b></span>
        </span>
        <span style="display:flex;flex-direction:row;">
        <span style="display:flex;flex-direction:column;justify-content:center;">
        <span style="color:black; margin-left:25px;"><b>Total Subjects:</b><?php echo mysqli_num_rows(mysqli_query($connect,"SELECT *FROM d$db.$batch$branch$roll WHERE sem=3"));?></span>
            <span style="color:rgba(62, 220, 78, 1);margin-left:25px;"><b>Passed:</b><?php echo mysqli_num_rows(mysqli_query($connect,"SELECT *FROM d$db.$batch$branch$roll WHERE sem=3 and grade='P'"));?></span>
            <span style="color:red;margin-left:25px;"><b>Backlog:</b><?php echo mysqli_num_rows(mysqli_query($connect,"SELECT *FROM d$db.$batch$branch$roll WHERE sem=3 and grade='F'"));?></span>
        </span>
        <span style="height:65px;width:30%;margin-left:60px;display:flex;align-items:center;font-size:24px;justify-content:center;border:0px solid black;border-radius:5px;background-color: rgba(129, 71, 231, 0.2);color: rgba(129, 71, 231, 1);"><?php echo number_format($per_3, 2, '.', '');?>%</span>
    </span>
    <form action="" method="post">
        <input type="hidden" name="sem" value="3">
    <button inputype="submit" style="width:40%;height:30px;border-radius:5px;" onclick="<?php $result_count=1;?>">View Details</button>
    </form>
        </span>
        <span style="display:flex;flex-direction:column;justify-content:center;width:60%;height:190px;border: 2px solid rgba(228, 228, 228, 1);border-radius:5px;margin:20px;">
        <span style="display:flex;justify-content:center;align-items;">
            <span style="font-size:24px;margin-bottom:15px;"><b>4 SEM</b></span>
        </span>
        <span style="display:flex;flex-direction:row;">
        <span style="display:flex;flex-direction:column;justify-content:center;">
        <span style="color:black; margin-left:25px;"><b>Total Subjects:</b><?php echo mysqli_num_rows(mysqli_query($connect,"SELECT *FROM d$db.$batch$branch$roll WHERE sem=4"));?></span>
            <span style="color:rgba(62, 220, 78, 1);margin-left:25px;"><b>Passed:</b><?php echo mysqli_num_rows(mysqli_query($connect,"SELECT *FROM d$db.$batch$branch$roll WHERE sem=4 and grade='P'"));?></span>
            <span style="color:red;margin-left:25px;"><b>Backlog:</b><?php echo mysqli_num_rows(mysqli_query($connect,"SELECT *FROM d$db.$batch$branch$roll WHERE sem=4 and grade='F'"));?></span>
        </span>
        <span style="height:65px;width:30%;margin-left:60px;display:flex;align-items:center;font-size:24px;justify-content:center;border:0px solid black;border-radius:5px;background-color: rgba(129, 71, 231, 0.2);color: rgba(129, 71, 231, 1);"><?php echo number_format($per_4, 2, '.', '');?>%</span>
    </span>
    <form action="" method="post">
        <input type="hidden" name="sem" value="4">
    <button inputype="submit" style="width:40%;height:30px;border-radius:5px;" onclick="<?php $result_count=1;?>">View Details</button>
    </form>
        </span>
        <span style="display:flex;flex-direction:column;justify-content:center;width:60%;height:190px;border: 2px solid rgba(228, 228, 228, 1);border-radius:5px;margin:20px;">
        <span style="display:flex;justify-content:center;align-items;">
            <span style="font-size:24px;margin-bottom:15px;"><b>5 SEM</b></span>
        </span>
        <span style="display:flex;flex-direction:row;">
        <span style="display:flex;flex-direction:column;justify-content:center;">
        <span style="color:black; margin-left:25px;"><b>Total Subjects:</b><?php echo mysqli_num_rows(mysqli_query($connect,"SELECT *FROM d$db.$batch$branch$roll WHERE sem=5"));?></span>
            <span style="color:rgba(62, 220, 78, 1);margin-left:25px;"><b>Passed:</b><?php echo mysqli_num_rows(mysqli_query($connect,"SELECT *FROM d$db.$batch$branch$roll WHERE sem=5 and grade='P'"));?></span>
            <span style="color:red;margin-left:25px;"><b>Backlog:</b><?php echo mysqli_num_rows(mysqli_query($connect,"SELECT *FROM d$db.$batch$branch$roll WHERE sem=5 and grade='F'"));?></span>
        </span>
        <span style="height:65px;width:30%;margin-left:60px;display:flex;align-items:center;font-size:24px;justify-content:center;border:0px solid black;border-radius:5px;background-color: rgba(129, 71, 231, 0.2);color: rgba(129, 71, 231, 1);"><?php echo number_format($per_5, 2, '.', '');?>%</span>
    </span>
    <form action="" method="post">
        <input type="hidden" name="sem" value="5">
    <button inputype="submit" style="width:40%;height:30px;border-radius:5px;" onclick=" <?php $result_count=1;?>">View Details</button>
    </form>
        </span>
        <span style="display:flex;flex-direction:column;justify-content:center;width:60%;height:190px;border: 2px solid rgba(228, 228, 228, 1);border-radius:5px;margin:20px;">
        <span style="display:flex;justify-content:center;align-items;">
            <span style="font-size:24px;margin-bottom:15px;"><b>6 SEM</b></span>
        </span>
        <span style="display:flex;flex-direction:row;">
        <span style="display:flex;flex-direction:column;justify-content:center;">
        <span style="color:black; margin-left:25px;"><b>Total Subjects:</b><?php echo mysqli_num_rows(mysqli_query($connect,"SELECT *FROM d$db.$batch$branch$roll WHERE sem=6"));?></span>
            <span style="color:rgba(62, 220, 78, 1);margin-left:25px;"><b>Passed:</b><?php echo mysqli_num_rows(mysqli_query($connect,"SELECT *FROM d$db.$batch$branch$roll WHERE sem=6 and grade='P'"));?></span>
            <span style="color:red;margin-left:25px;"><b>Backlog:</b><?php echo mysqli_num_rows(mysqli_query($connect,"SELECT *FROM d$db.$batch$branch$roll WHERE sem=6 and grade='F'"));?></span>
        </span>
        <span style="height:65px;width:30%;margin-left:60px;display:flex;align-items:center;font-size:24px;justify-content:center;border:0px solid black;border-radius:5px;background-color: rgba(129, 71, 231, 0.2);color: rgba(129, 71, 231, 1);"><?php echo number_format($per_6, 2, '.', '');?>%</span>
    </span>
    <form action="" method="post">
        <input type="hidden" name="sem" value="6">
    <button inputype="submit" style="width:40%;height:30px;border-radius:5px;" onclick="<?php $result_count=1;?>">View Details</button>
    </form>
        </span>

    </span>
    <div class="graph">
        <span style="display:flex;flex-direction:column;height:500px;margin-top:50px;">
            <span style="font-size:20px;margin-bottom:30px;height:20px;">100%-</span>
            <span style="font-size:20px;margin-bottom:30px;height:20px;">90%-</span>
            <span style="font-size:20px;margin-bottom:30px;height:20px;">80%-</span>
            <span style="font-size:20px;margin-bottom:30px;height:20px;">70%-</span>
            <span style="font-size:20px;margin-bottom:30px;height:20px;">60%-</span>
            <span style="font-size:20px;margin-bottom:30px;height:20px;">50%-</span>
            <span style="font-size:20px;margin-bottom:30px;height:20px;">40%-</span>
            <span style="font-size:20px;margin-bottom:30px;height:20px;">30%-</span>
            <span style="font-size:20px;margin-bottom:30px;height:20px;">20%-</span>
            <span style="font-size:20px;margin-bottom:30px;height:20px;">10%-</span>
        </span>
        <span style="display:flex;flex-direction:column;width:440px;height:550px;">
        <div class="graph_box">
                <span id="sem1" style="border:0px solid black;margin-left:40px;width:40px;background-color:rgba(143, 109, 255, 1);"></span>
                <span id="sem3" style="border:0px solid black;margin-left:40px;width:40px;background-color:rgba(143, 109, 255, 1);"></span>
                <span id="sem4" style="border:0px solid black;margin-left:40px;width:40px;background-color:rgba(143, 109, 255, 1);"></span>
                <span id="sem5" style="border:0px solid black;margin-left:40px;width:40px;background-color:rgba(143, 109, 255, 1);"></span>
                <span id="sem6" style="border:0px solid black;margin-left:40px;width:40px;background-color:rgba(143, 109, 255, 1);"></span>
                </div>
                <span style="display:flex;flex-direction:row;width:440px;">
        <span style="width:40px;margin-left:40px;">1Sem</span>
        <span style="width:40px;margin-left:40px;">3Sem</span>
        <span style="width:40px;margin-left:40px;">4Sem</span>
        <span style="width:40px;margin-left:40px;">5Sem</span>
        <span style="width:40px;margin-left:40px;">6Sem</span>
        </span>
        </span>

    </div>
        </div>
    </div>
    
</body>
</html>
<?php
if($result_count>0)
{
    require 'connect_db.php';
    $sem=$_POST['sem'];
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
    $result_count=0;
}

?>