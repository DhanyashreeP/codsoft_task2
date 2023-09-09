<?php
include 'connect.php' ;
session_start();
if ($_SESSION['log'] == '')
{
    header("location:sindex.php");
}
include 'header.php';
?>


<style >
  body{
    margin: 0;
    padding: 0;
    font-family: 'Montserrat', sans-serif;
    background: rgb(2,0,36);
    background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
  }
  .container{
  
    font-family: Montserrat, sans-serif;
    font-size: 18px !important;
    margin:auto;
    width:40%;
    margin-top: 100px;
    margin-bottom: 20px;
    padding-top: 50px;
    padding-right: 120px;
    padding-bottom: 50px;
    padding-left: 150px;
    align-content: center;
  }
</style>

<html>
<head>
<link rel='stylesheet' href='css/index.css'>
<br><br>
<h1 style="text-transform: capitalize; color:#e0caf7;"><center>HEY <span style="color: #f2a6a6; "><u><?php echo " " . $_SESSION['name'] ?></u></span>, WELCOME TO RAILZ NOW BOOKING PORTAL</center></h1>


<div class="container">
  <a href='get_train_info.php'><button class="button" style="background-color: transparent; border-color: black;">Book Train Tickets</button></a>
  <br>
  <br>
  <a href='bookbus.php'><button style="background-color: transparent; border-color: black;">Book Bus Tickets</button></a>
</div>
</html>