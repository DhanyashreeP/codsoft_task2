<?php
include 'connect.php' ;
session_start();
if ($_SESSION['log'] == '')
{
    header("location:index.php");
}
include 'header.php';
?>
<style>
  body {
    font-family: Montserrat, sans-serif;
    margin: 0;
    padding: 0;
    background: rgb(2,0,36);
    background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
  }

  .container {
    font-size: 18px;
    border: 2px solid grey;
    margin: 50px auto 50px;
    padding: 50px 50px;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    text-align: center;
    width:400px;
  }

  .button {
    padding: 15px 32px;
    width:250px;
    color: white;
    background-color: black;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
  }

  .button:hover {
    background-color: #333;
  }

  h1 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 28px;
    color: #f2a6a6;
    
  }

</style>
<link rel='stylesheet' href='css/index.css'>
</head>
<body>
  <h1><b> User Bookings</b></h1>
  <div class="container">
    <a href='trainbookings.php'><button class="button">View Train Bookings</button></a>
    <br><br>
    <a href='busbookings.php'><button class="button">View Bus Bookings</button></a>
  </div>
</body>
</html>