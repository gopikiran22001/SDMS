<!DOCTYPE html>
<html lang="en">
<head>
<?php
    include 'std_info_head.php';
    ?>
    <?php
    $per_1=0;
    $per_3=0;
    $per_4=0;
    $per_5=0;
    $per_6=0;
    $p1=0;
    $p3=0;
    $p4=0;
    $p5=0;
    $p6=0;
    $a1=0;
    $a3=0;
    $a4=0;
    $a5=0;
    $a6=0;
    $tb_att=$branch.'_att';
    $tb_face=$branch.'_face';
    if(mysqli_num_rows(mysqli_query($connect,"SELECT *FROM d$db.$tb_att WHERE id='$id'"))>0)
    {
        $res1=mysqli_query($connect,"SELECT $batch$branch$roll FROM d$db.$tb_face WHERE sem=1");
        if(mysqli_num_rows($res1)>0)
        {
            while($info_a=mysqli_fetch_assoc($res1))
            {
                if($info_a[$batch.$branch.$roll]=='X')
                {
                    $p1=$p1+1;
                }
                else
                {
                    $a1=$a1+1;
                }
            }
            $per_1=100*$p1/($p1+$a1);
        }
        $res3=mysqli_query($connect,"SELECT $batch$branch$roll FROM d$db.$tb_face WHERE sem=3");
        if(mysqli_num_rows($res3)>0)
        {
            while($info_a=mysqli_fetch_assoc($res3))
            {
                if($info_a[$batch.$branch.$roll]=='X')
                {
                    $p3=$p3+1;
                }
                else
                {
                    $a3=$a3+1;
                }
            }
            $per_3=100*$p3/($p3+$a3);
        }
        $res4=mysqli_query($connect,"SELECT $batch$branch$roll FROM d$db.$tb_face WHERE sem=4");
        if(mysqli_num_rows($res4)>0)
        {
            while($info_a=mysqli_fetch_assoc($res4))
            {
                if($info_a[$batch.$branch.$roll]=='X')
                {
                    $p4=$p4+1;
                }
                else
                {
                    $a4=$a4+1;
                }
            }
            $per_4=100*$p4/($p4+$a4);
        }
        $res5=mysqli_query($connect,"SELECT $batch$branch$roll FROM d$db.$tb_face WHERE sem=5");
        if(mysqli_num_rows($res5)>0)
        {
            while($info_a=mysqli_fetch_assoc($res5))
            {
                if($info_a[$batch.$branch.$roll]=='X')
                {
                    $p5=$p5+1;
                }
                else
                {
                    $a5=$a5+1;
                }
            }
            $per_5=100*$p5/($p5+$a5);
        }
        $res6=mysqli_query($connect,"SELECT $batch$branch$roll FROM d$db.$tb_face WHERE sem=6");
        if(mysqli_num_rows($res6)>0)
        {
            while($info_a=mysqli_fetch_assoc($res6))
            {
                if($info_a[$batch.$branch.$roll]=='X')
                {
                    $p6=$p6+1;
                }
                else
                {
                    $a6=$a6+1;
                }
            }
            $per_6=100*$p6/($p6+$a6);
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
        .attend
        {
            min-height: 100%;
            height: auto;
            width: 100%;
            display: flex;
            flex-direction: row;
            background-color: white;
            border-radius: 5px;
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
        #Attendance
        {
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
        <div class="attend">
        <span style="display:flex;flex-direction:column;justify-content:center;align-items:center;width:40%;">
        <span style="display:flex;flex-direction:column;justify-content:center;width:60%;height:190px;border: 2px solid rgba(228, 228, 228, 1);border-radius:5px;margin:20px;">
        <span style="display:flex;justify-content:center;align-items;">
            <span style="font-size:24px;margin-bottom:15px;"><b>1 SEM</b></span>
        </span>
        <span style="display:flex;flex-direction:row;">
        <span style="display:flex;flex-direction:column;justify-content:center;">
        <span style="color:black; margin-left:25px;"><b>Total Days:</b><?php echo $p1+$a1;?></span>
            <span style="color:rgba(62, 220, 78, 1);margin-left:25px;"><b>Attended:</b><?php echo $p1;?></span>
            <span style="color:red;margin-left:25px;"><b>Absent:</b><?php echo $a1;?></span>
        </span>
        <span style="height:65px;width:30%;margin-left:60px;display:flex;align-items:center;font-size:24px;justify-content:center;border:0px solid black;border-radius:5px;background-color: rgba(129, 71, 231, 0.2);color: rgba(129, 71, 231, 1);"><?php echo number_format($per_1, 2, '.', '');?>%</span>
    </span>
        </span>
        <span style="display:flex;flex-direction:column;justify-content:center;width:60%;height:190px;border: 2px solid rgba(228, 228, 228, 1);border-radius:5px;margin:20px;">
        <span style="display:flex;justify-content:center;align-items;">
            <span style="font-size:24px;margin-bottom:15px;"><b>3 SEM</b></span>
        </span>
        <span style="display:flex;flex-direction:row;">
        <span style="display:flex;flex-direction:column;justify-content:center;">
        <span style="color:black; margin-left:25px;"><b>Total Days:</b><?php echo $p3+$a3;?></span>
            <span style="color:rgba(62, 220, 78, 1);margin-left:25px;"><b>Attended:</b><?php echo $p3;?></span>
            <span style="color:red;margin-left:25px;"><b>Absent:</b><?php echo $a3;?></span>
        </span>
        <span style="height:65px;width:30%;margin-left:60px;display:flex;align-items:center;font-size:24px;justify-content:center;border:0px solid black;border-radius:5px;background-color: rgba(129, 71, 231, 0.2);color: rgba(129, 71, 231, 1);"><?php echo number_format($per_3, 2, '.', '');?>%</span>
    </span>
        </span>
        <span style="display:flex;flex-direction:column;justify-content:center;width:60%;height:190px;border: 2px solid rgba(228, 228, 228, 1);border-radius:5px;margin:20px;">
        <span style="display:flex;justify-content:center;align-items;">
            <span style="font-size:24px;margin-bottom:15px;"><b>4 SEM</b></span>
        </span>
        <span style="display:flex;flex-direction:row;">
        <span style="display:flex;flex-direction:column;justify-content:center;">
        <span style="color:black; margin-left:25px;"><b>Total Days:</b><?php echo $p4+$a4;?></span>
            <span style="color:rgba(62, 220, 78, 1);margin-left:25px;"><b>Attended:</b><?php echo $p4;?></span>
            <span style="color:red;margin-left:25px;"><b>Absent:</b><?php echo $a4;?></span>
        </span>
        <span style="height:65px;width:30%;margin-left:60px;display:flex;align-items:center;font-size:24px;justify-content:center;border:0px solid black;border-radius:5px;background-color: rgba(129, 71, 231, 0.2);color: rgba(129, 71, 231, 1);"><?php echo number_format($per_4, 2, '.', '');?>%</span>
    </span>
        </span>
        <span style="display:flex;flex-direction:column;justify-content:center;width:60%;height:190px;border: 2px solid rgba(228, 228, 228, 1);border-radius:5px;margin:20px;">
        <span style="display:flex;justify-content:center;align-items;">
            <span style="font-size:24px;margin-bottom:15px;"><b>5 SEM</b></span>
        </span>
        <span style="display:flex;flex-direction:row;">
        <span style="display:flex;flex-direction:column;justify-content:center;">
        <span style="color:black; margin-left:25px;"><b>Total Days:</b><?php echo $p5+$a5;?></span>
            <span style="color:rgba(62, 220, 78, 1);margin-left:25px;"><b>Attended:</b><?php echo $p5;?></span>
            <span style="color:red;margin-left:25px;"><b>Absent:</b><?php echo $a5;?></span>
        </span>
        <span style="height:65px;width:30%;margin-left:60px;display:flex;align-items:center;font-size:24px;justify-content:center;border:0px solid black;border-radius:5px;background-color: rgba(129, 71, 231, 0.2);color: rgba(129, 71, 231, 1);"><?php echo number_format($per_5, 2, '.', '');?>%</span>
    </span>
        </span>
        <span style="display:flex;flex-direction:column;justify-content:center;width:60%;height:190px;border: 2px solid rgba(228, 228, 228, 1);border-radius:5px;margin:20px;">
        <span style="display:flex;justify-content:center;align-items;">
            <span style="font-size:24px;margin-bottom:15px;"><b>6 SEM</b></span>
        </span>
        <span style="display:flex;flex-direction:row;">
        <span style="display:flex;flex-direction:column;justify-content:center;">
        <span style="color:black; margin-left:25px;"><b>Total Days:</b><?php echo $p6+$a6;?></span>
            <span style="color:rgba(62, 220, 78, 1);margin-left:25px;"><b>Attended:</b><?php echo $p6;?></span>
            <span style="color:red;margin-left:25px;"><b>Absent:</b><?php echo $a6;?></span>
        </span>
        <span style="height:65px;width:30%;margin-left:60px;display:flex;align-items:center;font-size:24px;justify-content:center;border:0px solid black;border-radius:5px;background-color: rgba(129, 71, 231, 0.2);color: rgba(129, 71, 231, 1);"><?php echo number_format($per_6, 2, '.', '');?>%</span>
    </span>
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