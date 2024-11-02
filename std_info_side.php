<div class="details">
        <img src="./upload-<?php echo $db;?>/<?php echo $info['img'];?>">
        <div class="name">
            <span><b>ID:</b><?php echo $info['id'];?></span>
            <span><b>Name:</b><?php echo $info['name'];?></span>
            <span><b>Date Of Birth:</b><?php echo $info['dob'];?></span>
            <span><b>Gender:</b><?php echo $info['gender'];?></span>
        </div>
        <div class="att">
            <span id="a1">
                <span style="height:29px;width:136px;font-size:24px;color:black;margin-left:35px;margin-top:15px;">Attendance</span>
            <span style="margin-left:35px;margin-top:15px;font-weight:500;font-size:48px;"><?php echo number_format($per, 2, '.', '');?>%</span></span>
            <span style="color:black;font-size:32px; height:29px;width:84px;margin-left:50px;margin-top:74px;"><span style="color:rgba(62, 220, 78, 1);font-size:32px;"><?php echo $no;?></span>/<?php echo $gto;?></span>
        </div>
        </div>
        <div class="opt">
            <button id="general" onclick="window.open('std_info.php','_self');">General</button>
            <button id="Academics" onclick="window.open('std_info_acad.php','_self');">Academics</button>
            <button id="Attendance" onclick="window.open('std_info_att.php','_self');">Attendance</button>
            <button onclick="window.open('std_check.php','_self');">Back</button>
        </div>