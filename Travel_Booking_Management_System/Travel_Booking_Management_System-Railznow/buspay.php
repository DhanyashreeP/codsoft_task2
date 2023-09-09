<?php
include 'connect.php';
include 'head2.php';
session_start();
if ($_SESSION['log'] == '')
{
    header("location:index.php");
}
?>

<html>
<head>
  <style>
    body{
      font-family: Montserrat, sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
    }
    .formm{
       font-family: Montserrat, sans-serif;
       font-size: 18px !important;
     
    }
  </style>
<link rel='stylesheet' href='css/index.css'>
<link rel="shortcut icon" href="logofig.jpg" />
<title> Registration Page </title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="background-color: F5F1F0;">


  <div class="formm">
<h2 align="center" style="color: #f2a6a6;"><b>Enter Payment Details :</b>  </h2>


<form method='post' action ='buspayaction.php' >
<table align="center">
<tr><td><h3>Card No: </h3></td> <td colspan='2'><input type="Number" name="cno"  placeholder="1111-2222-3333-4444" maxlength='50'></td></tr>
<tr><td><h3>Name on Card: </h3></td> <td colspan='2'><input type="Text" name="name" placeholder="abc" maxlength='50'></td></tr>
<tr><td><h3>Expiry Date : </h3></td> <td><input type="Number" name="Em" placeholder='MM' maxlength='2'></td>
<td><input type="Number" name="Ey" placeholder='YY' maxlength='2'></td></tr>
<tr><td><h3>CVV No: </td> </h3><td colspan='2'><input type="Password" name="Cvv" maxlength='3' placeholder = '123'></td></tr>
<tr><td><h3>PIN NO: </h3> </td> <td colspan='2'><input type="Password" name="Pin" maxlength='4' placeholder = '0000' ></td></tr>


<tr><td colspan='3'><center><button style="background-color:green; padding:4px;  border-color:black" type='Submit' name='register_submit' >Complete Payment</Button></center></td></tr>
</table>
</form>
<br>
<br>


</div>

</html> 