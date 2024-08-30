<?php
  define("DB_HOST", "127.0.0.1");
  define("DB_USER", "root");
  define("DB_PASSWORD", "Mel123");
  define("DB_DATABASE", "bd_polideportivo");

  $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
  // you could test connection eventually using a if and else conditional statement, 
  // feel free to take out the code below once you see Connected!

  /*
  if ($conn) {
    echo "Connected!";
  } else {
    echo "Connection Failed";
  }
    */
?>
