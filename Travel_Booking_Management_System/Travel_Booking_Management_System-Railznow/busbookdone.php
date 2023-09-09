<?php
include 'connect.php';
session_start();
if ($_SESSION['log'] == '') {
    header("location:sindex.php");
}
include 'header.php';
?>
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
    #payment-table {
        width: 80%;
        margin: 0 auto;
        border-collapse: collapse;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    #payment-table th,
    #payment-table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ccc;
    }

    #payment-table th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    #payment-table td:first-child {
        font-weight: bold;
    }

    #print-button {
    background-color: green;
    border-color: black;
    display: block; 
	width:250px;
    margin: 20px auto 0; 
    padding: 2px 20px;
    border-radius: 5px;
    text-align: center; 
    }
    #print-button a {
        text-decoration: none;
        color: white;
    }
</style>

<link rel='stylesheet' href='css/index.css'>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">

</script>
</head>
<?php
$result = mysqli_query($connect, "SELECT * FROM `bustransactions` WHERE `email`='" . $_SESSION['email'] . "' ORDER BY `T_No.` DESC LIMIT 1");
while ($row = mysqli_fetch_assoc($result)) :
    $tno = $row["T_No."];
    $_SESSION['tno'] = $tno;
?>

<body style="background-color: F5F1F0;">
    <h2 align="center"><b> Booking Summary</b></h2>
    <br>

    <!-- Payment details table -->
    <table id="payment-table">
        <tr>
            <th>Ticket No</th>
            <td><?php echo $row['T_No.']; ?></td>
        </tr>
        <tr>
            <th>Name</th>
            <td><?php echo $_SESSION['name'] ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $_SESSION['email'] ?></td>
        </tr>
        <tr>
            <th>Source Station</th>
            <td><?php echo $_SESSION['source'] ?></td>
        </tr>
        <tr>
            <th>Destination</th>
            <td><?php echo $_SESSION['dest'] ?></td>
        </tr>
        <tr>
            <th>Amount</th>
            <td>₹&nbsp;&nbsp;<?php echo $_SESSION['final'] ?></td>
        </tr>
    </table>

    <div id="print-button">
        <a href="busprint.php?pid='<?php echo $_SESSION['tno'] ?>' " ><h3>Proceed to Print</h3></a>
    </div>
</body>
<?php endwhile; ?>
</html>
