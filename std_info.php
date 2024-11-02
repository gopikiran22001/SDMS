<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include 'std_info_head.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT INFO</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">

    <style>
        <?php
        include 'css/stdinfo.css';
        ?>
        .general
        {
            height: auto;
            min-height: 450px;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: white;
            border-radius: 5px;
        }
        .general span
        {
            margin-top: 5px;
            margin-bottom: 5px;
        }
        #general{
            color: rgba(61, 112, 245, 1);
    border-bottom: 2px solid rgba(61, 112, 245, 1);
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
    </style>
</head>
<body>
    
    <div class="box">
        <?php
        include 'std_info_side.php';
        ?>
        <div class="general">
            <span style="display:flex;flex-direction:row;justify-content:center;width:100%;">
            <span style="display:flex;flex-direction:column;justify-content:center;width:50%;">
                <span><b>Course:</b>Diploma</span>
                <span><b>Branch:</b><?php echo $res1['bname'];?></span>
                <span><b>Batch:</b><?php echo $batch;?></span>
                <span><b>Course Duration:</b>20<?php echo substr($batch,0,2);?> to 20<?php echo substr($batch,0,2)+3;?></span>
                <span><b>Full Name:</b><?php echo $info['name'],"  ",$info['lname'];?></span>
            </span>
            <span style="display:flex;flex-direction:column;justify-content:center;">
            <span><b>Father's Name:</b><?php echo $info['fname'];?></span>
                <span><b>Mother's Name:</b><?php echo $info['mname'];?></span>
            <span><b>Phone:</b><?php echo $info['phone'];?></span>
            <span><b>Address:</b><?php echo $info['address'];?></span>
        </span></span>
        <span style="display:flex;flex-direction:row;justify-content:center;width:100%;">
        <span style="display:flex;flex-direction:column;justify-content:center;width:25%;height:170px;border: 2px solid rgba(228, 228, 228, 1);border-radius:5px;">
            <span style="color:black; margin-left:25px;"><b>Total Days:</b><?php echo $gto;?></span>
            <span style="color:rgba(62, 220, 78, 1);margin-left:25px;"><b>Attended:</b><?php echo $no;?></span>
            <span style="color:red;margin-left:25px;"><b>Absent:</b><?php echo $gto-$no;?></span>
            <button style="width:40%;height:30px;border-radius:5px;" onclick="window.open('std_info_att.php','_self');">View Details</button>
        </span>
        <?php
        $g_r=0;
        $per_r=0;
        $temp1=mysqli_query($connect,"SELECT *FROM d$db.$batch$branch$roll");
        $g_r_s=mysqli_num_rows($temp1);
        if($g_r_s>0)
        {
            if(mysqli_num_rows(mysqli_query($connect,"SELECT *FROM d$db.$batch$branch$roll WHERE sem=1")))
            {
                $g_r_s=$g_r_s-1;
            }
            while($info1=mysqli_fetch_assoc($temp1))
            {

                $g_r=$g_r+$info1['internal'];
                $g_r=$g_r+$info1['external'];
            }
            $per_r=$g_r*100/($g_r_s*100);
        }
        
        ?>
        <span style="margin-left:6%;margin-right:6%;display:flex;flex-direction:column;justify-content:center;width:25%;height:170px;border: 2px solid rgba(228, 228, 228, 1);border-radius:5px;">
        <span style="display:flex;justify-content:center;align-items:center;">
            <span style="height:90px;width:60%;background-color: rgba(129, 71, 231, 0.2);    color: rgba(129, 71, 231, 1);border-radius:5px;font-size:40px;border:0px solid black;display:flex;justify-content:center;align-items:center;"><?php echo number_format($per_r, 2, '.', '')?>%</span></span>
            <button onclick="window.open('std_info_acad.php','_self');" style="width:40%;height:30px;border-radius:5px;">View Details</button>
        </span>
        <span style="display:flex;flex-direction:column;justify-content:center;width:25%;height:170px;border: 2px solid rgba(228, 228, 228, 1);border-radius:5px;">
            <span style="color:black; margin-left:25px;"><b>Total Subjects:</b><?php echo mysqli_num_rows(mysqli_query($connect,"SELECT *FROM d$db.$batch$branch$roll"));?></span>
            <span style="color:rgba(62, 220, 78, 1);margin-left:25px;"><b>Passed:</b><?php echo mysqli_num_rows(mysqli_query($connect,"SELECT *FROM d$db.$batch$branch$roll WHERE grade='P'"));?></span>
            <span style="color:red;margin-left:25px;"><b>Backlog:</b><?php echo mysqli_num_rows(mysqli_query($connect,"SELECT *FROM d$db.$batch$branch$roll WHERE grade='F'"));?></span>
            <button onclick="window.open('std_info_acad.php','_self');" style="width:40%;height:30px;border-radius:5px;">View Details</button>
        </span>
    </span>
        </div>
    </div>
</body>
</html>