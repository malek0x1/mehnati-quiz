<?php
session_start();

$hostname = "127.0.0.1";
  $username = "root";
  $pwd = "";
  $dbname = "project";

  $conn = mysqli_connect($hostname, $username, $pwd, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }


?>
