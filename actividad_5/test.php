<?php
session_start();
// Set session variables
$_SESSION["favcolor"] = "green";
echo var_dump($_SESSION);