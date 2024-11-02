<!DOCTYPE html>
<html lang="en">
<head>
<?php

include 'head.php';
    ?>
<?php
  if($_SESSION['user_type']!='Admin')
  {
    ?>
    <script>
        window.open('admin_dash.php','_self');
    </script><?php
  }
  ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELETE BRANCH</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">

    <style>
        <?php
  include 'css/admin_dash.css';
  include 'css/update_name.css'
  ?>
  .box form select{
    position: relative;
    width: 85%;
    padding: 10px 15px;
    border: none;
    outline: none;
    border-radius: 10px;
    border: 1px;
    
    
    font-size: 1em;
    letter-spacing: 0.05em;
border: 1px solid black;
border-radius: 5px;  
}
.box form input[type="submit"]{
    
    height: 45px;
    border: none;
    border-radius: 5px;
    font-weight: 400;
    font-size: 20px;
    color: rgba(255, 255, 255, 1);
    background-color:  rgba(143, 109, 255, 1);
    cursor: pointer;
    transition: 0.5s;
}
.box form input[type="submit"]:hover{

    color: rgba(143, 109, 255, 1);
    background-color:rgba(129, 71, 231, 0.2);
}
.box form h2{
    color:black;
    font-weight: 500;
    font-size: 30px;

}

  #add8{
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
            

    <form action=""   method="post">
    <h2><i>Delete Branch</i></h2>

        <select name="branch" id="">
        <?php
        
        require 'connect_db.php';
       $result=mysqli_query($connect,"SELECT *FROM student_management.branch");
       while($info=mysqli_fetch_assoc($result))
       {
           ?>
           <option value="<?php echo $info['name'];?>"><?php echo $info['bname'];?></option>
           <?php
       }
       ?>
        </select>
        <input type="submit" value="Delete" name="btn">
    </form></div></div>
</body>
</html>
<?php
require 'connect.php';
if(isset($_POST['btn']))
{
    $branch=$_POST['branch'];
        $result=mysqli_query($connect,"DELETE FROM branch WHERE name='$branch'");
        if($result)
        {
            
            $result3=mysqli_query($connect,"DROP TABLE $branch");
            if($result3)
            {
                ?>
                <script>
                  Swal.fire({
        icon: 'success',
        title: 'Deleted !'
    })
                </script>
                <?php
            }
            else
            {
                ?>
                <script>
                  Swal.fire({
              icon: 'error',
              title: 'Can not Delete Table'
          })
                </script>
                <?php
            }
        }
        else
        {
            ?>
            <script>
              Swal.fire({
          icon: 'error',
          title: 'Can not Delete Branch'
      })
            </script>
            <?php
        }
    }

?>
