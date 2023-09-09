<?php
include 'connect.php';
session_start();
if ($_SESSION['log'] == '') {
    header("location:sindex.php");
}
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Train Search</title>
    <style>
        body{
            font-family: Montserrat, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 28px;
            color: #f2a6a6;
        }
        .center-form {
            text-align: justify;
            margin: 0 auto;
            padding:20px;
            max-width: 600px; /* Adjust the max-width to your preference */
            color:aliceblue;
            font-size:20px;
        }
        .center-content{
            text-align: justify;
            margin: 0 auto;
            max-width: 600px; /* Adjust the max-width to your preference */
            padding: 20px;
            font-size:20px;
            color:aliceblue;
        }
        button{
            background-color:green;
            padding:5px;
            font-size:20px;
            color:white;
            width:100px;
            border-radius:5px;

        }
        button:hover{
            background-color:teal;
        }
    </style>
</head>
<body>
    <h1>Train Search</h1>
    <div class="center-form">
    <form method="post" action="">
        <label for="search_query">Search for Trains:</label>
        <input type="text" name="search_query" id="search_query" placeholder="Enter train name">
        <button type="submit">Search</button>
    </form>
    </div>
    <div class="center-content">
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_train_submit'])) {
        // Get the train details from the form
        $trainName = $_POST['trainName'];
        $arrivalTime = $_POST['arrivalTime'];
        $departureTime = $_POST['departureTime'];
        
        // Create a SQL INSERT statement to insert the booking information
        $insertQuery = "INSERT INTO trains_info (trainName, arrivalTime, departureTime, bookingDate)
                        VALUES (?, ?, ?, CURDATE())";

        // Prepare the SQL query
        $stmt = $connect->prepare($insertQuery);

        // Bind parameters
        $stmt->bind_param('sss', $trainName, $arrivalTime, $departureTime);

        // Execute the SQL query
        if ($stmt->execute()) {
            // Query executed successfully
            echo "Booking for $trainName was successful!";

            // Display payment options or a payment form
            echo "<h2>Payment Options</h2>";
            // Include your payment options or form code here

            // Redirect to the payment page with train details
            header("Location: pay.php?trainName=" . urlencode($trainName) . "&arrivalTime=" . urlencode($arrivalTime) . "&departureTime=" . urlencode($departureTime));
            exit;
        } else {
            // Query execution failed
            echo "Error: " . $stmt->error;
        }
    }

    $curl = curl_init();

    // Set cURL options and make the API request
    // ...

    // Define user-filled form data
    if (isset($_POST['search_query'])) {
        $searchQuery = $_POST['search_query'];
    } else {
        $searchQuery = ''; // Default value or handle the case where the form field is not set
    }

    // Set the API request data
    $requestData = [
        'search' => $searchQuery,
    ];

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://trains.p.rapidapi.com/",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($requestData),
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: trains.p.rapidapi.com",
            "X-RapidAPI-Key: 018f2921e3mshac7efd73d46ea22p1fd606jsnd844ae3c08fc",
            "content-type: application/json"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $decoded_data = json_decode($response, true);

        if ($decoded_data === null) {
            echo "Error decoding JSON data.";
        } else {
            // Process the API response and display the train details
            foreach ($decoded_data as $train) {
                $trainName = $train['name'];
                $departureTime = $train['data']['departTime'];
                $arrivalTime = $train['data']['arriveTime'];
                
                echo "<p><strong>Train Name:</strong> $trainName</p>";
                echo "<p><strong>Departure Time:</strong> $departureTime</p>";
                echo "<p><strong>Arrival Time:</strong> $arrivalTime</p>";
        
                // Include your button or form code here.
                echo "<form method='POST' action=''>";
                echo "<input type='hidden' name='trainName' value='$trainName'>";
                echo "<input type='hidden' name='arrivalTime' value='$arrivalTime'>";
                echo "<input type='hidden' name='departureTime' value='$departureTime'>";
                echo "<button type='submit' class='button' name='book_train_submit'>Book</button>";
                echo "</form>";
        
                echo "<hr>";
            }
        }
    }
    ?>
    </div>
</body>
</html>
