<?php

require 'connect.php';
?>



    function std(){
      $("#std1").hide();
    $("#std3").hide();
    $("#std4").hide();
    $("#std2").hide();
    $("#std5").hide();
    }
    function emp()
    {
      $("#emp1").hide();
    $("#emp2").hide();
    $("#emp3").hide();
    $("#emp4").hide();
    }
    function sub(){
      
    $("#add3").hide();
    $("#add4").hide();
    $("#add7").hide();

    }
    function br()
    {
      $("#add2").hide();
    $("#add5").hide();
    $("#add8").hide();

    }
    function att(){
      $("#att1").hide();
    $("#att2").hide();
    $("#att3").hide();
    $("#att4").hide();
    $("#att5").hide();

  }
    function res(){
      
    $("#result1").hide();
    $("#result2").hide();
    $("#result3").hide();
    $("#result4").hide();
    }
    function dev(){
      $("#add1").hide();
$("#add6").hide();
$("#dev1").hide();
    }
  $("#x").click(function(){
  emp();
  sub();
  br();
  att();
  res();
  dev();
  $("#std2").toggle('slow');
  $("#std1").toggle('slow');
  $("#std3").toggle('slow');
  $("#std5").toggle('slow');
  $("#std4").toggle('slow');
  });
  $("#y").click(function(){
    std();
  sub();
  br();
  att();
  res();
  dev();
    $("#emp1").toggle('slow');
    $("#emp2").toggle('slow');
    $("#emp3").toggle('slow');
    $("#emp4").toggle('slow');
  });
  $("#z").click(function(){
    std();
  emp();
  br();
  att();
  res();
  dev();
    $("#add3").toggle('slow');
    $("#add4").toggle('slow');
    $("#add7").toggle('slow');
  });
  $("#r").click(function(){
    std();
  emp();
  sub();
  br();
  att();
  dev();
    $("#result1").toggle('slow');
    $("#result2").toggle('slow');
    $("#result3").toggle('slow');
    $("#result4").toggle('slow');
  });
  $("#b").click(function(){
    std();
  emp();
  sub();
  att();
  res();
  dev();
    
    $("#add2").toggle('slow');
    $("#add5").toggle('slow');
    $("#add8").toggle('slow');
  });
  $("#a").click(function(){
    std();
  emp();
  sub();
  br();
  res();
  dev();
    $("#att1").toggle('slow');
    $("#att2").toggle('slow');
    $("#att3").toggle('slow');
    $("#att4").toggle('slow');
    $("#att5").toggle('slow');    
  });
  $("#dv").click(function(){
    std();
  emp();
  sub();
  br();
  att();
  res();
    $("#add1").toggle('slow');
    $("#add6").toggle('slow');
    $("#dev1").toggle('slow');
  });
}

</script>
    
<?php
    
        $username=$_SESSION['m5'];
        $query="SELECT *FROM admin WHERE username='$username'";
        $sql=mysqli_query($connect,$query);
        $data=mysqli_fetch_assoc($sql)
            ?>
            <div class="img">
            <div class="imga">
            <a href="update_emp.php" >
            <img src="./upload/<?php echo $data['img'];?>"></a></div>
<div class="name"><h3><i><?php echo $data['fname'];?></i></h3></div>
<ul class="nav">
  <?php
  if($_SESSION['user_type']=='Admin')
  {
    ?>
            <li  id="x" class="options"><a href="#"><i class="fa fa-graduation-cap"></i>  Student</a></li>
            <li id="std1"><a href="new_std.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>New Admission</a></li>
            <li id="std5"><a href="t_std.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Transfer</a></li>
            <li id="std2"><a href="update_std.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Update Details</a></li>
            <li id="std3"><a href="delete_std.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Delete Details</a></li>
            <li id="std4"><a href="std_show.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Student List</a></li>
            <li id="y" class="options"><a href="#"><i class="fa fa-group"></i>  Employee</a></li>
            <li id="emp1"><a href="new_admin.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>New Employee</a></li>
            <li id="emp2"><a href="update.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Update Details</a></li>
            <li id="emp3"><a href="delete_emp.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Delete </a></li>
            <li id="emp4"><a href="show_emp.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Employees List</a></li>
            <li id="z" class="options"><a href="#"><i class="fa fa-book"></i> Subject</a></li>
            <li id="add3"><a href="add_sub.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Add Subject</a></li>
            <li id="add4"><a href="sub_show.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Subject List</a></li>
            <li id="add7"><a href="delete_sub.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Delete Subject</a></li>
            <li id="b" class="options"><a href="#"><i class="fa fa-sitemap"></i> Branch</a></li>
            <li id="add2"><a href="add_branch.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Add Branch</a></li>
            <li id="add5"><a href="branch_show.php"><i style="font-size:24px" class="fa">&#xf105;</i>Branch List</a></li>
            <li id="add8"><a href="delete_br.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Remove Branch</a></li>
            <li id="a" class="options"><a href="#"><i class="fa fa-calendar"></i>  Attendance</a></li>
            <li id="att3"><a href="face.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Attendance</a></li>
            <li id="att5"><a href="att_show.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Attendance List</a></li>
        <li id="r" class="options"><a href="#"><i class="fa fa-bar-chart-o"></i>  Results</a></li>
            <li id="result1"><a href="upload_res.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Upload Results</a></li>
            <li id="result3"><a href="sup_result.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Supplementary</a></li>
            <li id="result2"><a href="result1.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Results</a></li>
            <li id="result4"><a href="delete_res.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Delete Result</a></li>
            <li id="dv" class="options"><a href="#"><i class="fa fa-cubes"></i> Developer</a></li>
            <li id="dev1"><a href="new_reg.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>New Admin</a></li>
            <li id="add1"><a href="new_batch.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>New Batch</a></li>
            <li id="add6"><a href="delete_batch.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Delete Batch</a></li>
    <?php
  }
  else
  {
    ?>
            <li  id="x" class="options"><a href="#"><i class="fa fa-graduation-cap"></i>  Student</a></li>
            <li id="std1"><a href="new_std.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>New Admission</a></li>
            <li id="std5"><a href="t_std.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Transfer</a></li>
            <li id="std2"><a href="update_std.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Update Details</a></li>
            <li id="std4"><a href="std_show.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Student List</a></li>
            <li id="y" class="options"><a href="#"><i class="fa fa-group"></i>  Employee</a></li>
            <li id="emp4"><a href="show_emp.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Employees List</a></li>
            <li id="z" class="options"><a href="#"><i class="fa fa-book"></i> Subject</a></li>
            <li id="add4"><a href="sub_show.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Subject List</a></li>
            <li id="b" class="options"><a href="#"><i class="fa fa-sitemap"></i> Branch</a></li>
            <li id="add5"><a href="branch_show.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Branch List</a></li>
            <li id="a" class="options"><a href="#"><i class="fa fa-calendar"></i>  Attendance</a></li>
            <li id="att3"><a href="face.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Attendance</a></li>
            <li id="att5"><a href="att_show.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Attendance List</a></li>
        <li id="r" class="options"><a href="#"><i class="fa fa-bar-chart-o"></i>  Results</a></li>
            <li id="result1"><a href="upload_res.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Upload Results</a></li>
            <li id="result3"><a href="sup_result.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Supplementary</a></li>
            <li id="result2"><a href="result1.php" style="display:flex;justify-content:center;align-item:center;"><i style="font-size:24px" class="fa">&#xf105;</i>Results</a></li>
    <?php
  }
  ?>

            <script>
              show();
            </script>
          </ul>
        </div>