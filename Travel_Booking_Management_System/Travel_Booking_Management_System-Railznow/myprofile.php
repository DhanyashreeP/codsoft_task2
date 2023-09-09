<?php
include 'connect.php';
session_start();
if ($_SESSION['log'] == '') {
    header("location: sindex.php");
}
include 'header.php';
?>

<html>
<head>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Montserrat', sans-serif;
      background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
      /*background-color: #f5f5f5;*/
    }

    .profile-container {
      max-width: 800px;
      margin: 50px auto;
      padding: 20px;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .profile-header {
      text-align: center;
      margin-bottom: 20px;
    }

    .profile-header img {
      width: 50px;
      height: 50px;
      vertical-align: middle;
      margin-right: 10px;
    }

    .profile-header b {
      font-size: 24px;
    }

    .profile-table {
      width: 100%;
      border-collapse: collapse;
    }

    .profile-table th,
    .profile-table td {
      padding: 10px;
      border: 1px solid #e0e0e0;
      text-align: left;
    }

    .profile-table th {
      background-color: #f5f5f5;
    }

    .profile-table td {
      background-color: #ffffff;
    }
  </style>
</head>
<body>
  <div class="profile-container">
    <div class="profile-header">
      <img src="https://img.icons8.com/dusk/50/000000/checked-user-male.png"/>
      <b>USER PROFILE DETAILS</b>
    </div>
    <table class="profile-table">
      <tr>
        <th>Name</th>
        <td><?php echo $_SESSION['name'] ?></td>
      </tr>
      <tr>
        <th>Email</th>
        <td><?php echo $_SESSION['email'] ?></td>
      </tr>
      <tr>
        <th>User Id</th>
        <td><?php echo $_SESSION['userid'] ?></td>
      </tr>
      <tr>
        <th>Gender</th>
        <td><?php echo $_SESSION['Gender'] ?></td>
      </tr>
      <tr>
        <th>Date of Birth</th>
        <td><?php echo $_SESSION['dob'] ?></td>
      </tr>
      <tr>
        <th>Contact Number</th>
        <td><?php echo $_SESSION['phone'] ?></td>
      </tr>
    </table>
  </div>
</body>

</html>


	