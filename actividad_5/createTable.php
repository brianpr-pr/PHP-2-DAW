<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "actividad_5";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // sql to create table
  $tabOne = "CREATE TABLE users (
  name_user VARCHAR(30) PRIMARY KEY,
  email_user VARCHAR(30) UNIQUE NOT NULL,
  password_user VARCHAR(100) NOT NULL
  )";

  $tabTwo = "CREATE TABLE register (
  codigo int AUTO_INCREMENT PRIMARY KEY,
  fecha DATETIME DEFAULT CURRENT_TIMESTAMP
  )";

  // use exec() because no results are returned
  $conn->exec($tabOne);
  $conn->exec($tabTwo);

  echo "Table users and register created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;