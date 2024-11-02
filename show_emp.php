<?php
require 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMPLOYEE  LIST</title>
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
    margin-top: 20px;
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
    height:auto;
}
h3,th,td{
    text-align: center;
}
h3{
    margin-top: 10px;
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
<body>

    <div class="cont">
        <div class="box">
    <table border="3">
        <h3><a href="admin_dash.php"><i>Employee List</i></a></h3>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>D.O.B</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>ID</th>
        </tr>
        <?php
        $sql="SELECT * FROM admin";
        $query=mysqli_query($connect,$sql);
        while($info=mysqli_fetch_assoc($query))
        {
            ?>
            <tr>
                <td><?php echo $info['fname'];?></td>
                <td><?php echo $info['lname'];?></td>
                <td><?php echo $info['gender'];?></td>
                <td><?php echo $info['dob'];?></td>
                <td><?php echo $info['phone'];?></td>
                <td><?php echo $info['mail'];?></td>
                <td><?php echo $info['address'];?></td>
                <td><?php echo $info['username'];?></td>
            </tr><?php
        }
        ?>
    </table></div></div>
</body>
</html>