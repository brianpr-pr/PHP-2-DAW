<?php
if(false){//isset($_POST['usuario']) && isset($_POST['contraseña'] ) ){
    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['contraseña'] = $_POST['contraseña'];
    echo "Login";
} else{
    echo "Not login";
    header("./resultado.php");
}