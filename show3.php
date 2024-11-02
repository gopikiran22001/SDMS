<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT LIST</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">

   <?php
include 'head.php';
?>
<style>
    @import url('https://fonts.cdnfonts.com/css/poppins');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body
{
    background-image: url("icon\\Waves.png");
    background-size: cover;

}
.box{
    width: min(900px,100%-3rem);
    margin-inline: auto;
}
table{
    height: auto;
    min-height: 100%;
    width: 96%;
    margin-left: 2%;
    margin-right: 2%;
    margin-top: 10px;
    border: 1px solid black;
    background-color: white;
    border-collapse: collapse;
    
}
th,td{
    padding-left: 5px;
    padding-right: 5px;
    text-overflow: auto;
color: black;
border: 1px solid black;
}
#id{
    width: 130px;
}
#dob{
width: 100px;
}
tr{
    height:auto;
}
h2,th,td{
    text-align: center;
}
h2{
    margin-top: 20px;
    font-size: 1.5rem;
    font-weight: 700;
    text-transform: uppercase;
}
th{
background-color:rgba(143, 109, 255, 1);

}
tr:nth-of-type(2n){
    background-color:rgba(129, 71, 231, 0.2);
}
a{
    color: black;
    text-decoration: none;
}
a:hover{
color: red;
}

</style>
</head> 
    <div class="box">
    <?php
                    require 'connect_db.php';
                    $batch=$_SESSION['branch_batch'];
                    $branch=$_SESSION['branch_branch'];
            ?>
        <h2><a href="std_show.php"><i><?php echo $batch," ",$branch."E ";?> Student List</i></a> </h2>
        <table border="">

            <caption></caption>
        <tr>
            <th id="id">ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Father Name</th>
            <th>Mother Name</th>
            <th id="dob">D.O.B   </th>
            <th>Gender</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Image</th>
        </tr>
        <?php
        $result=mysqli_query($connect,"SELECT * FROM d$batch.$branch");
        while($info=mysqli_fetch_assoc($result))
        {
            ?>
            <tr>
                <td id="id"><?php echo $info['id'];?></td>
                <td><?php echo $info['name'];?></td>
                <td><?php echo $info['lname'];?></td>
                <td><?php echo $info['fname'];?></td>
                <td><?php echo $info['mname'];?></td>
                <td id="dob"><?php echo $info['dob'];?></td>
                <td><?php echo $info['gender'];?></td>
                <td><?php echo $info['address'];?></td>
                <td><?php echo $info['phone'];?></td>
                <td><img src="upload-<?php echo $batch;?>/<?php echo $info['img'];?>" style="height: 60px;width: 60px;"></td>
            </tr>
            <?php
        }
        ?>
    </table></div>
</body>
</html>