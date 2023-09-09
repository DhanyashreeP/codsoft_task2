<?php

include 'homehead.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Railz Now </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
        }
        header {
            padding: 20px 0;
            font-size: 36px;
            text-align: center;
        }
        h1,h2{
            margin: 0;
            color:#f2a6a6;
        }
        h2{
            font-size:28px;
            margin-top:30px;
        }
        .image-container {
            display: inline-block; 
            white-space: nowrap; 
        }

        .image{
            height:700x;
            width:752px;
        }
        .about-us,.tandc,.contact-info{
            text-align:justify;
            width:50%;
            margin:auto;
        }
        p,li{
            font-size: 22px;
            color:aliceblue;
            margin-bottom: 10px;
        }
        strong{
            color:#e0b589;
        }
        a{
            color:#e0b589;
        }
        a:hover{
            color:grey;
        }
        .contact-info{
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Railz Now</h1>
    </header>
    <div class="image-contaier">
        <img class="image" src="images/main1.png" alt="mainbus">
        <img class="image" src="images/main2.png" alt="maintrain">
    </div>
    <center><h2>About Us</h2></center>
    <div class="about-us">
        <p>Railz Now is your one-stop destination for hassle-free and convenient travel planning. Whether you're a seasoned commuter or a first-time traveler, our user-friendly platform makes booking train and bus tickets a breeze. With an extensive network of transportation options, we connect you to your desired destinations with speed and efficiency.</p>
        <p>Our website provides real-time information on schedules, availability, allowing you to compare and choose the best options for your journey. Need to book a last-minute ticket, Railz Now has you covered.</p>
        <p>At Railz Now, we believe that travel should be an enjoyable experience from start to finish. So why wait? Start your journey today with Railz Now and explore the world with confidence.</p>
    </div>
    <center><h2>Terms and Conditions</h2></center>
    <div class="tandc">
        <p>Before you embark on your journey with us, please take a moment to review our terms and conditions.</p>
        <ol>
            <li><strong>Booking and Payment:</strong> Users must provide accurate information for booking tickets </li>
            <li><strong>Privacy and Data:</strong> User data will be handled according to our privacy policy, ensuring the security of personal information.</li>
            <li><strong>Responsibility:</strong> Railz Now is not liable for delays, cancellations, or any inconvenience caused by external factors such as weather or third-party services.</li>
            <li><strong>Code of Conduct:</strong> Users are expected to maintain respectful behavior while using Railz Now, and any misuse or abuse may result in account suspension.</li>
        </ol>
        <p>Thank you for choosing Railz Now for your travel needs!</p>
    </div>
    <center><h2>Contact Info</h2></center>
    <div class="contact-info">
        <p>If you have any questions or concerns, please don't hesitate to contact our customer support team.</p>
       <ul>
            <li>Email: <a href="mailto:contact@railznow.com">contact@railznow.com</a></li>
            <li>Phone: <a href="tel:+91 9888889090">+91 9888889090</a></li>
            <li>Address: 123 Main Street, Bengaluru, Karnataka, India</li>
        </ul>
    </div>
    <?php include 'footer.php';?>     
</body>
</html>
