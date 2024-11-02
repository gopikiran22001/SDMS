
<header><a href="admin_dash.php"><i class="fa fa-home" style="font-size:20px">  </i><?php
if($_SESSION['user_type']=='Admin')
  {
    ?>ADMIN DASHBOARD
    <?php
  }
  else
  {
    ?>
    EMPLOYEE DASHBOARD
    <?php
  }?></a></header>