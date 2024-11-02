
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUBJECT LIST</title>
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
        <div class="box">
            <h2><a href="sub_show.php"><i>Subject List</i></a></h2>
            <table border="3">
        <tr>
            <th>Subject Name</th>
            <th>Subject Code</th>
            <th>Semester</th>
        </tr>
        <?php
        require 'connect.php';
        $name=$_SESSION['branch'];
        $sem=$_SESSION['sem'];
        $result=mysqli_query($connect,"SELECT * FROM $name");
        while($info=mysqli_fetch_assoc($result))
        {
            ?>
            <tr>
                <td><?php echo $info['name'];?></td>
                <td><?php echo $info['code'];?></td>
                <td><?php echo $info['sem'];?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>