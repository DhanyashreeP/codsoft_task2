<?php
include 'connect.php';
session_start();
if ($_SESSION['log'] == '') {
    header("location:sindex.php");
}
include 'header.php';
?>

<head>  
    <title>TRAIN TICKET DATABASE</title> 
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
        
        #database_table tr {
            background-color: white;
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
    <h2 style="margin-bottom:20px; font-size: 28px; color: #f2a6a6;"><center><b>USER'S TRAIN BOOKINGS</center></b></h2>

    <div class="container">  
        <br />  
        <table id="database_table" class="table table-striped table-bordered">  
        <thead>  
            <tr>
                <th>Date & Time </th>
                <th>Booking ID </th>
                <th>Name</th>
                <th>Train Name</th>
                <th>Arrival Time</th>
                <th>Departure Time</th>
                <th>Amount Paid</th>
                <th>Download</th>
            </tr>  
        </thead>  
        <tbody>
            <?php
                $sql_transactions = "SELECT * FROM `transactions`  WHERE  `email`='" . $_SESSION['email'] . "' ";
                $result = $connect->query($sql_transactions);
                while ($row = $result->fetch_assoc()) {
                    echo '<tr class="class="table table-striped table-bordered"">
                        <td>' . $row["Date"] . '</td>
                        <td>' . $row["T_No."] . '</td>
                        <td>' . $row["Name"] . '</td>
                        <td>' . $row["trainName"] . '</td>
                        <td>' . $row["arrivalTime"] . '</td>
                        <td>' . $row["departureTime"] . '</td>
                        <td>₹&nbsp&nbsp' . $row["Amt"] . '</td>
                        <td><a href="print.php?pid='.$row["T_No."].'&trainName='.urlencode($row["trainName"]).'&arrivalTime='.urlencode($row["arrivalTime"]).'&departureTime='.urlencode($row["departureTime"]).'" target="_blank">Click Here</a></td>';
                }
            ?>
        </tbody>
        </table>
    </div>
    <script>  
        $(document).ready(function() {
            $('#database_table').DataTable( {
                "order": [[ 1, "desc" ]]
            } );
        }); 
    </script>  
</body>
