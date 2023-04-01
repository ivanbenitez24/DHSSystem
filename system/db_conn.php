<?php
  $servername = "containers-us-west-29.railway.app";
 
  $username = "root";
  $password = "FdmRrA8CShpnSG7YStpQ";

  $db_name = "railway";
  
  $conn = new mysqli($servername, $username, $password, $db_name);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  else {
    // set the connection timeout to 60 seconds
    mysqli_options($conn, MYSQLI_OPT_CONNECT_TIMEOUT, 60);

    echo "success";
  }
?>