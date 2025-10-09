<?php
$servername = "localhost";
$username = "root";
$password = "";
$myDB = "tasks_app";

try {
  $connection = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
  // set the PDO error mode to exception
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}