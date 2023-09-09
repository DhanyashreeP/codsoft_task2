
<?php
include 'connect.php' ;
session_start();
if ($_SESSION['log'] == '')
{
    header("location:sindex.php");
}
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BUS TICKET DATABASE</title>
<style>
  body {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
  }

  .container {
    text-align: center;
    margin-top: 20px;
  }

  #database_table {
    font-size: 16px;
    border-collapse: collapse;
    border-spacing: 0;
    width: 75%;
    margin:auto;
  }

  #database_table td, #database_table th {
    border: 2px solid black;
    text-align: left;
    padding: 8px;
  }

  #database_table tr{
    background-color: #f2f2f2;
  }

  #database_table th {
    padding-top: 11px;
    padding-bottom: 11px;
    background-color: teal;
    color: white;
  }
</style>
</head>
<body>
<div class="container">
  <h2 style="margin-bottom:20px; font-size: 28px; color: #f2a6a6;"><center><b>USER'S BUS BOOKINGS</b></center></h2>
  <br>
  <table id="database_table">
    <thead>
      <tr>
        <th>Date & Time</th>
        <th>Booking ID</th>
        <th>Name</th>
        <th>Source</th>
        <th>Destination</th>
        <th>Bus Number</th>
        <th>Amount Paid</th>
        <th>Download</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql_transactions = "SELECT * FROM `bustransactions`  WHERE  `email`='" . $_SESSION['email'] . "' ";
      $result = $connect->query($sql_transactions);
      while ($row = $result->fetch_assoc()) {
        echo '<tr>
          <td>' . $row["Date"] . '</td>
          <td>' . $row["T_No."] . '</td>
          <td>' . $row["Name"] . '</td>
          <td>' . $row["source"] . '</td>
          <td>' . $row["dest"] . '</td>
          <td>' . $row["Bus_No"] . '</td>
          <td>₹&nbsp;&nbsp;' . $row["Amt"] . '</td>
          <td><a href="busprint.php?pid=' . $row["T_No."] . '" target="_blank">Click Here</a></td>
        </tr>';
      }
      ?>
    </tbody>
  </table>
</div>

<script>
  $(document).ready(function() {
    $('#database_table').DataTable({
      "order": [[1, "desc"]]
    });
  });
</script>
</body>
</html>
