<div class="img">
    <?php

require 'connect.php';
        $username=$_SESSION['update'];
        $query="SELECT *FROM admin WHERE username='$username'";
        $sql=mysqli_query($connect,$query);
        while($data=mysqli_fetch_assoc($sql))
        {
            ?>
             <div class="imga">
           <a href="update1.php"> <img src="./upload/<?php echo $data['img'];?>"></a></div>
            <?php
        }
        
        ?>
    <ul>
        <li id="up1"><a href="update2.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Name</a></li>
        <li id="up2"><a href="update3.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>D.O.B</a></li>
        <li id="up3"><a href="update4.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Gender</a></li>
        <li id="up4"><a href="update5.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Phone and Mail</a></li>
        <li id="up5"><a href="update6.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Address</a></li>
        <li id="up6"><a href="update7.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Password</a></li>
    </ul>
    </div>