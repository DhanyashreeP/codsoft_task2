<?php
include 'connect.php';
include 'head2.php';
session_start();

if ($_SESSION['log'] == '') {
    header("location:sindex.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cno = $_POST['cno'];
    $name = $_POST['name'];
    $Em = $_POST['Em'];
    $Ey = $_POST['Ey'];
    $Cvv = $_POST['Cvv'];
    $Pin = $_POST['Pin'];
    $final = $_POST['final'];

    // Modify this SQL query to match your table structure
    $insertQuery = "INSERT INTO transactions (email, Name, trainName, arrivalTime, departureTime, card_no, expmonth, expyear, cvv, pin, Amt)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the SQL query
    $stmt = $connect->prepare($insertQuery);

    // Bind parameters
    $stmt->bind_param('sssssssssss', $_SESSION['email'], $name, $_GET['trainName'], $_GET['arrivalTime'], $_GET['departureTime'], $cno, $Em, $Ey, $Cvv, $Pin, $final);

    // Execute the SQL query
    if ($stmt->execute()) {
        // Payment information inserted successfully
        // Now you can redirect to bookdone.php
        header("Location: bookdone.php?trainName=" . urlencode($_GET['trainName']) . "&arrivalTime=" . urlencode($_GET['arrivalTime']) . "&departureTime=" . urlencode($_GET['departureTime']) . "&final=" . urlencode($_POST['final']));
        exit;
    } else {
        // Insertion into the transactions table failed
        echo "Error: " . $stmt->error;
    }
}
?>

<html>
<head>
  <style>
    .formm {
      font-family: Montserrat, sans-serif;
      font-size: 18px !important;
    }
    h2{
      color: #f2a6a6;
    }
  </style>
  <link rel='stylesheet' href='css/index.css'>
  <link rel="shortcut icon" href="logofig.jpg" />
  <title> Registration Page </title>
  
</head>

<body style=" background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);">
  <div class="formm">
    <h2 align="center" style="color:#f2a6a6;">Enter Payment Details : </h2>
    <form method='post' action=''>
      <table align="center">
        <tr>
          <td><h3> Card No.: </h3></td>
          <td colspan='2'><input type="Number" name="cno" placeholder="1111-2222-3333-4444" maxlength='50'></td>
        </tr>
        <tr>
          <td><h3>Name on Card: </h3></td>
          <td colspan='2'><input type="Text" name="name" placeholder="Abcd" maxlength='50'></td>
        </tr>
        <tr>
          <td><h3>Expiry Date  </h3></td>
          <td><input type="Number" name="Em" placeholder='MM' maxlength='2'></td>
          <td><input type="Number" name="Ey" placeholder='YY' maxlength='2'></td>
        </tr>
        <tr>
          <td><h3>CVV No: </h3> </td>
          <td colspan='2'><input type="Password" name="Cvv" maxlength='3' placeholder='123'></td>
        </tr>
        <tr>
          <td><h3>PIN NO: </h3> </td>
          <td colspan='2'><input type="Password" name="Pin" maxlength='4' placeholder='0000'></td>
        </tr>
        <tr>
          <td><h3>Amount: </h3> </td>
          <td colspan='2'><input type="Number" name="final" placeholder='0000'></td>
        </tr>
        <tr>
          <td colspan='3'><center><button style="background-color:black ;  border-color:black" type='Submit'
                name='register_submit'>Complete Payment</Button></center></td>
        </tr>
      </table>
    </form>
    <br>
    <br>
  </div>
</body>

</html>
