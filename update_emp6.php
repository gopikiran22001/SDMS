
<!DOCTYPE html>
<html lang="en">
<head>
<?php
    include 'head.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE PASSWORD</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">    <style>
    <?php
        include 'css/update_side.css';
        include 'css/update_name.css'
        ?>
               .password-container{

width: 100%;

position: relative;
margin-bottom: 10px;

}

.fa-eye{

position: absolute;

top: 28%;

right: 13%;

cursor: pointer;

color: lightgray;

}
#not,#inv,#pass
{
    font-size: 20px;
    text-align: center;
    color: red;
    display: none;
}
#up6{
            background-color:rgba(129, 71, 231, 0.2);
   
        }
    </style>
</head>
<body>
<?php
include 'update_header.php';
    ?>
    <div class="cont">
<?php
include 'update_emp_side.php';
?>
    <div class="box">
    <form action="" method="post">
    <input type="password" name="pass3" placeholder="Old Password" required minlength="8">
    
        <input type="password" name="pass1" placeholder="New Password" required minlength="8">
        <div class="password-container">

  <input type="password" placeholder="Password" name="password" id="password" minlength="8">

  <i class="fa-solid fa-eye" id="eye"></i>

</div>
        <input type="submit" value="Update" name="btn">
        <p id="pass">Wrong Password</p>
        <p id="inv">Password should Contain 8 or More Characters</p>
        <p id="not">Password does not Match</p>
    </form>
    </div></div>
    <script>

const passwordInput = document.querySelector("#password")

const eye = document.querySelector("#eye")

eye.addEventListener("click", function(){

this.classList.toggle("fa-eye-slash")

const type = passwordInput.getAttribute("type") === "password" ? "text" : "password"

passwordInput.setAttribute("type", type)

});

</script>
</body>
</html>
<?php
require 'connect.php';
$username=$_SESSION['m5'];
if(isset($_POST['btn']))
{
    $pass1=$_POST['pass1'];
    $pass2=$_POST['password'];
    $old=$_POST['pass3'];
    if(mysqli_num_rows(mysqli_query($connect,"SELECT *FROM admin WHERE username='$username' and password='$old'"))>0)
    {
        if($pass1==$pass2)
        {
            if(strlen($pass1)>=8)
            {
                $sql="UPDATE admin SET password='$pass1' WHERE username='$username'";
            $result=mysqli_query($connect,$sql);
            if($result)
            {
                ?>
                <script>
                        Swal.fire({
                       icon: 'success',
                        title: 'Updated'
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
                        title: 'Not Updated'
                        })
                </script>
                <?php
            }
            }
            else
            {
                ?>
                <script>
                   document.getElementById("inv").style.display = "block";
    
                </script>
                <?php
            }
            
        }
        else
        {
            ?>
            <script>
                            document.getElementById("not").style.display = "block";
    
            </script>
            <?php
        }
    }
    else
    {
        ?><script>
            document.getElementById("pass").style.display = "block";

        </script><?php
    }

}
    ?>
