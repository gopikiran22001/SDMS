
<div class="img">
    <?php
    require 'connect.php';
        $username=$_SESSION['m5'];
        $query="SELECT *FROM admin WHERE username='$username'";
        $sql=mysqli_query($connect,$query);
        while($data=mysqli_fetch_assoc($sql))
        {
            ?>
            <div class="imga">
            <a href="update_emp.php"><img src="./upload/<?php echo $data['img'];?>"></a> </div>
            <?php
        }
        
        ?>
        <aside>
    <ul>
        <li id="up1"><a href="update_emp1.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Name</a></li>
        <li id="up2"><a href="update_emp2.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>D.O.B</a></li>
        <li id="up3"><a href="update_emp3.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Gender</a></li>
        <li id="up4"><a href="update_emp4.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Phone and Mail</a></li>
        <li id="up5"><a href="update_emp5.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Address</a></li>
        <li id="up6"><a href="update_emp6.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Password</a></li>
    </ul></aside>
</div>