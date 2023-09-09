<?php
include 'connect.php';
session_start();
var_dump($_SESSION);
if ($_SESSION['log'] == '') {
    header("location:sindex.php");
}

if (isset($_POST['register_submit'])) {
    // Ensure all POST variables are set
    if (isset($_POST['name']) && isset($_POST['cno']) && isset($_POST['Em']) && isset($_POST['Ey']) && isset($_POST['Cvv']) && isset($_POST['Pin']) && isset($_POST['final'])) {
        // Process the form data
        $name = $_POST['name'];
        $card = $_POST['cno'];
        $EM  = $_POST['Em'];
        $EY = $_POST['Ey'];
        $Cvv = $_POST['Cvv'];
        $Pin = $_POST['Pin'];
        $Amt = $_POST['final'];

        // Check if the necessary session variables are set
        if (isset($_SESSION['email']) && isset($_SESSION['name'])) {
            // Your SQL query and booking logic here
            // SQL query to insert payment and booking details into the transactions table
            $sql_transactions = "INSERT INTO transactions (email, name, card_no, expmonth, expyear, cvv, pin, Amt)
VALUES (
    '" . $_SESSION['email'] . "',
    '" . $_SESSION['name'] . "',
    '$card',
    '$EM',
    '$EY',
    '$Cvv',
    '$Pin',
    '$Amt'
)";

            // Execute the SQL query
            if (mysqli_query($connect, $sql_transactions) === true) {
                echo "<h1><center>Your Ticket has been successfully booked</center></h1><br>";
            } else {
                echo "Error: " . mysqli_error($connect);
            }

            header("location: bookdone.php");
        } else {
            echo "Some of the required session variables are not set.";
        }
    } else {
        echo "Some of the POST variables are not set.";
    }
} else {
    // Form was not submitted
    echo "Form not submitted.";
}

include 'footer.php';
?>
