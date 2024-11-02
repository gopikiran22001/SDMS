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
    $id=$_SESSION['id1'];
    $sem=$_SESSION['sem1'];
    $batch=substr($id,0,5);
    $branch=substr($id,6,2);
    $roll=substr($id,9,3);
    if(strlen($id)==11)
    {
        $branch=substr($id,6,1);
        $roll=substr($id,8,3);
    }
    $db=substr($batch,0,2).'466';
    $result1=mysqli_query($connect,"SELECT * FROM d$db.$branch WHERE id='$id'");
    $result2=mysqli_query($connect,"SELECT *FROM student_management.branch WHERE name='$branch'");
    $result3=mysqli_query($connect,"SELECT *FROM d$db.$batch$branch$roll WHERE sem='$sem'");
    $info2=mysqli_fetch_assoc($result2);
    $info1=mysqli_fetch_assoc($result1);
?>


<link rel="stylesheet" type="text/css"href="print.css" media="print">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $id;?></title>
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
    box-sizing: border-box;
    height: auto;

}
.table{
    width: min(900px,100%-3rem);
    margin-inline: auto;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    width: 100%;
}
table{
    height: auto;
    width: auto;
    min-height: 600px;
    margin-left: 2%;
    margin-right: 2%;
    margin-top: 30px;
    border: 2px solid black;
    background-color: transparent;
    border-collapse: collapse;
    
}
th,td{
    padding-left: 5px;
    padding-right: 5px;
    text-overflow: auto;
color: black;
border: 2px solid black;
}
button{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
    margin-left: 38.37%;
    width: 80px;
    height: 30px;
    border-radius: 5px;
    border: none;
    background-color: rgba(143, 109, 255, 1);
    color: white;
}
button:hover
{
    background-color:rgba(143, 109, 255, 0.2) ;
    color: rgba(143, 109, 255, 1);
    border: 1px solid rgba(143, 109, 255, 1);
}
    </style>
</head>
<body>
    <div class="table">
    <table border="3" id="result">
        <tr>
            <td><b>Name:</b></td>
            <td colspan="2"><?php echo $info1['name']; echo"   "; echo$info1['lname'];?></td>
            <td rowspan="3" colspan="2"><img src="./upload-<?php echo $db;?>/<?php echo $info1['img'];?>" style="margin-top:5px;height:100px;width:100px;"></td>
        </tr>
        <tr>
            <td><b>ID:</b></td>
            <td colspan="2"><?php echo $info1['id'];?></td>
        </tr>
        <tr>
            <td><b>Branch:</b></td>
            <td colspan="2"><?php echo $info2['bname'];?></td>
        </tr>
        <tr>
            <td><b>Subject Code</b></td>
            <td><b>External</b></td>
            <td><b>Internal</b></td>
            <td><b>Total</b></td>
            <td><b>Status</b></td>
        </tr>
        <?php
        $gtotal=0;
        $xx=0;
        while($info3=mysqli_fetch_assoc($result3))
        {
            ?>
            <tr>
                <td><?php echo $info3['code'];?></td>
                <td><?php echo $info3['external'];?></td>
                <td><?php echo $info3['internal'];?></td>
                <td><?php echo $info3['total'];?></td>
                <td><?php echo $info3['grade'];?></td>
            </tr>
            <?php
            $gtotal=$gtotal+$info3['total'];
            if($info3['grade']=='F')
            {
                $xx=$xx+1;
            }
        }
        $status=null;
        if($xx>0)
        {
            $status="PROMOTED"; 
        }
        else
        {
            $status="PASS";
        }
        ?>
        <tr>
            <td><b>Grand Total:</b></td>
            <td colspan="4"><?php echo $gtotal;?></td>
        </tr>
        <tr>
            <td><b>Result:</b></td>
            <td colspan="4"><?php echo $status;?></td>
        </tr>

    </table></div>
    <button onclick="window.print();" id="print-btn">Download</button>
</body>
</html>