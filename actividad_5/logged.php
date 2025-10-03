<?php
session_start();
error_reporting(E_ALL & ~E_WARNING); // Show all errors except warnings
echo "Datos actuales del usuario con sesion iniciada:<br>";
echo var_dump($_SESSION);
if($_GET['salir']){
    $_SESSION['logged'] = false;
}

if(!$_SESSION['logged']){
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html>
    <body>
        <h1>Nombre de usuario <?php echo $_SESSION['nombreUsuario']?></h1>
        <h2>Press this button to log out</h2>
        <form method="GET">
            <button name="salir" value="true" type="submit">salir de la cuenta</button>
        </form>
        <?php
            echo "<hw>Congratulations you are logged</h2>";
        ?>
    </body>
</html>