<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script src="sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESULTS</title>
    <link rel="shortcut icon" href="icon/29302.png" type="image/png">

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
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background-image: url("icon\\Waves.png");

}
.details
{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    flex-direction: row;
}
.details input
{
    position: relative;
    width:350px;
    padding: 10px 15px;
    outline: none;
    border: 1px solid rgba(170, 170, 170, 1);
    border-radius: 5px;
    font-size: 1em;
    letter-spacing: 0.05em;
    color: black;
}

.box
{
    position: relative;
    width: 80%;
    height: 300px;
    display: flex;
    text-align: center;
    justify-content: center;
    flex-direction: column;
    border-radius: 3%;
    box-shadow: 0px 4px 12px 0px rgba(129, 71, 231, 0.2);
    background: rgba(255, 255, 255, 1);
    border-radius: 15px;

}
.box form{
    position: relative;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 20px;
    padding: 0 40px;


}
.details span{
    margin-left: 30px;
    margin-right: 5px;

}
.details  select{
    padding: 10px 15px;
    border-radius: 5px;
    width: 150PX;
    
    
}

.box form input::placeholder{
    color: rgba(170, 170, 170, 1);
}

.box form input[type="submit"]{
    width: 130px;
    height: 30px;
    margin-right: 37.5%;
    border: none;
    border-radius: 5px;
    font-weight: 400;
    font-size: 20px;
    color: rgba(255, 255, 255, 1);
    background-color:  rgba(143, 109, 255, 1);
    cursor: pointer;
    transition: 0.5s;
}
a{
    margin-right: 44.5%;
    text-decoration: none;
}
a:hover{
    color: red;
    text-decoration: underline;
}
.box form input[type="submit"]:hover{

    color: rgba(143, 109, 255, 1);
    background-color:rgba(129, 71, 231, 0.2);}
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
    </style>
</head>
<body>
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
        </select>
        </div>
        <input type="submit" name="btn" value="Enter">
        <a href="index.php">Back</a>
        <p id="invalid">Invalid ID</p>
        <p id="not">Not Registered</p>
    </form></div>
</body>
</html>
<?php
require 'result_check.php';
?>