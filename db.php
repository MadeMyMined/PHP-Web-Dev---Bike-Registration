<?php
  $servername = "localhost";
  $username = "Ynno";
  $password = "071702";
  $dbname = "bikedb";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  // echo "Connected successfully";
?>