<?php
$passwd = "TEST";
$hashtest = password_hash($passwd, PASSWORD_DEFAULT);

if (password_verify($passwd, $hashtest)) {
    echo 'La contraseña es válida !';
} else {
    echo 'La contraseña es inválida.';
}