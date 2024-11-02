<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include 'head.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESULTS</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">

    <style>
        <?php
  include 'css/admin_dash.css';
  include 'css/batch_branch.css';

        ?>
        .box form input[type="submit"]{

margin-right: 48.25%;
}
#invalid,#not
{
    font-size: 20px;
    text-align: center;
    color: red;
    display: none;
    background-color: rgba(255, 0, 0, 0.15);
    padding-left: 15px;
    padding-right: 15px;
    padding-top: 5px;
    padding-bottom: 5px;
    border-radius: 5px;
}
.box form h2{
    color:black;
    font-weight: 500;
    font-size: 30px;

}
        #result2{
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
include 'options/res.php';
include 'admin_side.php';
?>
        <div class="box">
    <form action="" method="post">
    <h2><i>Result</i></h2>

        <div class="details">
        <input type="text" name="id" required placeholder="Enter Pin">
        <span>Semester:</span>
        <select name="sem" >
        <option disabled selected value="">--Select Sem--</option>
            <option value="1">1</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select></div>
        <input type="submit" name="btn" value="Enter">
        
    <p id="invalid">Invalid ID</p>
        <p id="not">Not Registered</p>
        
    </form></div></div>
</body>
</html>
<?php
require 'result_check.php';
?>