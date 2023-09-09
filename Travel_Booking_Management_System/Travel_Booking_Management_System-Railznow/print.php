<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ticket Details</title>
<style>
  body {
    margin: 0;
    padding: 0;
    font-family: Montserrat, sans-serif;
    background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
  }

  .ticket {
    background-color:#f7cac9;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin: 40px auto;
    max-width: 600px;
  }

  .ticket-content {
    padding: 20px;
    text-align: justify;
  }

  h1 {
    font-size: 28px;
    margin-top: 0;
    margin-bottom:10px;
    color: #333;
  }

  h2, h3 {
    font-size: 18px;
    margin-top: 0;
    margin-bottom:5px;
    color: #333;
  }

  #options {
    text-align: center;
    margin-top: 20px;
  }

  .button{
    color: #fff;
    border: none;
    font-size:20px;
    padding: 10px 30px;
    margin-right:10px;
    border-radius: 5px;
    cursor: pointer;
  }
  #printButton{
    background-color:green;
  }
  #printButton:hover {
    background-color: teal;
  }
  #homeBtn{
    background-color:red;
  }
  #homeBtn:hover{
    background-color:tomato;
  }
</style>
</head>
<body>
<?php
  include 'connect.php';
  $pid = $_GET['pid'];
  $trainName = urldecode($_GET['trainName']);
$arrivalTime = urldecode($_GET['arrivalTime']);
$departureTime = urldecode($_GET['departureTime']);
  $sel = "SELECT * FROM `transactions` WHERE `T_No.` = $pid";
  $rs = $connect->query($sel);
  while ($row = $rs->fetch_assoc()) {
?>
  <div class="ticket">
    <div class="ticket-content">
      <h1>TRAIN TICKET DETAILS</h1>
      <h1>RAILZ NOW</h1>
      <h2>Booking ID: <?php echo $row['T_No.'] ?></h2>
      <h2>TRAIN NAME: <?php echo $trainName; ?></h2>
      <h2>DATE & TIME: <?php echo $row['Date'] ?></h2>
      <h2>ARRIVAL TIME: <?php echo $arrivalTime; ?></h2>
      <h2>DEPARTURE TIME: <?php echo $departureTime; ?></h2>
      <h2>AMOUNT: ₹<?php echo $row['Amt'] ?></h2>
      <h2>WISH YOU A HAPPY & SAFE JOURNEY</h2>
    </div>
  </div>
  <div id="options">
    <button id="printButton" class="button">Print Ticket</button>
    <a href="home.php"><button id="homeBtn" class="button">Home</button></a>
  </div>
  <script>
  document.getElementById("printButton").addEventListener("click", function () {
    // Print the content
    window.print();
  });
</script>
<?php
  }
?>
</body>
</html>
