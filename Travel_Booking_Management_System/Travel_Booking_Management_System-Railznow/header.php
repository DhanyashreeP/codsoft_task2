<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Montserrat', sans-serif;
    }

    .navvvvvvbar {
      font-size: 40px;
      text-align: center;
      background-color: lightblue;
      padding: 37px;
      color: black;
      font-weight: bold;
    }

    .navbar {
      font-size: 23px;
      text-align: center;
      background-color: #2d2d30;
      padding: 10px;
      color: #d5d5d5;
    }

    .navbar a {
      color: #d5d5d5;
      text-decoration: none;
      padding: 10px 20px;
    }

    .navbar a:hover {
      color: tomato;
    }
    .navbar-right {
      float: right;
    }
    .dropdown-menu {
      display: none;
      position: absolute;
      right:0;
      background-color: white;
      min-width: 190px;
      border: 5px solid #ddd;
      margin-top:10px;
      border-radius: 15px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      z-index: 1;
    }
    .dropdown:hover .dropdown-menu {
      display: block;
    }

    .dropdown-menu a {
      color: #000;
      text-decoration: none;
      padding: 10px 20px;
      display: block;
    }

    .dropdown-menu a:hover {
      background-color: bisque;
    }
  </style>
</head>

<body>
  <div class="navvvvvvbar">
    <b>RAILZ NOW</b>
  </div>

  <nav class="navbar">
    <a href="home.php">Home</a>
    <a href="get_train_info.php">Train Ticket</a>
    <a href="bookbus.php">Bus Ticket</a>
    <a href="mybookings.php">User Bookings</a>
    <div class="navbar-right dropdown">
      <a class="dropdown-toggle" href="#">User : <?php echo " " . $_SESSION['name'] . "" ?>
      <span class="caret"></span></a>
      <div class="dropdown-menu">
        <a href="myprofile.php">My Profile</a>
        <a href="logout.php">Logout</a>
      </div>
    </div>
  </nav>

  
</body>
</html>
