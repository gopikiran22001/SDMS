<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEW STUDENT</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">

    <?php

include 'head.php';
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
        #std1{
            background-color:rgba(129, 71, 231, 0.2);
   
        }
        #roll,#num
        {
            font-size: 16px;
    color: red;
    display: none;
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
include 'options/std.php';
include 'admin_side.php';
?>
        <div class="box">
        
            
    <form action="" method="post" enctype='multipart/form-data'>
        
    <h2>ADMISSION FORM</h2>
    <div class="fname_image">
        <div class="fname_image_input">
    
        <input type="text" name="name" required placeholder="First Name"></br>
        <input type="text" name="lname" required placeholder="Last Name"></br></div>
        <label for="inpFile"><div class="image-preview" id="image-preview">
        <img src="" alt="Image preview" class="image-preview__image">
        <span class="image-preview__default-text">Photo</span>
    </div></label>
    </div><div class="input">
        <input type="text" name="fname" required placeholder="Father Name"></br>
        <input type="text" name="mname" required placeholder="Mother Name"></br>
        <div class="radio">
        <span>Gender:</span>
        <input type="radio" name="gender" value="Male" checked >Male
        <input type="radio" name="gender" value="Female">Female</br></div>
        <input type="date" name="dob" required placeholder="Date Of Birth"></br>
        <input type="file" name="inpFile" id="inpFile" value="<div id='display-image'></div>" style="display:none;visibility:none;" onclick="getImage(this.value);" required>
        <input type="number" name="phone" required placeholder="Phone"></br>
        <p id="num">Enter a Valid Phone Number</p>
        <textarea rows="2" cols="40" name="address" required placeholder="Address"></textarea></br>
        <select name="branch">
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
        </select></br>
        <input type="number" name="roll" required placeholder="Roll number" minlength="3"></br>
        <p id="roll">Enter Roll Number in Three Digit Format</p>
        <input type="submit" name="btn" value="Register"></br></div>
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

require 'connect_db.php';
if(isset($_POST['btn']))
{
    $y=date('y');
    $m=date('m');
    $c=466;
    if($m<6)
    {
        $y=$y-1;
        $batch=$y.$c;
    }
    else
    {
        $batch=$y.$c; 
    }
    $filename = $_FILES["inpFile"]["name"];
    $tempname = $_FILES["inpFile"]["tmp_name"];
    $folder = "./upload-$batch/" . $filename;
    $dob=date('y-m-d',strtotime($_POST['dob']));
    $name=$_POST['name'];
    $lname=$_POST['lname'];
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $gender=$_POST['gender'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $branch=$_POST['branch'];
    $roll=$_POST['roll'];
    $count=mysqli_num_rows(mysqli_query($connect,"SELECT *FROM d$batch.$branch WHERE id='$batch-$branch-$roll'"));
    if($count<=0)
    {
if(strlen($phone)==10)
{
    if(strlen($roll)==3)
    {
        $sql="INSERT INTO d$batch.$branch(id,name,lname,fname,mname,img,gender,dob,phone,address) VALUES ('$batch-$branch-$roll','$name','$lname','$fname','$mname','$filename','$gender','$dob','$phone','$address')";
$result=mysqli_query($connect,$sql);
if($result)
{
    $tempname_t=$filename;
    move_uploaded_file($tempname, $folder);
    $sql1="CREATE TABLE d$batch.$batch$branch$roll(code BIGINT NOT NULL , internal INT NOT NULL , external INT NOT NULL , total INT NOT NULL , grade VARCHAR(10) NOT NULL ,sem INT NOT NULL, PRIMARY KEY (code))";
    $result1=mysqli_query($connect,$sql1);
    if($result1)
    {
        $att=$branch.'_att';
        $att_face=$branch.'_face';
        if(mysqli_query($connect,"INSERT INTO d$batch.$att(id,img) VALUES('$batch-$branch-$roll','$tempname_t')") and mysqli_query($connect,"ALTER TABLE d$batch.$att_face ADD $batch$branch$roll VARCHAR(10)"))
        {
            ?>
        <script>
          Swal.fire({
      icon: 'success',
      title: 'Registered Successfully',
  })
        </script>
        <?php
        }
        else
        {?>
            <script>
              Swal.fire({
          icon: 'error',
          title: 'Can not Register'
      })
            </script>
            <?php
        }

        
    }
    else
    {?>
        <script>
          Swal.fire({
      icon: 'error',
      title: 'Can not Create Table'
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
            title: 'Error'
            })
    </script>
    <?php
}
    }
    else
        {?>
            <script>
                 document.getElementById("roll").style.display = "block";

            </script>
            <?php
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
else
        {
            ?>
            <script>
              Swal.fire({
          icon: 'error',
          title: 'Already Registered'
      })
            </script>
            <?php
        }
}
?>