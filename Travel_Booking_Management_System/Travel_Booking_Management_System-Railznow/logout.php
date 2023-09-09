<?php
include 'head2.php';

session_start();
?>
<html>
<head>
<link rel='stylesheet' href='css/index.css'>
 <link rel="shortcut icon" href="logofig.jpg" />
</head>
<body style="background-color: F5F1F0;">
<?php
session_destroy();
echo '<center><h2>Thank You for using Railz Now<h2></center><br>';
echo '<center><a href="index.php"><button style="width:250px; background-color:green; border-color:black">Sign in Again</button></a></center>';
?>
</body>
</html>