<?php
$servername = "localhost";
$username = "root";
$password = "";
$myDB = "tasks_app";

$connection = mysqli_connect(
    'localhost',
    'root',
    '',
    'tasks_app'
);
if($connection){
    echo "Database is connected";
}