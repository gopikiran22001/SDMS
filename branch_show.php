<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BRANCH LIST</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">

   <?php
include 'head.php';
?>
    <style>
        <?php
  include 'css/admin_dash.css';
  ?>
  .box{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left: 24%;
  }
  table{
    height: auto;
    margin-left: 2%;
    margin-right: 2%;
    margin-top: 30px;
    border: 1px solid black;
    background-color: transparent;
    border-collapse: collapse;
    
}
th,td{
    height: 20px;
    text-overflow: auto;
color: black;
border: 1px solid black;
}
caption,th,td{
    text-align: center;
}
caption{
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

#add5{
            background-color:rgba(129, 71, 231, 0.2);
   
        }
    </style>
</head>
<body>

    <?php
    include 'admin_header.php';
    ?>
    <div class="cont">
 <?php
 include 'options/br.php';
include 'admin_side.php';
 ?>
        <div class="box">
        <table border="3">
        <tr>
            <th>Branch Name</th>
            <th>Branch Code</th>
        </tr>
        <?php
        require 'connect.php';
        $result=mysqli_query($connect,"SELECT * FROM branch");
        while($info=mysqli_fetch_assoc($result))
        {
            ?>
            <tr>
                <td><?php echo $info['bname'];?></td>
                <td><?php echo $info['name'];?></td>
            </tr>
            <?php
        }
        ?>
    </table>
        </div></div>
</body>
</html>