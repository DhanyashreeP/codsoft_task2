<?php
include 'connect.php' ;
session_start();
if ($_SESSION['log'] == '')
{
    header("location:sindex.php");
}
include 'header.php';
?>

<style>
  body {
  font-family: Montserrat, sans-serif;
  margin: 0;
  padding: 0;
  background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
}

.container {
  border: 2px solid grey;
  margin: 30px auto 50px;
  padding: 50px;
  width:50%;
  background-color:white;
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
.form-group {
  margin:auto;
  width:50%;
  margin-bottom: 20px;
}

label {
  font-weight: bold;
  margin-bottom: 5px;
}

.form-control {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}
.button {
  padding: 10px 20px;
  background-color: black;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.button:hover {
  background-color: #333;
}

h1 {
  text-align: center;
  margin-bottom: 20px;
  font-size: 28px;
  color: #f2a6a6;
}

.center {
  text-align: center;
}  
  </style>

</head>
<body>
<h1><b>Bus Ticket Booking</b></h1>
  <form method='post' action ='busaction.php' class="center">
    <div class="container">
      <div class="form-group">
        <label for="source">SOURCE BUS-STOP:</label>
        <select id="source" class="form-control" name="source">
        <option>Mumbai</option>
   <option>Delhi  </option>
   <option>Kolkata </option>
   <option>Chennai  </option>
   <option>Bangalore</option>
   <option>Hyderabad</option>

        </select>
      </div>
      <div class="form-group">
        <label for="dest">FINAL BUS-STOP:</label>
        <select id="dest" class="form-control" name="dest">


          <option>Mumbai</option>
          <option>Delhi  </option>
          <option>Kolkata </option>
          <option>Chennai  </option>
          <option>Bangalore</option>
          <option>Hyderabad</option>
          
        </select>
      </div>
      <div class="form-group">
        <label for="number">NO OF PASSENGERS:</label>
        <input type="number" name="number" required min="1" max="5" class="form-control">
      </div>
      <div class="form-group center">
        <button type="submit" class="button" name="login_submit">Proceed</button>
      </div>
    </div>
  </form>



</body>
</html>