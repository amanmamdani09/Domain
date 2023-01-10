<?php
include 'connection.php';

if (!isset($_SESSION['logged_in'])) { ?>
  <script type="text/javascript">
    location.href = 'http://localhost/Domain';
  </script>
<?php
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
    }

    .topnav {
      float: none;
      position: absolute;
      left: 40%;
      top: 11.1%;
      /* padding: 20px 10px 20px 10px; */
      transform: translate(-33%, -118%);
      overflow: hidden;
      background-color: grey;
      float: center;
      text-align: center;
    }

    .topnav a {
      float: left;
      color: #000000;
      text-align: center;
      padding: 16px 16px;
      text-decoration: none;
      font-size: 20px;
    }

    .topnav a:hover {
      background-color: #ddd;
      color: black;
    }

    .topnav a.active {
      background-color: #c0c0c0;
      color: white;
    }
  </style>
</head>

<body>
  <br></br>
  <nav class="topnav">
    <a href="recentDomain.php">Dashboard</a>
    <a href="addDomain.php">Add Domain</a>
    <a href="allDomain.php">All Domain</a>
    <a href="myProfile.php">My Profile</a>
    <a href="logout.php">Log Out</a>
  </nav>
</body>

</html>