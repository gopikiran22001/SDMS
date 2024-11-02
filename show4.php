<!DOCTYPE html>
<html>
<head> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script src="sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<?php
require 'connect_db.php';
session_start();
$batch=$_SESSION['att_batch'];
$branch=$_SESSION['att_branch'];
    $sem=$_SESSION['att_sem'];
    $tb=$branch.'_att';
    $tb_n=$branch.'_face';
    $c_1=mysqli_query($connect,"SELECT *FROM d$batch.$tb ");
    
?>


<link rel="stylesheet" type="text/css"href="print.css" media="print">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATTENDANCE LIST</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">

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
    width: 70%;
    margin-left: 15%;
    margin-right: 15%;
    margin-top: 30px;
    border: 1px solid black;
    background-color: transparent;
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
    height:30px;
}
h2,th{
    text-align: center;
}
h2{
    font-size: 1.5rem;
    font-weight: 700;
    text-transform: uppercase;
}
th{
background-color:rgba(143, 109, 255, 1);

}
input[type="submit"]
{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 30px;
    width: 80px;
    background-color:rgba(129, 71, 231, 1);
    color:white;
    border-radius: 2px;
    border: none;
    padding-left: 5px;
    padding-right: 5px;
    margin-top: 20px;
    margin-left: 79.7%;
}
input[type="submit"]:hover{
    color:rgba(129, 71, 231, 1);
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
<body>
    <h2><a href="att_show.php"><i><?php echo $batch."  ".$branch."E"."  "."Attendance";?></i></a></h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Total Days</th>
            <th>No.Of Days Attended</th>
            <th>Total</th>
        </tr>
        <?php
        while($info=mysqli_fetch_assoc($c_1))
        {
            $id=$info['id'];
            $std_batch=substr($id,0,5);
            $std_branch=substr($id,6,2);
            $roll=substr($id,9,3);
            if(strlen($id)==11)
            {
               $std_branch=substr($id,6,1);
               $roll=substr($id,8,3);
               }
               $c_2=mysqli_query($connect,"SELECT *FROM d$batch.$tb_n WHERE sem='$sem' and $std_batch$std_branch$roll='A'");
               $no=mysqli_num_rows(mysqli_query($connect,"SELECT $std_batch$std_branch$roll FROM d$batch.$tb_n WHERE sem='$sem' and $std_batch$std_branch$roll='X'"));
            $gto=mysqli_num_rows($c_2)+$no;
            ?>
            <tr>
            <td><?php echo $id;?></td>
            <td><?php echo $gto;?></td>
            <td><?php echo $no;?></td>
            <td><?php echo number_format(100*$no/$gto, 2, '.', '');?>%</td>
            </tr>
            <?php
        }
        ?>
    </table>
    <input type="submit" onclick="window.print();" id="print-btn" value="Download">
</body>
</html>