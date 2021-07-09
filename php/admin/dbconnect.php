<?php
  $servername = "localhost";
  $username = "doubleks_nanjiadmin";
  $password = "YSgikXGFohQ5";
  $dbname = "doubleks_nanji";

  try {
   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
?>