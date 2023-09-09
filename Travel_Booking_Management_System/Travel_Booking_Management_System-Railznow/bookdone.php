<?php
include 'connect.php';
session_start();

if ($_SESSION['log'] == '') {
    header("location:index.php");
    exit();
}

include 'header.php';

$trainName = $_GET['trainName'];
$arrivalTime = $_GET['arrivalTime'];
$departureTime = $_GET['departureTime'];

// Assuming you have a database connection $connect

// Modify this SQL query to match your table structure and relationships
$result = mysqli_query($connect, "SELECT * FROM `transactions` WHERE `email`='" . $_SESSION['email'] . "' ORDER BY `T_No.` DESC LIMIT 1");

while ($row = mysqli_fetch_assoc($result)) :
    $tno = $row["T_No."];
    $amount=$row["Amt"];
    $_SESSION['tno'] = $tno;

    // Retrieve train information from the trains_info table
    $trainInfoResult = mysqli_query($connect, "SELECT * FROM `trains_info` WHERE `trainName`='$trainName' AND `arrivalTime`='$arrivalTime' AND `departureTime`='$departureTime'");
    $trainInfo = mysqli_fetch_assoc($trainInfoResult);
?>

<head>
    <title>Booking Summary</title>
    <style>
    #font {
        font-family: Montserrat, sans-serif;
        font-size: 18px !important;
    }

    body {
        margin: 0;
        padding: 0;
        font-family: Montserrat, sans-serif;
        background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
        color: #333;
    }
    h2{
        color:#f2a6a6;
    }

    table {
        width: 80%;
        margin: 0 auto;
        border-collapse: collapse;
        background-color: white;
        border: 2px solid #000;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #000;
        color: #fff;
    }

    td {
        background-color: #f9f9f9;
    }

    #center-table {
        text-align: center;
    }
    .button-container{
        text-align:center;
        margin-top:20px;
    }
    button {
        
        color: #fff;
        padding: 15px 30px;
        font-size: 18px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    </style>
<link rel='stylesheet' href='css/index.css'>
</head>
<body>
    <h2 align="center"><b>Booking Summary</b></h2>
    <br>

    <div id="center-table">
        <table id="font">
            <tr>
                <th>Booking ID</th>
                <td><?php echo $row['T_No.']; ?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?php echo $_SESSION['name']; ?></td>
            </tr>
            <tr>
                <th>Train Name</th>
                <td><?php echo $trainInfo['trainName']; ?></td>
            </tr>
            <tr>
                <th>Arrival Time</th>
                <td><?php echo $trainInfo['arrivalTime']; ?></td>
            </tr>
            <tr>
                <th>Departure Time</th>
                <td><?php echo $trainInfo['departureTime']; ?></td>
            </tr>
            <tr>
                <th>Amount</th>
                <td>₹&nbsp;&nbsp;<?php echo $amount; ?></td>
            </tr>
        </table>
    </div>
    <div class="button-container">
    <a href="print.php?pid=<?php echo $_SESSION['tno']; ?>&trainName=<?php echo urlencode($trainName); ?>&arrivalTime=<?php echo urlencode($arrivalTime); ?>&departureTime=<?php echo urlencode($departureTime); ?>" target="_blank">
        <button style="width:300px;">Proceed to Print</button>
    </a>
</div>

</body>

<?php endwhile; ?>
</html>
