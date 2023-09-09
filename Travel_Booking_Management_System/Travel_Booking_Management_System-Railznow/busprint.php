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
    color: #333;
  }

  .container {
    text-align: justify;
    padding: 20px;
  }

  .ticket {
    background-color:#f7cac9;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-top: 20px;
    max-width: 600px;
    margin: 0 auto;
  }

  h1 {
    font-size: 28px;
    margin-top: 0;
    margin-bottom: 10px;
    color: #333;
  }

  h2, h3 {
    font-size: 18px;
    margin-top: 0;
    margin-bottom: 5px;
    color: #333;
  }

  #options {
    text-align: center;
    margin-top: 20px;

  }

  .button {
    color: #fff;
    border: none;
    font-size:20px;
    padding: 10px 30px;
    border-radius: 5px;
    margin-right:10px;
    cursor: pointer;
  }
  #printButton{
    background-color:green;
  }
  #homeBtn{
    background-color:red;
  }
  #printButton:hover {
    background-color: teal;
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

$sel = "SELECT * FROM `bustransactions` WHERE `T_No.` = $pid";
$rs = $connect->query($sel);
while ($row = $rs->fetch_assoc()) {
?>
  <div class="container">
    <div class="ticket">
      <h1>Bus Ticket Details</h1>
      <h1>RAILZ NOW</h1>
      <h2>Ticket number: <?php echo $row['T_No.'] ?></h2>
      <h2><span><?php echo $row['source'] ?> &nbsp;To&nbsp; <?php echo $row['dest'] ?></span></h2>
      <h3>Name: <?php echo $row['Name'] ?></h3>
      <h3>Date & Time: <?php echo $row['Date'] ?></h3>
      <h3>Bus No: <?php echo $row['Bus_No'] ?></h3>
      <h3>No of Passengers: <?php echo $row['NoOfpass'] ?></h3>
      <h3>Amount: ₹<?php echo $row['Amt'] ?></h3>
      <h2><span>Wish you a happy & safe journey</span></h2>
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
