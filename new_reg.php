
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEW ADMIN</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">

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
    <style>
        <?php
         include 'css/admin_dash.css';
         include 'css/new_reg.css';
        ?>
    .image-preview{
            width: 130px;
            height: 130px;
            border: 1px solid black;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 88%;
            font-weight: bold;
            float: right;
            color: #cccccc;
        }
        .image-preview__image{
            display: none;
            width: 100%;
            height: 100%;
        }
        .image-preview img{
            height: 100%;
            width: 99%;
        }
        .input select{
    margin-top: 10px;
}
#passs,#num,#user,#passs1
        {
            font-size: 16px;
    color: red;
    display: none;
        }
#dev1{
            background-color:rgba(129, 71, 231, 0.2);
   
        }
    </style>
    <script type="text/javascript">
        function getImage(imgagename)
        {
            var newimg=imgagename.replace(/^.*\\/,"");
            $("#display-image").html(newimg);
        }
    </script>
</head>
<body>

    <?php
    include 'admin_header.php';
    ?>
    <div class="cont">
<?php
include 'options/dev.php';
include 'admin_side.php';
?>
        <div class="box">

<form action="" method="post" enctype='multipart/form-data'id="fo">
<h2>New Admin</h2>

<div class="fname_image">
        <div class="fname_image_input">
        <input type="text" name="fname" required placeholder="First Name"></br>
        <input type="text" name="lname" required placeholder="Last Name"></br></div>

        <label for="inpFile"><div class="image-preview" id="image-preview">
        <img src="" alt="Image preview" class="image-preview__image">
        <span class="image-preview__default-text">Image</span>
    </div></label>
    </div><div class="input">

        <input type="date" name="dob" required placeholder="Date Of Birth"></br>
        <div class="radio">
        <span>Gender:</span>
        <input type="radio" name="g" value="Male" checked>Male
        <input type="radio" name="g" value="Female">Female</br></div>

        <input type="number" name="phone" required placeholder="Phone">
        <p id="num">Enter a Valid Phone Number</p></br>

        <input type="email" name="mail" required placeholder="Mail"></br>

        <textarea name="address" required placeholder="Address" cols="70" rows="15"></textarea></br>
        <input type="file" name="inpFile" id="inpFile" value="<div id='display-image'></div>" style="display:none;visibility:none;" onclick="getImage(this.value);" required>

        <input type="text" name="username" required placeholder="Username">
        <p id="user">Username is Already Taken</p>
</br>

        <input type="password" name="password" id="pass" required placeholder="Password"  minlength="8">
        <p id="passs">Password should Contain 8 or More Characters</p>
</br>
<input type="password" name="pass" required placeholder="Enter Admin Password To Register"  minlength="8">
<p id="passs1">Invalid Password</p>
        <input type="submit" name="upload" value="Submit"></br></div>
    </form>
        </div></div>
        <script>
        const inpFile=document.getElementById("inpFile");
        const previewcontainer=document.getElementById("image-preview");
        const previewimage=previewcontainer.querySelector(".image-preview__image");
        const previewdefaulttext=previewcontainer.querySelector(".image-preview__default-text");
        inpFile.addEventListener("change",function(){
            const file=this.files[0];
            //console.log(file);
            if(file)
            {
                const reader=new FileReader();

                previewdefaulttext.style.display="none";
                previewimage.style.display="block";

                reader.addEventListener("load",function(){
                    previewimage.setAttribute("src",this.result);
                });
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>

<?php

require 'connect.php';
 
// If upload button is clicked ...
if (isset($_POST['upload'])) {
 
    $filename = $_FILES["inpFile"]["name"];
    $tempname = $_FILES["inpFile"]["tmp_name"];
    $folder = "./upload/" . $filename;
    $ad_pass=$_POST['pass'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $dob=date('y-m-d',strtotime($_POST['dob']));
    $phone=$_POST['phone'];
    $mail=$_POST['mail'];
    $address=$_POST['address'];
    $username1=$_POST['username'];
    $pass=$_POST['password'];
        $gender=$_POST['g'];
    $rows="SELECT  * FROM admin WHERE username='$username1'";
    $count=mysqli_query($connect,$rows);
    $conut_rows=mysqli_num_rows($count);
    if(strlen($phone)==10)
    {
        if($conut_rows>0)
        {
    
    ?>
    <script>
        document.getElementById("user").style.display = "block";
    </script>
    <?php
        }
         else
         {
            if(strlen($pass)>=8)
            {
                if(mysqli_num_rows(mysqli_query($connect,"SELECT *FROM admin WHERE username='$username' and password='$ad_pass'"))>0)
                {
                    $sql = "INSERT INTO admin(fname,lname,gender,dob,phone,mail,address,username,password,img,type) VALUES ('$fname','$lname','$gender','$dob','$phone','$mail','$address','$username1','$pass','$filename','Admin')";
                    $xxx=mysqli_query($connect, $sql);
            
         
            // Now let's move the uploaded image into the folder: image
            if ($xxx) {
                move_uploaded_file($tempname, $folder);
                   ?>
                   <script>
                           Swal.fire({
                          icon: 'success',
                           title: 'Registered Successfully'
                           })
                   </script>
                   <?php
            } else {
                ?>
                <script>
                        Swal.fire({
                       icon: 'error',
                        title: 'Error'
                        })
                </script>
                <?php
            }
                }
                else
                {
                    ?>
                    <script>
                       document.getElementById("passs1").style.display = "block";
            
                    </script>
                    <?php
                }
            }
         else{
            ?>
            <script>
               document.getElementById("passs").style.display = "block";
    
            </script>
            <?php
         }
         }
    }
    else
    {
        ?>
        <script>
           document.getElementById("num").style.display = "block";

        </script>
        <?php
    }

}

?>
