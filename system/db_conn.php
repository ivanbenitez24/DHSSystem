<?php
  $servername = "containers-us-west-29.railway.app";
  $username = "root";
  $password = "b3aVysaOxk6ChWTHPH5u";
  $db_name = "railway";
  $dp_port = "6181";

  $conn = new mysqli($servername, $username, $password, $db_name,$db_port);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  else {
    // set the connection timeout to 60 seconds
    mysqli_options($conn, MYSQLI_OPT_CONNECT_TIMEOUT, 60);

    echo "success";
  }
?>
