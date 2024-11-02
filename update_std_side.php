
<div class="img">
<?php
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
        $query="SELECT *FROM d$db.$branch WHERE id='$id'";
        $sql=mysqli_query($connect,$query);
        while($data=mysqli_fetch_assoc($sql))
        {
            ?>
            <div class="imga">
                <a href="update_std2.php">
            <label for="img"><img src="./upload-<?php echo $db;?>/<?php echo $data['img'];?>"></label></a></div> 
            <?php
        }
        
        ?>
    <ul>
        <li id="up1"><a href="update_std4.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Name</a></li>
        <li id="up2" style="height:auto;"><a href="update_std5.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Father and Mother</a></li>
        <li id="up3"><a href="update_std6.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>D.O.B</a></li>
        <li id="up4"><a href="update_std7.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Gender</a></li>
        <li id="up5"><a href="update_std8.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Phone</a></li>
        <li id="up6"><a href="update_std9.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Address</a></li>
        
    </ul></div>